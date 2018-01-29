<?php

function intro_section_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'title_1' => '',
		'title_2' => '',
		'description' => '',
		'button_text' => '',
		'button_url' => ''
	), $atts ) );
	
	$output = '<div class="qns-welcome-section"><h1>' . $title_1 . '</h1>
<div class="title-block-1"></div>
<h3>' . $title_2 . '</h3>
<p>' . $description . '</p>
<a href="' . $button_url . '" class="button0">' . $button_text . ' <i class="fa fa-angle-right"></i></a></div>';

	return $output;
	
}

add_shortcode( 'intro_section', 'intro_section_shortcode' );

?>