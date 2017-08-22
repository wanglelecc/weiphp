<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta content="<?php echo C('WEB_SITE_KEYWORD');?>" name="keywords"/>
<meta content="<?php echo C('WEB_SITE_DESCRIPTION');?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/static/emoji.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>-->
<!--引入JS-->
<script type="text/javascript" src="/Public/static/webuploader-0.1.5/webuploader.min.js"></script>

<script type="text/javascript" src="/Public/static/clipboard.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/Public/static/jquery.dragsort-0.5.2.min.js"></script> 
<script type="text/javascript">
var  IMG_PATH = "/Public/Home/images";
var  STATIC = "/Public/static";
var  ROOT = "";
var  UPLOAD_PICTURE = "<?php echo U('Home/File/uploadPicture',array('session_id'=>session_id()));?>";
var  UPLOAD_FILE = "<?php echo U('Home/File/upload',array('session_id'=>session_id()));?>";
var  UPLOAD_DIALOG_URL = "<?php echo U('Home/File/uploadDialog',array('session_id'=>session_id()));?>";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<div class="main_box">
	<!-- 头部 -->
	<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display:none">
  <?php if(!empty($code)): ?><a class="code" href="">解决方法 ></a><?php endif; ?>
  <div class="code_box"></div>
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content"></div>
</div>
<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="wrap">
    
       <a class="brand" title="<?php echo C('WEB_SITE_TITLE');?>" href="<?php echo U('index/index');?>">
       <?php if(!empty($userInfo[website_logo])): ?><img height="52" src="<?php echo (get_cover_url($userInfo["website_logo"])); ?>"/>
       	<?php else: ?>
       		<img height="52" src="/Public/Home/images/logo.png"/><?php endif; ?>
       </a>
        <?php if(is_login()): ?><div class="switch_mp">
            	<?php if(!empty($public_info["public_name"])): ?><a href="javascript:;"><?php echo ($public_info["public_name"]); ?>
                <?php if(!empty($myPublics)) { ?> <b class="pl_5 fa fa-sort-down"></b> <?php } ?>
                </a><?php endif; ?>
                <ul>
                <?php if(is_array($myPublics)): $i = 0; $__LIST__ = $myPublics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/index/main', array('wpid'=>$vo[mp_id]));?>"><?php echo ($vo["public_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><?php endif; ?>
      <?php $index_2 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/*' ); $index_3 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME ); ?>
       
            <div class="top_nav">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                    	<?php if($myinfo["is_init"] == 0 ): ?><li><p>该账号配置信息尚未完善，功能还不能使用</p></li>
                    		<?php elseif($myinfo["is_audit"] == 0 and !$reg_audit_switch): ?>
                    		<li><p>该账号配置信息已提交，请等待审核</p></li>
                            <?php elseif($index_2 == 'home/apps/*' or $index_3 == 'home/user/profile' or $index_2 == 'home/appslink/*' or $index_3 == 'home/user/bind_login'): ?>
                    		
                    		<?php else: ?> 
                    		<?php if(is_array($core_top_menu)): $i = 0; $__LIST__ = $core_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($ca["id"]); ?>" class="<?php echo ($ca["class"]); ?>"><a href="<?php echo ($ca["url"]); ?>"><?php echo ($ca["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    	
                    	
                        
                        <li class="dropdown admin_nav">
                            <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" style="">
                                <?php if(!empty($myinfo[headimgurl])): ?><img class="admin_head url" src="<?php echo ($myinfo["headimgurl"]); ?>"/>
                                <?php else: ?>
                                    <img class="admin_head default" src="/Public/Home/images/default.png"/><?php endif; ?>
                                <?php echo (getShort($myinfo["nickname"],4)); ?><b class="pl_5 fa fa-sort-down"></b>
                            </a>
                            <ul class="dropdown-menu" style="display:none">
                               <?php if($mid==C('USER_ADMINISTRATOR')): ?><li><a href="<?php echo U ('Admin/Index/Index');?>" target="_blank">后台管理</a></li><?php endif; ?>
                            	<li><a href="<?php echo U ('Home/Apps/lists');?>">应用列表</a></li>
                                <li><a href="<?php echo U ('Home/Apps/add');?>">账号配置</a></li>
                                <li><a href="<?php echo U('Home/User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('Home/User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                    	<li style="padding-right:20px">你好!欢迎来到<?php echo C('WEB_SITE_TITLE');?></li>
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>">注册</a>
                        </li>
                        <li>
                            <a href="<?php echo U('admin/index/index');?>" style="padding-right:0">后台入口</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
<?php  if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login',array('from'=>4))); } ?>
<div id="main-container" class="admin_container">
  <?php if(!empty($core_side_menu)): ?><div class="sidebar">
      <ul class="sidenav">
        <li>
          <?php if(!empty($now_top_menu_name)): ?><!--<a class="sidenav_parent" href="javascript:;"> -->
            <!--<img src="/Public/Home/images/left_icon_<?php echo ($core_side_category["left_icon"]); ?>.png"/>--> 
            <!--<?php echo ($now_top_menu_name); ?></a>--><?php endif; ?>
          <ul class="sidenav_sub">
            <?php if(is_array($core_side_menu)): $i = 0; $__LIST__ = $core_side_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>" data-id="<?php echo ($vo["id"]); ?>"> <a href="<?php echo ($vo["url"]); ?>"> <?php echo ($vo["title"]); ?> </a><b class="active_arrow"></b></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </li>
        <?php if(!empty($addonList)): ?><li> <a class="sidenav_parent" href="javascript:;"> <img src="/Public/Home/images/ico1.png"/> 其它功能</a>
            <ul class="sidenav_sub" style="display:none">
              <?php if(is_array($addonList)): $i = 0; $__LIST__ = $addonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> <i class="icon-chevron-right">
                  <?php if(!empty($vo['icon'])) { ?>
                  <img src="<?php echo ($vo["icon"]); ?>" />
                  <?php } ?>
                  </i> <?php echo ($vo["title"]); ?> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </li><?php endif; ?>
      </ul>
    </div><?php endif; ?>
  <div class="main_body">
    
  <div class="span9 page_message">
    <section id="contents">
      <ul class="tab-nav nav">
        <li class=""><a href="<?php echo U('lists');?>">投票列表<b class="arrow fa fa-sort"></b></a></li>
        <li class="current"><a href="###">新增投票<b class="arrow fa fa-sort"></b></a></li>
      </ul>
      <div class="tab-content"> 
        <!-- 表单 -->
        <?php $post_url || $post_url = U('add?model='.$model['id'], $get_param); ?>
        <form id="form" action="<?php echo ($post_url); ?>" method="post" class="form-horizontal form-center">
        	<ul id="tab" class="tab-pane in">
            	 <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>关键词</label>
                    <div class="controls">
                      <input type="text" class="text input-large" name="keyword" value="<?php echo ($data["keyword"]); ?>">
                    </div>
                  </li>  
                   <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>投票标题</label>
                    <div class="controls">
                      <input type="text" class="text input-large" name="title" value="<?php echo ($data["title"]); ?>">
                    </div>
                  </li>  
                  <li class="form-item cf">
                  		<label class="item-label"><span class="need_flag">*</span>封面图片<span class="check-tips">图片高度控制在200px-400px之间</span></label>
                		<div class="controls uploadrow2" data-max="1" title="点击修改图片" rel="picurl">
                            <input type="file" id="upload_picture_picurl">
                            <input type="hidden" name="picurl" id="cover_id_picurl" value="<?php echo ($data["picurl"]); ?>"/>
                            <div class="upload-img-box" rel="img">
                              <?php if(!empty($data[picurl])): ?><div class="upload-pre-item2"><img width="100" height="100" src="<?php echo (get_cover_url($data["picurl"])); ?>"/></div>
                                <em class="edit_img_icon">&nbsp;</em><?php endif; ?>
                            </div>
                      </div>
                  </li>
                  <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>投票描述</label>
                    <div class="controls">
                      <label class="textarea input-large">
                      <textarea class="text input-large" name="description" ><?php echo ($data["description"]); ?></textarea>
                      </label>
                    </div>
                  </li>   
                  
                  <li class="form-item cf toggle-prize_type" style="display:none">
              			<label class="item-label"><span class="need_flag">*</span>投票类型 </label>
              			<div class="controls">
                			<?php $_result=parse_field_attr($fields['type']['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="check-item">
								  <input type="radio" class="regular-radio toggle-data" value="<?php echo ($key); ?>" id="type_<?php echo ($key); ?>" name="type" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
								  <?php if(($data[type]) == $key): ?>checked="checked"<?php endif; ?> />
								  <label for="type_<?php echo ($key); ?>"></label><?php echo (clean_hide_attr($vo)); ?> 
							  </div><?php endforeach; endif; else: echo "" ;endif; ?>        
                      </div>
            	  </li>
                 
                  <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>开始时间</label>
                    <div class="controls">
                       <input type="datetime" name="start_date" class="text input-large time" value="<?php echo (time_format($data["start_date"])); ?>" placeholder="请选择时间" />
                    </div>
                  </li>  
                  <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>结束时间</label>
                    <div class="controls">
                       <input type="datetime" name="end_date" class="text input-large time" value="<?php echo (time_format($data["end_date"])); ?>" placeholder="请选择时间" />
                    </div>
                  </li>   
                  
                  <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>文字/图片选项</label>
                    <div class="controls">
                      <div class="check-item">
                              <input type="radio" name="is_img" value="0" class="regular-radio" id="is_img_0" <?php if($data[is_img]==0): ?>checked<?php endif; ?> onClick="changeOption()"><label for="is_img_0"> </label>
                              文字投票
                           </div>
                           <div class="check-item">   
                              <input type="radio" name="is_img" value="1" class="regular-radio" id="is_img_1" <?php if($data[is_img]==1): ?>checked<?php endif; ?> onClick="changeOption()">
                              <label for="is_img_1"> </label>图片投票   
                        
                        </div>
                     </div>
                  
					<div class="controls">
                        <table id="option_list" class="add_list_table" cellpadding="0" cellspacing="1">
                          
                          <tr class="add_list add_list_head" <?php if(empty($option_list)): ?>style="display:none"<?php endif; ?>>
                            <td class="pic_td">图片(上传正方形最佳)</td>
                            <td>标题</td>
                            <td>排序</td>
                            <td>操作</td>
                          </tr>
                          
                          <?php if(is_array($option_list)): $i = 0; $__LIST__ = $option_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="add_list">
                            <td class="pic_td">
                            <div class="uploadrow2" data-max=1 title="更改图片" rel="<?php echo ($vo["id"]); ?>">
                            <input type="file" class="uploadImage" id="uploadImage_exist_<?php echo ($vo["id"]); ?>" rel="<?php echo ($vo["id"]); ?>">
                            <input type="hidden" name="image[<?php echo ($vo["id"]); ?>]" id="cover_id_<?php echo ($vo["id"]); ?>"/>
                            <div class="upload-img-box">
                              <?php if(!empty($vo["image"])): ?><div class="upload-pre-item"><img width="100" height="100" src="<?php echo (get_cover_url($vo["image"])); ?>"/></div><?php endif; ?>
                            </div>
                            </div>
                            </td>
                            <td>
                            <input type="text" value="<?php echo ($vo["name"]); ?>" name="name[<?php echo ($vo["id"]); ?>]" class="text input-large" style="width:250px">&nbsp;
                            </td>
                            <td>
                            <input type="text" value="<?php echo ($vo["order"]); ?>" name="order[<?php echo ($vo["id"]); ?>]" class="optionSort text input-large" style="width:80px">&nbsp;
                            </td>
                            <td>
                            <a href="javascript:;" onClick="delOpt(this)" class="fr btn btn-yellow" >删除</a>
                            </td>
                           </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                          </table>
                      </div>
                      <p><a href="javascript:;" class="btn btn-yellow mt_10 mb_10" onClick="addOpt()" >增加选项</a></p>
               		</li>
                   
               	</ul>
          </div>
          <div class="form-item form_bh">
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确 定</button>
          </div>
        </form>

      </div>
    </section>
  </div>

  </div>
</div>

	<!-- /主体 -->
	</div>

	<!-- 底部 -->
	<div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由<a href="http://weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

<script type="text/javascript">
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

  <link href="/Public/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <?php if(C('COLOR_STYLE')=='blue_color') echo '
    <link href="/Public/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
    '; ?>
  <link href="/Public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.js"></script> 
  <script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script>
  <script type="text/javascript">
//上传图片
/* 初始化上传插件 */
var node = '';
function initPuls(){
	initUploadImg();
}


