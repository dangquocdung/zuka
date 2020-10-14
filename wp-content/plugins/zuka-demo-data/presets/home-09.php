<?php
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

function la_zuka_preset_home_09()
{
    return array(
        array(
            'key' => 'header_layout',
            'value' => 'pre-header-05'
        ),
        array(
            'filter_name' => 'zuka/setting/option/get_single',
            'filter_func' => function ($value, $key) {
                if ($key == 'la_custom_css') {
                    $value .= '
.is-sticky .sticky--pinned .lahfb-desktop-view .header-v5-1 {
    display: none;
}
.is-sticky .sticky--pinned .lahfb-desktop-view .header-v5-2 {
    display: none;
}
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