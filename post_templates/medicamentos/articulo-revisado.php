<?php

	global $post, $med_info;

	if(count($med_info["md"]) > 0):
	?>
	<p>
	<i><small>Artículo revisado y aprobado por: </small></i> 
	<b><a href="<?php echo get_permalink($med_info["md"][0]["ID"]); ?>" target="_blank"><?php echo get_post_meta( $med_info["md"][0]["ID"], 'med_prefijo', true ) . " " . get_post_meta( $med_info["md"][0]["ID"], 'med_nombre', true ); ?></a></b>
    <i><small>Cédula: <?php echo get_post_meta( $med_info["md"][0]["ID"], 'med_cedula', true );?> </small></i>,
    <small>siguiendo la <a href="https://quefarmacia.com/fuentes-y-bibliografia/" target="_blank">politica editorial</a> - Última Actualización: <?php echo $med_info["mdf"]; ?></small></p>

	<?php else:?>
	<p>
		<i>
			<small>Artículo revisado y aprobado por <a href="https://quefarmacia.com/sobre-quefarmacia/" target="_blank">Nuestro equipo médico</a> siguiendo la <a href="https://quefarmacia.com/fuentes-y-bibliografia/" target="_blank">politica editorial</a><br />Última Actualización: <?php echo $med_info["mdf"]; ?>
			</small>
		</i>
	</p>

	<?php endif;?>