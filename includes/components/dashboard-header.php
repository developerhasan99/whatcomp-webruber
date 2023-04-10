<?php

if ( !is_user_logged_in() ) {
    wp_redirect( home_url( 'log-in' ) );
}

$user = wp_get_current_user(  );

if ($user->roles[0] === 'list_viewer') {
    wp_redirect( home_url(  ) );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(  ); ?>
</head>
<body>
<header class="navbar">
    <div class="container">
        <?php 
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }            
        ?>
        <div class="nav_menu_wrapper">
            <div class="mobile_nav_closer_btn_wrapper">
                <button class="mobile_nav_closer_btn btn"  aria-label="Close nabvar">
                    <?php echo webruber_svg('x'); ?>
                </button>
            </div>
            <div class="dashboard-header-menu-wrapper">
                <div class="whatcomp-coin">
                    <span class="coin">WC</span>
                    <span id="current-user-token"><?php echo gamipress_get_user_points($user->id , 'token'); ?></span>
                </div>
                <a href="<?php echo home_url( 'coins/buy-coins' ); ?>" type="button" class="btn btn-success ml-3">Buy Coin</a>
            </div>
        </div>
    </div>
</header>