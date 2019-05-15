<?php
/**
 * The template for displaying posts on post page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

get_header(); ?>

    <div class="site-content blog first-content">
        <div class="medium-inner">

            <?php
            while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" class="blog__item">
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                        $imageThumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                        if ($imageThumb[0]) {
                            $image = $imageThumb[0];
                        } else {
                            $image = get_stylesheet_directory_uri() . '/assets/img/blog-placeholder.png';
                        } ?>
                        <img class="blog__image" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />

                        <time class="blog__date" datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'F j, Y' ); ?></time>
                    
                        <h2 class="blog__title"><?php the_title(); ?></h2>
                    </a>
                
                    <div class="blog__content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            
                <?php
            endwhile; // End of the loop.
            ?>

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
