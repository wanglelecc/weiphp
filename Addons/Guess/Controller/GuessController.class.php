<?php

namespace Addons\Guess\Controller;

use Think\ManageBaseController;

class GuessController extends ManageBaseController {
	protected $model;
	protected $option;
	public function __construct() {
		parent::__construct ();
		$this->model = getModelByName ( CONTROLLER_NAME );
		$this->model || $this->error ( '400258:模型不存在！' );
		
		$this->assign ( 'model', $this->model );
		
		$this->option = getModelByName ( 'guess_option' );
		$this->assign ( 'option', $this->option );
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
		$model = $this->getModel ( 'guess' );
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
	public function edit() {
		// 获取模型信息
		$id = I ( 'id', 0, 'intval' );
		if (IS_POST) {
			$_POST ['mTime'] = time ();
			// $_POST ['create_time'] = time ();
			$this->checkPostData ();
			
			$Model = D ( parse_name ( get_table_name ( $this->model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $this->model ['id'] );
			// 增加选项
			$res = D ( 'GuessOption' )->set ( I ( 'post.id' ), I ( 'post.' ) );
			D ( 'GuessOption' )->getGuessOption ( $id, true );
			
			if ($Model->create () && $Model->save () || $res) {
				D ( 'Guess' )->getInfo ( $id, true );
				$this->success ( '保存' . $this->model ['title'] . '成功！', U ( 'lists?model=' . $this->model ['name'] ) );
			} else {
				$this->error ( '400259:' . $Model->getError () );
			}
		} else {
			$fields = get_model_attribute ( $this->model ['id'] );
			
			// 获取数据
			$data = M ( get_table_name ( $this->model ['id'] ) )->find ( $id );
			$data || $this->error ( '400260:数据不存在！' );
			
			$token = get_token ();
			if (isset ( $data ['token'] ) && $token != $data ['token'] && defined ( 'ADDON_PUBLIC_PATH' )) {
				$this->error ( '400261:非法访问！' );
			}
			
			$option_list = M ( 'guess_option' )->where ( 'guess_id=' . $id )->order ( '`order` asc' )->select ();
			$this->assign ( 'option_list', $option_list );
			// dump($data);
			$sucai_info = get_sucai_template_info ( $data ['template'], 'Guess' );
			$this->assign ( 'sucai_info', $sucai_info );
			// dump($sucai_info);
			$this->assign ( 'fields', $fields );
			$this->assign ( 'data', $data );
			$this->meta_title = '编辑' . $this->model ['title'];
			$this->display ( T ( 'Addons://Guess@Guess/edit' ) );
		}
	}
	public function add() {
		if (IS_POST) {
			// 自动补充token
			$this->checkPostData ();
			$_POST ['token'] = get_token ();
			// $_POST ['create_time'] = time ();
			$Model = D ( parse_name ( get_table_name ( $this->model ['id'] ), 1 ) );
			
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $this->model ['id'] );
			if ($Model->create () && $guess_id = $Model->add ()) {
				// 增加选项
				D ( 'GuessOption' )->set ( $guess_id, I ( 'post.' ) );
				D ( 'GuessOption' )->getGuessOption ( $guess_id, true );
				$this->success ( '添加' . $this->model ['title'] . '成功！', U ( 'lists?model=' . $this->model ['name'] ) );
			} else {
				$this->error ( '400262:' . $Model->getError () );
			}
		} else {
			
			$guess_fields = get_model_attribute ( $this->model ['id'] );
			$this->assign ( 'fields', $guess_fields );
			// 选项表
			$option_fields = get_model_attribute ( $this->option ['id'] );
			$this->assign ( 'option_fields', $option_fields );
			$this->display ( $this->model ['template_add'] ? $this->model ['template_add'] : T ( 'Addons://Guess@Guess/add' ) );
		}
	}
	protected function checkPostData() {
		if (! I ( 'post.title' )) {
			$this->error ( '400263:请填写竞猜标题' );
		}
		if (! I ( 'post.desc' )) {
			$this->error ( '400264:请填写活动说明' );
		}
		if (! I ( 'post.cover' )) {
			$this->error ( '400265:请选择主题图片' );
		}
		// 判断时间选择是否正确
		if (! I ( 'post.start_time' )) {
			$this->error ( '400266:请选择开始时间' );
		} else if (! I ( 'post.end_time' )) {
			$this->error ( '400267:请选择结束时间' );
		} else if (strtotime ( I ( 'post.start_time' ) ) >= strtotime ( I ( 'post.end_time' ) )) {
			$this->error ( '400268:开始时间不能大于或等于结束时间' );
		}
		// 判断选项是否有填
		
		if (! I ( 'post.name' ) || count ( I ( 'post.name' ) ) < 2) {
			$this->error ( '400269:请添加至少两个竞猜选项选项！' );
		} else {
			$optionName = I ( 'post.name' );
			foreach ( $optionName as $k => $v ) {
				if (empty ( $v )) {
					$this->error ( '400270:选项标题不能为空' );
				}
			}
		}
	}
	protected function checkAttr($Model, $model_id) {
		$fields = get_model_attribute ( $model_id );
		$validate = $auto = array ();
		foreach ( $fields as $key => $attr ) {
			if ($attr ['is_must']) { // 必填字段
				$validate [] = array (
						$attr ['name'],
						'require',
						$attr ['title'] . '必须!' 
				);
			}
			// 自动验证规则
			if (! empty ( $attr ['validate_rule'] ) || $attr ['validate_type'] == 'unique') {
				$validate [] = array (
						$attr ['name'],
						$attr ['validate_rule'],
						$attr ['error_info'] ? $attr ['error_info'] : $attr ['title'] . '验证错误',
						0,
						$attr ['validate_type'],
						$attr ['validate_time'] 
				);
			}
			// 自动完成规则
			if (! empty ( $attr ['auto_rule'] )) {
				$auto [] = array (
						$attr ['name'],
						$attr ['auto_rule'],
						$attr ['auto_time'],
						$attr ['auto_type'] 
				);
			} elseif ('checkbox' == $attr ['type'] || 'dynamic_checkbox' == $attr ['type']) { // 多选型
				$auto [] = array (
						$attr ['name'],
						'arr2str',
						3,
						'function' 
				);
			} elseif ('datetime' == $attr ['type']) { // 日期型
				$auto [] = array (
						$attr ['name'],
						'strtotime',
						3,
						'function' 
				);
			}
		}
		return $Model->validate ( $validate )->auto ( $auto );
	}
	
	// ////////显示竞猜选项////////////////
	function guessOption() {
		$nav [0] ['title'] = "竞猜";
		$nav [0] ['class'] = "";
		$nav [0] ['url'] = U ( "lists" );
		$nav [1] ['title'] = "竞猜选项";
		$nav [1] ['class'] = "current";
		$this->assign ( 'nav', $nav );
		
		$this->assign ( 'add_button', false );
		$this->assign ( 'search_button', false );
		$this->assign ( 'del_button', false );
		$this->assign ( 'check_all', false );
		
		$guess_id = I ( 'guess_id' );
		$model = $this->option;
		$list_data = $this->_list_grid ( $model );
		$fields = $list_data ['fields'];
		
		D ( 'GuessOption' )->updateOptCount ( $guess_id, '' );
		$page = I ( 'p', '1', 'intval' );
		
		$map ['guess_id'] = $guess_id;
		
		session ( 'common_condition', $map );
		$row = empty ( $model ['list_row'] ) ? 20 : $model ['list_row'];
		
		empty ( $fields ) || in_array ( 'id', $fields ) || array_push ( $fields, 'id' );
		
		$name = parse_name ( get_table_name ( $model ['id'] ), true );
		$data = M ( $name )->field ( empty ( $fields ) ? true : $fields )->where ( $map )->order ( 'id DESC' )->page ( $page, $row )->select ();
		
		$dataTable = D ( 'Common/Model' )->getFileInfo ( $model );
		$data = $this->parseData ( $data, $dataTable->fields, $dataTable->list_grid, $dataTable->config );
		
		// 活动名称
		$guessinfo = D ( 'Guess' );
		$info = $guessinfo->getInfo ( $guess_id );
		$title = $info ['title'];
		foreach ( $data as $key => &$value ) {
			$value ['title'] = $title;
		}
		$list_data ['list_data'] = $data;
		$count = M ( $name )->where ( $map )->count ();
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
	
	// ///////////显示所有参加竞猜记录////////////////
	function guessLog() {
		$guess_id = I ( 'guess_id' );
		$map ['guess_id'] = $guess_id;
		$this->common_log ( $guess_id, $map );
	}
	// ///////////根据竞猜选项显示对应的选项竞猜记录/////////////////////
	function optionLog() {
		$guess_id = I ( 'guess_id' );
		$title = '选项竞猜记录';
		if ($guess_id>0){
		    $map ['guess_id'] = $guess_id;
		}
		if ($_GET['option_id']>0){
		    $map ['optionIds'] = $_GET['option_id'];
		}
		
		$this->common_log ( $guess_id, $map, $title );
	}
	function common_log($guess_id, $map, $title = '竞猜记录') {
		// $guess_id=I('guess_id');
		$nav [0] ['title'] = "竞猜";
		$nav [0] ['class'] = "";
		$nav [0] ['url'] = U ( "lists" );
		$nav [1] ['title'] = "竞猜选项";
		$nav [1] ['class'] = "";
		$nav [1] ['url'] = addons_url ( 'Guess://Guess/guessOption?guess_id=' . $guess_id );
		
		$nav [2] ['title'] = $title;
		$nav [2] ['class'] = "current";
		$this->assign ( 'nav', $nav );
		
		$this->assign ( 'add_button', false );
		$this->assign ( 'search_button', false );
		$this->assign ( 'del_button', false );
		$this->assign ( 'check_all', false );
		
		$model = M ( 'model' )->getByName ( 'guess_log' );
		
		$list_data = $this->_list_grid ( $model );
		unset ( $list_data ['list_grids'] [""] );
		$fields = $list_data ['fields'];
		$page = I ( 'p', '1', 'intval' );
		
		// $map['guess_id']=$guess_id;
		// $map['optionIds']=I('option_id');
		session ( 'common_condition', $map );
		$row = empty ( $model ['list_row'] ) ? 20 : $model ['list_row'];
		
		empty ( $fields ) || in_array ( 'id', $fields ) || array_push ( $fields, 'id' );
		
		$name = parse_name ( get_table_name ( $model ['id'] ), true );
		$data = M ( $name )->field ( empty ( $fields ) ? true : $fields )->where ( $map )->order ( 'id DESC' )->page ( $page, $row )->select ();
		
		$dataTable = D ( 'Common/Model' )->getFileInfo ( $model );
		$data = $this->parseData ( $data, $dataTable->fields, $dataTable->list_grid, $dataTable->config );
		$option = D ( 'GuessOption' );
		foreach ( $data as $key => &$value ) {
			$value ['user_name'] = get_nickname ( $value ['user_id'] );
			$info = $option->getInfo ( $value ['optionIds'] );
			$value ['optionIds'] = $info ['name'];
		}
		$list_data ['list_data'] = $data;
		$count = M ( $name )->where ( $map )->count ();
		// 分页
		if ($count > $row) {
			$page = new \Think\Page ( $count, $row );
			$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
			$list_data ['_page'] = $page->show ();
		}
		$this->assign ( $list_data );
        //dump($list_data);
		$this->display ( 'Home@Addons/lists' );
	}
}
