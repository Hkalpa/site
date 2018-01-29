<?php get_header(); ?>

<!-- BEGIN .page-not-found -->
<div class="page-not-found">
	
	<h1><?php esc_html_e('Page Not Found', 'sohohotel'); ?></h1>
	<div class="title-block-5"></div>
	<p><?php esc_html_e('Sorry, the requested page could not be found, the page may have been deleted or you may have followed a broken link.', 'sohohotel'); ?></p>
	
	<!-- BEGIN .page-not-found-search-form -->
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="clearfix" method="get">

		<input class="menu-search-field" type="text" onblur="if(this.value=='')this.value='<?php esc_html_e('Search...', 'sohohotel'); ?>';" onfocus="if(this.value=='<?php esc_html_e('Search...', 'sohohotel'); ?>')this.value='';" value="<?php esc_html_e('Search...', 'sohohotel'); ?>" name="s" />

		<button type="submit"><i class="fa fa-search"></i></button>

	<!-- END .page-not-found-search-form -->
	</form>

<!-- END .page-not-found -->
</div>

<?php get_footer(); ?>