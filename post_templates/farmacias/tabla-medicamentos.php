<?php

global $post;

?>
<div>
<table>
  <thead>
  <tr>
    <th>PRODUCTO</th>
    <th>PRECIO</th>
  </tr> 
  </thead>
  <tbody>
    <?php for($i=1;$i<=10;$i++): ?>
     <?php $str_without_dollar = str_replace('$', '', get_post_meta( $post->ID, 'farma_precios_precio'.$i, true) ); ?>
    <tr>
      <td data-th="PRODUCTO"><a href="<?php echo get_post_meta( $post->ID, 'farma_precios_enlace_producto'.$i, true );?>"><?php echo get_post_meta( $post->ID, 'farma_precios_producto'.$i, true );?></a></td>
      <td data-th="PRECIO"><a href="<?php echo get_post_meta( $post->ID, 'farma_precios_enlace_precios'.$i, true );?>"><?php echo '$ '.strval($str_without_dollar); ?></a></td>
    </tr>
  <?php endfor; ?>
  </tbody>
</table>
</div>
<div class="clearfix"></div>

<?php
  if( get_post_status(10957) == 'publish' ){ // LP de precios
    echo get_template_part('includes/template','boton-consultar-precios');
  }
?>

<div class="clearfix"></div>
<div>*  Precios obtenidos por el equipo de quefarmacia.com en consulta telefónica o tienda en línea a finales del 2019. Los precios pueden variar en el tiempo y por sucursal. Para obtener el precio actual, acude a tu sucursal más cercana.</div>