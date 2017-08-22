<?php

namespace Addons\Test\Controller;

use Think\ManageBaseController;

class TestController extends ManageBaseController {
	function lists() {
		$normal_tips = '微测试可用于性格分析等趣味测试，它可以有以下两种场景用法：<br>
一是题目的每个选项对应着不同的得分，最后把用户的所有得分加起来看在哪个分数段，然后给出这个分类段的评价语<br>
二是设置选择不同的选项跳转到不同的问题，前面的问题不设置分数，只有最后选择的问题设置总分，这个分数在哪个分数段，就给出这个分类段的评价语<br>';
		$this->assign ( 'normal_tips', $normal_tips );
		
		parent::lists ();
	}
	function add() {
		$this->_tip ();
		
		parent::add ();
	}
	function edit() {
		$this->_tip ();
		
		parent::edit ();
	}
	function _tip() {
		$normal_tips = '评论语输入格式是：[最小分数-最大分数]对应的评论语，例如下面的评价语：<br/>
[0-59]你是一个不合格的孩子，不想成吊丝的话就好好努力吧<br/>
[60-79]你是一个达到合格标准的孩子，但有很大发展空间<br/>
[80-89]你的修养良好，值得保持下去<br/>
[90-100]高富帅/美富白，咱们交个朋友吧';
		$this->assign ( 'normal_tips', $normal_tips );
	}
	function test_question() {
		$param ['test_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Test://Question/lists', $param );
		// dump($url);
		redirect ( $url );
	}
	function test_answer() {
		$param ['test_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Test://Answer/lists', $param );
		// dump($url);
		redirect ( $url );
	}
	function preview() {
		$param ['test_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Test://Wap/show', $param );
		// dump($url);
		// redirect ( $url );
		$this->assign ( 'url', $url );
		$this->display ( 'Home@Addons/preview' );
	}
}
