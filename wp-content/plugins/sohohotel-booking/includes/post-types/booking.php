<?php



/* ----------------------------------------------------------------------------

   Init

---------------------------------------------------------------------------- */
add_action( 'init', 'booking_post_type' );
add_action('add_meta_boxes', 'booking_meta_init');
add_action('save_post', 'booking_meta_save');



/* ----------------------------------------------------------------------------

   booking Post Type

---------------------------------------------------------------------------- */
function booking_post_type() {
	
	$labels = array(
        'name'                  => __('Booking','sohohotel_booking'),
        'singular_name'         => __('Booking','sohohotel_booking'),
        'menu_name'             => __('Booking','sohohotel_booking'),
        'parent_item_colon'     => __('Parent Booking:','sohohotel_booking'),
        'all_items'             => __('All Bookings','sohohotel_booking'),
        'view_item'             => __('View Booking','sohohotel_booking'),
        'add_new_item'          => __('Add New Booking','sohohotel_booking'),
        'add_new'               => __('Add Booking','sohohotel_booking'),
        'edit_item'             => __('Edit Booking','sohohotel_booking'),
        'update_item'           => __('Update Booking','sohohotel_booking'),
        'search_items'          => __('Search Booking','sohohotel_booking'),
        'not_found'             => __('Not found','sohohotel_booking'),
        'not_found_in_trash'    => __('Not found in Trash','sohohotel_booking'),
    );

    $args = array(
        'label'                 => __('booking','sohohotel_booking'),
        'description'           => '',
        'labels'                => $labels,
        'supports'              => array('title'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-home',
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );

    register_post_type( 'booking', $args );
	
}



/* ----------------------------------------------------------------------------

   booking Meta Boxes

---------------------------------------------------------------------------- */
function booking_meta_init() {
	
	add_meta_box(
		'booking_guest_meta', // id
		esc_html__( 'Guest Information', 'sohohotel_booking' ), // title
		'booking_guest_info_meta_box', // callback
		'booking', // post type
		'normal',  // context
		'high' // priority
	);
	
	add_meta_box(
		'booking_pricing_details_meta', // id
		esc_html__( 'Booking & Payment Status', 'sohohotel_booking' ), // title
		'booking_payment_details_meta_box', // callback
		'booking', // post type
		'normal',  // context
		'high' // priority
	);
	
	add_meta_box(
		'booking_rooms_meta', // id
		esc_html__( 'Rooms', 'sohohotel_booking' ), // title
		'booking_rooms_meta_box', // callback
		'booking', // post type
		'normal',  // context
		'high' // priority
	);
	
	add_meta_box(
		'booking_services_meta', // id
		esc_html__( 'Services', 'sohohotel_booking' ), // title
		'booking_services_meta_box', // callback
		'booking', // post type
		'normal',  // context
		'high' // priority
	);
	
	add_meta_box(
		'booking_ical_meta', // id
		esc_html__( 'iCal Data', 'sohohotel_booking' ), // title
		'booking_ical_meta_box', // callback
		'booking', // post type
		'normal',  // context
		'high' // priority
	);
	
    add_action('save_post','booking_meta_save');

}



/* ----------------------------------------------------------------------------

   Guest Info

---------------------------------------------------------------------------- */
function booking_guest_info_meta_box() {
	
    global $post;
	global $sohohotel_data;
	
    $booking_meta = get_post_meta($post->ID,'_booking_meta',TRUE);	
	echo '<div class="clearfix">';
	echo verifyInputs($sohohotel_data['custom_booking_form'], $booking_meta);
	echo '</div>';
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Payment Details

---------------------------------------------------------------------------- */
function booking_payment_details_meta_box() {
	
    global $post;
    $booking_meta = get_post_meta($post->ID,'_booking_meta',TRUE);
    include(sohohotel_booking_BASE_DIR . '/includes/templates/admin/booking_payment_details.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Rooms

---------------------------------------------------------------------------- */
function booking_rooms_meta_box() {
	
    global $post;
	global $store_post_id;
	$store_post_id = $post->ID;

    $booking_meta = get_post_meta($post->ID,'_booking_meta',TRUE);	
    include(sohohotel_booking_BASE_DIR . '/includes/templates/admin/booking_rooms.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Services

---------------------------------------------------------------------------- */
function booking_services_meta_box() {
	
    global $post;
	global $store_post_id;

    $booking_meta = get_post_meta($store_post_id,'_booking_meta',TRUE);
	include(sohohotel_booking_BASE_DIR . '/includes/templates/admin/booking_services.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   iCal

---------------------------------------------------------------------------- */
function booking_ical_meta_box() {
	
    global $post;
	global $store_post_id;

    $booking_meta = get_post_meta($store_post_id,'_booking_meta',TRUE);
	include(sohohotel_booking_BASE_DIR . '/includes/templates/admin/booking_ical.htm.php');
    echo '<input type="hidden" name="booking_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';

}



/* ----------------------------------------------------------------------------

   Save Meta Data

---------------------------------------------------------------------------- */
function booking_meta_save( $post_id ){
	
	if ( isset($_POST['booking_meta_noncename'])) {
		
		if (!wp_verify_nonce($_POST['booking_meta_noncename'],__FILE__)) {
			return $post_id;
		}

		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;

		update_post_meta($post_id,'_booking_meta',$_POST['_booking_meta']);

	}

}


?>