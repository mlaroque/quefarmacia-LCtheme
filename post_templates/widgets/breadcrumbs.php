<?php global $post; ?>
<?php
	$listado_post = null;
	if($post->post_type === "escuela"){
    	$listado_post = get_post(91);
  	}
?>
<ol class="breadcrumb">
	<li><a href="https://invervisas.com/">Inicio</a></li>
	<?php if($listado_post): ?>
		<li><a href="<?php echo get_permalink($listado_post); ?>"><?php echo $listado_post->post_title;?></a></li>
	<?php endif;?>
	<?php if($post->post_parent > 0):?>
		<?php $post_parent = get_post($post->post_parent); ?>
		<li><a href="<?php echo get_permalink($post_parent); ?>"><?php echo $post_parent->post_title;?></a></li>
	<?php endif; ?>
	<li class="active"><?php echo $post->post_title; ?></li>
</ol>