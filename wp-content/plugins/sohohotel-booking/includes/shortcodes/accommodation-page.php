<?php

function accommodation_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'rooms_per_page' => '10',
		'hotel_category' => '',
		'columns' => '1',
		'order' => '',
		'style' => ''
	), $atts ) );
	
	global $post;
	global $wp_query;
	
	ob_start();
	
	// Set Rooms Displayed Per Page
	if ( $rooms_per_page != '' ) {
		$rooms_per_page = $rooms_per_page;
	} else {
		$rooms_per_page = '10';
	}
	
	// Set Rooms Display Order
	if ( $order == 'newest' ) {
		$rooms_order = 'DESC';
	} elseif ( $order == 'oldest' ) {
		$rooms_order = 'ASC';
	} else {
		$rooms_order = 'DESC';
	}
	
	// Set Columns
	if ( $columns != '' ) {
		$accommodation_columns = $columns;
	} else {
		$accommodation_columns = '1';
	}
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
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
			'posts_per_page' => $rooms_per_page,
			'paged' => $paged,
			'order' => $rooms_order
		);
		
	} else {
		
		$args = array(
			'post_type' => 'accommodation',
			'posts_per_page' => $rooms_per_page,
			'paged' => $paged,
			'order' => $rooms_order
		);
		
	}
	
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) : ?>
		
		<?php if($style == '2') { ?>
			<!-- BEGIN .room-style-2 -->
			<div class="room-style-2">
		<?php } ?>
		
		
		<?php if($columns == '1') { ?>
			
			<!-- BEGIN .rooms-block-wrapper -->
			<div class="rooms-block-wrapper room-1-cols clearfix">
		
		<?php } elseif($columns == '2') { ?>
			
			<!-- BEGIN .rooms-block-wrapper -->
			<div class="rooms-block-wrapper room-2-cols clearfix">
			
		<?php } elseif($columns == '3') { ?>
			
			<!-- BEGIN .rooms-block-wrapper -->
			<div class="rooms-block-wrapper room-3-cols clearfix">
			
		<?php } elseif($columns == '4') { ?>
			
			<!-- BEGIN .rooms-block-wrapper -->
			<div class="rooms-block-wrapper room-4-cols clearfix">
			
		<?php } elseif($columns == '5') { ?>
			
			<!-- BEGIN .rooms-block-wrapper -->
			<div class="rooms-block-wrapper room-5-cols clearfix">
			
		<?php } else { ?>
			
			<!-- BEGIN .rooms-block-wrapper -->
			<div class="rooms-block-wrapper room-3-cols clearfix">
			
		<?php } ?>
		
		<?php while($wp_query->have_posts()) :
			
			$wp_query->the_post(); 
			
				global $count;
				global $sohohotel_booking_data;
				$count++; 
				
				$accommodation_meta = json_decode( get_post_meta($post->ID,'_accommodation_meta',TRUE), true );
				$accommodation_meta_room_excerpt = get_post_meta($post->ID,'_accommodation_room_excerpt_meta',TRUE);
			?>
			
			<?php if($style == '2') { ?>
			
				<!-- BEGIN .rooms-block -->
				<div class="rooms-block">
					<div class="rooms-block-image">
						
						<div class="image-room-price"><span><?php esc_html_e('From','sohohotel_booking'); ?></span> <?php echo sh_get_price($accommodation_meta['price_adult_weekdays']); ?></div>
						
						<?php if( has_post_thumbnail() ) { ?>

							<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

								<?php if($columns == '1') { ?>
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style14' ); ?>
								<?php } else { ?>
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style13' ); ?>
								<?php } ?>

								<?php echo '<img src="' . $src[0] . '" alt="" />'; ?>
							</a>

						<?php } ?>
						
					</div>
					<div class="rooms-block-content">
						<h4><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="clearfix"><span><?php the_title(); ?></span> <i class="fa fa-angle-right"></i></a>	
						</h4>
					</div>
				<!-- END .rooms-block -->
				</div>
				
			<?php } else { ?>
			
				<!-- BEGIN .rooms-block -->
				<div class="rooms-block">

					<div class="rooms-block-image">
						<?php if( has_post_thumbnail() ) { ?>

							<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

								<?php if($columns == '1') { ?>
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style12' ); ?>
								<?php } else { ?>
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style13' ); ?>
								<?php } ?>

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
				
			<?php } ?>
			
		<?php endwhile; ?>
		
		<!-- BEGIN .rooms-block-wrapper -->
		</div>
		
		<?php if($style == '2') { ?>
			<!-- END .room-style-2 -->
			</div>
		<?php } ?>
		
		<?php else : ?>
			<p><?php esc_html_e('No rooms have been added yet','sohohotel_booking'); ?></p>
		<?php endif; ?>
		
		<?php if($style == '2') { 
			$pagination_class = 'page-pagination pagination-no-margin clearfix';
		} else {
			$pagination_class = 'page-pagination pagination-margin pagination-border clearfix';
		} ?>
		
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>

			<div class="clearboth"></div>

			<?php if(is_plugin_active('wp-pagenavi/wp-pagenavi.php')) {
				echo '<div class="' . $pagination_class . '">';
				wp_pagenavi();
				echo '</div>';
				echo '<div class="clearboth"></div>';
			} else { ?>

			<div class="<?php echo $pagination_class; ?>">
				<p class="clearfix">
					<span class="fl prev-pagination"><?php next_posts_link( esc_html__( '&larr; Older posts', 'sohohotel_booking' ) ); ?></span>
					<span class="fr next-pagination"><?php previous_posts_link( esc_html__( 'Newer posts &rarr;', 'sohohotel_booking' ) ); ?></span>	
				</p>
			</div>

			<?php } ?>

		<?php endif; wp_reset_query();
		
		return ob_get_clean();

}

add_shortcode( 'accommodation', 'accommodation_shortcode' );

?>