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

/**
 * ThinkPHP 控制器基类 抽象类
 */
abstract class Controller {
	
	/**
	 * 视图实例对象
	 *
	 * @var view
	 * @access protected
	 */
	protected $view = null;
	
	/**
	 * 控制器参数
	 *
	 * @var config
	 * @access protected
	 */
	protected $config = array ();
	/**
	 * 是否需要登录才能访问
	 *
	 * @var need_login
	 * @access protected
	 */
	protected $need_login = true;
	/**
	 * 是否需要带公众号信息才能访问
	 *
	 * @var need_appinfo
	 * @access protected
	 */
	protected $need_appinfo = true;
	
	/**
	 * 架构函数 取得模板对象实例
	 *
	 * @access public
	 */
	public function __construct() {
		Hook::listen ( 'action_begin', $this->config );
		// 实例化视图类
		$this->view = Think::instance ( 'Think\View' );
		
		if (strtolower ( MODULE_NAME ) != 'install') {
			$this->initSite ();
		}
	}
	
	/**
	 * 模板显示 调用内置的模板引擎显示方法，
	 *
	 * @access protected
	 * @param string $templateFile
	 *        	指定要调用的模板文件
	 *        	默认为空 由系统自动定位模板文件
	 * @param string $charset
	 *        	输出编码
	 * @param string $contentType
	 *        	输出类型
	 * @param string $content
	 *        	输出内容
	 * @param string $prefix
	 *        	模板缓存前缀
	 * @return void
	 */
	protected function display($templateFile = '', $charset = '', $contentType = '', $content = '', $prefix = '') {
		$this->view->display ( $templateFile, $charset, $contentType, $content, $prefix );
	}
	
	/**
	 * 输出内容文本可以包括Html 并支持内容解析
	 *
	 * @access protected
	 * @param string $content
	 *        	输出内容
	 * @param string $charset
	 *        	模板输出字符集
	 * @param string $contentType
	 *        	输出类型
	 * @param string $prefix
	 *        	模板缓存前缀
	 * @return mixed
	 */
	protected function show($content, $charset = '', $contentType = '', $prefix = '') {
		$this->view->display ( '', $charset, $contentType, $content, $prefix );
	}
	
	/**
	 * 获取输出页面内容
	 * 调用内置的模板引擎fetch方法，
	 *
	 * @access protected
	 * @param string $templateFile
	 *        	指定要调用的模板文件
	 *        	默认为空 由系统自动定位模板文件
	 * @param string $content
	 *        	模板输出内容
	 * @param string $prefix
	 *        	模板缓存前缀*
	 * @return string
	 */
	protected function fetch($templateFile = '', $content = '', $prefix = '') {
		return $this->view->fetch ( $templateFile, $content, $prefix );
	}
	
	/**
	 * 创建静态页面
	 *
	 * @access protected
	 *         @htmlfile 生成的静态文件名称
	 *         @htmlpath 生成的静态文件路径
	 * @param string $templateFile
	 *        	指定要调用的模板文件
	 *        	默认为空 由系统自动定位模板文件
	 * @return string
	 */
	protected function buildHtml($htmlfile = '', $htmlpath = '', $templateFile = '') {
		$content = $this->fetch ( $templateFile );
		$htmlpath = ! empty ( $htmlpath ) ? $htmlpath : HTML_PATH;
		$htmlfile = $htmlpath . $htmlfile . C ( 'HTML_FILE_SUFFIX' );
		Storage::put ( $htmlfile, $content, 'html' );
		return $content;
	}
	
	/**
	 * 模板主题设置
	 *
	 * @access protected
	 * @param string $theme
	 *        	模版主题
	 * @return Action
	 */
	protected function theme($theme) {
		$this->view->theme ( $theme );
		return $this;
	}
	
	/**
	 * 模板变量赋值
	 *
	 * @access protected
	 * @param mixed $name
	 *        	要显示的模板变量
	 * @param mixed $value
	 *        	变量的值
	 * @return Action
	 */
	protected function assign($name, $value = '') {
		$this->view->assign ( $name, $value );
		return $this;
	}
	public function __set($name, $value) {
		$this->assign ( $name, $value );
	}
	
	/**
	 * 取得模板显示变量的值
	 *
	 * @access protected
	 * @param string $name
	 *        	模板显示变量
	 * @return mixed
	 */
	public function get($name = '') {
		return $this->view->get ( $name );
	}
	public function __get($name) {
		return $this->get ( $name );
	}
	
	/**
	 * 检测模板变量的值
	 *
	 * @access public
	 * @param string $name
	 *        	名称
	 * @return boolean
	 */
	public function __isset($name) {
		return $this->get ( $name );
	}
	
