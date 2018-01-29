<?php get_header(); ?>

<?php if ($sohohotel_title_style != 'no_title') { ?>
<div id="page-header" <?php echo wp_kses($sohohotel_page_header_image, $sohohotel_allowed_html_array_header); ?>>
	<h1><?php esc_html_e('Search Results','sohohotel')?></h1>
	<div class="title-block-5"></div>
	<?php echo dimox_breadcrumbs();?>
</div>
<?php } ?>

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper-max-width content-wrapper clearfix">

	<!-- BEGIN .main-content -->
	<div class="main-content">
		
		<!-- BEGIN .search-results-form -->
		<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-results-form clearfix">
			<input type="text" onblur="if(this.value=='')this.value='<?php esc_html_e('To search, type and hit enter', 'sohohotel'); ?>';" onfocus="if(this.value=='<?php esc_html_e('To search, type and hit enter', 'sohohotel'); ?>')this.value='';" value="<?php esc_html_e('To search, type and hit enter', 'sohohotel'); ?>" name="s" />
			<button type="submit">
				<?php esc_html_e('Search','sohohotel'); ?> <i class="fa fa-search"></i>
			</button>
		<!-- END .search-results-form -->
		</form>
			
		<?php if (have_posts()) : ?>

			<!--BEGIN .search-results-list -->
			<ul class="search-results-list">

				<?php $i = 0;
				while (have_posts()) : the_post(); ?>
					<li><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <span>(<?php echo sohohotel_post_type_name(get_post_type());?> / <a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo get_the_date('F j, Y'); ?></a>)</span></li>
				<?php endwhile;?>

			<!--END .search-results-list -->
			</ul>

		<?php else : ?>

			<!--BEGIN .search-results-list -->
			<ul class="search-results-list">
				<li><?php esc_html_e( 'No results were found.', 'sohohotel' ); ?></li>
			<!--END .search-results-list -->
			</ul>

		<?php endif; ?>
		
		<!-- END .main-content -->
		</div>

		<!-- BEGIN .sidebar-content -->
		<div class="sidebar-content">

			<?php get_sidebar(); ?>

		<!-- END .sidebar-content -->
		</div>

<!-- END .content-wrapper-outer -->
</div>

<?php get_footer(); ?>