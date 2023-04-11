<?php 
// Template name: Login page template

// redirect to dashboard if user is logged in
$dashboard = home_url( 'dashboard' );

if ( is_user_logged_in() ) {
    wp_redirect( $dashboard );
}

?>


<?php get_header(); ?>
<div class="login_page" <?php post_class(); ?>>
    <div class="container">
    <?php if(have_posts()):while(have_posts()):the_post(); ?> 
        <div id="content"> 
            <div class="card card-body">
                <h1 class="text-center">Log In</h1>
                <?php the_content(); ?> 
            </div>
        </div>
    <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>