	/**
	 * 魔术方法 有不存在的操作的时候执行
	 *
	 * @access public
	 * @param string $method
	 *        	方法名
	 * @param array $args
	 *        	参数
	 * @return mixed
	 */
	public function __call($method, $args) {
		if (0 === strcasecmp ( $method, ACTION_NAME . C ( 'ACTION_SUFFIX' ) )) {
			if (method_exists ( $this, '_empty' )) {
				// 如果定义了_empty操作 则调用
				$this->_empty ( $method, $args );
			} elseif (file_exists_case ( $this->view->parseTemplate () )) {
				// 检查是否存在默认模版 如果有直接输出模版
				$this->display ();
			} else {
				E ( L ( '_ERROR_ACTION_' ) . ':' . ACTION_NAME );
			}
		} else {
			E ( __CLASS__ . ':' . $method . L ( '_METHOD_NOT_EXIST_' ) );
			return;
		}
	}
	
	/**
	 * 操作错误跳转的快捷方法
	 *
	 * @access protected
	 * @param string $message
	 *        	错误信息
	 * @param string $jumpUrl
	 *        	页面跳转地址
	 * @param mixed $ajax
	 *        	是否为Ajax方式 当数字时指定跳转时间
	 * @return void
	 */
	protected function error($message = '', $jumpUrl = '', $ajax = false) {
		$this->dispatchJump ( $message, 0, $jumpUrl, $ajax );
	}
	
	/**
	 * 操作成功跳转的快捷方法
	 *
	 * @access protected
	 * @param string $message
	 *        	提示信息
	 * @param string $jumpUrl
	 *        	页面跳转地址
	 * @param mixed $ajax
	 *        	是否为Ajax方式 当数字时指定跳转时间
	 * @return void
	 */
	protected function success($message = '', $jumpUrl = '', $ajax = false) {
		$this->dispatchJump ( $message, 1, $jumpUrl, $ajax );
	}
	
	/**
	 * Ajax方式返回数据到客户端
	 *
	 * @access protected
	 * @param mixed $data
	 *        	要返回的数据
	 * @param String $type
	 *        	AJAX返回数据格式
	 * @param int $json_option
	 *        	传递给json_encode的option参数
	 * @return void
	 */
	protected function ajaxReturn($data, $type = '', $json_option = 0) {
		if (empty ( $type ))
			$type = C ( 'DEFAULT_AJAX_RETURN' );
		switch (strtoupper ( $type )) {
			case 'JSON' :
				
				// 返回JSON数据格式到客户端 包含状态信息
				header ( 'Content-Type:application/json; charset=utf-8' );
				exit ( json_encode ( $data, $json_option ) );
			case 'XML' :
				
				// 返回xml格式数据
				header ( 'Content-Type:text/xml; charset=utf-8' );
				exit ( xml_encode ( $data ) );
			case 'JSONP' :
				
				// 返回JSON数据格式到客户端 包含状态信息
				header ( 'Content-Type:application/json; charset=utf-8' );
				$handler = isset ( $_GET [C ( 'VAR_JSONP_HANDLER' )] ) ? $_GET [C ( 'VAR_JSONP_HANDLER' )] : C ( 'DEFAULT_JSONP_HANDLER' );
				exit ( $handler . '(' . json_encode ( $data, $json_option ) . ');' );
			case 'EVAL' :
				
				// 返回可执行的js脚本
				header ( 'Content-Type:text/html; charset=utf-8' );
				exit ( $data );
			default :
				
				// 用于扩展其他返回格式数据
				Hook::listen ( 'ajax_return', $data );
		}
	}
	
	/**
	 * Action跳转(URL重定向） 支持指定模块和延时跳转
	 *
	 * @access protected
	 * @param string $url
	 *        	跳转的URL表达式
	 * @param array $params
	 *        	其它URL参数
	 * @param integer $delay
	 *        	延时跳转的时间 单位为秒
	 * @param string $msg
	 *        	跳转提示信息
	 * @return void
	 */
	protected function redirect($url, $params = array(), $delay = 0, $msg = '') {
		$url = U ( $url, $params );
		redirect ( $url, $delay, $msg );
	}
	
