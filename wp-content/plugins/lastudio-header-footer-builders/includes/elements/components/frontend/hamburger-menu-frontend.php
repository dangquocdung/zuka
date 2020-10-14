<?php

function lahfb_hamburger_menu( $atts, $uniqid, $once_run_flag ) {

	extract( LAHFB_Helper::component_atts( array(
		'menu'				=> '',
		'hamburger_type'	=> 'toggle',
		'hamburger_icon'	=> '3line',
		'hm_style'			=> 'light',
		'toggle_from'		=> 'right',
		'image_logo'		=> '',
		'socials'			=> 'true',
		'search'			=> 'true',
		'placeholder'		=> 'Search ...',
		'content'			=> 'false',
		'text_content'		=> '',
		'copyright'			=> 'Copyright',
		'extra_class'		=> '',
		'extra_class_panel' => '',
	), $atts ));

	$out = $menu_out = '';
    $dark_wrap       = ( $hm_style == 'dark' ) ? 'dark-wrap' : 'light-wrap' ;
	$menu_style		 = ( $hm_style == 'dark' ) ? 'hm-dark' : '' ;
	$copyright 		 = $copyright ? $copyright : '' ;
	$hamburger_type  = $hamburger_type ? $hamburger_type : 'toggle' ;
	$menu_list_style = ( $hamburger_type == 'toggle' ) ? 'toggle-menu' : 'full-menu';
	$hamburger_icon  = ( $hamburger_icon == '4line' ) ? 'fourline' : 'threeline';
	$placeholder	 = ! empty( $placeholder ) ? $placeholder : '' ;
	$image_logo		 = $image_logo ? wp_get_attachment_url( $image_logo ) : '' ;

	if ( $hamburger_type == 'toggle' ){
		$toggle_from = ( $toggle_from == 'right' ) ? 'toggle-right' : 'toggle-left';
	} else {
		$toggle_from = '';
	}

    if ( ! empty( $menu ) ) {
        $menu_out = wp_nav_menu( array(
            'menu'          => $menu,
            'container'     => false,
            'menu_class'    => $menu_list_style,
            'menu_id'       => 'hamburger-nav',
            'depth'         => '5',
            'fallback_cb'   => 'wp_page_menu',
            'items_wrap'    => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'echo'          => false,
            'walker'		=> new LAHFB_Nav_Walker()
        ));
    }

	// styles
	if ( $once_run_flag ) :

		$current_element = '#lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' > a' ;
		$dynamic_style = '';
		if ( isset( $atts['background_image_sc_all_el_hamburger_icon_box'] ) ) {
			$asd = 'Hamburger Icon Color, #lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-icon-center, #lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-icon-top, #lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-icon-bottom {display: none;}';
			LAHFB_Helper::set_dynamic_styles( $asd );
		} else {
			$dynamic_style .= lahfb_styling_tab_output( $atts, 'Hamburger Icon Color', '#lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-icon-center, #lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-icon-top, #lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-icon-bottom, #lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-icon-extra','#lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-op-icon:hover .hamburger-icon-center, #lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-op-icon:hover .hamburger-icon-top, #lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-op-icon:hover .hamburger-icon-bottom, #lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' .hamburger-op-icon:hover .hamburger-icon-extra');
		}
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Hamburger Icon Box', '#lahfb-hamburger-menu-' . esc_attr( $uniqid ) .' > a' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Hamburger Box', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' ,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . '' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Menu Box', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav ,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Menu Item', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li > a ,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li > a','.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li:hover > a ,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li:hover > a' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Current Menu Item', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li.current > a ,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li.current > a','.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li.current:hover > a ,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li.current:hover > a' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Current Item Shape', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li.current > a:after ,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li.current > a:after','.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li.current:hover > a:after ,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li.current:hover > a:after' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Submenu Item', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li ul li a ,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li ul li a','.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li ul li:hover a ,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-nav > li ul li:hover a' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Elements Box', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' .hamburger-elements,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' .hamburger-elements' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Content', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' .hamburger-elements .lahmb-text-content *,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' .hamburger-elements .lahmb-text-content *','.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' .hamburger-elements .lahmb-text-content:hover *,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' .hamburger-elements .lahmb-text-content:hover *' );

		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Socials', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' .hamburger-social-icons a i,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' .hamburger-social-icons a i,#hamburger-menu-wrap .hamburger-social-icons .socialfollow-name a','.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' .hamburger-social-icons a:hover i,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' .hamburger-social-icons a:hover i,#hamburger-menu-wrap .hamburger-social-icons .socialfollow-name a:hover' );

		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Copyright', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' .hamburger-copyright,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' .hamburger-copyright', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' .hamburger-copyright:hover,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' .hamburger-copyright:hover' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Search Input', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-menu-search-form input[type="text"],.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-menu-search-form input[type="text"]' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Search Box', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' #hamburger-menu-search-form,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' #hamburger-menu-search-form' );
		$dynamic_style .= lahfb_styling_tab_output( $atts, 'Logo Box', '.la-body #hamburger-menu-wrap.hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' .hamburger-logo-image-wrap,.full .la-hamburger-wrap-' . esc_attr( $uniqid ) . ' .hamburger-logo-image-wrap' );

        if ( $dynamic_style ) :
            LAHFB_Helper::set_dynamic_styles( $dynamic_style );
        endif;

	endif;

	// extra class
	$extra_class = $extra_class ? ' ' . $extra_class : '';

	// render
	$out .= '
	<div class="lahfb-element lahfb-icon-wrap lahfb-hamburger-menu ' . esc_attr( $extra_class ) . ' ' . $hamburger_type . ' ' . $dark_wrap . ' ' . $hamburger_icon . '" id="lahfb-hamburger-menu-' . esc_attr( $uniqid ) . '">
		<a href="#" id="la-hamburger-icon" class="lahfb-icon-element close-button hcolorf hamburger-op-icon">
			<div class="hamburger-icon">
				<div class="hamburger-icon-top"></div>
				<div class="hamburger-icon-center"></div>
				<div class="hamburger-icon-bottom"></div>';
				if ( $hamburger_icon == 'fourline') {
					$out .= '<div class="hamburger-icon-extra"></div>';
				}
		$out .= '
			</div>
		</a>';

	if ( $hamburger_type == 'full' ) :
		$out .= '
		<div class="la-hamburger-wrap-' . esc_attr( $uniqid ) . ' la-hamburger-wrap la-hamuburger-bg ' . esc_attr( $menu_style ) . ' aligncenter ' . esc_attr($extra_class_panel) .'">
			<div class="hamburger-full-wrap">
				<div class="lahfb-hamburger-top">';
					if ( ! empty( $image_logo ) ) {
						$out .= '
						<div class="hamburger-logo-image-wrap">
							<img class="hamburger-logo-image" src="' . esc_url( $image_logo ) . '" alt="'. get_bloginfo('name') .'">
						</div>';
					}

					$out .= $menu_out;

					if ( $search == 'true' ) :
						$out .= '
						<form id="hamburger-menu-search-form" role="search" action="' . esc_url(home_url( '/' )) . '" method="get" >
							<div class="hamburger-menu-search-content">
								<input name="s" type="text" class="hamburger-search-text-box" placeholder="' . $placeholder . '" >
								<i class="dl-icon-search2 hamburger-menu-search-icon"></i>
							</div>
						</form>';
					endif;

					$out .= '
				</div>
				<div class="lahfb-hamburger-bottom hamburger-elements">';
					if ( $content == 'true' ) :
						$out .= '<div class="lahmb-text-content">' . LAHFB_Helper::remove_js_autop( $text_content, true ) . '</div>';
					endif;

					if ( $socials == 'true' ) :
						ob_start(); ?>
						<div class="hamburger-social-icons">
                            <?php echo do_shortcode('[la_social_link]'); ?>
						</div>

						<?php
						$out .= ob_get_contents();
						ob_end_clean();
					endif;

					if ( ! empty( $copyright ) ) :
						$out .= '
						<div class="lahfb-hamburger-bottom hamburger-copyright">
						' . $copyright . '
						</div>';
					endif;
					$out .= '
				</div>
			</div>
		</div>';
	endif;

	if ( $once_run_flag ) :
		if ( $hamburger_type == 'toggle' ) :
			$out .= '
			<div id="hamburger-menu-wrap" class="la-hamuburger-bg hamburger-menu-content ' . esc_attr( $menu_style ) . ' hamburger-menu-wrap-' . esc_attr( $uniqid ) . ' ' . $toggle_from . ' ' . esc_attr($extra_class_panel) . '">
				<div class="hamburger-menu-main">
					<div class="lahfb-hamburger-top">';
						if ( ! empty( $image_logo ) ) {
							$out .= '
							<div class="hamburger-logo-image-wrap">
								<img class="hamburger-logo-image" src="' . esc_url( $image_logo ) . '" alt="'. get_bloginfo('name') .'">
							</div>';
						}

						$out .=	$menu_out;

						if ( $search == 'true' ) :
							$out .= '
							<form id="hamburger-menu-search-form" role="search" action="' . esc_url(home_url( '/' )) . '" method="get" >
								<div class="hamburger-menu-search-content">
									<input name="s" type="text" class="hamburger-search-text-box" placeholder="' . $placeholder . '" >
									<i class="dl-icon-search2 hamburger-menu-search-icon"></i>
								</div>
							</form>';
						endif;

						$out .= '
					</div>';

					$out .= '<div class="lahfb-hamburger-bottom hamburger-elements">';
						if ( $content == 'true' ) :
							$out .= '<div class="lahmb-text-content">' . LAHFB_Helper::remove_js_autop( $text_content, true ) . '</div>';
						endif;

						if ( $socials == 'true' ) :
							ob_start(); ?>

							<div class="hamburger-social-icons">
								<?php echo do_shortcode('[la_social_link]'); ?>
							</div>

							<?php
							$out .= ob_get_contents();
							ob_end_clean();
						endif;

						if ( ! empty( $copyright ) ) :
							$out .= '
							<div class="lahfb-hamburger-bottom hamburger-copyright">
							' . $copyright . '
							</div>';
						endif;
					$out .= '</div>'; // Close .hamburger-elements
				$out .= '</div>'; // Close .hamburger-menu-main

			$out .= '</div>';
		endif;
	endif;

	$out .= '</div>';

	return $out;
}

LAHFB_Helper::add_element( 'hamburger-menu', 'lahfb_hamburger_menu' );
