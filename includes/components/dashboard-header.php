<?php

if ( !is_user_logged_in() ) {
    wp_redirect( home_url( 'log-in' ) );
}

$user = wp_get_current_user(  );

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
            <div class="dashboard-header-menu-wrapper">

                <?php if ($user->roles[0] === 'list_poster') { ?>

                <div class="whatcomp-coin">
                    <span class="coin">WC</span>
                    <span id="current-user-token"><?php echo gamipress_get_user_points($user->id , 'token'); ?></span>
                </div>
                <a href="<?php echo home_url( 'buy-coins' ); ?>" type="button" class="btn btn-success ml-3">Buy Coin</a>
                
                <?php } ?>

            </div>
        </div>
    </div>
</header>