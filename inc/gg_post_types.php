<?php


// Register Custom Post Types
// https://codex.wordpress.org/Function_Reference/register_post_type

// Register Custom Taxonomies
// https://codex.wordpress.org/Function_Reference/register_taxonomy

add_action( 'init', 'gg_post_types' );
function gg_post_types() {

    // Management Tools
	$args = array(
        'label'         => 'Management Tools',
        'public'        => true,
        'menu_icon'     => 'dashicons-admin-tools', 
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'tools'),
        'taxonomies'    => array('tools_cat')
	);
	register_post_type('tools', $args);

    $args = array(
        'label'         => 'Tools Categories',
        'public'        => true,
        'hierarchical'  => true, 
        'show_admin_column' => true,
    );
    register_taxonomy('tools_cat', array('tools'), $args);

    $args = array(
        'label'         => 'Tools Tags',
        'public'        => true,
        'hierarchical'  => false, 
        'show_admin_column' => true,
    );
    register_taxonomy('tools_tags', array('tools'), $args);
    
    
    // Position Descriptions
    $args = array(
        'label'         => 'Position Descriptions',
        'public'        => true,
        'menu_icon'     => 'dashicons-editor-aligncenter', 
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'descriptions'),
        'taxonomies'    => array('descriptions_cat')
    );
    register_post_type('descriptions', $args);
    
    $args = array(
        'label'         => 'Descriptions Categories',
        'public'        => true,
        'hierarchical'  => true, 
        'show_admin_column' => true,
    );
    register_taxonomy('descriptions_cat', array('descriptions'), $args);

    $args = array(
        'label'         => 'Descriptions Tags',
        'public'        => true,
        'hierarchical'  => false, 
        'show_admin_column' => true,
    );
    register_taxonomy('descriptions_tags', array('descriptions'), $args);


    // Training Materials
    $args = array(
        'label'         => 'Training Materials',
        'public'        => true,
        'menu_icon'     => 'dashicons-clipboard', 
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'materials'),
        'taxonomies'    => array('materials_cat')        
    );
    register_post_type('materials', $args);	

    $args = array(
        'label'         => 'Materials Categories',
        'public'        => true,
        'hierarchical'  => true, 
        'show_admin_column' => true,
    );
    register_taxonomy('materials_cat', array('materials'), $args);
    
    $args = array(
        'label'         => 'Materials Tags',
        'public'        => true,
        'hierarchical'  => false, 
        'show_admin_column' => true,
    );
    register_taxonomy('materials_tags', array('materials'), $args);    

}