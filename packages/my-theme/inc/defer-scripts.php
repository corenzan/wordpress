<?php

namespace MyTheme;

/**
 * Add defer attribute to enqueued scripts.
 *
 * @link https://developer.wordpress.org/reference/hooks/script_loader_tag/
 *
 * @param string $tag The original <script> tag.
 * @param string $handle The registered handle of the script.
 *
 * @return string The modified <script> tag.
 */
function defer_scripts($tag)
{
    if (is_admin()) {
        return $tag;
    }
    if (strpos($tag, '<script') === false) {
        return $tag;
    }
    return str_replace('<script', '<script defer', $tag);
}
add_filter('script_loader_tag', __NAMESPACE__ . '\\defer_scripts', 10, 2);
