<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo ($meta_title); ?>|WeiPHP管理平台</title>
<link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css?v=<?php echo SITE_VERSION;?>" media="all">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css?v=<?php echo SITE_VERSION;?>" media="all">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css?v=<?php echo SITE_VERSION;?>" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css?v=<?php echo SITE_VERSION;?>" media="all">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/store.css?v=<?php echo SITE_VERSION;?>" media="all">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css?v=<?php echo SITE_VERSION;?>" media="all">
<!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js?v=<?php echo SITE_VERSION;?>"></script>
<!--<![endif]-->

</head>
<?php if(!empty($core_side_menu)): ?><body><?php endif; ?>
<?php if(empty($core_side_menu)): ?><body style="padding-left:0;"><?php endif; ?>
<!-- 头部 -->
<div class="header"> 
  <!-- Logo -->
  <?php if(C('SYSTEM_LOGO')) { ?>
  <span class="logo" style="float: left;margin-left: 2px;width: 198px;height: 49px;background:url('<?php echo C('SYSTEM_LOGO');?>') no-repeat center;background-size: 158px;" >
  <?php }else{ ?>
  <span class="logo" style="float: left;margin-left: 2px;width: 198px;height: 49px;background:url('./Public/Home/images/logo.png') no-repeat center; background-size: 158px;" > 
  
  <!--         <img style="height:49px;" src="/weiphp4.0/Public/Home/images/logo.png"> -->
  <?php } ?>
  </span> 
  <!-- /Logo --> 
  
  <!-- 主导航 -->
  <ul class="main-nav">
        <?php if(is_array($core_top_menu)): $i = 0; $__LIST__ = $core_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($ca["id"]); ?>" class="<?php echo ($ca["class"]); ?>"><a href="<?php echo ($ca["url"]); ?>"><?php echo ($ca["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>  
  </ul>
  <!-- /主导航 --> 
  
  <!-- 用户栏 -->
  <div class="user-bar"> <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
    <ul class="nav-list user-menu hidden">
      <li class="manager">你好，<em title="<?php echo (get_nickname($mid)); ?>"><?php echo (get_nickname($mid)); ?></em></li>
      <li><a href="<?php echo U('Home/Index/index');?>">返回前台</a></li>
      <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
      <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
      <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
    </ul>
  </div>
</div>
<!-- /头部 --> 

<!-- 边栏 -->
        <?php if(!empty($core_side_menu)): ?><div class="sidebar"> 
  <!-- 子导航 -->
  
    <div id="subnav" class="subnav">
        <!-- 子导航 -->
          <h3><i class="icon icon-unfold"></i><?php echo ($now_top_menu_name); ?></h3>
          <ul class="side-sub-menu">
            <?php if(is_array($core_side_menu)): $i = 0; $__LIST__ = $core_side_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>" data-id="<?php echo ($vo["id"]); ?>"> <a class="item" href="<?php echo ($vo["url"]); ?>"> <?php echo ($vo["title"]); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        
        <!-- /子导航 --> 
    </div>
  
  <!-- /子导航 --> 
</div><?php endif; ?>
<!-- /边栏 --> 

<!-- 内容区 -->
<div id="main-content">
  <div id="top-alert" class="fixed alert alert-error" style="display: none;">
    <button class="close fixed" style="margin-top: 4px;">&times;</button>
    <div class="alert-content">这是内容</div>
  </div>
  <div id="main" class="main">
     
      <!-- nav -->
      <?php if(!empty($_show_nav)): ?><div class="breadcrumb"> <span>您的位置:</span>
          <?php $i = '1'; ?>
          <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
              <?php else: ?>
              <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
            <?php $i = $i+1; endforeach; endif; ?>
        </div><?php endif; ?>
      <!-- nav --> 
    
    
    <div class="main-title cf">
        <h2><?php echo ($title); ?></h2>
    </div>
    <!-- 标签页导航 -->
