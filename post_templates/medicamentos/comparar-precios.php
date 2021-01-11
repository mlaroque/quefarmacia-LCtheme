<?php

global $post, $med_info;


?>

<p>PRECIO DESDE</p>
<p>$<?php echo $med_info["p"];?></p>
<p><a href="/precios/<?php echo str_replace(" ", "%20", $post->post_title) ;?>/" target="_blank">COMPARAR PRECIO</a></p>