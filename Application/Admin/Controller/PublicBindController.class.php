<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 凡星
// +----------------------------------------------------------------------
namespace Admin\Controller;

/**
 * 模型数据管理控制器
 *
 * @author 凡星
 */
class PublicBindController extends AdminController {
	public function index() {
		if (IS_POST) {
			$Config = M ( 'config' );
			
			$appid = I ( 'appid' );
			$appsecret = I ( 'appsecret' );
			$status = I ( 'status' );
			
			if ($status == 1) {
				if (empty ( $appid )) {
					$this->error( '140208:请先填写AppID' );
				} elseif (empty ( $appsecret )) {
					$this->error( '140209:请先填写AppSecret' );
				}
			}
			
			$map ['name'] = 'COMPONENT_APPID';
			$Config->where ( $map )->setField ( 'value', $appid );
			
			$map ['name'] = 'COMPONENT_APPSECRET';
			$Config->where ( $map )->setField ( 'value', $appsecret );
			
			$map ['name'] = 'PUBLIC_BIND';
			$Config->where ( $map )->setField ( 'value', $status );
			
			S ( 'DB_CONFIG_DATA', null );
			
			$this->success ( '操作成功！' );
		} else {
			$this->assign ( 'status', C ( 'PUBLIC_BIND' ) );
			$this->assign ( 'appid', C ( 'COMPONENT_APPID' ) );
			$this->assign ( 'appsecret', C ( 'COMPONENT_APPSECRET' ) );
			
			$arr = parse_url ( SITE_URL );
			$this->assign ( 'host', $arr ['host'] );
			
			$encodingaeskey = C ( 'ENCODING_AES_KEY' );
			
			if (empty ( $encodingaeskey )) {
				$length = 43;
				$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
				$encodingaeskey = "";
				for($i = 0; $i < $length; $i ++) {
					$encodingaeskey .= substr ( $chars, mt_rand ( 0, strlen ( $chars ) - 1 ), 1 );
				}
				
				D('Config')->setValue ( 'ENCODING_AES_KEY', $encodingaeskey );
			}
			$this->assign ( 'encodingaeskey', $encodingaeskey );
			
			$this->display ();
		}
	}
}