<?php 
// Template Name: Dashboard template

if ( ! defined( 'ABSPATH' ) ) exit;

$user_id = get_current_user_id();

get_template_part( 'includes/components/dashboard-header', 'dashboard' );

?>
<div class="content-wrapper">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <?php get_template_part( 'includes/components/dashboard-sidebar', 'add-competitions' ); ?>
                </div>
                <div class="col-md-8 mb-5">
                    <div class="mb-3 text-end">
                        <a href="<?php echo home_url( 'add-competition' ); ?>" class="btn btn-success">Add Competition</a>
                    </div>
                    <div class="card mb-3 px-3 py-2">
                        <p class="my-3 px-2">Your Competitions!</p>
                        <div class="table-responsive">
                            <table class="table table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="draft-posts-table">
                                </tbody>
                            </table>
                            <div class="text-center pb-3 draft-load-btn-wrapper">
                                <button class="btn btn-success btn-lg" id="draft-load-btn">
                                    <div class="spinner-wrapper">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        Load more
                                    </div>
                                </button>
                            </div> 
                        </div>
                    </div>
                    <div class="card mb-3 px-3 py-2">
                        <p class="my-3 px-2">Published Competitions!</p>
                        <div class="table-responsive">
                            <table class="table table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Ending</th>
                                        <td scope="col">Action</td>
                                    </tr>
                                </thead>
                                <tbody class="published-posts-table">
                                    
                                </tbody>
                            </table>
                            <div class="text-center pb-3 published-load-btn-wrapper">
                                <button class="btn btn-success btn-lg" id="published-load-btn">
                                    <div class="spinner-wrapper">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        Load more
                                    </div>
                                </button>
                            </div> 
                        </div>
                    </div>
                    <div class="card px-3 py-2">
                        <p class="my-3 px-2">Featured Competitions!</p>
                        <div class="table-responsive">
                            <table class="table table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Ending</th>
                                    </tr>
                                </thead>
                                <tbody class="featured-posts-table">
                                    <?php $published_query = new WP_Query(array(
                                            'author' => $user_id,
                                            'post_status' => 'publish',
                                            'category_name' => 'featured',
                                            'posts_per_page' => -1
                                        ));
                                        if($published_query->have_posts()) : while($published_query->have_posts()) : $published_query->the_post(); ?>
                                            
                                        <tr>
                                            <td><?php the_title(); ?></td>
                                            <td><?php echo do_shortcode( '[postexpirator type=date dateformat="d-m-Y"]' ); ?></td>
                                        </tr>

                                    <?php endwhile; endif; wp_reset_postdata(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <script type='text/javascript' src='<?php echo home_url(  ); ?>/wp-includes/js/jquery/jquery.min.js' id='jquery-core-js'></script>
    <script type='text/javascript' src='<?php echo home_url(  ); ?>/wp-includes/js/jquery/jquery-migrate.min.js' id='jquery-migrate-js'></script>
    <script src="<?php echo get_template_directory_uri(  ) . '/static/js/dashboard.js' ?>"></script>
</body>
</html>