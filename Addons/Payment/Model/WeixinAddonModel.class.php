<?php
        	
namespace Addons\Payment\Model;
use Home\Model\WeixinModel;
        	
/**
 * Payment的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'Payment' ); // 获取后台插件的配置参数	
		//dump($config);

	} 
}
        	