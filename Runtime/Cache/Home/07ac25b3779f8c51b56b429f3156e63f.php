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
      <!--<div class="table-bar">
        <div class="search-form fr cf">
          <div class="sleft">
            <?php $get_param[model]=$model['name']; $search_url || $search_url = addons_url(MODULE_NAME.'://'.CONTROLLER_NAME.'/lists', $get_param); ?>
            <?php empty($search_key) && $search_key=$model['search_key'];empty($search_key) && $search_key='title'; ?>
            <input type="text" name="<?php echo ($search_key); ?>" class="search-input" value="<?php echo I($search_key);?>" placeholder="<?php echo ($placeholder); ?>">
            <a class="sch-btn" href="javascript:;" id="search" url="<?php echo ($search_url); ?>"><i class="btn-search"></i></a> </div>
        </div>
      </div>-->
      <!-- 数据列表 -->
      <div class="data-table">
      
        <div class="table-striped">
        
          <table cellspacing="0" class="message_list">
            <thead>
            	<tr>
                	<th  width="50%">最近回复</th>
                    <th  width="25%">回复时间</th>
                    <th  width="25%">查看消息</th>
                </tr>
            </thead>
            <!-- 列表 -->
            <tbody>
            <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td width="50%" class="user">
                	<?php if(!empty($vo[user][headimgurl])): ?><img width="50" src="<?php echo ($vo["user"]["headimgurl"]); ?>"/>
                    <?php else: ?>
                    	<img width="50" src="/Public/Home/images/default.png"/><?php endif; ?>
                	<div class="u_info">
                    	<?php if(!empty($vo[user][headimgurl])): ?><p class="name"><?php echo ($vo["user"]["nickname"]); ?></p>
                        <?php else: ?>
                            <p class="name"><?php echo ($vo["openid"]); ?></p><?php endif; ?>
                    	
                        <p class="msg">
                        	<?php if($vo['Content']['msg_type'] == 'image'): ?><a target="_blank" href="<?php echo ($vo["Content"]["url"]); ?>"><img width="100" height="100" src="<?php echo ($vo["Content"]["url"]); ?>"></a>
                        	<?php elseif($vo['Content']['msg_type'] == 'voice'): ?>
	                        	<div class="sound_item" onClick="playSound('sound_<?php echo ($vo["Content"]["id"]); ?>',this);">
	                            <img class="icon_sound" src="/Public/Home/images/icon_sound.png"/>
	                            <p class="audio_name"><?php echo ($vo["Content"]["title"]); ?><span class="fr colorless"></span></p>
	                            <p class="ctime colorless"></p>
	                            <audio id="sound_<?php echo ($vo["Content"]["id"]); ?>" src="<?php echo (get_file_url($vo["Content"]["file_id"])); ?>"></audio>
	                        	</div>
                        	<?php elseif($vo['Content']['msg_type'] == 'video'): ?>
                        		<div class="video_item">
	                        	<p class="title"><?php echo ($vo["Content"]["title"]); ?></p>
	                            <p class="ctime colorless"></p>
	                            <div class="video_area">
	                            	<video src="<?php echo (get_file_url($vo["Content"]["file_id"])); ?>" controls="controls">您的浏览器不支持 video 标签。</video>
	                            </div>
	                             <p><?php echo ($vo["Content"]["introduction"]); ?></p>
	                        	</div>
                        	<?php elseif($vo['Content']['msg_type'] == 'news'): ?>
                        		<div>
	                        	<div class="appmsg_item" style="width: 270px;">
		                        <p class="title"></p>
		                        <div class="main_img">
		                            <img src="<?php echo ($vo["Content"]["first"]["picurl"]); ?>" width='50'/>
		                            <h6><a target="_blank" href="<?php echo ($vo["Content"]["first"]["url"]); ?>"><?php echo ($vo["Content"]["first"]["title"]); ?></a></h6>
		                        </div>
		                        <p class="desc"><?php echo ($vo["Content"]["first"]["description"]); ?></p>
			                    </div>
			                    <?php if(!empty($vo["Content"]["child"])): if(is_array($vo["Content"]["child"])): $i = 0; $__LIST__ = $vo["Content"]["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class="appmsg_sub_item"  style="width: 270px;">
				                        <a target='_blank' href='<?php echo ($vv["url"]); ?>'><p class="title"><?php echo ($vv["title"]); ?></p></a>
				                        <div class="main_img">
				                            <img src="<?php echo ($vv["picurl"]); ?>"/>
				                        </div>
				                    </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
			                    </div>
			                <?php elseif($vo['Content']['msg_type'] == 'shortvideo'): ?>
			                <?php elseif($vo['Content']['msg_type'] == 'location'): ?>
			                <?php elseif($vo['Content']['msg_type'] == 'link'): ?>  
			                	<a  target='_blank' href="<?php echo ($vo["Content"]["url"]); ?>"><h3>"<?php echo ($vo["Content"]["title"]); ?>"</h3><br><?php echo ($vo["Content"]["description"]); ?></a>  
	                        <?php else: ?>
                        	<?php echo ($vo["Content"]["Content"]); endif; ?>
                        </p>
                    </div>
                </td>
                <td width="15%" valign="top"><?php echo (time_format($vo["CreateTime"])); ?></td>
                <td width="25%" valign="top">
                	<?php if(($vo["collect"]) == "0"): ?><a href="javascript:void(0)" onclick="set_status(<?php echo ($vo["id"]); ?>,'collect', 1)">收藏</a>
                      <?php else: ?>
                      <a href="javascript:void(0)" onclick="set_status(<?php echo ($vo["id"]); ?>,'collect', 0)">取消收藏</a><?php endif; ?>
                    <?php if(($vo["deal"]) == "0"): ?><a href="javascript:void(0)" onclick="set_status(<?php echo ($vo["id"]); ?>,'deal', 1)">设为待处理</a>
                      <?php else: ?>
                      <a href="javascript:void(0)" onclick="set_status(<?php echo ($vo["id"]); ?>,'deal', 0)">取消待处理状态</a><?php endif; ?>
                   
                  <?php if(C('SEND_CUSTOM_MSG') && (NOW_TIME-$vo[CreateTime])<172800) { ?><!--48小时以内可以回复用户-->
                <a href="<?php echo U('person',array('openid'=>$vo['FromUserName'],'mdm'=>I('mdm')));?>" >快速回复</a>
                <?php } ?>
                 </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>            
            </tbody>
          </table>
        </div>
      </div>
      <div class="page"> <?php echo ((isset($_page) && ($_page !== ""))?($_page):''); ?> </div>
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
	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
        var query  = $('.search-form').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
        if(query == '' ){
        	url="<?php echo addons_url(MODULE_NAME.'://'.CONTROLLER_NAME.'/lists');?>";
        }
		window.location.href = url;
	});

    //回车自动提交
    $('.search-form').find('input').keyup(function(event){
        if(event.keyCode===13){
            $("#search").click();
        }
    });

})
function set_status(id, field, val){
   $.post("<?php echo U('set_status');?>",{id:id,field:field,val:val},function(){
	   location.reload();
   })	
}
$(function(){
	//初始化上传图片插件
	initUploadImg({width:308,height:200,callback:function(){
		$('.image_wrap').html('').hide();
		$('.select_image').show();
		$('.image_material .delete').hide();
		$('input[name="image_material"]').val(0);
	}});
	$('.uploadify-button').css('background-color','#ccc')
})
$('.msg_tab .txt').click(function(){
	//纯文本
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('text');
	$('textarea[name="content"]').show().siblings().hide();
	$('#getText').show();
	
})
$('.msg_tab .appmsg').click(function(){
	//图文消息
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('appmsg');
	$('#appmsg_area').show().siblings().hide();
	$('#getText').hide();
	
	$('.appmsg_wrap').html('').hide();
	$('.select_appmsg').show();
	$('.appmsg_area .delete').hide();
	$('input[name="appmsg_id"]').val(0);
})
$('.msg_tab .image').click(function(){
	//图片消息
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('image');
	$('.msg_image').show().siblings().hide();
	$('#getText').hide();
	$('#image_material').show();
	
	$('.image_wrap').html('').hide();
	$('.select_image').show();
	$('.image_material .delete').hide();
	$('input[name="image_material"]').val(0);
})
$('.msg_tab .voice').click(function(){
	//图片消息
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('voice');
	$('#voice_area').show().siblings().hide();
	$('#voice_area .voice_wrap').html('').hide();
	$('#voice_area .select_appmsg').show();
	$('#voice_area .delete').hide();
	$('input[name="voice"]').val(0);
	$('#getText').hide();
	$('#image_material').hide();
})
$('.msg_tab .video').click(function(){
	//图片消息
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('video');
	$('#video_area').show().siblings().hide();
	$('#getText').hide();
	$('#image_material').hide();
	
	$('#video_area .video_wrap').html('').hide();
	$('#video_area .select_appmsg').show();
	$('#video_area .delete').hide();
	$('input[name="video"]').val(0);
})



