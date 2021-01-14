<?php global $med_info;?>

    <p><b>N. cédula profesional:</b> <?php if($med_info['mt'][0]['med_visibilidad_online'][0]): ?><a href="<?php echo $med_info['mt'][0]['med_visibilidad_online'][0]; ?>"><?php endif; ?><?php echo $med_info['mt'][0]['med_cedula'][0];?></p>
              <?php if($med_info['mt'][0]['med_visibilidad_online'][0]): ?></a><?php endif; ?>
    </p>

    <p><b>atiende en:</b>
        <?php foreach($med_info['c'] as $med_consult): ?>
              <?php echo $med_consult->nombre;?> 
        <?php endforeach; ?>
    </p>
    <p><b>Consulta en:</b> <?php echo $med_info['mt'][0]['med_idiomas'][0]; ?></p> 

    <a  href="tel:<?php echo $consultorio->tel; ?>">AGENDA UNA CITA</a>
