<?php

  global $amp_param;

  $args = array(
    'post_type' => 'medicamento-remedios',
    'posts_per_page' => 9,
    'orderby' => 'rand'
    );

  $padecimientos = get_posts($args);

?>

<div>
<h3 class="text-center">GUIA DE PADECIMIENTOS MÁS COMUNES</h3>

<?php foreach($padecimientos as $padecimiento): ?>
 <div >

    <a href="<?php echo get_permalink($padecimiento->ID); ?>">
    <div>
      <img data-src="<?php echo get_the_post_thumbnail_url($padecimiento->ID, 'medium');?>" class="lazy-img">
    </div>

    <div>
      <p><?php echo $padecimiento->post_title; ?></p>
    </div>
    </a>
  </div>
<?php endforeach;?>
<p class="text-center"><a class="btn btn-naranja" href="https://quefarmacia.com/padecimientos-y-sintomas/">Más remedios para tu padecimiento</a></p>

</div>