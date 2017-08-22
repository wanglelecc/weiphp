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
class ManageBaseController extends Controller {
	
	/**
	 * 视图实例对象
	 *
	 * @var view
	 * @access protected
	 */
	protected $mid = 0;
	protected $uid = 0;
	protected $user = array ();
	protected $top_more_button = array ();
	protected $get_param = array ();
	
	/**
	 * 控制器参数
	 *
	 * @var config
	 * @access protected
	 */
	protected $config = array ();
	
	/**
	 * 架构函数 取得模板对象实例
	 *
	 * @access public
	 */
	public function __construct() {
		parent::__construct ();
		
		$index_3 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME );
		if ($index_3 != 'home/weixin/index' && MODULE_NAME != 'Admin') { // 微信客户端请求的用户初始化在home/weixin/index里实现，这里不作处理
			if ($this->need_login) {
				$user = $this->initUser ();
				$is_follow = isWeixinBrowser ();
				if ($user == false && ! $is_follow) {
					// dump($user);exit;
					$froward = Cookie ( '__forward__' );
					empty ( $froward ) && Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] );
					$this->error ( '100011:请先登录', U ( 'Home/User/login' ) );
				}
			}
			$info = [ ];
			if ($this->need_appinfo) {
				$info = $this->initPublic ();
				if ($info == false) {
					$this->error ( '100012:公众号信息缺失', U ( 'Home/Apps/lists' ) );
				}
			}
			
			// 权限验证，原则：开放一切未禁止的页面
			if ($this->mid > 0 && ! checkRule ( '', $this->mid )) {
				$this->error ( '100013:您无权访问！' );
			}
		}
		
		$this->initWeb ();
		
		if (IS_POST) {
			$content = GetCurUrl () . PHP_EOL;
			$content .= 'POST: ' . var_export ( $_POST, true ) . '; ' . PHP_EOL;
			
			$this->addLog ( $content );
		}
		
		// dump ( WPID );
		// 控制器初始化
		if (method_exists ( $this, '_initialize' ))
			$this->_initialize ();
	}
	// 初始化操作
	public function _initialize() {
	}
	
	// 初始化公众号信息
	private function initPublic() {
		if (! defined ( 'WPID' ) && ! (WPID > 0))
			return false;
		
		$info = D ( 'Common/Apps' )->getInfo ( WPID );
		if (! $info)
			return false;
		
		$GLOBALS ['app_info'] = $info;
		// 公众号下拉切换
		$myPublics = D ( 'Common/Apps' )->getMyPublics ( $this->mid, $info ['type'] );
		
		// 公众号管理权限判断
		$isWeixin = isWeixinBrowser ();
		if ($info ['uid'] != $this->mid && ! isset ( $myPublics [WPID] ) && ! $isWeixin) {
			$this->error ( '100014:无权限管理该号' );
		}
		
		unset ( $myPublics [$info ['id']] );
		$this->assign ( 'myPublics', $myPublics );
		
		$param = $_GET;
		$param ['publicid'] = $info ['id'];
		$param ['m'] = MODULE_NAME;
		$param ['c'] = CONTROLLER_NAME;
		$param ['a'] = ACTION_NAME;
		$param ['uid'] = $this->mid;
		$tongji_code .= '<script>$.post("' . SITE_URL . '/log.php?' . http_build_query ( $param ) . '");</script>';
		$this->assign ( 'tongji_code', $tongji_code );
		if ($info ['type'] < 4) {
			// 公众号接口权限
			$config = S ( 'PUBLIC_AUTH_' . $info ['type'] );
			if (! $config) {
				$config = M ( 'apps_auth' )->getField ( 'name,type_' . intval ( $info ['type'] ) . ' as val' );
				
				S ( 'PUBLIC_AUTH_' . $info ['type'], $config, 86400 );
			}
			C ( $config ); // 公众号接口权限
		}
		if ($info ['uid'] == $this->mid) {
			$this->assign ( 'page_title', $info ['public_name'] ); // 用公众号名作为默认的页面标题
			$this->assign ( 'public_info', $info ); // 通用公众号信息
		}
		
		return $info;
	}
	// 初始化用户信息
	private function initUser() {
		$is_login = is_login ();
		if (! $is_login)
			return false;
		
		$uid = session ( 'mid' );
		
		// 当前登录者
		$GLOBALS ['mid'] = $this->mid = intval ( $uid );
		$myinfo = get_userinfo ( $this->mid );
		$GLOBALS ['myinfo'] = $myinfo;
		
		// 当前访问对象的uid
		$GLOBALS ['uid'] = $this->uid = intval ( $_REQUEST ['uid'] == 0 ? $this->mid : $_REQUEST ['uid'] );
		
		$this->assign ( 'mid', $this->mid ); // 登录者
		$this->assign ( 'uid', $this->uid ); // 访问对象
		$this->assign ( 'myinfo', $GLOBALS ['myinfo'] ); // 访问对象
		
		$index_1 = strtolower ( MODULE_NAME . '/*/*' );
		$index_2 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/*' );
		$index_3 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME );
		
		$this->assign ( 'reg_audit_switch', C ( 'REG_AUDIT' ) );
		
		// 判断运营人员是否初始化、审核，跳转到对应的页面
		if (IS_GET && $index_2 != 'home/apps/*' && $index_2 != 'home/appslink/*' && $index_3 != 'home/user/logout') {
			if ($GLOBALS ['myinfo'] ['is_init'] == 0) {
				redirect ( U ( 'Home/Apps/add', array (
						'from' => 1 
				) ) );
			} else if ($GLOBALS ['myinfo'] ['is_audit'] == 0 && ! C ( 'REG_AUDIT' )) {
				redirect ( U ( 'Home/Apps/waitAudit' ) );
			}
		}
		return $GLOBALS ['myinfo'];
	}
	/**
	 * 运营管理员界面初始化
	 *
	 * @access private
	 * @return void
	 */
	private function initWeb() {
		if (! IS_GET) {
			return false;
		}
		
		// 通用表单的控制开关
		$this->assign ( 'add_button', checkRule ( '__MODULE__/__CONTROLLER__/add', $this->mid ) );
		$this->assign ( 'del_button', checkRule ( '__MODULE__/__CONTROLLER__/del', $this->mid ) );
		$this->assign ( 'search_button', checkRule ( '__MODULE__/__CONTROLLER__/search', $this->mid ) );
		$this->assign ( 'check_all', checkRule ( '__MODULE__/__CONTROLLER__/del', $this->mid ) );
		$this->assign ( 'top_more_button', $this->top_more_button );
		
		/* 管理中心的导航 */
		$menus = D ( 'Common/Menu' )->get ();
		$this->assign ( $menus );
		
		$this->_nav ();
	}
	function _nav() {
		$addon = D ( 'Home/Addons' )->getInfoByName ( MODULE_NAME );
		
		$nav = array ();
		if ($addon ['has_adminlist']) {
			$res ['title'] = $addon ['title'];
			$res ['url'] = U ( 'lists' );
			$res ['class'] = ACTION_NAME == 'lists' ? 'current' : '';
			$nav [] = $res;
		}
		if (file_exists ( ONETHINK_ADDON_PATH . MODULE_NAME . '/config.php' )) {
			$res ['title'] = '功能配置';
			$res ['url'] = U ( 'config' );
			$res ['class'] = ACTION_NAME == 'config' ? 'current' : '';
			$nav [] = $res;
		}
		if (empty ( $nav ) && ACTION_NAME != 'nulldeal') {
			U ( 'nulldeal', '', true );
		}
		$this->assign ( 'nav', $nav );
		
		return $nav;
	}
	
	// 通用插件的列表模型
	public function lists($model = null, $page = 0) {
		is_array ( $model ) || $model = $this->getModel ( $model );
		parent::common_lists ( $model, $page );
	}
	function export($model = null) {
		is_array ( $model ) || $model = $this->getModel ( $model );
		parent::common_export ( $model );
	}
	
	// 通用插件的编辑模型
	public function edit($model = null, $id = 0) {
		is_array ( $model ) || $model = $this->getModel ( $model );
		parent::common_edit ( $model, $id );
	}
	
	// 通用插件的增加模型
	public function add($model = null) {
		is_array ( $model ) || $model = $this->getModel ( $model );
		
		parent::common_add ( $model );
	}
	
	// 通用插件的删除模型
	public function del($model = null, $ids = null) {
		parent::common_del ( $model, $ids );
	}
	
	// 通用设置插件模型
	public function config() {
		$this->getModel ();
		
		$map ['name'] = MODULE_NAME;
		$addon = M ( 'addons' )->where ( $map )->find ();
		if (! $addon)
			$this->error ( '100015:插件未安装' );
		$addon_class = get_addon_class ( $addon ['name'] );
		if (! class_exists ( $addon_class ))
			trace ( "插件{$addon['name']}无法实例化,", 'ADDONS', 'ERR' );
		$data = new $addon_class ();
		$addon ['addon_path'] = $data->addon_path;
		$addon ['custom_config'] = $data->custom_config;
		$this->meta_title = '设置插件-' . $data->info ['title'];
		$db_config = D ( 'Common/AddonConfig' )->get ( MODULE_NAME );
		$addon ['config'] = include $data->config_file;
		
		if (IS_POST) {
			foreach ( $addon ['config'] as $k => $vv ) {
				if ($vv ['type'] == 'material') {
					$_POST ['config'] [$k] = $_POST [$k];
				}
			}
			$flag = D ( 'Common/AddonConfig' )->set ( MODULE_NAME, I ( 'config' ) );
			
			if ($flag !== false) {
				$this->success ( '保存成功', Cookie ( '__forward__' ) );
			} else {
				$this->error ( '100016:保存失败' );
			}
		}
		if ($db_config) {
			foreach ( $addon ['config'] as $key => $value ) {
				if ($value ['type'] != 'group') {
					! isset ( $db_config [$key] ) || $addon ['config'] [$key] ['value'] = $db_config [$key];
				} else {
					foreach ( $value ['options'] as $gourp => $options ) {
						foreach ( $options ['options'] as $gkey => $value ) {
							! isset ( $db_config [$key] ) || $addon ['config'] [$key] ['options'] [$gourp] ['options'] [$gkey] ['value'] = $db_config [$gkey];
						}
					}
				}
			}
		}
		$this->assign ( 'data', $addon );
		if ($addon ['custom_config'])
			$this->assign ( 'custom_config', $this->fetch ( $addon ['addon_path'] . $addon ['custom_config'] ) );
		$this->display ();
	}
	
	// 没有管理页面和配置页面的插件的通用提示页面
	function nulldeal() {
		$this->display ( T ( 'home/Addons/nulldeal' ) );
	}
}
// 设置控制器别名 便于升级
class_alias ( 'Think\Controller', 'Think\Action' );