<div class="tab-wrap">
    <div class="tab-content api-style">
    <!-- 表单 -->
    <form id='form' action='http://wechat02.56br.com/index.php?s=/w0/Admin/Api/add.html' method='POST' class='form-horizontal form-center'><div class='form-item cf toggle-title '>
			<label class='item-label'><span class='need_flag'>*</span>接口名称</label>
			<div class='controls'><input type='text' class='text input-large' name='title' value=''></div></div>
<div class='form-item cf toggle-mod '>
			<label class='item-label'>所属模型</label>
			<div class='controls'><div id='dynamic_select_mod'></div><?php echo hook ( 'dynamic_select', ['name' => 'mod', 'value' => '', 'extra' => 'table=model&value_field=name&title_field=title'] );?></div></div>
<div class="form-item cf toggle-url ">
			<label class="item-label"><span class="need_flag">*</span>接口地址:</label><?php echo SITE_URL;?>/index.php?s=/Api/Api/index/mod/<span id="url_model"><?php echo ($mod); ?></span>/act/
			<div class="controls"><input type="text" class="text input-large" name="url" value="<?php echo ($data["url"]); ?>" style="width:70px">/access_token/ACCESS_TOKEN</div>
            </div>
<div class='form-item cf toggle-method '>
			<label class='item-label'>请求类型</label>
			<div class='controls'><div class='check-item'>
						<input type='radio' class='regular-radio toggle-data' value='0' id='method_0' name='method' toggle-data='' checked='checked' />
							<label for='method_0'></label>POST</div><div class='check-item'>
						<input type='radio' class='regular-radio toggle-data' value='1' id='method_1' name='method' toggle-data=''/>
							<label for='method_1'></label>GET</div></div></div>
<div class='form-item cf toggle-return_type '>
			<label class='item-label'>返回值格式</label>
			<div class='controls'><div class='check-item'>
						<input type='radio' class='regular-radio toggle-data' value='0' id='return_type_0' name='return_type' toggle-data='' checked='checked' />
							<label for='return_type_0'></label>JSON</div><div class='check-item'>
						<input type='radio' class='regular-radio toggle-data' value='1' id='return_type_1' name='return_type' toggle-data=''/>
							<label for='return_type_1'></label>XML</div></div></div>
<div class='form-item cf toggle-type '>
			<label class='item-label'>接口类型</label>
			<div class='controls'><div class='check-item'>
						<input type='radio' class='regular-radio toggle-data' value='select' id='type_select' name='type' toggle-data='' checked='checked' />
							<label for='type_select'></label>查询</div><div class='check-item'>
						<input type='radio' class='regular-radio toggle-data' value='add' id='type_add' name='type' toggle-data=''/>
							<label for='type_add'></label>增加</div><div class='check-item'>
						<input type='radio' class='regular-radio toggle-data' value='del' id='type_del' name='type' toggle-data=''/>
							<label for='type_del'></label>删除</div><div class='check-item'>
						<input type='radio' class='regular-radio toggle-data' value='update' id='type_update' name='type' toggle-data=''/>
							<label for='type_update'></label>更新</div></div></div>
<div class="form-item cf" id="page">
        <label class="item-label">分页设置<span class="check-tips">（请求参数）</span></label>
        
        <div class="controls">
        <input type="radio" name="page" value="0" <?php if($data['page']==0): ?>checked="checked"<?php endif; ?> > 无分页
        <input type="radio" name="page" value="1" <?php if($data['page']==1): ?>checked="checked"<?php endif; ?> > 有分页
        </div>
        <div style="margin: 15px 0; display:none" class="specTable data-table" id="page_param">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th style="width: 150px">字段</th>
                        <th style="width: 150px">名称</th>
                        <th style="width: 150px">必填</th>
                        <th style="width: 100px">格式</th>
                        <th style="width: 150px">描述</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>page_direction</td>
                        <td>翻页方向</td>
                        <td>否</td>
                        <td>String</td>
                        <td>上一页：previous 下一页： next, 默认值：next</td>
                    </tr>
                    <tr>
                        <td>page_limit</td>
                        <td>每页数量</td>
                        <td>否</td>
                        <td>Int</td>
                        <td>每页最多返回记录数，默认10条</td>
                    </tr>
                    <tr>
                        <td>page_number</td>
                        <td>页码数</td>
                        <td>否</td>
                        <td>Int</td>
                        <td>默认为0时使用page_direction字段控制，大于0时page_direction失败，使用当前指定页码数</td>
                    </tr>                                        
                </tbody>
            </table>
        </div>
    </div>
