<?php get_header(); ?>

<div id="page-header" <?php echo wp_kses($sohohotel_page_header_image, $sohohotel_allowed_html_array_header); ?>>	
	<h1><?php esc_html_e('Blog', 'sohohotel'); ?></h1>
	<div class="title-block-5"></div>
	<?php echo dimox_breadcrumbs();?>
</div>

<!-- BEGIN .content-wrapper -->
<div class="<?php if ( $sohohotel_page_layout != 'unboxed-full-width' ) {echo 'content-wrapper-max-width'; } ?> content-wrapper clearfix">

	<!-- BEGIN .main-content -->
	<div class="<?php echo wp_kses(sohohotel_sidebar1($sohohotel_page_layout), $sohohotel_allowed_html_array); ?>">
		
		<?php if(get_option('posts_per_page')) {
			$posts_per_page = esc_attr(get_option('posts_per_page'));
		} else {
			$posts_per_page = '10';
		} ?>
		
		<!-- BEGIN .news-block-wrapper -->
		<div class="news-block-wrapper news-block-wrapper-1-col-listing clearfix">
			
			<?php $count = 0; ?>
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
			<?php query_posts( "post_type=post&paged=" . $paged . "&posts_per_page=" . $posts_per_page ); ?>
			<?php if ( have_posts() ) : ?>
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
			<?php endif; ?>
		
		<!-- END .news-block-wrapper -->
		</div>
		
		<?php get_template_part( 'loop', 'pagination' ); ?>
		
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