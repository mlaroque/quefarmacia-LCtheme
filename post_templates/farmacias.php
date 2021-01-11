<?php 
global $post;  ?>
<?php get_template_part("post_templates/farmacias/markup");?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<?php get_template_part("post_templates/widgets/breadcrumbs");?>
			<div class="col-12 col-sm-4 float-left">
				<?php get_template_part("post_templates/widgets/indice");?>
				<?php get_template_part("post_templates/farmacias/articulo-revisado");?>
			</div>
			<div class="col-12 col-sm-4 float-left">
			<?php get_template_part("post_templates/farmacias/info-box");?>
			</div>
			<?php get_template_part("post_templates/farmacias/post-content");?>
			<?php get_template_part("post_templates/farmacias/listado-sucursales");?>
			<?php get_template_part("post_templates/farmacias/otras-farmacias");?>
			<?php get_template_part("post_templates/farmacias/enfermedades-comunes");?>
		</div>
	</div>
</div>


