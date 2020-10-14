<?php

/**
 * Child Theme Function
 *
 */

add_action( 'after_setup_theme', 'zuka_child_theme_setup' );
add_action( 'wp_enqueue_scripts', 'zuka_child_enqueue_styles', 20);

if( !function_exists('zuka_child_enqueue_styles') ) {
    function zuka_child_enqueue_styles() {
        wp_enqueue_style( 'zuka-child-style',
            get_stylesheet_directory_uri() . '/style.css',
            array( 'zuka-theme' ),
            wp_get_theme()->get('Version')
        );

    }
}

if( !function_exists('zuka_child_theme_setup') ) {
    function zuka_child_theme_setup() {
        load_child_theme_textdomain( 'zuka-child', get_stylesheet_directory() . '/languages' );
    }
}
