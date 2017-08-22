<?php

namespace Api\Controller;

use Think\ApiBaseController;

class ApiController extends ApiBaseController {
	function index() {
		// 接口请求日志记录TODO
		$param = I ();
		// dump ( $param );
		// exit ();
		if (! isset ( $param ['act'] )) {
			$this->error ( '410010:参数出错' );
		}
		$mod = isset ( $param ['mod'] ) ? $param ['mod'] : 'Api';
		$act = $param ['act'];
		$debug = isset ( $param ['debug'] );
		// dump ( $debug );
		$map ['act'] = $act;
		$map ['mod'] = $mod;
		$api_info = M ( 'api' )->where ( $map )->find ();
		if (! $api_info) { // 自己写接口处理程序
			$res = D ( $mod )->$act ( $param );
			if ($debug) {
				dump ( $debug );
			} else {
				$res = json_encode ( $res );
			}
		} else { // 后台配置的自动处理程序
			$res = $this->auto_api ( $api_info, $param, $debug );
		}
		// 接口返回日志记录 TODO
		echo $res;
	}
	// 后台配置的自动处理程序
	private function auto_api($api_info, $param, $debug = false) {
		// 请求类型判断
		if ($api_info ['method'] == '0' && ! IS_POST) {
			$this->error ( '410011:请使用POST方式请求' );
		} elseif ($api_info ['method'] == '1' && ! IS_GET) {
			$this->error ( '410012:请使用GET方式请求' );
		}
		
		// 获取参数配置
		$map ['api_id'] = $api_info ['id'];
		$list = M ( 'api_param' )->where ( $map )->select ();
		
		$db_model = $this->getModel ( $api_info ['mod'] );
		
		$api_param = [ ];
		foreach ( $list as $v ) {
			$api_param [$v ['param_type']] [$v ['name']] = $v ['is_must'];
		}
		$Model = D ( parse_name ( $api_info ['mod'], 1 ) );
		switch ($api_info ['type']) {
			case 'add' : // 增加
				$data = $this->param_save ( $api_param, $param );
				$Model = $this->checkAttr ( $Model, $db_model ['id'] );
				$Model->create ( $data );
				$res = $Model->add ();
				break;
			case 'update' : // 更新
				$data = $this->param_save ( $api_param, $param );
				$Model = $this->checkAttr ( $Model, $db_model ['id'] );
				$map = $this->param_condition ( $api_param, $param );
				
				$Model->create ( $data );
				$res = $Model->where ( $map )->save ( $data );
				break;
			case 'del' : // 删除
				$map = $this->param_condition ( $api_param, $param );
				$res = $Model->where ( $map )->delete ();
				break;
			default : // 查询
				$map = $this->param_condition ( $api_param, $param );
				if (isset ( $param ['is_one'] )) {
					$res = $Model->where ( $map )->find ();
				} else {
					$order = $this->param_order ( $api_param, $param );
					$res = $Model->where ( $map )->order ( $order )->select ();
				}
				break;
		}
		$return ['data'] = $res;
		if ($res !== false) {
			$return ['api_status'] = 1;
			$return ['api_msg'] = '';
		} else {
			$return ['api_status'] = 0;
			$return ['api_msg'] = $Model->getError ();
		}
		if ($debug) {
			dump ( $return );
		} elseif ($api_info ['return_type'] == 1) {
			return toXML ( $return );
		} else {
			return json_encode ( $return );
		}
	}
	private function param_condition($api_param, $param) {
		if (! isset ( $api_param ['condition'] ) || empty ( $api_param ['condition'] )) {
			$this->error ( '410015:请先在后台配置查询条件' );
		}
		
		$data = [ ];
		foreach ( $api_param ['condition'] as $name => $v ) {
			if ($v ['is_must'] && ! isset ( $param [$name] )) {
				$this->error ( '410016:查询条件缺少 ' . $name . ' 参数' );
			}
			if (! isset ( $param [$name] ))
				continue;
			
			if ($v ['extra'] == 'like') {
				$data [$name] = [ 
						'LIKE',
						'%' . $param [$name] . '%' 
				];
			} else {
				$data [$name] = [ 
						$v ['extra'],
						$param [$name] 
				];
			}
		}
		return $data;
	}
	private function param_order($api_param, $param) {
		if (! isset ( $api_param ['save'] ) || empty ( $api_param ['save'] )) {
			return '';
		}
		
		$data = [ ];
		foreach ( $api_param ['condition'] as $name => $v ) {
			if ($v ['is_must'] && ! isset ( $param [$name] )) {
				$this->error ( '410016:查询条件缺少 ' . $name . ' 参数' );
			}
			if (! isset ( $param [$name] ))
				continue;
			
			if ($v ['extra'] == 'like') {
				$data [$name] = [ 
						'LIKE',
						'%' . $param [$name] . '%' 
				];
			} else {
				$data [$name] = [ 
						$v ['extra'],
						$param [$name] 
				];
			}
		}
		return $data;
	}
	private function param_save($api_param, $param) {
		if (! isset ( $api_param ['save'] ) || empty ( $api_param ['save'] )) {
			$this->error ( '410013:请先在后台配置要保存的内容' );
		}
		
		$data = [ ];
		foreach ( $api_param ['save'] as $name => $v ) {
			if ($v ['is_must'] && ! isset ( $param [$name] )) {
				$this->error ( '410014:保存内容缺少 ' . $name . ' 参数' );
			}
			
			isset ( $param [$name] ) && $data [$name] = $param [$name];
		}
		return $data;
	}
	function checkLogin() {
		if ($this->mid > 0)
			echo api_success ( [ 
					$this->mid 
			] );
		else
			echo api_error ( '用户登录消息不存在，请重新登录' );
	}
	function sendSessionCode() {
		$code = I ( 'code' );
		
		$config = get_token_appinfo ();
		$url = "https://api.weixin.qq.com/sns/jscode2session?appid={$config['appid']}&secret={$config['secret']}&js_code={$code}&grant_type=authorization_code";
		// openid 用户唯一标识 session_key 会话密钥
		$data = post_data ( $url, [ ] ); // {"session_key":"gHkoobsIWnTYnUj1ZTQKDA==","expires_in":2592000,"openid":"onfcX0fV3mjzsLRK7C15vk_2N86w"}
		if ((isset ( $data ['errcode'] ) && $data ['errcode'] == '40029') || ! isset ( $data ['session_key'] ) || ! isset ( $data ['openid'] )) {
			echo api_return ( 410001, [ ], '获取微信信息失败！' );
		} else {
			session ( 'session_key', $data ['session_key'] );
			session ( 'openid', $data ['openid'] );
			$map ['openid'] = $map2 ['a.openid'] = $data ['openid'];
			if (! M ( 'apps_follow' )->where ( $map )->find ()) {
				$uid = M ( 'user' )->add ( [ 
						'reg_time' => NOW_TIME 
				] );
				M ( 'apps_follow' )->add ( [ 
						'token' => $config ['token'],
						'openid' => $data ['openid'],
						'uid' => $uid 
				] );
			} else {
				$re = M ( 'apps_follow as a' )->join ( C ( 'DB_PREFIX' ) . 'user b on a.uid = b.uid' )->where ( $map2 )->find ();
				
				session ( 'user_info', $re );
				$uid = $re ['uid'];
			}
			// $uid = 1;
			// $this->saveSession ();
			session ( 'mid', $uid );
			/*
			 * session('mid',1);
			 */
			$return ['PHPSESSID'] = session_id ();
			$return ['openid'] = $data ['openid'];
			$return ['uid'] = $uid;
			
			$res = api_return ( 0, $return );
			
			echo $res;
		}
	}
	function saveUserInfo() {
		$encryptedData = I ( 'encryptedData' );
		$iv = I ( 'iv' );
		if ($encryptedData != '' && $iv != '') {
			vendor ( 'aes.wxBizDataCrypt' );
			$config = get_token_appinfo ();
			$appid = $config ['appid'];
			$sessionKey = session ( 'session_key' );
			
			$pc = new \WXBizDataCrypt ( $appid, $sessionKey );
			$errCode = $pc->decryptData ( $encryptedData, $iv, $data );
			
			if ($errCode == 0) {
				$data = json_decode ( $data, true );
				session ( 'user_info', $data );
				$save = [ 
						'nickname' => $data ['nickName'],
						'sex' => $data ['gender'],
						'language' => $data ['language'],
						'city' => $data ['city'],
						'province' => $data ['province'],
						'country' => $data ['country'],
						'headimgurl' => $data ['avatarUrl'] 
				];
				isset ( $data ['unionid'] ) && $save ['unionid'] = $data ['unionid'];
				if (session ( 'mid' ) > 0) {
					$res = D ( 'common/User' )->where ( [ 
							'uid' => session ( 'mid' ) 
					] )->save ( $save );
					$save ['uid'] = session ( 'mid' );
					D ( 'Common/User' )->autoLogin ( $save );
					echo api_return ( 0, $res );
				} else {
					echo api_return ( 4100025, [ ], '用户ID错误' );
				}
			} else {
				// print($errCode . "\n");
				echo api_return ( $errCode, [ ] );
			}
		} else {
			echo api_return ( 140002, [ ], '缺少用户加密信息' );
		}
	}
	// 保存小程序的图片
	public function upload() {
		/* 返回标准数据 */
		$return = array (
				'status' => 1,
				'info' => '上传成功',
				'data' => '' 
		);
		
		/* 调用文件上传组件上传文件 */
		$Picture = D ( 'Home/Picture' );
		$pic_driver = C ( 'PICTURE_UPLOAD_DRIVER' );
		$info = $Picture->upload ( $_FILES, C ( 'PICTURE_UPLOAD' ), C ( 'PICTURE_UPLOAD_DRIVER' ), C ( "UPLOAD_{$pic_driver}_CONFIG" ) ); // TODO:上传到远程服务器
		
		/* 记录图片信息 */
		if ($info) {
			$return ['status'] = 1;
			$return = array_merge ( $info ['download'], $return );
		} else {
			$return ['status'] = 0;
			$return ['info'] = $Picture->getError ();
		}
		add_debug_log ( $return, 'upload_return' );
		/* 返回JSON数据 */
		$this->ajaxReturn ( $return );
	}
	private function returncode($result, $array = false) {
		if ($array) {
			return $result;
		} else {
			$this->ajaxReturn ( $result );
		}
	}
	// 获取二维码
	public function getwxacode($array = false) {
		$type = I ( 'type', 'A' );
		$param = I ( 'param' );
		if (empty ( $param )) {
			$result = [ 
					'status' => 0,
					'msg' => 'param参数不能为空' 
			];
			return $this->returncode ( $result, $array );
		}
		$param = json_decode ( $param, true );
		
		$file = '/Uploads/WxaCode/' . WPID . '/' . md5 ( $type . json ( $param ) ) . '.jpg';
		$fielPath = SITE_PATH . $file;
		$fileUrl = SITE_URL . $file;
		
		mkdirs ( SITE_PATH . '/Uploads/WxaCode/' . WPID );
		
		if (file_exists ( $fielPath )) {
			$result = [ 
					'status' => 1,
					'url' => $fileUrl,
					'path' => $fielPath 
			];
			
			return $this->returncode ( $result, $array );
		}
		
		$access_token = get_access_token ();
		if (! $access_token) {
			$result = [ 
					'status' => 0,
					'access_token' => $access_token,
					'msg' => '获取access_token失败' 
			];
			
			return $this->returncode ( $result, $array );
		}
		
		if ($type == 'A') {
			$url = 'https://api.weixin.qq.com/wxa/getwxacode?access_token=' . $access_token;
			
			if (! isset ( $param ['path'] ) || empty ( $param ['path'] )) {
				$result = [ 
						'status' => 0,
						'msg' => 'path参数不能为空' 
				];
				return $this->returncode ( $result, $array );
			}
			$p ['path'] = $param ['path'];
			$p ['width'] = isset ( $param ['width'] ) ? $param ['width'] : 430;
			$p ['auto_color'] = isset ( $param ['auto_color'] ) ? $param ['auto_color'] : false;
			$p ['line_color'] = isset ( $param ['line_color'] ) ? $param ['line_color'] : ( object ) array (
					'r' => '0',
					'g' => '0',
					'b' => '0' 
			);
		} elseif ($type == 'B') {
			$url = 'http://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=' . $access_token;
			
			if (! isset ( $param ['scene'] ) || empty ( $param ['scene'] )) {
				$result = [ 
						'status' => 0,
						'msg' => 'scene参数不能为空' 
				];
				return $this->returncode ( $result, $array );
			}
			$p ['scene'] = $param ['scene'];
			$p ['width'] = isset ( $param ['width'] ) ? $param ['width'] : 430;
			$p ['auto_color'] = isset ( $param ['auto_color'] ) ? $param ['auto_color'] : false;
			$p ['line_color'] = isset ( $param ['line_color'] ) ? $param ['line_color'] : ( object ) array (
					'r' => '0',
					'g' => '0',
					'b' => '0' 
			);
		} else {
			$url = 'https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode?access_token=' . $access_token;
			
			if (! isset ( $param ['path'] ) || empty ( $param ['path'] )) {
				$result = [ 
						'status' => 0,
						'msg' => 'path参数不能为空' 
				];
				return $this->returncode ( $result, $array );
			}
			$p ['path'] = $param ['path'];
			$p ['width'] = isset ( $param ['width'] ) ? $param ['width'] : 430;
		}
		
		$content = post_data ( $url, $p, 'json', false );
		if (isset ( $content ['curl_error'] )) {
			$result = [ 
					'status' => 0,
					'curl_error' => $content ['curl_error'],
					'msg' => '获取二维码失败' 
			];
			
			return $this->returncode ( $result, $array );
		}
		
		file_put_contents ( $fielPath, $content );
		
		$result = [ 
				'status' => 1,
				'url' => $fileUrl,
				'path' => $fielPath,
				'msg' => '' 
		];
		
		return $this->returncode ( $result, $array );
	}
	function payment() {
		$info = get_app_info ();
		
		$money = I ( 'money' );
		$body = I ( 'body' );
		if (empty ( $body )) {
			// 商家名称-销售商品类目
			$body = $info ['public_name'] . '-服务购买';
		}
		$out_trade_no = I ( 'out_trade_no' );
		if (empty ( $out_trade_no )) {
			$out_trade_no = date ( 'ymd' ) . NOW_TIME . rand ( 100, 999 );
		}
		$openid = I ( 'openid' );
		if (empty ( $openid )) {
			$token = get_token ();
			$openid = $GLOBALS ['myinfo'] [$token] ['openid'];
		}
		
		$appid = $info ['appid'];
		$param ['body'] = $body;
		$param ['out_trade_no'] = $out_trade_no;
		$param ['total_fee'] = $money * 100;
		$param ['openid'] = $openid;
		$param ['mch_id'] = $info ['mch_id'];
		$param ['partner_key'] = $info ['partner_key'];
		
		$order = D ( 'Common/Payment' )->weiapp_pay ( $appid, $param, 'Home/Service/payok' );
		echo json ( $order );
	}
	function send_message() {
		// 发送模板消息给用户
		$openid = I ( 'openid' );
		$formId = I ( 'formId' );
		$url = 'https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token=' . get_access_token ();
		$param ['touser'] = $openid;
		$param ['template_id'] = '-ekG5kJ-8x7OkTxd1shG-5-y90q8El5vj0DKVGwTZ9o';
		$param ['form_id'] = $formId;
		
		$param ['data'] = [ 
				'keyword1' => [ 
						'value' => '1706261498468955374',
						'color' => '#173177' 
				],
				'keyword2' => [ 
						'value' => '1.00元',
						'color' => '#173177' 
				],
				'keyword3' => [ 
						'value' => '2017-05-25 14:30',
						'color' => '#173177' 
				],
				'keyword4' => [ 
						'value' => '梦云商城-服务购买',
						'color' => '#173177' 
				],
				'keyword5' => [ 
						'value' => '已完成支付',
						'color' => '#173177' 
				],
				'keyword6' => [ 
						'value' => '微信支付',
						'color' => '#173177' 
				] 
		];
		
		$res = post_data ( $url, $param );
		
		echo json ( $res );
	}
	function sendCode() {
		$mobile = I ( 'mobile' );
		$res = D ( 'sms/Service' )->sendSms ( $mobile, 'card' );
		$res ['uid'] = $this->mid;
		echo json ( $res );
	}
	function register() {
		$map ['mobile'] = $save ['mobile'] = $mobile = I ( 'mobile' );
		$code = I ( 'code' );
		
		// 验证码判断
		$check = D ( 'sms/Service' )->checkSms ( $mobile, $code );
		if ($check ['result'] == 0) {
			echo api_error ( $check ['msg'] );
			exit ();
		}
		add_debug_log ( $this->mid, 'reg_uid' );
		$res1 = M ( 'user' )->where ( $map )->find ();
		if ($res1) {
			echo api_error ( '号码已被注册过！' );
		} else {
			// dump($_SESSION);
			$res = D ( 'Common/User' )->updateInfo ( $this->mid, $save );
			if ($res)
				echo api_success ();
			else
				echo api_error ( '登录失败' );
		}
	}
	//卡券URL升级为小程序
	function wxAppCard() {
		$card_id = 'prgF0txhQxLw5fRWIy068GyPJcQk';
		$token = 'gh_6d3bf5d72981';
		$app_page = 'pages/index/index';
		
		$param = [ 
				'card_id' => $card_id,
				'general_coupon' => [ 
						'base_info' => [ 
								'custom_url_name' => '小程序',
								'custom_url' => 'https://leyao.tv/weishop/index.php?s=/Api/Api/wxAppCard',
								'custom_app_brand_user_name' => $token.'@app',
								'custom_app_brand_pass' => $app_page,
								'center_app_brand_user_name' => $token.'@app',
								'center_app_brand_pass' => $app_page,
								'custom_url_sub_title' => '点击进入',
								'promotion_url_name' => '小程序',
								'promotion_url' => 'https://leyao.tv/weishop',
								'promotion_app_brand_user_name' => $token.'@app',
								'promotion_app_brand_pass' => $app_page
						] 
				] 
		];
		//dump($param);exit;
	    $access_token = 'hbeiWYjv7UpvoXQ_aGBpf3o33uA_gRQCCCQsbERKjWqM8gn-pepjJayDTsO2Ts-xkvdteo7SCl41Fo4tPAZeGQZkvDxZdGMCaAxSbMFQLAdghp4l84MuO5J59rv0v-0rZOWeAIAODL';
		$url = "https://api.weixin.qq.com/card/update?access_token=" .  $access_token;//get_access_token ($token);


		$res = post_data ( $url, $param );
		echo json($res);
	}
	//用户领取卡券
	function addCard() {
		$card_id = 'prgF0txhQxLw5fRWIy068GyPJcQk';
		$token = 'gh_6d3bf5d72981';
		
		$access_token = 'hbeiWYjv7UpvoXQ_aGBpf3o33uA_gRQCCCQsbERKjWqM8gn-pepjJayDTsO2Ts-xkvdteo7SCl41Fo4tPAZeGQZkvDxZdGMCaAxSbMFQLAdghp4l84MuO5J59rv0v-0rZOWeAIAODL';
		$ticket = api_ticket ( $access_token );
		
		// $param ['code'] = '';
		$param ['api_ticket'] = $ticket;
		$param ['card_id'] = $card_id;
		$param ['timestamp'] = NOW_TIME;//也可以用time（）获取时间戳
		$param ['nonce_str'] = uniqid ();
		
		// 将 api_ticket、timestamp、card_id、code、openid、nonce_str的value值进行字符串的字典序排序
		
		asort ( $param, SORT_STRING );
		$sortString = "";
		foreach ( $param as $temp ) {
			$sortString = $sortString . $temp;
		}
		$param ['signature'] = sha1 ( $sortString );
		$param ['code'] = '';
		$param ['openid'] = '';
		
		echo api_success ( $param );
	}
	function decrypt(){
		$code = I('code');

$access_token = 'hbeiWYjv7UpvoXQ_aGBpf3o33uA_gRQCCCQsbERKjWqM8gn-pepjJayDTsO2Ts-xkvdteo7SCl41Fo4tPAZeGQZkvDxZdGMCaAxSbMFQLAdghp4l84MuO5J59rv0v-0rZOWeAIAODL';
		$url = 'https://api.weixin.qq.com/card/code/decrypt?access_token='.$access_token;

		$param['encrypt_code'] = $code;

		$res = post_data ( $url, $param );
		echo json_encode( $res );
	}

}

