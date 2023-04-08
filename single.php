<?php 
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

/**
 * @webruber 1
 * Single post template!
 */

 ?>

<?php get_header(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if(have_posts()):while(have_posts()):the_post(); ?>
    <?php get_template_part( 'includes/components/single-meta', 'single' ); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="article pb-5">
                    <div class="content-wrapper">

                        <?php get_template_part( 'includes/components/social-share', 'single' ); ?>
                        
                        <div id="content"> 
                            <?php the_content(); ?> 
                        </div>

                    </div>
                    <div class="related-post-wrapper py-3">
                        <p>Related posts!</p>
                        <ul>
                            <?php get_template_part('includes/components/single-related-post'); ?> 
                        </ul>
                    </div>
                    <div class="post-tag">
                        <?php the_tags('<p class="post-tags"><span>'.esc_html__('Tags:','ruber').'</span> ','','</p>'); ?>
                    </div>

                    <?php get_template_part('includes/components/single-post-nav'); ?> 

                    <?php endwhile; endif; ?>
                    <?php // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif; 
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar( ) ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