<div class="form-item cf" id="condition">
        <label class="item-label">查询条件<span class="check-tips">（请求参数）</span></label>
        <div style="margin: 15px 0; " class="specTable data-table">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th style="width: 150px">字段</th>
                        <th style="width: 150px">名称</th>
                        <th style="width: 150px">条件</th>
                        <th style="width: 150px">必填</th>
                        <th style="width: 100px">格式</th>
                        <th style="width: 150px">描述</th>
                        <th style="width: 150px">操作</th>
                    </tr>
                </thead>
                <tbody id="list_data_tbody">
                    <?php if(is_array($params["condition"])): $sort = 0; $__LIST__ = $params["condition"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cd): $mod = ($sort % 2 );++$sort;?><tr class="list_tr" rel="<?php echo ($sort); ?>">
                        <td>
                        <select name="condition[<?php echo ($sort); ?>][name]" class="select_field_event" rel="edit">
    <?php if(is_array($param_fields)): $i = 0; $__LIST__ = $param_fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["name"]); ?>' data-must='<?php echo ($vo["is_must"]); ?>' data-type='<?php echo ($vo["type"]); ?>' data-remark='<?php echo ($vo["remark"]); ?>' <?php if(($cd["name"]) == $vo["name"]): ?>selected<?php endif; ?> ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>                                                          
                        </td>    
                        <td><input type="text" value="<?php echo ($cd["title"]); ?>" class="form-control attr_title" name="condition[<?php echo ($sort); ?>][title]"></td>   
                        <td>
                        <select name="condition[<?php echo ($sort); ?>][extra]" class="select_condition">
                            <option value="eq" <?php if(($cd["extra"]) == "eq"): ?>selected<?php endif; ?> >等于</option>
                            <option value="neq" <?php if(($cd["extra"]) == "neq"): ?>selected<?php endif; ?> >不等于</option>
                            <option value="gt" <?php if(($cd["extra"]) == "gt"): ?>selected<?php endif; ?> >大于</option>
                            <option value="egt" <?php if(($cd["extra"]) == "egt"): ?>selected<?php endif; ?> >大于等于</option>
                            <option value="lt" <?php if(($cd["extra"]) == "lt"): ?>selected<?php endif; ?> >小于</option>
                            <option value="elt" <?php if(($cd["extra"]) == "elt"): ?>selected<?php endif; ?> >小于等于</option>
                            <option value="like" <?php if(($cd["extra"]) == "like"): ?>selected<?php endif; ?> >模糊搜索</option>
                            <option value="between" <?php if(($cd["extra"]) == "between"): ?>selected<?php endif; ?>>区间</option>
                        </select></td>   
                        <td><input type="radio" name="condition[<?php echo ($sort); ?>][is_must]" value="0" <?php if($cd[is_must]==0): ?>checked="checked"<?php endif; ?> > NO
                        <input type="radio" name="condition[<?php echo ($sort); ?>][is_must]" value="1" <?php if($cd[is_must]==1): ?>checked="checked"<?php endif; ?> > YES</td>
                        <td><input type="text" value="<?php echo ($cd["type"]); ?>" class="form-control" name="condition[<?php echo ($sort); ?>][type]" placeholder="自动" style="width:50px"> </td>
                        <td><input type="text" value="<?php echo ($cd["remark"]); ?>" class="form-control" name="condition[<?php echo ($sort); ?>][remark]" placeholder="" style="width:150px"> </td>
                        <td><a href="javascript:void(0);" onclick="remove_tr(this)">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <tr class="more_tr">
                        <td colspan="7"><a href="javascript:add_tr('condition')">+增加</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<div class="form-item cf" id="order">
        <label class="item-label">排序字段<span class="check-tips">（请求参数）</span></label>
        <div style="margin: 15px 0; " class="specTable data-table">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th style="width: 150px">字段</th>
                        <th style="width: 150px">名称</th>
                        <th style="width: 150px">排序方式</th>
                        <th style="width: 150px">必填</th>
                        <th style="width: 150px">操作</th>
                    </tr>
                </thead>
                <tbody id="list_data_tbody">
                    <?php if(is_array($params["order"])): $sort = 0; $__LIST__ = $params["order"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cd): $mod = ($sort % 2 );++$sort;?><tr class="list_tr" rel="<?php echo ($sort); ?>">
        <td><select name="order[<?php echo ($sort); ?>][name]" class="select_field_event" rel="edit">
    <?php if(is_array($param_fields)): $i = 0; $__LIST__ = $param_fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["name"]); ?>' data-must='<?php echo ($vo["is_must"]); ?>' data-type='<?php echo ($vo["type"]); ?>' data-remark='<?php echo ($vo["remark"]); ?>' <?php if(($cd["name"]) == $vo["name"]): ?>selected<?php endif; ?> ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>        
        </select></td>
        <td><input type="text" value="<?php echo ($cd["title"]); ?>"  class="form-control attr_title" name="order[<?php echo ($sort); ?>][title]"></td>
        <td>
        <select name="order[<?php echo ($sort); ?>][extra]" class="select_condition">
            <option value="desc" <?php if(($cd["extra"]) == "desc"): ?>selected<?php endif; ?> >倒序（大到小，最新在前）</option>
            <option value="asc" <?php if(($cd["extra"]) == "asc"): ?>selected<?php endif; ?> >正序（小到大，最新在后）</option>
        </select></td>        
        <td><input type="radio" name="order[<?php echo ($sort); ?>][is_must]" value="0" <?php if($cd[is_must]==0): ?>checked="checked"<?php endif; ?> > NO 
        <input type="radio" name="order[<?php echo ($sort); ?>][is_must]" value="1" <?php if($cd[is_must]==1): ?>checked="checked"<?php endif; ?> > YES</td>
        <td><a href="javascript:void(0);" onclick="move_up(this)" title="向上"class="move_up">↑</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0);" onclick="move_down(this)" title="向下"class="move_down">↓</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0);" onclick="remove_tr(this)">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <tr class="more_tr">
                        <td colspan="6"><a href="javascript:add_tr('order')">+增加</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<div class="form-item cf" id="save">
        <label class="item-label">保存内容<span class="check-tips">（请求参数）</span></label>
        <div style="margin: 15px 0; " class="specTable data-table">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th style="width: 150px">字段</th>
                        <th style="width: 150px">名称</th>
                        <th style="width: 150px">必填</th>
                        <th style="width: 100px">格式</th>
                        <th style="width: 150px">描述</th>
                        <th style="width: 150px">操作</th>
                    </tr>
                </thead>
                <tbody id="list_data_tbody">
                    <?php if(is_array($params["save"])): $sort = 0; $__LIST__ = $params["save"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cd): $mod = ($sort % 2 );++$sort;?><tr class="list_tr" rel="<?php echo ($sort); ?>">
        <td><select name="save[<?php echo ($sort); ?>][name]" class="select_field_event" rel="edit">
    <?php if(is_array($param_fields)): $i = 0; $__LIST__ = $param_fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["name"]); ?>' data-must='<?php echo ($vo["is_must"]); ?>' data-type='<?php echo ($vo["type"]); ?>' data-remark='<?php echo ($vo["remark"]); ?>' <?php if(($cd["name"]) == $vo["name"]): ?>selected<?php endif; ?> ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>        
        </select></td>
        <td><input type="text" value="<?php echo ($cd["title"]); ?>"  class="form-control attr_title" name="save[<?php echo ($sort); ?>][title]"></td>       
        <td><input type="radio" name="save[<?php echo ($sort); ?>][is_must]" value="0" <?php if($cd[is_must]==0): ?>checked="checked"<?php endif; ?> > NO 
        <input type="radio" name="save[<?php echo ($sort); ?>][is_must]" value="1" <?php if($cd[is_must]==1): ?>checked="checked"<?php endif; ?> > YES</td>
        <td><input type="text" value="<?php echo ($cd["type"]); ?>" class="form-control type" name="save[<?php echo ($sort); ?>][type]" placeholder="" style="width:150px"></td>
        <td><input type="text" value="<?php echo ($cd["remark"]); ?>" class="form-control remark" name="save[<?php echo ($sort); ?>][remark]" placeholder="" style="width:100px"></td>
        <td><a href="javascript:void(0);" onclick="move_up(this)" title="向上"class="move_up">↑</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0);" onclick="move_down(this)" title="向下"class="move_down">↓</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0);" onclick="remove_tr(this)">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <tr class="more_tr">
                        <td colspan="6"><a href="javascript:add_tr('save')">+增加</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<div class="form-item cf" id="return">
        <label class="item-label">返回值<span class="check-tips">（每个接口都会返回固定字段：api_status和api_msg。有多条记录返回时，业务数据会以数组的方式返回）</span></label>
        <div style="margin: 15px 0; " class="specTable data-table">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th style="width: 150px">字段</th>
                        <th style="width: 150px">名称</th>
                        <th style="width: 100px">格式</th>
                        <th style="width: 150px">描述</th>
                    </tr>
                </thead>
                <tbody id="list_data_tbody">
                    <tr>
                        <td>api_status</td>
                        <td>接口状态</td>
                        <td>Int</td>
                        <td>0失败 1成功</td>
                    </tr>
                    <tr>
                        <td>api_msg</td>
                        <td>接口提示语</td>
                        <td>String</td>
                        <td>api_status=0时返回失败原因，api_status=0时为空</td>
                    </tr> 
                    <tr>
                        <td>data</td>
                        <td>业务数据</td>
                        <td>array</td>
                        <td>当接口类型为查询时，会以数组的方式返回查询的内容</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<div class='form-item form_bh'>
          <button class='btn submit-btn ajax-post' id='submit' type='submit' target-form='form-horizontal'>确 定</button></div></form>
