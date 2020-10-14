<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

add_filter('LAHFB/preheaders', function( $options ){

    return $options;

    $path = plugin_dir_path(__FILE__) . 'presets/headers/data/';
    $url = plugin_dir_url(__FILE__) . 'presets/headers/previews/';
    $tmp = array();
    foreach (glob($path.'*.json') as $filename){
        $key = str_replace('.json', '', basename($filename));
        $tmp[$key] = array(
            'name' => str_replace('-', ' ', $key),
            'image_url' => $url . $key . '.jpg',
            'data' => json_encode(array(
                'lahfb_data_frontend_components' => json_decode(file_get_contents($filename), true)
            ))
        );
    }

    //$options = $tmp;

    return $options;
});