<?php 
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;


 ?>

<!DOCTYPE html>
<html <?php language_attributes( ); ?>>
  <head>
    <meta charset="<?php bloginfo( "charset" ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(  ); ?>
  </head>
  <body <?php body_class(  ); ?>>
  <?php wp_body_open(  ); ?>
  <?php get_template_part(  'includes/components/navbar', 'header
'  ); ?>