<?php
$user_id = get_current_user_id();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'author' => $user_id,
    'post_status' => array('draft'),
    'category__not_in' => array( 'featured' ),
    'posts_per_page' => 5,
    'paged' => $paged
);
$query = new WP_Query($args); ?>

<div class="table-responsive">
    <table class="table table table-bordered">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php 

            if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
            <tr>
                <td><?php the_title(); ?></td>
                <td><a href="<?php echo home_url( 'dashboard' ) ?>?action=publish&post_id=<?php the_ID() ?>" class="btn btn-primary btn-small">Publish</a></td>
            </tr>
            <?php endwhile; endif;

            ?>

        </tbody>
    </table>
</div>


<?php 
echo '<div class="pagination">';
echo paginate_links( array(
    'total' => $query->max_num_pages,
    'prev_text' => __( '&laquo;' ),
    'next_text' => __( '&raquo;' ),
    'type' => 'list'
) );
echo '</div>';
wp_reset_postdata();
?>

