<?php

namespace Addons\Game\Controller;
use Think\WapBaseController;

class WapController extends WapBaseController{
	function main(){
		//游戏中心主界面
		$this -> display();	
	}
	function lists(){
		//游戏列表
		$this -> display();
	}
}
