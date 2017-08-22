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
		<h2>[<a href="<?php echo U('Admin/model/edit','id='.$model_id);?>#2"><?php echo get_model_by_id($model_id);?></a>] 属性列表</h2>

	</div>
    <div class="tools">
        <a class="btn" href="<?php echo U('Attribute/add?model_id='.$model_id);?>">新 增</a>
        <a class="btn" href="javascript:;" onclick="doSave()">保存排序</a> (支持拖动排序)
    </div>

	<!-- 数据列表 -->
	<div class="data-table">
        <div class="data-table table-striped">
        <form id="form" action="<?php echo U('save_sort');?>" method="post">
        <input name="model_id" type="hidden" value="<?php echo ($model_id); ?>"  />
	<table>
    <thead>
        <tr>
		<th>字段</th>
		<th>名称</th>
		<th>数据类型</th>
        <th>字段定义</th>
        <th>是否显示</th>
        <th>是否必填</th>
		<th>操作</th>
		</tr>
    </thead>
    <tbody class="needdragsort">
		<?php if(!empty($_list)): $is_show_arr = array(0=>'不显示',1=>'始终显示',2=>'新增显示',3=>'编辑显示',5=>'条件控件',4=>'隐藏值'); $is_must_arr = array(0=>'否',1=>'是'); ?>
		<?php if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $vo['is_show'] = intval($vo['is_show']);$vo['is_must'] = intval($vo['is_must']); ?>
		<tr>
			<td><input name="sort[]" type="hidden" value="<?php echo ($key); ?>"><?php echo ($key); ?></td>
			<td><a data-id="<?php echo ($vo["id"]); ?>" href="<?php echo U('Attribute/edit',['name'=>$key,'model_id'=>$model_id]);?>"><?php echo ($vo["title"]); ?></a></td>
			<td><span><?php echo get_attribute_type($vo['type']);?></span></td>
            <td><span><?php echo ($vo['field']); ?></span></td>
            <td><span><?php echo ($is_show_arr[$vo['is_show']]); ?></span></td>
            <td><span><?php echo ($is_must_arr[$vo['is_must']]); ?></span></td>
			<td><a href="<?php echo U('Attribute/edit',['name'=>$key,'model_id'=>$model_id]);?>">编辑</a>
				<a class="confirm ajax-get" href="<?php echo U('Attribute/remove',['name'=>$key,'model_id'=>$model_id]);?>">删除</a>
                </td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>
		<td colspan="7" class="text-center"> aOh! 暂时还没有内容! </td><?php endif; ?>
	</tbody>
    </table></form>
        </div>
    </div>
    <div class="page">
        <?php echo ($_page); ?>
    </div>

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

    <script src="/Public/static/thinkbox/jquery.thinkbox.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/static/jquery.dragsort-0.5.1.min.js"></script>    
<script type="text/javascript">
$(function(){
	$("#search").click(function(){
		var url = $(this).attr('url');
		var status = $('select[name=status]').val();
		var search = $('input[name=search]').val();
		if(status != ''){
			url += '/status/' + status;
		}
		if(search != ''){
			url += '/search/' + search;
		}
		window.location.href = url;
	});
	
$(".needdragsort").dragsort({
	 dragSelector:'tr',
	 dragSelectorExclude:'a[href]',
	 dragBetween:true,	//允许拖动到任意地方	 
 });		
})
function doSave(){
	$('#form').submit()
}
</script>

</body>
</html>