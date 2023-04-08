<?php 
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

/**
 * @webruber 1
 * Index template!
 */

 ?>

<?php get_header( ) ?>
<div class="archive_page">
    <div class="container">
        
        <?php if ( is_home() && !is_paged()) { ?>
            <h1 class="homepage-title">
                <?php echo bloginfo( 'title' ) . ' | ' ?>
                <span><?php echo bloginfo( 'description' ); ?></span>
            </h1>
            <?php get_template_part('includes/components/featured-post'); 

            }
        ?>

        <div class="row pt-4">
            <div class="col-md-8">
                <div class="archiv_posts_wrapper">
                    <?php get_template_part('includes/components/archive-posts'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar( ) ?>
            </div>
        </div>
        <nav class="pagination group">
            <?php the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( 'Prv', 'webruber' ),
                'next_text' => __( 'Next', 'webruber' ),
            ) ); ?>
        </nav>
    </div>
</div>

<?php get_footer( ) ?>