	/**
	 * 默认跳转操作 支持错误导向和正确跳转
	 * 调用模板显示 默认为public目录下面的success页面
	 * 提示页面为可配置 支持模板标签
	 *
	 * @param string $message
	 *        	提示信息
	 * @param Boolean $status
	 *        	状态
	 * @param string $jumpUrl
	 *        	页面跳转地址
	 * @param mixed $ajax
	 *        	是否为Ajax方式 当数字时指定跳转时间
	 * @access private
	 * @return void
	 */
	private function dispatchJump($message, $status = 1, $jumpUrl = '', $ajax = false) {
		$code = 0;
		if (strpos ( $message, ':' ) !== false) {
			list ( $code, $message ) = explode ( ':', $message, 2 );
		}
		$this->assign ( 'code', $code );
		// 提示信息
		if (true === $ajax || IS_AJAX) { // AJAX提交
			$data = is_array ( $ajax ) ? $ajax : array ();
			$data ['info'] = $message;
			$data ['status'] = $status;
			$data ['code'] = $code;
			$data ['url'] = $jumpUrl;
			$this->ajaxReturn ( $data );
		}
		
		if (is_int ( $ajax ))
			$this->assign ( 'waitSecond', $ajax );
		if (! empty ( $jumpUrl ))
			$this->assign ( 'jumpUrl', $jumpUrl );
			// 提示标题
		$this->assign ( 'msgTitle', $status ? L ( '_OPERATION_SUCCESS_' ) : L ( '_OPERATION_FAIL_' ) );
		// 如果设置了关闭窗口，则提示完毕后自动关闭窗口
		if ($this->get ( 'closeWin' ))
			$this->assign ( 'jumpUrl', 'javascript:window.close();' );
		$this->assign ( 'status', $status ); // 状态
		                                     // 保证输出不受静态缓存影响
		C ( 'HTML_CACHE_ON', false );
		if ($status) { // 发送成功信息
			$this->assign ( 'message', $message ); // 提示信息
			                                       // 成功操作后默认停留1秒
			if (! isset ( $this->waitSecond ))
				$this->assign ( 'waitSecond', '1' );
				// 默认操作成功自动返回操作前页面
			if (! isset ( $this->jumpUrl ))
				$this->assign ( "jumpUrl", $_SERVER ["HTTP_REFERER"] );
			$this->display ( C ( 'TMPL_ACTION_SUCCESS' ) );
		} else {
			$this->assign ( 'error', $message ); // 提示信息
			
			if (! isset ( $this->waitSecond )) {
				if ($code > 0) { // 有错误编码时时间延长至10秒
					$this->assign ( 'waitSecond', '10' );
				} else { // 发生错误时候默认停留3秒
					$this->assign ( 'waitSecond', '3' );
				}
			}
			// 默认发生错误的话自动返回上页
			if (! isset ( $this->jumpUrl ))
				$this->assign ( 'jumpUrl', "javascript:history.back(-1);" );
			$this->display ( C ( 'TMPL_ACTION_ERROR' ) );
			// 中止执行 避免出错后继续执行
			exit ();
		}
	}
	
	/**
	 * 析构方法
	 *
	 * @access public
	 */
	public function __destruct() {
		// 执行后续操作
		Hook::listen ( 'action_end' );
	}
	/**
	 * 应用信息初始化
	 *
	 * @access private
	 * @return void
	 */
	protected function initSite() {
		/* 读取数据库中的配置 */
		$config = S ( 'DB_CONFIG_DATA' );
		if (! $config) {
			$config = api ( 'Config/lists' );
			S ( 'DB_CONFIG_DATA', $config );
		}
		C ( $config ); // 添加全站配置
		
		if (! C ( 'WEB_SITE_CLOSE' ) && strtolower ( MODULE_NAME ) != 'admin') {
			$this->error ( '100000:站点已经关闭，请稍后访问~' );
		}
		
		$diff = array (
				'_addons' => 1,
				'_controller' => 1,
				'_action' => 1,
				'm' => 1,
				'id' => 1 
		);
		
		$GLOBALS ['get_param'] = $this->get_param = array_diff_key ( $_GET, $diff );
		$this->assign ( 'get_param', $this->get_param );
		
		// js,css的版本
		if (APP_DEBUG) {
			defined ( 'SITE_VERSION' ) or define ( 'SITE_VERSION', time () );
		} else {
			defined ( 'SITE_VERSION' ) or define ( 'SITE_VERSION', C ( 'SYSTEM_UPDATRE_VERSION' ) );
		}
	}
	
	// ***************************通用的模型数据操作 begin 凡星********************************/
	public function getModel($model = null) {
		$model || $model = CONTROLLER_NAME;
		$model || $model = $_REQUEST ['model'];
		$model || $this->error ( '100001:模型名标识必须！' );
		if (is_numeric ( $model )) {
			$model = M ( 'model' )->find ( $model );
		} else {
			$model = getModelByName ( $model );
		}
		if (empty ( $model )) {
			$model = getModelByName ( MODULE_NAME );
		}
		$this->assign ( 'model', $model );
		// dump ( $model );
		return $model;
	}
	
