<?php if (!defined('THINK_PATH')) exit();?><select name="<?php echo ($name); ?>">
	<option value="0" class="toggle-data" toggle-data="<?php echo ($first_option); ?>"><?php echo ($first_option); ?></option>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" class="toggle-data"
		toggle-data="<?php echo (get_hide_attr($vo)); ?>"
		<?php if(($default_value) == $key): ?>selected<?php endif; ?>
		><?php echo (clean_hide_attr($vo)); ?>
	</option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>