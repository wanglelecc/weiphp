<?php

namespace Addons\WeiUserCenter;
use Common\Controller\Addon;

/**
 * 小程序用户中心插件
 * @author sky
 */

    class WeiUserCenterAddon extends Addon{

        public $info = array(
            'name'=>'WeiUserCenter',
            'title'=>'小程序用户中心',
            'description'=>'这是一个临时描述',
            'status'=>1,
            'author'=>'sky',
            'version'=>'0.1',
            'has_adminlist'=>0
        );

	public function install() {
		$install_sql = './Addons/WeiUserCenter/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/WeiUserCenter/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }