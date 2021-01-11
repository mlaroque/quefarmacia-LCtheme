<?php global $purified_content ;?>


<?php
	/* AQUI INSERTAMOS BLOQUES/ANUNCIOS EN EL CONTENIDO CON REGEX */

	/* H2 de precios: ad y tabla de medicamentos */
	ob_start();?><div id="ad_1ero_h2" class="lc_ads lc_ads_responsive lazy-ads"></div><?php $ad_1er_h2 = ob_get_clean();
	ob_start(); get_template_part("post_templates/farmacias/tabla-medicamentos"); $tabla_medicamentos = ob_get_clean();
	$purified_content = preg_replace("/<h2(.*?)>(.*?)recio(?!s)(.*?)<\/h2>/","<h2$1>$2recio$3</h2>" . $ad_1er_h2 .  $tabla_medicamentos,$purified_content);

	/* H2 de Teléfonos: ad */
	ob_start();?><div id="ad_4to_h2" class="lc_ads lc_ads_responsive lazy-ads"></div><?php $ad_4to_h2 = ob_get_clean();
	$purified_content = preg_replace("/<h2(.*?)>(.*?)fonos(?!s)(.*?)<\/h2>/","<h2$1>$2fonos$3</h2>" . $ad_4to_h2,$purified_content);

?>


<?php echo $purified_content; ?>