<block name='script'>
  <link href='/Public/static/datetimepicker/css/datetimepicker.css?v=1503359637' rel='stylesheet' type='text/css'>
  <link href='/Public/static/datetimepicker/css/dropdown.css?v=1503359637' rel='stylesheet' type='text/css'>
  <script type='text/javascript' src='/Public/static/datetimepicker/js/bootstrap-datetimepicker.js'></script> 
  <script type='text/javascript' src='/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=1503359637' charset='UTF-8'></script> 
  <script type='text/javascript'>
$('#submit').click(function(){
    $('#form').submit();
});
$(function(){
	var UploadFileExts = '<?php echo ($UploadFileExts); ?>';
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
</block>    
    </div>
</div>
<table style="display: none">
	<tr id="default_tr_condition">
        <td><select name="condition[sort_id][name]" class="select_field_event"></select></td>
        <td><input type="text" value=""  class="form-control attr_title" name="condition[sort_id][title]"></td>
        <td>
        <select name="condition[sort_id][extra]" class="select_condition">
            <option value="eq">等于</option>
            <option value="neq">不等于</option>
            <option value="gt">大于</option>
            <option value="egt">大于等于</option>
            <option value="lt">小于</option>
            <option value="elt">小于等于</option>
            <option value="like">模糊搜索</option>
            <option value="between">区间</option>
        </select></td>        
        <td><input type="radio" name="condition[sort_id][is_must]" value="0" checked="checked"> NO 
        <input type="radio" name="condition[sort_id][is_must]" value="1"> YES</td>
        <td><input type="text" value="" class="form-control type" name="condition[sort_id][type]" placeholder="" style="width:150px"></td>
        <td><input type="text" value="" class="form-control remark" name="condition[sort_id][remark]" placeholder="" style="width:100px"></td>
        <td><a href="javascript:void(0);" onclick="move_up(this)" title="向上"class="move_up">↑</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0);" onclick="move_down(this)" title="向下"class="move_down">↓</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0);" onclick="remove_tr(this)">删除</a></td>
	</tr>
	<tr id="default_tr_order">
        <td><select name="order[sort_id][name]" class="select_field_event"></select></td>
        <td><input type="text" value=""  class="form-control attr_title" name="order[sort_id][title]"></td>
        <td>
        <select name="order[sort_id][extra]" class="select_condition">
            <option value="desc">倒序（大到小，最新在前）</option>
            <option value="asc">正序（小到大，最新在后）</option>
        </select></td>        
        <td><input type="radio" name="order[sort_id][is_must]" value="0" checked="checked"> NO 
        <input type="radio" name="order[sort_id][is_must]" value="1"> YES</td>
        <td><a href="javascript:void(0);" onclick="move_up(this)" title="向上"class="move_up">↑</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0);" onclick="move_down(this)" title="向下"class="move_down">↓</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0);" onclick="remove_tr(this)">删除</a></td>
	</tr>
	<tr id="default_tr_save">
        <td><select name="save[sort_id][name]" class="select_field_event"></select></td>
        <td><input type="text" value=""  class="form-control attr_title" name="save[sort_id][title]"></td>       
        <td><input type="radio" name="save[sort_id][is_must]" value="0" checked="checked"> NO 
        <input type="radio" name="save[sort_id][is_must]" value="1"> YES</td>
        <td><input type="text" value="" class="form-control type" name="save[sort_id][type]" placeholder="" style="width:150px"></td>
        <td><input type="text" value="" class="form-control remark" name="save[sort_id][remark]" placeholder="" style="width:100px"></td>
        <td><a href="javascript:void(0);" onclick="move_up(this)" title="向上"class="move_up">↑</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0);" onclick="move_down(this)" title="向下"class="move_down">↓</a>&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0);" onclick="remove_tr(this)">删除</a></td>
	</tr>               
    
