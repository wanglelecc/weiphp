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
      <?php if(!empty($nav)): ?><ul class="tab-nav nav">
  <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul><?php endif; ?>
<?php if(!empty($sub_nav)): ?><div class="sub-tab-nav">
       <ul class="sub_tab">
       <?php if(is_array($sub_nav)): $i = 0; $__LIST__ = $sub_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="<?php echo ($vo["class"]); ?>" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
</div><?php endif; ?>
<?php if(!empty($normal_tips)): ?><p class="normal_tips"><b class="fa fa-info-circle"></b> <?php echo ($normal_tips); ?></p><?php endif; ?>
      <p class="normal_tips"><b class="fa fa-info-circle"></b>会员卡链接:<a target="_blank" href="<?php echo U( 'preview' );?>">预览</a>,<a id="copyLink" data-clipboard-text="<?php echo addons_url('Card://Wap/index',array('wpid' =>$public_info['id']));?>">复制链接</a><script type="application/javascript">$.WeiPHP.initCopyBtn("copyLink");</script>
      </p>
      <div class="tab-content has-weixinpreivew"> 
      	
        <form action="<?php echo U('config');?>" class="form-horizontal" method="post">
            <?php if(empty($custom_config)): ?><div class="field_group">
                		<h3>会员卡正面</h3>
                        <div class="field_group_inner" style="overflow:hidden">
                        <div class="card_preview fl" style="margin:15px 40px;">
                        	<div id="cardLogo" style="display:none"><img src="/Public/Home/images/default.png"></div>
                            <div id="cardBg"><img id="cardBgImg" src="<?php echo ADDON_PUBLIC_PATH;?>/card_bg_1.png" width="100%" height="100%"></div>
                            <span class="card_num number_color" id="cardNumber">NO. 80001</span>
                            <span class="card_name title_color"></span>
                       </div>
                       <div class="fr" style="width:560px">
                <?php if(is_array($data['config'])): foreach($data['config'] as $o_key=>$form): if($o_key=='back_background'): ?></div>
                    	</div>
                        </div>
                    	<div class="field_group">
                		<h3>会员卡反面</h3>
                        <div class="field_group_inner" style="overflow:hidden">
                        <div class="card_preview fl" style="margin:15px 40px;">
                            <a id="cardBackBg" href="<?php echo ADDON_PUBLIC_PATH;?>/card_bg_1.png" target="_blank"><img id="cardBackBgImg" src="<?php echo ADDON_PUBLIC_PATH;?>/card_bg_1.png" width="100%" height="100%"></a>
                            <div class="card_intro back_color">
                            	<p class="title">使用说明</p>
                                <p class="intro"></p>
                            </div>
                       </div>
                       <div class="fr" style="width:560px"><?php endif; ?>
                    <div class="form-item cf">
                        <label class="item-label">
                            <?php echo ((isset($form["title"]) && ($form["title"] !== ""))?($form["title"]):''); ?>
                            <?php if(isset($form["tip"])): ?><span class="check-tips"><?php echo ($form["tip"]); ?></span><?php endif; ?>
                        </label>
                            <?php switch($form["type"]): case "text": ?><div class="controls">
                                    <input id="<?php echo ($o_key); ?>" type="text" name="config[<?php echo ($o_key); ?>]" class="text input-large" value="<?php echo ($form["value"]); ?>">
                                </div><?php break;?>
                                 <?php case "color": ?><div class="controls">
                                        <input id="<?php echo ($o_key); ?>" type="hidden" name="config[<?php echo ($o_key); ?>]" value="<?php echo ($form["value"]); ?>">
                                        <div data-color="<?php echo ($o_key); ?>" class="color_picker" style="background:<?php echo ($form["value"]); ?>"></div>
                                    </div><?php break;?>
                                <?php case "password": ?><div class="controls">
                                    <input type="password" name="config[<?php echo ($o_key); ?>]" class="text input-large" value="<?php echo ($form["value"]); ?>">
                                </div><?php break;?>
                                <?php case "hidden": ?><input type="hidden" name="config[<?php echo ($o_key); ?>]" id="hidden_<?php echo ($o_key); ?>" value="<?php echo ($form["value"]); ?>"><?php break;?>
                                <?php case "radio": ?><div class="controls">
                                    <?php if(is_array($form["options"])): foreach($form["options"] as $opt_k=>$opt): ?><label class="radio">
                                            <input type="radio" name="config[<?php echo ($o_key); ?>]" value="<?php echo ($opt_k); ?>" <?php if(($form["value"]) == $opt_k): ?>checked<?php endif; ?>><?php echo ($opt); ?>
                                        </label><?php endforeach; endif; ?>
                                </div><?php break;?>
                                <?php case "checkbox": ?><div class="controls">
                                    <?php if(is_array($form["options"])): foreach($form["options"] as $opt_k=>$opt): ?><label class="checkbox">
                                            <?php is_null($form["value"]) && $form["value"] = array(); ?>
                                            <input type="checkbox" name="config[<?php echo ($o_key); ?>][]" value="<?php echo ($opt_k); ?>" <?php if(in_array(($opt_k), is_array($form["value"])?$form["value"]:explode(',',$form["value"]))): ?>checked<?php endif; ?>><?php echo ($opt); ?>
                                        </label><?php endforeach; endif; ?>
                                </div><?php break;?>
                                <?php case "select": ?><div class="controls">
                                	<?php if($o_key == 'length'): ?><select name="config[<?php echo ($o_key); ?>]" id="select_<?php echo ($o_key); ?>">
                                        <?php if(is_array($form["options"])): $i = 0; $__LIST__ = $form["options"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$opt_k): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if(strlen($form['value'])==strlen($key)){echo 'selected';} ?>><?php echo ($opt_k); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                    
                                	<?php else: ?>
                                	<select name="config[<?php echo ($o_key); ?>]" id="select_<?php echo ($o_key); ?>">
                                        <?php if(is_array($form["options"])): foreach($form["options"] as $opt_k=>$opt): ?><option value="<?php echo ($opt_k); ?>" <?php if(($form["value"]) == $opt_k): ?>selected<?php endif; ?>><?php echo ($opt); ?></option><?php endforeach; endif; ?>
                                    </select><?php endif; ?>
                                </div>
                                <?php if($o_key=='background'): ?><!-- 自定义上传背景 -->
                                 <div id="customBackground">
                                     <P style="color:#888">自定义会员卡背景图片尺寸建议为：宽534像素高318像素</P>
                                    <div  class="controls uploadrow2"  data-max="1" title="点击修改图片" rel="bg">
                                          <input type="file" id="upload_picture_bg">
                                          <input type="hidden" name="config[bg]" id="cover_id_bg" value="<?php echo ($config['bg_id']); ?>" data-callback="bgCallback"/>
                                          <div class="upload-img-box">
                                            <?php if(!empty($config["bg_id"])): ?><div class="upload-pre-item2"><img width="100" height="100" src="<?php echo (get_cover_url($config['bg_id'])); ?>"/></div>
                                              <em class="edit_img_icon">&nbsp;</em><?php endif; ?>
                                            
                                          </div>
                                          
                                      </div> 
                                  </div><?php endif; ?>
                                 <?php if($o_key=='back_background'): ?><!-- 自定义上传背景 -->
                                 <div id="customBackBackground"
                                    <P style="color:#888">自定义会员卡背景图片尺寸建议为：宽534像素高318像素</P>
                                    <div class="controls uploadrow2"  data-max="1" title="点击修改图片" rel="backbg">
                                          <input type="file" id="upload_picture_backbg">
                                          <input type="hidden" name="config[backbg]" id="cover_id_backbg" value="<?php echo ($config['backbg_id']); ?>"  data-callback="bgbackCallback"/>
                                          <div class="upload-img-box">
                                            <?php if(!empty($config["backbg_id"])): ?><div class="upload-pre-item2"><img width="100" height="100" src="<?php echo (get_cover_url($config['backbg_id'])); ?>"/></div>
                                              <em class="edit_img_icon">&nbsp;</em><?php endif; ?>
                                            
                                          </div>
                                      </div> 
                                  </div><?php endif; break;?>
                               
                                <?php case "textarea": ?><div class="controls">
                                    <label class="textarea input-large">
                                        <textarea id="<?php echo ($o_key); ?>" name="config[<?php echo ($o_key); ?>]"><?php echo ($form["value"]); ?></textarea>
                                    </label>
                                </div><?php break;?>
                                <?php case "picture": ?><div class="controls uploadrow2" data-max="1" title="点击修改图片" rel="<?php echo ($o_key); ?>">
                                      <input type="file" id="upload_picture_<?php echo ($o_key); ?>">
                                      <input type="hidden" name="config[<?php echo ($o_key); ?>]" id="cover_id_<?php echo ($o_key); ?>" value="<?php echo ($form['value']); ?>" data-callback="logoCallback"/>
                                      <div class="upload-img-box">
                                        <?php if(!empty($form['value'])): ?><div class="upload-pre-item2"><img width="100" height="100" src="<?php echo (get_cover_url($form['value'])); ?>"/></div>
                                          <em class="edit_img_icon">&nbsp;</em><?php endif; ?>
                                        
                                      </div>
                                  </div><?php break; endswitch;?>
                        </div><?php endforeach; endif; ?>
                </div>
                </div>
                </div>
            <?php else: ?>
                <?php if(isset($custom_config)): echo ($custom_config); endif; endif; ?>
            <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" readonly>
            <button type="submit" class="btn submit-btn ajax-post" target-form="form-horizontal">确 定</button>
            
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

