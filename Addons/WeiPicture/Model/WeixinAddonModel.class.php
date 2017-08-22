<?php
        	
namespace Addons\WeiPicture\Model;
use Home\Model\WeixinModel;
        	
/**
 * WeiPicture的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'WeiPicture' ); // 获取后台插件的配置参数	
		//dump($config);
	}
}
        	