</table>

  </div>
  <div class="cont-ft">
    <div class="copyright">
      <div class="fl">感谢使用<a href="http://www.weiphp.cn" target="_blank">WeiPHP</a>管理平台</div>
      <div class="fr">V<?php echo C('SYSTEM_UPDATRE_VERSION');?></div>
    </div>
  </div>
</div>
<!-- /内容区 --> 
<script type="text/javascript">
	var  IMG_PATH = "/Public/Admin/images";
	var  STATIC = "/Public/static";
	var  ROOT = "";
	var  UPLOAD_PICTURE = "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>";
	var  UPLOAD_FILE = "<?php echo U('File/upload',array('session_id'=>session_id()));?>";
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/index.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script> 
<script type="text/javascript" src="/Public/static/think.js?v=<?php echo SITE_VERSION;?>"></script> 
<script type="text/javascript" src="/Public/Admin/js/common.js?v=<?php echo SITE_VERSION;?>"></script> 
<script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
 
<script	type="text/javascript" charset="utf-8">
function init(){
	hide_move()
	$('.select_field_event').change(function(){ select_field_event(this); });
}

$(function(){
	$('select[name="mod"]').change(function(){ select_model(0); });
	
	$('input[name="page"]').change(function(){ page(this); });
	page()
	
    $('input[name="type"]').change(function(){ type(this); });
	type()
	
	init()
	<?php if(isset($data['id'])) { ?>
	select_model(1);
	<?php } ?>
});

