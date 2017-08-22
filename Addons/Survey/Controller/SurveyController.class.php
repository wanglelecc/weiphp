<?php

namespace Addons\Survey\Controller;

use Think\ManageBaseController;

class SurveyController extends ManageBaseController {
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
	function lists() {
		$isAjax = I ( 'isAjax' );
		$isRadio = I ( 'isRadio' );
		$model = $this->getModel ( 'survey' );
		$list_data = $this->_get_model_list ( $model, 0, 'id desc', true );
		// 判断该活动是否已经设置投票调查
		if ($isAjax) {
			$this->assign ( 'isRadio', $isRadio );
			$this->assign ( $list_data );
			$this->display ( 'ajax_lists_data' );
		} else {
			$this->assign ( $list_data );
			$this->display ();
		}
	}
	function add() {
		$this->display ( 'edit' );
	}
	function edit() {
		$id = I ( 'id', 0, 'intval' );
		$model = $this->getModel ( 'survey' );
		
		if (IS_POST) {
			$this->checkDate ();
			$act = empty ( $id ) ? 'add' : 'save';
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			$res = false;
			$Model->create () && $res = $Model->$act ();
			if ($res !== false) {
				$act == 'add' && $id = $res;
				
				$this->_setAttr ( $id, $_POST );
				D ( 'Common/Keyword' )->set ( I ( 'post.keyword' ), 'Survey', I ( 'post.id' ) );
				$this->success ( '保存成功！', U ( 'lists?model=' . $model ['name'], $this->get_param ) );
			} else {
				$this->error ( '400400:' . $Model->getError () );
			}
		} else {
			// 获取数据
			$data = M ( get_table_name ( $model ['id'] ) )->find ( $id );
			$data || $this->error ( '400401:数据不存在！' );
			
			$token = get_token ();
			if (isset ( $data ['token'] ) && $token != $data ['token'] && defined ( 'ADDON_PUBLIC_PATH' )) {
				$this->error ( '400402:非法访问！' );
			}
			$this->assign ( 'data', $data );
			
			// 字段信息
			$map ['survey_id'] = $id;
			$map ['token'] = $token;
			$list = M ( 'survey_question' )->where ( $map )->order ( 'sort asc' )->select ();
			
			$this->assign ( 'attr_list', $list );
			
			$this->display ( 'edit' );
		}
	}
	// 保存字段信息
	function _setAttr($forms_id, $data) {
		$dao = M ( 'survey_question' );
		$save ['survey_id'] = $forms_id;
		
		$old_ids = $dao->where ( $save )->getFields ( 'id' );
		
		$sort = 0;
		foreach ( $data ['attr_title'] as $key => $val ) {
			$save ['title'] = safe ( $val );
			if (empty ( $save ['title'] ))
				continue;
			
			$save ['extra'] = safe ( $data ['extra'] [$key] );
			$save ['type'] = safe ( $data ['type'] [$key] );
			$save ['is_must'] = intval ( $data ['is_must'] [$key] );
			$save ['value'] = safe ( $data ['value'] [$key] );
			$save ['remark'] = safe ( $data ['remark'] [$key] );
			$save ['validate_rule'] = safe ( $data ['validate_rule'] [$key] );
			$save ['error_info'] = safe ( $data ['error_info'] [$key] );
			$save ['sort'] = $sort;
			
			$id = intval ( $data ['attr_id'] [$key] );
			if (! empty ( $id )) {
				$ids [] = $map ['id'] = $id;
				$dao->where ( $map )->save ( $save );
			} else {
				$save ['token'] = get_token ();
				$ids [] = $dao->add ( $save );
			}
			
			$sort += 1;
		}
		
		$diff = array_diff ( $old_ids, $ids );
		if (! empty ( $diff )) {
			$map2 ['id'] = array (
					'in',
					$diff 
			);
			$dao->where ( $map2 )->delete ();
		}
	}
	function checkDate() {
		// 判断时间选择是否正确
		if (! I ( 'post.start_time' )) {
			$this->error ( '400403:请选择开始时间' );
		} else if (! I ( 'post.end_time' )) {
			$this->error ( '400404:请选择结束时间' );
		} else if (strtotime ( I ( 'post.start_time' ) ) >= strtotime ( I ( 'post.end_time' ) )) {
			$this->error ( '400405:开始时间不能大于或等于结束时间' );
		}
	}
}
