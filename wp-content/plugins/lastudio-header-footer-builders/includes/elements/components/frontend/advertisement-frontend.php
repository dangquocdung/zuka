<?php

function lahfb_advertisement( $atts, $uniqid, $once_run_flag ) {

	extract( LAHFB_Helper::component_atts( array(
		'image'			=> '',
		'link'			=> '',
		'link_new_tab'	=> 'false',
		'html_text'		=> '',
		'extra_class'	=> '',
	), $atts ));

	$out = '';

	$image			= $image ?  wp_get_attachment_url( $image )  : '' ;
	$link			= $link ? $link : '' ;
	$html_text		= $html_text ? $html_text : '' ;
	$link_new_tab	= $link_new_tab == 'true' ? 'target="_blank"' : '' ;

	// styles
	if ( $once_run_flag ) :

		$dynamic_style = '';
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Image', '#lastudio-header-builder .com_advertisement_' . esc_attr( $uniqid ) . ' img.lahfb-advertisement-image' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Background', '#lastudio-header-builder .com_advertisement_' . esc_attr( $uniqid ) );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Box', '#lastudio-header-builder .com_advertisement_' . esc_attr( $uniqid ) );

        if ( $dynamic_style ) :
            LAHFB_Helper::set_dynamic_styles( $dynamic_style );
        endif;

	endif;

	// extra class
	$extra_class = $extra_class ? ' ' . $extra_class : '' ;


	// render
	$out .= '
		<div class="lahfb-element lahfb-element-wrap lahfb-advertisement-wrap lahfb-advertisement' . esc_attr( $extra_class ) . ' com_advertisement_'.esc_attr( $uniqid ).'">';

		if ( ! empty ( $html_text ) ) {
			$out .= $html_text;
		}

		if ( ! empty ( $link ) ) {
			$out .= '<a href="' . esc_attr( $link ) . '" '. $link_new_tab .'>';
		}

		$out .= '<img class="lahfb-advertisement-image" src="' . esc_url( $image ) . '" alt="'. get_bloginfo('name') .'">';

		if ( ! empty ( $link ) ) {
			$out .= '</a>';
		}

	$out .= '</div>';

	return $out;

}

LAHFB_Helper::add_element( 'advertisement', 'lahfb_advertisement' );