	/**
	 * 显示指定模型列表数据
	 *
	 * @param String $model
	 *        	模型标识
	 * @author 凡星
	 */
	public function common_lists($model = null, $page = 0, $templateFile = '', $order = '') {
		// 获取模型信息
		is_array ( $model ) || $model = $this->getModel ( $model );
		
		$list_data = $this->_get_model_list ( $model, $page, $order );
		$this->assign ( $list_data );
		// dump($list_data);
		
		$templateFile || $templateFile = $model ['template_list'] ? $model ['template_list'] : '';
		$this->display ( $templateFile );
	}
	public function common_export($model = null, $order = 'id desc', $return = false) {
		set_time_limit ( 0 );
		// 获取模型信息
		is_array ( $model ) || $model = $this->getModel ( $model );
		// 解析列表规则
		$list_data = $this->_list_grid ( $model );
		
		$grids = $list_data ['list_grids'];
		$fields = $list_data ['fields'];
		
		foreach ( $grids as $v ) {
			if ($v ['come_from'] == 1) {
				array_pop ( $grids );
			} else {
				$ht [$v ['name']] = $v ['title'];
			}
		}
		$dataArr [0] = $ht;
		
		// 搜索条件
		$map = $this->_search_map ( $model, $fields );
		
		$name = parse_name ( get_table_name ( $model ['id'] ), true );
		$data = M ( $name )->field ( empty ( $fields ) ? true : $fields )->where ( $map )->order ( $order )->select ();
		
		$dataTable = D ( 'Common/Model' )->getFileInfo ( $model );
		$data = $this->parseData ( $data, $dataTable->fields, $dataTable->list_grid, $dataTable->config );
		
		if ($data) {
			foreach ( $data as &$vo ) {
				foreach ( $ht as $key => $val ) {
					$newArr [$key] = empty ( $vo [$key] ) ? ' ' : $vo [$key];
				}
				$vo = $newArr;
			}
			
			$dataArr = array_merge ( $dataArr, $data );
		}
		
		if ($return)
			return $dataArr;
		else
			outExcel ( $dataArr, $map ['module'] );
	}
	public function common_del($model = null, $ids = null) {
		is_array ( $model ) || $model = $this->getModel ( $model );
		
		! empty ( $ids ) || $ids = I ( 'id' );
		! empty ( $ids ) || $ids = array_filter ( array_unique ( ( array ) I ( 'ids', 0 ) ) );
		! empty ( $ids ) || $this->error ( '100002:请选择要操作的数据!' );
		
		$Model = M ( get_table_name ( $model ['id'] ) );
		$map ['id'] = array (
				'in',
				$ids 
		);
		
		// 插件里的操作自动加上Token限制
		$token = get_token ();
		if (defined ( 'ADDON_PUBLIC_PATH' ) && ! empty ( $token )) {
			$map ['token'] = $token;
		}
		
		if ($Model->where ( $map )->delete ()) {
			// 清空缓存
			method_exists ( $Model, 'clear' ) && $Model->clear ( $ids, 'del' );
			
			$this->success ( '删除成功' );
		} else {
			$this->error ( '100003:删除失败！' );
		}
	}
	public function common_edit($model = null, $id = 0, $templateFile = '') {
		is_array ( $model ) || $model = $this->getModel ( $model );
		$id || $id = I ( 'id' );
		
		// 获取数据
		$data = M ( get_table_name ( $model ['id'] ) )->find ( $id );
		$data || $this->error ( '100004:数据不存在！' );
		
		$token = get_token ();
		if (isset ( $data ['token'] ) && $token != $data ['token'] && defined ( 'ADDON_PUBLIC_PATH' )) {
			$this->error ( '100005:非法访问！' );
		}
		
		if (IS_POST) {
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if ($Model->create () && $Model->save ()) {
				$this->_saveKeyword ( $model, $id );
				
				// 清空缓存
				method_exists ( $Model, 'clear' ) && $Model->clear ( $id, 'edit' );
				
				$this->success ( '保存' . $model ['title'] . '成功！', U ( 'lists?model=' . $model ['name'], $this->get_param ) );
			} else {
				$this->error ( '100006:' . $Model->getError () );
			}
		} else {
			$fields = get_model_attribute ( $model ['id'] );
			$this->assign ( 'fields', $fields );
			$this->assign ( 'data', $data );
			
			$templateFile || $templateFile = $model ['template_edit'] ? $model ['template_edit'] : '';
			$this->display ( $templateFile );
		}
	}
	public function common_add($model = null, $templateFile = '') {
		is_array ( $model ) || $model = $this->getModel ( $model );
		if (IS_POST) {
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			$Model->create ();
			$Model->getError () || $id = $Model->add ();
			if ($id) {
				$this->_saveKeyword ( $model, $id );
				
				// 清空缓存
				method_exists ( $Model, 'clear' ) && $Model->clear ( $id, 'add' );
				
				$this->success ( '添加' . $model ['title'] . '成功！', U ( 'lists?model=' . $model ['name'], $this->get_param ) );
			} else {
				$this->error ( '100007:' . $Model->getError () );
			}
		} else {
			$fields = get_model_attribute ( $model ['id'] );
			$this->assign ( 'fields', $fields );
			
			$templateFile || $templateFile = $model ['template_add'] ? $model ['template_add'] : '';
			$this->display ( $templateFile );
		}
	}
	
