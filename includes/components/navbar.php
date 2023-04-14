<?php if ( ! defined( 'ABSPATH' ) ) exit; 

/**
 * @webruber 1.0
 * main Navigation displayed accrosed the site
 */

?>

<header class="navbar">
    <div class="container">
        <?php 
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }            
        ?>
        <div class="nav_menu_wrapper">
            <?php 
                if (is_user_logged_in(  )) {
                    $user = wp_get_current_user();
                    if ($user->roles[0] === 'list_poster') { ?>
                    <a href="<?php echo home_url( 'dashboard' ); ?>" class="btn btn-success btn-small">Dashboard</a>
            <?php       }
                    if ($user ->roles[0] === 'list_viewer') { ?>
                    <a href="<?php echo home_url( 'dashboard' ); ?>" class="btn btn-success btn-small"><i class="fa-solid fa-heart"></i> Favorites</a>
            <?php    }
                } else { ?>
                <div>
                    <a href="<?php echo home_url( 'register' ); ?>" class="btn btn-success btn-small mx-2">Register</a>
                    <a href="<?php echo home_url( 'log-in' ); ?>" class="btn btn-success btn-small">Log in</a>
                </div>
            <?php } ?>
        </div>
    </div>
</header>