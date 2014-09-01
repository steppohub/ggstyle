<?php

if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Sidebar-Main',
  'before_widget' => '<div class="sidebar-widget">',
  'after_widget' => '</div>',
  'before_title' => '<h4>',
  'after_title' => '</h4>',
  ));
  
register_nav_menu( 'mainnav', 'Main Menu' );
	
	// disable default dashboard widgets
function disable_default_dashboard_widgets() {

	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

// remove wordpress version type
remove_action('wp_head', 'wp_generator');

function change_footer_version() {
	$theme_name = bloginfo('name');
  return $theme_name;
}
add_filter( 'update_footer', 'change_footer_version', 9999 );

function remove_footer_admin () {
  echo 'Site made proudly by Greengraphics.';
}
add_filter('admin_footer_text', 'remove_footer_admin');


function set_gg_defaults()
{
	global $wpdb;
	
	$o = array(
	'date_format'				=> 'j F Y',
	'default_ping_status'		=> 'closed',
	'default_comment_status'	=> 'closed',
	'links_updated_date_format'	=> 'j F Y, H:i',
	'permalink_structure'		=> '/%postname%/',
	'start_of_week'				=> 1,
	'timezone_string'			=> 'Australia/Melbourne',
	'use_smilies'				=> 0,	
	);

	foreach ( $o as $k => $v )
	{
	update_option($k, $v);
	}
	
	// Delete dummy post and comment.
	wp_delete_post(1, TRUE);
	wp_delete_comment(1);
	
	// empty blogroll
	$wpdb->query("DELETE FROM $wpdb->links WHERE link_id != ''");

	return;
}
register_activation_hook(__FILE__, 'set_gg_defaults');

// remove comments from ADMIN menu
function remove_menus(){
  
  remove_menu_page( 'edit-comments.php' );          //Comments  
}

add_action( 'admin_menu', 'remove_menus' );


// remove wordpress version type
remove_action('wp_head', 'wp_generator');




?>
