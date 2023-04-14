<?php

function lottery_list_shortcode2($atts) {
    $atts = shortcode_atts( array(
		'post_type' => '',
		'cat_name' => '',
	), $atts, 'bartag' );
    extract($atts);
    ob_start();
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array(
	  'post_type' => 'post',
	  'post_status' => 'publish',
	  'paged' => $paged, // Add pagination parameter

	);

	$listing_query = new WP_Query( $args );	

	?>

	<div class="wc-lottery-items-wrapper">

	<?php
	
	if ( $listing_query->have_posts() ) {

		
		$author_id = $post->post_author;

		echo '<div class="wc-lottery-items-inner">';

		while ( $listing_query->have_posts() ) {
		  $listing_query->the_post();
		  ?>
		  
  
		  <div class="wc-single-lottery-item">
			  <a href="<?php echo get_field('url') ? get_field('url') : "#"; ?>" class="wc-lottery-thumbnail">
				  <img src="<?php echo get_field('thumbnail_url') ? get_field('thumbnail_url') : get_template_directory_uri(  ) . '/static/img/placeholder.png' ?>" alt="Thumbnail">		
				  <img class="avatar" src="<?php echo get_the_author_meta('profile_pic_url', $author_id); ?>" alt="Author">	
			  </a>
			  <div class="wc-lottery-content">
				<div class="title-info">
					<h2><a href="<?php echo get_field('url') ? get_field('url') : "#"; ?>" ><?php the_title(); ?></a></h2>
					<div class="wc-author">
						<span>By</span>
						<span><?php the_author() ?></span>
					</div>
					<?php 
				  
						$user = wp_get_current_user(  );

						if ($user->roles[0] === 'list_viewer') {
							echo '<button class="btn btn-primary favorite-btn" title="Add to favorite"><i class="fa-regular fa-heart"></i></button>';
						}
					
					?>	
					
				</div>

				  <div class="wc-lottery-meta">
					  <div class="wc-max"><span class="wc-bg">Max</span> <?php the_field('max'); ?></div>
					  <div class="wc-slod"><span class="wc-bg">Sold</span> <?php the_field('sold'); ?></div>
					  <div class="wc-price"><span class="wc-bg">Price</span> £ <?php the_field('price'); ?></div>	

					<?php $wc_rend = rand(); ?>
					<div class="wc-countdown" id="wc-withdrow-<?php echo $wc_rend; ?>"></div>

					<script>

						(function ($) {
							"use strict";
							$(document).ready(function () {

								$('#wc-withdrow-<?php echo $wc_rend; ?>').countdown('<?php  $date_str = get_field('withdraw_date');  echo date('Y/m/d H:i', strtotime($date_str)); ?>', function(event) {
									$(this).html(event.strftime('<span><span>%D</span>days</span><span><span>%H</span>Hours</span><span><span>%M</span>Minutes</span><span><span>%S</span>Seconds</span>'));
								});

							});
						}(jQuery));

					</script>

						<?php 
							$sold_item = get_field('sold') ? get_field('sold') : '';
							$max_item = get_field('max') ? get_field('max') : '';
							
							if(  $sold_item != '' && $sold_item > 0  &&  $max_item != '' && $max_item > 0 ){
								$bar_width = ( get_field('sold') / get_field('max') * 100 ) + 2;
							}else{
								$bar_width = 0;
							}
							
							if($bar_width > 66){
								$bar_class = 'wc-progress-bar-66';
							}else if($bar_width > 33){
								$bar_class = 'wc-progress-bar-33';
							}else{
								$bar_class = '';
							}


						?>
					  <div class="wc-progress-bar <?php echo $bar_class ?>">
						<div class="wc-progress-indicator" style="width: <?php echo $bar_width ?>%" ></div>
					  </div>
				  </div>
			  </div>
		  </div>
  
		  <?php
		}	
		echo '</div>';


		// Pagination links
		$total_pages = $listing_query->max_num_pages;

		if ( $total_pages > 1 ) {
			$current_page = max( 1, get_query_var( 'paged' ) );
			echo '<div class="wc-pagination">';
			echo paginate_links( array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => 'page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'show_all' => true,
			'prev_next' => false,
			) );
			echo '</div>';
		}

		?>

		<?php

		
	}else {
		// No posts found
	}
	wp_reset_postdata();
	
	?>
		
	</div>

	<?php


	return ob_get_clean();

}
add_shortcode( 'lottery_list2', 'lottery_list_shortcode2' );