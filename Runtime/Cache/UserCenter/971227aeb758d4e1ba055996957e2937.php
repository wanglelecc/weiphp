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

<body style="background:#fff">
<div class="lists_data">
  <div class="span9 page_message">
    <section id="contents"> 
      <div class="table-bar">
        <div class="search-form fl">
          <div class="sleft" style="margin-right:10px;">
              <select name="group" style="border:none; padding:4px; margin:0;">
              <option value="<?php echo addons_url('UserCenter://UserCenter/lists',array('group_id'=>0,'isAjax'=>1,'isRadio'=>$isRadio));?>" <?php if(($$group_id) == "0"): ?>selected<?php endif; ?> >全部用户</option>
                  <?php if(is_array($auth_group)): $i = 0; $__LIST__ = $auth_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo addons_url('UserCenter://UserCenter/lists',array('group_id'=>$vo['id'],'isAjax'=>1,'isRadio'=>$isRadio));?>" <?php if(($vo['id']) == $group_id): ?>selected<?php endif; ?> ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
          </div>
        </div>
        <!-- 高级搜索 -->
        <div class="search-form fr cf">
          <div class="sleft">
            <input type="text" placeholder="请输入关键字" value="<?php echo I('nickname');?>" class="search-input" name="nickname">
            <a url="<?php echo addons_url('UserCenter://UserCenter/lists',$get_param);?>" id="search" href="javascript:;" class="sch-btn"><i class="btn-search"></i></a> </div>
        </div>
        <!-- 多维过滤 --> 
      </div>
      <!-- 数据列表 -->
      <div class="data-table">
        <div class="table-striped">
          <table cellspacing="1">
            <!-- 表头 -->
            <thead>
              <tr>
                <th class="row-selected row-selected"> 
                  <?php if(!isRadio): ?><input type="checkbox" class="check-all regular-checkbox" id="checkAll">
                  <label for="checkAll"></label></th><?php endif; ?>
                <th>头像</th>
                <th>用户昵称</th>
                <th>性别</th>
                <th>分组</th>
              </tr>
            </thead>
            
            <!-- 列表 -->
            <tbody>
              <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td>
                   <?php if(empty($isRadio)): ?><input type="checkbox" id="check_<?php echo ($vo["uid"]); ?>" name="ids[]" value="<?php echo ($vo["uid"]); ?>" class="ids regular-checkbox">
                    	<label for="check_<?php echo ($vo["uid"]); ?>"></label>
                    <?php else: ?>
                    	<input type="radio" id="check_<?php echo ($vo["uid"]); ?>" name="ids[]" value="<?php echo ($vo["uid"]); ?>" class="ids regular-radio">
                    	<label for="check_<?php echo ($vo["uid"]); ?>"></label><?php endif; ?>
                    <input type="hidden" name="openid" value="<?php echo ($vo["openid"]); ?>"/>
                  </td>
                  <td type="headimgurl"><?php echo (url_img_html($vo["headimgurl"])); ?></td>
                  <td type="nickname"><?php echo ($vo["nickname"]); ?></td>
                  <td type="sex_name"><?php echo ($vo["sex_name"]); ?></td>
                  <td type="group"><?php echo ($vo["group"]); ?></td>
                 
                  
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="page"> <?php echo ((isset($_page) && ($_page !== ""))?($_page):''); ?> </div>
    </section>
  </div>
  
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
        	url="<?php echo addons_url(MODULE_NAME.'://'.CONTROLLER_NAME.'/lists',array('isAjax'=>1,'isRadio'=>$isRadio));?>";
        }
		window.location.href = url;
	});

    //回车自动提交
    $('.search-form').find('input').keyup(function(event){
        if(event.keyCode===13){
            $("#search").click();
        }
    });
	$('select[name=group]').change(function(){
		location.href = this.value;
	});	
	
})
</script> 
</body>
</html>