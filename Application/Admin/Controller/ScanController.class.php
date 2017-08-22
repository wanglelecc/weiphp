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
class ScanController extends AdminController {
	public function index() {
		if (IS_POST) {
			$Config = D ( 'Config' );
			
			$wp_id = I ( 'wp_id' );
			$status = I ( 'status' );
			
			if ($status == 1 && empty ( $wp_id )) {
				$this->error( '140261:请先选择服务号' );
			}
			
			$Config->setValue ( 'SCAN_LOGIN_PUBLIC', $wp_id );
			$Config->setValue ( 'SCAN_LOGIN', $status );
			
			$this->success ( '操作成功！' );
		} else {
			$this->assign ( 'status', C ( 'SCAN_LOGIN' ) );
			$this->assign ( 'wp_id', C ( 'SCAN_LOGIN_PUBLIC' ) );
			
			$this->display ();
		}
	}
}