<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @webruber 1.0
 * Archive post for Home, Archive and Search Page.
 */

?>

<div class="row">
    <?php if(have_posts()):while(have_posts()):the_post(); ?>
        <div class="col-sm-6 mb-5">
            <a href="<?php the_permalink(); ?>">
                <div class="archive-post">
                    <div class="card-img-top">
                      <?php the_post_thumbnail('archive-post-thumbnail'); ?>
                    </div>
                    <div class="card-body post-meta">
                        <p>
                            By 
                            <?php the_author_meta( 'display_name' ); ?>,
                            On 
                            <?php echo get_the_date('d M Y'); ?>
                        </p>
                        <h2 class="card-title">
                            <?php the_title(); ?>
                        </h2>
                        <p class="card-text">
                            <?php the_excerpt(); ?>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    <?php endwhile; endif; ?>
</div>