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
    
    
  <!-- 标题栏 -->
  
  <div class="main-title">
    <h2>错误日志</h2>
    <div class="fr">
      <span>日志开关：</span>
      <div class="weui-cell-cp">
        <label for="switch_2" class="weui-switch-cp">
        <input id="switch_2" class="weui-switch-cp__input" type="checkbox" <?php if(!empty($error_log)): ?>checked="checked"<?php endif; ?> >
        <div class="weui-switch-cp__box"></div>
        </label>
      </div>
     </div> 
  </div>
    <div class="mb30">
      <p>为了方便我们持续改进产品质量，建议大家在超级管理员后台的网站配置上开启错误日志共享计划:</p>
    开启共享计划后，程序会自动把你系统里的级别为EMERG,ALERT,CRIT,ERR的错误日志（其它日志不会共享），PHP版本号，MYSQL版本号，服务器操作系统（Luinx还是window）,PHP运行环境（nginx还是apache）这几项信息上传到我们官网进行问题定位分析。其它敏感信息我们是不会上传的，同时系统每天只会上传一次日志，不会影响你系统的性能，请放心开启。
    </div>

  <h2 class="mb30" style="font-weight:400;">当前服务器参数</h2>
  <ul>
    <li>操作系统：<?php echo PHP_OS;?></li>
    <li>PHP版本：<?php echo PHP_VERSION;?></li>
    <li>MYSQL版本：<?php echo ($mysql); ?></li>
    <li>服务器信息：<?php echo ($_SERVER ['SERVER_SOFTWARE']); ?></li>
    <li>PHP信息：<?php echo PHP_SAPI;?></li>
    <li>端口号：<?php echo ($_SERVER ['SERVER_PORT']); ?></li>
  </ul>

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

  <script type="text/javascript">
$(function(){
	$('#switch_2').change(function(){
		var val = $(this).is(':checked') ? 1:0;
		$.post("<?php echo U('error');?>",{val:val});
	});
})
</script>

</body>
</html>