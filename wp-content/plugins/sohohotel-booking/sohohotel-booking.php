<?php

/*
  Plugin Name: Soho Hotel Booking
  Plugin URI: http://quitenicestuff.com
  Description: A Simple Shortcodes and Post Type Plugin
  Version: 2.0.9.1
  Author: Quite Nice Stuff
  Author URI: http://quitenicestuff.com
*/



/* ----------------------------------------------------------------------------

   Register Session

---------------------------------------------------------------------------- */
function sohohotel_booking_register_session(){
	if( !session_id())
		session_start();
}

add_action('init','sohohotel_booking_register_session');



/* ----------------------------------------------------------------------------

   Load Language Files

---------------------------------------------------------------------------- */
function sohohotel_booking_init() {
	load_plugin_textdomain( 'sohohotel_booking', false, dirname(plugin_basename( __FILE__ ))  . '/languages/' ); 
}
add_action('init', 'sohohotel_booking_init');



/* ----------------------------------------------------------------------------

   Load Files

---------------------------------------------------------------------------- */
if ( ! defined( 'sohohotel_booking_BASE_FILE' ) )
    define( 'sohohotel_booking_BASE_FILE', __FILE__ );

if ( ! defined( 'sohohotel_booking_BASE_DIR' ) )
    define( 'sohohotel_booking_BASE_DIR', dirname( sohohotel_booking_BASE_FILE ) );

if ( ! defined( 'sohohotel_booking_PLUGIN_URL' ) )
    define( 'sohohotel_booking_PLUGIN_URL', plugin_dir_url( __FILE__ ) );



/* ----------------------------------------------------------------------------

   Plugin Activation

---------------------------------------------------------------------------- */
function sohohotel_booking_shortcodes_activation() {}
register_activation_hook(__FILE__, 'sohohotel_booking_shortcodes_activation');

function sohohotel_booking_shortcodes_deactivation() {}
register_deactivation_hook(__FILE__, 'sohohotel_booking_shortcodes_deactivation');



