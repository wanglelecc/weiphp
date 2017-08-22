<?php
return array (
	   'type' => array (
				'title' => '短信服务商:',
				'type' => 'select',
				'options'=>array(
						'1'=>'云之讯',
						'2'=>'腾讯云',
				        //'3'=>'阿里云',
				),
				'value' => '1' 
				),
		'accountSid' => array ( 
				'title' => '开发者Account Sid',
				'type' => 'text',
				'value' => ''
		),	
		'authToken' => array ( 
				'title' => '开发者Auth Token',
				'type' => 'text',
				'value' => ''
		),	
		'appId' => array ( 
				'title' => '应用Id',
				'type' => 'text',
				'value' => '',
				'tip' => '在服务商平台上应用里面创建获得'
		),		
		'cardTemplateId' => array (
				'title' => '会员卡手机认证短信模板Id', 
				'type' => 'text',
				'value' => '', 
				'tip' => '模板格式：您的验证码是{1},请于10分钟内输入正确的验证码',
				),
    'appid' => array (
        'title' => '腾讯云appid',
        'type' => 'text',
        'value' => ''
    ),
    'appkey' => array (
        'title' => '腾讯云appkey',
        'type' => 'text',
        'value' => '',
    ),
    'sign' => array (
        'title' => '短信签名',
        'type' => 'text',
        'value' => '',
    ),
    'TtemplateId' => array (
        'title' => '短信模板Id',
        'type' => 'text',
        'value' => '',
        'tip' => '模板格式：您的验证码是${code},请于10分钟内输入正确的验证码',
    ),
);
					