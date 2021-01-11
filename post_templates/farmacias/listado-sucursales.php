<?php

wp_register_script( 'sucursales-listado', 
      get_stylesheet_directory_uri() . '/js/farmacias-sucursales-listado.js', array('jquery'), null, true );
wp_enqueue_script( 'sucursales-listado' );

$post_parent = 0;
$post_parent_slug = "";

if($post->post_parent > 0){
  $post_id = $post->post_parent;
  $post_parent = $post->post_parent;
  $post_parent_obj = get_post($post->post_parent);
  $post_parent_slug = $post_parent_obj->post_name;
}else{
  $post_id = $post->ID;
  $post_parent = $post->ID;
  $post_parent_slug = $post->post_name;
}

  $sucursales_json = file_get_contents(get_template_directory_uri() . "/data/farmacias_sucursales.json");
  $sucursales = json_decode($sucursales_json, true);

  foreach($sucursales as $suc){

    if($suc["id"] == $post_id){
        foreach($suc["estados"] as $estado){
            $GLOBALS["accordion_btn_text"] = $estado["estado"];
                ob_start();?>
                <?php foreach($estado["sucursales"] as $s):?>
                  <p><a href="<?php echo get_permalink($post_id) . $s["slug"];?>"><?php echo $s["nombre"];?></a></p>
      <?php endforeach;?>
    <?php $GLOBALS["accordion_content"] = ob_get_clean();
    $GLOBALS["accordion_id"] = str_replace(" ","-",$estado["estado"]);
    get_template_part("post_templates/widgets/accordion");

        }
    }

  }

?>