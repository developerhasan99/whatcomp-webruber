<?php 
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

/**
 * @webruber 1
 * Footer Template
 */

 ?>

    <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <?php 
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                }            
                ?>
                <?php dynamic_sidebar( 'footer-widget-1' ); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php dynamic_sidebar( 'footer-widget-2' ); ?>
            </div>
            <div class="col-md-4 mb-4">
                <h2 class="footer-widget-title">Follow us</h2>
                <ul class="social_network_list">
                    <li>
                        <a target="_blank" class="facebook_social_link footer_social_link" href="https://web.facebook.com/laptopFasterPlc" rel="nofollow noreferrer" aria-label="Facebook">
                        <?php echo webruber_svg('facebook'); ?>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" class="twitter_social_link footer_social_link" href="https://twitter.com/laptopfaster" rel="nofollow noreferrer" aria-label="Twitter">
                        <?php echo webruber_svg('twitter'); ?>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" class="instagarm_social_link footer_social_link" href="https://www.instagram.com/laptopfaster" rel="nofollow noreferrer" aria-label="Instagram">
                        <?php echo webruber_svg('instagram'); ?>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" class="linkedin_social_link footer_social_link" href="https://linkedin.com/in/laptop-faster" rel="nofollow noreferrer" aria-label="Linkedin">
                        <?php echo webruber_svg('linkedin'); ?>
                        </a>
                    </li>
                </ul>
                <p class="copyright_text">&copy; <?php echo copydate(); ?> <strong><?php bloginfo(); ?></strong> - All Rights Reserved.</p>
            </div>
        </div>
    </div>
    </footer>
    <?php wp_footer( ) ?>
</body>

</html>