<?php if ( ! defined( 'ABSPATH' ) ) exit; 

/**
 * @webruber 1.0
 * Single post meta, its contained breadcrumb, title, date, and author info.
 */

?>

<div style="
        background-image:linear-gradient(#fffffff1, #ffffffcc), url(<?php echo the_post_thumbnail_url( ) ?>);
" class="post-meta">
    <div class="container">
        <div class="breadcrumb">
            <?php get_breadcrumb(); ?>
        </div>
        <h1><?php the_title(); ?></h1>
        <div class="author-date">
            <img src="<?php echo esc_url( get_avatar_url(get_the_author_meta( 'ID' ), ['size' => 45]) ); ?>" alt="<?php the_author_meta( 'display_name' ); ?>">
            <p>
                By 
                <?php the_author_meta( 'display_name' ); ?>
            </p>
            <p>
                On 
                <?php echo get_the_date('d M Y'); ?>
            </p>
        </div>
    </div>
</div>