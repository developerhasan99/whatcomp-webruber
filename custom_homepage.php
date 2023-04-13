<?php 
// Template Name: Home Page

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

?>

<div class="content-wrapper">
    <div class="container">

        <div class="featured-competitions">

        <?php 
        
        $query = new WP_Query(array(
            'post_status' => 'publish',
            'category_name' => 'featured',
            'posts_per_page' => 5
        ));

        if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>

            <div class="featured-competition" style="background-image: url(<?php echo get_field('thumbnail_url') ?>)">
                <div class="featured-competition-inner">
                    <h2 class="title">
                        <?php echo get_the_title(); ?>
                    </h2>
                    <ul class="meta">
                        <li class="max">Max: <span><?php echo get_field('max') ?></span></li>
                        <li class="max">Sold: <span><?php echo get_field('sold') ?></span></li>
                        <li class="max">Price: <span>&pound;<?php echo get_field('price') ?></span></li>
                    </ul>

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
							
                            $bar_class = '';

							if($bar_width > 66){
								$bar_class = 'progress-length-66';
							}else if($bar_width > 33){
								$bar_class = 'progress-length-33';
							}
						?>
                    <div class="progress <?php echo $bar_class; ?>">
                        <div class="progress-bar" style="width: <?php echo $bar_width ?>%"></div>
                    </div>
                    <div class="action text-center mt-4">
                        <a href="<?php echo get_field('url') ?>" target="_blank" class="btn btn-success btn-lg">
                            View competition
                        </a>
                    </div>
                </div>
            </div>
        
        <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <h2 class="text-center mb-5 text-uppercase banner-text">All the best competitions in one place</h2>
        <!-- Initial competition list -->
        <?php echo do_shortcode( '[lottery_list2]' ); ?>
    </div>
</div>

<?php get_footer(  ); ?>