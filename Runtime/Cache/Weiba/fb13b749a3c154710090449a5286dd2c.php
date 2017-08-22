<?php if (!defined('THINK_PATH')) exit();?><html>
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
    <script type="text/javascript">
		//静态变量
		var IMG_PATH = "/Public/Home/images";
		var STATIC_PATH = "/Public/static";
		var SITE_URL = "<?php echo SITE_URL;?>";
		var WX_APPID = "<?php echo ($jsapiParams["appId"]); ?>";
		var	WXJS_TIMESTAMP='<?php echo ($jsapiParams["timestamp"]); ?>'; 
		var NONCESTR= '<?php echo ($jsapiParams["nonceStr"]); ?>'; 
		var SIGNATURE= '<?php echo ($jsapiParams["signature"]); ?>';
	</script>
    <link href="<?php echo ADDON_PUBLIC_PATH;?>/css.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo ADDON_PUBLIC_PATH;?>/style.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/swiper/dist/idangerous.swiper.css">

    <!--TS-U function-->
    <script type="text/javascript">
        var SITE_URL  = '<?php echo SITE_URL; ?>';
        //载入函数
        var U = function(url, params) {
            var website = SITE_URL+'/index.php';
            url = url.split('/');
            if(url[0]=='' || url[0]=='@')
                url[0] = APPNAME;
            if (!url[1])
                url[1] = 'Index';
            if (!url[2])
                url[2] = 'index';
            website = website+'?app='+url[0]+'&mod='+url[1]+'&act='+url[2];
            if(params) {
                params = params.join('&');
                website = website + '&' + params;
            }
            return website;
        };
        var _static = '/index.php?s=';
    </script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/jquery-2.1.1.min.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="<?php echo ADDON_PUBLIC_PATH;?>/appframework.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/jquery.tap.min.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/iscroll.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/ui4jq.js?v=<?php echo SITE_VERSION;?>"></script><script src="<?php echo ADDON_PUBLIC_PATH;?>/basic.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/app.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/form.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/core.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/swiper/dist/idangerous.swiper.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/m/dialog.js"></script>
    <script type="text/javascript" src="/Public/Home/js/m/mobile_module.js"></script>
<script>
/**
 * 全局变量
 */
var  IMG_PATH = "/Public/Home/images";
var  STATIC = "/Public/static";
var  ROOT = "";
var  UPLOAD_PICTURE = "<?php echo U('Home/File/uploadPicture',array('session_id'=>session_id()));?>";
var SITE_URL  = '<?php echo SITE_URL; ?>';
var UPLOAD_URL= '<?php echo UPLOAD_URL; ?>';
var THEME_URL = '__THEME__';
var APPNAME   = '<?php echo APP_NAME; ?>';
var MID       = '<?php echo $mid; ?>';
var UID       = '<?php echo $uid; ?>';
var initNums  =  '<?php echo $initNums; ?>';
var SYS_VERSION = '<?php echo $site["sys_version"]; ?>';
var _CITY = '<?php echo session("init_city");?>';
var ISWAP = 1;
var USER_UN_SETTING = '<?php echo ($unsetting); ?>';
// Js语言变量
var LANG = new Array();
</script>
<?php if(!empty($langJsList)) { ?>
<?php if(is_array($langJsList)): $i = 0; $__LIST__ = $langJsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><script src="<?php echo ($vo); ?>?v=<?php echo SITE_VERSION;?>"></script><?php endforeach; endif; else: echo "" ;endif; ?>
<?php } ?>
<!--
<script src="<?php echo ADDON_PUBLIC_PATH;?>/js.min.w3g.js?v=<?php echo SITE_VERSION;?>"></script>
-->
<script src="<?php echo ADDON_PUBLIC_PATH;?>/swiper/dist/idangerous.swiper.min.js"></script>
</head>
<body>
<div id="header">
    <div id="header-buttons">
    </div>
    <h1>
        
    </h1>
