<?php

namespace MyTheme;

/**
 * Load Google Fonts, optimized.
 * 
 * @link https://developer.wordpress.org/reference/hooks/wp_head/
 */
function load_google_fonts()
{
    $url = 'https://fonts.googleapis.com/css?display=swap&family=Roboto:400,400i';

?>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preload" as="style" href="<?php echo $url; ?>" />
    <link rel="stylesheet" href="<?php echo $url; ?>" media="print" onload="this.media='all'" />
    <noscript>
        <link rel="stylesheet" href="<?php echo $url; ?>" />
    </noscript>
<?php
}
add_action('wp_head', __NAMESPACE__ . '\\load_google_fonts');
