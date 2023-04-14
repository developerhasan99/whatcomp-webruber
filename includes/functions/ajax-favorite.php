<?php 

add_action( 'wp_ajax_make_favorite', 'make_favorite' );

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


function get_favorite_posts_callback() {

    global $wpdb;
	$table_name = $wpdb->prefix . 'whatcomp_favorite_listings';

    $user_id = get_current_user_id(  );
    
    $results = $wpdb->get_results ( "
    SELECT * FROM $table_name 
    WHERE `user_id` = $user_id 
    " );
    
    $published_posts = array();

    foreach($results as $result) {
        $post   = get_post( $result->post_id );

        $published_posts[] = array(
            'title' => $post->post_title,
            'id'  => $post->ID,
            'expires' => date("d-m-Y", strtotime(get_field('withdraw_date', $post->ID)))
        );
    }

    wp_send_json( $published_posts );
}

add_action( 'wp_ajax_get_favorite_posts', 'get_favorite_posts_callback' );


function delete_favorite_post_callback() {

    global $wpdb;
	$table_name = $wpdb->prefix . 'whatcomp_favorite_listings';

    if (isset($_POST['post_id']) && $_POST['post_id']) {
        $post_id = $_POST['post_id'];

        global $wpdb;
        $table_name = $wpdb->prefix . 'whatcomp_favorite_listings';
        $user_id = get_current_user_id();

        // $wpdb->delete( $table, array( 'user_id' => $user_id, 'post_id' => $post_id ) );
        $wpdb->query("DELETE FROM $table_name
        WHERE ((`post_id` = $post_id) AND (`user_id` = $user_id));");

        wp_send_json_success( );
    }
    exit;
}

add_action( 'wp_ajax_delete_favorite_post', 'delete_favorite_post_callback' );