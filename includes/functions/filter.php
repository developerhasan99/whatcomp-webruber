<?php

function load_posts_by_category() {
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
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'lottery_category', // replace with your taxonomy name
                'field' => 'slug', // use 'slug' or 'term_id' depending on your needs
                'terms' => $category // replace with your taxonomy term slug or ID
            )
            );
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
              
      
              <a href="<?php echo get_field('url') ? get_field('url') : "#"; ?>" class="wc-single-lottery-item" target="_blank">
                  <div class="wc-lottery-thumbnail">
                      <img src="<?php echo get_field('thumbnail_url') ?>" alt="Thumbnail">		
                      <?php echo get_avatar(  get_the_author_meta( 'ID' ), 32); ?>		
                  </div>
                  <div class="wc-lottery-content">
                    <div class="title-info">
                        <h2><?php the_title(); ?></h2>
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
                                        $(this).html(event.strftime('<span><span>%D</span>days</span><span><span>%H</span>Hours</span><span><span>%M</span>munites</span><span><span>%S</span>Seconds</span>'));
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
              </a>
      
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
      
              <a href="<?php echo get_field('url') ? get_field('url') : "#"; ?>" class="wc-single-lottery-item" target="_blank">
                  <div class="wc-lottery-thumbnail">
                      <img src="<?php echo get_field('thumbnail_url') ?>" alt="Thumbnail">		
                      <?php echo get_avatar(  get_the_author_meta( 'ID' ), 32); ?>		
                  </div>
                  <div class="wc-lottery-content">
                    <div class="title-info">
                        <h2><?php the_title(); ?></h2>
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
                                        $(this).html(event.strftime('<span><span>%D</span>days</span><span><span>%H</span>Hours</span><span><span>%M</span>munites</span><span><span>%S</span>Seconds</span>'));
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
              </a>
      
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
			<script>
				(function ($) {
					"use strict";
					$(document).ready(function () {
						function wc_filter_function(page_num) {
							var category = $(".wc-filter-lottery-category").val();
							var price = $(".wc-filter-lottery-price").val();
							var text = $(".wc-filter-lottery-text").val();

							if (page_num) {
								var paged = page_num;
							} else {
								var paged = "";
							}

							console.log(paged);
							var ajaxurl = wc_ajax_object.ajax_url;

							$.ajax({
								url: ajaxurl,
								type: "post",
								data: {
									action: "load_posts_by_category",
									category: category,
									price: price,
									text: text,
									paged: paged,
								},

								beforeSend: function () {
									if (page_num) {
										$(".wc-lottery-items-inner").html("Loading...");
									} else {
										$(".wc-lottery-items-wrapper").html("Loading...");
									}
								},
								success: function (response) {
									if (page_num) {
										$(".wc-lottery-items-inner").html(response);
									} else {
										$(".wc-lottery-items-wrapper").html(response);
									}
								},
								error: function () {
									console.log("Error occurred");
								},
							});
						}

						$(".wc-filter-lottery-category").change(function () {
							wc_filter_function();
						});

						$(".wc-filter-lottery-price").change(function () {
							wc_filter_function();
						});
						$(".wc-filter-lottery-text").on("keypress", function () {
							wc_filter_function();
						});

						$(".wc-pagination>.page-numbers").click(function () {
							wc_filter_function($(this).text());
							$(this).addClass("current").siblings().removeClass("current");
						});

						$(".wc-pagination>.page-numbers").click(function (event) {
							event.preventDefault();
						});
					});
				})(jQuery);
			</script>
		<?php
        }else {
            // No posts found
        }
    }



    wp_die();
}
add_action('wp_ajax_load_posts_by_category', 'load_posts_by_category');
add_action('wp_ajax_nopriv_load_posts_by_category', 'load_posts_by_category');