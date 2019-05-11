<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
    <div class="site-content content-blurb">
        <div class="content-inner">

            <div class="content-container">
                <div class="content-area full-width">
                    <?php get_template_part( 'template-parts/content', 'page' ); ?>
                </div>
            </div><!-- .content-container -->

        </div><!-- .content-inner -->
    </div><!-- .site-content -->
    <?php endwhile; // End of the loop. ?>

<?php
get_footer();