/* ----------------------------------------------------------------------------

   Load Frontend CSS & JS

---------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'front_js_css');
function front_js_css() {
	
	global $sohohotel_data;
	
	// Frontend JS
	wp_enqueue_script('jquery');
	wp_register_script( 'sohohotel_booking_js', sohohotel_booking_PLUGIN_URL . 'assets/js/scripts.js' );
	wp_enqueue_script( 'sohohotel_booking_js' );
	
	// Get Date Format
	if ( !empty($sohohotel_data["date_format"]) ) {
		$datepickerDateFormat = $sohohotel_data["date_format"];
	} else {
		$datepickerDateFormat = 'dd/mm/yy';
	}

	// Get Minimum Stay
	if ( $sohohotel_data['minimum_stay'] ) {
		$sohohotel_bookingMinBookPeriod = $sohohotel_data['minimum_stay'];	
	} else {
		$sohohotel_bookingMinBookPeriod = '1';
	}
	
	if ( $sohohotel_data['terms_conditions'] ) {
		$terms_and_conditions = 'true';
	} else {
		$terms_and_conditions = 'false';
	}
	
	if ( $sohohotel_data['datepicker_days'] ) {
		$datepicker_days = $sohohotel_data['datepicker_days'];
	} else {
		$datepicker_days = "['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa']";
	}

	if ( $sohohotel_data['datepicker_months'] ) {
		$datepicker_months = $sohohotel_data['datepicker_months'];
	} else {
		$datepicker_months = "['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']";
	}
	
	// Frontend Custom JS Variables
	wp_add_inline_script( 'sohohotel_booking_js', "
	var sohohotel_booking_AJAX_URL = '" . sohohotel_booking_AJAX_URL . "';
	var sohohotel_bookingLoadingImage = '" . sohohotel_booking_PLUGIN_URL . "assets/images/loading.gif';
	var datepickerDateFormat = '" . $datepickerDateFormat . "';
	var sohohotel_bookingMinBookPeriod = '" . $sohohotel_bookingMinBookPeriod . "';
	var sohohotel_booking_length_error_msg = '" . esc_html__('The minimum booking period is', 'sohohotel_booking') . ' ' . $sohohotel_bookingMinBookPeriod . ' ' . esc_html__('night(s)', 'sohohotel_booking') . "';
	var sohohotel_date_msg = '" . esc_html__('Please make sure the check in date is before the check out date and that both fields are filled out', 'sohohotel_booking') . "';
	var sohohotel_terms_msg = '" . esc_html__('You must accept the terms & conditions before placing your booking', 'sohohotel_booking') . "';
	var sohohotel_required_msg = '" . esc_html__('Please fill out all the required fields marked with a *', 'sohohotel_booking') . "';
	var sohohotel_invalid_email_msg = '" . esc_html__('Please enter a valid email address', 'sohohotel_booking') . "';
	var sohohotel_invalid_phone_msg = '" . esc_html__('Phone number should only contain numbers', 'sohohotel_booking') . "';
	var sohohotel_check_in_txt = '" . esc_html__('Check In', 'sohohotel_booking') . "';
	var sohohotel_check_out_txt = '" . esc_html__('Check Out', 'sohohotel_booking') . "';
	var sohohotel_datepicker_days = " . $datepicker_days . ";
	var sohohotel_datepicker_months = " . $datepicker_months . ";
	var sohohotel_terms_set = '" . $terms_and_conditions . "';");
	
}



/* ----------------------------------------------------------------------------

   Load Admin CSS & JS

---------------------------------------------------------------------------- */
add_action('admin_enqueue_scripts', 'admin_js_css');
function admin_js_css() {
	
	global $sohohotel_data;
	
	// Admin CSS
	wp_enqueue_style('sohohotel_booking_css', sohohotel_booking_PLUGIN_URL . 'assets/css/admin/style.css');
	
	// Admin JS
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_script( 'jquery-ui-accordion' );
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_register_script( 'sohohotel_booking_js', sohohotel_booking_PLUGIN_URL . 'assets/js/admin/scripts.js' );
	wp_enqueue_script( 'sohohotel_booking_js' );
	
	
	
	// Get Date Format
	$datepickerDateFormat = 'yy-mm-dd';
	
	// Get Minimum Stay
	if ( $sohohotel_data['minimum_stay'] ) {
		$sohohotel_bookingMinBookPeriod = $sohohotel_data['minimum_stay'];	
	} else {
		$sohohotel_bookingMinBookPeriod = '1';
	}
	
	// Admin Custom JS Variables
	wp_add_inline_script( 'sohohotel_booking_js', "
	var sohohotel_booking_AJAX_URL = '" . sohohotel_booking_AJAX_URL . "';
	var sohohotel_bookingLoadingImage = '" . sohohotel_booking_PLUGIN_URL . "assets/images/loading.gif';
	var datepickerDateFormat = '" . $datepickerDateFormat . "';
	var sohohotel_bookingMinBookPeriod = '" . $sohohotel_bookingMinBookPeriod . "';
	var sohohotel_required_msg = '" . esc_html__('Please fill out all the fields', 'sohohotel_booking') . "';
	var sohohotel_blocked_day_msg = '" . esc_html__('Please select at least 1 day of the week to be blocked in the specified date range', 'sohohotel_booking') . "';
	var sohohotel_coupon_type_msg = '" . esc_html__('Please select a discount type', 'sohohotel_booking') . "';
	var sohohotel_coupon_amounts_msg = '" . esc_html__('Please only enter numbers for the discount amount field', 'sohohotel_booking') . "';
	var sohohotel_price_numeric_msg = '" . esc_html__('Please only enter numbers in the price fields', 'sohohotel_booking') . "';
	var sohohotel_date_msg = '" . esc_html__('The from date must be before the to date', 'sohohotel_booking') . "';" );
	
	if ( 'coupon' == get_post_type() ) {
		wp_register_script( 'sohohotel_booking_coupon_js', sohohotel_booking_PLUGIN_URL . 'assets/js/admin/coupon_scripts.js' );
		wp_enqueue_script( 'sohohotel_booking_coupon_js' );
	}
	
	if ( 'service' == get_post_type() ) {
		wp_register_script( 'sohohotel_booking_service_js', sohohotel_booking_PLUGIN_URL . 'assets/js/admin/service_scripts.js' );
		wp_enqueue_script( 'sohohotel_booking_service_js' );
	}
	
	if ( 'blocked_dates' == get_post_type() ) {
		wp_register_script( 'sohohotel_booking_blocked_dates_js', sohohotel_booking_PLUGIN_URL . 'assets/js/admin/blocked_dates_scripts.js' );
		wp_enqueue_script( 'sohohotel_booking_blocked_dates_js' );
	}

}



/* ----------------------------------------------------------------------------

   WPML

---------------------------------------------------------------------------- */
global $sitepress;
if ( !empty($sitepress) ){
	define('sohohotel_booking_AJAX_URL', admin_url('admin-ajax.php?lang=' . $sitepress->get_current_language()));
} else {
	define('sohohotel_booking_AJAX_URL', admin_url('admin-ajax.php'));
}



/* ----------------------------------------------------------------------------

   Load Shortcodes

---------------------------------------------------------------------------- */
include 'includes/shortcodes/accommodation-page.php';
include 'includes/shortcodes/accommodation-carousel.php';
include 'includes/shortcodes/booking-page.php';
include 'includes/shortcodes/booking-form-1.php';
include 'includes/shortcodes/booking-form-2.php';
include 'includes/shortcodes/availability-calendar.php';



/* ----------------------------------------------------------------------------

   Load Post Types

---------------------------------------------------------------------------- */
include 'includes/post-types/accommodation.php';
include 'includes/post-types/booking.php';
include 'includes/post-types/blocked_dates.php';
include 'includes/post-types/coupons.php';
include 'includes/post-types/services.php';



/* ----------------------------------------------------------------------------

   Load Functions

---------------------------------------------------------------------------- */
include 'includes/functions/core-functions.php';
include 'includes/functions/custom-booking-form.php';
include 'includes/functions/booking-process-frontend.php';
include 'includes/functions/booking-process-backend.php';



/* ----------------------------------------------------------------------------

   Load Template Chooser

---------------------------------------------------------------------------- */
add_filter( 'template_include', 'sohohotel_booking_template_chooser');
function sohohotel_booking_template_chooser( $template ) {

    $post_id = get_the_ID();
	
	if ( get_post_type( $post_id ) == 'booking' && is_single() ) {
		return false;
	}
	
	if ( get_post_type( $post_id ) == 'blocked_dates' && is_single() ) {
		return false;
	}
	
	if ( get_post_type( $post_id ) == 'coupon' && is_single() ) {
		return false;
	}
	
	if ( get_post_type( $post_id ) == 'booking' && is_single() ) {
		return false;
	}
	
    if ( get_post_type( $post_id ) != 'accommodation' ) {
        return $template;
    }

    if ( is_single() ) {
        return sohohotel_booking_get_template_hierarchy( 'single-accommodation' );
    }
 
}



/* ----------------------------------------------------------------------------

   Select Template

---------------------------------------------------------------------------- */
add_filter( 'template_include', 'sohohotel_booking_template_chooser' );
function sohohotel_booking_get_template_hierarchy( $template ) {
 
    $template_slug = rtrim( $template, '.htm.php' );
    $template = $template_slug . '.htm.php';
 
    if ( $theme_file = locate_template( array( 'includes/templates/' . $template ) ) ) {
        $file = $theme_file;
    }
    else {
        $file = sohohotel_booking_BASE_DIR . '/includes/templates/' . $template;
    }
 
    return apply_filters( 'sohohotel_booking_template_' . $template, $file );
}



/* ----------------------------------------------------------------------------

   Select Taxonomy Template

---------------------------------------------------------------------------- */
add_filter('template_include', 'sohohotel_booking_taxonomy_template');
function sohohotel_booking_taxonomy_template( $template ){

	if( is_tax('accommodation-categories')){
  		$template = sohohotel_booking_BASE_DIR .'/includes/templates/taxonomy-accommodation-categories.php';
 	}  
  	
	return $template;

}