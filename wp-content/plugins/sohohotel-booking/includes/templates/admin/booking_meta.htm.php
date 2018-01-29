<?php global $sohohotel_data; ?>

<p class="msg-guide2"><?php esc_html_e('Note: When you add a booking via the WordPress dashboard availability is not checked','sohohotel_booking'); ?></p>

<hr />

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Number of Rooms','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<select name="_booking_meta[number_of_rooms]">	
		<?php for ($i = 1; $i <= 100; $i++) : ?>
			<?php if ($booking_meta['number_of_rooms'] == $i ) { ?>	
		        <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
			<?php } else { ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php } ?>
		<?php endfor; ?>
		</select>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Mark as Read','sohohotel_booking'); ?>
	</div>
	
	<?php if ( !empty($booking_meta['markread']) ) { $booking_markread = $booking_meta['markread']; } else { $booking_markread = ''; } ?>
	
	<div class="sohohotel_booking-two-thirds">
		<select name="_booking_meta[markread]">	
			<option value="unread" <?php if ( $booking_markread == 'unread' ) echo 'selected="selected"'; ?>><?php esc_html_e('Unread','sohohotel_booking'); ?></option>
			<option value="read" <?php if ( $booking_markread == 'read' ) echo 'selected="selected"'; ?>><?php esc_html_e('Read','sohohotel_booking'); ?></option>
		</select>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<hr />

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Check In Date','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input class="datepicker" type="text" name="_booking_meta[check_in]" value="<?php if(!empty($booking_meta['check_in'])) echo $booking_meta['check_in']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Check Out Date','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input class="datepicker" type="text" name="_booking_meta[check_out]" value="<?php if(!empty($booking_meta['check_out'])) echo $booking_meta['check_out']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<hr />

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('First Name','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[first_name]" value="<?php if(!empty($booking_meta['first_name'])) echo $booking_meta['first_name']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>


<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Last Name','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[last_name]" value="<?php if(!empty($booking_meta['last_name'])) echo $booking_meta['last_name']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Email Address','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[email_address]" value="<?php if(!empty($booking_meta['email_address'])) echo $booking_meta['email_address']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<hr />

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Telephone','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[telephone_number]" value="<?php if(!empty($booking_meta['telephone_number'])) echo $booking_meta['telephone_number']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Address Line 1','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[address_line_1]" value="<?php if(!empty($booking_meta['address_line_1'])) echo $booking_meta['address_line_1']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Address Line 2','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[address_line_2]" value="<?php if(!empty($booking_meta['address_line_2'])) echo $booking_meta['address_line_2']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('City','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[city]" value="<?php if(!empty($booking_meta['city'])) echo $booking_meta['city']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('State / County','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[state_county]" value="<?php if(!empty($booking_meta['state_county'])) echo $booking_meta['state_county']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Zip / Postcode','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[zip_postcode]" value="<?php if(!empty($booking_meta['zip_postcode'])) echo $booking_meta['zip_postcode']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Country','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[country]" value="<?php if(!empty($booking_meta['country'])) echo $booking_meta['country']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Special Requirements','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<textarea rows="10" cols="20" name="_booking_meta[special_requirements]"><?php if(!empty($booking_meta['special_requirements'])) echo $booking_meta['special_requirements']; ?></textarea>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<hr />

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Services','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-services-admin-wrapper sohohotel_booking-two-thirds">
		
		<?php $args = array(
			'post_type' => 'service',
			'posts_per_page' => '9999'
		); ?>

		<?php $wp_query = new WP_Query( $args );

		$service_count = '0';
		
		if ($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); 
			
			$service_count++;
			
			// Get meta data
			$service_meta = get_post_meta($post->ID,'_service_meta',TRUE);

			// Set price scheme 1
			if ( $service_meta['price_scheme_1'] == 'flatfee' ) {
				$price_scheme_1 = __('Flat Fee','sohohotel_booking');
			}

			if ( $service_meta['price_scheme_1'] == 'perroom' ) {
				$price_scheme_1 = __('Per Room','sohohotel_booking');
			}

			if ( $service_meta['price_scheme_1'] == 'perperson' ) {
				$price_scheme_1 = __('Per Person','sohohotel_booking');
			}

			// Set price scheme 2
			if ( $service_meta['price_scheme_2'] == 'pernight' ) {
				$price_scheme_2 = __('Per Night','sohohotel_booking');
			}

			if ( $service_meta['price_scheme_2'] == 'perbooking' ) {
				$price_scheme_2 = __('Per Booking','sohohotel_booking');
			}
			
			if ( match_service(get_the_title(),$booking_meta) ) { ?>
				
				<div class="service-section clearfix">
					<input type="checkbox" name="_booking_meta[service_<?php echo $service_count; ?>_name]" value="<?php the_title(); ?>" checked class="fl" />
					<label for="_booking_meta[service_<?php echo $service_count; ?>_name]" class="fl"><?php the_title(); ?> <span>(<?php echo sh_get_price($service_meta['price']); ?> / <?php echo $price_scheme_1; ?> / <?php echo $price_scheme_2; ?>)</span></label>
				</div>
				
			<?php } else { ?>
				
				<div class="service-section clearfix">
					<input type="checkbox" name="_booking_meta[service_<?php echo $service_count; ?>_name]" value="<?php the_title(); ?>" class="fl" />
					<label for="_booking_meta[service_<?php echo $service_count; ?>_name]" class="fl"><?php the_title(); ?> <span>(<?php echo sh_get_price($service_meta['price']); ?> / <?php echo $price_scheme_1; ?> / <?php echo $price_scheme_2; ?>)</span></label>
				</div>
				
			<?php }	
			
		 endwhile;else:

		echo '<p>' . __('Sorry, no services are available.','sohohotel_booking') . '</p>';

		endif; ?>
		
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<hr />

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Payment Method','sohohotel_booking'); ?>
	</div>
	
	<?php if ( !empty($booking_meta['payment_method']) ) { $booking_payment_method = $booking_meta['payment_method']; } else { $booking_payment_method = ''; } ?>
	
	<div class="sohohotel_booking-two-thirds">
		<select name="_booking_meta[payment_method]">	
			<option value="payonarrival" <?php if ( $booking_payment_method == 'payonarrival' ) echo 'selected="selected"'; ?>><?php esc_html_e('Pay on Arrival','sohohotel_booking'); ?></option>
			<option value="paypal" <?php if ( $booking_payment_method == 'paypal' ) echo 'selected="selected"'; ?>><?php esc_html_e('PayPal','sohohotel_booking'); ?></option>
		</select>
	</div>
	
<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Total Booking Price','sohohotel_booking') . ' (' . $sohohotel_data['currency_unit'] . ')';  ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[total_booking_price]" value="<?php if(!empty($booking_meta['total_booking_price'])) echo $booking_meta['total_booking_price']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<!-- BEGIN .sohohotel_booking-field-wrapper -->
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<?php esc_html_e('Price Paid Upon Booking','sohohotel_booking'); ?>
	</div>
	
	<div class="sohohotel_booking-two-thirds">
		<input type="text" name="_booking_meta[price_paid_upon_booking]" value="<?php if(!empty($booking_meta['price_paid_upon_booking'])) echo $booking_meta['price_paid_upon_booking']; ?>"/>
	</div>

<!-- END .sohohotel_booking-field-wrapper -->
</div>

<hr />

<?php

if ( !empty($booking_meta['number_of_rooms']) ) {
	$number_of_rooms = $booking_meta['number_of_rooms'];
} else {
	$number_of_rooms = '1';
}

?>

<p class="msg-guide2"><?php esc_html_e('Note: To add more rooms, scroll to the top of the page, edit the "Number of Rooms" value, then click the blue "Update" button','sohohotel_booking'); ?></p>

<hr />

<!-- BEGIN .sohohotel_booking-booking-rooms-wrapper -->
<div class="sohohotel_booking-booking-rooms-wrapper">

<?php for ($i2 = 1; $i2 <= $number_of_rooms; $i2++) : ?>
	
	<?php include (sohohotel_booking_BASE_DIR . "/includes/templates/admin/booking_rooms.htm.php"); ?>
	
<?php endfor; ?>

<!-- END .sohohotel_booking-booking-rooms-wrapper -->
</div>

<button class="add-room button-primary" type="button">Add Room</button>

<div class="sohohotel_booking-booking-rooms-wrapper-hidden" style="display:none">
	<?php include (sohohotel_booking_BASE_DIR . "/includes/templates/admin/booking_rooms.htm.php"); ?>
</div>