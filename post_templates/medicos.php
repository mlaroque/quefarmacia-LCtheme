<?php 
global $post;  

//Recuperamos la información cacheada del medicamento
$med_json = file_get_contents(get_template_directory_uri() . "/data/medicamentos/".$post->ID.".json");
$med_info = json_decode($med_json, true);
$GLOBALS["med_info"] = $med_info;

?>

<?php get_template_part("post_templates/medicos/markup");?>

<div class="container">
	<div class="row">
		<div class="col-12">
				<?php get_template_part("post_templates/widgets/breadcrumbs");?>
			<p><img data-src="<?php echo $med_info["i"];?>" class="lazy-img"></p>
			<p><?php get_template_part("post_templates/medicos/especialidades");?></p>
			<p><?php get_template_part("post_templates/medicos/info-box");?></p>
			<p><?php get_template_part("post_templates/medicos/consultorios");?></p>
			<p><?php get_template_part("post_templates/medicos/hospitales");?></p>
			<p><?php get_template_part("post_templates/medicos/perfil");?></p>
		</div>
	</div>
</div>


