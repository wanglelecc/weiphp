<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Admin\Controller;

/**
 * 后台用户控制器
 *
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class UserController extends AdminController {
	
	/**
	 * 用户管理首页
	 *
	 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
	 */
	public function index() {
		$nickname = I ( 'nickname' );
		$map ['status'] = array (
				'egt',
				0 
		);
		if (is_numeric ( $nickname )) {
			$map ['uid|nickname'] = array (
					intval ( $nickname ),
					array (
							'like',
							'%' . $nickname . '%' 
					),
					'_multi' => true 
			);
		} else {
			$map ['nickname'] = array (
					'like',
					'%' . ( string ) $nickname . '%' 
			);
		}
		$map ['password'] = [ 
				'exp',
				'IS NOT NULL' 
		];
		$list = $this->lists ( 'User', $map );
		if (! empty ( $list )) {
			foreach ( $list as &$vo ) {
				$vo ['audit_text'] = $vo ['is_audit'] ? '通过' : '待审';
			}
		}
		
		int_to_string ( $list );
		$this->assign ( '_list', $list );
		
		
		$this->meta_title = '运营者信息';
		$this->display ();
	}
	/**
	 * 修改昵称初始化
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function updateNickname() {
		$nickname = M ( 'User' )->getFieldByUid ( UID, 'nickname' );
		$this->assign ( 'nickname', $nickname );
		$this->meta_title = '修改昵称';
		$this->display ();
	}
	
	/**
	 * 修改昵称提交
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function submitNickname() {
		// 获取参数
		$nickname = I ( 'post.nickname' );
		$password = I ( 'post.password' );
		empty ( $nickname ) && $this->error ( '140279:请输入昵称' );
		empty ( $password ) && $this->error ( '140280:请输入密码' );
		
		// 密码验证
		$map ['nickname'] = I ( 'post.old_nickname' );
		$User = D ( 'Common/User' );
		$user = $User->where ( $map )->find ();
		if (think_weiphp_md5 ( $password ) !== $user ['password']) {
			$this->error ( '140281:密码不正确' );
		}
		
		$uid = $user ['uid'];
		$data = $User->create ( array (
				'nickname' => $nickname 
		) );
		if (! $data) {
			$this->error ( '140282:' . $User->getError () );
		}
		
		$res = $User->where ( array (
				'uid' => $uid 
		) )->save ( $data );
		
		if ($res) {
			$user = session ( 'user_auth' );
			$user ['username'] = $data ['nickname'];
			session ( 'user_auth', $user );
			session ( 'user_auth_sign', data_auth_sign ( $user ) );
			$this->success ( '修改昵称成功！' );
		} else {
			$this->error ( '140283:修改昵称失败！' );
		}
	}
	
	/**
	 * 修改密码初始化
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function updatePassword() {
		$this->meta_title = '修改密码';
		$this->display ();
	}
	
	/**
	 * 修改密码提交
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function submitPassword() {
		// 获取参数
		$password = I ( 'post.old' );
		empty ( $password ) && $this->error ( '140284:请输入原密码' );
		$data ['password'] = I ( 'post.password' );
		empty ( $data ['password'] ) && $this->error ( '140285:请输入新密码' );
		$repassword = I ( 'post.repassword' );
		empty ( $repassword ) && $this->error ( '140286:请输入确认密码' );
		
		if ($data ['password'] !== $repassword) {
			$this->error ( '140287:您输入的新密码与确认密码不一致' );
		}
		
		$res = D ( 'Common/User' )->updateUserFields ( UID, $password, $data );
		if ($res !== false) {
			$this->success ( '修改密码成功！' );
		} else {
			$this->error ( '140288:' . $res ['info'] );
		}
	}
	
	/**
	 * 用户行为列表
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function action() {
		// 获取列表数据
		$Action = M ( 'Action' )->where ( array (
				'status' => array (
						'gt',
						- 1 
				) 
		) );
		$list = $this->lists ( $Action );
		int_to_string ( $list );
		// 记录当前列表页的cookie
		Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] );
		
		$this->assign ( '_list', $list );
		$this->meta_title = '用户行为';
		$this->display ();
	}
	
	/**
	 * 新增行为
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function addAction() {
		$this->meta_title = '新增行为';
		$this->assign ( 'data', null );
		$this->display ( 'editaction' );
	}
	
	/**
	 * 编辑行为
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function editAction() {
		$id = I ( 'get.id' );
		empty ( $id ) && $this->error ( '140289:参数不能为空！' );
		$data = M ( 'Action' )->field ( true )->find ( $id );
		
		$this->assign ( 'data', $data );
		$this->meta_title = '编辑行为';
		$this->display ( 'editaction' );
	}
	
	/**
	 * 更新行为
	 *
	 * @author huajie <banhuajie@163.com>
	 */
	public function saveAction() {
		$res = D ( 'Action' )->update ();
		if (! $res) {
			$this->error ( '140290:' . D ( 'Action' )->getError () );
		} else {
			$this->success ( $res ['id'] ? '更新成功！' : '新增成功！', Cookie ( '__forward__' ) );
		}
	}
	
	/**
	 * 会员状态修改
	 *
	 * @author 朱亚杰 <zhuyajie@topthink.net>
	 */
	public function changeStatus($method = null) {
		$id = array_unique ( ( array ) I ( 'id', 0 ) );
		if (in_array ( C ( 'USER_ADMINISTRATOR' ), $id )) {
			$this->error ( "140291:不允许对超级管理员执行该操作!" );
		}
		$id = is_array ( $id ) ? implode ( ',', $id ) : $id;
		if (empty ( $id )) {
			$this->error ( '140292:请选择要操作的数据!' );
		}
		$map ['uid'] = array (
				'in',
				$id 
		);
		switch (strtolower ( $method )) {
			case 'forbiduser' :
				$this->forbid ( 'User', $map );
				break;
			case 'resumeuser' :
				$this->resume ( 'User', $map );
				break;
			case 'deleteuser' :
				$this->delete ( 'User', $map );
				break;
			case 'audit_1' :
				$this->audit ( $map, 1, $id );
				break;
			case 'audit_0' :
				$this->audit ( $map, 0, $id );
				break;
			default :
				$this->error ( '140293:参数非法' );
		}
	}
	function audit($map, $val, $ids = 0) {
		$savedata ['is_audit'] = $val;
		$savedata ['audit_time'] = time ();
		$res = M ( 'user' )->where ( $map )->save ( $savedata );
		if ($res) {
			if (is_array ( $ids )) {
				foreach ( $ids as $id ) {
					D ( 'Common/User' )->getUserInfo ( $id, true );
				}
			} else {
				D ( 'Common/User' )->getUserInfo ( $ids, true );
			}
			
			$this->success ( '设置成功' );
		} else {
			$this->error ( '140294:设置失败' );
		}
	}
	public function changeGroup() {
		$id = array_unique ( ( array ) I ( 'id', 0 ) );
		
		if (empty ( $id )) {
			$this->error ( '140295:请选择用户!' );
		}
		$group_id = I ( 'group_id', 0 );
		if (empty ( $group_id )) {
			$this->error ( '140296:请选择用户组!' );
		}
		$data ['uid'] = array (
				'in',
				$id 
		);
		$data ['group_id'] = $group_id;
		M ( 'auth_group_access' )->where ( $data )->delete ();
		
		$type = I ( 'type', 0 );
		if ($type != 0)
			die ( 1 );
		
		foreach ( $id as $uid ) {
			$data ['uid'] = $uid;
			$res = M ( 'auth_group_access' )->add ( $data );
			
			// 更新用户缓存
			D ( 'Common/User' )->getUserInfo ( $uid, true );
		}
		echo 1;
	}
	public function add($username = '', $password = '', $repassword = '', $email = '') {
		if (IS_POST) {
			/* 检测密码 */
			if ($password != $repassword) {
				$this->error ( '140297:密码和重复密码不一致！' );
			}
			
			/* 调用注册接口注册用户 */
			$uid = D ( 'Common/User' )->register ( $username, $password, $email );
			if (0 < $uid) { // 注册成功
				$this->success ( '用户添加成功！', U ( 'index' ) );
			} else { // 注册失败，显示错误信息
				$this->error ( '140298:用户添加失败！' );
			}
		} else {
			$this->meta_title = '新增用户';
			$this->display ();
		}
	}
	
	/**
	 * 获取用户注册错误信息
	 *
	 * @param integer $code
	 *        	错误编码
	 * @return string 错误信息
	 */
	private function showRegError($code = 0) {
		switch ($code) {
			case - 1 :
				$error = '用户名长度必须在16个字符以内！';
				break;
			case - 2 :
				$error = '用户名被禁止注册！';
				break;
			case - 3 :
				$error = '用户名被占用！';
				break;
			case - 4 :
				$error = '密码长度必须在6-30个字符之间！';
				break;
			case - 5 :
				$error = '邮箱格式不正确！';
				break;
			case - 6 :
				$error = '邮箱长度必须在1-32个字符之间！';
				break;
			case - 7 :
				$error = '邮箱被禁止注册！';
				break;
			case - 8 :
				$error = '邮箱被占用！';
				break;
			case - 9 :
				$error = '手机格式不正确！';
				break;
			case - 10 :
				$error = '手机被禁止注册！';
				break;
			case - 11 :
				$error = '手机号被占用！';
				break;
			default :
				$error = '未知错误';
		}
		return $error;
	}
	
	/**
	 * 显示用户公众号信息
	 */
	function showPublic() {
		$uid = I ( 'uid' );
		if (! empty ( $uid )) {
			$map ['uid'] = $uid;
			$ucanter = M ( 'user' )->where ( $map )->find ();
			$public = M ( 'apps' )->where ( $map )->find ();
			$this->assign ( 'ucanter', $ucanter );
			$this->assign ( 'public', $public );
		}
		$this->display ( 'showMemberPublic' );
	}
	// 修改审核
	function changeAudit($is_audit, $uid) {
		$data ['is_audit'] = $is_audit == 1 ? '0' : '1';
		$result = D ( 'Common/User' )->updateInfo ( $uid, $data );
		if ($result) {
			$this->success ( '修改成功' );
		} else {
			$this->error ( '140299:修改失败' );
		}
	}
	function menu() {
		$this->disply ();
	}
}
