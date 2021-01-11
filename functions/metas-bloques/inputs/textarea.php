		<?php global $name,$title,$placeholder,$help,$post; ?>
		<label for="<?php echo $name;?>" class="metas-label lc_label"><?php echo $title; ?></label>
		<p class="lc_form_help"><i><?php echo $help;?></i></p>
		<textarea name="<?php echo $name;?>" placeholder="<?php echo $placeholder;?>" id="<?php echo $name;?>" class="lc_textarea"><?php echo get_post_meta($post->ID, $name, true); ?></textarea>
		<br>