<?php

namespace Common\Model;

use Think\Model;

/**
 * 插件配置操作集成
 */
class MenuModel extends Model {
	protected $tableName = 'menu';
	// 取后台管理对当前用户配置的菜单
	private function _get_menu($addonList) {
		$mod = strtolower ( MODULE_NAME );
		if ($mod == 'admin') {
			$menu_map ['place'] = 1;
		} else {
			$app_type = 0;
			if (isset ( $GLOBALS ['app_info'] )) {
				$app_type = $GLOBALS ['app_info'] ['app_type'];
			}
			if ($mod == 'weiapp' || $app_type == 1) {
				$menu_map ['place'] = 2;
			} else {
				$menu_map ['place'] = 0;
			}
		}
		
		$menu_map ['is_hide'] = 0;
		$menus = $this->where ( $menu_map )->order ( 'sort asc, id asc' )->select ();
		
		// 侧边栏数据
		foreach ( $menus as $k => $m ) {
			if ($m ['menu_type'] == 0) {
				continue;
			}
			$param ['side'] = $cate ['id'] = $m ['id'];
			$cate ['title'] = $m ['title'];
			$param ['top'] = $cate ['pid'] = intval ( $m ['pid'] );
			
			if ($m ['url_type'] == 0) {
				if (isset ( $addonList [$m ['addon_name']] )) {
					$cate ['url'] = $addonList [$m ['addon_name']] ['addons_url'];
				} else {
					unset ( $menus [$k] );
					continue;
				}
			} elseif (strpos ( $m ['url'], 'http://' ) !== false || strpos ( $m ['url'], 'https://' ) !== false) {
				$cate ['url'] = $m ['url'];
			} elseif (strpos ( $m ['url'], '://' ) !== false) {
				$cate ['url'] = addons_url ( $m ['url'] );
			} else {
				$cate ['url'] = U ( $m ['url'] );
			}
			
			$cate ['url'] .= '&mdm=' . $cate ['pid'] . '|' . $cate ['id'];
			$cate ['addon_name'] = $m ['addon_name'];
			$res ['core_side_menu'] [$cate ['pid']] [] = $cate;
			$res ['default_data'] [$cate ['url']] = $param;
			empty ( $m ['addon_name'] ) || $res ['default_data'] [$cate ['addon_name']] = $param;
		}
		// 顶部栏数据
		foreach ( $menus as $k => $m ) {
			if ($m ['menu_type'] != 0) {
				continue;
			}
			$param ['top'] = $cate ['id'] = $m ['id'];
			$cate ['title'] = $m ['title'];
			$cate ['pid'] = 0;
			
			if ($m ['url_type'] == 0) {
				
				if (isset ( $addonList [$m ['addon_name']] )) {
					$cate ['url'] = $addonList [$m ['addon_name']] ['addons_url'];
				} else {
					unset ( $menus [$k] );
					continue;
				}
				
				if (empty ( $cate ['url'] ) && ! empty ( $res ['core_side_menu'] [$m ['id']] )) {
					$cate ['url'] = $res ['core_side_menu'] [$m ['id']] [0] ['url'];
				}
				$cate ['url'] .= '&mdm=' . $cate ['id'];
			} else {
				if ($m ['url_type'] == 0) {
					$cate ['url'] = $addonList [$m ['addon_name']] ['addons_url'];
				} elseif (strpos ( $m ['url'], 'http://' ) !== false || strpos ( $m ['url'], 'https://' ) !== false) {
					$cate ['url'] = $m ['url'];
				} elseif (strpos ( $m ['url'], '://' ) !== false) {
					$cate ['url'] = addons_url ( $m ['url'] );
				} else {
					$cate ['url'] = U ( $m ['url'] );
				}
				if ($res ['core_side_menu'] [$m ['id']] [0] ['id']) {
					$cate ['url'] .= '&mdm=' . $m ['id'] . '|' . $res ['core_side_menu'] [$m ['id']] [0] ['id'];
				} else {
					$cate ['url'] .= '&mdm=' . $m ['id'];
				}
			}
			
			$cate ['addon_name'] = $m ['addon_name'];
			$res ['core_top_menu'] [] = $cate;
			
			$param ['side'] = $res ['core_side_menu'] [$m ['id']] [0] ['id'];
			$res ['default_data'] [$cate ['url']] = $param;
			empty ( $m ['addon_name'] ) || $res ['default_data'] [$cate ['addon_name']] = $param;
		}
		
		return $res;
	}
	function get() {
		// 第一步：获取所有微信插件的入口URL
		$addonList = D ( 'Home/Addons' )->getWeixinList ( false );
		//dump($addonList);
		// 第二步：获取导航数据
		$menus = $this->_get_menu ( $addonList );
		// dump ( $menus );
		// 第三步：获取用户登录进入时的初始化URL
		$menus ['init_url'] = '';
		foreach ( $menus ['core_top_menu'] as $t ) {
			$menus ['init_url'] = $t ['url'];
			break;
		}
		
		// 第四步：初始化导航高亮参数
		$default = session ( 'menu_default' );
		if (strpos ( $_SERVER ['HTTP_REFERER'], 'uploadify.swf' ) === false) {
			if (isset ( $_GET ['mdm'] )) {
				$mdm = explode ( '|', $_GET ['mdm'] );
				$default ['top'] = intval ( $mdm [0] );
				$default ['side'] = intval ( $mdm [1] );
			} else {
				$current_addon = defined ( 'MODULE_NAME' ) ? MODULE_NAME : '';
				
				$module_name = MODULE_NAME;
				$controller_name = CONTROLLER_NAME;
				$action_name = ACTION_NAME;
				$current_url = $module_name . '/' . $controller_name . '/' . $action_name;
				foreach ( $menus ['default_data'] as $k => $v ) {
					if ((! empty ( $current_addon ) && $k == $current_addon) || stripos ( $k, $current_url ) !== false) {
						$default = $v;
					}
				}
			}
			if (empty ( $default ['top'] ) && ! empty ( $menus ['core_top_menu'] )) {
				$default ['top'] = intval ( $menus ['core_top_menu'] [0] ['id'] );
			}
			if (empty ( $default ['side'] ) && ! empty ( $menus ['core_side_menu'] [$default ['top']] )) {
				$default ['side'] = $menus ['core_side_menu'] [$default ['top']] [0] ['id'];
			}
			$default ['top'] = intval ( $default ['top'] );
			
			session ( 'menu_default', $default );
		}
		// 第五步：设置导航高亮
		foreach ( $menus ['core_top_menu'] as &$top ) {
			$top ['class'] = '';
			
			if ($top ['id'] == $default ['top']) {
				$top ['class'] = 'active current';
				$menus ['now_top_menu_name'] = $top ['title'];
			}
		}
		foreach ( $menus ['core_side_menu'] as &$side ) {
			foreach ( $side as &$s ) {
				$s ['class'] = '';
				if ($s ['id'] == $default ['side'])
					$s ['class'] = 'active current';
			}
		}
		
		$index_2 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/*' );
		$menus ['core_side_menu'] = $index_2 == 'home/appslink/*' ? '' : $menus ['core_side_menu'] [$default ['top']];
		// dump ( $menus );
		return $menus;
	}
}
?>
