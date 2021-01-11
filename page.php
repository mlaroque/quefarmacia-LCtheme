<?php get_header(); global $post; $descarga_id = $_GET["id"]; $info_post_title = $_GET["pi"]; $min = $_GET["min"]; $purified_content = apply_filters("the_content",$post->post_content);?>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <?php get_template_part("post_templates/widgets/breadcrumbs"); ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1><?php echo $post->post_title; ?></h1>
    </div>
  </div>
</div>



<div class="container">
	<div class="row">
		<div class="col-12">
			<?php echo $purified_content; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>