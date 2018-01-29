<?php

function accommodation_carousel_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'hotel_category' => '',
		'order' => '',
		'section_title' => '',
		'section_content' => '',
		'style' => '',
		'post_limit' => ''
	), $atts ) );
	
	global $post;
	global $wp_query;
	
	ob_start();
	
	// Set Rooms Display Order
	if ( $order == 'newest' ) {
		$rooms_order = 'DESC';
	} elseif ( $order == 'oldest' ) {
		$rooms_order = 'ASC';
	} else {
		$rooms_order = 'DESC';
	}
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	if ( isset($post_limit) ) {
		$set_post_limit = $post_limit;
	} else {
		$set_post_limit = '9999';
	}
	
	// Display From Category
	if ( $hotel_category != '' ) {
		
		$args = array(
			'post_type' => 'accommodation',
			'tax_query' => array(
					array(
						'taxonomy' => 'accommodation-categories',
						'field'    => 'slug',
						'terms'    => $hotel_category,
					),
				),
			'posts_per_page' => $set_post_limit,
			'paged' => $paged,
			'order' => $rooms_order
		);
		
	} else {
		
		$args = array(
			'post_type' => 'accommodation',
			'posts_per_page' => $set_post_limit,
			'paged' => $paged,
			'order' => $rooms_order
		);
		
	}
	
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) : ?>
		
		<!-- BEGIN .content-wrapper-outer -->
		<section class="content-wrapper-outer content-wrapper clearfix our-rooms-section <?php if( $style == 'light' ) { echo 'our-rooms-section-light'; } ?>">

			<h3><?php echo $section_title; ?></h3>
			<div class="title-block-1"></div>

			<p class="fleet-intro-text"><?php echo $section_content; ?></p>

			<!-- BEGIN .rooms-block-wrapper -->
			<div class="owl-carousel1 rooms-block-wrapper">

				<?php while($wp_query->have_posts()) :

					$wp_query->the_post(); 

						global $count;
						global $sohohotel_booking_data;
						$count++;
						
					    $accommodation_meta = json_decode( get_post_meta($post->ID,'_accommodation_meta',TRUE), true );
						$accommodation_meta_room_excerpt = get_post_meta($post->ID,'_accommodation_room_excerpt_meta',TRUE);
						
					 ?>

						<!-- BEGIN .rooms-block -->
						<div class="rooms-block">

							<div class="rooms-block-image">
								
								<?php $sohohotel_diff_days = sohohotel_diff_days(date("Y-m-d"),get_the_time("Y-m-d")); ?>

								<?php if ( $sohohotel_diff_days < 20 ) { ?>
									<div class="new-icon"><?php esc_html_e('New','sohohotel_booking'); ?></div>
								<?php } ?>
								
								<?php if( has_post_thumbnail() ) { ?>
									<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style13' ); ?>
										<?php echo '<img src="' . $src[0] . '" alt="" />'; ?>
									</a>
								<?php } ?>
								
							</div>

							<div class="rooms-block-content">
								<h4><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
								<div class="title-block-2"></div>
								
								<?php if ( !empty( $accommodation_meta_room_excerpt ) ) {
									$room_excerpt = $accommodation_meta_room_excerpt;
								} else {
									$room_excerpt = '';
								} ?>
								
								<?php echo $room_excerpt; ?>
								<a href="<?php esc_url(the_permalink()); ?>" class="view-details-button"><?php esc_html_e('View Details','sohohotel_booking'); ?> <i class="fa fa-angle-right"></i></a>
							</div>
						<!-- END .rooms-block -->
						</div>

				<?php endwhile; ?>
		
			<!-- END .rooms-block-wrapper -->
			</div>

		<!-- END .content-wrapper-outer -->
		</section>
		
	<?php else : ?>
		<p><?php esc_html_e('No rooms have been added yet','sohohotel_booking'); ?></p>
	<?php endif;

	 wp_reset_query();
		
	return ob_get_clean();

}

add_shortcode( 'accommodation_carousel', 'accommodation_carousel_shortcode' );

?>