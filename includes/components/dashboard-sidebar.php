<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

global $wp;

$path = $wp->request;

?>
<div class="dashboard-sidebar">
    <ul class="list-group">
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
        <li class="list-group-item">
            <a href="<?php echo wp_logout_url( home_url('log-in') ); ?>">
                <i class="fa-solid fa-right-from-bracket"></i> Logout!
            </a>
        </li>
    </ul>
</div>