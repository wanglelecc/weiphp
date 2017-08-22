<?php

namespace Addons\RealPrize\Controller;

use Think\WapBaseController;

class WapController extends WapBaseController {
	function index() {
		$id = I ( 'id' );
		$param ['prizeid'] = $id;
		$info = get_token_appinfo ();
		$param ['publicid'] = $info ['id'];
		$data = D ( 'RealPrize' )->getInfo ( $id );
		$this->assign ( 'data', $data );
		// 设置奖品页面领取对应的跳转链接
		$prizetype = $data ['prize_type'];
		if ($prizetype == '0') {
			$url = addons_url ( "RealPrize://Wap/save_address", $param );
		} else {
			$url = addons_url ( "RealPrize://Wap/address", $param );
		}
		$this->assign ( 'jumpurl', $url );
		
		// 获取奖品类型名称，方便显示
		$tname = $prizetype == '0' ? '虚拟物品' : '实体物品';
		$this->assign ( 'tname', $tname );
		// 服务号信息
		$service_info = get_token_appinfo ();
		$this->assign ( 'service_info', $service_info );
		$this->display ();
	}
	function address($prizeid) {
		$data = D ( 'Addons://RealPrize/RealPrize' )->getInfo ( $prizeid );
		if ($data ['prize_count'] > 0) {
			if (IS_POST) {
				$this->save_address ( $prizeid, $data );
			} else {
				$this->assign ( 'prizeid', $prizeid );
				$url = addons_url ( "RealPrize://Wap/address?prizeid=$prizeid" );
				$this->assign ( 'url', $url );
				$this->display ( 'address' );
			}
		} else {
			$res ['result'] = "fail";
			$res ['msg'] = "抱歉手太慢，奖品被领取完了";
			$this->assign ( "res", $res );
			$this->display ( 'result' );
		}
	}
	// 增加收货地址
	function save_address($prizeid, $data = []) {
		$uid = get_mid ();
		empty ( $data ) && $data = D ( 'Addons://RealPrize/RealPrize' )->getInfo ( $prizeid );
		
		$num = D ( 'PrizeAddress' )->getAddressInfo ( $uid, $prizeid );
		$this->assign ( "data", $data );
		// 判断是否领取
		if (! empty ( $num )) {
			$res ['result'] = "fail";
			$res ['msg'] = "您已经领取该奖品了,请不要重复领取";
			$this->assign ( "res", $res );
			$this->display ( 'result' );
			exit ();
		} else {
			if ($data ['prize_count'] > 0) {
				$model = $this->getModel ( 'prize_address' );
				// 实体奖品保存收货地址
				if (IS_POST) {
					$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) ); // dump($model);die();
					$Model = $this->checkAttr ( $Model, $model ['id'] );
					if ($Model->create () && $id = $Model->add ()) {
						
						// 清空缓存
						method_exists ( $Model, 'clear' ) && $Model->clear ( $id, 'add' );
						D ( 'PrizeAddress' )->getAddressInfo ( $uid, $prizeid, true );
						// 减1
						// M ( 'prize_address' )->where ( "prizeid = $prizeid" )->setDec ( 'prize_count' );
						D ( 'RealPrize' )->updatePrizeCount ( $prizeid );
						// 结果
						$res ['result'] = "success";
						$res ['msg'] = "恭喜你，领取成功！";
						$this->assign ( "res", $res );
						$this->assign ( 'address', $_POST );
						$this->display ( 'result' );
						exit ();
					} else {
						$this->error ( $Model->getError () );
					}
				} else {
				    $addData['uid']=$uid;
				    $addData['prizeid']=$_GET['prizeid'];
				    $user=getUserInfo($uid);
				    $addData['turename']=$user['truename']?$user['truename']:$user['nickname'];
				    M('prize_address')->add($addData);
					// 虚拟奖品保存uid
					D ( 'RealPrize' )->updatePrizeCount ( $prizeid );
					// 结果
					$res ['result'] = "success";
					$res ['msg'] = "恭喜你，领取成功！";
					$this->assign ( "res", $res );
					$this->display ( 'result' );
					exit ();
				}
			} else {
				$res ['result'] = "fail";
				$res ['msg'] = "抱歉手太慢，奖品被领取完了";
				$this->assign ( "res", $res );
				$this->display ( 'result' );
			}
		}
	}
}
