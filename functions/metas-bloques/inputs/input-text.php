	<?php global $name,$title,$placeholder,$help,$post; ?>
	<label for="<?php echo $name;?>" class="metas-label lc_label"><?php echo $title;?></label>
	<?php if($help !== ""): ?>
		<p class="lc_form_help"><i><?php echo $help; ?></i></p>
	<?php endif; ?>
	<input id="<?php echo $name;?>" type="text" class="metas-input-txt lc_input" value="<?php echo get_post_meta($post->ID, $name, true); ?>" name="<?php echo $name;?>" placeholder="<?php echo $placeholder;?>">
	<br/>
