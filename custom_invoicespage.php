<?php 

// Template Name: Invoice Page


$my_orders_columns = apply_filters(
	'woocommerce_my_account_my_orders_columns',
	array(
		'order-date'    => esc_html__( 'Date', 'woocommerce' ),
		'order-total'   => esc_html__( 'Total', 'woocommerce' ),
		'order-actions' => 'Actions',
	)
);

$customer_orders = get_posts(
	apply_filters(
		'woocommerce_my_account_my_orders_query',
		array(
			'numberposts' => $order_count,
			'meta_key'    => '_customer_user',
			'meta_value'  => get_current_user_id(),
			'post_type'   => wc_get_order_types( 'view-orders' ),
			'post_status' => array_keys( wc_get_order_statuses() ),
		)
	)
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
                    <div class="card">

                        <div class="card-body">
                            <?php if ( $customer_orders ) : ?>

                            <h2><?php echo apply_filters( 'woocommerce_my_account_my_orders_title', esc_html__( 'Recent orders', 'woocommerce' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>

                            <table class="table shop_table shop_table_responsive my_account_orders">

                                <thead>
                                    <tr>
                                        <?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
                                            <th class="<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ( $customer_orders as $customer_order ) :
                                        $order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                                        $item_count = $order->get_item_count();
                                        ?>
                                        <tr class="order">
                                            <?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
                                                <td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
                                                    <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
                                                        <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

                                                    

                                                    <?php elseif ( 'order-date' === $column_id ) : ?>
                                                        <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

                                                    <?php elseif ( 'order-status' === $column_id ) : ?>
                                                        <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

                                                    <?php elseif ( 'order-total' === $column_id ) : ?>
                                                        <?php
                                                        /* translators: 1: formatted order total 2: total order items */
                                                        printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                        ?>

                                                    <?php elseif ( 'order-actions' === $column_id ) : ?>
                                                        <?php
                                                        $actions = wc_get_account_orders_actions( $order );

                                                        if ( ! empty( $actions ) ) {
                                                            foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                                                                echo '<a href="' . esc_url( $action['url'] ) . '" class="button btn btn-primary ms-3 ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                                                            }
                                                        }
                                                        ?>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
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