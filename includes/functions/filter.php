<?php

function load_posts_by_category() {
	// setup wp database connection
	global $wpdb;
	$table_name = $wpdb->prefix . 'whatcomp_favorite_listings';
	// current user
    $user = wp_get_current_user(  );

	// get request data
    $category = $_POST['category'] ? $_POST['category'] : '' ;
    $price = $_POST['price'] ? $_POST['price'] : '';
    $text = $_POST['text'] ? $_POST['text'] : '';
    $paged = $_POST['paged'] ? $_POST['paged'] : '1';


    if( $price == 'ASC'){
        $price_type = 'ASC';
    }else if($price == 'DESC'){
        $price_type = 'DESC';
    }else{
        $price_type = '';
    }

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'date', // Order by post date
        'paged' => $paged, // Add pagination parameter
    );


    if($text && $text != ''){
        $args['s'] = $text;
    }

    if($category != ''){
        $args['author_name'] = $category;
    }

    if ($price_type && $price_type != '') {
        $args['meta_key'] = 'price';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = $price_type;
    }

    $listing_query = new WP_Query($args);

    if( $_POST['paged'] ){
        if ( $listing_query->have_posts()) {
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
							<h2><a target="_blank" href="<?php echo get_field('url') ? get_field('url') : "#"; ?>" ><?php the_title(); ?></a></h2>
							<div class="wc-author">
								<span>By</span>
								<span><?php the_author() ?></span>
							</div>
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
					<?php 
						$post_id = get_the_ID();
						// conditionally render the favorite button 
						$result = $wpdb->get_results ( "
							SELECT * FROM $table_name 
							WHERE `user_id` = $user->ID 
							AND `post_id` = $post_id
						" );

						if ($user->roles[0] === 'list_viewer') {
							if(count($result) > 0) {
								echo '<button disabled data-post-id="'. $post_id . '" class="btn btn-success" title="Already added to favorite"><i class="fa-solid fa-heart"></i></button>';
							} else {
								echo '<button data-post-id="'. $post_id . '" class="btn btn-success favorite-btn" title="Add to favorite"><i class="fa-regular fa-heart"></i></button>';
							}
						}
					?>	
				</div>
            <?php
            }	
        }else {
            // No posts found
        }
    }else{
        if ( $listing_query->have_posts()) {		
            echo '<div class="wc-lottery-items-inner">';    
            while ( $listing_query->have_posts() ) {
				$listing_query->the_post();
				?>          
		
			<div class="wc-single-lottery-item">
				<a target="_blank" href="<?php echo get_field('url') ? get_field('url') : "#"; ?>" class="wc-lottery-thumbnail">
					<img src="<?php echo get_field('thumbnail_url') ? get_field('thumbnail_url') : get_template_directory_uri(  ) . '/static/img/placeholder.png' ?>" alt="Thumbnail">		
					<img class="avatar" src="<?php echo get_the_author_meta('profile_pic_url', $author_id); ?>" alt="Author">	
				</a>
				<div class="wc-lottery-content">
					<div class="title-info">
						<h2><a target="_blank" href="<?php echo get_field('url') ? get_field('url') : "#"; ?>" ><?php the_title(); ?></a></h2>
						<div class="wc-author">
							<span>By</span>
							<span><?php the_author() ?></span>
						</div>
						
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
				<?php 
					$post_id = get_the_ID();
					// conditionally render the favorite button 
					$result = $wpdb->get_results ( "
						SELECT * FROM $table_name 
						WHERE `user_id` = $user->ID 
						AND `post_id` = $post_id
					" );

					if ($user->roles[0] === 'list_viewer') {
						if(count($result) > 0) {
							echo '<button disabled data-post-id="'. $post_id . '" class="btn btn-success" title="Already added to favorite"><i class="fa-solid fa-heart"></i></button>';
						} else {
							echo '<button data-post-id="'. $post_id . '" class="btn btn-success favorite-btn" title="Add to favorite"><i class="fa-regular fa-heart"></i></button>';
						}
					}
				?>
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
            echo "No posts found!";
        }
    }



    wp_die();
}
add_action('wp_ajax_load_posts_by_category', 'load_posts_by_category');
add_action('wp_ajax_nopriv_load_posts_by_category', 'load_posts_by_category');