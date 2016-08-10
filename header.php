<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ggstyle
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'ggstyle'); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding">
            <?php
            $site_logo = get_custom_logo();
            if ($site_logo) :
                // Custom logo
                if (is_front_page() || is_home()) :
                    echo "<h1 class='site-title'>$site_logo</h1>";
                else :
                    echo "<p class='site-title'>$site_logo</p>";
                endif;
            else :
                // No custom logo
                if (is_front_page() || is_home()) :
                    echo "<h1 class='site-title'><a href='".esc_url(home_url('/'))."' rel='home'>".get_bloginfo('name')."</a></h1>";
                else :
                    echo "<p class='site-title'><a href='".esc_url(home_url('/'))."' rel='home'>".get_bloginfo('name')."</a></p>";
                endif;
            endif; // $site_logo

            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) : ?>
                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
            <?php
            endif;
            ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation" role="navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'ggstyle'); ?></button>
            <?php wp_nav_menu(array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' )); ?>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
