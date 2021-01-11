<?php

add_shortcode('alert', 'alert');

function alert( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'style' => 'rosa'
	), $atts ) );

	ob_start();?>

		<div class="alert alert-<?php echo esc_attr($style);?>">
			<span class="bg-<?php echo esc_attr($style);?>"><?php echo $content; ?></span>
		</div>

	<?php
	$output = ob_get_clean();
	return $output;
}
//NEW ACCORDION BOX 
add_shortcode('new_alert', 'new_alert');

function new_alert( $atts, $content = null ) {

	$a = shortcode_atts( array(
		'style' => 'box',
		'color' => 'amarillo',
		'title' => ''
	), $atts );

	ob_start();

		$GLOBALS["alertStyle"] = $a['style'];
		$GLOBALS["alertColor"] = $a['color'];
		$GLOBALS["alertTitle"] = $a['title'];
		$GLOBALS["alertContent"] = $content;

		get_template_part("post_templates/widgets/new-alert");

	$output = ob_get_clean();

	return $output;
}


add_shortcode('halfbox', 'halfbox');

function halfbox( $atts, $content = null ) {

	$a = shortcode_atts( array(
		'title' => '',
		'lugar' => '',
		'residencia' => '',
		'distancia' => '',
		'color' => ''
	), $atts );
	
	ob_start();
	
		$GLOBALS["hbTitle"] = $a['title'];
		$GLOBALS["hbinfo1"] = $a['info1'];
		$GLOBALS["hbinfo2"] = $a['info2'];
		$GLOBALS["hbinfo3"] = $a['info3'];
		$GLOBALS["hbinfo3"] = $a['info4'];
		$GLOBALS["hbinfo3"] = $a['info5'];
		$GLOBALS["hbColor"] = $a['color'];
		$GLOBALS["hbContn"] = $content;

		get_template_part("post_templates/widgets/half-box");

	$output = ob_get_clean();
	
	return $output;
}

add_shortcode('contact_form', 'contact_form');

function contact_form ($content){

	ob_start();
	get_template_part("post_templates/widgets/contact-form");
	$content .= ob_get_clean();
		
	return $content;
}

add_shortcode('accordion', 'accordion');

function accordion ($atts, $content = null){
	static $no_calls = 0;
  	++$no_calls;

	preg_match_all("/<h3(.*)>(.*)<\/h3>(.*)/s",$content,$matches,PREG_PATTERN_ORDER);
	$GLOBALS["accordion_btn_text"] = $matches[2][0];
	$GLOBALS["accordion_content"] = $matches[3][0];	
	$GLOBALS["accordion_id"] = "acc_id_" . $no_calls;

	ob_start();
	get_template_part("post_templates/widgets/accordion");
	return do_shortcode(ob_get_clean());
}

add_shortcode('boton_descarga', 'boton_descarga');

function boton_descarga ($atts, $content = null){

	$a = shortcode_atts( array(
		'id' => '',
		'color' => 'amarillo',
		'texto' => ''
	), $atts );

	$GLOBALS["id"] = $a['id'];
	$GLOBALS["btn_color"] = $a['color'];
	$GLOBALS["texto"] = $a['texto'];

	ob_start();
	get_template_part("post_templates/residencia-por-inv/boton-descarga");
	return ob_get_clean();
}

// create a header with id
function header_h3($params = [], $content = null) {

  global $amp_param;
  

    return '<h3>' . $content . '</h3>';


}
add_shortcode('h3','header_h3');


?>