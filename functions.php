<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 

/**
 * @webruber 1.0
 * Imported all necessory Functions from this files
 */

// Load Static Scripts
require_once( __DIR__ . '/includes/functions/load-statics.php');

// Add theme supports
require_once( __DIR__ . '/includes/functions/add-theme-supports.php');

// Register sidebars
require_once( __DIR__ . '/includes/functions/register-sidebars.php');

//BreadCrumb Functions
require_once( __DIR__ . '/includes/functions/breadcrumb.php');

//Copy year function
require_once( __DIR__ . '/includes/functions/copydate.php');

//Customize excerpt length
require_once( __DIR__ . '/includes/functions/excerpt-length.php');

//Add SVG Loader
require_once( __DIR__ . '/includes/functions/load_svg.php');

// add short code
require_once( __DIR__ . '/includes/functions/shortcode.php');


// Ajax handler for draft posts
function get_draft_posts_callback() {


    $offset = $_POST['offset'];

    $user_id = get_current_user_id(  );

    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'draft',
        'author' => $user_id,
        'offset' => $offset,
    );

    $query = new WP_Query( $args );

    $draft_posts = array();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $draft_posts[] = array(
                'title' => get_the_title(),
                'id'  => get_the_ID(  ),
                'expires' => do_shortcode( '[postexpirator type=date dateformat="d-m-Y"]' )
            );
        }
    }

    wp_reset_postdata();

    wp_send_json( $draft_posts );
}

add_action( 'wp_ajax_get_draft_posts', 'get_draft_posts_callback' );


// Ajax handler for draft posts
function get_published_posts_callback() {


    $offset = $_POST['offset'];

    $user_id = get_current_user_id(  );

    $args = array(
        'post_type'      => 'post',
        'post_status' => 'publish',
        'category__not_in' => array( 21 ),
        'author' => $user_id,
        'offset' => $offset,
    );

    $query = new WP_Query( $args );

    $published_posts = array();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $published_posts[] = array(
                'title' => get_the_title(),
                'id'  => get_the_ID(  ),
                'expires' => do_shortcode( '[postexpirator type=date dateformat="d-m-Y"]' )
            );
        }
    }

    wp_reset_postdata();

    wp_send_json( $published_posts );
}

add_action( 'wp_ajax_get_published_posts', 'get_published_posts_callback' );

// Ajax method for publishing post
function publish_post() {
    $post_id = $_POST['post_id'];

    if ( $post_id ) {

        $current_token = gamipress_get_user_points($userId, 'token');
        $new_points = $current_token - 5;
        gamipress_update_user_points( $user_id, $new_points, get_current_user_id(), null, 'token' );

        wp_publish_post($post_id);

        wp_send_json( ['status' => 'published'] );
            
    }

    wp_send_json( ['status' => 'failed'] );

    wp_die();
}
add_action( 'wp_ajax_publish_post', 'publish_post' );

// Ajax method for Making featured post
function make_featured_post() {
    $post_id = $_POST['post_id'];

    if ( $post_id ) {

        $current_token = gamipress_get_user_points($userId, 'token');
        $new_points = $current_token - 5;
        gamipress_update_user_points( $user_id, $new_points, get_current_user_id(), null, 'token' );

        // Update the post category
        wp_set_post_categories( $post_id, array( 21 ) );

        wp_send_json( ['status' => 'featured'] );
        
    }

    wp_send_json( ['status' => 'failed'] );

    wp_die();
}
add_action( 'wp_ajax_make_featured_post', 'make_featured_post' );


// Add instagram username filed to users profile
function add_instagram_field($fields) {
    $fields['instagram_username'] = 'Instagram Username';
    return $fields;
}
add_filter('user_contactmethods', 'add_instagram_field', 10, 1);

// Add profile image filed to users profile
function user_profile_pic_url($fields) {
    $fields['profile_pic_url'] = 'Profile Pic Url';
    return $fields;
}
add_filter('user_contactmethods', 'user_profile_pic_url', 10, 1);



// AJAX handler for uploading user avatar
add_action( 'wp_ajax_upload_user_avatar', 'upload_user_avatar' );
function upload_user_avatar() {
    // Get the current user ID
    $user_id = get_current_user_id();

    // Check if the user ID is valid
    if ( $user_id == 0 ) {
        wp_send_json_error( 'User not logged in.' );
    }

    // Get the uploaded image data
    $file = $_FILES['avatar'];

    // Check if the file is an image
    if ( !wp_check_filetype( $file['name'], array( 'jpg', 'jpeg', 'png', 'gif' ) ) ) {
        wp_send_json_error( 'Invalid file type.' );
    }

    // Check if the file size is within limits
    if ( $file['size'] > wp_max_upload_size() ) {
        wp_send_json_error( 'File size too large.' );
    }

    // Upload the file to the media library
    $attachment_id = media_handle_upload( 'avatar', 0 );

    // Check if the upload was successful
    if ( is_wp_error( $attachment_id ) ) {
        wp_send_json_error( $attachment_id->get_error_message() );
    }

    $pic_url = wp_get_attachment_url( $attachment_id);

    // Update the user's avatar
    update_user_meta( $user_id, 'profile_pic_url', $pic_url );

    // Send a JSON response indicating success
    wp_send_json(['user_id' => $user_id, 'profile_pic' => $pic_url]);
}

//Update profile information
add_action( 'wp_ajax_update_profile_details', 'update_profile_details' );

function update_profile_details() {

    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $instagram_username = $_POST['instagramUsername'];

    $user_id = get_current_user_id();

    update_user_meta( $user_id, 'first_name', $first_name );
    update_user_meta( $user_id, 'last_name', $last_name );
    update_user_meta( $user_id, 'instagram_username', $instagram_username );

    $args = array(
        'ID'         => $user_id,
        'user_email' => esc_attr( $email)
    );
    wp_update_user( $args );

    wp_send_json_success( );

}


// joynal code added