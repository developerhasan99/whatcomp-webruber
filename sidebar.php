<?php 
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

/**
 * @webruber 1
 * Sidebar template!
 */

 ?>

<?php if ( is_active_sidebar( 'primary-sidebar' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area sticky-top" role="complementary">
		<?php dynamic_sidebar( 'primary-sidebar' ); ?>
	</div>
<?php endif; ?>