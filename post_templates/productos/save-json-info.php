<?php

	function save_post_in_json_file($post_med){
	global $wpdb;
	
	//Abrir json
	//$json_file = fopen(get_template_directory() . '/data/productos/'.$post_med->ID.'.json', "w") or die("Unable to open file!");
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
    $cat_slugs_str = "";

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

      $cat_slugs_str .= $category->slug . ",";
  	}

    foreach($med_posts as $med_post){
        unset_post_attr($med_post);
    }

  	$json_txt .= '"c":"' . rtrim($cat_str,",") . '",';
  	$json_txt .= '"md":' . json_encode($med_posts) . ',';

    //Productos relacionados
    $cat_slugs_str = rtrim($cat_slugs_str,',');

    $args = array(
        'post_type' => 'productos',
        'category_name' => $cat_slugs_str,
        'post_status' => 'publish',
        'posts_per_page' => 8,
        'post__not_in' => array($post_med->ID)
    );

    $related_posts = get_posts($args);

    if(count($related_posts) < 1){

         $cat_slugs_str = "";
         if($categories){
           foreach($categories as $postcategory){
              $cat_id_parent_str .= $postcategory->parent . ","; 
            }
          }
         
         $cat_id_parent_str = rtrim($cat_id_parent_str,',');
         $args = array(
             'post_type' => 'productos',
             'cat' => $cat_id_parent_str,
             'post_status' => 'publish',
             'posts_per_page' => 8,
             'post__not_in' => array($post_med->ID)
         );
         $related_posts = get_posts($args);

    }

    foreach($related_posts as $related_post){
        unset_post_attr($related_post);
    }

    $json_txt .= '"rl":' . json_encode($related_posts) . '';

  	//Cerrar json
	$json_txt .= "}";
  
	//fwrite($json_file, $json_txt);
	//fclose($json_file);
	file_put_contents(get_template_directory() . '/data/productos/'.$post_med->ID.'.json', $json_txt);
}


function unset_post_attr($unset_post,$include_att = array()){
      unset($unset_post->post_content);
      unset($unset_post->post_author);
      unset($unset_post->post_date);
      unset($unset_post->post_date_gmt);
      unset($unset_post->post_excerpt);
      unset($unset_post->post_status);
      unset($unset_post->comment_status);
      unset($unset_post->ping_status);
      unset($unset_post->post_password);
      unset($unset_post->to_ping);
      unset($unset_post->pinged);
      unset($unset_post->post_modified);
      unset($unset_post->post_modified_gmt);
      unset($unset_post->post_content_filtered);
      unset($unset_post->guid);
      unset($unset_post->menu_order);
      unset($unset_post->post_type);
      unset($unset_post->post_mime_type);
      unset($unset_post->comment_count);
      unset($unset_post->filter);
}

?>