//增加问题
var tr_sort_id = 0;
function add_tr(id){
	var list_count = 0;
	$('#'+id+' .list_tr').each(function() {
		list_count += 1;
		var sort_id = $(this).attr('rel');
		if(sort_id>tr_sort_id) tr_sort_id = sort_id;
    });	
	
	tr_sort_id += 1;

	re = new RegExp("sort_id", "g");
	re2 = new RegExp("param_type", "g");
	str  = $('#default_tr_'+id).html().replace(re, tr_sort_id).replace(re2, id);
	//console.log(str);
	var html = '<tr class="list_tr" rel="'+tr_sort_id+'">'+ str +'</tr>';
	if(list_count==0)
	  $('#'+id+' #list_data_tbody tr').before(html);	
	else
	  $('#'+id+' .list_tr:last').after(html);
	  
	init()
}
//删除问题
function remove_tr(_this){	
	$(_this).parent().parent().remove();
	init()
}
//排序--向上
function move_up(obj) { 
  var objParentTR = $(obj).parent().parent(); 
  var prevTR = objParentTR.prev(); 
  if (prevTR.length > 0) { 
	prevTR.insertAfter(objParentTR); 
  }
  init()
} 
//排序--向下
function move_down(obj) { 
  var objParentTR = $(obj).parent().parent(); 
  var nextTR = objParentTR.next(); 
  if (nextTR.length > 0) { 
	nextTR.insertBefore(objParentTR); 
  } 
  init()
} 
//第一行只显示向下，最后一行只显示向上
function hide_move(){
	$('.move_up').each(function() {
		$(this).show();
    });
	$('.move_down').each(function() {
		$(this).show();
    });	
	$('.list_tr:first').find('.move_up').hide();
	$('.list_tr:last').find('.move_down').hide();
}

