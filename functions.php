<?php
/**
  * Include custom php files
  */
include('inc/gg_theme_functions.php');
include('inc/gg_post_types.php');




function gg_setup() {
    
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */    
	load_theme_textdomain( 'ggstyle', get_template_directory() . '/languages' );
	
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */	
    add_theme_support( 'title-tag' );
     
     
    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 0, true );  
	
	
	// This theme uses wp_nav_menu() in locations.
    register_nav_menus( 
        array(
            'primary' => __( 'Primary Navigation', 'ggstyle' ),
        ) 
    ); 
    
    
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	
    /*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css' ) );
	
	
    /*
     * Set Max width for content in theme eg. embeds & images
     */
    if ( ! isset( $content_width ) ) {
    	$content_width = 960;
    }
    
    
    /*
     * Add image sizes
     */
    add_image_size( 'slideL', 2000, 300, true );
    add_image_size( 'slideM', 1024, 300, true );
    add_image_size( 'slideS', 680 , 300, true );    
}
add_action('after_setup_theme', 'gg_setup');




function gg_scripts() {
  
    wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,700,700italic');
  
	wp_enqueue_style('themeStyle', get_stylesheet_uri());
  
  
    // Load the html5 shiv.
	wp_enqueue_script( 'gg-html5', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.3' );
	wp_script_add_data( 'gg-html5', 'conditional', 'lt IE 9' );    
    

	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'), '2.7.1', true );
	
	wp_enqueue_script( 'general', get_template_directory_uri() . '/js/general.js', array('jquery'), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'gg_scripts');




function gg_body_classes($classes) {
    global $post; 
    if($post) $classes[] = $post->post_name;
    return $classes;
}
add_filter( 'body_class', 'gg_body_classes', 100 );




function gg_remove_menus() {
    
    // Comments
    remove_menu_page( 'edit-comments.php' );                 
      
    // remove default dashboard widgets
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');
	remove_meta_box('dashboard_activity', 'dashboard', 'normal');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
	remove_meta_box('tribe_dashboard_widget', 'dashboard', 'normal');    
}
add_action( 'admin_menu', 'gg_remove_menus' );


function goodbye_dolly() {
    if (file_exists(WP_PLUGIN_DIR.'/hello.php')) {
        require_once(ABSPATH.'wp-admin/includes/plugin.php');
        require_once(ABSPATH.'wp-admin/includes/file.php');
        delete_plugins(array('hello.php'));
    }
    if(file_exists(WP_PLUGIN_DIR.'/akismet/akismet.php')) {
        require_once(ABSPATH.'wp-admin/includes/plugin.php');
        require_once(ABSPATH.'wp-admin/includes/file.php');
        delete_plugins(array('akismet'));        
    }
}

add_action('admin_init','goodbye_dolly');



/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'gg_register_required_plugins' );


function gg_register_required_plugins() {
    
    $plugins = array(
    
    	array(
    		'name'      => 'Advanced Custom Fields Pro',
    		'slug'      => 'advanced-custom-fields-pro',
    		'source'    => 'https://github.com/wp-premium/advanced-custom-fields-pro/archive/master.zip'
    	),
    	
    	array(
    		'name'      => 'Gravity Forms',
    		'slug'      => 'gravity-forms',
    		'source'    => 'https://github.com/wp-premium/gravityforms/archive/master.zip'
    	)
    );
	
	tgmpa( $plugins );
}


function gg_the_archive_title($title) {
    
    if ( is_post_type_archive() ) {
        $title = sprintf( __( '%s' ), post_type_archive_title( '', false ) );
    } elseif ( is_tax() ) {
        $tax = get_taxonomy( get_queried_object()->taxonomy );
        /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
        $title = sprintf( __( '%2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
    }
    
    return $title;
}
add_filter('get_the_archive_title', 'gg_the_archive_title');