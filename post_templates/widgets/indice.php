<?php global $purified_content; global $post;?>
	<div class="indice shadow">
		<p><b>Indíce</b></p>
		<ul>
			<?php 
				if($post->post_type === "medicamentos"){
					preg_match_all('/<h3(.*?)>(.*?)<\/h3/s', $purified_content, $matches_global, PREG_PATTERN_ORDER);
				}else{
					preg_match_all('/<h2(.*?)>(.*?)<\/h2/s', $post->post_content, $matches_global, PREG_PATTERN_ORDER);
				}
				 
				 foreach($matches_global[2] as $match):
					
					$aux_match = $match;
					$aux_match = str_replace(' - ', ' ', $aux_match); // quitamos el guión (donde si lo hay)
					$id_text = strtolower(urlencode($aux_match));


			?>
				<li><a href="#<?php echo $id_text; ?>"><?php echo $match; ?></a></li>
			<?php endforeach; ?>

			</ul>
   	</div>
 <?php 
 		if($post->post_type === "medicamentos"){
 			$purified_content = preg_replace_callback("/<h3(.*?)>(.*?)(?=<\/h3>)/s","replace_with_ids_h3", $purified_content);
 		}else{
 			$purified_content = preg_replace_callback("/<h2(.*?)>(.*?)(?=<\/h2>)/s","replace_with_ids", $purified_content);
 		}
		

?>