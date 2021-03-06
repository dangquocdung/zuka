<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

$return = '';
$redirect = '';

$atts = shortcode_atts( array(
    'return' => 'link',
    'redirect' => ''
), $atts );

extract( $atts );

$link = wp_login_url($redirect);
if(function_exists('WC')){
    $link = wc_get_account_endpoint_url('dashboard');
}

if($return == 'link'){
    return esc_url($link);
}
else{
    echo sprintf('<a href="%s">%s</a>', esc_url($link), $content);
}