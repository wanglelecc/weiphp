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
</style>
<body style="background: #fff;">
<?php if(empty($list_data)): ?><div class="empty_container"><p>您的语音素材库为空，<a target="_blank" href="<?php echo U('Home/Material/voice_lists');?>">请先增加素材</a></p></div>
<?php else: ?><div class="data_container"><ul class="material_list">
      <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="appmsg_li" data-id="<?php echo ($vo["id"]); ?>"  style="overflow:hidden">
      	<div class="picture_item">
             <div class="sound_item" onClick="playSound('sound_<?php echo ($vo["id"]); ?>',this);">
                 <img class="icon_sound" src="/Public/Home/images/icon_sound.png"/>
                 <p class="audio_name ellipsis""><?php echo ($vo["title"]); ?><span class="fr colorless"><?php echo ($vo["file_info"]["playtime"]); ?></span></p>
                 <p class="ctime colorless"><?php echo (time_format($vo["cTime"])); ?></p>
                 <audio id="sound_<?php echo ($vo["id"]); ?>" src="<?php echo (get_file_url($vo["file_id"])); ?>"></audio>
             </div>
         </div>
      </li>
      </if><?php endforeach; endif; else: echo "" ;endif; ?></ul>
      </div><?php endif; ?>
<div class="page"> <?php echo ((isset($_page) && ($_page !== ""))?($_page):''); ?> </div></div>
<script type='text/javascript'>
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

$(function(){
	$('.material_list').masonry({
		// options
		itemSelector : '.appmsg_li'
		//columnWidth : 308
	  });
});
</script>
</body>