<?php global $purified_content ;?>


<?php
	/* AQUI INSERTAMOS BLOQUES/ANUNCIOS EN EL CONTENIDO CON REGEX */
	/* COMMENT: Experimento Quitar precios */
    preg_match_all('/<a.* href="\/precios.*">VER PRECIOS DE.*<\/a>/',$purified_content, $matches);
    foreach( $matches as $match){
      $purified_content = preg_replace('/<a.* href="\/precios.*">VER PRECIOS DE.*<\/a>/', "", $purified_content);
    }
    preg_match_all('/<p><strong>Su precio.*<\/strong><\/p>/', $purified_content, $m);
    foreach($m as $match){
      $purified_content = preg_replace('/<p><strong>Su precio.*<\/strong><\/p>/',"", $purified_content);
    }
    $purified_content = preg_replace('/\[boton(.*)\]/',"", $purified_content);
    /* //////// Experimento Quitar precios //////// */
?>


<?php echo $purified_content; ?>