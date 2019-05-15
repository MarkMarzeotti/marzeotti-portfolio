<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Marzeotti_Base
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="site-content first-content">
        <div class="small-inner">

            <div class="content-area single">

                <?php get_template_part( 'template-parts/content', 'single' ); ?>

            </div>

            <?php get_sidebar(); ?>

        </div><!-- .content-inner -->
    </div><!-- .site-content -->

<?php endwhile; // End of the loop. ?>

<?php
get_footer();
