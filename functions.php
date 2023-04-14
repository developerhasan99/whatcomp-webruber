<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 

// Load Static Scripts
require_once( __DIR__ . '/includes/functions/load-statics.php');
require_once( __DIR__ . '/includes/functions/add-theme-supports.php');
require_once( __DIR__ . '/includes/functions/register-widgets.php');
require_once( __DIR__ . '/includes/functions/load_svg.php');
require_once( __DIR__ . '/includes/functions/filter.php');
require_once( __DIR__ . '/includes/functions/dashboard-ajax.php');
require_once( __DIR__ . '/includes/functions/ajax-favorite.php');

// Add instagram username filed to users profile
function add_instagram_field($fields) {
    $fields['instagram_username'] = 'Instagram Username';
    return $fields;
}
add_filter('user_contactmethods', 'add_instagram_field', 10, 1);

// Add profile image filed to users profile
function user_profile_pic_url($fields) {
    $fields['profile_pic_url'] = 'Profile Pic Url';
    return $fields;
}
add_filter('user_contactmethods', 'user_profile_pic_url', 10, 1);


// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Buy Now', 'woocommerce' ); 
}

