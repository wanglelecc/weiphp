<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think;

use Think\Controller;

/**
 * ThinkPHP 控制器基类 抽象类
 */
class WidgetController extends Controller {
	
	/**
	 * 架构函数 取得模板对象实例
	 *
	 * @access public
	 */
	public function __construct() {
		parent::__construct ();
		
		// dump ( WPID );
		// 控制器初始化
		if (method_exists ( $this, '_initialize' ))
			$this->_initialize ();
	}
	// 初始化操作
	function _initialize() {
	}
}
// 设置控制器别名 便于升级
class_alias ( 'Think\Controller', 'Think\Action' );