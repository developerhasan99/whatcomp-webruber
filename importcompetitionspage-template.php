<?php 
// Template Name: Import Competitions page template

$user = wp_get_current_user(  );

global $wpdb;
$table_name = $wpdb->prefix . 'whatcomp_users_data';

$results = $wpdb->get_results( 
    "
    SELECT *
    FROM $table_name
    WHERE `user_id` = $user->id
    "
);

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
                    <div class="credentials-error">
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                There was an error while importing competitions.
                            </div>
                        </div>
                    </div>
                        
                    <div class="card import-form-card mb-3">
                        <div class="card-body">

                            <h4 class="mt-1 mb-2 text-center">Import Competition!</h4>

                            <?php if (count($results) > 0) { ?>

                                <div class="my-4">
                                    <h3><i>Automatic data pulling is running!</i></h3>
                                    <p>Every new listing will be automatically pull in every 45 minutes.</p>
                                </div>

                            <?php } else { ?>

                                <p>Please provide those required information to import listings from your WooCommerce website.</p>
                                <form method="POST" id="import-form">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="site_url">WooCommerce site URL:</label>
                                        <input required name="site_url" type="url" id="site_url" class="form-control form-control-lg" placeholder="https://example.com/" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="consumer_key">Consumer Key:</label>
                                        <input required name="consumer_key" type="text" id="consumer_key" class="form-control form-control-lg" placeholder="ck_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="consumer_secrete">Consumer Secret:</label>
                                        <input required name="consumer_secrete" type="text" id="consumer_secrete" class="form-control form-control-lg" placeholder="cs_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"/>
                                    </div>

                                    <p><a href="https://woocommerce.com/document/woocommerce-rest-api/#section-2">Learn how to get WooCommerce Consumer Key and Secret Key</a></p>
                                    
                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Import Competitions</button>
                                    </div>

                                </form>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card imported-competitions-card">
                        <h4 class="my-3 px-2">Imported Competitions!</h4>
                        <div class="table-responsive">
                            <table class="table table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Competition title</th>
                                    </tr>
                                </thead>
                                <tbody class="imported-competitions">
                                </tbody>
                            </table>
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
                <h4 class="mt-3">Importing, please wait...</h4>
            </div>
        </div>
    </div>

    
    <script>
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <script type='text/javascript' src='<?php echo home_url(  ); ?>/wp-includes/js/jquery/jquery.min.js' id='jquery-core-js'></script>
    <script type='text/javascript' src='<?php echo home_url(  ); ?>/wp-includes/js/jquery/jquery-migrate.min.js' id='jquery-migrate-js'></script>
    <script src="<?php echo get_template_directory_uri(  ) . '/static/js/import-competition.js' ?>"></script>
</body>
</html>