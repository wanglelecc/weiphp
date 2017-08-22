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
    
  <style text='text/css'>
.image_material{
    border: 1px dashed #ddd;
    width: 308px;
    height: 196px;
     background: #eee;
    text-align: center;
    color: #333;
    display: block;
    float: left;
    margin-left:50px;
   position:relative;
}
.image_material .select_image{line-height: 196px; display:block; height:200px;}
.image_material .delete{ position:absolute; bottom:3px; left:3px; display:none}
.voice_wrap{ width:308px;float:left}
.video_wrap{ width:222px;}
#video_area{ height:250px}
.appmsg_area .select_video{  height: 240px;line-height: 240px; cursor:pointer}
#voice_area .delete{
    display: none;
}
</style>
  <!-- 标签页导航 -->
  <div class="span9 page_message">
    <section id="contents">
      <?php if(!empty($nav)): ?><ul class="tab-nav nav">
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
        <?php $post_url || $post_url = U('edit?model='.$model['id'], $get_param); ?>
        <form id="form" action="<?php echo ($post_url); ?>" method="post" class="form-horizontal form-center">

              <?php if(is_array($fields)): $i = 0; $__LIST__ = $fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; if($field['is_show'] == 4): if($field['name'] == 'voice_id' && $_GET['type']== 'voice'): ?><div class="form-item cf show show4 appmsg_area" id="voice_area" style="margin:20px 0;">
							 <input type="hidden" name="voice_id" value="<?php echo ($data["voice_id"]); ?>"/>
						     <a class="select_appmsg" href="javascript:;" onClick="$.WeiPHP.openSelectAppMsg('<?php echo U('Home/Material/voice_data');?>',selectVoiceCallback,'选择语音素材')">选择语音素材</a>
						     <div class="voice_wrap"></div>
						     <a class="delete" href="javascript:;" >删除</a>
						</div>
					<?php elseif($field['name'] == 'video_id' && $_GET['type']== 'video'): ?>
						<div class="form-item cf show show5 appmsg_area" id="video_area" style="margin:20px 0;">
							 <input type="hidden" name="video_id" value="<?php echo ($data["video_id"]); ?>"/>
						     <a class="select_appmsg select_video" href="javascript:;" onClick="$.WeiPHP.openSelectAppMsg('<?php echo U('Home/Material/video_data');?>',selectVideoCallback,'选择视频素材')">选择视频素材</a>
						     <div class="video_wrap" style="float: left;"></div>
						     <a class="delete" href="javascript:;" style="left: 310px;">删除</a>
						</div>					
					<?php else: ?>
					<input type="hidden" class="text" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"><?php endif; endif; ?>
                <?php if($field['is_show'] == 1 || $field['is_show'] == 3 || ($field['is_show'] == 5 && I($field['name']) )): ?><div class="form-item cf toggle-<?php echo ($field["name"]); ?>">
                    <label class="item-label">
                    <?php if(!empty($field["is_must"])): ?><span class="need_flag">*</span><?php endif; ?>
                    <?php echo ($field['title']); ?>
                    <?php if($field['name'] == 'content'): ?><a href='javascript:;' id='getText'  onClick="selectText();" style="display: inline;border: 1px solid #DFE2EC;padding: 8px;margin-left: 20px;border-radius: 5px;background-color: #EEEFF1;color: #A6A8AD;">选择文本素材</a>
                   	 <?php elseif($field['name'] == 'image_id'): endif; ?>
                    <span class="check-tips">
                      <?php if(!empty($field['remark'])): ?>（<?php echo ($field['remark']); ?>）<?php endif; ?>
                      </span></label>
                    <div class="controls">
                      <?php switch($field["type"]): case "num": echo ($field["name"]); ?>
                          <input type="number" class="text" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"><?php break;?>
                        <?php case "string": ?><input type="text" class="text input-large" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"><?php break;?>
                        <?php case "textarea": ?><label class="textarea input-large">
                            <textarea name="<?php echo ($field["name"]); ?>"><?php echo ($data[$field['name']]); ?></textarea>
                          </label><?php break;?>
                        <?php case "datetime": ?><input type="datetime" name="<?php echo ($field["name"]); ?>" class="text time" value="<?php echo (time_format($data[$field['name']])); ?>" placeholder="请选择时间" /><?php break;?>
                        <?php case "date": ?><input type="datetime" name="<?php echo ($field["name"]); ?>" class="text date" value="<?php echo (time_format($data[$field['name']],'Y-m-d')); ?>" placeholder="请选择时间" /><?php break;?>
                        <?php case "bool": $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="check-item">
							<!--[if !IE]><!-->
								  <input type="radio" class="regular-radio toggle-data" value="<?php echo ($key); ?>" id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
								  <?php if(($data[$field['name']]) == $key): ?>checked="checked"<?php endif; ?> />
								  <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label><?php echo (clean_hide_attr($vo)); ?>
							  <!--<![endif]-->
							   <!--[if IE]>
							       <input type="radio" value="<?php echo ($key); ?>"
								   id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>" class="toggle-data" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
								  <?php if(($data[$field['name']]) == $key): ?>checked="checked"<?php endif; ?>/>
								  <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label><?php echo (clean_hide_attr($vo)); ?>
							   <![endif]-->
                             </div><?php endforeach; endif; else: echo "" ;endif; break;?>
                        <?php case "select": ?><select name="<?php echo ($field["name"]); ?>">
                            <?php $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" class="toggle-data" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
                              <?php if(($data[$field['name']]) == $key): ?>selected<?php endif; ?>
                              ><?php echo (clean_hide_attr($vo)); ?>
                              </option><?php endforeach; endif; else: echo "" ;endif; ?>
                          </select><?php break;?>
                        <?php case "cascade": ?><div id="cascade_<?php echo ($field["name"]); ?>"></div>
                        <?php echo hook('cascade', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break;?>
                        <?php case "dynamic_select": ?><div id="dynamic_select_<?php echo ($field["name"]); ?>"></div>
                        <?php echo hook('dynamic_select', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break;?>
                        <?php case "dynamic_checkbox": ?><div id="dynamic_checkbox_<?php echo ($field["name"]); ?>"></div>
                        <?php echo hook('dynamic_checkbox', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break;?>                           
                        <?php case "dynamic_checkbox": ?><div id="dynamic_checkbox_<?php echo ($field["name"]); ?>"></div>
                        <?php echo hook('dynamic_checkbox', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break;?>                           
                        <?php case "dynamic_checkbox": ?><div id="dynamic_checkbox_<?php echo ($field["name"]); ?>"></div>
                        <?php echo hook('dynamic_checkbox', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break;?>                        
                        <?php case "news": ?><div id="news_<?php echo ($field["name"]); ?>"></div>
                        <?php echo hook('news', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break;?>
                        <?php case "image": ?><div id="image_<?php echo ($field["name"]); ?>"></div>
                        <?php echo hook('image', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra']));?>

                        <case value="radio">
                          <?php $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="check-item">
							<!--[if !IE]><!-->
								  <input type="radio" class="regular-radio toggle-data" value="<?php echo ($key); ?>" id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
								  <?php if(($data[$field['name']]) == $key): ?>checked="checked"<?php endif; ?> />
								  <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label><?php echo (clean_hide_attr($vo)); ?>
							  <!--<![endif]-->
							   <!--[if IE]>
							       <input type="radio" value="<?php echo ($key); ?>"
								   id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>" class="toggle-data" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
								  <?php if(($data[$field['name']]) == $key): ?>checked="checked"<?php endif; ?>/>
								  <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label><?php echo (clean_hide_attr($vo)); ?>
							   <![endif]-->
                             </div><?php endforeach; endif; else: echo "" ;endif; break;?>
                        <?php case "checkbox": $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="check-item">
                              <input type="checkbox" class="regular-checkbox toggle-data" value="<?php echo ($key); ?>" id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>[]" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
                              <?php if(in_array(($key), is_array($data[$field['name']])?$data[$field['name']]:explode(',',$data[$field['name']]))): ?>checked="checked"<?php endif; ?> >
                              <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label><?php echo (clean_hide_attr($vo)); ?>
                             </div><?php endforeach; endif; else: echo "" ;endif; break;?>
                        <?php case "editor": ?><label class="textarea">
                            <textarea name="<?php echo ($field["name"]); ?>" style="width:405px; height:100px;"><?php echo ($data[$field['name']]); ?></textarea>
                            <?php echo hook('adminArticleEdit', array('name'=>$field['name'],'value'=>$data[$field['name']]));?> </label><?php break;?>
                        <?php case "picture": ?><div class="controls uploadrow2" data-max="1" title="点击修改图片" rel="<?php echo ($field["name"]); ?>" style="float: left;">
                            <input type="file" id="upload_picture_<?php echo ($field["name"]); ?>">
                            <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                            <div class="upload-img-box">
                              <?php if(!empty($data[$field['name']])): ?><div class="upload-pre-item2"><img width="100" height="100" src="<?php echo (get_cover_url($data[$field['name']])); ?>"/></div>
                                <em class="edit_img_icon">&nbsp;</em><?php endif; ?>

                            </div>

                          </div>

                            <div class='image_material' id='image_material'>
                              <input type="hidden" name="image_material" id="cover_id_image" value="<?php echo ($data["image_material"]); ?>"/>
                              <a class="select_image" href="javascript:;"  onClick="$.WeiPHP.openSelectAppMsg('<?php echo U('Home/Material/picture_data');?>',selectImageCallback,'选择图片素材')">从素材库选择图片</a>
                              <div class="image_wrap"></div>
                              <a class="delete" href="javascript:;" style="left: 15px;">删除</a>
                              </div><?php break;?>
                        <?php case "mult_picture": ?><div class="mult_imgs">
                                <div class="upload-img-view" id='mutl_picture_<?php echo ($field["name"]); ?>'>
                                  <?php if(!empty($data[$field['name']])): $data[$field['name']] = explode(',', $data[$field['name']]); ?>
                                  	<?php if(is_array($data[$field['name']])): $i = 0; $__LIST__ = $data[$field['name']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="upload-pre-item22">
                                    <img width="100" height="100" src="<?php echo (get_cover_url($vo)); ?>"/>
                                    <input type="hidden" name="<?php echo ($field["name"]); ?>[]" value="<?php echo ($vo); ?>"/>
                                    <em>&nbsp;</em>
                                    </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </div>
                                <div class="controls uploadrow2" data-max="9" title="点击上传图片" rel="<?php echo ($field["name"]); ?>">
                                  <input type="file" id="upload_picture_<?php echo ($field["name"]); ?>">
                                </div>
                            </div><?php break;?>
                        <?php case "file": ?><div class="controls upload_file" rel="<?php echo ($field["name"]); ?>">
                            <div id="upload_file_<?php echo ($field["name"]); ?>" class="uploadrow_file"></div>
                            <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                            <div class="upload-img-box">
                              <?php if(isset($data[$field['name']])): ?><div class="upload-pre-file"><span class="upload_icon_all"></span><?php echo (get_table_field($data[$field['name']],'id','name','File')); ?></div><?php endif; ?>
                            </div>
                          </div><?php break;?>
                        <?php case "user": ?><div class="controls">
                            <div id="userList" class="common_add_list fl">
                                <?php if(!empty($data[$field['name']])): ?><div class="item" onClick="$.WeiPHP.selectSingleUser('<?php echo addons_url('UserCenter://UserCenter/lists');?>','<?php echo ($field["name"]); ?>');">
                                        <?php $userInfo = getUserInfo($data[$field['name']]); ?>
                                        <img src="<?php echo ($userInfo['headimgurl']); ?>"/><br/><span><?php echo ($userInfo['nickname']); ?></span>
                                        <input type="hidden" name="<?php echo ($field["name"]); ?>'" value="<?php echo ($data[$field['name']]); ?>"/>
                                        <span class="name"><?php echo ($userInfo['nickname']); ?></span>
                                    </div>
                                <?php else: ?>
                                <a href="javascript:;" class="common_add_btn fl" onClick="$.WeiPHP.selectSingleUser('<?php echo addons_url('UserCenter://UserCenter/lists');?>','<?php echo ($field["name"]); ?>');"></a><?php endif; ?>
                           </div>
                        </div><?php break;?>
                      <?php case "users": ?><div class="controls">
                            <div id="userList" class="common_add_list fl">
                                <?php if(!empty($data[$field['name']])): $userIds = explode(',',$data[$field['name']]); ?>
                                	<?php if(is_array($userIds)): $i = 0; $__LIST__ = $userIds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uid): $mod = ($i % 2 );++$i; $userInfo = getUserInfo($uid); ?>
                                    <div class="item" onClick="$.WeiPHP.selectSingleUser('<?php echo addons_url('UserCenter://UserCenter/lists');?>','<?php echo ($field["name"]); ?>');">
                                        <?php $userInfo = getUserInfo($data[$field['name']]); ?>
                                        <img src="<?php echo ($userInfo['headimgurl']); ?>"/><br/><span><?php echo ($userInfo['nickname']); ?></span>
                                        <input type="hidden" name="<?php echo ($field["name"]); ?>'[]" value="<?php echo ($data[$field['name']]); ?>"/>
                                        <span class="name"><?php echo ($userInfo['nickname']); ?></span>
                                    </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                               <a href="javascript:;" class="common_add_btn fl" onClick="$.WeiPHP.selectMutiUser('<?php echo addons_url('UserCenter://UserCenter/lists');?>',9,'<?php echo ($field["name"]); ?>');"></a>
                           </div>
                        </div><?php break;?>
                      <?php case "admin": ?><div class="controls">
                            <div id="userList" class="common_add_list fl">
                                <?php if(!empty($data[$field['name']])): ?><div class="item" onClick="$.WeiPHP.selectSingleUser('<?php echo addons_url('UserCenter://UserCenter/admin_lists');?>','<?php echo ($field["name"]); ?>');">
                                        <?php $userInfo = getUserInfo($data[$field['name']]); ?>
                                        <img src="<?php echo ($userInfo['headimgurl']); ?>"/><br/><span><?php echo ($userInfo['nickname']); ?></span>
                                        <input type="hidden" name="<?php echo ($field["name"]); ?>'" value="<?php echo ($data[$field['name']]); ?>"/>
                                        <span class="name"><?php echo ($userInfo['nickname']); ?></span>
                                    </div>
                                <?php else: ?>
                                <a href="javascript:;" class="common_add_btn fl" onClick="$.WeiPHP.selectSingleUser('<?php echo addons_url('UserCenter://UserCenter/admin_lists');?>','<?php echo ($field["name"]); ?>');"></a><?php endif; ?>
                           </div>
                        </div><?php break;?>
                        <?php default: ?>
                        <input type="text" class="text input-large" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"><?php endswitch;?>
                    </div>
                  </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <div class="form-item form_bh" style="text-align:center">
            <?php if(!empty($data["id"])): ?><input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"><?php endif; ?>
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal"><?php echo ((isset($submit_name) && ($submit_name !== ""))?($submit_name):'确 定'); ?></button>
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
  <script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script>
  <script type="text/javascript">
  $(function(){
	 var str_image='<div class="appmsg_item"><div class="main_img"><img src="<?php echo ($data["cover_url"]); ?>" width="200px" height="200px"/></div></div><div class="hover_area"></div>';
	 var material_image="<?php echo ($data["image_material"]); ?>";
	 if(material_image != 0){
		 $('.image_wrap').html(str_image).show();
		 $('.select_image').hide();
		 $('.image_material .delete').show();
	 }
	initUploadImg({width:100,height:100,callback:function(){
    $('.image_wrap').html('').hide();
    $('.select_image').show();
    $('.image_material .delete').hide();
    $('input[name="image_material"]').val(0);
  }});
	initUploadFile();

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

  $('.image_material .delete').click(function(){
    $('.image_wrap').html('').hide();
    $('.select_image').show();
    $('.image_material .delete').hide();
    $('input[name="image_material"]').val(0);
  })
	$('#voice_area .delete').click(function(){
		$('.voice_wrap').html('').hide();
		$('#voice_area .select_appmsg').show();
		$('#voice_area .delete').hide();
		$('input[name="voice_id"]').val(0);
	})
	$('#video_area .delete').click(function(){
		$('.video_wrap').html('').hide();
		$('#video_area .select_appmsg').show();
		$('#video_area .delete').hide();
		$('input[name="video_id"]').val(0);
	})
	$type = "<?php echo ($_GET['type']); ?>";
	if($type == 'voice'){
		var voice_html='';
		var voiceid=$("input[name='voice_id']").val();
		if(voiceid){
			$.post("<?php echo U('Home/Material/ajax_voice_by_id');?>",{'voice_id':voiceid},function(vo){
				if(vo){
					voice_html+='<div class="picture_item"><div class="sound_item" onclick="playSound(\'sound_'+voiceid+'\',this);"><img class="icon_sound" src="/Public/Home/images/icon_sound.png"><p class="audio_name">'+vo['title']+'<span class="fr colorless">'+vo['playtime']+'</span></p><audio id="sound_'+voiceid+'" src="'+vo['file_path']+'"></audio></div><div class="hover_area"></div></div>';
					$('.voice_wrap').html(voice_html).show();
					$('#voice_area .select_appmsg').hide();
					$('#voice_area .delete').show();
				}
			});
		}
	}else if($type == 'video'){
		var video_html='';
		var videoid=$("input[name='video_id']").val();
		if(videoid){
			$.post("<?php echo U('Home/Material/ajax_video_by_id');?>",{'video_id':videoid},function(vo){
				if(vo){
					video_html+='<div class="picture_item"><div class="video_item"><p class="title">'+vo['title']+'</p> <p class="ctime colorless">'+vo['cTime']+'</p><div class="video_area"><video src="'+vo['file_url']+'" controls="controls">您的浏览器不支持 video 标签。</video></div><p></p></div></div>';
					$('.video_wrap').html(video_html).show();
					$('#video_area .select_appmsg').hide();
					$('#video_area .delete').show();
				}
			});
		}
	}

});
  function selectImageCallback(_this){
    $('.image_wrap').html($(_this).html()).show();
    $('.select_image').hide();
    $('.image_material .delete').show();
    $('input[name="image_material"]').val($(_this).data('id'));
    $("input[name='image_id']").val(0);
    $('.upload-pre-item2').hide();
    $.Dialog.close();
  }
  function selectText(){
		$.WeiPHP.openSelectLists("<?php echo U('Home/Material/text_lists');?>",1,'选择素材',function(data){
			if(data && data.length>0){
				for(var i=0;i<data.length;i++){
					var id=data[i]['id'];
					if(id){
						$.post("<?php echo U('Home/Material/get_content_by_id');?>",{'id':id},function(d){
							$("textarea[name='content']").text(d);
						})
					}
				}
			}
		})
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
	function playSound(id,obj){
		var audio = document.getElementById(id);
		if(audio.paused){
			audio.play();
			$(obj).find('img').attr('src',IMG_PATH+'/icon_sound_play.gif');
			audio.addEventListener('ended', function () {  
//	 			alert('over');
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