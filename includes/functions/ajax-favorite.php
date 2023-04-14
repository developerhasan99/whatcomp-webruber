<?php 

add_action( 'wp_ajax_make_favorite', 'make_favorite' );
add_action( 'wp_ajax_nopriv_make_favorite', 'make_favorite' );

function make_favorite () {

    if (isset($_POST['postId']) && $_POST['postId']) {
        $post_id = $_POST['postId'];

        global $wpdb;
        $table_name = $wpdb->prefix . 'whatcomp_favorite_listings';
        $user_id = get_current_user_id();

        $wpdb->insert($table_name, ['post_id' => $post_id, 'user_id' => $user_id]);

        wp_send_json_success( );
    }
    exit;

}