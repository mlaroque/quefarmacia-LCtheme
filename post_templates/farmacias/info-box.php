<?php

global $stars;
global $post;
global $amp_param;

$current_post = $post;
if($post->post_parent > 0){
  $current_post = get_post($post->post_parent);
}
?>

<div>
    <div class="row"> 
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
          <p><center><img src="<?php echo get_the_post_thumbnail_url($current_post->ID, 'medium'); ?>"></center></p>
      </div>
    </div>

    <div class="row"> 
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <p>Teléfono:  <?php echo get_post_meta($current_post->ID, 'farma_tel', true);?></p>
        </div>
      </div>
    </div>

  
    <div class="row"> 
      <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <p>Servicio a domicilio:</p>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <h4>
        <?php $farma_domicilio = get_post_meta($current_post->ID, 'farma_servicio_domicilio', true);?>
          <img src="<?php echo get_check_image($farma_domicilio);?>" alt="<?php echo $farma_domicilio; ?>"> 
        </h4>
      </div>
    </div>


     <div class="row"> 
      <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <p>En Horario:</p>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <p>
          <?php echo get_post_meta($current_post->ID, 'farma_en_horario', true);?> 
        </p>
      </div>
    </div>

   <div class="row marPad0"> 
      <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 brdr upper">
        <p>Tienda en Línea:</p>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 brdr upper qfLABboxInfooYN">
        <h4>
          <?php $tienda_linea = get_post_meta($current_post->ID, 'farma_tienda_linea', true);?>
            <img src="<?php echo get_check_image($tienda_linea);?>" alt="<?php echo $tienda_linea; ?>">  
        
        </h4>
      </div>
    </div>


<?php $entregas_nacionales = get_post_meta($current_post->ID, 'farma_entregas_nacionales', true);?>
     <div class="row marPad0"> 
      <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <p>Entregas Nacionales:</p>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <h4>
            <img src="<?php echo get_check_image($entregas_nacionales);?>" alt="<?php echo $entregas_nacionales; ?>">   
        </h4>
      </div>
    </div>




  <?php $consultorio_medico = get_post_meta($current_post->ID, 'farma_consultorio_medico', true);?>
     <div class="row marPad0"> 
      <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <p>Consultorio Médico:</p>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <h4>
            <img src="<?php echo get_check_image($consultorio_medico);?>" alt="<?php echo $consultorio_medico; ?>"> 
        </h4>
      </div>
    </div>


  <?php $farma_24h = get_post_meta($current_post->ID, 'farma_24_horas', true);?>
    <div class="row marPad0"> 
      <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <p>Farmacia 24 horas:</p>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <h4>
            <img src="<?php echo get_check_image($farma_24h);?>" alt="<?php echo $farma_24h; ?>">
        </h4>
      </div>
    </div>




 <?php $genericos = get_post_meta($current_post->ID, 'farma_genericos', true);?>
    <div class="row marPad0"> 
      <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <p>Genéricos:</p>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <h4>
          <img src="<?php echo get_check_image($genericos);?>" alt="<?php echo $genericos; ?>"> 
        </h4>
      </div>
    </div>

 <?php $marcas_patentes = get_post_meta($current_post->ID, 'farma_marcas_patentes', true);?>
    <div class="row marPad0"> 
      <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <p>Marcas y Patentes: </p>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <h4>
            <img src="<?php echo get_check_image($marcas_patentes);?>" alt="<?php echo $marcas_patentes; ?>"> 
        </h4>
      </div>
    </div>
    
    <div class="row marPad0"> 
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <small><i>* puede variar por sucursal</i> -  <a href="<?php echo get_post_meta($current_post->ID, 'farma_web', true);?>" target="_blank">Página Oficial </a></small>    
      </div>
    </div>
  </div>

<?php

function get_check_image($answer){

  if($answer === "si"){
      return get_stylesheet_directory_uri() . "/images/yes.png";
  }else if($answer === "no"){
      return get_stylesheet_directory_uri() . "/images/no.png";
  }

}

  ?>