<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
require $path.'wp-load.php';

global $wpdb;

$results = $wpdb->get_results("SELECT ID, NAME FROM PRODUCTS where name != '' ORDER BY NAME ");

$json_file = get_template_directory() . '/data/buscador/precios.json';

$myfile = fopen($json_file , "w") or die("Unable to open file precios.json!");
$txt = "[";

foreach ( $results as $result ) 
{
	
	$txt .= "{";
	$txt .= '"n": "'. str_replace("/"," / ",$result->NAME) .'", ';
	$txt .= '"id": "'. $result->ID.'"';
	$txt .= "},";
}

$results = $wpdb->get_results("SELECT NAME AS NAME FROM COMPONENT_1W WHERE NAME NOT LIKE '%,%' AND NAME NOT LIKE '% ' AND NAME NOT LIKE '%MEDI%' ORDER BY NAME");

foreach ( $results as $result ) 
{
	$txt .= "{";
	$txt .= '"n":"'. $result->NAME .' (Todos)",';
	$txt .= '"id": "-1"';
	$txt .= "},";
}

$results = $wpdb->get_results("SELECT NAME AS NAME FROM COMPONENT_2W WHERE NAME NOT LIKE '%,%' AND NAME NOT LIKE '% ' AND NAME NOT LIKE '%MEDI%' ORDER BY NAME");

foreach ( $results as $result ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $result->NAME .'", ';
	$txt .= '"id": "-1"';
	$txt .= "},";
}

$results = $wpdb->get_results("SELECT MAX(NAME) AS NAME FROM COMPONENT_COMP_W WHERE NAME NOT LIKE '%,%' AND NAME NOT LIKE '% ' AND NAME NOT LIKE '%MEDI%' GROUP BY SUBSTRING_INDEX(`name`, ' ', 3) ORDER BY MAX(NAME)");

foreach ( $results as $result ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $result->NAME .'", ';
	$txt .= '"id": "-1"';
	$txt .= "},";
}

$results = $wpdb->get_results("SELECT NOMBRE,ALIASES FROM ANALISIS_PRECIOS ORDER BY NOMBRE");

