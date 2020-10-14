<?php

function lahfb_contact_f( $atts, $uniqid, $once_run_flag ) {

	extract( LAHFB_Helper::component_atts( array(
		'contact_form'		=> '',
		'contact_type'		=> 'icon',
		'open_form'			=> 'modal',
		'contact_text'		=> 'CONTACT US',
		'show_tooltip'		=> 'false',
		'tooltip_text'		=> 'Contact',
		'tooltip_position'	=> 'tooltip-on-bottom',
		'extra_class'		=> '',
	), $atts ));

	$out = $data_tooltip = $contact_extra_class = $modal = '';

	// login
	$contact_type 		= $contact_type ? $contact_type : '' ;
	$contact_text 		= $contact_text ? $contact_text : '' ;
	$open_form 			= $open_form ? $open_form : '' ;
	
	// tooltip
	$tooltip_text	= ! empty( $tooltip_text ) ? $tooltip_text : '' ;
	$tooltip = $tooltip_class = '';
	if ( $show_tooltip == 'true' && $tooltip_text ) :
		
		$tooltip_position 	= ( isset( $tooltip_position ) && $tooltip_position ) ? $tooltip_position : 'tooltip-on-bottom';
		$tooltip_class		= ' lahfb-tooltip ' . $tooltip_position;
		$tooltip			= ' data-tooltip=" ' . esc_attr( $tooltip_text ) . ' "';

	endif;

	// styles
	if ( $once_run_flag ) :

		$dynamic_style = '';
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Text', '#lastudio-header-builder .contact_' . esc_attr( $uniqid ) .' .lahfb-contact-text','#lastudio-header-builder .contact_' . esc_attr( $uniqid ) .':hover .lahfb-contact-text' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Icon', '#lastudio-header-builder .contact_' . esc_attr( $uniqid ) . ' .lahfb-icon-element i', '#lastudio-header-builder .contact_' . esc_attr( $uniqid ) . ':hover .lahfb-icon-element i'  );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Box', '#lastudio-header-builder .contact_' . esc_attr( $uniqid ) .'' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Form', '#lastudio-header-builder .contact_' . esc_attr( $uniqid ) .' .la-contact-form' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Tooltip', '#lastudio-header-builder .contact_' . esc_attr( $uniqid ) .'.lahfb-tooltip[data-tooltip]:before' );


        if ( $dynamic_style ) :
            LAHFB_Helper::set_dynamic_styles( $dynamic_style );
        endif;

	endif;

	// extra class
	$extra_class = $extra_class ? ' ' . $extra_class : '' ;
	
	if ( ( $contact_type == 'text' || $contact_type == 'icon' ) && ( $open_form == 'modal' ) ) {
		$contact_extra_class = 'lahfb-header-toggle';
	} elseif ( ( $contact_type == 'text' || $contact_type == 'icon' ) && ( $open_form == 'dropdown' ) ){
		$contact_extra_class = 'lahfb-header-dropdown';
	}

	// render
	$out .= '<div class="lahfb-element lahfb-icon-wrap lahfb-contact ' . esc_attr( $tooltip_class . $extra_class ) . ' ' . $contact_extra_class . ' contact_'.esc_attr( $uniqid ).'" ' . $tooltip . '>';

		if ( ( $contact_type == 'text' || $contact_type == 'icon' ) && ( $open_form == 'modal' ) ) {
			$out .= '<a class="lahfb-modal-element lahfb-modal-target-link" href="#w-contact-' . esc_attr( $uniqid ) . '" data-effect="mfp-zoom-in"></a>';
		}

		if ( $contact_type == 'text' || $contact_type == 'icon' ) {
        $out .= '<div class="lahfb-icon-element hcolorf">';
                if ( $contact_type == 'text' ) {
                    $out .= '<span class="lahfb-contact-text">' . $contact_text . '</span>';
                } elseif ( $contact_type == 'icon' )  {
                    $out .= '<i class="fa fa-envelope-o"></i>';
                }
        $out .= '</div>';
			
		}

		if($once_run_flag){
            if ( ( $contact_type == 'text' || $contact_type == 'icon' ) && ( $open_form == 'modal' ) ) {
                $out .= '<div id="w-contact-' . esc_attr( $uniqid ) . '" class="w-modal modal-contact white-popup mfp-with-anim mfp-hide">
					<h3 class="modal-title"> ' . esc_html__( 'CONTACT', 'lahfb-textdomain' ) . '</h3>';
            }
            if ( ( $contact_type == 'text' || $contact_type == 'icon' ) && ( $open_form == 'dropdown' ) ) {
                $out .= '<div class="lahfb-trigger-element js--trigger-contact-dropdown"></div><div class="la-contact-form-wrap la-contact-form la-element-dropdown">';
            }

            if ( ( $contact_type == 'form' ) ) {
                $out .= '<div id="la-contact-form-' . esc_attr( $uniqid ) . '" class="la-contact-form">';
            }

            if ( ! empty( $contact_form ) ) {
                $out .=	do_shortcode( '[contact-form-7 id="' . $contact_form . '" title="' . esc_attr( 'Contact' ) . '"]' );
            }
            else {
                $out .=	esc_html__( 'Please select a from in Theme Option.', 'lahfb-textdomain' );
            }

            $out .= '</div>';
        }
	$out .= '</div>';
	return $out;

}

LAHFB_Helper::add_element( 'contact', 'lahfb_contact_f' );
