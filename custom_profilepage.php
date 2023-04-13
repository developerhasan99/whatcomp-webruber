<?php 
// Template Name: Profile page

$is_error = '';
$is_success = '';

$user_id = get_current_user_id(  );



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
                    
                    <div class="profile_details_success">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                Profile details updated successfully.
                            </div>
                        </div>
                    </div>


                    <!-- Profile pic success -->
                    <div class="profile_pic_success">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                Profile pic uploaded successfully.
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="mt-1 mb-2">Profile Photo!</h4>
                            <div class="card-body">
                                <div class="profile-photo-wrapper">
                                    <img src="<?php echo get_the_author_meta('profile_pic_url', $user_id); ?>" alt="Profile pic" class="profile_pic">
                                    <button class="btn btn-success update-avatar-btn">Update Photo!</button>
                                </div>
                                <div class="avatar-upload-form-wrapper">
                                    <form method="POST" class="profile-pic-uploader">
                                        <input required id="avatar" class="form-control" type="file">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="mt-1 mb-2">Profile details!</h4>
                            <form method="POST" action="" id="profile-details">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="title">First name</label>
                                    <input name="firstName" type="text" id="title" class="form-control form-control-lg" value="<?php echo get_the_author_meta('first_name', $user_id); ?>" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="title">Last name</label>
                                    <input name="lastName" type="text" id="title" class="form-control form-control-lg" value="<?php echo get_the_author_meta('last_name', $user_id); ?>" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="title">Email</label>
                                    <input name="email" type="text" id="title" class="form-control form-control-lg" value="<?php echo get_the_author_meta('email', $user_id); ?>" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="title">Instagram username</label>
                                    <input name="instagramUsername" type="text" id="title" class="form-control form-control-lg" value="<?php echo get_the_author_meta('instagram_username', $user_id); ?>" />
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit"
                                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Loader Animation -->
    <div class="importing-loader">
        <div class="loader-wrapper">
            <div class="loader">
                <div class="spin-loader" aria-hidden="true"></div>
                <h4 class="mt-3">Updating...</h4>
            </div>
        </div>
    </div>


<script>
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <script type='text/javascript' src='<?php echo home_url(  ); ?>/wp-includes/js/jquery/jquery.min.js' id='jquery-core-js'></script>
    <script type='text/javascript' src='<?php echo home_url(  ); ?>/wp-includes/js/jquery/jquery-migrate.min.js' id='jquery-migrate-js'></script>
    <script src="<?php echo get_template_directory_uri(  ) . '/static/js/profile.js' ?>"></script>
    
</body>
</html>