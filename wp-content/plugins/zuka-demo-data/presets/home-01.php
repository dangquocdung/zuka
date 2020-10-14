<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

function la_zuka_preset_home_01()
{
    return array(

        array(
            'key' => 'footer_layout',
            'value' => '1col'
        ),

        array(
            'key' => 'footer_space',
            'value' => array(
                'padding_top' => '40px'
            )
        ),
        array(
            'key' => 'enable_footer_top',
            'value' => 'no'
        ),

        array(
            'key' => 'footer_link_color',
            'value' => '#181818'
        ),
        
        array(
            'filter_name' => 'zuka/filter/footer_column_1',
            'value' => 'footer-column-01-for-layout-01'
        ),
    
        array(
            'filter_name' => 'zuka/setting/option/get_single',
            'filter_func' => function( $value, $key ){
                if( $key == 'la_custom_css'){
                    $value .= '
.footer-bottom .footer-bottom-inner {
    padding: 5px 0 15px;
}
.site-footer{
    border: none;
}
';
                }
                return $value;
            },
            'filter_priority'  => 10,
            'filter_args'  => 2
        ),
        array(
            'key' => 'footer_copyright',
            'value' => '
<div class="row">
	<div class="col-xs-12 text-center font-size-10">
		© 2018 ZUKA. Designed by LA-STUDIO
	</div>
</div>
'
        ),
    );
}