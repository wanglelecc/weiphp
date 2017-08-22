<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think\Template\TagLib;

use Think\Template\TagLib;

/**
 * Html标签库驱动
 */
class Weiphp extends TagLib {
	// 标签定义
	protected $tags = array (
			'form' => array (
					'attr' => 'model,action,method,id,class',
					'level' => 3 
			),
			'input' => array (
					'attr' => 'name,title,type,value,placeholder,remark,is_show,extra,is_custom,class',
					'level' => 3 
			) 
	);
	var $wpinputArr = [ ];
	/**
	 * wpform标签解析
	 * 格式： <weiphp:form model="" action="" method="" id="" ></weiphp:form>
	 *
	 * @access public
	 * @param array $tag
	 *        	标签属性
	 * @param string $content
	 *        	标签内容
	 * @return string
	 */
	public function _form($tag, $content) {
		// dump ( $tag );
		// dump ( $content );
		$fields = $this->tpl->get ( 'fields' );
		if (empty ( $fields )) {
			$model = $tag ['model'];
			if ($model == 'form_model') {
				$model = $this->tpl->get ( $tag ['model'] );
			}
			empty ( $model ) && $model = CONTROLLER_NAME;
			
			if (strpos ( $model, '/' ) !== false) { // 支持跨插件或者跨应用调用 如: Ask/AskQuestion
				list ( $addon, $model ) = explode ( '/', $model, 2 );
			} else {
				$addon = MODULE_NAME;
			}
			$addon = parse_name ( $addon, 1 );
			$model = parse_name ( $model, 1 );
			
			$common_path = APP_PATH . 'Common/DataTable/' . $model . 'Table.class.php';
			$app_path = APP_PATH . $addon . '/DataTable/' . $model . 'Table.class.php';
			$addon_path = ADDON_PATH . $addon . '/DataTable/' . $model . 'Table.class.php';
			// dump ( $app_path );
			// dump ( $common_path );
			// dump ( $addon_path );
			if (file_exists ( $addon_path )) {
				require_once $addon_path;
			} elseif (file_exists ( $app_path )) {
				require_once $app_path;
			} elseif (file_exists ( $common_path )) {
				require_once $common_path;
			} else {
				E ( $model . ' 模型不存在' );
			}
			
			$class = $model . 'Table';
			$obj = new $class ();
			
			$fields = $obj->fields;
		}
		
		if (! empty ( $content )) {
			$this->tpl->parse ( $content );
		}
		
		$htmlArr = [ ];
		$dataArr = $this->getValue ();
		
		foreach ( $fields as $name => $field ) {
			isset ( $field ['is_show'] ) || $field ['is_show'] = 0;
			
			if ($dataArr !== false && isset ( $dataArr [$name] )) {
				$field ['value'] = $dataArr [$name];
			}
			if (! isset ( $this->wpinputArr [$name] )) {
				$html = $this->parseTemp ( $name, $field, $field ['is_show'] );
				empty ( $html ) || $htmlArr [$name] = $html;
			} else {
				$htmlArr [$name] = $this->wpinputArr [$name];
				unset ( $this->wpinputArr [$name] );
			}
		}
		// dump ( $htmlArr );
		// exit ();
		if (! empty ( $this->wpinputArr )) {
			$htmlArr = array_merge ( $htmlArr, $this->wpinputArr );
		}
		if (! isset ( $fields ['id'] ) && isset ( $dataArr ['id'] ) && ! empty ( $dataArr ['id'] )) {
			// 编辑状态自动加上ID值
			$htmlArr ['id'] = "<input type='hidden' name='id' value='{$dataArr ['id']}' />";
		}
		if (! isset ( $htmlArr ['submit_button'] )) {
			$submit_name = empty ( $tag ['submit_name'] ) ? '确 定' : $tag ['submit_name'];
			$htmlArr ['submit_button'] = "<div class='form-item form_bh'>
          <button class='btn submit-btn ajax-post' id='submit' type='submit' target-form='form-horizontal'>{$submit_name}</button></div>";
		}
		
		$id = $tag ['id'] == 'form_id' ? $this->tpl->get ( $tag ['id'] ) : $tag ['id'];
		empty ( $id ) && $id = 'form';
		
		$method = $tag ['method'] == 'form_method' ? $this->tpl->get ( $tag ['method'] ) : $tag ['method'];
		empty ( $method ) && $method = 'POST';
		
		$class = $tag ['class'] == 'form_class' ? $this->tpl->get ( $tag ['class'] ) : $tag ['class'];
		empty ( $class ) && $class = 'form-horizontal form-center';
		
		$action = $this->tpl->get ( $tag ['action'] );
		$action == false && $action = U ( ACTION_NAME );
		
		$parseStr = "<form id='{$id}' action='{$action}' method='{$method}' class='{$class}'>";
		$parseStr .= implode ( PHP_EOL, $htmlArr );
		// dump($parseStr);exit;
		$version = SITE_VERSION;
		$parseStr .= "</form>
<block name='script'>
  <link href='__STATIC__/datetimepicker/css/datetimepicker.css?v={$version}' rel='stylesheet' type='text/css'>
  <link href='__STATIC__/datetimepicker/css/dropdown.css?v={$version}' rel='stylesheet' type='text/css'>
  <script type='text/javascript' src='__STATIC__/datetimepicker/js/bootstrap-datetimepicker.js'></script> 
  <script type='text/javascript' src='__STATIC__/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v={$version}' charset='UTF-8'></script> 
  <script type='text/javascript'>
$('#submit').click(function(){
    $('#form').submit();
});
$(function(){
	var UploadFileExts = '{\$UploadFileExts}';
	//初始化上传图片插件
	initUploadImg();
	if(UploadFileExts!=''){
		initUploadFile(function(){},UploadFileExts);
	}else{
		initUploadFile();
	}
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:'zh-CN',
        minView:0,
        autoclose:true
    });
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:'zh-CN',
        minView:2,
        autoclose:true
    });
    showTab();

	$('.toggle-data').each(function(){
		var data = $(this).attr('toggle-data');
		if(data=='') return true;

	     if($(this).is(':selected') || $(this).is(':checked')){
			 change_event(this)
		 }
	});
	$('.toggle-data').bind('click',function(){ change_event(this) });
	$('select').change(function(){
		$('.toggle-data').each(function(){
			var data = $(this).attr('toggle-data');
			if(data=='') return true;

			 if($(this).is(':selected') || $(this).is(':checked')){
				 change_event(this)
			 }
		});
	});
});
</script> 
</block>";
		return $parseStr;
	}
	/**
	 * wpform标签解析
	 * 格式： <weiphp:input name="" value="" is_custom="0"></weiphp:input>
	 *
	 * @access public
	 * @param array $tag
	 *        	标签属性
	 * @param string $content
	 *        	标签内容
	 * @return string
	 */
	public function _input($tag, $content) {
		$name = $tag ['name'];
		unset ( $tag ['name'] );
		
		$fields = $this->tpl->get ( 'fields' );
		if (isset ( $fields [$name] )) {
			$tag = array_merge ( $fields [$name], $tag );
		}
		
		$dataArr = $this->getValue ();
		if ($dataArr !== false && isset ( $dataArr [$name] )) {
			$tag ['value'] = $dataArr [$name];
		}
		
		if (isset ( $tag ['is_custom'] ) && $tag ['is_custom'] == 1) {
			$this->wpinputArr [$name] = $this->tpl->parse ( $content );
		} else {
			$this->wpinputArr [$name] = $this->parseTemp ( $name, $tag );
		}
		return '';
	}
	function getValue() {
		$dataArr = $this->tpl->get ( 'form_data' );
		
		// 兼容老版本
		$data = $this->tpl->get ( 'data' );
		if (empty ( $dataArr ) && ! empty ( $data )) {
			$dataArr = $data;
		}
		// dump ( $dataArr );
		return empty ( $dataArr ) ? [ ] : $dataArr;
	}
	function parseTemp($name, $field, $is_show = 1) {
		$value = $field ['value'];
		$extra = $field ['extra'];
		$class = $field ['class'];
		if ($is_show == 4) {
			if (empty ( $value ) && isset ( $_GET [$name] )) {
				$value = I ( 'get.' . $name );
			}
			return "<input type='hidden' name='{$name}' value='{$value}' />";
		} else if ($is_show == 1 || $is_show == 3 || ($is_show == 5 && I ( $name ))) {
			$html = "<div class='form-item cf toggle-{$name} {$class}'>
			<label class='item-label'>";
			empty ( $field ['is_must'] ) || $html .= "<span class='need_flag'>*</span>";
			$html .= $field ['title'];
			empty ( $field ['remark'] ) || $html .= "<span class='check-tips'>({$field['remark']})</span>";
			$html .= "</label>
			<div class='controls'>";
			
			switch ($field ['type']) {
				case 'num' :
					$html .= "<input type='number' class='text' name='{$name}' value='{$value}'>";
					break;
				case 'string' :
					$html .= "<input type='text' class='text input-large' name='{$name}' value='{$value}'>";
					break;
				case 'textarea' :
					$html .= "<label class='textarea input-large'><textarea name='{$name}'>{$value}</textarea></label>";
					break;
				case 'datetime' :
					$html .= "<input type='datetime' name='{$name}' class='text time' value='" . time_format ( $value ) . "' placeholder='请选择时间' />";
					break;
				case 'date' :
					$html .= "<input type='datetime' name='{$name}' class='text date' value='" . time_format ( $value, 'Y-m-d' ) . "' placeholder='请选择日期' />";
					break;
				case 'bool' :
				case 'select' :
					$html .= "<select name='{$name}'>";
					foreach ( parse_field_attr ( $extra ) as $key => $vo ) {
						$html .= "<option value='{$key}' class='toggle-data' toggle-data='" . get_hide_attr ( $vo ) . "'";
						if ($value == $key)
							$html .= " selected ";
						$html .= ">" . clean_hide_attr ( $vo ) . "</option>";
					}
					
					$html .= "</select>";
					break;
				case 'cascade' :
					$html .= "<div id='cascade_{$name}'></div>";
					$html .= "{:hook ( 'cascade', ['name' => '{$name}', 'value' => '{$value}', 'extra' => '{$extra}'] )}";
					break;
				case 'dynamic_select' :
					$html .= "<div id='dynamic_select_{$name}'></div>";
					$html .= "{:hook ( 'dynamic_select', ['name' => '{$name}', 'value' => '{$value}', 'extra' => '{$extra}'] )}";
					break;
				case 'dynamic_checkbox' :
					$html .= "<div id='dynamic_checkbox_{$name}'></div>";
					$html .= "{:hook ( 'dynamic_checkbox', ['name' => '{$name}', 'value' => '{$value}', 'extra' => '{$extra}'] )}";
					break;
				case 'material' :
					$html .= "<div id='material_{$name}'></div>";
					$html .= "{:hook ( 'material', ['name' => '{$name}', 'value' => '{$value}', 'extra' => '{$extra}'] )}";
					break;
				case 'prize' :
					$html .= "<div id='prize_{$name}'></div>";
					$html .= "{:hook ( 'prize', ['name' => '{$name}', 'value' => '{$value}', 'extra' => '{$extra}'] )}";
					break;
				case 'news' :
					$html .= "<div id='news_{$name}'></div>";
					$html .= "{:hook ( 'news', ['name' => '{$name}', 'value' => '{$value}', 'extra' => '{$extra}'] )}";
					break;
				case 'image' :
					$html .= "<div id='image_{$name}'></div>";
					$html .= "{:hook ( 'image', ['name' => '{$name}', 'value' => '{$value}', 'extra' => '{$extra}'] )}";
					break;
				case 'radio' :
					foreach ( parse_field_attr ( $extra ) as $key => $vo ) {
						$html .= "<div class='check-item'>
						<input type='radio' class='regular-radio toggle-data' value='{$key}' id='{$name}_{$key}' name='{$name}' toggle-data='" . get_hide_attr ( $vo ) . "'";
						if ($value == $key)
							$html .= " checked='checked' ";
						$html .= "/>
							<label for='{$name}_{$key}'></label>" . clean_hide_attr ( $vo ) . "</div>";
					}
					break;
				case 'checkbox' :
					is_array ( $value ) || $value = explode ( ',', $value );
					foreach ( parse_field_attr ( $extra ) as $key => $vo ) {
						$html .= "<div class='check-item'>
						<input type='checkbox' class='regular-checkbox toggle-data' value='{$key}' id='{$name}_{$key}' name='{$name}[]' toggle-data='" . get_hide_attr ( $vo ) . "'";
						if (in_array ( $key, $value ))
							$html .= " checked='checked' ";
						$html .= "/>
							<label for='{$name}_{$key}'></label>" . clean_hide_attr ( $vo ) . "</div>";
					}
					break;
				case 'editor' :
					$html .= "<label class='textarea'><textarea name='{$name}' style='width:405px;height:100px;'>{$value}</textarea>";
					$html .= "{:hook ( 'adminArticleEdit', [ 'name' => '{$name}', 'value' => '{$value}' ] )}  </label>";
					break;
				case 'picture' :
					$html .= "<div class='controls uploadrow2' data-max='1' title='点击修改图片' rel='{$name}'>
					<input type='file' id='upload_picture_{$name}'>
					<input type='hidden' name='{$name}' id='cover_id_{$name}' value='{$value}'/>
					<div class='upload-img-box'>";
					if (! empty ( $value )) {
						$html .= "<div class='upload-pre-item2'><img width='100' height='100' src='" . get_cover_url ( $value ) . "'/></div><em class='edit_img_icon'>&nbsp;</em>";
					}
					$html .= "</div></div>";
					break;
				case 'mult_picture' :
					$html .= "<div class='mult_imgs'>
					<div class='upload-img-view' id='mutl_picture_{$name}'>";
					if (! empty ( $value )) {
						$value = explode ( ',', $value );
						foreach ( $value as $key => $vo ) {
							$html .= "<div class='upload-pre-item22'> <img width='100' height='100' src='" . get_cover_url ( $vo ) . "'/>
							<input type='hidden' name='{$name}[]' value='{$vo}'/><em>&nbsp;</em> </div>'";
						}
					}
					$html .= "</div>
					<div class='controls uploadrow2' data-max='9' title='点击上传图片' rel='{$name}'>
					<input type='file' id='upload_picture_{$name}'>
					</div>
					</div>";
					break;
				case 'file' :
					$html .= "<div class='controls upload_file' rel='{$name}'>
					<div id='upload_file_{$name}' class='uploadrow_file'></div>
					<input type='hidden' name='{$name}' value='{$value}'/>
					<div class='upload-img-box'>";
					if (! empty ( $value )) {
						$html .= "<div class='upload-pre-file'><span class='upload_icon_all'></span>" . get_table_field ( $value, 'id', 'name', 'File' ) . "</div>";
					}
					$html .= "</div></div>";
					break;
				case 'user' :
					$html .= "<div id='userList' class='common_add_list fl'>";
					if (! empty ( $value )) {
						$userInfo = getUserInfo ( $value );
						$html .= "<div class='item' onClick='$.WeiPHP.selectSingleUser(\"" . addons_url ( 'UserCenter://UserCenter/lists' ) . "\",\"{$name}\");'>
						<img src='{$userInfo['headimgurl']}'/><br/>
						<span>{$userInfo['nickname']}</span>
						<input type='hidden' name='{$name}' value='{$value}'/>
						<span class='name'>{$userInfo['nickname']}</span> </div>";
					} else {
						$html .= "<a href='javascript:
					;' class='common_add_btn fl' onClick='$.WeiPHP.selectSingleUser(\"" . addons_url ( 'UserCenter://UserCenter/lists' ) . "\",\"{$name}\");'></a> ";
					}
					$html .= "</div>";
// 					dump($html);
					break;
				case 'users' :
					$html .= "<div id='userList' class='common_add_list fl'>";
					if (! empty ( $value )) {
						$userIds = explode ( ',', $value );
						foreach ( $userIds as $key => $uid ) {
							$userInfo = getUserInfo ( $uid );
							$html .= "<div class='item' onClick='$.WeiPHP.selectSingleUser(\"" . addons_url ( 'UserCenter://UserCenter/lists' ) . "\",\"{$name}\");'>
							<img src='{$userInfo['headimgurl']}'/><br/>
							<span>{$userInfo['nickname']}</span>
							<input type='hidden' name='{$name}'[]' value='{$value}'/>
							<span class='name'>{$userInfo['nickname']}</span> </div>";
						}
					}
					$html .= "<a href='javascript:;' class='common_add_btn fl' onClick='$.WeiPHP.selectMutiUser(\"" . addons_url ( 'UserCenter://UserCenter/lists' ) . "\",9,\"{$name}\");'></a></div>";
					break;
				case 'admin' :
					$html .= "<div id='userList' class='common_add_list fl'>";
					if (! empty ( $value )) {
						$userInfo = getUserInfo ( $value );
						$html .= "<div class='item' onClick='$.WeiPHP.selectSingleUser(\"" . addons_url ( 'UserCenter://UserCenter/admin_lists' ) . "\",\"{$name}\");'>
						<img src='{$userInfo['headimgurl']}'/><br/>
						<span>{$userInfo['nickname']}</span>
						<input type='hidden' name='{$name}'' value='{$value}'/>
						<span class='name'>{$userInfo['nickname']}</span> </div>";
					} else {
						$html .= "<a href='javascript:;' class='common_add_btn fl' onClick='$.WeiPHP.selectSingleUser(\"" . addons_url ( 'UserCenter://UserCenter/admin_lists' ) . "\",\"{$name}\");'></a>";
					}
					$html .= "</div>";
					break;
				default :
					$html .= "<input type='text' class='text input-large' name='{$name}' value='{$value}'>";
			}
			return $html . '</div></div>';
		}
	}
}