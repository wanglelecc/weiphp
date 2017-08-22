<?php

namespace Addons\Reserve\Controller;

use Think\WapBaseController;

class WapController extends WapBaseController {
	var $model;
	var $reserve_id;
	function index() {
		$this->model = $this->getModel ( 'reserve_value' );
		$this->reserve_id = I ( 'reserve_id', 0 );
		$id = I ( 'id', 0 );
		$reserve = M ( 'reserve' )->find ( $this->reserve_id );
		$page_title = $reserve ['title'];
		$this->assign ( 'page_title', $page_title );
		$reserve ['cover'] = ! empty ( $reserve ['cover'] ) ? get_cover_url ( $reserve ['cover'] ) : ADDON_PUBLIC_PATH . '/background.png';
		$reserve ['intro'] = str_replace ( chr ( 10 ), '<br/>', $reserve ['intro'] );
		$reserve ['act_state'] = 0; // 正常
		if ($reserve ['end_time'] && $reserve ['end_time'] <= NOW_TIME) {
			$reserve ['act_state'] = 2; // 已结束
		}
		if ($reserve ['start_time'] > NOW_TIME) {
			$reserve ['act_state'] = 1; // 未开始
		}
		$this->assign ( 'reserve', $reserve );
		
		// 判断该用户是否已经预约该活动
		$map ['uid'] = $this->mid;
		$map ['token'] = get_token ();
		$map ['reserve_id'] = $this->reserve_id;
		$map ['openid'] = get_openid ();
		
		$data = M ( 'reserve_value' )->where ( $map )->find ();
		$id = $data ['id'];
		if (! empty ( $id )) {
			$act = 'save';
			
			// $data = M ( get_table_name ( $this->model ['id'] ) )->find ( $id );
			// $data || $this->error( '400382:数据不存在！' );
			
			// dump($data);
			$value = unserialize ( htmlspecialchars_decode ( $data ['value'] ) );
			// dump($value);
			unset ( $data ['value'] );
			$data = array_merge ( $data, $value );
			$para ['reserve_id'] = $this->reserve_id;
			$para ['id'] = $data ['id'];
			$param ['model'] = $this->model ['id'];
			$url = U ( 'reserve_success', $para );
			redirect ( $url );
			// $this->assign ( 'data', $data );
			// dump($data);
		} else {
			$act = 'add';
			if ($this->mid != 0 && $this->mid != '-1') {
				// $map ['uid'] = $this->mid;
				// $map ['reserve_id'] = $this->reserve_id;
				
				// $data = M ( 'reserve_value' )->where ( $map )->find ();
				if ($data && $reserve ['jump_url']) {
					// redirect ( $reserve ['jump_url'] );
				}
			}
		}
		
		// dump ( $reserve );
		
		$map2 ['reserve_id'] = $this->reserve_id;
		$map2 ['token'] = get_token ();
		$fields = M ( 'reserve_attribute' )->where ( $map2 )->order ( 'sort asc, id asc' )->select ();
		foreach ( $fields as &$fd ) {
			$fd ['name'] = 'field_' . $fd ['id'];
		}
		
		// 获取预约项
		$option_list = M ( 'reserve_option' )->where ( $map2 )->order ( 'id asc' )->select ();
		$this->assign ( 'option_list', $option_list );
		
		if (IS_POST) {
			if ($reserve ['act_state'] == 2) {
				$this->error ( '活动已结束' );
				exit ();
			}
			if ($reserve ['act_state'] == 1) {
				$this->error ( '活动未开始' );
				exit ();
			}
			foreach ( $option_list as $opt ) {
				if ($_POST ['option_id'] == $opt ['id'] && $opt ['join_count'] >= $opt ['max_limit'] && $opt ['max_limit'] != 0) {
					$this->error ( '400383:该项目人数已满，请选择其它项目！' );
					exit ();
				}
			}
			if ($_POST ['option_id']) {
				$post ['option_id'] = $_POST ['option_id'];
			}
			foreach ( $fields as $vo ) {
				$error_tip = ! empty ( $vo ['error_info'] ) ? $vo ['error_info'] : '请正确输入' . $vo ['title'] . '的值';
				$value = $_POST [$vo ['name']];
				if ($vo ['type'] == 'radio' || $vo ['type'] == 'checkbox') {
					if (($vo ['is_must'] && is_null ( $value )) || (! empty ( $vo ['validate_rule'] ) && ! M ()->regex ( $value, $vo ['validate_rule'] ))) {
						$this->error ( '400384:' . $error_tip );
						exit ();
					}
				} else {
					if (($vo ['is_must'] && empty ( $value )) || (! empty ( $vo ['validate_rule'] ) && ! M ()->regex ( $value, $vo ['validate_rule'] ))) {
						$this->error ( '400385:' . $error_tip );
						exit ();
					}
				}
				
				$post [$vo ['name']] = $vo ['type'] == 'datetime' ? strtotime ( $_POST [$vo ['name']] ) : $_POST [$vo ['name']];
				/*
				 * if (is_array ( $_POST [$vo ['name']] )) {
				 * $post [$vo ['name']] = implode ( ',', $_POST [$vo ['name']] );
				 * }
				 */
				unset ( $_POST [$vo ['name']] );
			}
			// 获取验证码
			$post ['scan_code'] = $this->_get_code ();
			
			$_POST ['value'] = serialize ( $post );
			// $data = unserialize ( $_POST ['value'] );
			$act == 'add' && $_POST ['uid'] = $this->mid;
			// dump($_POST);exit;
			$Model = D ( parse_name ( get_table_name ( $this->model ['id'] ), 1 ) );
			
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $this->model ['id'], $fields );
			
			if ($Model->create () && $res = $Model->$act ()) {
				// 增加积分
				add_credit ( 'Reserve' );
				if ($act == 'add') {
					// option 的join_count ++;
					$map3 ['id'] = $_POST ['option_id'];
					M ( 'reserve_option' )->where ( $map3 )->setInc ( 'join_count' );
				}
				$param ['reserve_id'] = $this->reserve_id;
				$param ['id'] = $act == 'add' ? $res : $id;
				$param ['model'] = $this->model ['id'];
				$url = empty ( $reserve ['jump_url'] ) ? U ( 'reserve_success', $param ) : $reserve ['jump_url'];
				
				$tip = ! empty ( $reserve ['finish_tip'] ) ? $reserve ['finish_tip'] : '提交成功，谢谢参与';
				$this->success ( $tip, $url, 5 );
			} else {
				$this->error ( '400386:' . $Model->getError () );
			}
			exit ();
		}
		
