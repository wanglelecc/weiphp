<?php
namespace Addons\Card\Model;
use Home\Model\WeixinModel;

/**
 * Card的微信模型
 */
class WeixinAddonModel extends WeixinModel {
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'Card' ); // 获取后台插件的配置参数
		                                     
		// 其中token和openid这两个参数一定要传，否则程序不知道是哪个微信用户进入了系统
		$param ['token'] = get_token ();
		$param ['openid'] = get_openid ();
		$url = addons_url ( 'Card://Wap/index', $param );
		
		// 组装微信需要的图文数据，格式是固定的
		$articles [0] = array (
				'Title' => $config ['title'],
				'Description' => $config ['address'],
				'PicUrl' => SITE_URL . '/Addons/Card/View/Public/vip_card.png',
				'Url' => $url 
		);
		$this->replyNews ( $articles );
	}
}
        	