foreach ( $results as $result ) 
{

	$aliases_arr = explode(",", $result->ALIASES);

	if(count($aliases_arr) > 0){

		foreach($aliases_arr as $alias){
			$txt .= "{";
			$txt .= '"n": "'. $alias .' - Estudio Clínico", ';
			$txt .= '"a": "Prueba de ", ';
			$txt .= '"id": "-1"';
			$txt .= "},";			
		}
	}

	$txt .= "{";
	$txt .= '"n": "'. $result->NOMBRE .' - Estudio Clínico", ';
	$txt .= '"id": "-1"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

fwrite($myfile, $txt);
fclose($myfile);

$txt = "";
$args = array (
		'post_type' => array( 'medicamentos', 'productos'),
		'posts_per_page'=>-1,
		'order' => 'ASC',
		'orderby' => 'title'
	);

$med_posts = get_posts($args);

$txt = "[";


foreach ( $med_posts as $med_post ) 
{
	$txt .= "{";
	$txt .= '"n": "med|'. $med_post->post_title . '",';
	$txt .= '"id": "'. $med_post->ID . '"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

$json_file = get_template_directory() . '/data/buscador/meds.json';

$myfile = fopen($json_file , "w") or die("Unable to open file meds.json!");
fwrite($myfile, $txt);
fclose($myfile);

$txt = "";
$args = array (
		'post_type' => 'medicamento-remedios',
		'posts_per_page'=>-1,
		'order' => 'ASC',
		'orderby' => 'title'
	);

$enf_posts = get_posts($args);

$txt = "[";


foreach ( $enf_posts as $enf_post ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $enf_post->post_title . '",';
	$txt .= '"id": "'. $enf_post->ID . '"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

$json_file = get_template_directory() . '/data/buscador/enf.json';

$myfile = fopen($json_file , "w") or die("Unable to open file enf.json!");
fwrite($myfile, $txt);
fclose($myfile);

$txt = "";
$args = array (
		'post_type' => 'analisis-y-estudios',
		'posts_per_page'=>-1,
		'order' => 'ASC',
		'orderby' => 'title'
	);

$analisis_posts = get_posts($args);

$txt = "[";


foreach ( $analisis_posts as $analisis_post ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $analisis_post->post_title . '",';
	$txt .= '"id": "'. $analisis_post->ID . '"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

$json_file = get_template_directory() . '/data/buscador/analisis.json';

$myfile = fopen($json_file , "w") or die("Unable to open file analisis.json!");
fwrite($myfile, $txt);
fclose($myfile);


/* //// laboratorios //// */

$txt = "";
$args = array (
		'post_type' => 'laboratorios',
		'posts_per_page'=>-1,
		'order' => 'ASC',
		'orderby' => 'title'
	);

$laboratorios = get_posts($args);

$txt = "[";


foreach ( $laboratorios as $laboratorio ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $laboratorio->post_title . '",';
	$txt .= '"id": "'. $laboratorio->ID . '"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

$json_file = get_template_directory() . '/data/buscador/labs.json';

$myfile = fopen($json_file , "w") or die("Unable to open file se_list_laboratorios.json!");
fwrite($myfile, $txt);
fclose($myfile);
/*  //////////// */


/* //// farmacias //// */

$txt = "";
$args = array (
		'post_type' => 'farmacias',
		'posts_per_page'=>-1,
		'order' => 'ASC',
		'orderby' => 'title'
	);

$farmacias_posts = get_posts($args);

$txt = "[";


foreach ( $farmacias_posts as $farmacia ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $farmacia->post_title . '",';
	$txt .= '"id": "'. $farmacia->ID . '"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

$json_file = get_template_directory() . '/data/buscador/farmacias.json';

$myfile = fopen($json_file , "w") or die("Unable to open file se_list_farmacias.json!");
fwrite($myfile, $txt);
fclose($myfile);
/*  //////////// */

/* //// medicos //// */

$txt = "";
$args = array (
		'post_type' => 'medicos',
		'posts_per_page'=>-1,
		'order' => 'ASC',
		'orderby' => 'title'
	);

$medicos_posts = get_posts($args);

$txt = "[";


foreach ( $medicos_posts as $medico ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $medico->post_title . '",';
	$txt .= '"id": "'. $medico->ID . '"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

$json_file = get_template_directory() . '/data/buscador/medicos.json';

$myfile = fopen($json_file , "w") or die("Unable to open file medicos.json!");
fwrite($myfile, $txt);
fclose($myfile);
/*  //////////// */

/* //// clinicas-hospitales //// */
$txt = "";
$args = array (
		'post_type' => 'clinicas-hospitales',
		'posts_per_page'=>-1,
		'order' => 'ASC',
		'orderby' => 'title'
	);

$clinicas_posts = get_posts($args);

$txt = "[";


foreach ( $clinicas_posts as $clinica ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $clinica->post_title . '",';
	$txt .= '"id": "'. $clinica->ID . '"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

$json_file = get_template_directory() . '/data/buscador/clinicas.json';

$myfile = fopen($json_file , "w") or die("Unable to open file se_list_clinicas_hospitales.json!");
fwrite($myfile, $txt);
fclose($myfile);
/*  //////////// */

/* //// asociaciones-medicas //// */
$txt = "";
$args = array (
		'post_type' => 'asociaciones-medicas',
		'posts_per_page'=>-1,
		'order' => 'ASC',
		'orderby' => 'title'
	);

$asocionaciones_posts = get_posts($args);

$txt = "[";


foreach ( $asocionaciones_posts as $asociacion ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $asociacion->post_title . '",';
	$txt .= '"id": "'. $asociacion->ID . '"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

$json_file = get_template_directory() . '/data/buscador/asociaciones.json';

$myfile = fopen($json_file , "w") or die("Unable to open file se_list_asociaciones.json!");
fwrite($myfile, $txt);
fclose($myfile);
/*  //////////// */


/* //// espec-medicas //// */
$txt = "";
$args = array (
		'post_type' => 'espec-medicas',
		'posts_per_page'=>-1,
		'order' => 'ASC',
		'orderby' => 'title'
	);

$especialidades_posts = get_posts($args);

$txt = "[";


foreach ( $especialidades_posts as $especialidad ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $especialidad->post_title . '",';
	$txt .= '"id": "'. $especialidad->ID . '"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

$json_file = get_template_directory() . '/data/buscador/especialidades.json';

$myfile = fopen($json_file , "w") or die("Unable to open file especialidades.json!");
fwrite($myfile, $txt);
fclose($myfile);
/*  //////////// */


/* //// cronicas //// */
$txt = "";
$args = array (
		'post_type' => 'cronicas',
		'posts_per_page'=>-1,
		'order' => 'ASC',
		'orderby' => 'title'
	);

$cronicas_posts = get_posts($args);

$txt = "[";


foreach ( $cronicas_posts as $cronica ) 
{
	$txt .= "{";
	$txt .= '"n": "'. $cronica->post_title . '",';
	$txt .= '"id": "'. $cronica->ID . '"';
	$txt .= "},";
}

$txt = rtrim($txt, ",");
$txt .= "]";

$json_file = get_template_directory() . '/data/buscador/cronicas.json';

$myfile = fopen($json_file , "w") or die("Unable to open file se_list_cronicas.json!");
fwrite($myfile, $txt);
fclose($myfile);
/*  //////////// */



echo "ok";
?>