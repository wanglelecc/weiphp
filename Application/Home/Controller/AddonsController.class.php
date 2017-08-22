<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Home\Controller;

use Think\Controller;

/**
 * 扩展控制器
 * 用于调度各个扩展的URL访问需求
 */
class AddonsController extends Controller {
	protected $addons = null;
	protected $model;
	function _initialize() {
		$token = get_token ();
		$param = array (
				'lists',
				'config',
				'nulldeal' 
		);
		if (in_array ( ACTION_NAME, $param ) && (empty ( $token ) || $token == '-1')) {
			$url = U ( 'Apps/step_0?from=2' );
			redirect ( $url );
		}
		
		C ( 'EDITOR_UPLOAD.rootPath', './Uploads/Editor/' . $token . '/' );
		
		if ($GLOBALS ['is_wap']) {
			// 默认错误跳转对应的模板文件
			C ( 'TMPL_ACTION_ERROR', 'Addons:dispatch_jump_mobile' );
			// 默认成功跳转对应的模板文件
			C ( 'TMPL_ACTION_SUCCESS', 'Addons:dispatch_jump_mobile' );
		} else {
			$this->_nav ();
		}
	}
	public function execute($_addons = null, $_controller = null, $_action = null) {
	}
	public function plugin($_addons = null, $_controller = null, $_action = null) {
	}
	function mobileForm() {
		$model = $this->getModel ( $model );
		
		if (IS_POST) {
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if ($Model->create () && $Model->save ()) {
				$this->success ( '保存' . $model ['title'] . '成功！', U ( 'lists?model=' . $model ['name'] ) );
			} else {
				$this->error ( '110000:'.$Model->getError () );
			}
		} else {
			$fields = get_model_attribute ( $model ['id'] );
			// 获取数据
			$id = I ( 'id' );
			$data = M ( get_table_name ( $model ['id'] ) )->find ( $id );
			
			$this->assign ( 'fields', $fields );
			$this->assign ( 'data', $data );
			
			$this->display ( './Application/Home/View/Addons/mobileForm.html' );
		}
	}
	// WAP页面的通用分页HTML
	function _wapPage($count, $row) {
		if ($count <= $row)
			return '';
		
		$page = new \Think\Page ( $count, $row );
		$page->setConfig ( 'theme', '%UP_PAGE% %NOW_PAGE%/%TOTAL_PAGE% %DOWN_PAGE%' );
		$page->setConfig ( 'prev', '上一页<span class="arrow_left"></span>' );
		$page->setConfig ( 'next', '下一页<span class="arrow_right"></span>' );
		return $page->show ();
	}
	function get_package_template() {
		$addons = I ( 'addons' );
		/*
		 * $dir = ONETHINK_ADDON_PATH . $addons . '/View/Package';
		 * $url = SITE_URL . '/Addons/' . $addons . '/View/Package';
		 *
		 * $dirObj = opendir ( $dir );
		 * while ( $file = readdir ( $dirObj ) ) {
		 * if ($file === '.' || $file == '..' || $file == '.svn' || is_file ( $dir . '/' . $file ))
		 * continue;
		 *
		 * $res ['dirName'] = $res ['title'] = $file;
		 *
		 * // 获取配置文件
		 * if (file_exists ( $dir . '/' . $file . '/info.php' )) {
		 * $info = require_once $dir . '/' . $file . '/info.php';
		 * $res = array_merge ( $res, $info );
		 * }
		 *
		 * // 获取效果图
		 * if (file_exists ( $dir . '/' . $file . '/info.php' )) {
		 * $res ['icon'] = __ROOT__ . '/Addons/'.$addons.'/View/Package/' . $file . '/icon.png';
		 * } else {
		 * $res ['icon'] = __IMG__ . '/default.png';
		 * }
		 *
		 * $tempList [] = $res;
		 * unset ( $res );
		 * }
		 * closedir ( $dir );
		 */
		$map ['uid'] = get_mid ();
		$map ['addons'] = $addons;
		
		$Model = D ( 'SucaiTemplate' );
		$tempList = $Model->where ( $map )->select ();
		// dump($tempList);
		if (! $tempList) {
			$default ['addons'] = $addons;
			$default ['template'] = 'default';
			$tempList [] = $default;
		} else {
			$hasDefault = false;
			foreach ( $tempList as $vo ) {
				if ($vo ['template'] == 'default') {
					$hasDefault = true;
					break;
				}
			}
			if ($hasDefault == false) {
				$default ['addons'] = $addons;
				$default ['template'] = 'default';
				$tempList [] = $default;
			}
		}
		// dump($tempList);
		foreach ( $tempList as &$vo ) {
			$info = $this->_readSucaiTemplateInfo ( $vo ['addons'], $vo ['template'] );
			// dump($info);
			$vo ['title'] = $info ['title'];
			$vo ['icon'] = $info ['icon'];
		}
		// dump($tempList);
		$this->ajaxReturn ( $tempList, 'JSON' );
	}
	function getSucaiTemplateInfo() {
		$addons = I ( 'addons' );
		$template = I ( 'template' );
		$res = $this->_readSucaiTemplateInfo ( $addons, $template );
		$this->ajaxReturn ( $res, 'JSON' );
	}
	function _readSucaiTemplateInfo($addons = 'Coupon', $template = 'default') {
		$dir = SITE_PATH . '/SucaiTemplate';
		$infoPath = $dir . '/' . $addons . '/' . $template . '/info.php';
		// dump($infoPath);
		$res ['dirName'] = $template;
		if (file_exists ( $infoPath )) {
			$info = require_once $infoPath;
			$res = array_merge ( $res, $info );
		}
		// 获取效果图
		if (file_exists ( $dir . '/' . $addons . '/' . $template . '.png' )) {
			$res ['icon'] = __ROOT__ . '/SucaiTemplate/' . $addons . '/' . $template . '.png';
		} else {
			$res ['icon'] = __ROOT__ . '/Public/Home/images/no_template_icon.png';
		}
		
		return $res;
	}
}