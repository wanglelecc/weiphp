<?php

namespace Common\Widget;

use Think\WidgetController;

/**
 * 级联菜单插件
 *
 * @author 凡星
 */
class DynamicSelectWidget extends WidgetController {
	
	/**
	 * 编辑器挂载的后台文档模型文章内容钩子
	 *
	 * table=addons&type=1&value_field=name&title_field=title&order=id desc&first_option=请选择
	 */
	public function run($data) {
		$key = 'select_' . $data ['name'] . '_' . get_token ();
		$res = S ( $key );
		
		if ($res === false || true) {
			$manager_id = $GLOBALS ['uid'];
			$token = get_token ();
			$data ['extra'] = str_replace ( array (
					'[manager_id]',
					'[token]' 
			), array (
					$manager_id,
					$token 
			), $data ['extra'] );
			
			parse_str ( $data ['extra'], $arr );
			
			$table = ! empty ( $arr ['table'] ) ? $arr ['table'] : 'common_category';
			$value_field = ! empty ( $arr ['value_field'] ) ? $arr ['value_field'] : 'id';
			$title_field = ! empty ( $arr ['title_field'] ) ? $arr ['title_field'] : 'title';
			$order = ! empty ( $arr ['order'] ) ? $arr ['order'] : $value_field . ' asc';
			$first_option = ! empty ( $arr ['first_option'] ) ? $arr ['first_option'] : '请选择';
			
			unset ( $arr ['table'], $arr ['value_field'], $arr ['title_field'], $arr ['order'], $arr ['first_option'] );
			// dump($arr);
			// $arr ['token'] = get_token ();
			$list = M ( $table )->where ( $arr )->field ( $value_field . ',' . $title_field )->order ( $order )->select ();
			// dump($list);lastsql();
			// $res = array ();
			foreach ( $list as $v ) {
				$res [$v [$value_field]] = $v [$title_field];
			}
			
			S ( $key, $res, 86400 );
		}
		// dump ( $json );
		$this->assign ( 'list', $res );
		
		$data ['default_value'] = $data ['value'];
		$this->assign ( $data );
		$this->assign ( 'first_option', $first_option );
		
		$this->display ( 'Common@Widget/DynamicSelect' );
	}
}