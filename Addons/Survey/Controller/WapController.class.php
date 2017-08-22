<?php

namespace Addons\Survey\Controller;

use Think\WapBaseController;

class WapController extends WapBaseController {
	function survey_question() {
		$param ['survey_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Survey://Question/lists', $param );
		// dump($url);
		redirect ( $url );
	}
	function survey_answer() {
		$param ['survey_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Survey://Answer/lists', $param );
		// dump($url);
		redirect ( $url );
	}
	function preview() {
		$id = I ( 'id', 0, 'intval' );
		$url = U ( 'Wap/index', [ 
				'id' => $id 
		] );
		$this->assign ( 'url', $url );
		$this->display ( 'Home@Addons/preview' );
	}
	function survey() {
		$id = I ( 'get.id', 0, 'intval' );
		$num = I ( 'num', 1, 'intval' );
		$token = get_token ();
		$survey = D ( 'Survey' )->getSurveyInfo ( $id );
		$list = D ( 'SurveyQuestion' )->getQuestionInfo ( $id );
		if (IS_POST) {
			$follow_id = $this->mid;
			$question_id = I ( 'post.question_id', 0, 'intval' );
			$answer = D ( 'SurveyAnswer' )->getAnswerInfo ( $id, $question_id, $follow_id );
			
			$data ['cTime'] = time ();
			$data ['answer'] = serialize ( $_POST ['answer'] );
			if ($answer) {
				D ( 'SurveyAnswer' )->updateAnswer ( $id, $question_id, $follow_id, $data );
			} else {
				$data ['survey_id'] = $id;
				$data ['token'] = $token;
				$data ['question_id'] = $question_id;
				$data ['uid'] = $follow_id;
				$data ['openid'] = get_openid ();
				M ( 'survey_answer' )->add ( $data );
				D ( 'SurveyAnswer' )->getAnswerInfo ( $id, $question_id, $follow_id, true );
			}
			$num = $num + 1;
		}
		$question_id = I ( 'post.next_id', 0, 'intval' );
		if ($question_id == '-1') {
			redirect ( U ( 'finish', 'survey_id=' . $id ) );
		}
		if (empty ( $question_id )) {
			$question = $list [0];
			$next_id = isset ( $list [1] ['id'] ) ? $list [1] ['id'] : '-1';
		} else {
			foreach ( $list as $k => $vo ) {
				if ($vo ['id'] == $question_id) {
					$question = $vo;
					$next_id = isset ( $list [$k + 1] ['id'] ) ? $list [$k + 1] ['id'] : '-1';
				}
			}
		}
		
		$extra = parse_config_attr ( $question ['extra'],'/[\s;\r\n|]+/' );
		$this->assign ( 'survey', $survey );
		$this->assign ( 'question', $question );
		$this->assign ( 'next_id', $next_id );
		$this->assign ( 'extra', $extra );
		$this->assign ( 'num', $num );
		
		$this->display ();
	}
	function index() {
		$id = $map ['id'] = I ( 'id', 0, 'intval' );
		// $openid = get_openid ();
		$map ['token'] = get_token ();
		$public_info = get_token_appinfo ( $map ['token'] );
		$overtime = $this->_is_overtime ( $id );
		// $overtime = $overtime ? 1 :( $overtime ? 2 : 0 ) ;
		
		// if($overtime= 1)$status="调研进行中";
		// if($overtime= 2)$status="调研未开始";
		// if($overtime= 0)$status="调研已结束";
		$this->assign ( 'overtime', $overtime );
		// $this->assign ( 'status', $status);
		
		$info = M ( 'survey' )->where ( $map )->find ();
		$this->assign ( 'info', $info );
		$this->assign ( 'public_info', $public_info );
		$this->display ();
	}
	function finish() {
		$survey_id = I ( 'survey_id', 0, 'intval' );
		// $map ['token'] = get_token ();
		// $info = M ( 'survey' )->where ( $map )->find ();
		$info = D ( 'Survey' )->getSurveyInfo ( $survey_id );
		$this->assign ( 'info', $info );
		
		// 增加积分
		add_credit ( 'survey' );
		$this->display ();
	}
	
	// 已过期返回 true ,否则返回 false
	private function _is_overtime($survey_id) {
		// 先看调研期限过期与否
		$the_survey = M ( "survey" )->find ( $survey_id );
		
		if ((! empty ( $the_survey ['start_time'] )) && $the_survey ['start_time'] < NOW_TIME && $the_survey ['end_time'] > NOW_TIME)
			
			return 1; // 进行中
			          
		// $deadline = $the_survey ['end_date'] + 86400;
		if ((! empty ( $the_survey ['start_time'] )) && $the_survey ['start_time'] > NOW_TIME)
			
			return 2; // 未开始
		
		if ((! empty ( $the_survey ['start_time'] )) && $the_survey ['end_time'] < NOW_TIME)
			return 0; // 结束
	}
}