	// 通用的保存关键词方法
	public function _saveKeyword($model, $id) {
		if (isset ( $_POST ['keyword'] ) && $model ['name'] != 'keyword' && defined ( 'MODULE_NAME' ) && ! isset ( $_REQUEST ['keyword_no_deal'] )) {
			D ( 'Common/Keyword' )->set ( $_POST ['keyword'], MODULE_NAME, $id, $_POST ['keyword_type'] );
		}
	}
	// 判断奖品库选择器 数量是否大于库存
	function checkPriceNum($prizeValue) {
		$data = array ();
		$prizeData = explode ( ',', $prizeValue );
		foreach ( $prizeData as $key => $value ) {
			$keyArr = explode ( ':', $value );
			if (empty ( $keyArr [0] ))
				continue;
			$total_count = 0;
			$num = $keyArr [2];
			$title = '';
			if ($keyArr [0] == 'coupon') {
				$pdata = D ( 'Addons://Coupon/Coupon' )->getInfo ( $keyArr [1] );
				$title = $pdata ['title'];
				$total_count = $pdata ['num'];
			} elseif ($keyArr [0] == 'shopCoupon' && is_install ( "ShopCoupon" )) {
				$pdata = D ( 'Addons://ShopCoupon/ShopCoupon' )->getInfo ( $keyArr [1] );
				$title = $pdata ['title'];
				$total_count = $pdata ['num'];
			} elseif ($keyArr [0] == 'realPrize') {
				$pdata = D ( 'Addons://RealPrize/RealPrize' )->getInfo ( $keyArr [1] );
				$total_count = $pdata ['prize_count'];
				$title = $pdata ['prize_name'];
			} elseif ($keyArr [0] == 'cardVouchers') {
				// 无库存，不判断
				$title = $pdata ['title'];
				if (intval ( $num ) <= 0) {
					$this->error ( '100008:奖品 “' . $title . '” 的数量不能小于0' );
				}
				continue;
			} elseif ($keyArr [0] == 'redBag') {
				$pdata = D ( 'Addons://RedBag/RedBag' )->getInfo ( $keyArr [1] );
				$title = $pdata ['act_name'];
				$total_count = $pdata ['total_num'];
			} elseif ($keyArr [0] == 'points') {
				// 判断数量是否小于0
				$title = '积分';
				$num = $keyArr [3];
				if (intval ( $num ) <= 0) {
					$this->error ( '100008:奖品 “' . $title . '” 的数量不能小于0' );
				}
				continue;
			}
			if (intval ( $num ) <= 0) {
				$this->error ( '100009:奖品 “' . $title . '” 的数量不能小于0' );
			}
			if ($num > $total_count) {
				$this->error ( '100010:奖品 “' . $title . '” 的数量不能大于库存数量' );
			}
		}
	}
	protected function checkAttr($Model, $model_id) {
		$fields = get_model_attribute ( $model_id );
		$validate = $auto = array ();
		foreach ( $fields as $key => $attr ) {
			
			if ($attr ['type'] == 'prize' && $_POST [$key]) {
				// 判断奖品库选择器 数量是否大于库存
				$this->checkPriceNum ( $_POST [$key] );
			}
			if ($attr ['is_must']) { // 必填字段
			                         // 表单不存在字段也要验证
				$validate [] = array (
						$attr ['name'],
						'require',
						$attr ['title'] . '必须!',
						1 
				);
			}
			// 自动验证规则
			if (! empty ( $attr ['validate_rule'] ) || $attr ['validate_type'] == 'unique') {
				$validate [] = array (
						$attr ['name'],
						$attr ['validate_rule'],
						$attr ['error_info'] ? $attr ['error_info'] : $attr ['title'] . '验证错误',
						0,
						$attr ['validate_type'],
						$attr ['validate_time'] 
				);
			}
			// 自动完成规则
			if (! empty ( $attr ['auto_rule'] )) {
				$auto [] = array (
						$attr ['name'],
						$attr ['auto_rule'],
						$attr ['auto_time'],
						$attr ['auto_type'] 
				);
			} elseif ('checkbox' == $attr ['type'] || 'dynamic_checkbox' == $attr ['type']) { // 多选型
				$auto [] = array (
						$attr ['name'],
						'arr2str',
						3,
						'function' 
				);
			} elseif ('datetime' == $attr ['type']) { // 时间型
				$auto [] = array (
						$attr ['name'],
						'strtotime',
						3,
						'function' 
				);
			} elseif ('date' == $attr ['type']) { // 日期型
				$auto [] = array (
						$attr ['name'],
						'strtotime',
						3,
						'function' 
				);
			} elseif ('mult_picture' == $attr ['type']) { // 多图片
				$auto [] = array (
						$attr ['name'],
						'arr2str',
						3,
						'function' 
				);
			}
		}
		return $Model->validate ( $validate )->auto ( $auto );
	}
	protected function parseDataByField($val, $field) {
		switch ($field ['type']) {
			case 'date' :
				$val = day_format ( $val );
				break;
			case 'datetime' :
				$val = time_format ( $val );
				break;
			case 'bool' :
			case 'select' :
			case 'radio' :
				if (! empty ( $field ['extra'] )) {
					$extra = parse_config_attr ( $field ['extra'] );
					$val = isset ( $extra [$val] ) ? $extra [$val] : $val;
				}
				break;
			case 'checkbox' :
				if (! empty ( $field ['extra'] )) {
					$extra = parse_config_attr ( $field ['extra'] );
					
					$valArr = explode ( ',', $val );
					foreach ( $valArr as $v ) {
						$res [] = isset ( $extra [$v] ) ? $extra [$v] : $v;
					}
					
					$val = implode ( ', ', $res );
				}
				
				break;
			case 'picture' :
				$val = get_img_html ( $val );
				break;
			case 'file' :
				$val = get_file_html ( $val );
				break;
			case 'cascade' :
				break;
			case 'mult_picture' :
				break;
			case 'dynamic_select' :
				break;
			case 'dynamic_checkbox' :
				break;
			case 'material' :
				break;
			case 'prize' :
				break;
			case 'news' :
				break;
			case 'image' :
				break;
			case 'user' :
				$val = get_nickname ( $val );
				break;
			case 'users' :
				$valArr = explode ( ',', $val );
				foreach ( $valArr as $v ) {
					$res [] = get_nickname ( $v );
				}
				
				$val = implode ( ', ', $res );
				break;
			case 'admin' :
				$val = get_nickname ( $val );
				break;
		}
		
		return $val;
	}
	protected function parseData($datas, $fields, $grid, $model) {
		foreach ( $datas as &$data ) {
			foreach ( $grid as $name => $g ) {
				$val = $data [$name];
				$field = $fields [$name];
				if (isset ( $g ['href'] ) && ! empty ( $g ['href'] )) { // 链接支持
					$valArr = [ ];
					foreach ( $g ['href'] as $link ) {
						$href = $link ['url'];
						
						$show = $link ['title'];
						// 增加跳转方式处理 weiphp
						$target = '_self';
						if (preg_match ( '/target=(\w+)/', $href, $matches )) {
							$target = $matches [1];
							$href = str_replace ( '&' . $matches [0], '', $href );
						}
						
						// 替换系统特殊字符串
						$href = str_replace ( array (
								'[DELETE]',
								'[EDIT]',
								'[MODEL]' 
						), array (
								'del?id=[id]&model=[MODEL]',
								'edit?id=[id]&model=[MODEL]',
								$model ['name'] 
						), $href );
						
						// 替换数据变量
						$replace_data = array_merge ( $_REQUEST, $data );
						$href = preg_replace_callback ( '/\[([a-z_]+)\]/', function ($match) use ($replace_data) {
							return $replace_data [$match [1]];
						}, $href );
						
						// 兼容多种写法
						if (strpos ( $href, '?' ) === false && strpos ( $href, '&' ) !== false) {
							$href = preg_replace ( "/&/i", "?", $href, 1 );
						}
						
						if ($show == '删除') {
							$valArr [] = '<a class="confirm"   href="' . urldecode ( U ( $href, $GLOBALS ['get_param'] ) ) . '">' . $show . '</a>';
						} else if ($show == '复制链接') {
							$paramArrs = $GLOBALS ['get_param'];
							unset ( $paramArrs ['mdm'] );
							$publicid = get_token_appinfo ( '', 'id' );
							$valArr [] = '<a class="list_copy_link" id="copyLink_' . $data ['id'] . '"   data-clipboard-text="' . urldecode ( U ( $href, $paramArrs ) ) . '&publicid=' . $publicid . '">' . $show . '</a>';
						} else {
							// 排除GET里的参数影响到已赋值的参数
							$url_param = array ();
							foreach ( $GLOBALS ['get_param'] as $key => $gp ) {
								if (strpos ( $href, $key . '=' ) === false && $key != 'p' ) {
									$url_param [$key] = $gp;
								}
							}
							$valArr [] = '<a  target="' . $target . '" href="' . urldecode ( U ( $href, $url_param ) ) . '">' . $show . '</a>';
						}
					}
					$val = implode ( ' ', $valArr );
				} elseif (! empty ( $g ['function'] ) && $g ['function'] != '') {
					$val = call_user_func ( $g ['function'], $val );
				} else { // get_name_by_status方法不再用，下面按字段类型自动做数据转换，不再需要人工转换
					$val = $this->parseDataByField ( $val, $field );
				}
				
				$data [$name] = $val;
			}
		}
		return $datas;
	}
	
