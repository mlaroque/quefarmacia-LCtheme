<?php global $galeria;?>

		<div class="galeria my-40">
			 <ul>	
				<?php foreach($galeria as $image):?>
					<li>
						<a href="<?php echo $image;?>" data-fslightbox="gallery1">
							<img data-src="<?php echo $image;?>" class="lazy-img">
						</a>
					</li>
				<?php endforeach;?>
			</ul>
			<div class="clearfix"></div>			 
		</div>

		<div class="clearfix"></div>

		<?php 
			wp_register_script('fslightbox', get_template_directory_uri() .'/js/fslightbox.js', null, false, true);
   	 		wp_enqueue_script('fslightbox');
		?>