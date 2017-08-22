<?php

namespace Common\Model;

use Think\Model;

/**
 * 微信支付模型
 *
 * @author 凡星
 */
class PaymentModel extends Model {
	// JSAPI支付
	public function jsapi_pay($appid, $product = [], $callback = '') {
		$goods = $product;
		$goods ['appid'] = $appid;
		
		$goods ['trade_type'] = 'JSAPI'; // 此处值固定
		                                 
		// 生成订单
		$order = $this->add_order ( $goods, $callback ); // goods数组中必传的参数有：appid,body,out_trade_no,total_fee
		if ($order ['status'] == 0) {
			return $order;
		}
		// add_debug_log($order, '888');
		// 组装jsapi参数
		$return ['appId'] = $appid;
		$return ['timeStamp'] = NOW_TIME;
		$return ['nonceStr'] = uniqid ();
		$return ['package'] = 'prepay_id=' . $order ['prepay_id'];
		$return ['signType'] = 'MD5';
		$return ['paySign'] = make_sign ( $return, $order ['partner_key'] );
		$return ['status'] = 1;
		// add_debug_log($return, '999');
		return $return;
	}
	
	// 原生扫码支付
	public function scan_pay($appid, $product = [], $callback = '', $type = 2) {
		if ($type == 1) {
			return $this->add_scan_by_one ( $appid, $product, $callback );
		} else {
			return $this->add_scan_by_two ( $appid, $product, $callback );
		}
	}
	
	// 刷卡支付
	public function micro_pay($appid, $product = [], $callback = '') {
		// body out_trade_no total_fee auth_code
		// TODO
	}
	
	// 小程序支付
	public function weiapp_pay($appid, $product = [], $callback = '') {
		// add_debug_log ( $appid, 'weiapp_pay' );
		$goods = $product;
		$goods ['appid'] = $appid;
		
		$goods ['trade_type'] = 'JSAPI'; // 此处值固定
		                                 
		// 生成订单
		$order = $this->add_order ( $goods, $callback ); // goods数组必传的参数有：appid,body,out_trade_no,total_fee
		if ($order ['status'] == 0) {
			return $order;
		}
		// add_debug_log($order, '888');
		// 组装jsapi参数
		$return ['appId'] = $appid;
		$return ['timeStamp'] = ( string ) NOW_TIME;
		$return ['nonceStr'] = uniqid ();
		$return ['package'] = 'prepay_id=' . $order ['prepay_id'];
		$return ['signType'] = 'MD5';
		// add_debug_log ( $return, '999' );
		// add_debug_log ( $order, '888' );
		$return ['paySign'] = make_sign ( $return, $order ['partner_key'] );
		$return ['status'] = 1;
		// add_debug_log($return, '999');
		return $return;
	}
	
	// 生成10位一天内不能重复的数字
	private function getRandStr() {
		$arr = array (
				'A',
				'B',
				'C',
				'D',
				'E',
				'F',
				'G',
				'H',
				'I',
				'J',
				'K',
				'L',
				'M',
				'N',
				'O',
				'P',
				'Q',
				'R',
				'S',
				'T',
				'U',
				'V',
				'W',
				'X',
				'Y',
				'Z' 
		);
		$key = array_rand ( $arr );
		return substr ( time (), - 5 ) . substr ( microtime (), 2, 4 ) . $arr [$key];
	}
	
