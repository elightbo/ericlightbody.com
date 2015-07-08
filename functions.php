<?php
/**
 * eric lightbody stuff and nonsense
 *
 * @package ericlightbody
 */

/**
 * Load up the version of jQuery you want. Pulled from http://bavotasan.com/2010/force-wordpress-use-latest-version-jquery/
 *
 * @param $version
 */
function current_jquery($version)
{
    global $wp_scripts;
    if ((version_compare($version, $wp_scripts->registered[jquery]->ver) == 1) && !is_admin()) {
        wp_deregister_script('jquery');

        wp_register_script('jquery',
            'http://ajax.googleapis.com/ajax/libs/jquery/' . $version . '/jquery.min.js',
            false, $version);
    }
}

add_action('wp_head', current_jquery('2.1.1'));


/**
 * Load up the css into the front-end
 */
$templateDirectory = esc_url(get_template_directory_uri());
wp_register_style('foundation', $templateDirectory . '/css/foundation.css"', [], '5.5.0');
wp_register_style('foundation-icons', $templateDirectory . '/css/foundation-icons.css"', [], '3.0');
wp_register_script('modernizr', $templateDirectory . '/js/modernizr.js', [], '2.8.3');
wp_register_script('foundation', $templateDirectory . '/js/foundation.min.js', []);

// load css into the website's front-end
function ericlightbody_enqueue_style()
{
    wp_enqueue_style('mytheme-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'ericlightbody_enqueue_style');
