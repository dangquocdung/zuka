<?php
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

function la_zuka_preset_home_04()
{
    return array(

        array(
            'key'   => 'header_layout',
            'value' => 'pre-header-02'
        ),

        array(
            'key'   => 'primary_color',
            'value' => '#dc0109'
        ),

        array(
            'filter_name' => 'zuka/setting/option/get_single',
            'filter_func' => function ($value, $key) {
                if ($key == 'la_custom_css') {
                    $value .= '

.site-footer{
    border: none;
}
';
                }
                return $value;
            },
            'filter_priority' => 10,
            'filter_args' => 2
        ),);
}