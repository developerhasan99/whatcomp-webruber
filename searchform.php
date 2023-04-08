<?php 
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

/**
 * @webruber 1
 * Searchform template!
 */

 ?>

<form method="get" action="<?php echo esc_url( home_url( ) ); ?>">
    <div class="search_form_group">
      <input type="text" class="search_form_input form-control" name="s" placeholder="Type something and hit enter..." value="<?php the_search_query(); ?>">
      <button class="search_form_btn btn" type="submit" name="button" aria-label="Search">
        <?php echo webruber_svg('search'); ?>
      </button>
    </div>
</form>
