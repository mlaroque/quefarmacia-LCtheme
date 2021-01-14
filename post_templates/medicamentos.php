<?php 
global $post;  

//Recuperamos la información cacheada del medicamento
$med_json = file_get_contents(get_template_directory_uri() . "/data/medicamentos/".$post->ID.".json");
$med_info = json_decode($med_json, true);
$GLOBALS["med_info"] = $med_info;

?>

<?php get_template_part("post_templates/medicamentos/markup");?>

<div class="container">
	<div class="row">
		<div class="col-12">
				<?php get_template_part("post_templates/widgets/breadcrumbs");?>
			<p><img data-src="<?php echo $med_info["i"];?>" class="lazy-img"></p>
			<p><?php get_template_part("post_templates/medicamentos/comparar-precios");?></p>
			<p><?php get_template_part("post_templates/medicamentos/info-box");?></p>
			<p><?php get_template_part("post_templates/medicamentos/articulo-revisado");?></p>
			<p>Consulta a tu médico <b>siempre</b> / <b>NO</b> te automediques / Esta es una <b>Guía informativa</p>
			<div class="col-12 col-sm-4 float-left">
				<?php get_template_part("post_templates/widgets/indice");?>
			</div>

			<?php get_template_part("post_templates/medicamentos/post-content");?>
			<?php get_template_part("post_templates/medicamentos/boton-consultar-precios");?>
			<?php get_template_part("post_templates/medicamentos/donde-comprar");?>
			<h3 class="text-center">Medicamentos relacionados</h3>
			<?php get_template_part("post_templates/medicamentos/relacionados");?>
		</div>
	</div>
</div>


