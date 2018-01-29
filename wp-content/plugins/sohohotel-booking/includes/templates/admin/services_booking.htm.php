<?php

global $post;
global $wp_query;

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

print_r($booking_meta);

if(match_service(get_the_title(), $booking_meta)) { ?>
    
	<div class="service-list-wrapper clearfix">	
		<input type="checkbox" name="guest_service_[]" value="<?php echo get_the_title() . ',' . $service_meta['price'] . ',' . $service_meta['price_scheme_1'] . ',' . $service_meta['price_scheme_2']; ?>" class="fl" checked />
		<label for="guest_service_[]" class="fl"><?php the_title(); ?> <span>(<?php echo sh_get_price($service_meta['price']); ?> / <?php echo $price_scheme_1; ?> / <?php echo $price_scheme_2; ?>)</span></label>
	</div>

<?php } else { ?>
	
	<div class="service-list-wrapper clearfix">	
		<input type="checkbox" name="guest_service_[]" value="<?php echo get_the_title() . ',' . $service_meta['price'] . ',' . $service_meta['price_scheme_1'] . ',' . $service_meta['price_scheme_2']; ?>" class="fl" />
		<label for="guest_service_[]" class="fl"><?php the_title(); ?> <span>(<?php echo sh_get_price($service_meta['price']); ?> / <?php echo $price_scheme_1; ?> / <?php echo $price_scheme_2; ?>)</span></label>
	</div>
	
<?php } ?>