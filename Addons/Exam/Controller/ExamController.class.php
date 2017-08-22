<?php

namespace Addons\Exam\Controller;

use Think\ManageBaseController;

class ExamController extends ManageBaseController {
	function exam_question() {
		$param ['exam_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Exam://Question/lists', $param );
		// dump($url);
		redirect ( $url );
	}
	function exam_answer() {
		$param ['exam_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Exam://Answer/lists', $param );
		// dump($url);
		redirect ( $url );
	}
	function preview() {
		$param ['exam_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Exam://Wap/show', $param );
		$this->assign ( 'url', $url );
		$this->display ( 'Home@Addons/preview' );
	}
}
