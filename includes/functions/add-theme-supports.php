<?php 
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

/**
 * @webruber 1
 * This file contents theme support scripts
 */

add_theme_support( 'title-tag' );
add_theme_support( 'widgets' );
add_theme_support( 'woocommerce' );
// add_image_size( 'archive-post-thumbnail', 350, 210 );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'customize-selective-refresh-widgets' );

register_nav_menus( [ 'list-poster' => __('List poster menu','ruber') ] );
register_nav_menus( [ 'list-viewer' => __('List viewer Menu','ruber') ] );
register_nav_menus( [ 'logged-out' => __('Logged Out Menu','ruber') ] );

add_theme_support( 'editor-styles' );
add_editor_style( 'style-editor.css' );

function themename_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );