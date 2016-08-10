<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ggstyle
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ggstyle_body_classes($classes)
{
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if (! is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}
add_filter('body_class', 'ggstyle_body_classes');

/**
 * Adds extra items the menu for mobile.
 */
function gg_wp_nav_menu($items, $args)
{
    $additionalItems = "";
    $additionalItems .= "<div class='nav-header'>";
    if (get_custom_logo()) {
        $additionalItems .= get_custom_logo();
    }
    $additionalItems .= "<span class='nav-close'>&#10005;</span></div>";
    
    $items = $additionalItems . $items;
    
    return $items;
}
add_action('wp_nav_menu_items', 'gg_wp_nav_menu', 1, 2);
