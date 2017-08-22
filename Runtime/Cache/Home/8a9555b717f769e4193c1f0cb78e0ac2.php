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
       <?php if(!empty($userInfo[website_logo])): ?><img height="" style="margin-top:8px;" src="<?php echo (get_cover_url($userInfo["website_logo"])); ?>"/>
       	<?php else: ?>
       		<img height=""  style="margin-top:8px;" src="/Public/Home/images/logo.png"/><?php endif; ?>
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
		
<?php if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login',array('from'=>5))); } ?>
<div id="main-container" class="container" style="position:relative">
    <div class="no_side_main_body">
        
  <div class="wrap" style="clear:both; margin:30px auto;">
    <section class="tab-content" id="contents"> 
      
      <!-- 数据列表 -->
      <div style="overflow:hidden; zoom:1;">
        <h3 style=" float:left;margin-bottom:15px;"><img style="vertical-align:middle; height:30px" src="/Public/Home/images/weixin.png"/> 我的公众号</h3>
        <div style="margin:0 0 15px 0; float:right"> <a class="btn" href="<?php echo U('step_0');?>">+新增公众号</a> </div>
      </div>
      <div class="data-table" style="margin:0;">
        <?php if(!empty($list_data[0])): ?><div class="table-striped">
            <table cellspacing="1">
              <!-- 表头 -->
              <thead>
                <tr>
                  <th width="8%">公众号ID</th>
                  <th  width="10%">公众号名称</th>
                  <th  width="15%">原始ID</th>
                  <th  width="15%">AppID</th>

                  <!--<th  width="10%">管理员数</th>-->
                  <th  width="45%">操作</th>
                </tr>
              </thead>
              
              <!-- 列表 -->
              <tbody>
                <?php if(is_array($list_data[0])): $i = 0; $__LIST__ = $list_data[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($data["id"]); ?></td>
                    <td><?php echo ($data["public_name"]); ?></td>
                    <td><?php echo ($data["token"]); ?></td>
                    <td><?php echo ($data["appid"]); ?></td>

                    <!--<td><?php echo ($data["count"]); ?></td>-->
                    <td>
                    <a href="<?php echo U('Home/Index/main',array('wpid'=>$data[id]));?>" target="_self">进入管理</a>&nbsp;&nbsp;&nbsp; 
                    <a href="<?php echo U('Home/Apps/check_res',['id'=>$data[id]]);?>" target="_self">自动检测</a>&nbsp;&nbsp;&nbsp; 
                    <?php if($data['is_creator']) { ?>
                    <a href="<?php echo U('Home/AppsLink/lists',['mp_id'=>$data[id]]);?>" target="_self">管理员配置</a>&nbsp;&nbsp;&nbsp;
                      <?php if(!C('PUBLIC_BIND') || !$data['is_bind']) { ?>
                      <a href="<?php echo U('step_0',['id'=>$data[id]]);?>" target="_self">编辑</a>&nbsp;&nbsp;&nbsp;
                      <a href="<?php echo U('payment_set',['id'=>$data[id]]);?>" target="_self">微信支付</a>&nbsp;&nbsp;&nbsp;
                      <?php } } ?>
                    <a href="javascript:;" onclick="do_del('<?php echo ($data["id"]); ?>')" >删除</a>
                   </td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
            </table>
          </div>
          <?php else: ?>
          <div style="padding:100px; text-align:center;"><img style="vertical-align:middle;" src="/Public/Home/images/weixin.png"/> 你还没有创建公众号</div><?php endif; ?>
      </div>
    </section>
  </div>
  <div class="wrap" style="clear:both; margin:30px auto;">
    <section class="tab-content" id="contents">
      <div style="overflow:hidden; zoom:1;">
        <h3 style=" float:left;margin-bottom:15px;"><img style="vertical-align:middle; height:25px" src="/Public/Home/images/user_icon.png"/> 我的小程序</h3>
        <div style="margin:0 0 15px 0; float:right"> <a class="btn" href="<?php echo U('step_miniapp_0');?>">+新增小程序</a> </div>
      </div>
      <div class="data-table" style="margin:0">
      <?php if(!empty($list_data[1])): ?><div class="table-striped">
          <table cellspacing="1">
            <!-- 表头 -->
            <thead>
              <tr>
                <th width="8%">小程序ID</th>
                <th  width="10%">小程序名称</th>
                <th  width="15%">原始ID</th>
                  <th  width="15%">AppID</th>
               
                <!--<th  width="10%">管理员数</th>-->
                <th  width="45%">操作</th>
              </tr>
            </thead>
            
            <!-- 列表 -->
            <tbody>
              <?php if(is_array($list_data[1])): $i = 0; $__LIST__ = $list_data[1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                  <td><?php echo ($data["id"]); ?></td>
                  <td><?php echo ($data["public_name"]); ?></td>
                  <td><?php echo ($data["token"]); ?></td>
                  <td><?php echo ($data["appid"]); ?></td>
                 
                  <!--<td><?php echo ($data["count"]); ?></td>-->
                  <td>
                  <a href="<?php echo U('WeiUserCenter/WeiUserCenter/lists',['wpid'=>$data[id]]);?>" target="_self">进入管理</a>&nbsp;&nbsp;&nbsp; 
                  <?php if($data['is_creator']) { ?>
                        <!--<a href="<?php echo U('Home/AppsLink/lists',['mp_id'=>$data[id]]);?>" target="_self">管理员配置</a>&nbsp;&nbsp;&nbsp;                 -->     
                        <a href="<?php echo U('step_miniapp_0',['id'=>$data[id]]);?>" target="_self">编辑</a>&nbsp;&nbsp;&nbsp;  
                        <a href="<?php echo U('payment_set',['id'=>$data[id]]);?>" target="_self">微信支付</a>&nbsp;&nbsp;&nbsp;
                  <?php } ?>                
                  <a href="javascript:;" onclick="do_del('<?php echo ($data["id"]); ?>')" >删除</a>
                  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
        </div><?php endif; ?>
      </div>
    </section>
  </div>
  

    </div>
</div>

		<!-- /主体 -->
	</div>
	<!-- 底部 -->
	<div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由 <a href="https://www.56br.com/" target="_blank">56BR</a> 强力驱动</p>
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
//搜索功能
function do_del(id){
	var msg='您确定要删除吗？';
	if(confirm(msg)){
		var url="<?php echo U('del');?>";
// 		alert(url);
		$.post(url,{'id':id},function(){
			location.reload();
		});
	}
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