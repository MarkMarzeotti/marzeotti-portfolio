<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
