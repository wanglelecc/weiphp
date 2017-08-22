<?php

namespace Addons\CardVouchers\Controller;

use Think\ManageBaseController;

class CardVouchersController extends ManageBaseController {
    function add(){
        if(IS_POST){
            $card_id =$_POST['card_id'];
            $res =$this->checkCard($card_id);
            if(!$res){
                $this->error('卡券ID不正确');
            }
        }
        parent::common_add();
    }
	function edit() {
		$id = I ( 'id' );
		$model = $this->getModel ();
		if (IS_POST) {
		    $card_id =$_POST['card_id'];
		    $res =$this->checkCard($card_id);
		    if(!$res){
		        $this->error('卡券ID不正确');
		    }
			//$_POST ['update_time'] = NOW_TIME;
			$Model = D ( parse_name ( get_table_name ( $model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $model ['id'] );
			if ($Model->create () && $Model->save ()) {
				$this->_saveKeyword ( $model, $id );
			}
			// 清空缓存
			method_exists ( $Model, 'clear' ) && $Model->clear ( $id, 'edit' );
			$this->success ( '保存' . $model ['title'] . '成功！', U ( 'lists?model=' . $model ['name'] ) );
		} else {
			$fields = get_model_attribute ( $model ['id'] );
			
			// 获取数据
			$data = D ( 'CardVouchers' )->getInfo ( $id );
			$data || $this->error( '400113:数据不存在！' );
			
			$token = get_token ();
			if (isset ( $data ['token'] ) && $token != $data ['token'] && defined ( 'ADDON_PUBLIC_PATH' )) {
				$this->error( '400114:非法访问！' );
			}
			
			$this->assign ( 'fields', $fields );
			$this->assign ( 'data', $data );
			$this->meta_title = '编辑' . $model ['title'];
			
			
			$this->display ();
		}
	}
	function preview(){
		$id = I ( 'id', 0, 'intval' );
		$url = addons_url('CardVouchers://Wap/index',['id' => $id ]);
		$this -> assign('url',$url);
		$this->display ( 'Home@Addons/preview' );
	}
	
	function lists() {
	    $isAjax = I ( 'isAjax' );
	    $isRadio = I ( 'isRadio' );
	    $model = $this->getModel ( 'card_vouchers' );
	    $list_data = $this->_get_model_list ( $model, 0, 'id desc', true );
	    // 		判断该活动是否已经设置投票调查
	    if ($isAjax) {
	        $this->assign('isRadio',$isRadio);
	        $this->assign ( $list_data );
	        $this->display ( 'ajax_lists_data' );
	    } else {
	        $this->assign ( $list_data );
	        $this->display ();
	    }
	}
	function list_data() {
        //$page = I ( 'p', 1, 'intval' );
        $map['token']=get_token();
        $map['aim_table']='lottery_games';
        $dao=D ( 'Addons://CardVouchers/CardVouchers' );
        $list_data =$dao->where($map)->field('id')->order ( 'id DESC' )->select (  );
       
        foreach ($list_data as &$v){
            $v=$dao->getInfo($v['id']);
            $v['background']=get_cover_url($v['background']);
        }
        $list_data['list_data']=$list_data;
//         dump ( $list_data );
        $this->ajaxReturn( $list_data ,'JSON');
    }
    
    function checkCard($card_id){
        $access_token =get_access_token();
        $url ='https://api.weixin.qq.com/card/get?access_token='.$access_token;
        $param['card_id'] =$card_id;
        $res =post_data($url, $param);
        //dump($res);exit;
        if($res['errcode'] == 0){
            return true;
        }else{
            return false;
        }
        
    }
}
