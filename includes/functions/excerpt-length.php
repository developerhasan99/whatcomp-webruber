<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 

/**
 * @webruber 1.0
 * Define custom excerpt length and excerpt more text
 */

function custom_excerpt_length( $length ) {
    return 27;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter('excerpt_more',function() {
    return '...';
});

?>