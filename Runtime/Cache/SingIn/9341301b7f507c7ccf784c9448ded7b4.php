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
    
<style type="text/css">
.money {
	width: 50px;
}
.specTable .param {
	display: none;
}
.specTable p {
	display: block;
	line-height: 50px;
}
.text-center {
	text-align: center;
}
.check-tips {
	color: #aaa;
	margin-left: 50px
}
</style>
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
        <form action="<?php echo U('config');?>" class="form-horizontal" method="post">
          <div class="form-item cf">
            <label class="item-label"> 签到积分模式: </label>
            <div class="controls">
              <label class="radio">
                <input type="radio" class="random" value="1" name="config[random]" <?php if(intval($data[random])==1): ?>checked="checked"<?php endif; ?> >
                固定积分 </label>
              <label class="radio">
                <input type="radio" class="random" value="0" name="config[random]" <?php if(intval($data[random])==0): ?>checked="checked"<?php endif; ?> >
                随机积分 </label>
            </div>
          </div>
          <div class="form-item cf" id="score">
            <label class="item-label"> 固定签到积分: </label>
            <div class="controls">
              <input type="number" value="<?php echo ((isset($data["score"]) && ($data["score"] !== ""))?($data["score"]):10); ?>" class="text money" name="config[score]">
            </div>
          </div>
          <div class="form-item cf" id="score1">
            <label class="item-label"> 随机积分范围: </label>
            <div class="controls">
              <input type="number" value="<?php echo ((isset($data["score1"]) && ($data["score1"] !== ""))?($data["score1"]):2); ?>" class="text money" name="config[score1]"> - <input type="number" value="<?php echo ((isset($data["score2"]) && ($data["score2"] !== ""))?($data["score2"]):10); ?>" class="text money" name="config[score2]">
            </div>
          </div>
          <div class="form-item cf">
            <label class="item-label"> 签到开始时间: </label>
            <div class="controls">
              <input type="text" value="<?php echo ((isset($data["hour"]) && ($data["hour"] !== ""))?($data["hour"]):'08'); ?>" class="text money" name="config[hour]" placeholder="小时">：<input type="text" value="<?php echo ((isset($data["minute"]) && ($data["minute"] !== ""))?($data["minute"]):'00'); ?>" class="text money" name="config[minute]" placeholder="分钟">
            </div>
          </div>
          <div class="form-item cf">
            <label class="item-label"> 连续签到：  </label>
            <div class="controls">
             连续 <input type="text" value="<?php echo ($data["continue_day"]); ?>" class="text money" name="config[continue_day]"> 天签到奖励 <input type="text" value="<?php echo ($data["continue_score"]); ?>" class="text money" name="config[continue_score]"> 积分
            </div>
          </div>          
         <div class="form-item cf">
            <label class="item-label"> 分享奖励：  </label>
            <div class="controls">
             分享一次奖励 <input type="text" value="<?php echo ($data["share_score"]); ?>" class="text money" name="config[share_score]"> 积分，每天最多奖励 <input type="text" value="<?php echo ($data["share_limit"]); ?>" class="text money" name="config[share_limit]"> 次 （不填代表不做限制）
            </div>
          </div> 
          
          <div class="form-item cf">
            <label class="item-label"> 未开始签到回复模板: </label>
            <div class="controls">
              <label class="textarea input-large">
                  <?php if(empty($data["notstart"])): ?><textarea name="config[notstart]">亲，你起得太早了,签到从[开始时间]开始,现在才[当前时间]！</textarea>
                  <?php else: ?>
                  <textarea name="config[notstart]"><?php echo ($data["notstart"]); ?></textarea><?php endif; ?>
              </label>
            </div>
          </div>
          <div class="form-item cf">
            <label class="item-label"> 已签到回复模板: </label>
            <div class="controls">
              <label class="textarea input-large">
                  <?php if(empty($data["done"])): ?><textarea name="config[done]">亲，今天已经签到过了，请明天再来哦，谢谢！</textarea>
                  <?php else: ?>
                  <textarea name="config[done]"><?php echo ($data["done"]); ?></textarea><?php endif; ?>
              </label>
            </div>
          </div>
          <div class="form-item cf">
            <label class="item-label"> 签到成功回复模板: </label>
            <div class="controls">
              <label class="textarea input-large">
                  <?php if(empty($data["reply"])): ?><textarea name="config[reply]">恭喜您,签到成功
本次签到获得[本次积分]积分
当前总积分[积分余额]
[签到时间]
您今天是第[排名]位签到
签到排行榜：
[排行榜]</textarea>
                  <?php else: ?>
                  <textarea name="config[reply]"><?php echo ($data["reply"]); ?></textarea><?php endif; ?>
              </label>
            </div>
          </div>
          <div class="form-item cf">
            <label class="item-label"> 积分攻略: </label>
            <div class="controls">
              <label class="textarea input-large">
                  <textarea name="config[content]"><?php echo ($data["content"]); ?></textarea>
              </label>
            </div>
          </div>
          <input type="hidden" readonly="" value="145" name="id">
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
 
  <script type="text/javascript" charset="utf-8">
  function choose_type(){
	var val = $('input[name="config[random]"]:checked').val();
	if(val==0){
		$('#score1').show();
		$('#score').hide();
	}else{
		$('#score1').hide();
		$('#score').show();
	}
}
	$(function(){
		//支持tab
		showTab();
		
		$('.random').bind('click',function(){ choose_type();	});
	choose_type();
	})
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