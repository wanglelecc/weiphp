<?php

namespace Addons\WeiSite\Controller;

use Addons\WeiSite\Controller\BaseController;

class WeiSiteController extends BaseController {
	function _initialize() {
		$GLOBALS ['is_wap'] = 1;
		parent::_initialize ();
	}
	function config() {
		$public_info = get_token_appinfo ();
		$wepUrl =  addons_url ( 'WeiSite://Wap/index', array (
				'publicid' => $public_info ['id'] 
		) );
		$normal_tips = '在微信里回复“微官网”即可以查看效果,也可以点击：<a href="' . $wepUrl. '">预览</a>， <a id="copyLink" data-clipboard-text="' . $wepUrl . '">复制链接</a><script type="application/javascript">$.WeiPHP.initCopyBtn("copyLink");</script>';
		$this->assign ( 'normal_tips', $normal_tips );
		
		$config = D ( 'Common/AddonConfig' )->get ( MODULE_NAME );
		// dump(MODULE_NAME);
		if (IS_POST) {
			$_POST ['config'] ['background'] = implode ( ',', $_POST ['background'] );
			// $config = array_merge ( ( array ) $config, ( array ) $_POST ['config'] );
			$flag = D ( 'Common/AddonConfig' )->set ( MODULE_NAME, $_POST ['config'] );
			if ($flag !== false) {
				if ($_GET ['from'] == 'preview') {
					$url = U ( 'preview' );
				} else {
					$url = Cookie ( '__forward__' );
				}
				$this->success ( '保存成功', $url );
			} else {
				$this->error ( '400499:保存失败' );
			}
			exit ();
		}
		$this->assign ( 'data', $config );
		$this->display ();
	}
	
	/* 预览 */
	function preview() {
		$publicid = get_token_appinfo ( '', 'id' );
		$url = addons_url ( 'WeiSite://Wap/index', array (
				'publicid' => $publicid 
		) );
		$this->assign ( 'url', $url );
		
		$config = get_addon_config ( 'WeiSite' );
		
		$this->assign ( 'data', $config );
		
		$this->display ();
	}
	function preview_cms() {
		$publicid = get_token_appinfo ( '', 'id' );
		$url = addons_url ( 'WeiSite://Wap/lists', array (
				'publicid' => $publicid,
				'from' => 'preview' 
		) );
		$this->assign ( 'url', $url );
		
		$this->display ();
	}
	function preview_old() {
		$publicid = get_token_appinfo ( '', 'id' );
		$url = addons_url ( 'WeiSite://Wap/index', array (
				'publicid' => $publicid 
		) );
		$this->assign ( 'url', $url );
		$this->display ( 'Home@Addons/preview' );
	}
}
