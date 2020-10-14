<?php

function lahfb_wishlist( $atts, $uniqid, $once_run_flag ) {

    extract( LAHFB_Helper::component_atts( array(
        'wishlist_page_url'	    => '#',
		'show_tooltip'	    => 'false',
        'tootlip'	        => 'Wishlist',
        'tooltip_position'	=> 'tooltip-on-bottom',
		'extra_class'	    => '',
	), $atts ));

    $out = $icon = '';

    // tooltip
    $tooltip_text   = ! empty( $tooltip_text ) ? $tooltip_text : '' ;
    $tooltip = $tooltip_class = '';
    if ( $show_tooltip == 'true' && $tooltip_text ) :
        
        $tooltip_position   = ( isset( $tooltip_position ) && $tooltip_position ) ? $tooltip_position : 'tooltip-on-bottom';
        $tooltip_class      = ' lahfb-tooltip ' . $tooltip_position;
        $tooltip            = ' data-tooltip=" ' . esc_attr( $tooltip_text ) . ' "';

    endif;
    
    // styles
    if ( $once_run_flag ) :
    
        $dynamic_style = '';
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Icon', '#lastudio-header-builder .wishlist_' . esc_attr( $uniqid ) . ' > .la-wishlist-modal-icon > i:before', '#lastudio-header-builder .wishlist_' . esc_attr( $uniqid ) . ':hover > .la-wishlist-modal-icon i:before'  );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Box', '#lastudio-header-builder .wishlist_' . esc_attr( $uniqid ) . '' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Tooltip', '#lastudio-header-builder .wishlist_' . esc_attr( $uniqid ) .'.lahfb-tooltip[data-tooltip]:before' );

        if ( $dynamic_style ) :
            LAHFB_Helper::set_dynamic_styles( $dynamic_style );
        endif;

    endif;

    // extra class
    $extra_class = $extra_class ? ' ' . $extra_class : '' ;

    // render
    $out .= '
       <div class="lahfb-element lahfb-icon-wrap lahfb-wishlist ' . esc_attr( $tooltip_class . $extra_class ) . ' lahfb-header-dropdown wishlist_'.esc_attr( $uniqid ).'" ' . $tooltip . '>
            <a href="'.esc_url($wishlist_page_url).'" class="lahfb-trigger-element js--trigger-wishlist-icon"></a>
                <div class="la-wishlist-modal-icon lahfb-icon-element hcolorf "><i class="dl-icon-heart4"></i>
            </div>';
    $out .= '</div>';
    return $out;

}

LAHFB_Helper::add_element( 'wishlist', 'lahfb_wishlist' );