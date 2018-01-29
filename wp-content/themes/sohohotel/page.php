<?php get_header(); ?>

<?php if ($sohohotel_title_style != 'no_title') { ?>
<div id="page-header" <?php echo wp_kses($sohohotel_page_header_image, $sohohotel_allowed_html_array_header); ?>>
	<h1><?php the_title(); ?></h1>
	<div class="title-block-5"></div>
	<?php echo dimox_breadcrumbs();?>
</div>
<?php } ?>

<?php if ( $sohohotel_page_layout != 'booking-system' ) { ?> 
	
	<!-- BEGIN .content-wrapper -->
	<div class="<?php if ( $sohohotel_page_layout != 'unboxed-full-width' ) {echo 'content-wrapper-max-width'; } ?> content-wrapper clearfix">
	
<?php } ?>

	<!-- BEGIN .main-content -->
	<div class="<?php echo wp_kses(sohohotel_sidebar1($sohohotel_page_layout), $sohohotel_allowed_html_array); ?>">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>			
			<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages:', 'sohohotel').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>			
			<?php if ( comments_open() ) : comments_template(); endif; ?>
		<?php endwhile;endif; ?>
		
	<!-- END .main-content -->
	</div>
	
	<?php if ( $sohohotel_page_layout != 'full-width' ) { ?>
	<?php if ( $sohohotel_page_layout != 'unboxed-full-width' ) { ?>
	<?php if ( $sohohotel_page_layout != 'booking-system' ) { ?>
	
	<!-- BEGIN .sidebar-content -->
	<div class="<?php echo sohohotel_sidebar2($sohohotel_page_layout); ?>">
		
		<?php get_sidebar(); ?>
		
	<!-- END .sidebar-content -->
	</div>
	
	<?php } ?>
	<?php } ?>
	<?php } ?>

<?php if ( $sohohotel_page_layout != 'booking-system' ) { ?> 

<!-- END .content-wrapper-outer -->
</div>

<?php } else { ?>
	<div class="clearboth"></div>
<?php } ?>

<?php get_footer(); ?>