<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @webruber 1.0
 * Fatured post that displayed on Home randomly
 */

// Query Featured posts
$the_query = new WP_Query( [
	'category_name' => 'featured',
	'post_type'      => 'post',
	'orderby'        => 'rand',
	'posts_per_page' => 5,
] ); 

?>

<?php
// If we have posts lets show them
if ( $the_query->have_posts() ) :
	// Loop through the posts
	while ( $the_query->have_posts() ) : $the_query->the_post();  ?>
		<div class="featured-post">
			<div class="post-meta">
            	<div class="align-middle">
            		<p>
						By 
						<?php the_author_meta( 'display_name' ); ?>,
						On 
						<?php echo get_the_date('d M Y'); ?>
					</p>
					<h2>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
	           		<?php the_excerpt(); ?>
            	</div>
			</div>
			<div class="image-wrapper">
				<a href="<?php the_permalink(); ?>">
					<?php if ( wp_is_mobile() ) : ?>
						<?php the_post_thumbnail('archive-post-thumbnail'); ?>
					<?php else : ?>
						<?php the_post_thumbnail(); ?>
					<?php endif; ?>
				</a>
			</div>
		</div>
	<?php endwhile;
	wp_reset_postdata();
endif; ?>
