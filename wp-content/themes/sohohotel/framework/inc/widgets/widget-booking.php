<?php

// Widget Class
class sohohotel_booking_widget extends WP_Widget {


/* ------------------------------------------------
	Widget Setup
------------------------------------------------ */

	function __construct() {
		
		parent::__construct(false, $name = esc_html__('Soho Hotel Booking Form','sohohotel'), array(
			'description' => esc_html__('Display Booking Form','sohohotel')
		));
	
	}


/* ------------------------------------------------
	Display Widget
------------------------------------------------ */
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$position = apply_filters('widget_position', $instance['position'] );
		
		// Get theme options
		global $sohohotel_data;

		// Set max values
		$sh_get_booking_max_rooms = sh_get_booking_max_rooms();
		$sh_get_booking_max_guests = sh_get_booking_max_guests(); ?>
		
		<?php if ($position == 'footer') {
			
			global $sohohotel_allowed_html_array;
			echo wp_kses($before_widget,$sohohotel_allowed_html_array);
			if ( $title ) {
				echo wp_kses($before_title . $title . $after_title,$sohohotel_allowed_html_array);
			 }
			
		} ?>
		
		<!-- BEGIN .sidebar-booking-form -->
		<div class="sidebar-booking-form">

			<!-- BEGIN .booking-form -->
			<form class="booking-form" action="<?php echo $sohohotel_data["booking_page_url"]; ?>" method="post">	

				<div class="booking-form-input-1">
					<label for="check_in"><?php esc_html_e('Check In','sohohotel'); ?></label>
					<div class="input-wrapper">
						<i class="fa fa-angle-down"></i>
						<input type="text" id="check_in" name="check_in_display" value="<?php esc_html_e('Check In','sohohotel'); ?>" class="datepicker">
						<input type="hidden" id="check_in_alt" name="check_in" value="" />
					</div>
				</div>

				<div class="booking-form-input-2">
					<label for="check_out"><?php esc_html_e('Check Out','sohohotel'); ?></label>
					<div class="input-wrapper">
						<i class="fa fa-angle-down"></i>
						<input type="text" id="check_out" name="check_out_display" value="<?php esc_html_e('Check Out','sohohotel'); ?>" class="datepicker">
						<input type="hidden" id="check_out_alt" name="check_out" value="" />
					</div>
				</div>

				<div class="booking-form-input-3 clearfix">
					<label for="book_room_adults_1"><?php esc_html_e('Adults','sohohotel'); ?></label>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select id="book_room_adults_1" name="book_room_adults_1">
							<option value="none"><?php esc_html_e('Adults','sohohotel'); ?></option>
							<?php foreach (range(1, $sh_get_booking_max_guests) as $r) { ?>
								<option value="<?php echo $r; ?>"><?php echo $r; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="booking-form-input-4 clearfix">
					<label for="book_room_children_1"><?php esc_html_e('Children','sohohotel'); ?></label>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select id="book_room_children_1" name="book_room_children_1">
							<option value="none">Children</option>
							<?php foreach (range(0, $sh_get_booking_max_guests) as $r) { ?>
								<option value="<?php echo $r; ?>"><?php echo $r; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="booking-form-input-5">
					<input type="hidden" id="external_form" name="external_form" value="true" />
					<input type="hidden" id="book_room" name="book_room" value="1" />
					<button type="submit" class="external_bookingbutton"><?php esc_html_e('Check Availability','sohohotel'); ?> <i class="fa fa-calendar"></i></button>
				</div>

			<!-- END  .booking-form -->
			</form>

		<!-- END .sidebar-booking-form -->
		</div>
		
		<?php
		
		if ($position == 'footer') {
			
			echo wp_kses($after_widget,$sohohotel_allowed_html_array);
			
		}
		
	}	
	
	
/* ------------------------------------------------
	Update Widget
------------------------------------------------ */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['position'] = strip_tags( $new_instance['position'] );
		return $instance;
	}
	
	
/* ------------------------------------------------
	Widget Input Form
------------------------------------------------ */

	function form( $instance ) {
		$defaults = array(
		'title' => 'Booking Form',
		'position' => 'sidebar'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:', 'sohohotel'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'position' )); ?>"><?php esc_html_e('Widget Position:', 'sohohotel'); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'position' )); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name( 'position' )); ?>">
				<option value="sidebar" <?php if ( $instance['position'] == 'sidebar' ) {echo 'selected="selected"';} ?>><?php esc_html_e('Sidebar', 'sohohotel'); ?></option>
				<option value="footer" <?php if ( $instance['position'] == 'footer' ) {echo 'selected="selected"';} ?>><?php esc_html_e('Footer', 'sohohotel'); ?></option>
			</select>
		</p>
		
	<?php
	}	
	
}

// Add widget function to widgets_init
add_action( 'widgets_init', 'sohohotel_booking_widget' );

// Register Widget
function sohohotel_booking_widget() {
	register_widget( 'sohohotel_booking_widget' );
}