	// 获取模型列表数据
	public function _get_model_list($model = null, $page = 0, $order = '') {
		if (empty ( $model ))
			return false;
		
		$dataTable = D ( 'Common/Model' )->getFileInfo ( $model );
		
		$this->assign ( 'add_button', $dataTable->config ['add_button'] );
		$this->assign ( 'del_button', $dataTable->config ['del_button'] );
		$this->assign ( 'search_button', $dataTable->config ['search_button'] );
		$this->assign ( 'check_all', $dataTable->config ['check_all'] );
		
		$page || $page = I ( 'p', 1, 'intval' ); // 默认显示第一页数据
		                                         
		// 解析列表规则
		$list_data = $this->_list_grid ( $model );
		$fields = $list_data ['fields'];
		
		// 搜索条件
		$map = $this->_search_map ( $model, $fields );
		
		$row = empty ( $model ['list_row'] ) ? 20 : $model ['list_row'];
		
		// 读取模型数据列表
		if (empty ( $order ) && isset ( $_REQUEST ['order'] )) {
			$order = I ( 'order' ) . ' ' . I ( 'by' );
		}
		if ($model ['name'] != 'user') {
			empty ( $fields ) || in_array ( 'id', $fields ) || array_push ( $fields, 'id' );
			empty ( $order ) && $order = 'id desc';
		} else {
			empty ( $fields ) || in_array ( 'uid', $fields ) || array_push ( $fields, 'uid' );
			empty ( $order ) && $order = 'uid desc';
		}
		// dump ( $order );
		$name = $dataTable->config ['name'];
		$data = M ( $name )->field ( empty ( $fields ) ? true : $fields )->where ( $map )->order ( $order )->page ( $page, $row )->select ();
		// dump ( $data );
		$data = $this->parseData ( $data, $dataTable->fields, $dataTable->list_grid, $dataTable->config );
		// dump ( $data );
		// lastsql ();
		$list_data ['list_data'] = $data;
		
		/* 查询记录总数 */
		$count = M ( $name )->where ( $map )->count ();
		// 分页
		if ($count > $row) {
			$page = new \Think\Page ( $count, $row );
			$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
			$list_data ['_page'] = $page->show ();
		}
		// dump($list_data);
		return $list_data;
	}
	// 获取模型列表数据
	public function _get_model_list_bar($model = null, $page = 0, $order = 'id desc') {
		if (empty ( $model ))
			return false;
		
		$page || $page = I ( 'p', 1, 'intval' ); // 默认显示第一页数据
		                                         
		// 解析列表规则
		$list_data = $this->_list_grid ( $model );
		$fields = $list_data ['fields'];
		
		// 搜索条件
		$map = $this->_search_map ( $model, $fields );
		
		$row = empty ( $model ['list_row'] ) ? 20 : $model ['list_row'];
		
		// 读取模型数据列表
		
		if ($model ['name'] != 'user') {
			empty ( $fields ) || in_array ( 'id', $fields ) || array_push ( $fields, 'id' );
		} else {
			empty ( $fields ) || in_array ( 'uid', $fields ) || array_push ( $fields, 'uid' );
			$order = 'uid desc';
		}
		
		$name = parse_name ( get_table_name ( $model ['id'] ), true );
		$data = M ( $name )->field ( empty ( $fields ) ? true : $fields )->where ( $map )->order ( $order )->page ( $page, $row )->select ();
		$list_data ['list_data'] = $data;
		
		/* 查询记录总数 */
		$count = M ( $name )->where ( $map )->count ();
		// 分页
		if ($count > $row) {
			$page = new \Think\Page ( $count, $row );
			$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
			$list_data ['_page'] = $page->show ();
		}
		
		return $list_data;
	}
	// 解析列表规则
	public function _list_grid($model) {
		// 过滤重复字段信息
		$obj = D ( 'Common/Model' )->getFileInfo ( $model );
		
		$fields = array_keys ( $obj->list_grid );
		$model_fields = array_keys ( $obj->fields );
		
		in_array ( 'id', $model_fields ) || array_push ( $model_fields, 'id' );
		$fields = array_intersect ( $fields, $model_fields );
		
		$res ['fields'] = array_unique ( $fields );
		$res ['list_grids'] = $obj->list_grid;
		return $res;
	}
	public function _search_map($model = [], $fields = []) {
		$map = array ();
		
		// 插件里的操作自动加上Token限制
		$token = get_token ();
		if (defined ( 'ADDON_PUBLIC_PATH' ) && ! empty ( $token )) {
			$map ['token'] = $token;
		}
		
		// 自定义的条件搜索
		$conditon = session ( 'common_condition' );
		if (! empty ( $conditon )) {
			$map = array_merge ( $map, $conditon );
		}
		session ( 'common_condition', null );
		
		// 关键字搜索
		$key = $model ['search_key'] ? $model ['search_key'] : 'title';
		$keyArr = explode ( ':', $key );
		$key = $keyArr [0];
		$placeholder = isset ( $keyArr [1] ) ? $keyArr [1] : '请输入关键字';
		$this->assign ( 'placeholder', $placeholder );
		$this->assign ( 'search_key', $key );
		
		if (isset ( $_REQUEST [$key] ) && ! isset ( $map [$key] )) {
			$map [$key] = array (
					'like',
					'%' . htmlspecialchars ( $_REQUEST [$key] ) . '%' 
			);
			unset ( $_REQUEST [$key] );
		}
		
		// 条件搜索
		foreach ( $_REQUEST as $name => $val ) {
			if (! isset ( $map [$name] ) && in_array ( $name, $fields )) {
				$map [$name] = $val;
			}
		}
		
		return $map;
	}
	/*
	 * 导出数据
	 */
	public function outExcel($dataArr, $fileName = '', $sheet = false) {
		require_once VENDOR_PATH . 'download-xlsx.php';
		export_csv ( $dataArr, $fileName, $sheet );
		unset ( $sheet );
		unset ( $dataArr );
	}
	public function inExcel() {
		require_once VENDOR_PATH . '/PHPExcel.php';
		require_once VENDOR_PATH . 'PHPExcel/IOFactory.php';
		require_once VENDOR_PATH . 'PHPExcel/Reader/Excel5.php';
	}
	/*
	 * 在大并时优化插入数据性能，该函数需要两次调用：
	 * 一是在插入数据的地方调用，这时table和data两个参数不能为空
	 * 二是管理在后台查看列表时调用，这时table参数不为空，但data为空，这些防止有部分数据在缓存里无法到达数据库
	 */
	function delayAdd($table = '', $data = array(), $delay = 10) {
		$data_key = 'common_delayAdd_data_' . $table;
		$time_key = 'common_delayAdd_time_' . $table;
		
		$last_time = S ( $time_key );
		
		$dataArr = ( array ) S ( $data_key );
		empty ( $data ) || $dataArr [] = $data;
		
		if (! empty ( $data ) && ($last_time === false || NOW_TIME - $last_time < $delay)) {
			$msg ['status'] = S ( $data_key, $dataArr );
			$msg ['msg'] = 'add_cache';
		} elseif (! empty ( $dataArr )) {
			$msg ['status'] = M ( $table )->addAll ( $dataArr );
			if ($msg ['status']) {
				S ( $data_key, array () );
				S ( $time_key, NOW_TIME );
				$msg ['msg'] = 'add_db_success';
			} else {
				$msg ['msg'] = 'add_db_fail';
			}
		} else {
			$msg ['status'] = 0;
			$msg ['msg'] = 'No data install';
		}
		
		return $msg;
	}
	function addLog($content = '', $uid = 0) {
		$uid == 0 && $uid = session ( 'mid' );
		
		$log ['uid'] = $uid;
		$log ['ip'] = get_client_ip ( 0, true );
		$log ['mod'] = MODULE_NAME;
		$log ['cTime'] = NOW_TIME;
		$log ['content'] = $content;
		
		M ( 'admin_log' )->add ( $log );
	}
}
// 设置控制器别名 便于升级

class_alias ( 'Think\Controller', 'Think\Action' );