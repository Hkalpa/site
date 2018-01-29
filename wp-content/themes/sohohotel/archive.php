<?php

	// Display Header
	get_header();
	
/* ----------------------------------------------------------------------------

   Get Page Title

---------------------------------------------------------------------------- */

	// Category
	if (is_category()) :
		$page_title = sprintf( esc_html__('All posts in: "%s"', 'sohohotel'), single_cat_title('',false) );

	// Tag
	elseif (is_tag()) :
		$page_title = sprintf( esc_html__('All posts tagged: "%s"', 'sohohotel'), single_tag_title('',false) );

	// Author
	elseif ( is_author() ) :	
		$userdata = get_userdata($author);
		$page_title = sprintf( esc_html__('All posts by: "%s"', 'sohohotel'), $userdata->display_name );

	// Day
	elseif ( is_day() ) :
		$page_title = sprintf( esc_html__( 'Daily Archives: %s', 'sohohotel' ), get_the_date() );
	
	// Month	
	elseif ( is_month() ) :
		$page_title = sprintf( esc_html__( 'Monthly Archives: %s', 'sohohotel' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'sohohotel' ) ) );
	
	// Year
	elseif ( is_year() ) :
		$page_title = sprintf( esc_html__( 'Yearly Archives: %s', 'sohohotel' ), get_the_date( _x( 'Y', 'yearly archives date format', 'sohohotel' ) ) );
	
	else : 
		$page_title = esc_html__('Archives', 'sohohotel');
	
	endif; ?>
	
	<div id="page-header" <?php echo wp_kses($sohohotel_page_header_image, $sohohotel_allowed_html_array_header); ?>>	
		<h1><?php echo esc_attr($page_title); ?></h1>
		<div class="title-block-5"></div>
		<?php echo dimox_breadcrumbs();?>
	</div>

	<!-- BEGIN .content-wrapper -->
	<div class="<?php if ( $sohohotel_page_layout != 'unboxed-full-width' ) {echo 'content-wrapper-max-width'; } ?> content-wrapper clearfix">

		<!-- BEGIN .main-content -->
		<div class="<?php echo wp_kses(sohohotel_sidebar1($sohohotel_page_layout), $sohohotel_allowed_html_array); ?>">
		
		<?php if ( have_posts() ) : ?>
			
			<?php if ( category_description() ) : ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
				
				<!-- BEGIN .news-block-wrapper -->
				<div class="news-block-wrapper news-block-wrapper-1-col-listing clearfix">
				
				<?php while ( have_posts() ) : the_post(); ?>
					
					<!-- BEGIN .latest-news-block -->
					<div id="post-<?php the_ID(); ?>" <?php post_class("latest-news-block"); ?>>

						<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

						<!-- BEGIN .news-meta -->
						<div class="news-meta clearfix">
							<span class="nm-news-date"><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo get_the_date('F j, Y'); ?></a></span>
							<span class="nm-news-author"><?php esc_html_e('By','sohohotel'); ?> <?php the_author_posts_link(); ?></span>
							<span class="nm-news-category"><?php the_category(', '); ?></span>
							<span class="nm-news-comments"><?php comments_popup_link(esc_html__( 'No Comments', 'sohohotel' ),esc_html__( '1 Comment', 'sohohotel' ),esc_html__( '% Comments', 'sohohotel' ),'',esc_html__( 'Comments Off','sohohotel')); ?></span>
						<!-- END .news-meta -->
						</div>

						<?php if( has_post_thumbnail() ) { ?>

							<div class="news-block-image">
								<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style2' ); ?>
									<?php echo '<img src="' . esc_url( $src[0] ) . '" alt="" />'; ?>
								</a>
							</div>

						<?php } ?>

						<!-- BEGIN .news-description -->
						<div class="news-description clearfix">

							<?php global $more;$more = 0;?>
							<?php the_content(esc_html__('Read More','sohohotel') . ' <i class="fa fa-angle-right"></i>'); ?>

						<!-- END .news-description -->
						</div>

					<!-- END .latest-news-block -->
					</div>
					
				<?php endwhile; ?>
				
				<!-- END .news-block-wrapper -->
				</div>

			<?php get_template_part( 'loop', 'pagination' ); ?>
			
		<?php endif; ?>
		
	<!-- END .main-content -->
	</div>
		
	<!-- BEGIN .sidebar-content -->
	<div class="sidebar-content">

		<?php get_sidebar(); ?>

	<!-- END .sidebar-content -->
	</div>

<!-- END .content-wrapper -->
</div>

<?php get_footer(); ?>