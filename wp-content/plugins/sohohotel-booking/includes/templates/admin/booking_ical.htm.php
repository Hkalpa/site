<?php global $sohohotel_data; ?>

<p><?php esc_html_e('If the booking is imported from an iCal feed details will display here', 'sohohotel_booking'); ?></p>
<?php if(!empty($booking_meta['ical_data'])) {
	
	foreach ($booking_meta['ical_data'] as $key => $val) {
		echo $key . ': ' . $val . '<br />';
	}
	
}; ?>