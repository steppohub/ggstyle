<?php
/**
 * ggstyle Theme Customizer.
 *
 * @package ggstyle
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ggstyle_customize_register( $wp_customize ) {
    
    
    $wp_customize->add_setting( 'site_logo', array(
        'default'               => '',
        'type'                  => 'theme_mod',
        'sanitize_callback'     => '',
        'sanitize_js_callback'  => ''
    ) );
    
    
	$wp_customize->add_control( new WP_Customize_Upload_Control(
	    $wp_customize,
	    'ggstyle_site_logo', //Set a unique ID for the control
	    array(
        	'label'     => __( 'Site Logo', 'ggstyle' ),
        	'description' => __( 'Site Logo used to brand your website, will display at the top of the page and overwrite Site Title and Tagline. Logo should be at least <b>300</b> pixels wide.', 'ggstyle' ),
        	'section'   => 'title_tagline',
        	'type'      => 'image',
        	'priority'  => 40,
        	'settings'  => 'site_logo',
	) ) );    
    
    
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'site_logo' )->transport        = 'postMessage';
}
add_action( 'customize_register', 'ggstyle_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ggstyle_customize_preview_js() {
	wp_enqueue_script( 'ggstyle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ggstyle_customize_preview_js' );
