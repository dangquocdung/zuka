<?php

function lahfb_date( $atts, $uniqid, $once_run_flag ) {

	extract( LAHFB_Helper::component_atts( array(
		'text'			=> 'Today: ',
		'date_format'	=> 'M. j, Y',
		'date_example'	=> '
			<font color="#000">F j, Y g:i a</font> - <small>November 6, 2010 12:50 am</small><br>
			<font color="#000">F j, Y</font> - <small>November 6, 2010</small><br>
			<font color="#000">F, Y</font> - <small>November, 2010</small><br>
			<font color="#000">g:i a</font> - <small>12:50 am</small><br>
			<font color="#000">g:i:s a</font> - <small>12:50:48 am</small><br>
			<font color="#000">l, F jS, Y</font> - <small>Saturday, November 6th, 2010</small><br>
			<font color="#000">M j, Y @ G:i</font> - <small>Nov 6, 2010 @ 0:50</small><br>
			<font color="#000">Y/m/d</font> - <small>2010/11/06</small><br>
			For more formats, please follow link: <a href="https://codex.wordpress.org/Formatting_Date_and_Time">Formatting Date and Time</a>
		',
		'extra_class'	=> '',
	), $atts ));

	$out = '';

	$text			= $text ? $text : '' ;
	$date_format	= $date_format ? $date_format : get_option('date_format') ;

	// styles
	if ( $once_run_flag ) :

		$dynamic_style = '';
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Text', '#lastudio-header-builder .com_date_' . esc_attr( $uniqid ) . ' .lahfb-date-text' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Date', '#lastudio-header-builder .com_date_' . esc_attr( $uniqid ) . ' .lahfb-date-detail' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Background', '#lastudio-header-builder .com_date_' . esc_attr( $uniqid ) );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Box', '#lastudio-header-builder .com_date_' . esc_attr( $uniqid ) );

        if ( $dynamic_style ) :
            LAHFB_Helper::set_dynamic_styles( $dynamic_style );
        endif;

	endif;

	// extra class
	$extra_class = $extra_class ? ' ' . $extra_class : '' ;


	// render
	$out .= '
		<div class="lahfb-element lahfb-element-wrap lahfb-date-wrap lahfb-date' . esc_attr( $extra_class ) . ' com_date_'.esc_attr( $uniqid ).'">';
	if ( ! empty( $text ) ) {
		$out .=	'<span class="lahfb-date-text">' . $text . '</span>';
	}
	$out .=	'<span class="lahfb-date-detail">' . date( $date_format ) . '</span>';
	$out .= '</div>';

	return $out;

}

LAHFB_Helper::add_element( 'date', 'lahfb_date' );
