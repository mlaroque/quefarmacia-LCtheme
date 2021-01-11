<?php

  if (!function_exists('getDBConnection')) {
  //Obtener una conexión a base de datos
  function getDBConnection(){

      try {
        $conn = new PDO('mysql:host=localhost;dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
      }
      catch (PDOException $e) {
        echo '<p>ERROR: No se conecto a la base de datos..!</p>';
        exit;
      }
  
      return $conn;
  }
  }
	
	function get_image_by_value($val,$extension){
		return get_template_directory_uri() . "/images/" . $val . "." . $extension;
	}

	function replace_with_ids($m) {

      return replace_with_ids_h($m,"h2");
	}

  function replace_with_ids_h3($m) {

      return replace_with_ids_h($m,"h3");
  }

  function replace_with_ids_h($m, $heading){
      $id_text_tmp =  preg_replace("/<br\W*?\/>/", "\n", $m[2]);
      $id_text_tmp =  preg_replace( "/\r|\n/", "", $id_text_tmp );
      $id_text = strtolower(urlencode($id_text_tmp));
      $id_text = str_replace('%26%238211%3b', '', $id_text); // quitamos el guión - (en los casos donde si hay)
      $id_text = str_replace('++', '+', $id_text); //quitamos el doble +
             
      return "<".$heading." id='".$id_text."'>" . $id_text_tmp . "</".$heading.">";
  }


	class LCMN_Walker extends Walker_Nav_Menu {
    private $curItem;
	// Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
      $this->curItem = $item;
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;

      if($depth > 0){
      		$output .= "<li class='hidden subtoggle-".$item->menu_item_parent." " .  implode(" ", $item->classes) . "'>";
      }else{
      		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
      }
        
      //Add SPAN if no Permalink
      if( $permalink && $permalink != '#' ) {
      	$output .= '<a href="' . $permalink . '">';
      } else {
      	$output .= '<a onclick="menu_toggle('.$item->ID.');">';
      }
       
      $output .= $title;

      if( $description != '' && $depth == 0 ) {
      	$output .= '<small class="description">' . $description . '</small>';
      }


      $output .= '</a>';

    }

    function start_lvl(&$output, $item, $depth) {
        $output .= '<ul id="sub-'.$this->curItem->ID.'" class="sub-menu">';
    } 
	}


add_filter( 'wp_unique_post_slug', 'mg_unique_post_slug', 10, 6 );
 
  /**
   * Allow numeric slug
   *
   * @param string $slug The slug returned by wp_unique_post_slug().
   * @param int $post_ID The post ID that the slug belongs to.
   * @param string $post_status The status of post that the slug belongs to.
   * @param string $post_type The post_type of the post.
   * @param int $post_parent Post parent ID.
   * @param string $original_slug The requested slug, may or may not be unique.
   */
  function mg_unique_post_slug( $slug, $post_ID, $post_status, $post_type, $post_parent, $original_slug ) {
   global $wpdb;
   
  // don't change non-numeric values
   if ( ! is_numeric( $original_slug ) || $slug === $original_slug ) {
   return $slug;
   }
   
  // Was there any conflict or was a suffix added due to the preg_match() call in wp_unique_post_slug() ?
   $post_name_check = $wpdb->get_var( $wpdb->prepare(
   "SELECT post_name FROM $wpdb->posts WHERE post_name = %s AND post_type IN ( %s, 'attachment' ) AND ID != %d AND post_parent = %d   LIMIT 1",
   $original_slug, $post_type, $post_ID, $post_parent
   ) );
   
  // There really is a conflict due to an existing page so keep the modified slug
   if ( $post_name_check ) {
   return $slug;
   }
   
  // Return our numeric slug
   return $original_slug;
  }

/*Escape the dollar sign: useful when WP or PHP tries to translate it to a variable */
function escape_dollar($string_to_escape){
    return str_replace("$","$&#8205;",$string_to_escape);
}


?>