<?php /* Template Name: Page Builder */ ?>
<?php get_header(); ?>
<div id="build-page" <?php post_class(); ?>>
    <div id="content"> 
        <?php the_content(); ?> 
    </div>
</div>
<?php get_footer(); ?>
