<?php

function availability_calendar_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'room_id' => ''
	), $atts ) );
	
	ob_start();
	
	if ( empty($room_id) ) {
		$check_room = 'all';
	} elseif ( $room_id == 'all' ) {
		$check_room = 'all';
	} else {
		$check_room = $room_id;
	}
	
	// Reset temp booking data
	//$_SESSION['sh_booking_data'] = '';
	
	echo sh_frontend_availability_calendar($check_room,date('m'),date('Y'));
	
	return ob_get_clean();
	
}

add_shortcode( 'availability_calendar', 'availability_calendar_shortcode' );

?>