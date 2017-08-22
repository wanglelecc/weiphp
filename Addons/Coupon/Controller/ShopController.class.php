<?php

namespace Addons\Coupon\Controller;

use Think\ManageBaseController;

class ShopController extends ManageBaseController {
	var $table = 'coupon_shop';
	function _initialize() {
		parent::_initialize ();
		
		$res ['title'] = '优惠券';
		$res ['url'] = addons_url ( 'Coupon://Coupon/lists',array('mdm'=>$_GET['mdm']) );
		$nav [] = $res;
		
		$res ['title'] = '门店管理';
		$res ['url'] = addons_url ( 'Coupon://Shop/lists', array (
				'coupon_id' => I ( 'coupon_id' ) ,
		          'mdm'=>$_GET['mdm']
		) );
		$res ['class'] = 'current';
		$nav [] = $res;
		
		$this->assign ( 'nav', $nav );
	}
	function lists() {
	    $public_info=get_token_appinfo();
	    $normal_tips = '门店导航显示链接：<a id="copyLink" data-clipboard-text="'.addons_url('Card://Wap/storeList',array('wpid' =>$public_info['id'])).'">复制链接</a><script type="application/javascript">$.WeiPHP.initCopyBtn("copyLink");</script>';
	    $this->assign ( 'normal_tips', $normal_tips );
		$isAjax = I ( 'isAjax' );
		// $coupon_id = I ( 'coupon_id','' );
		// dump($coupon_id);
		$search = $_REQUEST ['name'];
		
		$top_more_button [] = array (
				'title' => '导入数据',
				'url' => U ( 'import' ,array('mdm'=>I('mdm'))) 
		);
		$top_more_button [] = array (
				'title' => '导出数据',
				'url' => U ( 'output', array (
						'name' => $search 
				) ) 
		);
		
		$this->assign ( 'top_more_button', $top_more_button );
		
		$model = $this->getModel ( $this->table );
		$page = I ( 'p', 1, 'intval' ); // 默认显示第一页数据
		                                
		// 解析列表规则
		$list_data = $this->_list_grid ( $model );
		$fields = $list_data ['fields'];
		// 搜索条件
		// $map ['coupon_id'] = $coupon_id;
		
		$map = $this->_search_map ( $model, $fields );
// 		$map ['manager_id'] = $this->mid;
		$row = empty ( $model ['list_row'] ) ? 20 : $model ['list_row'];
		
		empty ( $fields ) || in_array ( 'id', $fields ) || array_push ( $fields, 'id' );
		$name = parse_name ( get_table_name ( $model ['id'] ), true );
		$data = M ( $name )->field ( empty ( $fields ) ? true : $fields )->where ( $map )->order ( 'id DESC' )->page ( $page, $row )->select ();
		
		$dataTable = D ( 'Common/Model' )->getFileInfo ( $model );
		$data = $this->parseData ( $data, $dataTable->fields, $dataTable->list_grid, $dataTable->config );	
				
		/* 查询记录总数 */
		$count = M ( $name )->where ( $map )->count ();
		$list_data ['list_data'] = $data;
		
		// 分页
		if ($count > $row) {
			$page = new \Think\Page ( $count, $row );
			$page->setConfig ( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
			$list_data ['_page'] = $page->show ();
		}
		if ($isAjax) {
			unset ( $list_data ['list_grids'] ['phone'] );
			unset ( $list_data ['list_grids'] ['ids'] );
			
			$this->assign ( $list_data );
			$this->display ( 'lists_data' );
		} else {
			$this->assign ( $list_data );
			$this->display ();
		}
	}
	function list_data() {
		$page = I ( 'p', 1, 'intval' );
		$map['token']=get_token();
		$list_data = M ( 'coupon_shop' )->where($map)->order ( 'id DESC' )->page ( $page, 20 )->selectPage ( 20 );
		// dump ( $list_data );
		
		echo JSON ( $list_data );
	}
	function output() {
		$model = $this->getModel ( $this->table );
		$map ['manager_id'] = $this->mid;
		session ( 'common_condition', $map );
		// 搜索条件
		// $map ['coupon_id'] = I ( 'coupon_id' );
		// $search= I ( 'search' );
		// dump($search);
		// if ($search){
		// $this->assign('search',$search);
		// $map ['name'] = array (
		// 'like',
		// '%' . htmlspecialchars ( $search ) . '%'
		// );
		// session ( 'common_condition', $map );
		// }
		
		parent::common_export ( $model );
	}
	function import() {
		$model = $this->getModel ( 'import' );
		if (IS_POST) {
			$column = array (
					'A' => 'name',
					'B' => 'phone',
					'C' => 'address' 
			);
			
			$attach_id = I ( 'attach', 0 );
			
			$res = importFormExcel ( $attach_id, $column );
			if ($res ['status'] == 0) {
				$this->error( '400135:'. $res ['data'] );
			}
			$total = count ( $res ['data'] );
			foreach ( $res ['data'] as $vo ) {
				if (empty ( $vo ['name'] )) {
					$this->error( '400136:店名不能为空' );
				}
				if (empty ( $vo ['address'] )) {
					$this->error( '400137:详细地址不能为空' );
				}
				$vo ['token'] = get_token ();
				$vo ['manager_id'] = $this->mid;
				$r = M ( 'coupon_shop' )->add ( $vo );
			}
			$msg = "共导入" . $total . "条记录";
			// dump($arr);
			// $msg = trim ( $msg, ', ' );
			// dump($msg);exit;
			
			$this->success ( $msg, U ( 'lists' ,array('mdm'=>$_GET['mdm'])) );
		} else {
			$fields = get_model_attribute ( $model ['id'] );
			$this->assign ( 'fields', $fields );
			
			$this->assign ( 'post_url', U ( 'import' ,array('mdm'=>$_GET['mdm'])));
			$this->assign ( 'import_template', 'coupon_shop.xls' );

			$this->display ( T ( 'Addons/import' ) );
		}
	}
	function del() {
		$model = $this->getModel ( $this->table );
// 		D('Addons://Coupon/Coupon')->getCouponShop(true);
		parent::del ( $model );
	}
	function add() {
		$model = $this->getModel ( $this->table );
		$this->checkData();
		parent::common_add ( $model );
	}
	public function edit() {
		$model = $this->getModel ( $this->table );
		$this->assign ( 'post_url', U ( 'edit' ) );
		$this->checkData();
		parent::common_edit ( $model, 0, 'add' );
	}
    function checkData(){
        if (IS_POST){
            if (empty($_POST['name'])){
                $this->error('400138:店名不为空');
            }
            if (empty($_POST['address'])){
                $this->error('400139:地址不为空');
            }
        }
    }
	function sence_qr(){
		$id = I('get.id',0,intval);
		if($id){
			$res['qrcode'] = D ( 'Home/QrCode' )->add_qr_code ( 'QR_SCENE', 'CouponShop', $id );
			$this->ajaxReturn($res,'JSON');
		}
	}
}
