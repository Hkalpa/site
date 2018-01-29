<?php

function testimonials_carousel_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'section_title' => '',
			'posts_per_page' => '10',
			'order' => '',
			'background_image_url' => ''
		), $atts ) );

		global $post;
		global $wp_query;
		$prefix = 'sohohotel_';
		
		// Set Posts Displayed Per Page
		if ( $posts_per_page != '' ) {
			$posts_per_page = $posts_per_page;
		} else {
			$posts_per_page = '1';
		}

		// Set Posts Display Order
		if ( $order == 'newest' ) {
			$order = 'DESC';
		} elseif ( $order == 'oldest' ) {
			$order = 'ASC';
		} else {
			$order = 'DESC';
		}

	ob_start(); ?>
	
	
	
		<?php if ($section_title != '') { ?>
			
			<h3 class="center-title"><?php echo $section_title; ?></h3>
			<div class="title-block-1"></div>
			
		<?php } ?>

		<!-- BEGIN .testimonial-wrapper-outer -->
		<div class="testimonial-wrapper-outer">

			<!-- BEGIN .testimonial-list-wrapper -->
			<div class="testimonial-list-wrapper owl-carousel3">

				<?php $args = array(
		            'posts_per_page' => $posts_per_page,
		            'ignore_sticky_posts' => 1,
		            'post_type' => 'testimonial',
		            'order' => 'DESC',
		            'orderby' => 'date'
		        );

				$post_query = new WP_Query( $args );

				$sohohotel_count_total_posts = $post_query->post_count;

				if( $post_query->have_posts() ) : while( $post_query->have_posts() ) : $post_query->the_post(); ?>

					<?php
						// Get testimonial data
						$testimonial_name = get_post_meta($post->ID, $prefix.'testimonial_name', true);
						$testimonial_other_details = get_post_meta($post->ID, $prefix.'testimonial_other_details', true);			
					?>

					<!-- BEGIN .testimonial-wrapper -->
					<div class="testimonial-wrapper">
						
						<?php
						
						$formatted_content = substr(get_the_content(),0,145).'...';
						
						?>
						
						<div><span class="qns-open-quote">“</span><?php echo $formatted_content; ?><span class="qns-close-quote">”</span></div>

						<?php if( has_post_thumbnail() ) { ?>

							<div class="testimonial-image">
								<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style7' ); ?>
								<?php echo '<img src="' . $src[0] . '" alt="" />'; ?>
							</div>

						<?php } ?>

						<div class="testimonial-author"><p><?php echo esc_textarea($testimonial_name); ?> - <?php echo esc_textarea($testimonial_other_details); ?></p></div>

					<!-- END .testimonial-wrapper -->
					</div>

				<?php endwhile; endif; ?>

			<!-- END .testimonial-list-wrapper -->
			</div>

		<!-- END .testimonial-wrapper-outer -->
		</div>
	

	
	<?php return ob_get_clean();

}

add_shortcode( 'testimonials_carousel', 'testimonials_carousel_shortcode' );

?>