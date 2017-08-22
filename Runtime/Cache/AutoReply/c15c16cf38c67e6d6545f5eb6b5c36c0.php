<?php if (!defined('THINK_PATH')) exit();?><div class="appmsg_area" id="appmsg_area_<?php echo ($name); ?>">
    <input type="hidden" name="<?php echo ($name); ?>" value="<?php echo ($value); ?>"/>
    <a class="select_appmsg" href="javascript:;" onClick="$.WeiPHP.openSelectAppMsg('<?php echo U('Home/Material/material_data');?>',selectAppMsgCallback)">选择图文</a>
    <div class="appmsg_wrap">
      <?php if($count==1): ?><!-- 单图文 -->
            <div class="appmsg_item">
                <h6><?php echo ($main["title"]); ?></h6>
                <p class="title"><?php echo (time_format($main["cTime"])); ?></p>
                <div class="main_img">
                    <img src="<?php echo (get_cover_url($main["cover_id"])); ?>"/>
                </div>
                <p class="desc"><?php echo ($main["intro"]); ?></p>
            </div>  
        <?php else: ?>
        <!-- 多图文 -->
            <div class="appmsg_item">
                <p class="title"><?php echo (time_format($main["cTime"])); ?></p>
                <div class="main_img">
                    <img src="<?php echo (get_cover_url($main["cover_id"])); ?>"/>
                    <h6><?php echo ($main["title"]); ?></h6>
                </div>
                <p class="desc"><?php echo ($main["intro"]); ?></p>
            </div>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class="appmsg_sub_item">
                <p class="title"><?php echo ($vv["title"]); ?></p>
                <div class="main_img">
                    <img src="<?php echo (get_cover_url($vv["cover_id"])); ?>"/>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>  
        <div class="hover_area"></div>  
    </div>
    <a class="delete" href="javascript:;">删除</a>
</div>

 <script type="text/javascript">
$('.msg_tab .appmsg').click(function(){
	//图文消息
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('appmsg');
	$('#appmsg_area_<?php echo ($name); ?>').show().siblings().hide();
})
$('.appmsg_area .delete').click(function(){
	$('.appmsg_wrap').html('').hide();
	$('.select_appmsg').show();
	$('.appmsg_area .delete').hide();
	$('input[name="<?php echo ($name); ?>"]').val(0);
})
function selectAppMsgCallback(_this){
	$('.appmsg_wrap').html($(_this).html()).show();
	$('.select_appmsg').hide();
	$('.appmsg_area .delete').show();
	$('input[name="<?php echo ($name); ?>"]').val($(_this).data('id'));
	$.Dialog.close();
}
$(function(){
	var val = $('input[name="<?php echo ($name); ?>"]').val();
	if(val!=''){
		$('.appmsg_wrap').show();
		$('.select_appmsg').hide();
		$('.appmsg_area .delete').show();
	}else{
		$('.appmsg_wrap').hide();
		$('.select_appmsg').show();
		$('.appmsg_area .delete').hide();		
	}
})
</script>