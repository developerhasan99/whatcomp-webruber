<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

global $wp;
$path = $wp->request;

$user = wp_get_current_user(  );

?>
<div class="dashboard-sidebar">
    <ul class="list-group">
        <?php 
        if ($user->roles[0] === 'list_viewer') {
        ?>

        <li class="list-group-item <?php if ($path === 'dashboard') echo 'active' ?>">
            <a href="<?php echo home_url( 'dashboard' ) ?>">
                <i class="fa-solid fa-list-ul"></i> Dashboard
            </a>
        </li>
        <li class="list-group-item <?php if ($path === 'profile') echo 'active' ?>">
            <a href="<?php echo home_url( 'profile' ); ?>">
            <i class="fa-regular fa-user"></i> Profile
            </a>
        </li>
        <li class="list-group-item">
            <a href="<?php echo wp_logout_url( home_url('log-in') ); ?>">
                <i class="fa-solid fa-right-from-bracket"></i> Logout!
            </a>
        </li>

        <?php 
        }else {
        ?>

        <li class="list-group-item <?php if ($path === 'dashboard') echo 'active' ?>">
            <a href="<?php echo home_url( 'dashboard' ) ?>">
                <i class="fa-solid fa-list-ul"></i> Dashboard
            </a>
        </li>
        <li class="list-group-item <?php if ($path === 'add-competition') echo 'active' ?>">
            <a href="<?php echo home_url('add-competition');?>">
            <i class="fa-solid fa-plus"></i> Add Competition
            </a>
        </li>
        <li class="list-group-item <?php if ($path === 'import-competitions') echo 'active' ?>">
            <a href="<?php echo home_url('import-competitions');?>">
                <i class="fa-solid fa-file-import"></i> Import Competitions
            </a>
        </li>
        <li class="list-group-item <?php if ($path === 'profile') echo 'active' ?>">
            <a href="<?php echo home_url( 'profile' ); ?>">
            <i class="fa-regular fa-user"></i> Profile
            </a>
        </li>
        <li class="list-group-item <?php if ($path === 'invoices') echo 'active' ?>">
            <a href="<?php echo home_url( 'invoices' ); ?>">
            <i class="fa-solid fa-file-invoice"></i> Invoices
            </a>
        </li>
        <li class="list-group-item">
            <a href="<?php echo wp_logout_url( home_url('log-in') ); ?>">
                <i class="fa-solid fa-right-from-bracket"></i> Logout!
            </a>
        </li>

        <?php 
        } 
        ?>
    </ul>
</div>