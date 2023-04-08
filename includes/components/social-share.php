<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @webruber 1.0
 * Social sharing functionalities for single post.
 */

//Retrive the requiested URL
$postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
?>

<div class="social-wrapper">
    <ul class="social_network_list">
        <li>Share:</li>
        <li>
            <a target="_blank" class="facebook_social_link btn" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" rel="nofollow noreferrer" aria-label="Facebook">
            <?php echo webruber_svg('facebook'); ?>
            </a>
        </li>
        <li>
            <a target="_blank" class="twitter_social_link btn" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" rel="nofollow noreferrer" aria-label="Twitter">
            <?php echo webruber_svg('twitter'); ?>
            </a>
        </li>
        <li>
            <a target="_blank" class="linkedin_social_link btn" href="https://www.linkedin.com/shareArticle?url=<?php echo $postUrl; ?>&title=<?php echo the_title(); ?>" rel="nofollow noreferrer" aria-label="Linkedin">
            <?php echo webruber_svg('linkedin'); ?>
            </a>
        </li>
    </ul>
</div>