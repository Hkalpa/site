<?php global $sohohotel_data;
if ( !empty($sohohotel_data['booking_form_max_person']) ) {
	$booking_form_max_person = $sohohotel_data['booking_form_max_person'];
} else {
	$booking_form_max_person = '30';
} 

// Wipe existing temp booking data
$_SESSION['sh_booking_data_backend'] = '';
?>

<!-- BEGIN .booking-rooms-wrapper-outer -->
<div class="booking-rooms-wrapper-outer">

<?php unset($_SESSION["temp_bookings"]);

if( !empty($booking_meta['save_rooms']) ) {
	$json_data = $booking_meta['save_rooms'];
	$data = json_decode($json_data, true); ?>

	    <?php foreach($data as $key => $val) { ?>

		<!-- BEGIN .booking-rooms-wrapper-inner -->
	    <div class="booking-rooms-wrapper-inner">

			<h3><?php echo $key; ?></h3>

			<!-- BEGIN .booking-wrapper -->
			<div class="booking-wrapper">

				<input type="hidden" name="room_number" value="<?php echo $key; ?>">
				
				<!-- BEGIN .clearfix -->
				<div class="clearfix">
				
					<div class="input-field-one-half">
						<label><?php esc_html_e( 'Check In Date', 'sohohotel_booking' ); ?></label>
						<input type="text" name="check_in" class="datepicker" value="<?php echo $val['check_in']; ?>">
					</div>

					<div class="input-field-one-half last-col">
						<label><?php esc_html_e( 'Check Out Date', 'sohohotel_booking' ); ?></label> 
						<input type="text" name="check_out" class="datepicker" value="<?php echo $val['check_out']; ?>">
					</div>
				
				<!-- END .clearfix -->
				</div>

				<label><?php esc_html_e( 'Room', 'sohohotel_booking' ); ?></label> 
				<select name="room_type">

					<?php global $post;

					$args = array(
					'post_type' => 'accommodation',
					'posts_per_page' => '9999',
					);

					$wp_query = new WP_Query( $args );
					if ($wp_query->have_posts()) :
						while($wp_query->have_posts()) :	
							$wp_query->the_post(); ?>

							<option value="<?php the_ID(); ?>" <?php if( $val['room_type'] == get_the_ID() ) {echo 'selected';} ?>><?php echo the_title(); ?></option>

						<?php endwhile;
					else :
						esc_html_e('No bookings','sohohotel_booking');
					endif;

					wp_reset_query(); ?>

				</select>
				
				<!-- BEGIN .clearfix -->
				<div class="clearfix">
				
					<div class="input-field-one-half">
						<label><?php esc_html_e( 'Adults', 'sohohotel_booking' ); ?></label> 
						<select name="adults">
							<?php for ($i = 0; $i <= $booking_form_max_person; $i++) : ?>
								<?php if ($val['adults'] == $i ) { ?>	
							        <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
								<?php } else { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							<?php endfor; ?>
						</select>
					</div>

					<div class="input-field-one-half last-col">
						<label><?php esc_html_e( 'Children', 'sohohotel_booking' ); ?></label>
						<select name="children">
							<?php for ($i = 0; $i <= $booking_form_max_person; $i++) : ?>
								<?php if ($val['children'] == $i ) { ?>	
							        <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
								<?php } else { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							<?php endfor; ?>
						</select>
					</div>
				
				<!-- END .clearfix -->
				</div>

				<button class="remove_room button" type="button"><?php esc_html_e( 'Remove Room', 'sohohotel_booking' ); ?></button>

				<div class="ajax_message"></div>

			<!-- END .booking-wrapper -->
			</div>

		<!-- BEGIN .booking-rooms-wrapper-inner -->
	    </div>

	    <?php } ?>
	
<?php } ?>

<!-- END .booking-rooms-wrapper-outer -->
</div>

<!-- BEGIN .booking-rooms-wrapper -->
<div class="booking-rooms-wrapper">
	
	<h3><?php esc_html_e( 'Room XX', 'sohohotel_booking' ); ?></h3>
	
	<!-- BEGIN .booking-wrapper -->
	<div class="booking-wrapper">
		
		<input type="hidden" name="room_number">
		
		<!-- BEGIN .clearfix -->
		<div class="clearfix">
		
			<div class="input-field-one-half">
				<label><?php esc_html_e( 'Check In Date', 'sohohotel_booking' ); ?></label>
				<input type="text" name="check_in" value="" class="datepicker" />
			</div>
			
			<div class="input-field-one-half last-col">
				<label><?php esc_html_e( 'Check Out Date', 'sohohotel_booking' ); ?></label>
				<input type="text" name="check_out" value="" class="datepicker" />
			</div>
		
		<!-- END .clearfix -->
		</div>
		
		<label><?php esc_html_e( 'Room', 'sohohotel_booking' ); ?></label>
		<select name="room_type">
			
			<?php global $post;

			$args = array(
			'post_type' => 'accommodation',
			'posts_per_page' => '9999',
			);

			$wp_query = new WP_Query( $args );
			if ($wp_query->have_posts()) :
				while($wp_query->have_posts()) :	
					$wp_query->the_post(); ?>

					<option value="<?php the_ID(); ?>"><?php echo the_title(); ?></option>
					
				<?php endwhile;
			else :
				esc_html_e('No bookings','sohohotel_booking');
			endif;

			wp_reset_query(); ?>
			
		</select>
		
		<!-- BEGIN .clearfix -->
		<div class="clearfix">
		
			<div class="input-field-one-half">
				<label><?php esc_html_e( 'Adults', 'sohohotel_booking' ); ?></label>
				<select name="adults">
					<?php for ($i = 0; $i <= $booking_form_max_person; $i++) : ?>
						<?php if ($accommodation_meta['maximum_occupancy'] == $i ) { ?>	
					        <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
						<?php } else { ?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
					<?php endfor; ?>
				</select>
			</div>
			
			<div class="input-field-one-half last-col">
				<label><?php esc_html_e( 'Children', 'sohohotel_booking' ); ?></label>
				<select name="children">
					<?php for ($i = 0; $i <= $booking_form_max_person; $i++) : ?>
						<?php if ($accommodation_meta['maximum_occupancy'] == $i ) { ?>	
					        <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
						<?php } else { ?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
					<?php endfor; ?>
				</select>
			</div>
		
		<!-- END .clearfix -->
		</div>
		
		<button class="check_availability button" type="button"><?php esc_html_e( 'Check Availability', 'sohohotel_booking' ); ?></button>
		<button class="remove_room button" type="button"><?php esc_html_e( 'Remove Room', 'sohohotel_booking' ); ?></button>
		
		<div class="ajax_message"></div>
		
	<!-- END .booking-wrapper -->
	</div>
	
<!-- END .booking-rooms-wrapper -->
</div>

<button id="add_room" class="button-primary" type="button"><?php esc_html_e( 'Add Room', 'sohohotel_booking' ); ?></button>

<textarea class="save_rooms" name="_booking_meta[save_rooms]"><?php if(!empty($booking_meta['save_rooms'])) echo $booking_meta['save_rooms']; ?></textarea>