$('.appmsg_area .delete').click(function(){
	$('.appmsg_wrap').html('').hide();
	$('.select_appmsg').show();
	$('.appmsg_area .delete').hide();
	$('input[name="appmsg_id"]').val(0);
})
$('.image_material .delete').click(function(){
	$('.image_wrap').html('').hide();
	$('.select_image').show();
	$('.image_material .delete').hide();
	$('input[name="image_material"]').val(0);
})
$('#voice_area .delete').click(function(){
	$('#voice_area .voice_wrap').html('').hide();
	$('#voice_area .select_appmsg').show();
	$('#voice_area .delete').hide();
	$('input[name="voice"]').val(0);
})
$('#video_area .delete').click(function(){
	$('#video_area .video_wrap').html('').hide();
	$('#video_area .select_appmsg').show();
	$('#video_area .delete').hide();
	$('input[name="video"]').val(0);
})
function selectAppMsgCallback(_this){
	$('.appmsg_wrap').html($(_this).html()).show();
	$('.select_appmsg').hide();
	$('.appmsg_area .delete').show();
	$('input[name="appmsg_id"]').val($(_this).data('group_id'));
	$.Dialog.close();
}

function selectImageCallback(_this){
	$('.image_wrap').html($(_this).html()).show();
	$('.select_image').hide();
	$('.image_material .delete').show();
	$('input[name="image_material"]').val($(_this).data('id'));
	$("input[name='image']").val(0);
	$('.upload-img-box').hide();
	$.Dialog.close();
}
function selectVoiceCallback(_this){
	$(_this).find('.icon_sound').attr('src',IMG_PATH+'/icon_sound.png');
	$('.voice_wrap').html($(_this).html()).show();
	$('#voice_area .select_appmsg').hide();
	$('#voice_area .delete').show();
	$('input[name="voice_id"]').val($(_this).data('id'));
	$.Dialog.close();
}
function selectVideoCallback(_this){
	$('.video_wrap').html($(_this).html()).show();
	$('#video_area .select_appmsg').hide();
	$('#video_area .delete').show();
	$('input[name="video_id"]').val($(_this).data('id'));
	$.Dialog.close();
}

function set_material(id,type,set_sucai){
	var url="<?php echo U('set_meterial');?>";
	$.post(url,{'id':id,'type':type,'set_sucai':set_sucai},function(data){
			location.reload();
	});
}
function selectText(){
	$.WeiPHP.openSelectLists("<?php echo U('Home/Material/text_lists');?>",1,'选择素材',function(data){
		if(data && data.length>0){
			for(var i=0;i<data.length;i++){
				var id=data[i]['id'];
				if(id){
					$.post("<?php echo U('Home/Material/get_content_by_id');?>",{'id':id},function(d){
						$('#message_text').text(d);
					})
				}
			}
		}
	})
}
function playSound(id,obj){
	var audio = document.getElementById(id);
	if(audio.paused){
		audio.play();
		$(obj).find('img').attr('src',IMG_PATH+'/icon_sound_play.gif');
		audio.addEventListener('ended', function () {  
// 			alert('over');
			$(obj).find('img').attr('src',IMG_PATH+'/icon_sound.png');
		}, false);
		return;
	}
	audio.pause();
	$(obj).find('img').attr('src',IMG_PATH+'/icon_sound.png');
	
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