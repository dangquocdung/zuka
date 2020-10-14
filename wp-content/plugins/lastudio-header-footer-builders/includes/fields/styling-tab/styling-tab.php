<?php

function lahfb_styling_tab( $params = array() ) {

	if ( ! $params ) return;

	$screens = array(
		'all'	=> array(
			'list'	=> 'all_list_items',
			'panel'	=> 'all_panel_items',
		),
		'tablets'	=> array(
			'list'	=> 'tablets_list_items',
			'panel'	=> 'tablets_panel_items',
		),
		'mobiles'	=> array(
			'list'	=> 'mobiles_list_items',
			'panel'	=> 'mobiles_panel_items',
		),
	);

	// $list_items = $panel_items = '';

	foreach ( $screens as $screen => $vars ) :

		${$vars['list']} = ${$vars['panel']} = '';

		foreach ( $params as $el_title => $el_partials ) :

			$el_href = str_replace( '-', '_', sanitize_title( $el_title ) );

			${$vars['list']} .= '
				<li class="lahfb-tab">
					<a href="#' . $el_href . '">
						<span>' . esc_html( $el_title ) . '</span>
					</a>
				</li>
			';

			${$vars['panel']} .= '<div class="lahfb-tab-panel lahfb-styling-group-panel" data-id="#' . $el_href . '">';
				foreach ( $el_partials as $el_atts ) :
					switch ( $el_atts['property'] ) :

						// typography
						case 'color':
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Color', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
						break;

						case 'color_hover':
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Color Hover', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
						break;

						case 'fill':
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Color', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
						break;

						case 'fill_hover':
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Color Hover', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
						break;

						case 'font_size':
							${$vars['panel']} .= lahfb_number_unit( array(
								'title'			=> esc_html__( 'Font Size', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'px'	=> 'px',
									'em'	=> 'em',
									'%'		=> '%',
								),
								'default_unit'	=> 'px',
								'get'			=> true,
							));
						break;

						case 'font_weight':
							${$vars['panel']} .= lahfb_custom_select( array(
								'title'			=> esc_html__( 'Font Weight', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'300'	=> '300',
									'400'	=> '400',
									'500'	=> '500',
									'600'	=> '600',
									'700'	=> '700',
									'800'	=> '800',
									'900'	=> '900',
									''		=> '<i class="fa fa-ban"></i>',
								),
								// 'default'	=> '',
								'get'			=> true,
							));
						break;

						case 'font_style':
							${$vars['panel']} .= lahfb_custom_select( array(
								'title'			=> esc_html__( 'Font Style', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'normal' => '<i class="fa fa-ban"></i>',
									'italic' => '<span style="font-style:italic;font-family: serif;">T</span>',
								),
								'get'			=> true,
							));
						break;

						case 'text_align':
							${$vars['panel']} .= lahfb_custom_select( array(
								'title'			=> esc_html__( 'Text Align', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									''		  => '<i class="fa fa-ban"></i>',
									'left'	  => '<i class="fa fa-align-left"></i>',
									'center'  => '<i class="fa fa-align-center"></i>',
									'right'	  => '<i class="fa fa-align-right"></i>',
									'justify' => '<i class="fa fa-align-justify"></i>',
								),
								'get'			=> true,
							));
						break;

						case 'text_transform':
							${$vars['panel']} .= lahfb_custom_select( array(
								'title'			=> esc_html__( 'Text Transform', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'none'			=> '<i class="fa fa-ban"></i>',
									'uppercase'		=> 'TT',
									'capitalize'	=> 'Tt',
									'lowercase'		=> 'tt',
								),
								'get'			=> true,
							));
						break;

						case 'text_decoration':
							${$vars['panel']} .= lahfb_custom_select( array(
								'title'			=> esc_html__( 'Text Decoration', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'none'			=> '<i class="fa fa-ban"></i>',
									'underline'		=> '<u>T</u>',
									'line-through'	=> '<span style="text-decoration: line-through">T</span>',
								),
								'get'			=> true,
							));
						break;

						case 'width':
							${$vars['panel']} .= lahfb_number_unit( array(
								'title'			=> esc_html__( 'Width', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'px'	=> 'px',
									'em'	=> 'em',
									'%'		=> '%',
								),
								'default_unit'	=> 'px',
								'get'			=> true,
							));
						break;

						case 'height':
							${$vars['panel']} .= lahfb_number_unit( array(
								'title'			=> esc_html__( 'Height', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'px'	=> 'px',
									'em'	=> 'em',
									'%'		=> '%',
								),
								'default_unit'	=> 'px',
								'get'			=> true,
							));
						break;

						case 'line_height':
							${$vars['panel']} .= lahfb_number_unit( array(
								'title'			=> esc_html__( 'Line Height', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'px'	=> 'px',
									'em'	=> 'em',
									'%'		=> '%',
								),
								'default_unit'	=> 'px',
								'get'			=> true,
							));
						break;

						case 'letter_spacing':
							${$vars['panel']} .= lahfb_number_unit( array(
								'title'			=> esc_html__( 'Letter Spacing', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'px'	=> 'px',
									'em'	=> 'em',
									'%'		=> '%',
								),
								'default_unit'	=> 'px',
								'get'			=> true,
							));
						break;

						case 'overflow':
							${$vars['panel']} .= lahfb_select( array(
								'title'			=> esc_html__( 'Overflow', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									''	  	  => '',
									'auto'	  => esc_html__( 'Auto', 'lahfb-textdomain' ),
									'hidden'  => esc_html__( 'Hidden', 'lahfb-textdomain' ),
									'inherit' => esc_html__( 'Inherit', 'lahfb-textdomain' ),
									'initial' => esc_html__( 'Initial', 'lahfb-textdomain' ),
									'overlay' => esc_html__( 'Overlay', 'lahfb-textdomain' ),
									'visible' => esc_html__( 'Visible', 'lahfb-textdomain' ),
								),
								'get'			=> true,
							));
						break;

						case 'word_break':
							${$vars['panel']} .= lahfb_select( array(
								'title'			=> esc_html__( 'Word Break', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									''	  			=> '',
									'break-all'		=> esc_html__( 'Break All', 'lahfb-textdomain' ),
									'break-word'	=> esc_html__( 'Break Word', 'lahfb-textdomain' ),
									'inherit'		=> esc_html__( 'Inherit', 'lahfb-textdomain' ),
									'initial'		=> esc_html__( 'Initial', 'lahfb-textdomain' ),
									'normal'		=> esc_html__( 'Normal', 'lahfb-textdomain' ),
								),
								'get'			=> true,
							));
						break;

						// background
						case 'background_color':
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Background Color', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
						break;

						case 'background_color_hover':
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Background Hover Color', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
						break;

						case 'background_image':
							${$vars['panel']} .= lahfb_image( array(
								'title'			=> esc_html__( 'Background Image', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
						break;

						case 'background_position':
							${$vars['panel']} .= lahfb_select( array(
								'title'			=> esc_html__( 'Background Position', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'left top'		=> esc_html__( 'Left Top', 'lahfb-textdomain' ),
									'left center'	=> esc_html__( 'Left Center', 'lahfb-textdomain' ),
									'left bottom'	=> esc_html__( 'Left Bottom', 'lahfb-textdomain' ),
									'center top'	=> esc_html__( 'Center Top', 'lahfb-textdomain' ),
									'center center'	=> esc_html__( 'Center Center', 'lahfb-textdomain' ),
									'center bottom'	=> esc_html__( 'Center Bottom', 'lahfb-textdomain' ),
									'right top'		=> esc_html__( 'Right Top', 'lahfb-textdomain' ),
									'right center'	=> esc_html__( 'Right Center', 'lahfb-textdomain' ),
									'right bottom'	=> esc_html__( 'Right Bottom', 'lahfb-textdomain' ),
								),
								'default'		=> 'center center',
								'get'			=> true,
							));
						break;

						case 'background_repeat':
							${$vars['panel']} .= lahfb_select( array(
								'title'			=> esc_html__( 'Background Repeat', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'repeat'	=> esc_html__( 'Repeat'	, 'lahfb-textdomain' ),
									'repeat-x'	=> esc_html__( 'Repeat x', 'lahfb-textdomain' ),
									'repeat-y'	=> esc_html__( 'Repeat y', 'lahfb-textdomain' ),
									'no-repeat'	=> esc_html__( 'No Repeat', 'lahfb-textdomain' ),
								),
								'default'		=> 'no-repeat',
								'get'			=> true,
							));
						break;

						case 'background_cover':
							${$vars['panel']} .= lahfb_switcher( array(
								'title'			=> esc_html__( 'Background Cover ?', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'default'		=> 'true',
								'get'			=> true,
							));
						break;

						// box
						case 'margin':
							${$vars['panel']} .= '<div class="lahfb-field lahfb-box-wrap w-col-sm-12"><h5>' . esc_html__( 'Margin', 'lahfb-textdomain' ) . '</h5>';
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_top_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_right_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_bottom_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_left_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= '</div><div class="wp-clearfix"></div>';
						break;

						case 'padding':
							${$vars['panel']} .= '<div class="lahfb-field lahfb-box-wrap w-col-sm-12"><h5>' . esc_html__( 'Padding', 'lahfb-textdomain' ) . '</h5>';
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_top_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_right_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_bottom_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_left_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= '</div><div class="wp-clearfix"></div>';
						break;

						case 'border_radius':
							${$vars['panel']} .= '<div class="lahfb-field lahfb-box-wrap lahfb-box-border-radius-wrap w-col-sm-12"><h5>' . esc_html__( 'Border Radius', 'lahfb-textdomain' ) . '</h5>';
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> 'top_left_radius_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> 'top_right_radius_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> 'bottom_right_radius_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> 'bottom_left_radius_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= '</div><div class="wp-clearfix"></div>';
						break;

						case 'border':
							${$vars['panel']} .= lahfb_select( array(
								'title'			=> esc_html__( 'Border Style', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_style_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									''			=> '',
									'none'		=> esc_html__( 'None', 'lahfb-textdomain' ),
									'solid'		=> esc_html__( 'Solid', 'lahfb-textdomain' ),
									'dotted'	=> esc_html__( 'Dotted', 'lahfb-textdomain' ),
									'dashed'	=> esc_html__( 'Dashed', 'lahfb-textdomain' ),
									'double'	=> esc_html__( 'Double', 'lahfb-textdomain' ),
									'groove'	=> esc_html__( 'Groove', 'lahfb-textdomain' ),
									'ridge'		=> esc_html__( 'Ridge', 'lahfb-textdomain' ),
									'inset'		=> esc_html__( 'Inset', 'lahfb-textdomain' ),
									'outset'	=> esc_html__( 'Outset', 'lahfb-textdomain' ),
									'initial'	=> esc_html__( 'Initial', 'lahfb-textdomain' ),
									'inherit'	=> esc_html__( 'Inherit', 'lahfb-textdomain' ),
								),
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Border Color', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_color_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= '<div class="lahfb-field lahfb-box-wrap w-col-sm-12"><h5>' . esc_html__( 'Border Width', 'lahfb-textdomain' ) . '</h5>';
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_top_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_right_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_bottom_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_left_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= '</div><div class="wp-clearfix"></div>';
						break;

						case 'float':
							${$vars['panel']} .= lahfb_custom_select( array(
								'title'			=> esc_html__( 'Floating', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_sc_' . $screen . '_el_' . $el_href,
								'default'		=> 'left',
								'options'		=> array(
									'left'	=> 'left',
									'right'	=> 'right',
								),
								'get'			=> true,
							));
						break;

						case 'position_property':
							${$vars['panel']} .= lahfb_custom_select( array(
								'title'			=> esc_html__( 'Position', 'lahfb-textdomain' ),
								'id'			=> $el_atts['position'] . '_sc_' . $screen . '_el_' . $el_href,
								'default'		=> 'static',
								'options'		=> array(
									'static'	=> 'static',
									'absolute'	=> 'absolute',
									'relative'	=> 'relative',
								),
								'get'			=> true,
							));
						break;

						case 'position':
							${$vars['panel']} .= '<div class="lahfb-field lahfb-box-wrap w-col-sm-6"><h5>' . esc_html__( 'Position', 'lahfb-textdomain' ) . '</h5>';
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_top_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_right_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_bottom_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_textfield( array(
								'id'			=> $el_atts['property'] . '_left_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= '</div>';
							${$vars['panel']} .= '<div class="lahfb-field lahfb-help-content-wrap w-col-sm-12">';
							${$vars['panel']} .= lahfb_help( array(
								'title'			=> esc_html__( 'Help to use calc', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_help_calc_' . $screen . '_el_' . $el_href,
								'default'		=> '
									To make this element stay center, all you need is using calc code as following:<br>
									calc(50% - half width)<br>
									For Example:<br>
									Width = 40px<br>
									Left = calc(50% - 20px)
								',
								'get'			=> true,
							));
							${$vars['panel']} .= '</div><div class="wp-clearfix"></div>';
						break;

						case 'box_shadow':
							${$vars['panel']} .= '<div class="lahfb-field lahfb-shadow-box-wrap w-col-sm-12"><h5>' . esc_html__( 'Box Shadow', 'lahfb-textdomain' ) . '</h5>';
							${$vars['panel']} .= lahfb_number_unit( array(
								'title'			=> esc_html__( 'X offset', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_xoffset_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'px'	=> 'px',
									'em'	=> 'em',
									'%'		=> '%',
								),
								'default_unit'	=> 'px',
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_number_unit( array(
								'title'			=> esc_html__( 'Y offset', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_yoffset_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'px'	=> 'px',
									'em'	=> 'em',
									'%'		=> '%',
								),
								'default_unit'	=> 'px',
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_number_unit( array(
								'title'			=> esc_html__( 'Blur', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_blur_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'px'	=> 'px',
									'em'	=> 'em',
									'%'		=> '%',
								),
								'default_unit'	=> 'px',
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_number_unit( array(
								'title'			=> esc_html__( 'Spread', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_spread_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'px'	=> 'px',
									'em'	=> 'em',
									'%'		=> '%',
								),
								'default_unit'	=> 'px',
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_switcher( array(
								'title'			=> esc_html__( 'Inset Shadow Status', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_status_sc_' . $screen . '_el_' . $el_href,
								'default'       => 'false',
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Shadow Color', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_color_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= '</div><div class="wp-clearfix"></div>';
						break;

						case 'gradient':
							${$vars['panel']} .= '<div class="lahfb-field lahfb-gradient-wrap w-col-sm-12"><h5>' . esc_html__( 'Gradient', 'lahfb-textdomain' ) . '</h5>';
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Color 1', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_color1_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Color 2', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_color2_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Color 3', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_color3_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_colorpicker( array(
								'title'			=> esc_html__( 'Color 4', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_color4_sc_' . $screen . '_el_' . $el_href,
								'get'			=> true,
							));
							${$vars['panel']} .= lahfb_number_unit( array(
								'title'			=> esc_html__( 'Direction', 'lahfb-textdomain' ),
								'id'			=> $el_atts['property'] . '_direction_sc_' . $screen . '_el_' . $el_href,
								'options'		=> array(
									'deg'	=> 'deg',
								),
								'default_unit'	=> 'deg',
								'get'			=> true,
							));
							${$vars['panel']} .= '</div><div class="wp-clearfix"></div>';
						break;

					endswitch;
				endforeach;
			${$vars['panel']} .= '</div>';

		endforeach;

	endforeach;

	?>

	<ul class="lahfb-tabs-list lahfb-styling-screens wp-clearfix">
		<li class="lahfb-tab">
			<a href="#all">
				<i class="fa fa-desktop"></i>
				<span><?php esc_html_e( 'Desktop', 'lahfb-textdomain' ); ?></span>
			</a>
		</li>
		<li class="lahfb-tab">
			<a href="#tablets">
				<i class="fa fa-tablet"></i>
				<span><?php esc_html_e( 'Tablets', 'lahfb-textdomain' ); ?></span>
			</a>
		</li>
		<li class="lahfb-tab">
			<a href="#mobiles">
				<i class="fa fa-mobile"></i>
				<span><?php esc_html_e( 'Mobiles', 'lahfb-textdomain' ); ?></span>
			</a>
		</li>
	</ul>

	<!-- all devices -->
	<div class="lahfb-tab-panel lahfb-styling-screen-panel wp-clearfix" data-id="#all">

		<ul class="lahfb-tabs-list lahfb-styling-groups wp-clearfix"><?php echo '' . $all_list_items; ?></ul>
		<?php echo '' . $all_panel_items; ?>

	</div> <!-- end all devices -->

	<!-- tablets devices -->
	<div class="lahfb-tab-panel lahfb-styling-screen-panel" data-id="#tablets">

		<ul class="lahfb-tabs-list lahfb-styling-groups wp-clearfix"><?php echo '' . $tablets_list_items; ?></ul>
		<?php echo '' . $tablets_panel_items; ?>

	</div> <!-- end tablets devices -->

	<!-- mobiles devices -->
	<div class="lahfb-tab-panel lahfb-styling-screen-panel" data-id="#mobiles">

		<ul class="lahfb-tabs-list lahfb-styling-groups wp-clearfix"><?php echo '' . $mobiles_list_items; ?></ul>
		<?php echo '' . $mobiles_panel_items; ?>

	</div> <!-- end mobiles devices -->

	<?php

}
