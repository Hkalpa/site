<!-- BEGIN .sohohotel_booking-booking-display-wrapper -->
<div class="sohohotel_booking-booking-display-wrapper">
	
	<!-- BEGIN .sohohotel_booking-admin-content-wrapper -->
	<div class="sohohotel_booking-admin-content-wrapper clearfix">
		
		<!-- BEGIN .one-half -->
		<div class="one-half">
			<h4><?php esc_html_e('Dates','sohohotel_booking'); ?></h4>
			<p><?php esc_html_e('Check In:','sohohotel_booking'); ?> <?php echo $booking_meta['check_in']; ?></p>
			<p><?php esc_html_e('Check Out:','sohohotel_booking'); ?> <?php echo $booking_meta['check_out']; ?></p>
			<p><?php esc_html_e('Night(s):','sohohotel_booking'); ?> <?php echo sohohotel_booking_calculate_nights(  sohohotel_booking_date_format($booking_meta['check_in']),  sohohotel_booking_date_format($booking_meta['check_out']) ); ?></p>
		<!-- END .one-half -->
		</div>

		<!-- BEGIN .one-half -->
		<div class="one-half">
			<h4><?php esc_html_e('Payment','sohohotel_booking'); ?></h4>
			<?php if ( $booking_meta['payment_method'] == 'payonarrival' ) {
				$payment_method = __('Pay on Arrival','sohohotel_booking');
			} elseif ( $booking_meta['payment_method'] == 'paypal' ) {
				$payment_method = __('PayPal','sohohotel_booking');
			} ?>
			<p><?php esc_html_e('Payment Method:','sohohotel_booking'); ?> <?php echo $payment_method; ?></p>
			<p class="sohohotel_booking-total-price"><?php esc_html_e('Total:','sohohotel_booking') . ' ' . sh_get_price($booking_meta['total_booking_price']); ?></p>
		<!-- END .one-half -->
		</div>
	
	<!-- END .sohohotel_booking-admin-content-wrapper -->
	</div>
	
	<?php if ($booking_meta['payment_method'] == 'paypal') { ?>
	
	<!-- BEGIN .sohohotel_booking-admin-content-wrapper -->
	<div class="sohohotel_booking-admin-content-wrapper clearfix">
		
		<h4><?php esc_html_e('PayPal Payment Info','sohohotel_booking'); ?></h4>
		<p><?php esc_html_e('Payment Status:','sohohotel_booking'); ?> <?php if ( !empty($booking_meta['paypal_amount_paid']) ) { esc_html_e('Paid','sohohotel_booking'); } else { esc_html_e('Unpaid','sohohotel_booking'); } ?></p>
		<p><?php esc_html_e('Payer Name:','sohohotel_booking'); ?> <?php echo $booking_meta['paypal_first_name'] . ' ' . $booking_meta['paypal_last_name']; ?></p>
		<p><?php esc_html_e('Payer Email:','sohohotel_booking'); ?> <?php echo $booking_meta['paypal_email']; ?></p>
		<p><?php esc_html_e('Payer Country:','sohohotel_booking'); ?> <?php echo $booking_meta['paypal_country']; ?></p>
		<p><?php esc_html_e('Payment ID:','sohohotel_booking'); ?> <?php echo $booking_meta['paypal_payment_id']; ?></p>
		<p><?php esc_html_e('Amount Paid:','sohohotel_booking'); ?> <?php echo $booking_meta['paypal_amount_paid'] . ' ('.$booking_meta['paypal_currency'].')'; ?></p>
		<p><?php esc_html_e('Payment Date:','sohohotel_booking'); ?> <?php echo $booking_meta['paypal_payment_date']; ?></p>
		
	<!-- END .sohohotel_booking-admin-content-wrapper -->
	</div>
	
	<?php } ?>
	
	<!-- BEGIN .sohohotel_booking-admin-content-wrapper -->
	<div class="sohohotel_booking-admin-content-wrapper clearfix">
		
		<!-- BEGIN .one-half -->
		<div class="one-half">
			<h4><?php esc_html_e('Guest Info','sohohotel_booking'); ?></h4>
			<p><?php esc_html_e('Name:','sohohotel_booking'); ?> <?php echo $booking_meta['first_name'] . ' ' . $booking_meta['last_name'] ?></p>
			<p><?php esc_html_e('Email Address:','sohohotel_booking'); ?> <?php echo $booking_meta['email_address']; ?></p>
			<p><?php esc_html_e('Telephone:','sohohotel_booking'); ?> <?php echo $booking_meta['telephone_number']; ?></p>
			<p><?php esc_html_e('Address Line 1:','sohohotel_booking'); ?> <?php echo $booking_meta['address_line_1']; ?></p>
			<p><?php esc_html_e('Address Line 2:','sohohotel_booking'); ?> <?php echo $booking_meta['address_line_2']; ?></p>
		<!-- END .one-half -->
		</div>

		<!-- BEGIN .one-half -->
		<div class="one-half">
			<h4>&nbsp;</h4>
			<p><?php esc_html_e('City:','sohohotel_booking'); ?> <?php echo $booking_meta['city']; ?></p>
			<p><?php esc_html_e('State / County:','sohohotel_booking'); ?> <?php echo $booking_meta['state_county']; ?></p>
			<p><?php esc_html_e('Zip / Postcode:','sohohotel_booking'); ?> <?php echo $booking_meta['zip_postcode']; ?></p>
			<p><?php esc_html_e('Country:','sohohotel_booking'); ?> <?php echo $booking_meta['country']; ?></p>
			<p><?php esc_html_e('Special Requirements:','sohohotel_booking'); ?> <?php echo $booking_meta['special_requirements']; ?></p>
		<!-- END .one-half -->
		</div>
	
	<!-- END .sohohotel_booking-admin-content-wrapper -->
	</div>
	
	<div class="sohohotel_booking-admin-content-wrapper clearfix">
	
		<?php if ( !empty($booking_meta['number_of_rooms']) ) {
			$number_of_rooms = $booking_meta['number_of_rooms'];
		} else {
			$number_of_rooms = '1';
		} ?>
			
		<h4><?php esc_html_e('Rooms:','sohohotel_booking'); ?> <?php echo $booking_meta['number_of_rooms']; ?></h4>

		<?php if ( !empty($booking_meta['number_of_rooms']) ) {
			$number_of_rooms = $booking_meta['number_of_rooms'];
		} else {
			$number_of_rooms = '1';
		} ?>

		<?php for ($i2 = 1; $i2 <= $number_of_rooms; $i2++) : ?>
				
			<div class="sohohotel_booking-booking-content-wrapper">
				<p>Room #<?php echo $i2; ?></p>
				<p>Room Name: <?php echo $booking_meta['room_' . $i2 . '_name']; ?></p>
				<p>Adults: <?php echo $booking_meta['room_' . $i2 . '_adults']; ?></p>
				<p>Children: <?php echo $booking_meta['room_' . $i2 . '_children']; ?></p>
			</div>
				
			<?php endfor; ?>
			
			<?php $args = array(
				'post_type' => 'service',
				'posts_per_page' => '9999'
			); ?>

			<?php $wp_query = new WP_Query( $args );
			
			echo '<h4>' . __('Services','sohohotel_booking') . '</h4>';
			
			if ($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); 
				
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
					<div class="sohohotel_booking-booking-content-wrapper">
					<p><?php the_title(); ?> <span>(<?php echo sh_get_price($service_meta['price']); ?> / <?php echo $price_scheme_1; ?> / <?php echo $price_scheme_2; ?>)</span></p>
					</div>
				<?php }

			 endwhile;endif; 

			?>
			
	</div>
	
<!-- END .sohohotel_booking-booking-display-wrapper -->
</div>