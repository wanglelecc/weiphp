<?php

namespace Addons\RealPrize\Controller;

use Think\ManageBaseController;

class RealPrizeController extends ManageBaseController {
	var $r_prize = 'real_prize';
	var $p_address = 'prize_address';
	function edit() {
		$id = I ( 'id' );
		$model = $this->getModel ();
		
		if (IS_POST) {
			
			$this->checkPostData ();
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if ($Model->create () && $Model->save ()) {
				$this->_saveKeyword ( $model, $id );
				// 清空缓存
				method_exists ( $Model, 'clear' ) && $Model->clear ( $id, 'edit' );
				D ( 'RealPrize' )->getInfo ( $id, true );
				$this->success ( '保存' . $model ['title'] . '成功！', U ( 'lists?model=' . $model ['name'] ) );
			} else {
				$this->error ( '400335:' . $Model->getError () );
			}
		} else {
			$fields = get_model_attribute ( $model ['id'] );
			
			// 获取数据
			$data = M ( get_table_name ( $model ['id'] ) )->find ( $id );
			$data || $this->error ( '400336:数据不存在！' );
			
			$token = get_token ();
			if (isset ( $data ['token'] ) && $token != $data ['token'] && defined ( 'ADDON_PUBLIC_PATH' )) {
				$this->error ( '400337:非法访问！' );
			}
			
			$this->assign ( 'fields', $fields );
			$this->assign ( 'data', $data );
			$this->meta_title = '编辑' . $model ['title'];
			
			$this->display ();
		}
	}
	function checkPostData() {
		if (! I ( 'post.prize_title' )) {
			$this->error ( '400338:活动名称不能为空' );
		}
		if (! I ( 'post.prize_name' )) {
			$this->error ( '400339:奖品名称不能为空' );
		}
		if (! I ( 'post.prize_conditions' )) {
			$this->error ( '400340:活动说明不能为空' );
		}
		if (intval ( I ( 'post.prize_count' ) ) <= 0) {
			$this->error ( '400341:奖品个数应大于0' );
		}
		if (! I ( 'post.prize_image' )) {
			$this->error ( '400342:请选择奖品图片' );
		}
		if (! I ( 'post.use_content' )) {
			$this->error ( '400343:使用说明不能为空' );
		}
		if (! I ( 'post.fail_content' )) {
			$this->error ( '400344:领取提示不能为空' );
		}
	}
	function add() {
		$model = $this->getModel ();
		if (IS_POST) {
			$this->checkPostData ();
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if ($Model->create () && $id = $Model->add ()) {
				$this->_saveKeyword ( $model, $id );
				
				// 清空缓存
				method_exists ( $Model, 'clear' ) && $Model->clear ( $id, 'edit' );
				D ( 'RealPrize' )->getInfo ( $id, true );
				$this->success ( '添加' . $model ['title'] . '成功！', U ( 'lists?model=' . $model ['name'] ) );
			} else {
				$this->error ( '400345:' . $Model->getError () );
			}
		} else {
			$fields = get_model_attribute ( $model ['id'] );
			
			$this->assign ( 'fields', $fields );
			$this->meta_title = '新增' . $model ['title'];
			
			$this->display ();
		}
	}
	function preview() {
		$id = I ( 'id', 0, 'intval' );
		$url = U ( 'Wap/index', [ 
				'id' => $id 
		] );
		
		$this->assign ( 'url', $url );
		$this->display ( 'Home@Addons/preview' );
	}
	
