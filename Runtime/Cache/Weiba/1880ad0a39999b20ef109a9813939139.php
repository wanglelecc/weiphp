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
  body{background-color: #f1f1f1;}
</style>
<div id="content">
    <div id="weiba" data-title="发新帖" class="panel" data-selected="true"  data-menu="msgmenu">
        <header>
            <div id="header-buttons">
            	<a href="javascript:history.go(-1);">
                    <div id="back" class="header-menu-link" data-back="false">
                    </div>
                </a>
				<div class="header-menu-link" id="hmp-send">
                    <a class="sendBtn disable" onClick="doWeibaPost()" id="postbut" href="javascript:;">发布</a>
                </div>
            </div>
            <h1 class="hasback">
                发新帖
            </h1>
        </header>
      
      <div class="weibaPost">
      	<form method="post" action="<?php echo addons_url('Weiba://Wap/doPost');?>" id="doWeibaPost" onsubmit="doWeibaPost();return false;">
        <div class="navlist">
          <ul style="margin:0 0 10px">
             <li>
                <select style="color:#333" name="weiba_id" id="weiba_id" class="ts-select" >
                <option value="0">选择版块</option>
                <?php if(is_array($weibacate)): $i = 0; $__LIST__ = $weibacate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(empty($vo['weibalist']))continue; ?>
                <optgroup label="<?php echo ($vo["name"]); ?>" disabled><?php echo ($vo["name"]); ?></optgroup>
                    <?php if(is_array($vo["weibalist"])): $i = 0; $__LIST__ = $vo["weibalist"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wb): $mod = ($i % 2 );++$i;?><option <?php if($weiba_id == $wb['id']): ?>selected="selected"<?php endif; ?> value="<?php echo ($wb["id"]); ?>"><?php echo ($wb["weiba_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
             </li>
        	<!--
             <li>
                <select style="color:#333" name="tag_id" id="tag_id" class="ts-select">
                
                </select>
             </li>
             -->
         </ul>
      </div>
        
          <div class="pure-form send_box">
            <input type="text" id="title" name="title" class="ts-text" placeholder="填写标题，4-30个字符">
          </div>
          <div class="pure-form send_box">
          <textarea class="ts-textarea" name="content" id="post-content" rows="4" placeholder="填写文本，不少于10个字符"></textarea>
          </div>
          <div class="ts-footer">
              <!-- 表情 -->
              <!--<a class="icon facelistbutton ts-listen" data-listen="weibo-facelist-show"><i class="fa-btn fa-btn-smile"></i></a>
              -->
              <!-- 图片 -->
              <div class="upload_img_wrap">
                 <div class="controls">
                    <div class="upload_row muti_picture_row">
                        
                        <?php if(!empty($data[$field['name']])): $tempArr = explode(',',$data['img_ids']); for($i=0;$i<count($tempArr);$i++){ echo '<div class="img_item"><em>X</em><input type="hidden" name="img_ids[]" value="'.$tempArr[$i].'"/><img src="'.get_cover_url($tempArr[$i]).'"/></div>'; } endif; ?>
                        <a id="upload_picture" class="img_item add_btn" href="javascript:;"><img width="100%" src="/Public/Home/images/add.png"/></a>
                    </div>
                  </div>
              </div>
          </div>
          
        </form>
      </div>
    </div>
<script type="text/javascript" src="/Public/static/webuploader-0.1.5/webuploader.min.js"></script>


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
<script type="text/javascript">
h5Uploader('#upload_picture',2,'img_ids[]')
function h5Uploader(_this,num,name,callback){
    var count = num
    var uploader = WebUploader.create({
        // 设置文件上传域的name
        fileVal:'download',
        // 选完文件后，是否自动上传。
        auto: true,
        // swf文件路径
        swf: STATIC+"/webuploader-0.1.5/Uploader.swf",
        // 文件接收服务端。
        server: UPLOAD_PICTURE,
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick:{
            id:_this,
            multiple:true
        } ,
        //验证文件总数量
        fileNumLimit:count,
        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,png,bmp',
            mimeTypes: 'image/*'
        }
    });
    var uploadImgWidth = $('.muti_picture_row .img_item').width()-10;
    $('.webuploader-pick').height(uploadImgWidth).width(uploadImgWidth);
    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on( 'uploadSuccess', function( file,res ) {
        var src = res.url || ROOT + res.path;
        var $li = $('<div id="'+file.id+'" class="img_item"><em>X</em><input type="hidden" name="'+name+'" value="'+res.id+'"/><img src="'+src+'"/></div>'),
            $img = $li.find('img');
        if(res.status){

            count--
            $li.insertBefore($(_this));
            
        } else {
                $.Dialog.fail(res.info)
            }

             $('.muti_picture_row .img_item').height(uploadImgWidth).width(uploadImgWidth);
             $('.muti_picture_row .img_item em').click(function(){
            $(this).parent().remove();
                uploader.removeFile( file );
                count++
            })
        // $list为容器jQuery实例
        console.log(count)
        $( '#'+file.id ).addClass('upload-state-done');
        if(typeof callback == "function" ){

            callback()
        }
    });
    // 文件上传过程中创建进度条实时显示。
    uploader.on( 'uploadProgress', function( file, percentage ) {
        $.Dialog.loading();

    });
    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on( 'uploadComplete', function( file ) {
       	$.Dialog.close();
    });
    // 文件上传失败，显示上传出错。
    uploader.on( 'uploadError', function( file ) {
         $.Dialog.fail('上传失败')
    });
    // 文件上传失败，显示上传出错。
    uploader.on( 'error', function( type ) {
         console.log(type)
    });

    
}
function doWeibaPost(){
	var weiba_id = $('#weiba_id').val();
	var tag_id = $('#tag_id').val();
	var title = $.trim($('#title').val());
	var content = $.trim($('#post-content').val());
	var imageIds = '';
	$('.img_item input').each(function(i, el){
		imageIds = $(el).val()+','+imageIds;
		
	});

	if(!weiba_id || weiba_id=='0'){
		$.ui.showMask("请选择版块",true);
	}else if(!title){
		$.ui.showMask("标题不能为空!",true);
		$('#title').focus();
	}else if(!content){
		$.ui.showMask("内容不能为空!",true);
		$('#post-content').focus();
	}else if(content.length<10){
		$.ui.showMask("内容不能少于10个字符",true);
		$('#post-content').focus();
	}else{
		$.post($('#doWeibaPost').attr('action'), {
			weiba_id: weiba_id,
			tag_id: tag_id,
			title   : title,
			content : content,
			imageIds: imageIds
		}, function(data){
			if(data.status){
				$('#title').val('');
				$('#post-content').val('');
				$('#ts-upload-img-box').empty();
				$.ui.showMask('发布成功', true);
				setTimeout(function(){
					window.location.href = data.url;
				},2000)
			}else{
				$.ui.showMask(typeof data=='string'?data:data.info,true);
			}
			
		},'JSON');
	}
}
/*
function getTags(tagId){
	var url = U('getTagsByAjax');
	tag_id=tagId?tagId:0;
	weiba_id = $('select[name="weiba_id"]').val();
	$.post(url,{tag_id:tag_id,weiba_id:weiba_id},function(data){
		$('select[name="tag_id"]').html(data);
	});
}
getTags(<?php echo ($tag_id); ?>);
*/
</script>