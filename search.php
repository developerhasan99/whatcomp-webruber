<?php 
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

/**
 * @webruber 1
 * Search template!
 */

 ?>
<?php get_header( ) ?>
<div class="archive_page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 search-meta">
                <h1>
                    <?php $search_results=$wp_query->found_posts;
                        if ($search_results==1) {
                            echo $search_results.' '.esc_html__('Search result','ruber');
                        } else {
                            echo $search_results.' '.esc_html__('Search results','ruber');
                        }
                    ?>
                </h1>
                
                <?php if ( !have_posts() ): ?>
                    <p>Please try another search:</p>
                <?php else: ?>
                    <p>For the term: "<?php echo get_search_query(); ?>"</p>
                <?php endif; ?>
                <?php get_search_form(); ?>

                <div class="archiv_posts_wrapper pt-4">
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