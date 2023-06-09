<?php 
/**
 * @webruber 1.0
 * This file loads All necessory scripts and styles!
 */

//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

function webruber_add_theme_scripts() {
    // Load all styles
    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600&display=swap', [], '1', 'all' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', [], '1', 'all' );
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', [], '1', 'all' );
    wp_enqueue_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css', [], '1', 'all' );
    wp_enqueue_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css', [], '1', 'all' );
    wp_enqueue_style( 'basic', get_template_directory_uri() . '/static/css/basic.css', [], '1', 'all' );
    wp_enqueue_style( 'navbar', get_template_directory_uri() . '/static/css/navbar.css', [], '1', 'all' );
    wp_enqueue_style( 'footer', get_template_directory_uri() . '/static/css/footer.css', [], '1', 'all' );
    wp_enqueue_style( 'listing', get_template_directory_uri() . '/static/css/listing.css', [], '1', 'all' );
    wp_enqueue_style( 'single', get_template_directory_uri() . '/static/css/single.css', [], '1', 'all' );


    //Load All Js
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js', [], '5', true);
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/static/js/countdown.js', ['jquery'], 1.1, true);
	
    wp_enqueue_script( 'wc-script', get_template_directory_uri() . '/static/js/main.js', ['jquery'], time(), true);
    wp_localize_script( 'wc-script', 'wc_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'webruber_add_theme_scripts' );

