<?php
/**
 * Header Builder - Header Output Class.
 *
 * @author  LaStudio
 */

// don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

if ( ! class_exists( 'LAHFB_Output' ) ) :

    class LAHFB_Output {

		/**
		 * Instance of this class.
         *
		 * @since	1.0.0
		 * @access	private
		 * @var		LAHFB_Output
		 */
		private static $instance;

		/**
		 * Provides access to a single instance of a module using the singleton pattern.
		 *
		 * @since	1.0.0
		 * @return	object
		 */
		public static function get_instance() {

			if ( self::$instance === null ) {
				self::$instance = new self();
            }

			return self::$instance;

		}
		
		private static $dynamic_style = '';

		/**
		 * Constructor.
		 *
		 * @since	1.0.0
		 */
		public function __construct() {

		}
		
		public static function set_dynamic_styles( $styles, $preset_name ){
		    self::$dynamic_style .= $styles;
        }

		/**
		 * Output header.
		 *
		 * @since	1.0.0
		 */
        public static function output($is_frontend_builder = false, $lahfb_data = array(), $preset_name = '') {

            $is_frontend_builder = $is_frontend_builder ? $is_frontend_builder : LAHFB_Helper::is_frontend_builder();

            $header_show = '';
            
            // header visibility
            if ( $header_show === '1') {
                $header_show = true;
            }
            elseif ( $header_show === '0' ) {
                $header_show = false;
            }
            elseif ( $header_show === false || empty( $header_show ) ) {
                $header_show = true;
            }

            if ( ! ( $is_frontend_builder || $header_show ) ) {
                return;
            }

            $lahfb_data = $lahfb_data ? $lahfb_data :  LAHFB_Helper::get_data_frontend_components();

            $class_frontend_builder = $is_frontend_builder ? ' lahfb-frontend-builder' : '';

            // Start render header output
            $output = '<header id="lastudio-header-builder" class="lahfb-wrap' . esc_attr( $class_frontend_builder ) . '"><div class="lahfbhouter"><div class="lahfbhinner">
                <div class="main-slide-toggle"></div>';

            if ( $lahfb_data ) :
                $desktop_hidden_el_arr = array();
                foreach ( $lahfb_data as $screen_view_index => $screen_view ) :

                    // Create dynamically variable of panel
                    $screen_name    = str_replace( '-view', '', $screen_view_index );
                    $$screen_name   = ''; // $desktop, $tablets, $mobils, $sticky

                    $vertical_header = $screen_view_classes = '';

                    /**
                     * LaStudio Header Builder - Sticky View
                     * 
                     * @version 1.0.0
                     * @author  LaStudio
                     */
                    if ( $screen_view_index == 'sticky-view' ) {

                        continue;

                        extract( LAHFB_Helper::component_atts( array(
                            'area_height'		=> '100px',
                            'area_width'		=> '',
                            'full_container'	=> 'false',
                            'container_padd'	=> 'true',
                            'super_sticky'	    => 'false',
                            'content_position'	=> 'middle',
                            'sticky_appear'	    => 'both',
                            'mobile_sticky'	    => 'false',
                            'extra_class'   	=> '',
                            'extra_id'      	=> '',
                        ), $lahfb_data[ $screen_view_index ][ 'srow1' ]['settings'] ));

                        $screen_view_classes .= ' ' . $sticky_appear . ' ';
                        $screen_view_classes .= $mobile_sticky == 'false' ? 'hide-in-reponsive' : '';

                        if ( $super_sticky == 'true' ) : 
                            $screen_view_classes .= ' lahfb-sticky-fixed' ;
                            self::set_dynamic_styles(
                                '@media only screen and (min-width: 961px) {
                                    #lastudio-header-builder { position: fixed; width: 100%; }
                                }',
                                $preset_name
                            );
                        endif;

                    }

                    $$screen_name .= '<div class="lahfb-screen-view lahfb-' . esc_attr( $screen_view_index . $screen_view_classes ) . '">';
                    $sticky_heights = array();

                    // Rows
                    foreach ( $screen_view as $area_index => $area ) :
                        // visibility
                        $hidden_area = $lahfb_data[ $screen_view_index ][ $area_index ]['settings']['hidden_element'];
                        if ( $hidden_area === 'false' ) {
                            $hidden_area = false;
                        }
                        elseif ( $hidden_area === 'true' ) {
                            $hidden_area = true;
                        }

                        // vertical header
                        if ( $screen_view_index == 'desktop-view' ) :
                            $header_type = ! empty( $lahfb_data[ $screen_view_index ][ $area_index ]['settings']['header_type'] ) ? $lahfb_data[ $screen_view_index ][ $area_index ]['settings']['header_type'] : '' ;

                            if ( $area_index != 'row1' ) :
                                if ( $header_type == 'vertical' ) :
                                    continue;
                                endif;
                            else :
                                if ( $header_type == 'vertical' ) :
                                    $vertical_header = ' lahfb-vertical';
                                endif;
                            endif;

                        endif;

                        if ( ! $hidden_area ) :
                            $area_settings      = isset( $lahfb_data[ $screen_view_index ][ $area_index ]['settings'] ) ? $lahfb_data[ $screen_view_index ][ $area_index ]['settings'] : '' ;
                            $areas              = array();
                            $areas['left']      = isset( $lahfb_data[ $screen_view_index ][ $area_index ]['left'] ) ? $lahfb_data[ $screen_view_index ][ $area_index ]['left'] : '' ;
                            $areas['center']    = isset( $lahfb_data[ $screen_view_index ][ $area_index ]['center'] ) ? $lahfb_data[ $screen_view_index ][ $area_index ]['center'] : '' ;
                            $areas['right']     = isset( $lahfb_data[ $screen_view_index ][ $area_index ]['right'] ) ? $lahfb_data[ $screen_view_index ][ $area_index ]['right'] : '' ;



                            if ( $screen_view_index != 'sticky-view' ) {
                                extract( LAHFB_Helper::component_atts( array(
                                    'full_container'	=> 'false',
                                    'container_padd'	=> 'true',
                                    'content_position'	=> 'middle',
                                    'extra_class'   	=> '',
                                    'extra_id'      	=> ''
                                ), $area_settings ));
                            }
                            else {
                                extract( LAHFB_Helper::component_atts( array(
                                    'area_height'		=> '100px',
                                    'area_width'		=> '',
                                    'full_container'	=> 'false',
                                    'container_padd'	=> 'true',
                                    'super_sticky'	    => 'false',
                                    'content_position'	=> 'middle',
                                    'sticky_appear'	    => 'both',
                                    'mobile_sticky'	    => 'false',
                                    'extra_class'   	=> '',
                                    'extra_id'      	=> ''
                                ), $area_settings ));
                            }

                            $area_settings['current_screen'] = $screen_view_index;


                            // once fire
                            // if ( $screen_view_index == 'desktop-view' || $screen_view_index == 'sticky-view' ) :
                                if ( $screen_view_index == 'sticky-view' ) {
                                    $sticky_heights[] =  ( isset( $area_height  ) && $area_height ) ? $area_height : '' ;
                                }

                                $vertical_dynamic_style = '';
                                if ( $header_type == 'vertical' && $screen_view_index == 'desktop-view' ) :

                                    if ( $header_type == 'vertical' ) {
                                        extract( LAHFB_Helper::component_atts( array(
                                            'alignment'             => 'flex-start',
                                            'vertical_toggle'		=> 'false',
                                            'vertical_toggle_type'	=> 'freelancer',
                                            'vertical_toggle_icon'  => 'foursome',
                                            'logo'                  => '',
                                            'contact_icon'          => 'false',
                                            'full_screen'	        => 'false',
                                            'box_title'   	        => 'Contact David',
                                            'email'      	        => 'youremail@yourserver.com',
                                            'tel'      	            => '123 456 789',
                                            'schedule'              => 'Office hours are 9 a.m. and 5 p.m. Central time.',
                                            'address'      	        => 'address',
                                            'social'      	        => 'false',
                                            'form_title'      	    => 'General form',
                                            'contact_form'      	=> '',
                                            'socials'      	        => 'true',
                                            'social_text_1'      	=> 'Facebook',
                                            'social_url_1'      	=> 'https://www.facebook.com/',
                                            'social_text_2'      	=> '',
                                            'social_url_2'      	=> '',
                                            'social_text_3'      	=> '',
                                            'social_url_3'      	=> '',
                                            'social_text_4'      	=> '',
                                            'social_url_4'      	=> '',
                                            'social_text_5'      	=> '',
                                            'social_url_5'      	=> '',
                                            'social_text_6'      	=> '',
                                            'social_url_6'      	=> '',
                                            'social_text_7'      	=> '',
                                            'social_url_7'      	=> '',
                                            'extra_class'      	    => '',
                                            'extra_id'      	    => '',
                                            'current_screen'    => $screen_view_index
                                        ), $area_settings ));

                                        // Render Custom Style
                                        $vertical_dynamic_style .= lahfb_styling_tab_output( $area_settings, 'Logo', '#lastudio-header-builder .lahfb-vertical-logo-wrap' );
                                        $vertical_dynamic_style .= lahfb_styling_tab_output( $area_settings, 'Toggle Bar', '#lastudio-header-builder .lahfb-vertical-toggle-wrap' );
                                        $vertical_dynamic_style .= lahfb_styling_tab_output( $area_settings, 'Toggle Icon Color', '#lastudio-header-builder .vertical-menu-icon-foursome > div', '#lastudio-header-builder .vertical-menu-icon-foursome:hover > div' );
                                        $vertical_dynamic_style .= lahfb_styling_tab_output( $area_settings, 'Toggle Icon Box', '#lastudio-header-builder .vertical-toggle-icon' );
                                        $vertical_dynamic_style .= lahfb_styling_tab_output( $area_settings, 'Contact', '#lastudio-header-builder .vertical-contact-icon' );
                                        $vertical_dynamic_style .= lahfb_styling_tab_output( $area_settings, 'Fullscreen', '#lastudio-header-builder .vertical-fullscreen-icon' );
                                        $vertical_dynamic_style .= lahfb_styling_tab_output( $area_settings, 'Box', '#lastudio-header-builder.lahfb-wrap .lahfb-vertical' );

                                        if ( ! empty( $vertical_dynamic_style ) ) {
                                            self::set_dynamic_styles( '
                                                @media only screen and (min-width: 961px) {
                                                    ' . $vertical_dynamic_style . '
                                                }
                                            ', $preset_name );
                                        }

                                        self::set_dynamic_styles( '
                                            @media only screen and (min-width: 961px) {
                                                #lastudio-header-builder .lahfb-vertical .lahfb-content-wrap,#lastudio-header-builder .lahfb-vertical .lahfb-col { align-items: ' . $alignment . '; }
                                            }
                                        ', $preset_name);
                                    }

                                    if ( $vertical_toggle == 'true' ) {

                                        // Get Elements
                                        $vertical_dynamic_style = $vertical_type = '';
                                        $logo                   = $logo ? wp_get_attachment_url( $logo ) : '';
                                        $alignment              = $alignment ? $alignment : '';
                                        $email                  = $email ? $email : '';
                                        $tel                    = $tel ? $tel : '';
                                        $schedule               = $schedule ? $schedule : '';
                                        $address                = $address ? $address : '';
                                        $box_title              = $box_title ? $box_title : '';
                                        $form_title             = $form_title ? $form_title : '';

                                        // Render Logo
                                        if ( ! empty( $logo ) ) {
                                            $logo = '
                                            <div class="lahfb-vertical-logo-wrap">
                                                <img class="lahfb-vertical-logo" src="' . esc_url( $logo ) . '" alt="'. get_bloginfo('name') .'">
                                            </div>';
                                        }

                                        if ( $vertical_toggle_type == 'freelancer' ) { 
                                            $vertical_type = 'lahfb-vertical-type-1';
                                        } elseif ( $vertical_toggle_type == 'photography' ) {
                                            $vertical_type = 'lahfb-vertical-type-2';
                                        }

                                        // Render Toggle Wrap
                                        $$screen_name .= '<div class="lahfb-vertical-toggle-wrap ' . $vertical_type . '">';

                                        // vertical togle icon
                                        if ( $vertical_toggle_icon == 'foursome' ) {
                                            $$screen_name .= '
                                                <div class="vertical-toggle-icon vertical-menu-icon-foursome">
                                                    <div class="vertical-menu-icon-foursome-top"></div>
                                                    <div class="vertical-menu-icon-foursome-center"></div>
                                                    <div class="vertical-menu-icon-foursome-bottom"></div>
                                                    <div class="vertical-menu-icon-foursome-extra-bottom"></div>
                                                </div>
                                            ';
                                        } else {
                                            $$screen_name .= '
                                                <div class="vertical-toggle-icon vertical-menu-icon-triad">
                                                    <div class="vertical-menu-icon-triad-top"></div>
                                                    <div class="vertical-menu-icon-triad-center"></div>
                                                    <div class="vertical-menu-icon-triad-bottom"></div>
                                                </div>
                                            ';
                                        }

                                        $$screen_name .= $logo;

                                        if ( $contact_icon == 'true' ) {
                                            $$screen_name .= '<div class="vertical-contact-icon"><i class="fa fa-envelope-o"></i></div>';
                                        }

                                        if ( $full_screen == 'true' ) {
                                            $$screen_name .= '<div class="vertical-fullscreen-icon"><i class="fa fa-arrows-alt"></i></div>';
                                        }

                                        $$screen_name .= '</div>' ;

                                        if ( $contact_icon == 'true' ) { 
                                            $$screen_name .= '<div class="lahfb-vertical-contact-form-wrap">';

                                            $$screen_name .= '<div class="lahfb-vertical-contact-form-top">';

                                            if ( ! empty( $box_title ) ) {
                                                $$screen_name .= '<div class="lahfb-vertical-contact-form-box-title">';
                                                $$screen_name .= $box_title;
                                                $$screen_name .= '</div>';
                                            }

                                            if ( ! empty( $email ) ) {
                                                $$screen_name .= '<div class="lahfb-vertical-contact-form-details lahfb-vertical-contact-form-email">';
                                                $$screen_name .= '<strong>' . esc_html__( 'Email: ', 'lahfb-textdomain' ). '</strong>';
                                                $$screen_name .= $email;
                                                $$screen_name .= '</div>';
                                            }

                                            if ( ! empty( $tel ) ) {
                                                $$screen_name .= '<div class="lahfb-vertical-contact-form-details lahfb-vertical-contact-form-tel">';
                                                $$screen_name .= '<strong>' . esc_html__( 'Telephone: ', 'lahfb-textdomain' ). '</strong>';
                                                $$screen_name .= $tel;
                                                $$screen_name .= '</div>';
                                            }

                                            if ( ! empty( $schedule ) ) {
                                                $$screen_name .= '<div class="lahfb-vertical-contact-form-details lahfb-vertical-contact-form-schedule">';
                                                $$screen_name .= $schedule;
                                                $$screen_name .= '</div>';
                                            }

                                            if ( ! empty( $address ) ) {
                                                $$screen_name .= '<div class="lahfb-vertical-contact-form-details lahfb-vertical-contact-form-address">';
                                                $$screen_name .= '<strong>' . esc_html__( 'Address: ', 'lahfb-textdomain' ). '</strong>';
                                                $$screen_name .= $address;
                                                $$screen_name .= '</div>';
                                            }

                                            if ( $social == 'true' ) {
                                                $$screen_name .= '<div class="lahfb-vertical-contact-form-details lahfb-vertical-contact-form-socials">';
                                                $$screen_name .= '<strong>' . esc_html__( 'Socials: ', 'lahfb-textdomain' ). '</strong>';
                                                // Get Social Icons
                                                $display_socials = '';
                                                for ($i = 1; $i < 8; $i++) {

                                                    ${"social_text_" . $i}  = ${"social_text_" . $i} ? ${"social_text_" . $i} : '';
                                                    ${"social_url_" . $i}   = ${"social_url_" . $i} ? ${"social_url_" . $i} : '';

                                                    if (  !empty( ${"social_text_" . $i} ) ) {
                                                        $display_socials .= '<div class="vertical-contact-social-icons social-icon-' . $i . '">';
                                                        if ( ! empty( ${"social_url_" . $i} ) ) {
                                                            $display_socials .= '<a href="' . ${"social_url_" . $i} . '" target="_blank" class="hcolorf">';
                                                        }
                                                        $display_socials .= '<span class="vertical-contact-social-text">' . ${"social_text_" . $i} . '</span>';
                                                        if ( ! empty( ${"social_url_" . $i} ) ) {
                                                            $display_socials .= '</a>';
                                                        }
                                                        $display_socials .= '</div>';
                                                    }
                                                }
                                                $$screen_name .= $display_socials;
                                                $$screen_name .= '</div>';
                                            }

                                            $$screen_name .= '</div>'; // close .lahfb-vertical-contact-form-top

                                            $$screen_name .= '<div class="lahfb-vertical-contact-form-bottom">';

                                            if ( ! empty( $form_title ) ) {
                                                $$screen_name .= '<div class="lahfb-vertical-contact-form-form-title">';
                                                $$screen_name .= $form_title;
                                                $$screen_name .= '</div>';
                                            }

                                            if ( $contact_icon == 'true' ) {

                                                if ( ! empty( $contact_form ) ) {
                                                    $$screen_name .= do_shortcode( '[contact-form-7 id="' . $contact_form . '" title="' . esc_attr( 'Contact' ) . '"]' );
                                                } else {
                                                    $$screen_name .= esc_html__( 'Please select a from in Theme Option.', 'lahfb-textdomain' );
                                                }

                                            }

                                            $$screen_name .= '</div>'; //Close .lahfb-vertical-contact-form-bottom
                                            $$screen_name .= '</div>'; // Close .lahfb-vertical-contact-form-wrap
                                        }

                                    }

                                endif;

                                // height
                                if ( ! empty( $area_height ) ) {
                                    $area_height = ! empty( $area_height ) ? $area_height : '';
                                    $area_height = 'height: ' . LAHFB_Helper::css_sanatize( $area_height ) . ';';
                                    self::set_dynamic_styles( '#lastudio-header-builder .lahfb-'.$screen_view_index.' .lahfb-' . $area_index . '-area:not(.lahfb-vertical) { ' . $area_height . ' }', $preset_name);
                                }

                                $dynamic_style  = '';
                                $dynamic_style .= lahfb_styling_tab_output( $area_settings, 'Typography', '#lastudio-header-builder .lahfb-'.$screen_view_index.' .lahfb-' . $area_index . '-area' );
                                $dynamic_style .= lahfb_styling_tab_output( $area_settings, 'Background', '#lastudio-header-builder .lahfb-'.$screen_view_index.' .lahfb-' . $area_index . '-area' );
                                $dynamic_style .= lahfb_styling_tab_output( $area_settings, 'Box', '#lastudio-header-builder .lahfb-'.$screen_view_index.' .lahfb-' . $area_index . '-area:not(.lahfb-vertical)' );

                                // width
                                if ( ! empty( $area_width ) ) {
                                    $area_width = 'width: ' . LAHFB_Helper::css_sanatize( $area_width ) . ';';
                                    self::set_dynamic_styles(
                                        '@media only screen and (min-width: 961px) {
                                            #lastudio-header-builder .lahfb-'.$screen_view_index.' .lahfb-' . $area_index . '-area:not(.lahfb-vertical) > .container { ' . $area_width . ' }
                                        }', $preset_name);
                                }

                                if ( $dynamic_style ) :
                                    self::set_dynamic_styles( $dynamic_style, $preset_name );
                                endif;
                            // endif;

                            // Classes
                            $area_classes   = '';
                            $area_classes   .= ! empty($content_position) ? ' lahfb-content-' . $content_position : '' ;
                            $area_classes   .= ! empty($extra_class) ? ' ' . $extra_class : '' ;
                            $container_padd = $container_padd == 'true' ? '' : ' la-no-padding';

                            // Id
                            $extra_id = ! empty( $extra_id ) ? ' id="' . esc_attr( $extra_id ) . '"' : '' ;

                            // Toggle vertical
                            $lahfb_vertical_toggle = '';

                            if ( $header_type == 'vertical' ) :

                                if ( $vertical_toggle == 'true' ) {
                                    if ( $vertical_toggle_type == 'freelancer' ) { 
                                        $lahfb_vertical_toggle .= ' lahfb-vertical-type-1';
                                    } elseif ( $vertical_toggle_type == 'photography' ) {
                                        $lahfb_vertical_toggle .= ' lahfb-vertical-type-2';
                                    }
                                    $lahfb_vertical_toggle .= ' lahfb-vertical-toggle' ;
                                }

                            endif;

                            $$screen_name .= '<div class="lahfb-area lahfb-' . $area_index . '-area' . $vertical_header . $lahfb_vertical_toggle . $area_classes . '"' . $extra_id . '>';

                                $$screen_name .= $full_container == 'false' ? '<div class="container' . $container_padd . '">' : '';
                                $$screen_name .= '<div class="lahfb-content-wrap">';

                                // columns
                                foreach ( $areas as $area_key => $components ) :


                                    $$screen_name .= '<div class="lahfb-col lahfb-' . esc_attr( $area_key ) . '-col">';

                                        if ( $components ) :

                                            foreach ( $components as $c_key => $attrs ) :

                                                if($c_key === 'settings'){
                                                    continue;
                                                }

                                                $hidden_el = $attrs['hidden_element'];
                                                $attrs['current_screen'] = $screen_view_index;

                                                if ($screen_view_index == 'desktop-view' && $hidden_el) {
                                                    array_push($desktop_hidden_el_arr, $attrs['name']);
                                                }

                                                if ( ! $hidden_el ) :
                                                    $element_type   = $attrs['name'];
                                                    $elements       = LAHFB_Helper::get_elements();
                                                    $func_name      = $elements[ $element_type ];
                                                    $uniqid         = $attrs['uniqueId'];

                                                    if ( $screen_view_index == 'desktop-view' ) :
                                                        $once_run_flag = true;
                                                    elseif ( $screen_view_index == 'sticky-view' ) :
                                                        $once_run_flag = true;
                                                    else :
                                                        $once_run_flag = false;
                                                    endif;

                                                    if ( in_array( $element_type, $desktop_hidden_el_arr ) ) {
                                                        $once_run_flag = true;
                                                        if ( ( $key = array_search($element_type, $desktop_hidden_el_arr )) !== false) {
                                                            unset($desktop_hidden_el_arr[$key]);
                                                        }
                                                    }

                                                    $$screen_name .= $func_name( $attrs, $uniqid, $once_run_flag );

                                                endif;

                                            endforeach; // end components loop

                                        endif;

                                    $$screen_name .= '</div>';

                                endforeach; // end areas loop

                                $$screen_name .= '</div>';
                                $$screen_name .= $full_container == 'false' ? '</div>' : '';

                            $$screen_name .= '</div>';
                        endif;
                    endforeach; // end screens loop

                    // Sticky height
                    $sticky_heights = array_filter($sticky_heights);

                    if ( !empty( $sticky_heights ) ) {
                        $space_top = '0';
                        for ( $i = 0 ; $i < count ( $sticky_heights ) ; $i++ ) {
                            $str = $sticky_heights[$i];
                            preg_match_all('!\d+!', $str, $matches);
                            $space_top = $space_top + $matches['0']['0'];
                        }

                        self::set_dynamic_styles( '
                            .lahfb-sticky-view.header-sticky-hide,
                            .lahfb-sticky-view.is-top { top: -' . $space_top . 'px;  }
                        ', $preset_name);
                    }
                        
                    $$screen_name .= '</div>';
                endforeach; // end header builder data loop

                $output .= $desktop;
                $output .= $tablets;
                $output .= $mobiles;
            endif;

            $output .= '</div><div class="lahfb-wrap-sticky-height"></div></div>';

            $output .= '</header>';

            if(!LAHFB_Helper::is_prebuild_header_exists($preset_name)){
                $preset_name = '';
            }

            LAHFB_Helper::set_dynamic_styles(self::$dynamic_style, $preset_name, true);

            return $output;

        }

    }

endif;
