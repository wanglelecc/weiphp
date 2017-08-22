<?php

namespace Addons\Card\Controller;

use Think\ManageBaseController;

class BaseController extends ManageBaseController {
	function _initialize() {
		parent::_initialize();
		
		$controller = strtolower ( CONTROLLER_NAME );
		
		$res ['title'] = '会员卡设置';
		$res ['url'] = addons_url ( 'Card://Card/config' ,array('mdm'=>I('mdm')));
		$res ['class'] = $controller == 'card' || $controller == 'cardprivilege' || $controller == 'cardlevel' ? 'current' : '';
		$nav [] = $res;
		
		$res ['title'] = '会员管理';
		$res ['url'] = addons_url ( 'Card://member/lists' ,array('mdm'=>I('mdm')));
		$res ['class'] = $controller == 'member' ? 'current' : '';
		$nav [] = $res;
		
		if (is_install("Shop")) {
            $res['title'] = '实体店会员管理';
            $res['url'] = addons_url('Card://ShopMember/lists', array(
                'mdm' => I('mdm')
            ));
            $res['class'] = $controller == 'shopmember' ? 'current' : '';
            $nav[] = $res;
        }
		$res ['title'] = '会员交易';
		$res ['url'] = addons_url ( 'Card://MemberTransition/lists' ,array('mdm'=>I('mdm')));
		$res ['class'] = $controller == 'membertransition' ? 'current' : '';
		$nav [] = $res;
		$res ['title'] = '会员营销';
		$res ['url'] = addons_url ( 'Card://MemberMarketing/lists' ,array('mdm'=>I('mdm')));
		$res ['class'] = $controller == 'membermarketing' ? 'current' : '';
		$nav [] = $res;
		$res ['title'] = '通知管理';
		$res ['url'] = addons_url ( 'Card://Notice/lists' ,array('mdm'=>I('mdm')));
		$res ['class'] = $controller == 'notice' ? 'current' : '';
		$nav [] = $res;
		$res ['title'] = '数据统计';
		$res ['url'] = addons_url ( 'Card://Tongji/index',array('mdm'=>I('mdm')) );
		$res ['class'] = $controller == 'tongji' ? 'current' : '';
		$nav [] = $res;
		
		$this->assign ( 'nav', $nav );
		
		$config = getAddonConfig ( 'Card' );
		$config['instruction']=str_replace("\n","<br/>",$config['instruction']);
		$config ['background_url'] = $config ['background'] == 11 ? $config ['background_custom'] : ADDON_PUBLIC_PATH . '/card_bg_' . $config ['background'] . '.png';
		$config ['back_background_url'] = $config ['back_background'] == 11 ? $config ['back_background_custom'] : ADDON_PUBLIC_PATH . '/card_bg_' . $config ['back_background'] . '.png';
		$this->assign ( 'config', $config );
	}
	
}