	// 原生扫码支付模式一
	private function add_scan_by_one($appid, $product = [], $callback = '') {
		if (! isset ( $product ['product_id'] ) || empty ( $product ['product_id'] )) {
			$return ['status'] = 0;
			$return ['msg'] = '商品product_id参数不能为空';
			return $return;
		}
		
		$param ['appid'] = $param2 ['appid'] = $appid;
		$param ['product_id'] = $product ['product_id'];
		$param ['time_stamp'] = NOW_TIME;
		$param = $this->init_config ( $param );
		
		$param2 ['long_url'] = 'weixin://wxpay/bizpayurl?' . http_build_query ( $param );
		$param2 = $this->init_config ( $param2 );
		
		$url = 'https://api.mch.weixin.qq.com/tools/shorturl';
		$res_data = post_data ( $url, $param2, 'xml' );
		
		$return ['status'] = 1;
		if ($res_data ['return_code'] == 'FAIL') {
			$return ['status'] = 0;
			$return ['msg'] = $res_data ['return_msg'];
		} elseif ($res_data ['result_code'] == 'FAIL') {
			$return ['status'] = 0;
			$return ['msg'] = $res_data ['err_code'] . ': ' . $res_data ['err_code_des'];
		}
		
		// 记录订单信息到数据库
		$res = $this->insert_scan ( $appid, $product, $callback, $res_data );
		if (! $res || $return ['status'] == 0) {
			$return ['status'] = 0;
			$return ['msg'] = '订单数据写入数据库失败';
			return $return;
		}
		
		$return ['msg'] = '下单成功';
		$return = array_merge ( $return, $res_data );
		return $return;
	}
	
	// 原生扫码支付模式二
	private function add_scan_by_two($appid, $product = [], $callback = '') {
		$goods = $product;
		$goods ['appid'] = $appid;
		
		$goods ['trade_type'] = 'NATIVE'; // 此处值固定
		                                  
		// 生成订单
		$order = $this->add_order ( $goods, $callback );
		return $order;
	}
	
	// 记录扫码记录到数据库
	private function insert_scan($appid, $product = [], $callback = '', $res_data = []) {
		$data ['appid'] = $appid;
		$data ['callback'] = $callback;
		$data ['product_id'] = $product ['product_id'];
		$data ['out_trade_no'] = $product ['out_trade_no'];
		$data ['total_fee'] = $product ['total_fee'];
		
		$data ['cTime'] = NOW_TIME;
		unset ( $product ['product_id'], $product ['out_trade_no'], $product ['total_fee'] );
		$data ['product'] = serialize ( $product );
		$data ['shorturl_res'] = serialize ( $res_data );
		
		$res = M ( 'payment_scan' )->add ( $data );
		return $res;
	}
	
	/*
	 * 对外提供支付服务的接口
	 * @param array $param 支付参数，必传的参数有：appid,body,out_trade_no,total_fee,openid
	 * @param string $callback 回调的模型地址，
	 * 格式如：home/Service/payok 用户支付后先通知到notice.php，然后由它调用 D('home/Service')->payok($notice)的方式实现回调
	 * @return static
	 */
	public function add_order($param, $callback) {
		$param = $this->init_add_order ( $param );
		$param = $this->init_config ( $param, true );
		$partner_key = $param ['partner_key'];
		unset ( $param ['partner_key'] );
		// add_debug_log ( $param, $partner_key );
		$res = $this->check_order ( $param, $callback );
		if ($res ['status'] == 0) {
			return $res;
		}
		// dump($param);
		$url = 'https://api.mch.weixin.qq.com/pay/unifiedorder';
		$res_data = post_data ( $url, $param, 'xml' );
		// dump($res_data);
		$return ['status'] = 1;
		if ($res_data ['return_code'] == 'FAIL') {
			$return ['status'] = 0;
			$return ['msg'] = $res_data ['return_msg'];
			return $return;
		} elseif ($res_data ['result_code'] == 'FAIL') {
			$return ['status'] = 0;
			$return ['msg'] = $res_data ['err_code'] . ': ' . $res_data ['err_code_des'];
			return $return;
		}
		
		// 记录订单信息到数据库
		$res = $this->insert_order ( $param, $res_data, $callback );
		if (! $res) {
			$return ['status'] = 0;
			$return ['msg'] = '订单数据写入数据库失败';
			return $return;
		}
		
		if ($return ['status'] == 0) {
			return $return;
		} else {
			$return ['msg'] = '下单成功';
			$return = array_merge ( $res_data, $return );
			$return ['partner_key'] = $partner_key;
			return $return;
		}
	}
	