function addOpt(){
	var i = 1;
	$('.optionSort').each(function(){i++;});
	var id = 0-i;
	
	var html = '<tr class="add_list"><td class="pic_td"><div class="uploadrow2" data-max=1 title="更改图片" rel="'+id+'">'
		+'<input type="file" class="uploadImage" id="uploadImage_'+i+'" rel="'+id+'"/>'
		+'<input type="hidden" name="image['+id+']" id="cover_id_'+id+'"/>'
		+'<div class="upload-img-box"></div>'
		+'</div></td><td>'
		+'<input type="text" value="" name="name['+id+']" class="text input-large" style="width:250px">'
		+'</td><td>'
		+'<input type="text" value="'+i+'" name="order['+id+']" class="optionSort text input-large" style="width:80px">&nbsp;'
		+'</td><td>'
		+'<a href="###" onClick="delOpt(this)" class="fr btn btn-yellow" >删除</a></td></tr>';
	$('#option_list').append(html);
	initPuls(); 
    changeOption();
	$('.add_list_head').show();
}
function delOpt(obj){
	$(obj).parents('tr').remove();
}
function changeOption(){
	var val = $('input[name="is_img"]:checked').val();
	if(val!=1){
	   $('.uploadify').each(function() {
          if($(this).attr('id')!='upload_picture_picurl') $(this).hide();
       });
	   $('.upload-img-box').each(function() {
          if($(this).attr('rel')!='img') $(this).hide();
       });
	   $('.pic_td').hide();
	}else{
	   $('.uploadify').each(function() {
          $(this).show();
       });	
	   $('.upload-img-box').each(function() {
          $(this).show();
       });	   
	   $('.pic_td').show();	
	}
}
$(function(){ 
   initPuls(); 
   changeOption(); 
   initUploadImg();
});
$('#submit').click(function(){
    $('#form').submit();
});

$(function(){
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });	
    showTab();
	
	$('.toggle-data').each(function(){
		var data = $(this).attr('toggle-data');
		if(data=='') return true;		
		
	     if($(this).is(":selected") || $(this).is(":checked")){
			 change_event(this)
		 }
	});
	
	$('.toggle-data').bind("click",function(){ change_event(this) });
});
</script> 
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div style='display:none'><?php echo ($tongji_code); ?></div>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>