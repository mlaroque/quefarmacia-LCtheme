<?php 

$options_si_no = array(array("Si","Si"),array("No","No"));

function residencia_inv_ciud_inner_custom_box( $post ){
	global $options_si_no;
?>
	<?php echo build_select("residencia_inv_ciud_visa","Visado de Ciudadania por Inversión:","una opción",$options_si_no);?>
	<div id="residencia_inv_ciud_si" style="display:none">
	<?php echo build_input_text("residencia_inv_ciud_minima","Inversión mínima:","500,000 EUR",""); ?>
	<!--<?php echo build_input_text("residencia_inv_ciud_condiciones","Condiciones:","","",true); ?>-->
	<?php echo build_input_text("residencia_inv_ciud_duracion_visa","Duración del visado:","",""); ?>
	<?php echo build_input_text("residencia_inv_ciud_duracion_tramite","Duración del tramite:","",""); ?>
	</div>
	<?php echo build_input_text("residencia_inv_ciud_boton_condiciones","BOTÓN descarga PDF condiciones URL: ","",""); ?>
	<?php echo build_input_text("residencia_inv_ciud_boton_solicitar","BOTÓN Solicitar más información URL: ","",""); ?>

<?php } 


function residencia_inv_temp_inner_custom_box( $post ){
	global $options_si_no;
?>
	<?php echo build_select("residencia_inv_temp_visa","Visado de Residencia Temporal por Inversión:","una opción",$options_si_no);?>
	<div id="residencia_inv_temp_si" style="display:none">
	<?php echo build_input_text("residencia_inv_temp_minima","Inversión mínima:","500,000 EUR",""); ?>
	<!--<?php echo build_input_text("residencia_inv_temp_condiciones","Condiciones:","","",true); ?>-->
	<?php echo build_input_text("residencia_inv_temp_duracion_visa","Duración del visado:","",""); ?>
	<?php echo build_input_text("residencia_inv_temp_duracion_tramite","Duración del tramite:","",""); ?>
	</div>
	<?php echo build_input_text("residencia_inv_temp_boton_condiciones","BOTÓN descarga PDF condiciones URL: ","",""); ?>
	<?php echo build_input_text("residencia_inv_temp_boton_solicitar","BOTÓN Solicitar más información URL: ","",""); ?>

<?php } 


function residencia_inv_perm_inner_custom_box( $post ){
	global $options_si_no;
?>
	<?php echo build_select("residencia_inv_perm_visa","Visado de Residencia Permanente por Inversión:","una opción",$options_si_no);?>
	<div id="residencia_inv_perm_si" style="display:none">
	<?php echo build_input_text("residencia_inv_perm_minima","Inversión mínima:","500,000 EUR",""); ?>
	<!--<?php echo build_input_text("residencia_inv_perm_condiciones","Condiciones:","","",true); ?>-->
	<?php echo build_input_text("residencia_inv_perm_duracion_visa","Duración del visado:","",""); ?>
	<?php echo build_input_text("residencia_inv_perm_duracion_tramite","Duración del tramite:","",""); ?>
	</div>
	<?php echo build_input_text("residencia_inv_perm_boton_condiciones","BOTÓN descarga PDF condiciones URL: ","",""); ?>
	<?php echo build_input_text("residencia_inv_perm_boton_solicitar","BOTÓN Solicitar más información URL: ","",""); ?>

<?php } ?>