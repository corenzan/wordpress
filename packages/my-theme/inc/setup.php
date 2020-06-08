<?php

namespace MyTheme;

/**
 * Theme setup.
 *
 * @link https://developer.wordpress.org/reference/hooks/after_setup_theme/
 * @link https://roots.io/plugins/soil/
 */
function theme_setup()
{
    // Setup site features.
    add_theme_support('soil-clean-up');
    add_theme_support('soil-disable-asset-versioning');
    add_theme_support('soil-disable-trackbacks');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('disable-custom-colors');
    add_theme_support('disable-custom-font-sizes');

    // Remove Link header.
    remove_action('template_redirect', 'rest_output_link_header', 11);

    // Add main menu.
    register_nav_menu('main', __('Main', 'my-theme'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\theme_setup');
