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
  <section id="contents"> <?php if(!empty($nav)): ?><ul class="tab-nav nav">
  <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul><?php endif; ?>
<?php if(!empty($sub_nav)): ?><div class="sub-tab-nav">
       <ul class="sub_tab">
       <?php if(is_array($sub_nav)): $i = 0; $__LIST__ = $sub_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="<?php echo ($vo["class"]); ?>" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
</div><?php endif; ?>
<?php if(!empty($normal_tips)): ?><p class="normal_tips"><b class="fa fa-info-circle"></b> <?php echo ($normal_tips); ?></p><?php endif; ?>
    <div class="tab-content"> 
      <!-- 表单 -->
      <form id="form" action="<?php echo U('add');?>" method="post" class="form-horizontal form-center">
        <div class="form-item cf toggle-pid">
          <label class="item-label"> 一级菜单 <span class="check-tips"> （如果是一级菜单，选择“无”即可） </span></label>
          <div class="controls">
            <select name="pid">
              <option value="0">无 </option>
              <?php if(!empty($pList)): if(is_array($pList)): $i = 0; $__LIST__ = $pList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </select>
          </div>
        </div>
        <div class="form-item cf toggle-title">
          <label class="item-label"><span class="need_flag">*</span> 菜单名 <span class="check-tips">菜单名称长度限制为4个汉字或8个字母</span></label>
          <div class="controls">
            <input class="text input-large" name="title" value="<?php echo initValue('title', $data);?>" type="text">
          </div>
        </div>
        <div class="form-item cf toggle-from">
          <label class="item-label"> 菜单内容 </label>
          <div class="controls">

            <div class="check-item">
              <input class="regular-radio choose_from" value="1" id="from_1" name="from"  checked="" type="radio">
              <label for="from_1"></label>
              发送素材内容 </div>              
            <div class="check-item">
              <input class="regular-radio choose_from" value="2" id="from_2" name="from"  type="radio">
              <label for="from_2"></label>
              跳转到网页 </div>
            <div class="check-item">
              <input class="regular-radio choose_from" value="4" id="from_4" name="from"  type="radio">
              <label for="from_4"></label>
              跳转到小程序 </div>              
            <div class="check-item">
              <input class="regular-radio choose_from" value="3" id="from_3" name="from"  type="radio">
              <label for="from_3"></label>
              自定义事件 </div>
            <div class="check-item" id="top_show">
              <input class="regular-radio choose_from" value="0" id="from_0" name="from"  type="radio">
              <label for="from_0"></label>
              无事件的一级菜单 </div>              
          </div>
        </div>
        
        <!--发送内容-->
        <div id="content_1" style="display: none;">
          <div class="form-item cf">
            <label class="item-label"><span class="need_flag">*</span> 选择素材 </label>
            <div class="controls"> 
            <div id="material_material"></div>
            <?php echo hook('material', ['name'=>'material','value'=>initValue('material',$data),'extra'=>'']);?> 
            </div>
          </div>
        </div>
        <!--跳转URL-->
        <div id="content_2" style="display: none;">
          <div class="form-item cf">
            <label class="item-label"><span class="need_flag">*</span> 关联URL </label>
            <div class="controls">
              <input class="text input-large" name="url" value="<?php echo initValue('url', $data);?>" type="text">
            </div>
            <p class="normal_tips" style="margin:0">为了方便移植,可以用以下特殊字符代替常用地址参数：<br>
              [website]: ' . SITE_URL . '<br>
              [publicid]: ' . get_token_appinfo('', 'id') . '<br>
              [token]: ' . get_token() . '<br>
              用法例如：微网站：[website]/?s=/WeiSite/WeiSite/index/publicid/[publicid]</p>
          </div>
        </div>
        
        <!--自定义-->
        <div id="content_3" style="display: none;">
          <div class="form-item cf toggle-type">
            <label class="item-label"><span class="need_flag">*</span> 事件类型 </label>
            <div class="controls">
              <div class="check-item">
                <input class="regular-radio" value="click" name="type" id="type_click" type="radio">
                <label for="type_click"></label>
                点击推事件 </div>
              <div class="check-item">
                <input class="regular-radio" value="scancode_push" name="type" id="type_scancode_push" type="radio">
                <label for="type_scancode_push"></label>
                扫码推事件 </div>
              <div class="check-item">
                <input class="regular-radio" value="scancode_waitmsg" name="type" id="type_scancode_waitmsg" type="radio">
                <label for="type_scancode_waitmsg"></label>
                扫码带提示 </div>
              <div class="check-item">
                <input class="regular-radio" value="pic_sysphoto" name="type" id="type_pic_sysphoto" type="radio">
                <label for="type_pic_sysphoto"></label>
                弹出系统拍照发图 </div>
              <div class="check-item">
                <input class="regular-radio" value="pic_photo_or_album" name="type" id="type_pic_photo_or_album" type="radio">
                <label for="type_pic_photo_or_album"></label>
                弹出拍照或者相册发图 </div>
              <div class="check-item">
                <input class="regular-radio" value="pic_weixin" name="type" id="type_pic_weixin" type="radio">
                <label for="type_pic_weixin"></label>
                弹出微信相册发图器 </div>
              <div class="check-item">
                <input class="regular-radio" value="location_select" name="type" id="type_location_select" type="radio">
                <label for="type_location_select"></label>
                弹出地理位置选择器 </div>
            </div>
          </div>
          <div class="form-item cf">
            <label class="item-label"><span class="need_flag">*</span> 关联关键词 <span class="check-tips">(菜单KEY值，用于消息接口推送，不超过128字节)</span></label>
            <div class="controls">
              <input class="text input-large" name="keyword" value="<?php echo initValue('keyword', $data);?>" type="text">
            </div>
          </div>
        </div>
        <!--小程序-->
        <div id="content_4" style="display: none;">
          <div class="form-item cf">
            <label class="item-label"><span class="need_flag">*</span> 小程序的appid </label>
            <div class="controls">
              <a class="border-btn chooes_xcx" href="javascript:;">选择小程序</a>
              <!--<input class="text input-large" name="appid" value="<?php echo initValue('appid', $data);?>" type="text">-->
            </div>
          </div>
          <div class="form-item cf">
            <label class="item-label"><span class="need_flag">*</span> 小程序的页面路径 </label>
            <div class="controls">
              <input class="text input-large" name="pagepath" value="<?php echo initValue('pagepath', $data);?>" type="text">
            </div>
          </div> 
          <div class="form-item cf">
            <label class="item-label"><span class="need_flag">*</span> 备用URL <span class="check-tips">不支持小程序的老版本客户端将打开本url</span></label>
            <div class="controls">
              <input class="text input-large" name="appurl" value="<?php echo initValue('appurl', $data);?>" type="text">
            </div>
            <p class="normal_tips" style="margin:0">为了方便移植,可以用以下特殊字符代替常用地址参数：<br>
              [website]: ' . SITE_URL . '<br>
              [publicid]: ' . get_token_appinfo('', 'id') . '<br>
              [token]: ' . get_token() . '<br>
              用法例如：微网站：[website]/?s=/WeiSite/WeiSite/index/publicid/[publicid]</p>
          </div>                   
        </div>        
        
        <input class="text" name="rule_id" value="<?php echo I('rule_id',0);?>" type="hidden">
        <input class="text" name="id" value="<?php echo I('id',0);?>" type="hidden">
        <div class="form-item form_bh">
          <button class="btn submit-btn ajax-post" type="submit" target-form="form-horizontal"><?php echo ((isset($submit_name) && ($submit_name !== ""))?($submit_name):'确 定'); ?></button>
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
 
