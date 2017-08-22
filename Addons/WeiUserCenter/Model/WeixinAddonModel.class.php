<?php
        	
namespace Addons\WeiUserCenter\Model;
use Home\Model\WeixinModel;
        	
/**
 * WeiUserCenter的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'WeiUserCenter' ); // 获取后台插件的配置参数	
		//dump($config);
	}
}
        	