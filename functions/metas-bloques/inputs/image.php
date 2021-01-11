		<?php global $name,$title,$post; ?>
		<?php $img_arr = wp_get_attachment_image_src(get_post_meta($post->ID, $name, true),'thumbnail'); ?>
		<label for="<?php echo $name;?>" class="metas-label lc_label"><?php echo $title;?></label>
		<img id="<?php echo $name;?>" src="<?php echo $img_arr[0]; ?>" >
		<input type="file" name="<?php echo $name;?>_file"  multiple="false" />
        	<input id="<?php echo $name;?>_name" type="hidden" value="<?php echo get_post_meta($post->ID, $name, true); ?>" name="<?php echo $name;?>">
        	<?php wp_nonce_field( $name.'_file', $name.'_file_nonce' ); ?>
        	<button type="button" onclick="document.getElementById('<?php echo $name;?>_name').value='0';document.getElementById('<?php echo $name;?>').removeAttribute('src');">Borrar</button>
       		 <br/><br/>