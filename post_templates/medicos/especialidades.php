<?php 
	global $med_info;
    $especialidades = "";
    foreach($med_info["e"] as $med_espec){
        $especialidades .= $med_espec->nombre . ", ";
    }

    $especialidades = rtrim($especialidades,", ");
    ?>
    <?php echo $especialidades; ?>  </b></p>