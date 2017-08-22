<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/mobile_module.css?v=<?php echo SITE_VERSION;?>" media="all">
    <script type="text/javascript">
		//静态变量
		var SITE_URL = "<?php echo SITE_URL;?>";
		var IMG_PATH = "/Public/Home/images";
		var STATIC_PATH = "/Public/static";
		var WX_APPID = "<?php echo ($jsapiParams["appId"]); ?>";
		var	WXJS_TIMESTAMP='<?php echo ($jsapiParams["timestamp"]); ?>'; 
		var NONCESTR= '<?php echo ($jsapiParams["nonceStr"]); ?>'; 
		var SIGNATURE= '<?php echo ($jsapiParams["signature"]); ?>';
	</script>
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="<?php echo HTTP_PREFIX;?>res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="minify.php?f=/Public/Home/js/prefixfree.min.js,/Public/Home/js/m/dialog.js,/Public/Home/js/m/flipsnap.min.js,/Public/Home/js/m/mobile_module.js&v=<?php echo SITE_VERSION;?>"></script>
</head>
<link href="<?php echo ADDON_PUBLIC_PATH;?>/userCenter.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">

<style type="text/css">
body{ background:#fff}
</style>
<section class="check_done">
        	<img src="/Public/Home/images/check_right.png"/>
        	<p>恭喜您!检测完成</p>
            <p id="errormsg1"></p>
            <p id="errormsg2"></p>
            <p id="errormsg3"></p>
            <p id="errormsg4"></p>
            <a class="btn" href="JavaScript:;" onClick="wx.closeWindow();">返回微信</a>
</section>
<script type="text/javascript">
var WX_APPID = "<?php echo ($jsapiParams["appId"]); ?>";
var	WXJS_TIMESTAMP='<?php echo ($jsapiParams["timestamp"]); ?>'; 
var NONCESTR= '<?php echo ($jsapiParams["nonceStr"]); ?>'; 
var SIGNATURE= '<?php echo ($jsapiParams["signature"]); ?>';
wx.config({
	debug: false,
	appId: WX_APPID, // 必填，公众号的唯一标识
	timestamp: WXJS_TIMESTAMP, // 必填，生成签名的时间戳
	nonceStr: NONCESTR, // 必填，生成签名的随机串
	signature: SIGNATURE,// 必填，签名，见附录1
	jsApiList: ['chooseImage']
	});
wx.error(function(res){
	$.post("<?php echo addons_url('UserCenter://Wap/check3',array('token'=>I('token')));?>",{msg:res.errMsg});
});
</script>

<!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div>
</body>
</html>