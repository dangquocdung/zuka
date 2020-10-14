<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

function la_zuka_preset_home_05()
{
    return array(

        array(
            'key' => 'header_layout',
            'value' => 'pre-header-03'
        ),

        array(
            'key' => 'primary_color',
            'value' => '#1c34ae'
        ),

        array(
            'key' => 'footer_space',
            'value' => array(
                'padding_top' => '55px',
                'padding_bottom' => '20px'
            )
        ),
        array(
            'filter_name' => 'zuka/filter/footer_column_4',
            'value' => 'footer-column-04-for-layout-05'
        ), 
        array(
            'filter_name' => 'zuka/filter/footer_column_5',
            'value' => 'f-col-4'
        ),
        array(
            'filter_name' => 'zuka/filter/footer_column_6',
            'value' => 'f-col-5'
        ),
        array(
            'filter_name' => 'zuka/setting/option/get_single',
            'filter_func' => function( $value, $key ){
                if( $key == 'la_custom_css'){
                    $value .= '
.footer-bottom .footer-bottom-inner {
    padding-top: 10px;
    border-top: 1px solid #D8D8D8;
}
.footer-bottom .social-media-link a i {
    font-size: 16px;
}
.site-footer {
    max-width: 1550px;
    margin: 0px auto;
}
@media(min-width: 1400px){
.la-footer-6col322223 .footer-column-1 {
    width: 30%;
    width: calc( (100% - (212px * 5)));
    width: -webkit-calc( (100% - (212px * 5)));
}
.la-footer-6col322223 .footer-column-2,
.la-footer-6col322223 .footer-column-6, 
.la-footer-6col322223 .footer-column-3, 
.la-footer-6col322223 .footer-column-4, 
.la-footer-6col322223 .footer-column-5 {
    width: 212px;
}
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
                <div class="col-xs-12 text-center ">
                    <div class="social-media-link style-default " style="float:left;color: #181818;"><a href="#" class="facebook" title="Facebook" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a><a href="#" class="twitter" title="Twitter" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a><a href="#" class="pinterest" title="Pinterest" target="_blank" rel="nofollow"><i class="fa fa-pinterest-p"></i></a><a href="#" class="linked-in" title="Linked In" target="_blank" rel="nofollow"><i class="fa fa-linkedin-square"></i></a><a href="#" class="behance" title="Behance" target="_blank" rel="nofollow"><i class="fa fa-behance"></i></a></div>

                    © 2018 ZUKA All rights reserved

                    <img style="float: right;" src="https://zuka.la-studioweb.com/wp-content/themes/zuka/assets/images/payments2.png">
                </div>
            </div>
        '
        ),
    );
}




