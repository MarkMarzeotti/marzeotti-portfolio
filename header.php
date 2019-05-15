<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marzeotti_Base
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <script type="text/javascript">
        // var TEMPPATH = "<?php bloginfo('template_directory'); ?>";
        // var ABSPATH = "<?php echo admin_url(); ?>";
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>"; // for use within the ajax load of posts
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site tingle-content-wrapper">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'marzeotti-base' ); ?></a>

    <header id="masthead" class="site-header">

        <div class="header-inner">

            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php 
                    $logo_id = get_theme_mod( 'custom_logo' ); 
                    if ( ! empty( $logo_id ) ) {
                        $logo = wp_get_attachment_image_src($logo_id, 'full'); 
                        ?>
                        <img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo( 'name' ); ?>">
                        <?php
                    } else { ?>
                        <span><?php bloginfo( 'name' ); ?></span>
                        <?php
                    } ?>
                </a>
            </div><!-- .logo -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'marzeotti-base' ); ?></button>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'button-menu',
                        'container' => false,
                        'menu_class' => 'button-menu'
                    ) );
                ?>
                <div class="navigation-menu">
                    <div class="vertical-middle-wrapper">
                        <div class="vertical-middle">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary-menu',
                                    'container' => false,
                                    'menu_class' => false
                                ) );
                            ?>
                        </div>
                    </div>
                </div>
            </nav><!-- #site-navigation -->

        </div><!-- .header-inner -->

    </header><!-- #masthead -->
