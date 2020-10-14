<?php
function lahfb_menu_f( $atts, $uniqid, $once_run_flag ) {

//    la_log(array(
//        '$atts' => $atts,
//        '$once_run_flag' => $once_run_flag
//    ));

	extract( LAHFB_Helper::component_atts( array(
		'menu'						=> '',
		'desc_item'					=> 'false',
		'full_menu'					=> 'false',
		'height_100'				=> 'false',
		'extra_class'				=> '',
		'show_mobile_menu'			=> 'true',
		'mobile_menu_display_width' => '',
		'show_parent_arrow'			=> 'true',
		'parent_arrow_direction'	=> 'bottom',
		'show_megamenu'	            => 'false',
        'screen_view_index'         => ''
	), $atts ));

	$out = $parent_arrow = '';

	$desc_item = $desc_item == 'true' ? ' has-desc-item' : '';
	$full_menu = $full_menu == 'true' ? ' full-width-menu' : '';
	$show_mobile_menu_class = $show_mobile_menu == 'false' ? ' la-hide-mobile-menu' : '';


	if( $show_megamenu == 'true' ) {
        $desc_item .= ' has-megamenu';
//        if($screen_view_index == 'tablets' || $screen_view_index == 'mobiles'){
//            return $out;
//        }
    }

	if ( ! empty( $show_parent_arrow ) ) {
		$parent_arrow = ' has-parent-arrow';

		switch ( $parent_arrow_direction ) {
			case 'top':
				$parent_arrow .= ' arrow-top';
				break;
			case 'right':
				$parent_arrow .= ' arrow-right';
				break;
			case 'bottom':
				$parent_arrow .= ' arrow-bottom';
				break;
			case 'left':
				$parent_arrow .= ' arrow-left';
				break;
		}
	}

	if ( $once_run_flag ) :
		if ( ! empty( $menu ) && is_nav_menu( $menu ) ) {
			$menu_out = wp_nav_menu( array(
				'menu'			=> $menu,
				'container'		=> false,
				'menu_id'		=> 'nav',
				'depth'			=> '5',
				'fallback_cb'	=> 'wp_page_menu',
				'items_wrap'	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'echo'			=> false,
                'show_megamenu' => $show_megamenu,
                'walker'		=> new LAHFB_Nav_Walker()
			));

			if ( $show_mobile_menu == 'true' ) {
				$responsive_menu_out = wp_nav_menu( array(
					'menu'			=> $menu,
					'container'		=> false,
					'menu_id'		=> 'responav',
					'depth'			=> '5',
					'fallback_cb'	=> 'wp_page_menu',
					'items_wrap'	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'echo'			=> false,
					'walker'		=> new LAHFB_Nav_Walker()
				));
			}
		}
		else {
			$menu_out = '
				<div class="lahfb-element">
					<span>' . esc_html__( 'Your menu is empty or not selected! ', 'lahfb-textdomain' ) . '<a href="https://codex.wordpress.org/Appearance_Menus_Screen" class="sf-with-ul hcolorf" target="_blank">' . esc_html__( 'How to config a menu', 'lahfb-textdomain' ) . '</a></span>
				</div>
			';

			$responsive_menu_out = $show_mobile_menu == 'true' ? $menu_out : '';
		}

		// styles
		// if ( $mobile_menu_display_width ) :
		// 	LAHFB_Helper::set_dynamic_styles( '@media only screen and ( max-width: ' . $mobile_menu_display_width . ' ) {' . $class . ' { ' . $mobile_style  . '} }' );
		// endif;

		$dynamic_style = '';
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Menu Item', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' > ul > li > a,.lahfb-responsive-menu-' . esc_attr( $uniqid ) . ' #responav li.menu-item > a:not(.button)','#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' > ul > li:hover > a,.lahfb-responsive-menu-' . esc_attr( $uniqid ) . ' #responav li.menu-item:hover > a:not(.button)' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Current Menu Item', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav > li.current > a, #lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav > li.menu-item > a.active, #lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav ul.sub-menu li.current > a,.lahfb-responsive-menu-' . esc_attr( $uniqid ) . ' #responav li.current-menu-item > a:not(.button)' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Current Item Shape', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav > li.current > a:after','#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav > li.current:hover > a:after' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Parent Menu Arrow', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . '.has-parent-arrow > ul > li.menu-item-has-children:before,#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . '.has-parent-arrow > ul > li.mega > a:before' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Menu Icon', '#lastudio-header-builder .lahfb-responsive-menu-' . esc_attr( $uniqid ) . ' #responav > li > a > .la-menu-icon, #lastudio-header-builder .lahfb-responsive-menu-' . esc_attr( $uniqid ) . ' #responav > li:hover > a > .la-menu-icon, #lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav > li > a .la-menu-icon', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav > li > a:hover .la-menu-icon' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Submenu Menu Icon', '#lastudio-header-builder .lahfb-responsive-menu-' . esc_attr( $uniqid ) . ' #responav > li > ul.sub-menu a > .la-menu-icon, #lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav .sub-menu .la-menu-icon', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav .sub-menu li a:hover .la-menu-icon' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Menu Description', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' .la-menu-desc' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Menu Badge', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav a span.menu-item-badge' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Submenu Item', '.lahfb-nav-wrap#lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav ul li.menu-item a' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Submenu Currnet Item', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav ul.sub-menu li.current > a' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Submenu Box', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav > li:not(.mega) ul' );
        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Box', '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ',.lahfb-responsive-menu-icon-wrap ' );

        $dynamic_style .= lahfb_styling_tab_output( $atts, 'Responsive Menu Box', '.lahfb-responsive-menu-' . esc_attr( $uniqid ) );

        if ( $dynamic_style ) {
            LAHFB_Helper::set_dynamic_styles( $dynamic_style );
        }

        if ( $height_100 == 'true' ) {
        	LAHFB_Helper::set_dynamic_styles( '#lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ', #lastudio-header-builder #lahfb-nav-wrap-' . esc_attr( $uniqid ) . ' #nav, #nav > li, #nav > li > a { height: 100%; }' );
        }

	endif;

	// extra class
	$extra_class = $extra_class ? ' ' . $extra_class : '' ;

	// render
	if ( $show_mobile_menu == 'true' ) {
		if ( $once_run_flag ) {
			// responsive menu
			$out .= '
				<div class="lahfb-responsive-menu-wrap lahfb-responsive-menu-' . esc_attr( $uniqid ) . '" data-uniqid="' . esc_attr( $uniqid ) . '">
					<div class="close-responsive-nav">
						<div class="lahfb-menu-cross-icon"></div>
					</div>
					' . $responsive_menu_out . '
				</div>';

			// normal menu
			$out .= '<nav class="lahfb-element lahfb-nav-wrap' . esc_attr( $extra_class ) .  $desc_item . $parent_arrow . $full_menu . $show_mobile_menu_class . '" id="lahfb-nav-wrap-' . esc_attr( $uniqid ) . '" data-uniqid="' . esc_attr( $uniqid ) . '">' . $menu_out . '</nav>';
		}
		else {
			$out .= '
				<div class="lahfb-responsive-menu-icon-wrap" data-uniqid="' . esc_attr( $uniqid ) . '">
					<div class="lahfb-menu-cross-icon lahfb-responsive-menu-icon"></div>
				</div>';
		}
	}
	else {
		$menu_out = wp_nav_menu( array(
			'menu'			=> $menu,
			'container'		=> false,
			'menu_id'		=> 'nav',
			'depth'			=> '5',
			'fallback_cb'	=> 'wp_page_menu',
			'items_wrap'	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'echo'			=> false,
            'show_megamenu' => $show_megamenu,
            'walker'		=> new LAHFB_Nav_Walker()
		));
		// normal menu
		$out .= '<nav class="lahfb-element lol lahfb-nav-wrap' . esc_attr( $extra_class ) .  $desc_item . $parent_arrow . $full_menu . $show_mobile_menu_class . '" id="lahfb-nav-wrap-' . esc_attr( $uniqid ) . '" data-uniqid="' . esc_attr( $uniqid ) . '">' . $menu_out . '</nav>';
	}

	return $out;
}

LAHFB_Helper::add_element( 'menu', 'lahfb_menu_f' );