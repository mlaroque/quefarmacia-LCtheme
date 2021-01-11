<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
require $path.'wp-load.php';
global $wpdb;

$query = "SELECT * FROM LCMN_SUCURSALES_DETALLES ORDER BY POST_ID";
$current_post_id = "0";
$json_txt = "";
$json_file = "";

$suc_results = $wpdb->get_results($query,ARRAY_A);

foreach($suc_results as $row){

	if($current_post_id != $row["POST_ID"]){
		$current_post_id = $row["POST_ID"];

		if($current_post_id != "0"){
			//Cerrar json
			$json_txt = rtrim($json_txt,",");
			$json_txt .= "]";
			fwrite($json_file, $json_txt);
			fclose($json_file);
		}
		//Abrir json
		$json_file = fopen(get_template_directory() . '/data/farmacias-sucursales/'.$current_post_id.'.json', "w") or die("Unable to open file!");
		$json_txt = "[";
	}

	$json_txt .= "{";
	$json_txt .= '"n":"' . $row["NOMBRE"] . '",';
	$json_txt .= '"d":"' . $row["DIRECCION_COMPLETA"] . '",';
	$json_txt .= '"t":"' . $row["TELEFONO"] . '",';
	$json_txt .= '"h1":"' . getFormattedTimes($row["HOR_LUNES"]) . '",';
	$json_txt .= '"h2":"' . getFormattedTimes($row["HOR_MARTES"]) . '",';
	$json_txt .= '"h3":"' . getFormattedTimes($row["HOR_MIERCOLES"]) . '",';
	$json_txt .= '"h4":"' . getFormattedTimes($row["HOR_JUEVES"]) . '",';
	$json_txt .= '"h5":"' . getFormattedTimes($row["HOR_VIERNES"]) . '",';
	$json_txt .= '"h6":"' . getFormattedTimes($row["HOR_SABADO"]) . '",';
	$json_txt .= '"h7":"' . getFormattedTimes($row["HOR_DOMINGO"]) . '"';
	$json_txt .= "},";

}


//Cerrar json
$json_txt = rtrim($json_txt,",");
$json_txt .= "]";
fwrite($json_file, $json_txt);
fclose($json_file);


function getFormattedTimes($horas){

	$horas_arr = explode("-", $horas);
	$from_txt = substr($horas_arr[0], 0, -2);
	if((int)$from_txt < 12){
		if((int)$from_txt === 0){
			$from_txt = "12";
		}

		$from_txt .= "am";
	}else{
		if((int)$from_txt !== 12){
			$from_txt = (int)$from_txt - 12;
		}
		$from_txt = $from_txt . "pm";
	}
	$to_txt = substr($horas_arr[1], 0, -2);
	if((int)$to_txt < 12){
		if((int)$to_txt === 0){
			$to_txt = "12";
		}

		$to_txt .= "am";
	}else{
		if((int)$to_txt !== 12){
			$to_txt = (int)$to_txt - 12;
		}
		$to_txt = $to_txt . "pm";
	}

	if(substr($horas_arr[0], -2) !== "00"){
		$from_txt .= ":" . substr($horas_arr[0], -2);
	} 

	if(substr($horas_arr[1], -2) !== "00"){
		$to_txt .= ":" . substr($horas_arr[1], -2);
	} 

	return $from_txt . "-" . $to_txt;

}

?>