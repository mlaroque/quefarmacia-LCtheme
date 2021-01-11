		<?php global $name,$title,$default_value,$options,$post; ?>
		<label for="<?php echo $name;?>" class="metas-label lc_label"><?php echo $title;?></label>
		<p class="lc_form_help"><i>Selecciona varios presionando la tecla Ctrl</i></p>
		<?php $elem = get_post_meta($post->ID, $name, true); ?>
		<select multiple name="<?php echo $name;?>[]" id="<?php echo $name;?>" class="lc_select_multi"  style="height:200px">
			<?php foreach($options as $option):?>
				<option value="<?php echo $option[0];?>" <?php if(strpos($elem,$option[0]) !== false){ echo 'selected="selected"'; } ?>><?php echo $option[1];?></option>
			<?php endforeach;?>
		</select>
		<br/><br/>