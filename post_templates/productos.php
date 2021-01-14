<?php 
global $post;  

//Recuperamos la información cacheada del medicamento
$prod_json = file_get_contents(get_template_directory_uri() . "/data/productos/".$post->ID.".json");
$prod_info = json_decode($prod_json, true);
$GLOBALS["med_info"] = $prod_info;

?>

<?php get_template_part("post_templates/productos/markup");?>

<div class="container">
	<div class="row">
		<div class="col-12">
				<?php get_template_part("post_templates/widgets/breadcrumbs");?>
			<p><img data-src="<?php echo $prod_info["i"];?>" class="lazy-img"></p>
			<p><?php get_template_part("post_templates/medicamentos/comparar-precios");?></p>
			<p><?php get_template_part("post_templates/productos/info-box");?></p>
			<p><?php get_template_part("post_templates/medicamentos/articulo-revisado");?></p>
			<p>Consulta a tu médico <b>siempre</b> / <b>NO</b> te automediques / Esta es una <b>Guía informativa</p>
			<div class="col-12 col-sm-4 float-left">
				<?php get_template_part("post_templates/widgets/indice-nested");?>
			</div>

			<?php get_template_part("post_templates/productos/post-content");?>
			<?php get_template_part("post_templates/medicamentos/boton-consultar-precios");?>
			<h3 class="text-center">Productos relacionados</h3>
			<?php get_template_part("post_templates/medicamentos/relacionados");?>
		</div>
	</div>
</div>