//选择所属模块
function select_model(type){
	var mod = $('select[name="mod"]').val();
	
	if(type==0){
		$('#url_model').text(mod)
		
		//获取全部字段
		$.post("<?php echo U('getFields');?>",{mod:mod},function(html){
			$('.select_field_event').each(function() {
				$(this).html(html)
			});
		});
	}else{
		//获取全部字段
		$.post("<?php echo U('getFields');?>",{mod:mod},function(html){
			$('.select_field_event').each(function() {
				if($(this).attr('rel')!='edit'){
				    $(this).html(html)
				}
			});
		});
	}
}
function select_field_event(_this){
	var sel = $(_this).find("option:selected")
	var name = sel.text()
	var input = $(_this).parents('.list_tr').find('.attr_title')
	var old_val = input.val()

    var flat = false
	if(old_val==''){
	    flat = true 
	}else{
		$(_this).find('option').each(function (){ 
			if($(this).text()==old_val){
			    flat = true 
			}
        });
	}
	
	if(flat){
		input.val(name)
		console.log(sel.attr('data-must'))
		$(_this).parents('.list_tr').find("input[type='radio'][value='"+sel.attr('data-must')+"']").attr("checked",true); 
		$(_this).parents('.list_tr').find('.remark').val(sel.attr('data-remark'))
		$(_this).parents('.list_tr').find('.type').val(sel.attr('data-type'))
	}
}
function page(){
	var val = $('input[name="page"]:checked').val()
	if(val==1){
		$('#page_param').show()
	}else{
		$('#page_param').hide()
	}
}
function type(){
	var val = $('input[name="type"]:checked').val()

	if(val=='select'){
		$('#condition').show()
		$('#order').show()
		$('#page').show()
		$('#save').hide()
	}else if(val=='add'){
		$('#condition').hide()
		$('#order').hide()
		$('#page').hide()
		$('#save').show()
	}else if(val=='del'){
		$('#condition').show()
		$('#order').hide()
		$('#page').hide()
		$('#save').hide()
	}else if(val=='update'){
		$('#condition').show()
		$('#order').hide()
		$('#page').hide()
		$('#save').show()
	}
}
</script>

</body>
</html>