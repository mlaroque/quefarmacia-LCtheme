<?php global $amp_param; ?>
<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">ENCUENTRA OTRAS FARMACIAS:</h3>
        <hr>
    </div>
    <?php
   
    		$args = array( 
    			'post_type' => 'farmacias',
    			'posts_per_page'  => 4,
    			'orderby'        => 'rand',
                'post_parent' => 0
    			);

            $farmacias_relacionadas = get_posts($args);

            foreach($farmacias_relacionadas as $farmacia_relacionada):
    ?>
      	
    <div>
                    <a href="<?php echo esc_url(get_permalink($farmacia_relacionada->ID)); ?>">
        		          <img data-src="<?php echo get_the_post_thumbnail_url($farmacia_relacionada->ID);?>" class="lazy-img">
                    </a>
    </div>
    <?php endforeach;?>       
</div>   