</div>
<div id="layout">
    <div id="main">
<style type="text/css">
body{ background:#f1f1f1}
</style>
<script type="text/javascript">
if((_CITY && parseInt(_CITY)==0 )){
	ui.chooseCity();
}
</script>
<div id="content">
    <div id="weiba" data-title="论坛">
        <header>
        	
            <div id="header-buttons">
            	<!--
                <div id="messageLink" class="header-menu-link"><a href="<?php echo U('w3g/Index/msgbox');?>"><i class="num"></i></a></div>
        		<div id="menuLink" class="header-menu-link"></div>
                -->
                <div class="head_left">
                	<?php if($weiba_curCityInfo && $weiba_curCityInfo['logo']): ?><a class="head_logo" href="<?php echo addons_url('Weiba://Wap/index');?>"><img src="$site.logo"/></a>
                    <?php else: ?>
                    	<a class="head_logo" href="<?php echo addons_url('Weiba://Wap/index');?>"><img src="<?php echo ADDON_PUBLIC_PATH;?>/sys/logo.png?v=<?php echo SITE_VERSION;?>"/></a><?php endif; ?>
                    <a class="head_city_link" href="<?php echo addons_url('Weiba://Wap/cityList');?>">
                        <?php echo ($weiba_curCityInfo['city']); ?><i class="arrow_down"></i>
                    </a>
                </div>
                <div id="otherLink" style="right:0">
                	 <a id="writeLink" class="header-menu-link" href="<?php echo U('post');?>">发帖</a>
                     <!--
                     <a id="searchLink" class="header-menu-link" href="<?php echo addons_url('Weiba://Search/post');?>">搜索</a>
                     -->
                    <div id="headMenu" class="header-menu-link msg_tips_container" href="javascript:;">
                    	导航<em class="msg"></em>
                    	<ul class="head_sub_menu">
                            <a href="<?php echo addons_url('Weiba://Wap/forum');?>">版块</a>
                            <a class="msg_tips_container" href="<?php echo addons_url('Weiba://Wap/my');?>">我<em class="msg"></em></a>
                        </ul>
                    </div>
                    <!--
                    <a id="weibaLink" class="header-menu-link" href="<?php echo U('forum');?>">版块</a>
                    <a id="myLink" class="header-menu-link msg_tips_container" href="<?php echo U('my');?>">我<em class="msg"></em></a>
                    -->
                </div>
            </div>
        </header>
        <div class="mainWeiba">
           
            <?php echo hook('show_ad_space', array('place'=>'weiba_banner','tpl'=>'weiba_banner'));?>
			 <?php if(!$indexList && !$list){ ?>
             	<div class="empty_list">暂时没有推荐!</div>
              <?php } ?>
            <div class="weiba_postlist">
              <?php if($indexList): ?>
              <ul class="wbtz_list">
                <?php if(is_array($indexList)): $i = 0; $__LIST__ = $indexList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li  class="top_li" onclick="javascript:window.open('<?php echo addons_url('Weiba://Wap/postDetail',array('post_id'=>$vo['id']));?>','_self')">
                	<a class="img" href="<?php echo addons_url('Weiba://Wap/postDetail',array('post_id'=>$vo['id']));?>">
                    <img src="<?php echo get_cover_url($vo['index_img']);?>" />
                   
                    
                    </a>
                    <a class="link abs" href="<?php echo addons_url('Weiba://Wap/postDetail',array('post_id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
              <!--
              <ul class="wbtz_list">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li onclick="javascript:window.open('<?php echo U('postDetail',array('post_id'=>$vo['id']));?>','_self')">
                        
                        <a class="link" href="<?php echo U('postDetail',array('post_id'=>$vo['id']));?>"><img class="face" src="<?php echo get_userface($vo['post_uid']);?>" /><?php echo ($vo["title"]); ?></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                
              </ul>
             -->
              <?php endif;if($list): ?>
              <div class="block_title mt8"><p>全站热帖</p></div>
             	<ul id="listData">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li onclick="javascript:window.open('<?php echo addons_url('Weiba://Wap/postDetail',array('post_id'=>$vo['id']));?>','_self')">
                        <div class="name">
                           
                            <a <?php if($vo['digest']): ?>class="yellow"<?php endif; ?> href="<?php echo addons_url('Weiba://Wap/postDetail',array('post_id'=>$vo['id']));?>">
                            <?php if($vo['tag_id']): ?><span class="blue">[ <?php echo ($vo["tag_name"]); ?> ]</span><?php endif; ?>
                            <?php if($vo['is_event']): ?><span class="blue">[ 活动 ]</span><?php endif; ?>
                            <span><?php echo ($vo["title"]); ?></span>
                            
                            <!--<?php if(preg_match('/<img/i',$vo['content'])){ ?><i class="ico-img"><img class="icons" width="16" src="<?php echo APPS_URL;?>/w3g/_static/images/ico-img.png"></i><?php } ?></a>-->
                            </a>
                            <?php if($vo['attach']){ ?><i class="ico-bar-attach">&nbsp;</i><?php } ?>
                            <!--<?php if($vo['is_img']){ ?><i class="ico-bar-image">&nbsp;</i><?php } ?>-->
                            <!--
                            <?php if($vo['top']==1){ ?><i class="ico-bar-top">&nbsp;</i><?php } ?>
                            -->
                            <?php if($vo['digest']==1){ ?><i class="ico-bar-fine">&nbsp;</i><?php } ?>
                            <?php if($vo['recommend']){ ?><i class="ico-bar-recd">&nbsp;</i><?php } ?>
                        </div>
                        <?php if($vo['image']){ ?> 
                        <a class="weiba_postlist_pics" href="<?php echo addons_url('Weiba://Wap/postDetail',array('post_id'=>$vo['id']));?>">
                        <div class="ninepic_list">
                            <?php if(is_array($vo['image'])): $i = 0; $__LIST__ = $vo['image'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if(($i) < "4"): ?><span><img src="<?php echo ($vo2); ?>"/></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        </a>
                        <?php } ?> 
                        <div class="info clearfix">
                            <div class="left">
                                <a href="<?php echo addons_url('Weiba://Wap/profile',array('uid'=>$vo['post_uid']));?>">
                                <img height="16" width="16" src="<?php echo (get_userface($vo['post_uid'])); ?>"/>
                                <?php echo ($user_info[$vo['post_uid']]['nickname']); ?></a>
                                <!--&nbsp;-&nbsp;<span><?php echo (time_format($vo["post_time"])); ?></span>-->
                            </div>
                            <div class="right">
                            <?php if($vo['event'] && $vo['event']['join_count']>0){ ?><span class="jlnum"><?php echo ($vo["event"]["join_count"]); ?></span><?php }if($vo['read_count']>0){ ?><span class="llnum"><?php echo ($vo["read_count"]); ?></span><?php }if($vo['reply_count']>0){ ?><span class="plnum"><?php echo ($vo["reply_count"]); ?></span><?php } ?>
                            </div>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>
                <?php endif; ?>
            </div>
            <!--
            <?php if($weibalist): ?>
            <div class="weiba_forumlist">
			<div class="section">
              <div class="slt">推荐版块</div>
                <div class="slc clearfix">
                  <div class="bklist">
                    <?php if(is_array($weibalist)): $i = 0; $__LIST__ = $weibalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
                          <dt>
                            <a href="<?php echo U('detail',array('weiba_id'=>$vo['weiba_id']));?>">
                              <img width="105" height="105" src="<?php echo ($vo["avatar_big"]); ?>">
                            </a>
                          </dt>
                          <dd>
                            <h3>
                              <a title="<?php echo ($vo["weiba_name"]); ?>" href="<?php echo U('detail',array('weiba_id'=>$vo['weiba_id']));?>">   <?php echo ($vo["weiba_name"]); ?>
                              </a>
                            </h3>
                          </dd>
                        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            -->
        </div>
    </div>


    </div><!--content-->
</div><!--main-->
        <script>
            (function(){
                TS.cache.profile = {
                    uid:'<?php echo ($profile["uid"]); ?>',
                    uname:'<?php echo ($profile["uname"]); ?>',
                    email:'<?php echo ($profile["email"]); ?>',
                    avatar_original:'<?php echo ($profile["avatar_original"]); ?>',
                    avatar_small:'<?php echo ($profile["avatar_small"]); ?>'
                };
//                $(document).on("touchmove",".pic-view-img",function(e){
//                        console.log(e);
//                });
            })();

        </script>

</div>
	<!--
    <div class="postentry">
        <?php if(MODULE_NAME == 'Index' && in_array(ACTION_NAME,array('index','rec','fri_weibo','doSearch'))){ ?>
            <a href="#new-weibo" id="postentry">&nbsp;</a>
        <?php }elseif(MODULE_NAME == 'Channel'){ ?>
            <a href="#new-channel-weibo" id="postentry">&nbsp;</a>
        <?php }elseif(MODULE_NAME == 'Weiba'){ ?>
            <?php if(ACTION_NAME == 'postDetail'){ ?>
            <a href="<?php echo U('reply', array('post_id'=>intval($_GET['post_id'])));?>" id="postentry">&nbsp;</a>
            <?php }elseif(!in_array(ACTION_NAME, array('reply', 'post'))){ ?>
            <a href="<?php echo U('post', array('weiba_id'=>intval($_GET['weiba_id'])));?>" id="postentry">&nbsp;</a>
            <?php } ?>
        <?php } ?>
    </div>
    -->
    <div id="pure-shadow"></div>
    <div id="footer"></div>
    <div id="custom"></div>
    <?php if($is_post_detail == 1){ ?>
    	<!-- 详情底部兰 -->
        <div class="weiba_detail_bar">
            <a href="javascript:;" onclick="showreplyDialog();"><i class="comment"></i><span>评论</span></a>
            <a href="javascript:;" onclick="doPostDigg()">
            	<div id="post-zan" class="<?php if(($is_digg) == "1"): ?>iszan<?php endif; ?>"><i class="zan"></i><em><?php if(($post_detail[praise]) > "0"): echo ($post_detail["praise"]); endif; ?></em></div><span class="mcount">点赞</span>
            </a>
            <?php if($isWeixin): ?><a onclick="ui.showShareTips();" href="javascript:;"><i class="share"></i><span>分享</span></a><?php endif; ?>
        </div>
        <div class="reply_dialog">
            <div class="dialog">
                <div class="textarea"><textarea autofocus name="weiba-reply-textarea" id="weiba-reply-textarea" placeholder="内容,2-70个字"></textarea></div>
                <div class="bar">
                    <a id="replybtn" class="btn" href="javascript:;" onclick="submitReply();">发送</a>
                    <a class="btn btn_border" href="javascript:;" onclick="hidereplyDialog();">取消</a>
                    
                </div>
            </div>
        </div> 
        <script type="text/javascript">
			
        	function showreplyDialog(data){
				$('.reply_dialog').height($('#layout').height()+50);
				$('.reply_dialog .dialog').css('top',$(window).scrollTop()+50);
				if('<?php echo ($mid); ?>'>0){
					$('.reply_dialog').show();
					$('.reply_dialog textarea').focus();
					if(data){
						window.replyData = data;
						$('#weiba-reply-textarea').attr('placeholder','回复'+window.replyData.to_comment_uname);
						//console.log(window.replyData)
					}else{
						window.replyData = null;
					}
				}else{
					$.ui.showMask("请先登录", true);
					setTimeout(function(){
						window.location.href = "<?php echo U('w3g/Public/login');?>";		
					},1500)
				}
				//window.location.href = "<?php echo U('reply', array('post_id'=>intval($_GET['post_id'])));?>";
			}
			function hidereplyDialog(){
				$('.reply_dialog').hide();
			}
			function submitReply(){
					var url = "<?php echo addons_url('Weiba://Wap/addReply');?>";
					var data = {};
					if(window.replyData){
						data.weiba_id = window.replyData.weiba_id;
						data.post_id = window.replyData.post_id;
						data.post_uid = window.replyData.post_uid;
						data.to_reply_id = window.replyData.to_reply_id;
						data.to_uid = window.replyData.to_uid;
						data.feed_id = window.replyData.feed_id;
						data.list_count= 0;
						
					}else{
						data.weiba_id = '<?php echo $post_detail["weiba_id"]; ?>';
						data.post_id = '<?php echo $post_detail["id"]; ?>';
						data.post_uid = '<?php echo $post_detail["post_uid"]; ?>';
						data.to_reply_id = data.reply_id?data.reply_id:0;
						data.to_uid = data.uid?data.uid:0;
						data.feed_id = '<?php echo $post_detail["feed_id"]; ?>';
						data.list_count= '<?php echo $list_count; ?>';
					}
					data.widget_appname = 'weiba';
					data.content = '';
					data.ifShareFeed = '0';
					data.attach_id = '0';
					var content = $.trim($('#weiba-reply-textarea').val());
					if(!content){
						$.ui.showMask("请输入内容！", true);
						return false;
					}
					if(content.length<2 || content.length>70){
						$.ui.showMask("评论限制2-70个字！", true);
						return false;
					}
					data.content = content;
					
					
					$.post(url, data, function(result){
						if(result.status == 1){
							hidereplyDialog();
							$.ui.showMask("评论成功！", true);
							//setTimeout(function(){
								window.location.href = "<?php echo addons_url('Weiba://Wap/postDetail', array('post_id'=>$post_detail['id']));?>";
							//}, 1200);
						}else{
							$.ui.showMask("回复失败，请稍候再试！", true);
						}
					}, 'json');
						
			}
			function doPostDigg(){
				if('<?php echo ($mid); ?>'<=0){
					$.ui.showMask("请先登录", true);
					setTimeout(function(){
						window.location.href = "<?php echo U('w3g/Public/login');?>";		
					},1500)
				}else{
				var type = $('#post-zan').hasClass('iszan')?0:1;
				if(type==1){
					var url = "<?php echo U('addPostDigg');?>";
				}else{
					var url = "<?php echo U('delPostDigg');?>";
				}
				
				var data = {};
					data.row_id = '<?php echo $post_detail["post_id"]; ?>';
				$.post(url, data,function(result){
					if(result == 1){
						if(type==1){
							$('#post-zan').addClass('iszan');
							if($('#post-zan em').text()==""){
								var count = 0;
							}else{
								var count = parseInt($('#post-zan em').text());
							}
							$('#post-zan em').text(count+1);
						}else{
							$('#post-zan').removeClass('iszan');
							var count = parseInt($('#post-zan em').text());
							if(count-1>0){
								$('#post-zan em').text(count-1);
							}else{
								$('#post-zan em').text('');
							}
						}
					}else{
						
					}
				}, 'json');
				}
			}
        </script>    
    <?php } ?>
    <!-- 统计代码-->
<div id="site_analytics_code" style="display:none;"> <?php echo (base64_decode($site["site_analytics_code"])); ?> </div>
<?php if(($site["site_online_count"]) == "1"): ?><script src="<?php echo SITE_URL;?>/online_check.php?uid=<?php echo ($mid); ?>&uname=<?php echo ($user["uname"]); ?>&mod=<?php echo MODULE_NAME;?>&app=<?php echo APP_NAME;?>&act=<?php echo ACTION_NAME;?>&action=trace&city=<?php echo session('city');?>"></script><?php endif; ?>
</body>
</html>