<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
require $path.'wp-load.php';

$args = array (
	'post_type' => 'productos',
	'posts_per_page' => -1,
	'post_status' => 'publish'
);

$post_medicamentos = get_posts($args);

get_template_part("post_templates/productos/save-json-info");

foreach($post_medicamentos as $post_med){

  save_post_in_json_file($post_med);

}


?>