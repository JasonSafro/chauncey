<?php

/**
 * Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'theme_setup' );

if ( ! function_exists( 'theme_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override morphis_setup() in a child theme, add your own morphis_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 * 
 */

function theme_setup() {

	/* Make theme available for translation.
	 * Translations can be added to the /languages/ directory.
	 * 
	 */
	load_theme_textdomain( 'theme', get_template_directory() . '/languages' );
	
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	
}
endif; // theme_setup

/*-----------------------------------------------------------------------------------*/
/*	Infinite Options
/*-----------------------------------------------------------------------------------*/

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/includes/options/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/includes/options/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/includes/options/config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/includes/options/config.php' );
}


/*-----------------------------------------------------------------------------------*/
/*	Require Files
/*-----------------------------------------------------------------------------------*/
require_once(TEMPLATEPATH . '/includes/about-us-widget.php'); 
require_once(TEMPLATEPATH . '/includes/flickr-widget/flickr-widget.php'); 
require_once(TEMPLATEPATH . '/includes/video-widget.php');


$curr_theme = get_theme_data(TEMPLATEPATH . '/style.css');
$theme_version = trim($curr_theme['Version']);
if(!$theme_version) $theme_version = "1.0";

//Define constants:
define('SYSTEM_INCLUDES', TEMPLATEPATH . '/includes/');
define('SYSTEM_THEME', 'Gym WP Template');
define('SYSTEM_THEME_SHORT', 'GymWP');
define('SYSTEM_ROOT', get_template_directory_uri());
define('SYSTEM_VAR_PREFIX', 'gym_'); 


require_once (SYSTEM_INCLUDES . 'gym_theme_functions.php');
require_once (SYSTEM_INCLUDES . 'gym_shortcodes.php'); 
require_once (SYSTEM_INCLUDES . 'gym_pagenavi.php'); 

//Load admin specific files:
if (is_admin()) :
require_once (SYSTEM_INCLUDES . 'gym_admin_functions.php');
require_once (SYSTEM_INCLUDES . 'gym_custom_fields.php'); 
endif;




add_theme_support('post-thumbnails');

add_theme_support( 'menus' );

    
load_theme_textdomain( SYSTEM_THEME_SHORT, TEMPLATEPATH . '/languages' );

// Load external file to add support for MultiPostThumbnails. Allows you to set more than one "feature image" per post.
require_once('includes/multi-post-thumbnails.php');

// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
if (class_exists('MultiPostThumbnails')) 

$options = get_option('infinite_options');
$number_slides = $options['number_slides'];

{ 
    $extra_images_no = $number_slides;
    if ($extra_images_no == "") $extra_images_no = 20;    
    for ($i = 1 ; $i <= $extra_images_no ; $i++) 
    {
        new MultiPostThumbnails(array( 'label' => "Extra Image $i", 'id' => "extra-image-$i", 'post_type' => 'gallery_item' ) );
    }
}

 if ( !function_exists( 'add_theme_skins_and_styles' ) ) {
function add_theme_skins_and_styles( $wp ) {
    if (!empty( $_GET['theme-styles'] ) && $_GET['theme-styles'] == 'css') {
        # get theme options
        header( 'Content-Type: text/css' );
        get_template_part( 'css/theme-styles' );
        exit;
    }
}
add_action( 'parse_request', 'add_theme_skins_and_styles' );
}

/*-----------------------------------------------------------------------------------*/
/* Plugin Activation /
/-----------------------------------------------------------------------------------*/
	require_once('includes/plugin-activation.php');
	
	add_action('tgmpa_register', 'gym_register_required_plugins');
	function gym_register_required_plugins() {
		$plugins = array(
			array(
				'name'     				=> 'Slider Revolution', // The plugin name
				'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/includes/plugins/revslider.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'Timetable', // The plugin name
				'slug'     				=> 'timetable', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/includes/plugins/timetable.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
			'name' 			=> 'Contact Form 7',
			'slug' 			=> 'contact-form-7',
			'required' 		=> true
		)
		);
	
		// Change this to your theme text domain, used for internationalising strings
		$theme_text_domain = 'gym';
	
		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
				'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
				'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
	
		tgmpa($plugins, $config);
		
	}
	
ini_set( 'display_errors', false );
error_reporting( 0 );

/*-----------------------------------------------------------------------------------*/
/* WP-admin Custom CSS /
/-----------------------------------------------------------------------------------*/
	
add_action('admin_head', 'admin_custom_css');
function admin_custom_css() {
  echo '<style>
    #TB_overlay { background: none !important; opacity: 0; filter: alpha(opacity=0); position: fixed; height: 0; width: 0; z-index: 0;
    } 
  </style>';
}

?>