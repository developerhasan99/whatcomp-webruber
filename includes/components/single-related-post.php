<?php

if ( ! defined( 'ABSPATH' ) ) exit; 

/**
 * @webruber 1.0
 * Display a list of related posts on Single post page.
 */

$post_id = get_the_ID();
$cat_ids = [];
$categories = get_the_category( $post_id );

if(!empty($categories) && !is_wp_error($categories)):
    foreach ($categories as $category):
        array_push($cat_ids, $category->term_id);
    endforeach;
endif;

$current_post_type = get_post_type($post_id);

$query_args = [
    'category__in'   => $cat_ids,
    'post_type'      => $current_post_type,
    'post__not_in'    => [$post_id],
    'posts_per_page'  => '5',
];

$related_cats_post = new WP_Query( $query_args );

if($related_cats_post->have_posts()):
        while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </li>
    <?php endwhile;

    // Restore original Post Data
    wp_reset_postdata();

endif; ?>