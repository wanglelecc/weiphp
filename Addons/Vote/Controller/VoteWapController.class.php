<?php

namespace Addons\Vote\Controller;

use Think\WapBaseController;

class VoteWapController extends WapBaseController {
	protected $model;
	protected $option;
	protected $vlog;
	public function __construct() {
		parent::__construct ();
		$this->model = getModelByName ( 'vote' );
		$this->model || $this->error ( '400444:模型不存在！' );
		
		$this->assign ( 'model', $this->model );
		
		$this->option = getModelByName ( 'vote_option' );
		$this->assign ( 'option', $this->option );
		
		$this->vlog = getModelByName ( 'vote_log' );
		$this->assign ( 'vlog', $this->vlog );
	}
	/**
	 * **************************微信上的操作功能************************************
	 */
	function index() {
		$vote_id = I ( 'id', 0, 'intval' );
		$openid = get_openid ();
		
		// $openid = 'orgF0t7i-s4xXa2ucIVrm5BMca-Y';
		// echo 'openid: '.$openid;die();
		$token = get_token ();
		// dump($openid);die();
		$info = $this->_getVoteInfo ( $vote_id );
		// echo $this->_is_overtime ( $vote_id )?'a':'b';die();
		$overtime = $this->_is_overtime ( $vote_id );
		// $overtime = $overtime ? '1' : '0' ;
		$this->assign ( 'overtime', $overtime );
		$canJoin = ! empty ( $openid ) && ! empty ( $token ) && ! $overtime && ! ($this->_is_join ( $vote_id, $this->mid, $token ));
		$this->assign ( 'canJoin', $canJoin );
		$test_id = intval ( $_REQUEST ['test_id'] );
		$this->display ();
	}
	function _getVoteInfo($id) {
		// 检查ID是否合法
		if (empty ( $id ) || 0 == $id) {
			$this->error ( "400462:错误的投票ID" );
		}
		
		$map ['id'] = $map2 ['vote_id'] = $id = intval ( $id );
		$info = D ( 'Vote' )->getInfo ( $id );
		// dump(M ( 'vote' )->getLastSql());
		$this->assign ( 'info', $info );
		
		// dump($info);
		$opts = D ( 'VoteOption' )->getList ( $id );
		foreach ( $opts as $p ) {
			$total += $p ['opt_count'];
		}
		foreach ( $opts as &$vo ) {
			$vo ['percent'] = round ( $vo ['opt_count'] * 100 / $total, 1 );
		}
		// dump($opts);
		$this->assign ( 'opts', $opts );
		$this->assign ( 'num_total', $total );
		return $info;
	}
	
	// 用户投票信息
	function join() {
		$token = get_token ();
		$opts_ids = array_filter ( I ( 'post.optArr' ) );
		
		$vote_id = intval ( $_POST ["vote_id"] );
		// 检查ID是否合法
		if (empty ( $vote_id ) || 0 == $vote_id) {
			$this->error ( "400463:错误的投票ID" );
		}
		if ($this->_is_overtime ( $vote_id )) {
			$this->error ( "400464:请在指定的时间内投票" );
		}
		if ($this->_is_join ( $vote_id, $this->mid, $token )) {
			$this->error ( "400465:您已经投过,请不要重复投" );
		}
		if (empty ( $_POST ['optArr'] )) {
			$this->error ( "400466:请先选择投票项" );
		}
		// 如果没投过，就添加
		$data ["user_id"] = $this->mid;
		$data ["vote_id"] = $vote_id;
		$data ["token"] = $token;
		$data ["options"] = implode ( ',', $opts_ids );
		$data ["cTime"] = time ();
		$addid = M ( "vote_log" )->add ( $data );
		D ( 'VoteLog' )->getFollowLog ( $this->mid, $vote_id, true );
		// 更新投票数
		D ( 'VoteOption' )->updateOptCount ( $vote_id, $opts_ids );
		// 投票信息的vote_count+1
		// $res = M ( "vote" )->where ( 'id=' . $vote_id )->setInc ( "vote_count" );
		$vote = D ( 'Vote' );
		$voteinfo = $vote->getInfo ( $vote_id );
		$up ['vote_count'] = $voteinfo ['vote_count'] + 1;
		$vote->update ( $vote_id, $up );
		
		// 增加积分
		add_credit ( 'vote' );
		
		redirect ( U ( 'show', 'id=' . $vote_id ) );
	}
	
	// 已过期返回 true ,否则返回 false
	private function _is_overtime($vote_id) {
		// 先看看投票期限过期与否
		$the_vote = D ( "Vote" )->getInfo ( $vote_id );
		
		if (! empty ( $the_vote ['start_date'] ) && $the_vote ['start_date'] > NOW_TIME)
			// return ture;
			return 1;
		
		$deadline = $the_vote ['end_date'] + 86400;
		if (! empty ( $the_vote ['end_date'] ) && $deadline <= NOW_TIME)
			// return ture;
			return 2;
		
		// return false;
		return 0;
	}
	private function _is_join($vote_id, $user_id, $token) {
		// $vote_limit = M ( 'vote' )->where ( 'id=' . $vote_id )->getField ( 'vote_limit' );
		$vote_limit = 1;
		$list = D ( 'VoteLog' )->getFollowLog ( $user_id, $vote_id );
		
		$count = count ( $list );
		$info = array_pop ( $list );
		if ($info) {
			$joinData = explode ( ',', $info ['options'] );
			$this->assign ( 'joinData', $joinData );
		}
		if ($count >= $vote_limit) {
			return true;
		}
		return false;
	}
	function show() {
		$id = I ( 'id' );
		$url = addons_url ( 'Vote://VoteWap/index', [ 
				'id' => $id 
		] );
		redirect ( $url );
	}
}
