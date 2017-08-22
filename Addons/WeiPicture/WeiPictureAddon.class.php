<?php

namespace Addons\WeiPicture;
use Common\Controller\Addon;

/**
 * 小程序图库插件
 * @author sky
 */

    class WeiPictureAddon extends Addon{

        public $info = array(
            'name'=>'WeiPicture',
            'title'=>'小程序图库',
            'description'=>'这是一个临时描述',
            'status'=>1,
            'author'=>'sky',
            'version'=>'0.1',
            'has_adminlist'=>0
        );

	public function install() {
		$install_sql = './Addons/WeiPicture/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/WeiPicture/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }