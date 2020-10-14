<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

function la_zuka_preset_home_03()
{
    return array(


    
        array(
            'key' => 'footer_layout',
            'value' => '5col32223'
        ),
        array(
            'key' => 'footer_space',
            'value' => array(
                'padding_top' => '55px'
            )
        ),
        array(
            'key' => 'enable_footer_top',
            'value' => 'no'
        ),
        array(
            'key' => 'footer_background',
            'value' => array(
                'color' => '#2A2A2A'
            )
        ),
        array(
            'key' => 'footer_copyright_background_color',
            'value' => '#2A2A2A'
        ),

        array(
            'key' => 'footer_heading_color',
            'value' => '#d6d6d6'
        ),
        array(
            'key' => 'footer_text_color',
            'value' => '#969696'
        ),
        array(
            'key' => 'footer_link_color',
            'value' => '#969696'
        ),

        
        array(
            'filter_name' => 'zuka/filter/footer_column_1',
            'value' => 'footer-column-01-for-layout-03'
        ), 
        array(
            'filter_name' => 'zuka/filter/footer_column_5',
            'value' => 'footer-column-instagram'
        ),
    
        array(
            'filter_name' => 'zuka/setting/option/get_single',
            'filter_func' => function( $value, $key ){
                if( $key == 'la_custom_css'){
                    $value .= '
#la_full_page #colophon {
    margin-left: auto;
    margin-right: auto;
}
.footer-bottom .footer-bottom-inner {
    padding: 5px 0 15px;
}
.site-footer .footer-top{
    max-width: 100%;
}
.site-footer .social-media-link.style-default a i{
    color: #969696;
}
@media(min-width: 1200px){
    .la-footer-5col32223 .footer-column {
        width: 16%;
    }
    .la-footer-5col32223 .footer-column-1 {
        width: 27%;
    }
    .la-footer-5col32223 .footer-column-5 {
        width: 25%;
    }
}
.isLaWebRoot .la-footer-5col32223 .footer-column-5 .footer-column-inner {
    width: 100%;
    float: none;
}
.la-footer-5col32223 .footer-column-1 .footer-column-inner {
    width: 300px;
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
    <div class="col-xs-12 text-center font-size-12">
        © 2018 ZUKA All rights reserved
    </div>
</div>
'
        ),
    );
}