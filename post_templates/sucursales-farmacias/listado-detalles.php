<?php
global $post;

  $sucursales_json = file_get_contents(get_template_directory_uri() . "/data/farmacias-sucursales/".$post->ID.".json");
  $sucursales = json_decode($sucursales_json, true);

  $count = 1;
  foreach($sucursales as $suc):

?>
	<p>Nombre: <?php echo $suc["n"];?></p>
	<p>Dirección: <?php echo $suc["d"];?></p>
	<p>Teléfono: <?php echo $suc["t"];?></p>
	<p onclick="suc_toggle(<?php echo $count;?>)">Ver Horarios</p>
	<div id="suc_horarios<?php echo $count;?>" class="suc_horarios">
		<p>Lunes: <?php echo $suc["h1"];?></p>
		<p>Lunes: <?php echo $suc["h2"];?></p>
		<p>Lunes: <?php echo $suc["h3"];?></p>
		<p>Lunes: <?php echo $suc["h4"];?></p>
		<p>Lunes: <?php echo $suc["h5"];?></p>
		<p>Lunes: <?php echo $suc["h6"];?></p>
		<p>Lunes: <?php echo $suc["h7"];?></p>
	</div>

<?php $count += 1; endforeach;?>

<script type="text/javascript">
	var suc_divs = [...document.querySelectorAll('.suc_horarios')];
	
	suc_divs.forEach(suc_div => {
		suc_div.style.display = "none";
	});

	function suc_toggle(num) {
	  var x = document.getElementById("suc_horarios" + num);
	  if (x.style.display === "none") {
	    x.style.display = "block";
	  } else {
	    x.style.display = "none";
	  }
	}

</script>