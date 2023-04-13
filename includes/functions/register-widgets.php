<?php 

if ( ! defined( 'ABSPATH' ) ) exit; 

/**
 * @webruber 1
 * Register widgets that used to accross the site
 */

function arphabet_widget_init() {
    register_sidebar( array(
      'name'          => 'Footer 1',
      'id'            => 'footer-widget-1',
      'before_widget' => '<div class="pb-5">',
      'after_widget'  => '</div>',
    ) );
    register_sidebar( array(
      'name'          => 'Footer 2',
      'id'            => 'footer-widget-2',
      'before_widget' => '<div class="pb-5">',
      'after_widget'  => '</div>',
    ) );
}
  
add_action( 'widgets_init', 'arphabet_widget_init' );

