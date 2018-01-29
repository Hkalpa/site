<?php

function sh_booking_process_backend_action_callback() {
	
	$content = '';
	
	// Check check in and check out fields are filled out
	if ( empty($_POST['check_in']) OR empty($_POST['check_out']) ) {
		
		$content .= esc_html__('Please select a check in and check out date', 'sohohotel_booking');
	
	// If the check in date is not before the check out date
	} elseif ( strtotime($_POST['check_in']) > strtotime($_POST['check_out']) ) {
	
		$content .= esc_html__('The check in date must be before the check out date', 'sohohotel_booking');
	
	} else {

		// Get IDs of rooms which are fully booked (from database and temp session)
		$fully_booked_rooms_db = sh_get_all_booked_room_ids($_POST['check_in'],$_POST['check_out'],true);

		// Check each room ID against one being booked
		$not_availabile = '';
		foreach($fully_booked_rooms_db as $key => $val) {

			// If room ID being booked matches any of the fully booked rooms
			if ($val == $_POST['room_type']) {
				$not_availabile = true;
			}

		}

		// If room is available
		if ( $not_availabile != true ) {

			$content .= esc_html__('The room is available and has been successfully added to the booking', 'sohohotel_booking');

			// Store temp room booking details in array
			$room_details["check_in"] = $_POST['check_in'];
			$room_details["check_out"] = $_POST['check_out'];
			$room_details["room_type"] = $_POST['room_type'];

			// Store temp room booking details array in a SESSION
			sh_store_backend_booking_data_temp($room_details);

		// If room is not available
		} else {

			$content .= esc_html__('Room Not Available', 'sohohotel_booking');

		}
		
	}
	
	$resp = array('content' => $content);
	header( "Content-Type: application/json" );
	echo json_encode($resp);
	die();
	
}

add_action( 'wp_ajax_sh_booking_process_backend_action_callback', 'sh_booking_process_backend_action_callback' );
add_action( 'wp_ajax_nopriv_sh_booking_process_backend_action_callback', 'sh_booking_process_backend_action_callback' );

?>