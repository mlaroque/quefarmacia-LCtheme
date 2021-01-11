<?php /* Template Name: Portada */ ?>

<?php get_header(); ?>
 
   
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
			endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
		</div>
	</div>
</div>



<section id="">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center destinosTop">
				</div>
			 <?php
			    //Dichiarazione Loop Personalizzato
			    $args = array(
			        'post_type' => 'lacomuna',
			        'posts_per_page' => -1,	
			        'orderby' => 'menu_order date',
			        'order' => 'ASC'
			    );

			    $posts = get_posts($args);
			    $count = 0;
			    
			    //Esecuzione Loop Personalizzato

			    foreach($posts as $post_lacomuna):

			      $count = $count + 1;  
			?>
				<div class="col-12 col-sm-4 col-md-3 col-lg-3">
					<div class="destinos">
						<div class="destinos-img">
							<div class="destinos-title">
								<p><?php echo $post_lacomuna->post_title; ?></p>
							</div>
							<a href="<?php echo esc_url( get_permalink($post_lacomuna->ID)); ?>" class="list-item-thumb"><img src="<?php echo get_the_post_thumbnail_url($post_lacomuna->ID); ?>" />  </a>
						</div>
					</div>
				</div>

			<?php
				endforeach;
			?>   
			
				 
			</div>
		</div>
	</div>
</section>




<?php get_footer(); ?>