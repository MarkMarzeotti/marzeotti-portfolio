<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marzeotti_Base
 */

?>

    <div class="modals">
        <div id="request-call">
            <button class="modal-close" aria-controls="request-call" aria-expanded="false"><?php esc_html_e( 'Close', 'marzeotti-base' ); ?></button>
            <h4>Leave your name and number and we'll get back to you as soon as possible.</h4>
        </div>
        <div id="improve-seo">
            <button class="modal-close" aria-controls="improve-seo" aria-expanded="false"><?php esc_html_e( 'Close', 'marzeotti-base' ); ?></button>
            <h2>Here's what we'll do.</h2>
            <h4>Take a look at what you're doing right.</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <h4>Take a look at where you could improve.</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <h4>Identify the opportunity and execute.</h4>
        </div>
        <div id="how-do-i-know">
            <button class="modal-close" aria-controls="how-do-i-know" aria-expanded="false"><?php esc_html_e( 'Close', 'marzeotti-base' ); ?></button>
            <h2>Answer a couple questions for us...</h2>
            <h4>How fast is your website?</h4>
            <p>Visit <a href="https://gtmetrix.com/" target="_blank">GTmetrix</a> and check your site speed. How did it do? Search engines look for a fast loading site to serve their users. If your score was anything less than straight A's lets chat about how we can get you there.</p>
            <h4>Is your site loading securely?</h4>
            <p>Search engines want to send users to websites they can trust. If you dont have an SSL certificate, Google is actually less likely move your site up in its rankings. Let us know and we can handle the hard stuff for you.</p>
        </div>
    </div>

    <footer id="colophon" class="site-footer">

        <div class="footer-inner">

            <div class="site-info">
                <p>&copy; <?php echo date('Y'); ?> Copyright. <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
            </div><!-- .site-info -->

            <div class="footer-nav">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'container' => false
                    ) );
                ?>
            </div>

        </div><!-- .footer-inner -->

    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
