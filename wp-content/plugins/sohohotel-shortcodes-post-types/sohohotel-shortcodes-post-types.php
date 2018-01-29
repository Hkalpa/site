<?php

/*
  Plugin Name: Soho Hotel Shortcodes & Post Types
  Plugin URI: http://quitenicestuff.com
  Description: A Simple Shortcodes and Post Type Plugin
  Version: 2.0.9.1
  Author: Quite Nice Stuff
  Author URI: http://quitenicestuff.com
*/



/* ----------------------------------------------------------------------------

   Register Session

---------------------------------------------------------------------------- */
function register_session(){
	if( !session_id())
		session_start();
}

add_action('init','register_session');



/* ----------------------------------------------------------------------------

   Load Language Files

---------------------------------------------------------------------------- */
function sohohotel_init() {
	load_plugin_textdomain( 'sohohotel', false, dirname(plugin_basename( __FILE__ ))  . '/languages/' ); 
}
add_action('init', 'sohohotel_init');



/* ----------------------------------------------------------------------------

   Load Files

---------------------------------------------------------------------------- */
if ( ! defined( 'sohohotel_BASE_FILE' ) )
    define( 'sohohotel_BASE_FILE', __FILE__ );

if ( ! defined( 'sohohotel_BASE_DIR' ) )
    define( 'sohohotel_BASE_DIR', dirname( sohohotel_BASE_FILE ) );

if ( ! defined( 'sohohotel_PLUGIN_URL' ) )
    define( 'sohohotel_PLUGIN_URL', plugin_dir_url( __FILE__ ) );



/* ----------------------------------------------------------------------------

   Plugin Activation

---------------------------------------------------------------------------- */
function sohohotel_shortcodes_activation() {}
register_activation_hook(__FILE__, 'sohohotel_shortcodes_activation');

function sohohotel_shortcodes_deactivation() {}
register_deactivation_hook(__FILE__, 'sohohotel_shortcodes_deactivation');



/* ----------------------------------------------------------------------------

   Load JS

---------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'sohohotel_shortcodes_scripts');
function sohohotel_shortcodes_scripts() {
	
    global $post;
	global $sohohotel_data;

	$GoogleMapApiKey = $sohohotel_data['google-map-api-key'];
	
	wp_enqueue_script('jquery');
	
	if ( !empty($sohohotel_data['google-map-api-key']) ) {
		//wp_register_script('googleMap', 'http://maps.google.com/maps/api/js?key='.$GoogleMapApiKey);
		//wp_enqueue_script('googleMap');
	}
	
	if ( !empty($sohohotel_data['datepicker-format']) ) {
		$sohohotel_datepicker_format = $sohohotel_data['datepicker-format'];
	} else {
		$sohohotel_datepicker_format = "dd/mm/yy";
	}
	
	if ( !empty($sohohotel_data['google-map-api-key']) ) {
		wp_register_script('googlesearch', 'https://maps.googleapis.com/maps/api/js?key=' . $GoogleMapApiKey . '&libraries=places');
		wp_enqueue_script('googlesearch');
	}
	
	wp_register_script('sohohotel-custom', plugins_url('assets/js/scripts.js', __FILE__));
	
	wp_register_script('fontawesomemarkers', plugins_url('assets/js/fontawesome-markers.min.js', __FILE__));
	wp_enqueue_script('fontawesomemarkers');
	
	wp_enqueue_script( array( 'jquery-ui-core', 'jquery-ui-tabs', 'jquery-effects-core' ) );

}



/* ----------------------------------------------------------------------------

   WPML

---------------------------------------------------------------------------- */
global $sitepress;
if ( !empty($sitepress) ){
	define('AJAX_URL', admin_url('admin-ajax.php?lang=' . $sitepress->get_current_language()));
} else {
	define('AJAX_URL', admin_url('admin-ajax.php'));
}



/* ----------------------------------------------------------------------------

   Load CSS

---------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'sohohotel_shortcodes_styles');
function sohohotel_shortcodes_styles() {

	wp_register_style('style', plugins_url('assets/css/style.css', __FILE__));
    wp_enqueue_style('style');

}



/* ----------------------------------------------------------------------------

   Load Shortcodes

---------------------------------------------------------------------------- */
include 'includes/shortcodes/fleet-carousel.php';
include 'includes/shortcodes/fleet-page.php';
include 'includes/shortcodes/testimonials-carousel.php';
include 'includes/shortcodes/testimonials-page.php';
include 'includes/shortcodes/call-to-action-small.php';
include 'includes/shortcodes/call-to-action-large.php';
include 'includes/shortcodes/icon-text.php';
include 'includes/shortcodes/video-text.php';
include 'includes/shortcodes/video-thumbnail.php';
include 'includes/shortcodes/news-carousel.php';
include 'includes/shortcodes/gallery.php';
include 'includes/shortcodes/title.php';
include 'includes/shortcodes/intro-section.php';
include 'includes/shortcodes/news-page.php';
include 'includes/shortcodes/link-blocks.php';
include 'includes/shortcodes/socialmedia.php';
include 'includes/shortcodes/googlemap.php';
include 'includes/shortcodes/contactdetails.php';
include 'includes/shortcodes/button.php';
include 'includes/shortcodes/message.php';
include 'includes/shortcodes/service-rates-page.php';



/* ----------------------------------------------------------------------------

   Load Post Types

---------------------------------------------------------------------------- */
include 'includes/post-types/testimonials.php';



/* ----------------------------------------------------------------------------

   Load Template Chooser

---------------------------------------------------------------------------- */
add_filter( 'template_include', 'sohohotel_spt_template_chooser');
function sohohotel_spt_template_chooser( $template ) {
 
    if ( is_search() ) {
		
		return $template;
		
	} else {
		
		$post_id = get_the_ID();

		if ( get_post_type( $post_id ) == 'fleet' ) {
			return sohohotel_spt_get_template_hierarchy( 'single-fleet' );
		} elseif ( get_post_type( $post_id ) == 'testimonial' ) {
			return sohohotel_spt_get_template_hierarchy( 'single-testimonials' );
		} elseif ( get_post_type( $post_id ) == 'rates' ) {
			return sohohotel_spt_get_template_hierarchy( 'single-rates' );
		} elseif ( get_post_type( $post_id ) == 'payment' ) {
			return sohohotel_spt_get_template_hierarchy( 'single-payment' );
		} else {
			return $template;
		}
		
	}

}



/* ----------------------------------------------------------------------------

   Select Template

---------------------------------------------------------------------------- */
add_filter( 'template_include', 'sohohotel_spt_template_chooser' );
function sohohotel_spt_get_template_hierarchy( $template ) {
 
	if ( is_search() ) {
		
		$file = sohohotel_BASE_DIR . '/includes/templates/' . $template;
		return apply_filters( 'sohohotel_template_' . $template, $file );
	
	} else {

    	$template_slug = rtrim( $template, '.php' );
	    $template = $template_slug . '.php';

	    if ( $theme_file = locate_template( array( 'includes/templates/' . $template ) ) ) {
	        $file = $theme_file;
	    }
	    else {
	        $file = sohohotel_BASE_DIR . '/includes/templates/' . $template;
	    }

	    return apply_filters( 'sohohotel_template_' . $template, $file );
	
	}

}