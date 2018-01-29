<?php get_header(); ?>

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
			echo sohohotel_password_form();
		} else { ?>
			
			<!-- BEGIN .testimonial-list-wrapper -->
			<div class="testimonial-list-wrapper testimonial-list-wrapper-full">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<?php
					// Get testimonial data
					$testimonial_name = get_post_meta($post->ID, 'sohohotel_testimonial_name', true);
					$testimonial_other_details = get_post_meta($post->ID, 'sohohotel_testimonial_other_details', true);			
				?>
			
				<!-- BEGIN .testimonial-wrapper -->
				<div id="post-<?php the_ID(); ?>" class="testimonial-wrapper">
					
					<div><span class="qns-open-quote">“</span><?php the_content(); ?><span class="qns-close-quote">”</span></div>
										
					<?php if( has_post_thumbnail() ) { ?>

						<div class="testimonial-image">
							<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style7' ); ?>
							<?php echo '<img src="' . $src[0] . '" alt="" />'; ?>
						</div>

					<?php } ?>

					<div class="testimonial-author"><p><?php echo esc_textarea($testimonial_name); ?> - <?php echo esc_textarea($testimonial_other_details); ?></p></div>
										
				<!-- END .testimonial-wrapper -->
				</div>

			<?php endwhile;endif; ?>
			
			<!-- END .testimonial-list-wrapper -->
			</div>
			
		<?php } ?>
		
		<!-- END .main-content -->
		</div>

		<?php if ( $sohohotel_page_layout != 'full-width' ) { ?>
		<?php if ( $sohohotel_page_layout != 'unboxed-full-width' ) { ?>

		<!-- BEGIN .sidebar-content -->
		<div class="<?php echo sohohotel_sidebar2($sohohotel_page_layout); ?>">

			<?php get_sidebar(); ?>

		<!-- END .sidebar-content -->
		</div>

	<?php } ?>
	<?php } ?>

<!-- END .content-wrapper-outer -->
</div>

<?php get_footer(); ?>