	// 订单查询
	function query_order($appid, $out_trade_no, $mch_id = '', $transaction_id = '') {
		$return ['status'] = 0;
		if (empty ( $appid )) {
			$return ['msg'] = 'appid不能为空';
			return $return;
		}
		if (empty ( $out_trade_no ) && empty ( $transaction_id )) {
			$return ['msg'] = 'out_trade_no和transaction_id不能同时为空';
			return $return;
		}
		
		$param ['appid'] = $appid;
		if (! empty ( $transaction_id )) {
			$param ['transaction_id'] = $transaction_id;
		} else {
			$param ['out_trade_no'] = $out_trade_no;
		}
		$param ['mch_id'] = $mch_id;
		$param = $this->init_config ( $param );
		
		$url = 'https://api.mch.weixin.qq.com/pay/orderquery';
		$res_data = post_data ( $url, $param, 'xml' );
		
		return $res_data;
	}
	
	// 关闭订单
	public function close_order($appid, $out_trade_no, $mch_id = '') {
		$return ['status'] = 0;
		if (empty ( $appid )) {
			$return ['msg'] = 'appid不能为空';
			return $return;
		}
		if (empty ( $out_trade_no ) && empty ( $transaction_id )) {
			$return ['msg'] = 'out_trade_no和transaction_id不能同时为空';
			return $return;
		}
		
		$param ['appid'] = $appid;
		$param ['out_trade_no'] = $out_trade_no;
		
		$param ['mch_id'] = $mch_id;
		$param = $this->init_config ( $param );
		
		$url = 'https://api.mch.weixin.qq.com/pay/closeorder';
		$res_data = post_data ( $url, $param, 'xml' );
		
		return $res_data;
	}
	
	// 记录订单信息到数据库
	private function insert_order($param = [], $res_data = [], $callback = '') {
		$data ['out_trade_no'] = $param ['out_trade_no'];
		$data ['total_fee'] = $param ['total_fee'];
		$data ['appid'] = $param ['appid'];
		$data ['token'] = get_token ();
		$data ['openid'] = isset ( $param ['openid'] ) ? $param ['openid'] : '';
		$data ['callback'] = $callback;
		$data ['prepay_id'] = $res_data ['prepay_id'];
		$data ['code_url'] = isset ( $res_data ['code_url'] ) ? $res_data ['code_url'] : '';
		$data ['return_code'] = $res_data ['return_code'];
		$data ['return_msg'] = $res_data ['return_msg'];
		$data ['result_code'] = $res_data ['result_code'];
		$data ['err_code_des'] = isset ( $res_data ['err_code'] ) ? $res_data ['err_code'] . ': ' . $res_data ['err_code_des'] : '';
		$data ['cTime'] = NOW_TIME;
		
		unset ( $param ['out_trade_no'], $param ['total_fee'], $param ['appid'], $param ['openid'] );
		unset ( $res_data ['prepay_id'], $res_data ['code_url'], $res_data ['return_code'], $res_data ['return_msg'], $res_data ['result_code'], $res_data ['err_code'], $res_data ['err_code_des'] );
		$data ['param'] = serialize ( $param );
		$data ['res_data'] = serialize ( $res_data );
		
		$res = $this->add ( $data );
		return $res;
	}
	
	// 支付配置信息初始化
	private function init_config($param = [], $need_key = false) {
		// 如果连appid的值都没有，肯定有错，不再处理
		if (! isset ( $param ['appid'] ) || empty ( $param ['appid'] ))
			return $param;
			
			// 获取配置信息
		$config = D ( 'Common/Apps' )->getInfoByAppid ( $param ['appid'] );
		
		// 如果没有商户号，自动从配置中读取
		if (! isset ( $param ['mch_id'] ) || empty ( $param ['mch_id'] )) {
			$param ['mch_id'] = $config ['mch_id'];
		}
		
		if (! isset ( $param ['nonce_str'] ) || empty ( $param ['nonce_str'] )) {
			$param ['nonce_str'] = uniqid ();
		}
		
		if (! isset ( $param ['partner_key'] ) || empty ( $param ['partner_key'] )) {
			$partner_key = $config ['partner_key'];
		} else {
			$partner_key = $param ['partner_key'];
			unset ( $param ['partner_key'] );
		}
		
		$param ['sign'] = make_sign ( $param, $partner_key );
		if ($need_key) {
			$param ['partner_key'] = $partner_key;
		}
		
		return $param;
	}
	
