		<?php global $name,$title,$default_value,$options,$post; ?>
		<label for="<?php echo $name;?>" class="metas-label lc_label"><?php echo $title;?></label>
		<?php $elem = get_post_meta($post->ID, $name, true); ?>
		<select name="<?php echo $name;?>" id="<?php echo $name;?>" class="lc_select">
			<option value="" selected="selected">---Selecciona <?php echo $default_value; ?>---</option>
			<?php foreach($options as $option):?>
				<option value="<?php echo $option[0];?>" <?php if($elem === $option[0]){ echo 'selected="selected"'; } ?>><?php echo $option[1];?></option>
			<?php endforeach;?>
		</select>
		<br/><br/>