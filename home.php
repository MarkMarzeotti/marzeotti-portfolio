<?php
/**
 * The template for displaying posts on post page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

get_header(); ?>

    <div class="site-content">
        <div class="content-inner">

            <div class="posts-area" data-equal-height>

                <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content' );

                endwhile; // End of the loop.
                ?>

            </div>

            <div class="content-area">
                <a class="btn load-more-posts" href="#"><span>Load More</span></a>
            </div><!-- .content-container -->

        </div><!-- .content-inner -->
    </div><!-- .site-content -->

    <section class="cta">
        <div class="cta-inner">
            <div class="cta-content">
                <h2>Ready To Learn More?</h2>
                <hr />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a class="btn" href="#">Learn More</a>
            </div>
        </div>
    </section>

<?php
get_footer();
