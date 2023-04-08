<?php 

/**
 * @webruber 1
 * Bradcrumb function
 */

function get_breadcrumb() {
    echo '<a href="'.home_url().'">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&rsaquo;&nbsp;";
        the_category('&nbsp;&plus;&nbsp;');
            if (is_single()) {
                echo " &nbsp;&rsaquo;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&rsaquo;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&rsaquo;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}