<link type="text/css" rel="stylesheet" href="/Public/static/colorpicker/colpick.css?v=<?php echo SITE_VERSION;?>"/>
<script type="text/javascript" src="/Public/static/colorpicker/colpick.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script> 
<script type="text/javascript" charset="utf-8">
	//导航高亮
    $('.side-sub-menu').find('a[href="<?php echo U('Addons/index');?>"]').closest('li').addClass('current');
    if($('ul.tab-nav').length){
    	$('.btn-return').hide();
    }
	$(function(){
		showTab();
		initUploadImg();
		$('#select_background').change(function(){
				if($(this).val()==11){
					$('#customBackground').show();
				}else{
					var cardBgUrl = '<?php echo ADDON_PUBLIC_PATH;?>/card_bg_'+$(this).val()+".png";
					$('#cardBg').attr("href",cardBgUrl);
					$('#cardBgImg').attr("src",cardBgUrl);
					$('#customBackground').hide();
				}
		});
		$('#select_length').change(function(){
			var val = 'NO. '+$(this).val();
			$('#cardNumber').html(val);
		});		
		$('#title').keyup(function(){
			$('.card_name').html($(this).val());
		})
		
		//初始化
		var startNum = $('#select_startNumber').val();
		$('#select_length option').each(function(index, element) {
			var tempVal = $(this).prop('value');
			$(this).prop('value',startNum +""+tempVal.substring(1));  
        })
		$('.card_name').html($('#title').val());
		$('#cardNumber').html('NO. '+$('#select_length').val());
		if($('#select_background').val()==11){
			$('#customBackground').show();
			var cardBgUrl = $("#hidden_background_custom").val();
		}else{
			var cardBgUrl = '<?php echo ADDON_PUBLIC_PATH;?>/card_bg_'+$('#select_background').val()+".png";
			$('#customBackground').hide();
		}	
		$('#cardBg').attr("href",cardBgUrl);
		$('#cardBgImg').attr("src",cardBgUrl);	
		if($('#cover_id_logo').val()!=""){
			$('#cardLogo').find('img').attr('src',$('#cover_id_logo').next().find('img').attr('src'));
			if($('input[name="config[show_logo]"]:checked').val()!=0){
				$('#cardLogo').show();
			}else{
				$('#cardLogo').hide();
			}
		}
		$('input[name="config[show_logo]"]').click(function(){
			if($(this).val()!=0){
				$('#cardLogo').show();
			}else{
				$('#cardLogo').hide();
			}
		})
		
		$('#select_startNumber').change(function(){
			var tNum = $(this).val();
			$('#select_length option').each(function(index, element) {
				var tempVal = $(this).prop('value');
				$(this).prop('value',tNum +""+tempVal.substring(1));  
			})
			$('#cardNumber').html('NO. '+$('#select_length').val());
		});
		
		//反面初始化
		$('#select_back_background').change(function(){
				if($(this).val()==11){
					$('#customBackBackground').show();
				}else{
					var cardBgUrl = '<?php echo ADDON_PUBLIC_PATH;?>/card_bg_'+$(this).val()+".png";
					$('#cardBackBg').attr("href",cardBgUrl);
					$('#cardBackBgImg').attr("src",cardBgUrl);
					$('#customBackBackground').hide();
				}
		});	
		$('#instruction').keyup(function(){
			$('.intro').html($(this).val());
		})
		
		//初始化
		$('.intro').html($('#instruction').val().replace(/\n/g,'<br/>'));
		if($('#select_back_background').val()==11){
			$('#customBackBackground').show();
			var cardBgUrl = $("#hidden_back_background_custom").val();
		}else{
			var cardBgUrl = '<?php echo ADDON_PUBLIC_PATH;?>/card_bg_'+$('#select_back_background').val()+".png";
			$('#customBackBackground').hide();
		}	
		$('#cardBackBg').attr("href",cardBgUrl);
		$('#cardBackBgImg').attr("src",cardBgUrl);
		
		//初始化颜色控件
		$('.color_picker').each(function(index, ele) {
            $(ele).colpick({
			colorScheme:'white',
			submitText:"确定",
			layout:'rgbhex',
			color:'ff8800',
			onSubmit:function(hsb,hex,rgb,el) {
					$(el).css('background-color', '#'+hex);
					$(el).colpickHide();
					$(el).prev().val('#'+hex);
					$('.'+$(el).data('color')).css('color','#'+hex);
					
				}
			});
			$('.'+$(ele).data('color')).css('color',$('#'+$(ele).data('color')).val());
        });	
	})
	function logoCallback(name,id,src){
		$('#cardLogo').find('img').attr('src',src);
		$('#cardLogo').show();
	}
    function bgCallback(name,id,src){
        $('#cardBg').attr("href",src);
		$('#cardBgImg').attr("src",src);
    }
    function bgbackCallback(name,id,src){
        $('#cardBackBgImg').attr("src",src);
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