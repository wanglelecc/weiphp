<?php

namespace Addons\Sms\Controller;
use Think\ManageBaseController;

class SmsController extends ManageBaseController{
	function config() {
		$this -> assign('normal_tips','填写信息前请先到服务商平台开通账号：<a href="http://www.yuntongxun.com/" target="_blank">云之讯官网</a>,<a href="https://cloud.tencent.com/" target="_blank">腾讯云官网</a>');
		parent::config ();
	}
}