	// 支付配置信息初始化
	private function init_add_order($param = []) {
		if (! isset ( $param ['spbill_create_ip'] ) || empty ( $param ['spbill_create_ip'] )) {
			$param ['spbill_create_ip'] = $_SERVER ['SERVER_ADDR'];
		}
		
		if (! isset ( $param ['notify_url'] ) || empty ( $param ['notify_url'] )) {
			$param ['notify_url'] = SITE_URL . '/notice.php';
		}
		if (! isset ( $param ['trade_type'] ) || empty ( $param ['trade_type'] )) {
			$param ['trade_type'] = 'JSAPI';
		}
		
		return $param;
	}
	
	// 数据验证
	private function check_order($param = [], $callback = '') {
		$return ['status'] = 0;
		if (empty ( $callback )) {
			$return ['msg'] = 'callback回调参数不能为空';
			return $return;
		}
		
		$rules = [ 
				'appid' => [ 
						'require' => 1,
						'len' => 32 
				],
				'mch_id' => [ 
						'require' => 1,
						'len' => 32 
				],
				'device_info' => [ 
						'len' => 32 
				],
				'nonce_str' => [ 
						'require' => 1,
						'len' => 32 
				],
				'sign' => [ 
						'require' => 1,
						'len' => 32 
				],
				'sign_type' => [ 
						'len' => 32,
						'in' => [ 
								'HMAC-SHA256',
								'MD5' 
						] 
				],
				'body' => [ 
						'require' => 1,
						'len' => 128 
				],
				'detail' => [ 
						'len' => 6000 
				],
				'attach' => [ 
						'len' => 127 
				],
				'out_trade_no' => [ 
						'require' => 1,
						'len' => 32 
				],
				'total_fee' => [ 
						'require' => 1 
				],
				'spbill_create_ip' => [ 
						'require' => 1,
						'len' => 16 
				],
				'time_start' => [ 
						'len' => 14 
				],
				'time_expire' => [ 
						'len' => 14 
				],
				'goods_tag' => [ 
						'len' => 32 
				],
				'notify_url' => [ 
						'require' => 1,
						'len' => 256 
				],
				'trade_type' => [ 
						'require' => 1,
						'len' => 16,
						'in' => [ 
								'JSAPI',
								'NATIVE',
								'APP' 
						] 
				],
				'product_id' => [ 
						'len' => 32 
				],
				'limit_pay' => [ 
						'len' => 32,
						'in' => [ 
								'no_credit' 
						] 
				],
				'openid' => [ 
						'len' => 32 
				] 
		];
		
		foreach ( $rules as $key => $val ) {
			if (isset ( $val ['require'] )) {
				if (! isset ( $param [$key] )) {
					$return ['msg'] = '缺少必填参数：' . $key;
					return $return;
				} elseif (empty ( $param [$key] )) {
					$return ['msg'] = $key . '的值不能为空';
					return $return;
				}
			}
			if (isset ( $param [$key] )) {
				$len = mb_strlen ( $param [$key], 'UTF-8' );
				if (isset ( $val ['len'] ) && $len > $val ['len']) {
					$return ['msg'] = $key . '的长度不能超过' . $val ['len'] . '字节';
					return $return;
				}
				if (isset ( $val ['in'] ) && ! in_array ( $param [$key], $val ['in'] )) {
					$return ['msg'] = $key . '的值不正确，可选的值有：' . implode ( ', ', $val ['in'] );
					return $return;
				}
			}
		}
		
		// trade_type=JSAPI时openid必须
		if ($param ['trade_type'] == 'JSAPI' && empty ( $param ['openid'] )) {
			$return ['msg'] = 'openid的值不能为空';
			return $return;
		}
		// 判断订单号out_trade_no是否唯一
		$map ['appid'] = $param ['appid'];
		$map ['out_trade_no'] = $param ['out_trade_no'];
		$check = $this->where ( $map )->getField ( 'id' );
		
		$return ['status'] = 1;
		$return ['msg'] = '检测通过';
		return $return;
	}
}
