<?php
	
	// Display Header
	get_header();
	
	global $sohohotel_data;
	
	// Get Page Layout
	$page_layout = get_post_meta(get_the_ID(), 'sohohotel_booking_page_layout', true);
	
	// Get Room Data
	$accommodation_meta = json_decode( get_post_meta($post->ID,'_accommodation_meta',TRUE), true );
	
	// Set max values
	$quitenicebooking_max_rooms = sh_get_booking_max_rooms();
	$quitenicebooking_max_persons_in_form = sh_get_booking_max_guests();
	
	// Reset Query
	wp_reset_postdata();

?>

<?php if ($sohohotel_title_style != 'no_title') { ?>
<div id="page-header" <?php echo wp_kses($sohohotel_page_header_image, $sohohotel_allowed_html_array_header); ?>>
	<h1><?php the_title(); ?></h1>
	<div class="title-block-5"></div>
	<?php echo dimox_breadcrumbs();?>
</div>
<?php } ?>

<!-- BEGIN .content-wrapper -->
<div class="<?php if ( $sohohotel_page_layout != 'unboxed-full-width' ) {echo 'content-wrapper-max-width'; } ?> content-wrapper clearfix">

	<!-- BEGIN .main-content -->
	<div class="<?php echo wp_kses(sohohotel_sidebar1($sohohotel_page_layout), $sohohotel_allowed_html_array); ?>">
		
		<?php if ( post_password_required() ) {
			echo sohohotel_booking_password_form();
		} else { ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>		
			<?php endwhile; endif; ?>

		<?php } ?>
	
	<!-- END .main-content -->
	</div>

		<?php if ( $sohohotel_page_layout != 'full-width' ) { ?>
		<?php if ( $sohohotel_page_layout != 'unboxed-full-width' ) { ?>

	<!-- BEGIN .sidebar-content -->
	<div class="<?php echo sohohotel_sidebar2($sohohotel_page_layout); ?>">

			<!-- BEGIN .sidebar-booking-form -->
			<div class="sidebar-booking-form">

				<!-- BEGIN .booking-form -->
				<form class="booking-form" action="<?php echo $sohohotel_data['booking_page_url']; ?>" method="post">	

					<div class="room-price-widget">
						<p class="from"><?php esc_html_e('Room From', 'sohohotel_booking'); ?></p>
						<h3 class="price"><?php echo sh_get_price($accommodation_meta['price_adult_weekdays']); ?></h3>
						<p class="price-detail"><?php esc_html_e('Per Night', 'sohohotel_booking'); ?></p> 
					</div>

					<div class="booking-form-input-1">
						<label for="check_in"><?php esc_html_e('Check In', 'sohohotel_booking'); ?></label>
						<div class="input-wrapper">
							<i class="fa fa-angle-down"></i>
							<input type="text" id="check_in" name="check_in_display" value="<?php esc_html_e('Check In', 'sohohotel_booking'); ?>" class="datepicker">
							<input type="hidden" id="check_in_alt" name="check_in" value="" />
						</div>
					</div>

					<div class="booking-form-input-2">
						<label for="check_out"><?php esc_html_e('Check Out', 'sohohotel_booking'); ?></label>
						<div class="input-wrapper">
							<i class="fa fa-angle-down"></i>
							<input type="text" id="check_out" name="check_out_display" value="<?php esc_html_e('Check Out', 'sohohotel_booking'); ?>" class="datepicker">
							<input type="hidden" id="check_out_alt" name="check_out" value="" />
						</div>
					</div>

					<div class="booking-form-input-3 clearfix">

						<!-- BEGIN .qns-one-half -->
						<div class="qns-one-half">

							<label for="book_room_adults_1"><?php esc_html_e('Adults', 'sohohotel_booking'); ?></label>
							<div class="select-wrapper">
								<i class="fa fa-angle-down"></i>
								<select id="book_room_adults_1" name="book_room_adults_1">
									<option value="none"><?php esc_html_e('Adults', 'sohohotel_booking'); ?></option>
									
									<?php foreach (range(0, $quitenicebooking_max_persons_in_form) as $r) {
										echo '<option value="' . $r . '">' . $r . '</option>';
									} ?>
				
								</select>
							</div>

						<!-- END .qns-one-half -->
						</div>

						<!-- BEGIN .qns-one-half -->
						<div class="qns-one-half qns-last">

							<label for="book_room_children_1"><?php esc_html_e('Children', 'sohohotel_booking'); ?></label>
							<div class="select-wrapper">
								<i class="fa fa-angle-down"></i>
								<select id="book_room_children_1" name="book_room_children_1">
									<option value="none"><?php esc_html_e('Children', 'sohohotel_booking'); ?></option>
									
									<?php foreach (range(0, $quitenicebooking_max_persons_in_form) as $r) {
										echo '<option value="' . $r . '">' . $r . '</option>';
									} ?>
									
								</select>
							</div>

						<!-- END .qns-one-half -->
						</div>

					</div>

					<div class="booking-form-input-5">
						<input type="hidden" id="external_form" name="external_form" value="true" />
						<input type="hidden" id="book_room" name="book_room" value="1" />
						<button type="submit" class="external_bookingbutton"><?php esc_html_e('Check Availability', 'sohohotel_booking'); ?> <i class="fa fa-calendar"></i></button>
					</div>

				<!-- END  .booking-form -->
				</form>

			<!-- END .sidebar-booking-form -->
			</div>
			
			<?php if ( !empty($sohohotel_data['booking-address']) || !empty($sohohotel_data['booking-phone']) || !empty($sohohotel_data['booking-email']) ) { ?>
			
				<!-- BEGIN .widget -->
				<div class="widget">
					<div class="widget-block"></div>

					<h3><?php esc_html_e('Direct Reservations', 'sohohotel_booking'); ?></h3>

					<ul class="contact-details-list">
						<li class="cdw-address clearfix"><?php echo $sohohotel_data['booking-address']; ?></li>
						<li class="cdw-phone clearfix"><?php echo $sohohotel_data['booking-phone']; ?></li>
						<li class="cdw-email clearfix"><?php echo $sohohotel_data['booking-email']; ?></li>
					</ul>

				<!-- END .widget -->
				</div>
			
			<?php } ?>
		
	<!-- END .sidebar-content -->
	</div>

	<?php } ?>
	<?php } ?>

<!-- END .content-wrapper-outer -->
</div>

<?php get_footer(); ?>