<?php

namespace MyTheme;

/**
 * Add theme scripts and styles to the WordPress scripts queue.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function enqueue_scripts()
{
    // Remove default block styles.
    wp_dequeue_style('wp-block-library');

    // Remove jQuery. Blergh.
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');

    // Theme stylesheet.
    wp_enqueue_style(
        'style',
        get_template_directory_uri() . '/style.css',
        [],
        getenv("BUNDLE_VERSION") || null,
        'all'
    );

    // Theme script.
    wp_enqueue_script(
        'script',
        get_template_directory_uri() . '/script.js',
        [],
        getenv("BUNDLE_VERSION") || null,
        false
    );
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts');
