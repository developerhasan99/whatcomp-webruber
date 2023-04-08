<?php 
// Template Name: Add Competition page template
if ( ! defined( 'ABSPATH' ) ) exit;

$is_error = false;
$is_success = false;

if (isset( $_POST['title']) && ! empty( $_POST['title'])) {


    
    $title = $_POST['title'];
    $max = $_POST['max'];
    $sold = $_POST['sold'];
    $price = $_POST['price'];
    $withdraw_date = $_POST['withdraw_date'];
    $url = $_POST['url'];
    $thumbnail_url = $_POST['thumbnail_url'];
    
    if ( $title && $max && $sold && $price && $withdraw_date && $url && $thumbnail_url ) { 
        
        $post = [
            'post_title'   => $title,
            'post_type'    => 'post',
        ];
        
        $post_id = wp_insert_post( $post );
    
        if ($post_id) {
            // add post metadata
            update_post_meta($post_id, 'max', $max);
            update_post_meta($post_id, 'sold', $sold);
            update_post_meta($post_id, 'price', $price);
            update_post_meta($post_id, 'url', $url);
            update_post_meta($post_id, 'thumbnail_url', $thumbnail_url);
            update_post_meta($post_id, 'withdraw_date', $withdraw_date);

            $is_success = true;
        } else {
            $is_error = true;
        }
    }
}

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
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                    </svg>
                    <?php if($is_error){ ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                There was an error while saving your competition.
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($is_success){ ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                Competition added successfully! Add new one, or go to dashboard to see your competitions.
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="mt-1 mb-2 text-center">Add Competition!</h4>
                            <form method="POST" action="<?php echo home_url( 'add-competition' ); ?>">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="title">Title</label>
                                    <input required name="title" type="text" id="title" class="form-control form-control-lg" />
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="max">Max</label>
                                            <input required name="max" type="number" id="max" class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="sold">Sold</label>
                                            <input required name="sold" type="number" id="sold" class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="price">Price</label>
                                            <input required name="price" type="number" id="price" class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="withdraw_date">Withdraw date</label>
                                            <input required name="withdraw_date" type="date" id="withdraw_date" class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="url">Url</label>
                                    <input required name="url" type="url" id="url" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="thumbnail_url">Thumbnail Url</label>
                                    <input required name="thumbnail_url" type="url" id="thumbnail_url" class="form-control form-control-lg" />
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit"
                                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Save to WhatComp</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>