<script type="text/javascript">
$(function(){
	<?php if(isset($data['pid'])) { ?>
	$("select[name='pid']").val(<?php echo ($data["pid"]); ?>)
	<?php } ?>
	
	<?php if(isset($data['from'])) { ?>
	$("input[name='from'][value='<?php echo ($data["from"]); ?>']").prop("checked",true)
	console.log('<?php echo ($data["from"]); ?>')
	console.log('input[name=')
	<?php } ?>
	<?php if(isset($data['type'])) { ?>
	$("input[name='type'][value='<?php echo ($data["type"]); ?>']").prop("checked",true)
	<?php } ?>
			
	$('.choose_from').click(function(){
		choose_from();
	});
	choose_from();
	
	$('select[name="pid"]').change(function(){
		choose_top();
	});
	choose_top();

  $('.chooes_xcx').click(function(){
    // openSelectLists(dataUrl,count,title,callback)
    $.WeiPHP.openSelectLists('http://localhost/weishop/index.php?s=/w9/Home/Apps/lists/from/3.html',1,'选择小程序',function(data){

    })
  })
});

function choose_from(){ 
	var from = $("input[name='from']:checked").val();
	console.log('from:'+from)
	$('#content_1').hide();
	$('#content_2').hide();
	$('#content_3').hide();
	$('#content_4').hide();
	$('#content_'+from).show();
}
function choose_top(){ 
	var pid = $('select[name="pid"]').val();

	if(pid==0){
		$("#top_show").show()
	}else{
		$("#top_show").hide()
	}
}
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