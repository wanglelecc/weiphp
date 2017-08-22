<?php if (!defined('THINK_PATH')) exit();?><meta charset="UTF-8">
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

<style>
.material_list{margin: 0;}
.appmsg_item .main_img {margin: 0;}
</style>
<body style="background: #fff;">
<?php if(empty($list_data)): ?><div class="empty_container"><p>您的图文素材库为空，<a target="_blank" href="<?php echo U('Home/Material/material_lists');?>">请先增加素材</a></p></div>
<?php else: ?><div class="data_container"><ul class="material_list">
      <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo[count]==1): ?><li class="appmsg_li" data-id="<?php echo ($vo["id"]); ?>" data-group_id="<?php echo ($vo["group_id"]); ?>" style="overflow:hidden">
            <div class="appmsg_item">
                <h6 class="ellipsis""><?php echo ($vo["title"]); ?></h6>
                <p class="title"><?php echo (time_format($vo["cTime"])); ?></p>
                <div class="main_img">
                    <img src="<?php echo (get_cover_url($vo["cover_id"])); ?>"/>
                </div>
                <p class="desc"><?php echo ($vo["intro"]); ?></p>
            </div>
            <div class="hover_area"></div>
        </li><?php else: ?><li class="appmsg_li" data-id="<?php echo ($vo["id"]); ?>" data-group_id="<?php echo ($vo["group_id"]); ?>" style="overflow:hidden">
            <div class="appmsg_item">
                <p class="title"><?php echo (time_format($vo["cTime"])); ?></p>
                <div class="main_img">
                    <img src="<?php echo (get_cover_url($vo["cover_id"])); ?>"/>
                    <h6><?php echo ($vo["title"]); ?></h6>
                </div>
                <p class="desc"><?php echo ($vo["intro"]); ?></p>
            </div>
            <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class="appmsg_sub_item">
                <p class="title"><?php echo ($vv["title"]); ?></p>
                <div class="main_img">
                    <img src="<?php echo (get_cover_url($vv["cover_id"])); ?>"/>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="hover_area"></div>
        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?></ul>
   </div><?php endif; ?>
<div class="page"> <?php echo ((isset($_page) && ($_page !== ""))?($_page):''); ?> </div></div>
<script type="text/javascript">
$(function(){
	$('.material_list').masonry({
		// options
		itemSelector : '.appmsg_li'
		//columnWidth : 308
	  });
});

</script>
</body>