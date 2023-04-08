<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @webruber 1.0
 * Single post meta display Prev and Next post.
 */

?>

<div class="single-post-nav my-4"> 
    <?php if ( is_single() ): ?> 
    <ul class="post-nav"> 
        <li class="next">
            <?php next_post_link('%link', '<span>'.esc_html__('Previous Article', 'ruber').'</span> <p>%title</p>'); ?>
        </li>
        <li class="previous">
            <?php previous_post_link('%link', '<span>'.esc_html__('Next Article', 'ruber').'</span> <p>%title</p>'); ?>
        </li>
    </ul> 
    <?php endif; ?> 
</div>