<?php global $post; ?>
<?php $purified_content = apply_filters("the_content",$post->post_content); ?>
<?php $GLOBALS["purified_content"] = $purified_content; ?>
<?php get_header(); ?>
<?php 

if($post->post_type === "farmacias" && $post->post_parent > 0){
	get_template_part("post_templates/sucursales-farmacias");
}else{
	get_template_part("post_templates/" . $post->post_type);
}




?>
<?php get_footer(); ?>