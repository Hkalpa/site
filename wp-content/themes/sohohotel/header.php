<?php

// Set Global Variables
global $sohohotel_data;
global $sohohotel_page_layout;
global $sohohotel_page_header_image;
global $sohohotel_title_style;

$sohohotel_page_layout_var = get_post_meta(get_the_ID(), 'sohohotel_page_layout', true);

// Get Page Layout
if( empty($sohohotel_page_layout_var) ) {
	
	if ( empty($sohohotel_data['site-layout-style']) ) {
		$sohohotel_page_layout = 'right-sidebar';
	} else {
		$sohohotel_page_layout = esc_html($sohohotel_data['site-layout-style']);
	}

} else {
	$sohohotel_page_layout = get_post_meta(get_the_ID(), 'sohohotel_page_layout', true);
}

// Get Page Header Image
if ( is_404() ) {
	$sohohotel_page_header_image = sohohotel_page_header('');
} elseif ( is_search() ) {
	$sohohotel_page_header_image = sohohotel_page_header('');
} else {
	$sohohotel_page_header_image = sohohotel_page_header(wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sohohotel-image-style11' ));
}

// Get Page Title Style
$sohohotel_title_style = get_post_meta(get_the_ID(), 'sohohotel_title_style', true);

// Reset Query
wp_reset_postdata();

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- BEGIN head -->
<head>
	
	<!--Meta Tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php wp_head(); ?>
	
<!-- END head -->
</head>

<?php if( $sohohotel_data['site-header-style'] == 'sohohotel-header1' ) {
	$sohohotel_site_style = 'site-style-1';
} elseif( $sohohotel_data['site-header-style'] == 'sohohotel-header2' ) {
	$sohohotel_site_style = 'site-style-2';
} elseif( $sohohotel_data['site-header-style'] == 'sohohotel-header3' ) {
	$sohohotel_site_style = 'site-style-3';
} elseif( $sohohotel_data['site-header-style'] == 'sohohotel-header4' ) {
	$sohohotel_site_style = 'site-style-4';
} else {
	$sohohotel_site_style = 'site-style-1';
} ?>

<?php $sohohotel_body_class = $sohohotel_site_style . ' ' . $sohohotel_page_layout; ?>

<!-- BEGIN body -->
<body <?php body_class(); ?>>
	
	<!-- BEGIN .outer-wrapper -->
	<div class="outer-wrapper <?php if(!empty($sohohotel_body_class)) {echo $sohohotel_body_class;} ?>">
	
	<!-- BEGIN .boxed-wrapper -->
	<div class="boxed-wrapper">
		
		<?php if( $sohohotel_data['site-header-style'] == 'sohohotel-header4' ) { ?>
		
			<!-- BEGIN .header-wrapper-4 -->
			<div class="header-wrapper-4 clearfix">

				<!-- BEGIN .logo-navigation-wrapper -->
				<div class="logo-navigation-wrapper clearfix">

					<!-- BEGIN .logo -->
					<div class="logo">

						<?php if ( !empty($sohohotel_data['logo-image']['url'] ) ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sohohotel_data['logo-image']['url']); ?>" alt="" /></a>
						<?php } else { ?>
							<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> <span><?php bloginfo( 'description' ); ?></span></h2>
						<?php } ?>

					<!-- END .logo -->
					</div>

					<!-- BEGIN #primary-navigation -->
					<nav id="primary-navigation" class="navigation-wrapper fixed-navigation clearfix">

						<!-- BEGIN .navigation-inner -->
						<div class="navigation-inner clearfix">

							<!-- BEGIN .logo -->
							<div class="logo">

								<?php if ( !empty($sohohotel_data['logo-image-sticky-header']['url'] ) ) { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sohohotel_data['logo-image-sticky-header']['url']); ?>" alt="" /></a>
								<?php } else { ?>
									<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
								<?php } ?>

							<!-- END .logo -->
							</div>

							<!-- BEGIN .navigation -->
							<div class="navigation clearfix">

								<?php wp_nav_menu( array(
									'theme_location' => 'primary',
									'container' => false,
									'items_wrap' => '<ul>%3$s</ul>',
									'fallback_cb' => 'sohohotel_main_menu_fallback',
									'echo' => true,
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'depth' => 0,
									'walker' => new description_walker() )
							 	); ?>

								<a href="<?php if( $sohohotel_data["booking_page_url"] ) { ?><?php echo $sohohotel_data["booking_page_url"]; ?><?php } ?>" class="menu-button"><?php if( $sohohotel_data['top-right-button-text'] ) { ?><?php echo esc_attr($sohohotel_data['top-right-button-text']); ?><?php } ?></a>
								
								<?php wp_nav_menu( array(
									'theme_location' => 'top-right',
									'container' =>false,
									'items_wrap' => '<ul class="language-navigation">%3$s</ul>',
									'fallback_cb' => false,
									'echo' => true,
									'before' => '',
									'after' => '',
									'link_before' => '<strong>',
									'link_after' => '</strong>',
									'depth' => 0 )
								); ?>

							<!-- END .navigation -->
							</div>

						<!-- END .navigation-inner -->
						</div>

					<!-- END #primary-navigation -->
					</nav>

					<a href="#" id="mobile-navigation-btn"><i class="fa fa-bars"></i></a>

				<!-- END .logo-navigation-wrapper -->
				</div>

				<!-- BEGIN .mobile-navigation-wrapper -->
				<div class="mobile-navigation-wrapper">

					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
						'items_wrap' => '<ul>%3$s</ul>',
						'fallback_cb' => 'sohohotel_main_menu_fallback',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'walker' => new description_walker() )
				 	); ?>

				<!-- END .mobile-navigation-wrapper -->
				</div>

			<!-- END .header-wrapper-4 -->
			</div>
		
		<?php } elseif ( $sohohotel_data['site-header-style'] == 'sohohotel-header2' ) { ?>
			
			<!-- BEGIN .header-wrapper-2 -->
			<div class="header-wrapper-2 clearfix">

				<!-- BEGIN .top-bar-wrapper -->
				<div class="top-bar-wrapper">

					<!-- BEGIN .top-bar -->
					<div class="top-bar clearfix">

						<!-- BEGIN .top-left-icons -->
						<ul class="top-left-icons clearfix">
							<?php if( $sohohotel_data['top-left-phone'] ) { ?><li class="phone-icon"><?php echo esc_attr($sohohotel_data['top-left-phone']); ?></li><?php } ?>
							<?php if( $sohohotel_data['top-left-address'] ) { ?><li class="map-icon"><?php echo esc_attr($sohohotel_data['top-left-address']); ?></li><?php } ?>
						<!-- END .top-left-icons -->
						</ul>

						<!-- BEGIN .top-right-wrapper -->
						<div class="top-right-wrapper clearfix">
							<div class="language-menu clearfix"><p><span><?php if( $sohohotel_data['top-right-menu-text'] ) { ?><?php echo esc_attr($sohohotel_data['top-right-menu-text']); ?><?php } ?></span></p> <?php wp_nav_menu( array(
								'theme_location' => 'top-right',
								'container' =>false,
								'items_wrap' => '<ul>%3$s</ul>',
								'fallback_cb' => false,
								'echo' => true,
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'depth' => 0 )
							); ?></div>
							<a href="<?php if( $sohohotel_data["booking_page_url"] ) { ?><?php echo $sohohotel_data["booking_page_url"]; ?><?php } ?>" class="top-right-button"><?php if( $sohohotel_data['top-right-button-text'] ) { ?><?php echo esc_attr($sohohotel_data['top-right-button-text']); ?><?php } ?> <i class="fa fa-calendar"></i></a>
						<!-- END .top-right-wrapper -->
						</div>

					<!-- END .top-bar -->
					</div>

				<!-- END .top-bar-wrapper -->
				</div>

				<!-- BEGIN .logo-navigation-wrapper -->
				<div class="logo-navigation-wrapper clearfix">

					<!-- BEGIN .logo -->
					<div class="logo">

						<?php if ( !empty($sohohotel_data['logo-image']['url'] ) ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sohohotel_data['logo-image']['url']); ?>" alt="" /></a>
						<?php } else { ?>
							<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> <span><?php bloginfo( 'description' ); ?></span></h2>
						<?php } ?>

					<!-- END .logo -->
					</div>

					<!-- BEGIN #primary-navigation -->
					<nav id="primary-navigation" class="navigation-wrapper fixed-navigation clearfix">

						<!-- BEGIN .navigation-inner -->
						<div class="navigation-inner clearfix">

							<!-- BEGIN .logo -->
							<div class="logo">

								<?php if ( !empty($sohohotel_data['logo-image-sticky-header']['url'] ) ) { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sohohotel_data['logo-image-sticky-header']['url']); ?>" alt="" /></a>
								<?php } else { ?>
									<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
								<?php } ?>

							<!-- END .logo -->
							</div>

							<!-- BEGIN .navigation -->
							<div class="navigation">

								<?php wp_nav_menu( array(
									'theme_location' => 'primary',
									'container' => false,
									'items_wrap' => '<ul>%3$s</ul>',
									'fallback_cb' => 'sohohotel_main_menu_fallback',
									'echo' => true,
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'depth' => 0,
									'walker' => new description_walker() )
							 	); ?>

								<a href="#search-lightbox" data-gal="prettyPhoto" id="menu-search-icon"><i class="fa fa-search"></i></a>

								<!-- BEGIN #search-lightbox -->
								<div id="search-lightbox">

									<!-- BEGIN .search-lightbox-inner -->
									<div class="search-lightbox-inner">

										<form name="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
											<input class="menu-search-field" type="text" onblur="if(this.value=='')this.value='<?php esc_html_e('To search, type and hit enter', 'sohohotel'); ?>';" onfocus="if(this.value=='<?php esc_html_e('To search, type and hit enter', 'sohohotel'); ?>')this.value='';" value="<?php esc_html_e('To search, type and hit enter', 'sohohotel'); ?>" name="s" />
										</form>

									<!-- END .search-lightbox-inner -->
									</div>

								<!-- END #search-lightbox -->
								</div>

							<!-- END .navigation -->
							</div>

						<!-- END .navigation-inner -->
						</div>

					<!-- END #primary-navigation -->
					</nav>

					<a href="#" id="mobile-navigation-btn"><i class="fa fa-bars"></i></a>

				<!-- END .logo-navigation-wrapper -->
				</div>

				<!-- BEGIN .mobile-navigation-wrapper -->
				<div class="mobile-navigation-wrapper">

					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
						'items_wrap' => '<ul>%3$s</ul>',
						'fallback_cb' => 'sohohotel_main_menu_fallback',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'walker' => new description_walker() )
				 	); ?>

				<!-- END .mobile-navigation-wrapper -->
				</div>

			<!-- END .header-wrapper-2 -->
			</div>
			
		<?php } elseif ( $sohohotel_data['site-header-style'] == 'sohohotel-header3' ) { ?>
		
			<!-- BEGIN .header-wrapper-3 -->
			<div class="header-wrapper-3 clearfix">

				<!-- BEGIN .top-bar-wrapper -->
				<div class="top-bar-wrapper">

					<!-- BEGIN .top-bar -->
					<div class="top-bar clearfix">

						<!-- BEGIN .top-left-icons -->
						<ul class="top-left-icons clearfix">
							<?php if( $sohohotel_data['top-left-phone'] ) { ?><li class="phone-icon"><?php echo esc_attr($sohohotel_data['top-left-phone']); ?></li><?php } ?>
							<?php if( $sohohotel_data['top-left-address'] ) { ?><li class="map-icon"><?php echo esc_attr($sohohotel_data['top-left-address']); ?></li><?php } ?>
						<!-- END .top-left-icons -->
						</ul>

						<!-- BEGIN .top-right-wrapper -->
						<div class="top-right-wrapper clearfix">
							<div class="language-menu clearfix"><p><span><?php if( $sohohotel_data['top-right-menu-text'] ) { ?><?php echo esc_attr($sohohotel_data['top-right-menu-text']); ?><?php } ?></span></p> <?php wp_nav_menu( array(
								'theme_location' => 'top-right',
								'container' =>false,
								'items_wrap' => '<ul>%3$s</ul>',
								'fallback_cb' => false,
								'echo' => true,
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'depth' => 0 )
							); ?></div>
							<a href="<?php if( $sohohotel_data["booking_page_url"] ) { ?><?php echo $sohohotel_data["booking_page_url"]; ?><?php } ?>" class="top-right-button"><?php if( $sohohotel_data['top-right-button-text'] ) { ?><?php echo esc_attr($sohohotel_data['top-right-button-text']); ?><?php } ?> <i class="fa fa-calendar"></i></a>
						<!-- END .top-right-wrapper -->
						</div>

					<!-- END .top-bar -->
					</div>

				<!-- END .top-bar-wrapper -->
				</div>

				<!-- BEGIN .logo-navigation-wrapper -->
				<div class="logo-navigation-wrapper clearfix">

					<!-- BEGIN .logo -->
					<div class="logo">

						<?php if ( !empty($sohohotel_data['logo-image']['url'] ) ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sohohotel_data['logo-image']['url']); ?>" alt="" /></a>
						<?php } else { ?>
							<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> <span><?php bloginfo( 'description' ); ?></span></h2>
						<?php } ?>

					<!-- END .logo -->
					</div>

					<!-- BEGIN #primary-navigation -->
					<nav id="primary-navigation" class="navigation-wrapper fixed-navigation clearfix">

						<!-- BEGIN .navigation-inner -->
						<div class="navigation-inner clearfix">

							<!-- BEGIN .logo -->
							<div class="logo">

								<?php if ( !empty($sohohotel_data['logo-image-sticky-header']['url'] ) ) { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sohohotel_data['logo-image-sticky-header']['url']); ?>" alt="" /></a>
								<?php } else { ?>
									<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
								<?php } ?>

							<!-- END .logo -->
							</div>

							<!-- BEGIN .navigation -->
							<div class="navigation">

								<?php wp_nav_menu( array(
									'theme_location' => 'primary',
									'container' => false,
									'items_wrap' => '<ul>%3$s</ul>',
									'fallback_cb' => 'sohohotel_main_menu_fallback',
									'echo' => true,
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'depth' => 0,
									'walker' => new description_walker() )
							 	); ?>

								<a href="#search-lightbox" data-gal="prettyPhoto" id="menu-search-icon"><i class="fa fa-search"></i></a>

								<!-- BEGIN #search-lightbox -->
								<div id="search-lightbox">

									<!-- BEGIN .search-lightbox-inner -->
									<div class="search-lightbox-inner">

										<form name="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
											<input class="menu-search-field" type="text" onblur="if(this.value=='')this.value='<?php esc_html_e('To search, type and hit enter', 'sohohotel'); ?>';" onfocus="if(this.value=='<?php esc_html_e('To search, type and hit enter', 'sohohotel'); ?>')this.value='';" value="<?php esc_html_e('To search, type and hit enter', 'sohohotel'); ?>" name="s" />
										</form>

									<!-- END .search-lightbox-inner -->
									</div>

								<!-- END #search-lightbox -->
								</div>

							<!-- END .navigation -->
							</div>

						<!-- END .navigation-inner -->
						</div>

					<!-- END #primary-navigation -->
					</nav>

					<a href="#" id="mobile-navigation-btn"><i class="fa fa-bars"></i></a>

				<!-- END .logo-navigation-wrapper -->
				</div>

				<!-- BEGIN .mobile-navigation-wrapper -->
				<div class="mobile-navigation-wrapper">

					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
						'items_wrap' => '<ul>%3$s</ul>',
						'fallback_cb' => 'sohohotel_main_menu_fallback',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'walker' => new description_walker() )
				 	); ?>

				<!-- END .mobile-navigation-wrapper -->
				</div>

			<!-- END .header-wrapper-3 -->
			</div>
			
		<?php } else { ?>
			
			<!-- BEGIN .header-wrapper-1 -->
			<div class="header-wrapper-1 clearfix">

				<!-- BEGIN .top-bar-wrapper -->
				<div class="top-bar-wrapper">

					<!-- BEGIN .top-bar -->
					<div class="top-bar clearfix">

						<!-- BEGIN .top-left-icons -->
						<ul class="top-left-icons clearfix">
							<?php if( $sohohotel_data['top-left-phone'] ) { ?><li class="phone-icon"><?php echo esc_attr($sohohotel_data['top-left-phone']); ?></li><?php } ?>
							<?php if( $sohohotel_data['top-left-address'] ) { ?><li class="map-icon"><?php echo esc_attr($sohohotel_data['top-left-address']); ?></li><?php } ?>
						<!-- END .top-left-icons -->
						</ul>

						<!-- BEGIN .top-right-wrapper -->
						<div class="top-right-wrapper clearfix">
							
							<?php if ( has_nav_menu( 'top-right' ) ) { ?>
								
								<div class="language-menu clearfix <?php if ( $sohohotel_data['header-menu-style'] == 'vertical' ) { echo 'vertical-menu'; } ?>"><p><span><?php if( $sohohotel_data['top-right-menu-text'] ) { ?><?php echo esc_attr($sohohotel_data['top-right-menu-text']); ?><?php } ?></span></p> <?php wp_nav_menu( array(
									'theme_location' => 'top-right',
									'container' =>false,
									'items_wrap' => '<ul>%3$s</ul>',
									'fallback_cb' => false,
									'echo' => true,
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'depth' => 0 )
								); ?></div>
							
							<?php } ?>
							
							<?php if( !empty($sohohotel_data["top-right-button-text"]) ) { ?>
								<a href="<?php if( $sohohotel_data["booking_page_url"] ) { ?><?php echo $sohohotel_data["booking_page_url"]; ?><?php } ?>" class="top-right-button"><?php if( $sohohotel_data['top-right-button-text'] ) { ?><?php echo esc_attr($sohohotel_data['top-right-button-text']); ?><?php } ?> <i class="fa fa-calendar"></i></a>
							<?php } ?>
						<!-- END .top-right-wrapper -->
						</div>

					<!-- END .top-bar -->
					</div>

				<!-- END .top-bar-wrapper -->
				</div>

				<!-- BEGIN .logo-navigation-wrapper -->
				<div class="logo-navigation-wrapper clearfix">

					<!-- BEGIN .logo -->
					<div class="logo">

						<?php if ( !empty($sohohotel_data['logo-image']['url'] ) ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sohohotel_data['logo-image']['url']); ?>" alt="" /></a>
						<?php } else { ?>
							<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> <span><?php bloginfo( 'description' ); ?></span></h2>
						<?php } ?>

					<!-- END .logo -->
					</div>

					<!-- BEGIN #primary-navigation -->
					<nav id="primary-navigation" class="navigation-wrapper fixed-navigation clearfix">

						<!-- BEGIN .navigation-inner -->
						<div class="navigation-inner clearfix">

							<!-- BEGIN .logo -->
							<div class="logo">

								<?php if ( !empty($sohohotel_data['logo-image-sticky-header']['url'] ) ) { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sohohotel_data['logo-image-sticky-header']['url']); ?>" alt="" /></a>
								<?php } else { ?>
									<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
								<?php } ?>

							<!-- END .logo -->
							</div>

							<!-- BEGIN .navigation -->
							<div class="navigation">

								<?php wp_nav_menu( array(
									'theme_location' => 'primary',
									'container' => false,
									'items_wrap' => '<ul>%3$s</ul>',
									'fallback_cb' => 'sohohotel_main_menu_fallback',
									'echo' => true,
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'depth' => 0,
									'walker' => new description_walker() )
							 	); ?>

							<!-- END .navigation -->
							</div>

						<!-- END .navigation-inner -->
						</div>
						
						<div class="clearboth"></div>

					<!-- END #primary-navigation -->
					</nav>

					<a href="#" id="mobile-navigation-btn"><i class="fa fa-bars"></i></a>

				<!-- END .logo-navigation-wrapper -->
				</div>

				<!-- BEGIN .mobile-navigation-wrapper -->
				<div class="mobile-navigation-wrapper">

					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
						'items_wrap' => '<ul>%3$s</ul>',
						'fallback_cb' => 'sohohotel_main_menu_fallback',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'walker' => new description_walker() )
				 	); ?>

				<!-- END .mobile-navigation-wrapper -->
				</div>

			<!-- END .header-wrapper-1 -->
			</div>
			
		<?php } ?>