		$fields [] = array (
				'is_show' => 4,
				'name' => 'reserve_id',
				'value' => $this->reserve_id 
		);
		
		$this->assign ( 'fields', $fields );
		
		$this->display ();
	}
	function reserve_success() {
		$map3 ['reserve_id'] = $map ['reserve_id'] = $map2 ['reserve_id'] = $this->reserve_id = I ( 'reserve_id', 0, intval );
		$reserve = M ( 'reserve' )->find ( $this->reserve_id );
		$page_title = $reserve ['title'];
		$this->assign ( 'page_title', $page_title );
		$reserve ['cover'] = ! empty ( $reserve ['cover'] ) ? get_cover_url ( $reserve ['cover'] ) : ADDON_PUBLIC_PATH . '/background.png';
		$reserve ['intro'] = str_replace ( chr ( 10 ), '<br/>', $reserve ['intro'] );
		
		$map2 ['token'] = $map3 ['token'] = get_token ();
		// 获取参与人数
		$attend = M ( 'reserve_option' )->where ( $map )->sum ( 'join_count' );
		
		$map3 ['uid'] = $this->mid;
		$valueArr = M ( 'reserve_value' )->where ( $map3 )->field ( 'id,value,is_pay' )->find ();
		$value_data = unserialize ( $valueArr ['value'] );
		$value_data ['id'] = $valueArr ['id'];
		// dump ( $value_data );
		// $map ['token'] = get_token ();
		$fields = M ( 'reserve_attribute' )->where ( $map2 )->order ( 'sort asc, id asc' )->select ();
		foreach ( $fields as &$fd ) {
			$fd ['name'] = 'field_' . $fd ['id'];
		}
		$value_data = $this->dealValue ( $value_data, $fields );
		
		$option = M ( 'reserve_option' )->where ( array (
				'id' => $value_data ['option_id'] 
		) )->field ( 'name,money' )->find ();
		$value_data ['option_id'] = $option ['name'];
		$value_data ['price'] = $option ['money'];
		$value_data ['uid'] = $this->mid;
		// 判断是否支付
		
		$is_pay = $valueArr ['is_pay'];
		if ($is_pay == 0) {
			$map5 ['uid'] = $this->mid;
			$map5 ['aim_id'] = $this->reserve_id;
			$map5 ['from'] = 'reserve';
			$payment = M ( 'payment_order' )->where ( $map5 )->find ();
			if (empty ( $payment ['status'] )) {
				$is_pay = 0;
			} else {
				$is_pay = 1;
				$map ['id'] = $value_data ['id'];
				$save ['is_pay'] = 1;
				$res = M ( 'reserve_value' )->where ( $map )->save ( $save );
			}
		}
		
		$this->assign ( 'is_pay', $is_pay );
		// dump ( $value_data );
		$this->assign ( 'fields', $fields );
		$this->assign ( 'value_data', $value_data );
		$this->assign ( 'reserve', $reserve );
		$this->assign ( 'attend_num', $attend );
		$this->display ();
	}
	private function dealValue($value_data, $fields) {
		foreach ( $fields as $fd ) {
			// dump ( $fd );
			if ($fd ['title'] == '姓名' || $fd ['title'] == '用户名') {
				$value_data ['username'] = $value_data [$fd ['name']];
			} elseif ($fd ['extra']) {
				$extArr = parse_config_attr ( $fd ['extra'], '/[\s;\r\n|]+/' );
				if (is_array ( $value_data [$fd ['name']] )) {
					foreach ( $value_data [$fd ['name']] as $key => $v ) {
						$arrs [] = $extArr [$v];
					}
					$value_data [$fd ['name']] = implode ( ',', $arrs );
				} else {
					$value_data [$fd ['name']] = $extArr [$value_data [$fd ['name']]];
				}
			} else {
				if ($fd ['type'] == 'picture') {
					if (is_array ( $value_data [$fd ['name']] )) {
						$str = "";
						foreach ( $value_data [$fd ['name']] as $vf ) {
							$str .= "<img class='list_img' src='" . get_cover_url ( $vf ) . "' >&nbsp;";
						}
						$value_data [$fd ['name']] = $str;
					}
				} elseif ($fd ['type'] == 'datetime') {
					$value_data [$fd ['name']] = time_format ( $value_data [$fd ['name']] );
				}
			}
		}
		
		return $value_data;
	}
	function scan_success() {
		$cTime = I ( 'cTime', 0, 'intval' );
		$tt = NOW_TIME * 1000 - $cTime;
		if ($cTime > 0) {
			if ($tt > 30000) {
				$this->error ( '400387:二维码已经过期' );
			}
		}
		// 扫码员id
		$mid = $this->mid;
		// 授权表查询
		$map4 ['uid'] = $mid;
		$map4 ['token'] = $map3 ['token'] = $map2 ['token'] = get_token ();
		$map4 ['enable'] = 1;
		$role = M ( 'servicer' )->where ( $map4 )->getField ( 'role' );
		$roleArr = explode ( ',', $role );
		if (! in_array ( 2, $roleArr )) {
			$this->error ( '400388:你还没有扫码验证的权限' );
			exit ();
		}
		$uid = I ( 'uid' );
		$scanCode = I ( 'scan_code' );
		$map2 ['reserve_id'] = $map3 ['reserve_id'] = $map ['reserve_id'] = $this->reserve_id = I ( 'reserve_id', 0, intval );
		
		$reserve = M ( 'reserve' )->find ( $this->reserve_id );
		$reserve ['cover'] = ! empty ( $reserve ['cover'] ) ? get_cover_url ( $reserve ['cover'] ) : ADDON_PUBLIC_PATH . '/background.png';
		$reserve ['intro'] = str_replace ( chr ( 10 ), '<br/>', $reserve ['intro'] );
		
		// 获取参与人数
		$attend = M ( 'reserve_option' )->where ( $map )->sum ( 'join_count' );
		
		$map3 ['uid'] = $uid;
		$value = M ( 'reserve_value' )->where ( $map3 )->field ( 'id,value,is_pay' )->find ();
		$is_pay = $value ['is_pay'];
		$value_data = unserialize ( $value ['value'] );
		$value_data ['id'] = $value ['id'];
		$is_check = 0;
		if ($value_data ['scan_code'] == $scanCode) {
			// 验证成功
			$is_check = 1;
			$save ['is_check'] = 1;
			M ( 'reserve_value' )->where ( $map3 )->save ( $save );
		} else {
			// 验证失败
			$is_check = 0;
		}
		
		$fields = M ( 'reserve_attribute' )->where ( $map2 )->order ( 'sort asc, id asc' )->select ();
		foreach ( $fields as &$fd ) {
			$fd ['name'] = 'field_' . $fd ['id'];
		}
		$value_data = $this->dealValue ( $value_data, $fields );
		foreach ( $fields as &$fd ) {
			$fd ['name'] = 'field_' . $fd ['id'];
		}
		$option = M ( 'reserve_option' )->where ( array (
				'id' => $value_data ['option_id'] 
		) )->field ( 'name,money' )->find ();
		$value_data ['option_id'] = $option ['name'];
		$value_data ['price'] = $option ['money'];
		
		// 判断是否支付
		$map5 ['uid'] = $uid;
		$map5 ['aim_id'] = $this->reserve_id;
		$map5 ['from'] = 'reserve';
		if ($is_pay == 0) {
			$payment = M ( 'payment_order' )->where ( $map5 )->find ();
			if (empty ( $payment ['status'] )) {
				$is_pay = 0;
			} else {
				$is_pay = 1;
			}
		}
		
		$this->assign ( 'is_pay', $is_pay );
		$this->assign ( 'is_check', $is_check );
		$this->assign ( 'value_data', $value_data );
		$this->assign ( 'attend_num', $attend );
		$this->assign ( 'reserve', $reserve );
		$this->display ();
	}
	
	// 获取扫码时验证码: 当前时间+ 四位随机数
	function _get_code() {
		$str = time ();
		$rand = rand ( 1000, 9999 );
		$str .= $rand;
		return $str;
	}
	function get_check_code() {
		$id = I ( 'id' );
		$res = 0;
		$res = M ( 'reserve_value' )->where ( [ 
				'id' => $id 
		] )->getField ( 'is_check' );
		echo $res;
	}
	function set_pay() {
		$map ['id'] = I ( 'get.id' );
		$save ['is_pay'] = 1;
		
		$res = M ( 'reserve_value' )->where ( $map )->save ( $save );
		echo $res;
	}
	function payOK() {
		$isPay = I ( 'get.ispay', 0, 'intval' );
		$paymentId = I ( 'get.paymentId' );
		$paymentDao = D ( 'Addons://Payment/PaymentOrder' );
		$res = $paymentDao->where ( array (
				'id' => $paymentId 
		) )->setField ( 'status', $isPay );
		$info = $paymentDao->getInfo ( $paymentId, true );
		$map ['reserve_id'] = $info ['aim_id'];
		$map ['uid'] = $this->mid;
		$save ['is_pay'] = $isPay;
		$res = M ( 'reserve_value' )->where ( $map )->save ( $save );
		
		$jurl = U ( 'reserve_success', array (
				'reserve_id' => $info ['aim_id'] 
		) );
		redirect ( $jurl );
	}
}
