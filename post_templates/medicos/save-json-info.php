<?php


	function save_post_in_json_file($post_med){
		global $wpdb;

	$json_txt = "{";

  //Imagen 
  $json_txt .= '"i":"' . wp_get_attachment_image_src(get_post_meta($post_med->ID, 'med_foto_url', true),'thumbnail')[0] . '",';

  //Obtener todas las metas
    $post_metas = get_post_meta($post_med_med->ID);
  $json_txt .= '"mt":[' . json_encode($post_metas) . '],';

 $med_univ_arr = array();
 $med_asoc_arr = array();
 $med_hospital_arr = array();
 $med_consult_arr = array();
 for($i=1;$i<=3;$i++){
    if(get_post_meta( $post_med->ID, 'med_univ'.$i, true ) !== ""){
        array_push($med_univ_arr, get_post_meta( $post_med->ID, 'med_univ'.$i, true ));
    }
    if(get_post_meta( $post_med->ID, 'med_asoc_medica'.$i, true ) !== ""){
        $args = array(
          'post_type' => 'asociaciones-medicas',
          'post_name__in' => array(get_post_meta( $post_med->ID, 'med_asoc_medica'.$i, true )),
          'posts_per_page' => -1
          );

        $asoc_posts = get_posts($args);

        foreach($asoc_posts as $asoc_post){

          $asoc_post = get_posts($args)[0];
          $med_asoc = new stdClass();
          $med_asoc->ID = $asoc_post->ID;
          $med_asoc->nombre = get_the_title($asoc_post->ID);
          $med_asoc->calle = get_post_meta( $asoc_post->ID, 'asoc_med_calle', true );
          $med_asoc->municipio = get_post_meta( $asoc_post->ID, 'asoc_med_municipio', true );
          $med_asoc->estado = get_post_meta( $asoc_post->ID, 'asoc_med_estado', true );
          $med_asoc->zip = get_post_meta( $asoc_post->ID, 'asoc_med_zip', true );
          $med_asoc->tel = get_post_meta( $asoc_post->ID, 'asoc_med_tel', true );
          $med_asoc->email = get_post_meta( $asoc_post->ID, 'asoc_med_email', true );
          array_push($med_asoc_arr, $med_asoc);
        }
    }
    if(get_post_meta( $post_med->ID, 'med_hospital'.$i, true ) !== ""){

        $args = array(
          'post_type' => 'clinicas-hospitales',
          'post_name__in' => array(get_post_meta( $post_med->ID, 'med_hospital'.$i, true )),
          'posts_per_page' => -1
          );
        $hosp_posts = get_posts($args);

        foreach($hosp_posts as $hosp_post){
          $med_hosp = new stdClass();
          $med_hosp->ID = $hosp_post->ID;
          $med_hosp->nombre = get_the_title($hosp_post->ID);
          $med_hosp->calle = get_post_meta( $hosp_post->ID, 'hosp_datos_calle', true );
          $med_hosp->municipio = get_post_meta( $hosp_post->ID, 'hosp_datos_municipio', true );
          $med_hosp->estado = get_post_meta( $hosp_post->ID, 'hosp_datos_estado', true );
          $med_hosp->zip = get_post_meta( $hosp_post->ID, 'hosp_datos_zip', true );
          $med_hosp->tel = get_post_meta( $hosp_post->ID, 'hosp_datos_tel', true );
          $med_hosp->email = get_post_meta( $hosp_post->ID, 'hosp_datos_email', true );
          array_push($med_hospital_arr, $med_hosp);
        }     

        
    }
    
    if(get_post_meta( $post_med->ID, 'med_priv_cons_nombre'.$i, true ) !== ""){

      $consultorio = new stdClass();
      $consultorio->nombre = get_post_meta( $post_med->ID, 'med_priv_cons_nombre'.$i, true );
      $consultorio->calle = get_post_meta( $post_med->ID, 'med_priv_cons_calle'.$i, true );
      $consultorio->municipio = get_post_meta( $post_med->ID, 'med_priv_cons_municipio'.$i, true );
      $consultorio->estado = get_post_meta( $post_med->ID, 'med_priv_cons_estado'.$i, true );
      $consultorio->zip = get_post_meta( $post_med->ID, 'med_priv_cons_zip'.$i, true );
      $consultorio->tel = get_post_meta( $post_med->ID, 'med_priv_cons_tel'.$i, true );
      $consultorio->fax = get_post_meta( $post_med->ID, 'med_priv_cons_fax'.$i, true );
      $consultorio->empleados = get_post_meta( $post_med->ID, 'med_priv_cons_empleados'.$i, true );
      $consultorio->embed_map = get_post_meta( $post_med->ID, 'med_priv_cons_embed_map'.$i, true );
      $consultorio->seguros = explode(",", get_post_meta( $post_med->ID, 'med_priv_cons_seguros'.$i, true ));
      $consultorio->tratamientos = explode(",", get_post_meta( $post_med->ID, 'med_priv_cons_tratamientos'.$i, true ));
      array_push($med_consult_arr, $consultorio);    

    }

 }
 $json_txt .= '"u":' . json_encode($med_univ_arr) . ',';
 $json_txt .= '"a":' . json_encode($med_asoc_arr) . ',';
 $json_txt .= '"h":' . json_encode($med_hospital_arr) . ',';
 $json_txt .= '"c":' . json_encode($med_consult_arr) . ',';

 $med_espec_arr = array();
 for($i=1;$i<=5;$i++){
    if(get_post_meta( $post_med->ID, 'med_espec_medica'.$i, true ) !== ""){

       $args = array(
          'post_type' => 'espec-medicas',
          'post_name__in' => array(get_post_meta( $post_med->ID, 'med_espec_medica'.$i, true )),
          'posts_per_page' => -1
          );
        $espec_med_posts = get_posts($args);

        foreach($espec_med_posts as $espec_med_post){

          $espec_med_post = get_posts($args)[0];
          $espec_med = new stdClass();
          $espec_med->ID = $espec_med_post->ID;
          $espec_med->nombre = get_the_title($espec_med_post->ID);
          $espec_med->desc = get_post_meta( $espec_med_post->ID, 'espec_med_desc'.$i, true );
          $espec_med->body = get_post_meta( $espec_med_post->ID, 'espec_med_body'.$i, true );
          array_push($med_espec_arr, $espec_med);
        }
    }
    
 }

 $json_txt .= '"e":' . json_encode($med_espec_arr) . ',';

  	//Cerrar json
	$json_txt .= "}";

	file_put_contents(get_template_directory() . '/data/medicos/'.$post_med_med->ID.'.json', $json_txt);
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