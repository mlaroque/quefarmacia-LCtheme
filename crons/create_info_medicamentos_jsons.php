<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
require $path.'wp-load.php';
global $wpdb;

$args = array (
	'post_type' => 'medicamentos',
	'posts_per_page' => -1,
	'post_status' => 'publish'
);

$post_medicamentos = get_posts($args);

foreach($post_medicamentos as $post_med){

	//Abrir json
	$json_file = fopen(get_template_directory() . '/data/medicamentos/'.$post_med->ID.'.json', "w") or die("Unable to open file!");
	$json_txt = "{";

	//Precio minimo del medicamento
	$json_price = "";
	$results = $wpdb->get_results("SELECT PRICE FROM PRODUCTS WHERE NAME like '%".$post_med->post_title."%' AND CAST(PRICE AS DECIMAL(10,2)) > 0");
	$product_price_number = 0;
	$product_price_arr = array();
	foreach ( $results as $result ) 
	    {
	        $product_price = $result->PRICE;
	        $product_price = str_replace(",", "",$product_price);
	        $product_price_number = floatval($product_price);
	        array_push($product_price_arr, $product_price_number);
	    }

	if(count($product_price_arr) > 0){
      $json_price = min($product_price_arr);
  	}

  	$json_txt .= '"p":"' . $json_price . '",';

  	//URL de Imagen del medicamento
  	$json_txt .= '"i":"' . get_the_post_thumbnail_url($post_med->ID) . '",';

  	//Fecha de publicación del medicamento
  	$json_txt .= '"pd":"' . get_the_date('',$post_med->ID) . '",';

  	//Fecha de última modificación
  	$json_txt .= '"mdf":"' . get_the_modified_date('',$post_med->ID) . '",';

  	//Obtener todas las metas
  	$post_metas = get_post_meta($post_med->ID);
	$json_txt .= '"mt":[' . json_encode($post_metas) . '],';

	//Recuperar los médicos asociados
	$doctor_name = get_post_meta($post_med->ID, 'med_doctor_resp', true);
	$args = array(
            'post_type' => 'medicos',
            'posts_per_page'=>-1,
            'post_name__in' => [''.$doctor_name.'']
            );

    $med_posts = get_posts($args);

	//Armar las categorias en un string separado por comas
	 $categories = get_the_category($post_med->ID);

  	$cat_str = "";

  	foreach($categories as $category){

      //De momento, ponemos a Rubén en todos los posts de úlceras, gastritis, colitis y acidez estomacal
      if(count($med_posts) === 0 && ($category->term_id === 148 || $category->term_id === 110 || $category->term_id === 156 || $category->term_id === 109)){
          $medpost = get_post(5058);
          array_push($med_posts, $medpost);
      }

      if(strpos($category->name,"ara ") !== false){
        $categ_str = str_replace("Para el ","",$category->name);
        $categ_str = str_replace("Para la ","",$categ_str);
        $categ_str = str_replace("Para los ","",$categ_str);
        $categ_str = str_replace("Para las ","",$categ_str);
        $categ_str = str_replace("para el ","",$categ_str);
        $categ_str = str_replace("para la ","",$categ_str);
        $categ_str = str_replace("para los ","",$categ_str);
        $categ_str = str_replace("para las ","",$categ_str);
        $categ_str = str_replace("para ","",$categ_str);
        $categ_str = str_replace("Para ","",$categ_str);
        $cat_str .=  $categ_str . ',';
      }

  	}

  	$json_txt .= '"c":"' . rtrim($cat_str,",") . '",';
  	$json_txt .= '"md":' . json_encode($med_posts) . '';


  	//Cerrar json
	$json_txt .= "}";
	fwrite($json_file, $json_txt);
	fclose($json_file);

	}




?>