	// 显示实物奖品对应的收货地址
	function address_lists() {
		$nav [0] ['title'] = "实物奖励";
		$nav [0] ['class'] = "";
		$nav [0] ['url'] = U ( "lists" );
		$nav [1] ['title'] = "收货地址";
		$nav [1] ['class'] = "current";
		$this->assign ( 'nav', $nav );
		$model = $this->getModel ( 'prize_address' );
		$page = I ( 'p', 1, 'intval' ); // 默认显示第一页数据
		$this->assign ( 'add_button', false );
		// 解析列表规则
		$list_data = $this->_list_grid ( $model );
		
		// unset ( $list_data ['list_grids'] [2] );
		
		$grids = $list_data ['list_grids'];
		$fields = $list_data ['fields'];
		
		// 搜索条件
		// $map ['addon'] = $this->addon;
		$param ['target_id'] = $map ['prizeid'] = I ( 'target_id' );
		$map ['token'] = get_token ();
		session ( 'common_condition', $map );
		
		$search_url = U ( 'address_lists', $param );
		$this->assign ( 'search_url', $search_url );
		
		$map = $this->_search_map ( $model, $fields );
		
		$row = empty ( $model ['list_row'] ) ? 20 : $model ['list_row'];
		
		empty ( $fields ) || in_array ( 'id', $fields ) || array_push ( $fields, 'id' );
		
		$name = parse_name ( get_table_name ( $model ['id'] ), true );
		$data = M ( $name )->where ( $map )->order ( 'id DESC' )->page ( $page, $row )->select ();
		
		$dataTable = D ( 'Common/Model' )->getFileInfo ( $model );
		$data = $this->parseData ( $data, $dataTable->fields, $dataTable->list_grid, $dataTable->config );
		
		// 获取prizeid对应的奖品名称
		$map2 [id] = I ( 'target_id' );
		$pname = M ( 'real_prize' )->where ( $map2 )->getField ( 'prize_name' );
		foreach ( $data as &$v ) {
			$v ['prizeid'] = $pname;
			$v['turename']=$v['turename']?$v['turename']:get_nickname($v['uid']);
		}
		
		/* 查询记录总数 */
		$count = M ( $name )->where ( $map )->count ();
		$list_data ['list_data'] = $data;
		
		// 分页
		if ($count > $row) {
			$page = new \Think\Page ( $count, $row );
			$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
			$list_data ['_page'] = $page->show ();
		}
		$this->assign ( $list_data );
		// dump($list_data);
		
		$this->display ( 'Home@Addons/lists' );
	}
	function address_edit() {
		$id = I ( 'id' );
		$model = $this->getModel ( 'prize_address' );
		if (IS_POST) {
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if ($Model->create () && $Model->save ()) {
				$this->_saveKeyword ( $model, $id );
				// 清空缓存
				method_exists ( $Model, 'clear' ) && $Model->clear ( $id, 'edit' );
				$this->success ( '保存' . $model ['title'] . '成功！', U ( 'address_lists?model=' . $model ['name'] . '&target_id=' . $_POST ['prizeid'] ) );
			} else {
				$this->error ( '400346:' . $Model->getError () );
			}
		} else {
			$fields = get_model_attribute ( $model ['id'] );
			// 获取数据
			$data = M ( get_table_name ( $model ['id'] ) )->find ( $id );
			$data || $this->error ( '400347:数据不存在！' );
			
			$token = get_token ();
			if (isset ( $data ['token'] ) && $token != $data ['token'] && defined ( 'ADDON_PUBLIC_PATH' )) {
				$this->error ( '400348:非法访问！' );
			}
			$param ['mdm'] = $_GET ['mdm'];
			$postUrl = U ( 'address_edit', $param );
			$this->assign ( 'post_url', $postUrl );
			
			$this->assign ( 'fields', $fields );
			$this->assign ( 'data', $data );
			$this->meta_title = '编辑' . $model ['title'];
			$this->display ( 'Home@Addons/edit' );
		}
	}
	function list_data() {
		// $page = I ( 'p', 1, 'intval' );
		$map ['token'] = get_token ();
		$map ['aim_table'] = 'lottery_games';
		$dao = D ( 'Addons://RealPrize/RealPrize' );
		$list_data = $dao->where ( $map )->field ( 'id' )->order ( 'id DESC' )->select ();
		
		foreach ( $list_data as &$v ) {
			$v = $dao->getInfo ( $v ['id'] );
			$v ['background'] = get_cover_url ( $v ['prize_image'] );
			$v ['title'] = $v ['prize_name'];
			$v ['num'] = $v ['prize_count'];
		}
		$list_data ['list_data'] = $list_data;
		// dump ( $list_data );
		$this->ajaxReturn ( $list_data, 'JSON' );
	}
}
