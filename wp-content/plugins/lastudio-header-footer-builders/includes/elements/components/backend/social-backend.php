<!-- modal search edit -->
<div class="lahfb-modal-wrap lahfb-modal-edit" data-element-target="social">

	<div class="lahfb-modal-header">
		<h4><?php esc_html_e( 'Socials Settings', 'lahfb-textdomain' ); ?></h4>
		<i class="fa fa-times"></i>
	</div>

	<div class="lahfb-modal-contents-wrap">
		<div class="lahfb-modal-contents w-row">

			<ul class="lahfb-tabs-list lahfb-element-groups wp-clearfix">
				<li class="lahfb-tab w-active">
					<a href="#general">
						<span><?php esc_html_e( 'General', 'lahfb-textdomain' ); ?></span>
					</a>
				</li>
				<li class="lahfb-tab">
					<a href="#display-format">
						<span><?php esc_html_e( 'Display Format', 'lahfb-textdomain' ); ?></span>
					</a>
				</li>
				<li class="lahfb-tab">
					<a href="#socialicons">
						<span><?php esc_html_e( 'Social Icons', 'lahfb-textdomain' ); ?></span>
					</a>
				</li>
				<li class="lahfb-tab">
					<a href="#styling">
						<span><?php esc_html_e( 'Styling', 'lahfb-textdomain' ); ?></span>
					</a>
				</li>
				<li class="lahfb-tab">
					<a href="#extra-class">
						<span><?php esc_html_e( 'Extra Class', 'lahfb-textdomain' ); ?></span>
					</a>
				</li>
			</ul> <!-- end .lahfb-tabs-list -->

			<!-- general -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#general">

				<?php

					// Main Icon
					lahfb_select( array(
						'title'			=> esc_html__( 'Twitter Icon or Text?', 'lahfb-textdomain' ),
						'id'			=> 'main_social_icon',
						'default'		=> 'icon',
						'options'		=> array(
							'icon'	 => esc_html__( 'Icon', 'lahfb-textdomain' ),
							'text' 	 => esc_html__( 'Text', 'lahfb-textdomain' ),
						),
						'dependency'	=> array(
							'text'  => array( 'main_icon_text' ),
						),
					));

					// Twitter Text
					lahfb_textfield( array(
						'title'			=> esc_html__( 'Text instead of Main Icon', 'lahfb-textdomain' ),
						'id'			=> 'main_icon_text',
						'default'		=> 'Socials',
					));



					// Type
					lahfb_select( array(
						'title'			=> esc_html__( 'Type', 'lahfb-textdomain' ),
						'id'			=> 'social_type',
						'default'		=> 'simple',
						'options'		=> array(
							'simple'	  => esc_html__( 'Simple', 'lahfb-textdomain' ),
							'slide' 	  => esc_html__( 'Slide', 'lahfb-textdomain' ),
							'dropdown' 	  => esc_html__( 'Dropdown', 'lahfb-textdomain' ),
							'full' 		  => esc_html__( 'Full', 'lahfb-textdomain' ),
						),
						'dependency'	=> array(
							'slide'		=> array( 'toggle_text' ),
							'dropdown'	=> array( 'default_icon_bg' ),
						),
					));


					lahfb_textfield( array(
						'title'			=> esc_html__( 'Toggle Text', 'lahfb-textdomain' ),
						'id'			=> 'toggle_text',
						'default'		=> 'Social Network',
						'placeholder'	=> true,
					));

					// Tooltip Text
					lahfb_switcher( array(
						'title'         => esc_html__( 'Show Tooltip Text ?', 'lahfb-textdomain' ),
						'id'            => 'show_tooltip',
						'default'       => 'false',
						'dependency'	=> array(
							'true'  => array( 'tooltip_text', 'tooltip_position' ),
						),
					));

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Tooltip Text', 'lahfb-textdomain' ),
						'id'			=> 'tooltip_text',
						'default'		=> 'Tooltip Text',
					));

					lahfb_select( array(
						'title'			=> esc_html__( 'Select Tooltip Position', 'lahfb-textdomain' ),
						'id'			=> 'tooltip_position',
						'default'		=> 'tooltip-on-bottom',
						'options'		=> array(
							'tooltip-on-top'	=> esc_html__( 'Top', 'lahfb-textdomain' ),
							'tooltip-on-bottom' => esc_html__( 'Bottom', 'lahfb-textdomain' ),
						),
					));

					// Tooltip Text
					lahfb_switcher( array(
						'title'         => esc_html__( 'Replace Background image with defult icon', 'lahfb-textdomain' ),
						'id'            => 'default_icon_bg',
						'default'       => 'false',
					));

				?>

			</div> <!-- end general -->

			<!-- display-format -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#display-format">

				<?php

					lahfb_select( array(
						'title'			=> esc_html__( 'Format', 'lahfb-textdomain' ),
						'id'			=> 'social_format',
						'default'		=> 'icon',
						'options'		=> array(
							'icon'	  	  => esc_html__( 'Icon', 'lahfb-textdomain' ),
							'text' 	  	  => esc_html__( 'Text', 'lahfb-textdomain' ),
							'icontext' 	  => esc_html__( 'Icon + Text', 'lahfb-textdomain' ),
						),
					));


					lahfb_switcher( array(
						'title'			=> esc_html__( 'Showing icons side to side as inline', 'lahfb-textdomain' ),
						'id'			=> 'inline',
						'default'		=> 'false',
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Showing "-" (dash) at the beginning of icon', 'lahfb-textdomain' ),
						'id'			=> 'dash',
						'default'		=> 'false',
					));

				?>

			</div> <!-- end #display-format -->

			<!-- social icons -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#socialicons">

				<?php
					$lastudio_socials = array (
				        'none'      	=> 'None',
				        'dribbble'      => 'Dribbble',
				        'facebook'      => 'Facebook',
				        'flickr'        => 'Flickr',
				        'foursquare'    => 'Foursquare',
				        'github'        => 'Github',
				        'google-plus'   => 'Google-plus',
				        'instagram'     => 'Instagram',
				        'lastfm'        => 'Lastfm',
				        'linkedin'      => 'Linkedin',
				        'pinterest'     => 'Pinterest',
				        'reddit'        => 'Reddit',
				        'soundcloud'    => 'Soundcloud',
				        'spotify'       => 'Spotify',
				        'tumblr'        => 'Tumblr',
				        'twitter'       => 'Twitter',
				        'vimeo'         => 'Vimeo',
				        'vine'          => 'Vine',
				        'yelp'          => 'Yelp',
				        'yahoo'         => 'Yahoo',
				        'youtube'       => 'Youtube',
				        'wordpress'     => 'Wordpress',
				        'dropbox'       => 'Dropbox',
				        'evernote'      => 'Evernote',
				        'envato'        => 'Envato',
				        'skype'         => 'Skype',
						'feed'          => 'Feed',
						'telegram'		=> 'Telegram',
				    );
					// Social icon 1
					lahfb_select( array(
						'title'			=> esc_html__( '1st Social Icon', 'lahfb-textdomain' ),
						'id'			=> 'social_icon_1',
						'default'		=> 'facebook',
						'options'		=> $lastudio_socials,
					));

					// Social text 1
					lahfb_textfield( array(
						'title'			=> esc_html__( '1st Social Text', 'lahfb-textdomain' ),
						'id'			=> 'social_text_1',
						'default'		=> 'Facebook',
					));

					// Social link 1
					lahfb_textfield( array(
						'title'			=> esc_html__( '1st Social URL', 'lahfb-textdomain' ),
						'id'			=> 'social_url_1',
						'default'		=> 'https://www.facebook.com/',
					));

				?>
				
				<div class="w-col-sm-12 lahfb-line-divider"></div>

				<?php

					// Social icon 2
					lahfb_select( array(
						'title'			=> esc_html__( '2st Social Icon', 'lahfb-textdomain' ),
						'id'			=> 'social_icon_2',
						'default'		=> 'none',
						'options'		=> $lastudio_socials,
					));

					// Social text 2
					lahfb_textfield( array(
						'title'			=> esc_html__( '2st Social Text', 'lahfb-textdomain' ),
						'id'			=> 'social_text_2',
					));

					// Social link 2
					lahfb_textfield( array(
						'title'			=> esc_html__( '2st Social URL', 'lahfb-textdomain' ),
						'id'			=> 'social_url_2',
					));

				?>

				<div class="w-col-sm-12 lahfb-line-divider"></div>

				<?php

					// Social icon 3
					lahfb_select( array(
						'title'			=> esc_html__( '3st Social Icon', 'lahfb-textdomain' ),
						'id'			=> 'social_icon_3',
						'default'		=> 'none',
						'options'		=> $lastudio_socials,
					));

					// Social text 3
					lahfb_textfield( array(
						'title'			=> esc_html__( '3st Social Text', 'lahfb-textdomain' ),
						'id'			=> 'social_text_3',
					));

					// Social link 3
					lahfb_textfield( array(
						'title'			=> esc_html__( '3st Social URL', 'lahfb-textdomain' ),
						'id'			=> 'social_url_3',
					));

				?>

				<div class="w-col-sm-12 lahfb-line-divider"></div>

				<?php

					// Social icon 4
					lahfb_select( array(
						'title'			=> esc_html__( '4st Social Icon', 'lahfb-textdomain' ),
						'id'			=> 'social_icon_4',
						'default'		=> 'none',
						'options'		=> $lastudio_socials,
					));

					// Social text 4
					lahfb_textfield( array(
						'title'			=> esc_html__( '4st Social Text', 'lahfb-textdomain' ),
						'id'			=> 'social_text_4',
					));

					// Social link 4
					lahfb_textfield( array(
						'title'			=> esc_html__( '4st Social URL', 'lahfb-textdomain' ),
						'id'			=> 'social_url_4',
					));

				?>

				<div class="w-col-sm-12 lahfb-line-divider"></div>

				<?php

					// Social icon 5
					lahfb_select( array(
						'title'			=> esc_html__( '5st Social Icon', 'lahfb-textdomain' ),
						'id'			=> 'social_icon_5',
						'default'		=> 'none',
						'options'		=> $lastudio_socials,
					));

					// Social text 5
					lahfb_textfield( array(
						'title'			=> esc_html__( '5st Social Text', 'lahfb-textdomain' ),
						'id'			=> 'social_text_5',
					));

					// Social link 5
					lahfb_textfield( array(
						'title'			=> esc_html__( '5st Social URL', 'lahfb-textdomain' ),
						'id'			=> 'social_url_5',
					));

				?>

				<div class="w-col-sm-12 lahfb-line-divider"></div>

				<?php

					// Social icon 6
					lahfb_select( array(
						'title'			=> esc_html__( '6st Social Icon', 'lahfb-textdomain' ),
						'id'			=> 'social_icon_6',
						'default'		=> 'none',
						'options'		=> $lastudio_socials,
					));

					// Social text 6
					lahfb_textfield( array(
						'title'			=> esc_html__( '6st Social Text', 'lahfb-textdomain' ),
						'id'			=> 'social_text_6',
					));

					// Social link 6
					lahfb_textfield( array(
						'title'			=> esc_html__( '6st Social URL', 'lahfb-textdomain' ),
						'id'			=> 'social_url_6',
					));

				?>

				<div class="w-col-sm-12 lahfb-line-divider"></div>

				<?php

					// Social icon 7
					lahfb_select( array(
						'title'			=> esc_html__( '7st Social Icon', 'lahfb-textdomain' ),
						'id'			=> 'social_icon_7',
						'default'		=> 'none',
						'options'		=> $lastudio_socials,
					));

					// Social text 7
					lahfb_textfield( array(
						'title'			=> esc_html__( '7st Social Text', 'lahfb-textdomain' ),
						'id'			=> 'social_text_7',
					));

					// Social link 7
					lahfb_textfield( array(
						'title'			=> esc_html__( '7st Social URL', 'lahfb-textdomain' ),
						'id'			=> 'social_url_7',
					));

				?>

			</div> <!-- social icons -->

			

			<!-- styling -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#styling">
				
				<?php
					lahfb_styling_tab( array(
						'Menu Icon/Text' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'font_size' ),
						),
						'Box' => array(
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'background_image' ),
							array( 'property' => 'background_position' ),
							array( 'property' => 'background_repeat' ),
							array( 'property' => 'background_cover' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Social Box' => array(
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'background_image' ),
							array( 'property' => 'background_position' ),
							array( 'property' => 'background_repeat' ),
							array( 'property' => 'background_cover' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
							array( 'property' => 'position' ),
							array( 'property' => 'box_shadow' ),
						),
						'Social Icon/Text Box' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'font_weight' ),
							array( 'property' => 'font_style' ),
							array( 'property' => 'text_align' ),
							array( 'property' => 'text_transform' ),
							array( 'property' => 'text_decoration' ),
							array( 'property' => 'line_height' ),
							array( 'property' => 'letter_spacing' ),
							array( 'property' => 'overflow' ),
							array( 'property' => 'word_break' ),
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'background_image' ),
							array( 'property' => 'background_position' ),
							array( 'property' => 'background_repeat' ),
							array( 'property' => 'background_cover' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Social Icon' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'font_weight' ),
							array( 'property' => 'font_style' ),
							array( 'property' => 'text_align' ),
							array( 'property' => 'text_transform' ),
							array( 'property' => 'text_decoration' ),
							array( 'property' => 'line_height' ),
							array( 'property' => 'letter_spacing' ),
							array( 'property' => 'overflow' ),
							array( 'property' => 'word_break' ),
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'background_image' ),
							array( 'property' => 'background_position' ),
							array( 'property' => 'background_repeat' ),
							array( 'property' => 'background_cover' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
							array( 'property' => 'box_shadow' ),
						),
						'Social Text' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'font_weight' ),
							array( 'property' => 'font_style' ),
							array( 'property' => 'text_align' ),
							array( 'property' => 'text_transform' ),
							array( 'property' => 'text_decoration' ),
							array( 'property' => 'line_height' ),
							array( 'property' => 'letter_spacing' ),
							array( 'property' => 'overflow' ),
							array( 'property' => 'word_break' ),
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'background_image' ),
							array( 'property' => 'background_position' ),
							array( 'property' => 'background_repeat' ),
							array( 'property' => 'background_cover' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Full Page Social' => array(
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'background_image' ),
							array( 'property' => 'background_position' ),
							array( 'property' => 'background_repeat' ),
							array( 'property' => 'background_cover' ),
						),
						'Tooltip' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'font_weight' ),
							array( 'property' => 'font_style' ),
							array( 'property' => 'letter_spacing' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'overflow' ),
							array( 'property' => 'word_break' ),
						),
					) );
				?>

			</div> <!-- end #styling -->

			<!-- extra-class -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#extra-class">

				<?php

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Extra class', 'lahfb-textdomain' ),
						'id'			=> 'extra_class',
					));

				?>

			</div> <!-- end #extra-class -->

		</div>
	</div> <!-- end lahfb-modal-contents-wrap -->

	<div class="lahfb-modal-footer">
		<input type="button" class="lahfb_close button" value="<?php esc_html_e( 'Close', 'lahfb-textdomain' ); ?>">
		<input type="button" class="lahfb_save button button-primary" value="<?php esc_html_e( 'Save Changes', 'lahfb-textdomain' ); ?>">
	</div>

</div> <!-- end lahfb-elements -->