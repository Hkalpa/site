<?php get_header(); ?>

<div id="page-header" <?php echo wp_kses($sohohotel_page_header_image, $sohohotel_allowed_html_array_header); ?>>	
	<h1><?php esc_html_e('Latest News','sohohotel'); ?></h1>
	<div class="title-block-5"></div>
	<?php echo dimox_breadcrumbs();?>
</div>

<!-- BEGIN .content-wrapper -->
<div class="<?php if ( $sohohotel_page_layout != 'unboxed-full-width' ) {echo 'content-wrapper-max-width'; } ?> content-wrapper clearfix">

	<!-- BEGIN .main-content -->
	<div class="<?php echo wp_kses(sohohotel_sidebar1($sohohotel_page_layout), $sohohotel_allowed_html_array); ?>">
			
		<?php if ( post_password_required() ) {
			echo sohohotel_password_form();
		} else { ?>
				
			<!-- BEGIN .news-block-wrapper -->
			<div class="news-block-wrapper news-block-wrapper-1-col-listing news-single clearfix">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
				<!-- BEGIN .latest-news-block -->
				<div id="post-<?php the_ID(); ?>" <?php post_class("latest-news-block"); ?>>

					<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

					<!-- BEGIN .news-meta -->
					<div class="news-meta clearfix">
						<span class="nm-news-date"><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_date(); ?></a></span>
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

						<?php the_content(); ?>
						
						<?php
						 	$defaults = array(
								'before'           => '<div class="post-pagination">',
								'after'            => '</div>',
								'link_before'      => '<span>',
								'link_after'       => '</span>',
								'next_or_number'   => 'number',
								'separator'        => ' ',
								'nextpagelink'     => esc_html__( 'Next page','sohohotel' ),
								'previouspagelink' => esc_html__( 'Previous page','sohohotel' ),
								'pagelink'         => '%',
								'echo'             => 1
							);

						        wp_link_pages( $defaults );

							?>
						
						<p class="post-tags"><?php the_tags( esc_html__('Tags: ','sohohotel'), ', ', '' ); ?></p>
						
				<!-- END .news-block -->
				</div>
					
			<!-- END .news-block-wrapper -->
			</div>	
					
			<?php endwhile; ?>
			<?php endif; ?>
			
			<?php 
				comments_template();
		 	?>

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