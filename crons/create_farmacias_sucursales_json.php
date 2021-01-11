<?php

$json_txt = "[";
$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
require $path.'wp-load.php';

//Recuperar todas las farmacias padres con hijas

$args = array(
	'post_type' => 'farmacias',
	'post_status' => 'publish',
	'post_parent' => 0,
	'posts_per_page'=>-1
	);

$farmacias = get_posts($args);

foreach($farmacias as $farmacia){

	$json_txt .= '{"id":"' . $farmacia->ID . '","estados": [';

	$args = array(
    'post_type' => 'farmacias',
    'post_parent' => $farmacia->ID,
    'orderby' => 'title',
    'order' => 'ASC',
    'post_status' => 'publish',
    'posts_per_page'=>-1
    );

  $departamentos_posts = get_posts($args);

  $departamentos_posts_arr = array();
  foreach($departamentos_posts as $departamento_post){
      $tags = wp_get_post_tags($departamento_post->ID);

      foreach($tags as $tag){
          if(strpos($tag->name,"estado") !== false){
            $dep = ucfirst(preg_replace("/estado /", "", $tag->name,1));
            $tmp_arr = array();
            if(array_key_exists($dep,$departamentos_posts_arr)){
              $tmp_arr = $departamentos_posts_arr[$dep];
            }
            array_push($tmp_arr, $departamento_post);
            $departamentos_posts_arr[$dep] = $tmp_arr;
          }
      }
  }

  ksort($departamentos_posts_arr);

  foreach($departamentos_posts_arr as $departamento => $dep_posts){

  	$json_txt .= '{"estado" : "'.$departamento.'","sucursales": [';
  	foreach($dep_posts as $dep_post){
  		$json_txt .= '{"nombre": "'.$dep_post->post_title.'","slug": "'.$dep_post->post_name.'"},';
  	}

  	$json_txt = rtrim($json_txt,",");
  	$json_txt .= "]},";
  }
  $json_txt = rtrim($json_txt,",");
  $json_txt .= "]},";

}
$json_txt = rtrim($json_txt,",");
$json_txt .= "]";

$json_file = fopen(get_template_directory() . '/data/farmacias_sucursales.json', "w") or die("Unable to open file!");
fwrite($json_file, $json_txt);
fclose($json_file);
?>