<?php

$args = array(
'post_type' => 'service',
'posts_per_page' => '9999'
);

$wp_query = new WP_Query( $args );
if ($wp_query->have_posts()) : ?>
		
	<?php while($wp_query->have_posts()) :
		
		$wp_query->the_post(); ?>

		<?php
			// Get service data
			$service_meta = get_post_meta($post->ID,'_service_meta',TRUE);
		?>
		
		<!-- BEGIN .clearfix -->
		<div class="clearfix">
			
			<div class="service-input-wrapper">
				<input type="checkbox" name="_booking_meta[service_<?php echo the_ID(); ?>]" value="true" <?php if( !empty($booking_meta['service_' . get_the_ID()]) ) { echo 'checked'; } ?>>
			</div>
			
			<div class="service-label-wrapper">
				<label for="_booking_meta[service_<?php echo the_ID(); ?>]"><?php echo get_the_title() . ' (' . sh_get_price($service_meta['price']) . ' / ' . sh_get_service_name($service_meta['price_scheme_1']) . ' / ' . sh_get_service_name($service_meta['price_scheme_2']) . ')'; ?></label>
			</div>
		
		<!-- END .clearfix -->
		</div>
		
	<?php endwhile; ?>
	
	<?php else : ?>
		<p><?php esc_html_e('There are no services available','sohohotel_booking'); ?></p>
	<?php endif;

wp_reset_query();

?>