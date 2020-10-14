<!-- modal menu edit -->
<div class="lahfb-modal-wrap lahfb-modal-edit" data-element-target="hamburger-menu">

	<div class="lahfb-modal-header">
		<h4><?php esc_html_e( 'Hamburger Menu Settings', 'lahfb-textdomain' ); ?></h4>
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
					<a href="#elements">
						<span><?php esc_html_e( 'Elements', 'lahfb-textdomain' ); ?></span>
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

					lahfb_menu( array(
						'title'			=> esc_html__( 'Select a Menu', 'lahfb-textdomain' ),
						'id'			=> 'menu',
					));

					lahfb_select( array(
						'title'			=> esc_html__( 'Hamburger Type', 'lahfb-textdomain' ),
						'id'			=> 'hamburger_type',
						'default'		=> 'toggle',
						'options'		=> array(
							'toggle'=> esc_html__( 'Toggle', 'lahfb-textdomain' ),
							'full' 	=> esc_html__( 'Full', 'lahfb-textdomain' ),
						),
						'dependency'	=> array(
							'toggle'  => array( 'toggle_from' ),
						),
					));

					lahfb_select( array(
						'title'			=> esc_html__( 'Hamburger Icon', 'lahfb-textdomain' ),
						'id'			=> 'hamburger_icon',
						'default'		=> '3line',
						'options'		=> array(
							'3line'	=> esc_html__( '3 Lines', 'lahfb-textdomain' ),
							'4line' => esc_html__( '4 Lines', 'lahfb-textdomain' ),
						),
					));

					lahfb_select( array(
						'title'			=> esc_html__( 'Hamburger Menu Style', 'lahfb-textdomain' ),
						'id'			=> 'hm_style',
						'default'		=> 'light',
						'options'		=> array(
							'light'	=> esc_html__( 'Light', 'lahfb-textdomain' ),
							'dark' => esc_html__( 'Dark', 'lahfb-textdomain' ),
						),
					));

					lahfb_select( array(
						'title'			=> esc_html__( 'Open Toggle From', 'lahfb-textdomain' ),
						'id'			=> 'toggle_from',
						'default'		=> 'right',
						'options'		=> array(
							'right'	=> esc_html__( 'Right', 'lahfb-textdomain' ),
							'left'  => esc_html__( 'Left', 'lahfb-textdomain' ),
						),
					));

				?>

			</div> <!-- end general -->

			<!-- general -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#elements">
				<?php

					lahfb_image( array(
						'title'			=> esc_html__( 'Logo', 'lahfb-textdomain' ),
						'id'			=> 'image_logo',
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Display Socials?', 'lahfb-textdomain' ),
						'id'			=> 'socials',
						'default'		=> 'true',
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Display Search?', 'lahfb-textdomain' ),
						'id'			=> 'search',
						'default'		=> 'true',
						'dependency'	=> array(
							'true'  => array( 'placeholder' ),
						),
					));

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Search Placeholder', 'lahfb-textdomain' ),
						'id'			=> 'placeholder',
						'default'		=> 'Search ...',
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Display Content?', 'lahfb-textdomain' ),
						'id'			=> 'content',
						'default'		=> 'false',
						'dependency'	=> array(
							'true'  => array( 'text_content' ),
						),
					));

					lahfb_textarea( array(
						'title'			=> esc_html__( 'Content', 'lahfb-textdomain' ),
						'id'			=> 'text_content',
					));


					lahfb_textfield( array(
						'title'			=> esc_html__( 'Copyright', 'lahfb-textdomain' ),
						'id'			=> 'copyright',
						'default'		=> 'Copyright',
					));
				?>
			</div>

			<!-- styling -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#styling">
				
				<?php
					lahfb_styling_tab( array(
						'Hamburger Icon Color' => array(
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
						),
						'Hamburger Icon Box' => array(
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
							array( 'property' => 'border_radius' ),
							array( 'property' => 'border' ),
						),
						'Hamburger Box' => array(
							array( 'property' => 'padding' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'background_image' ),
							array( 'property' => 'background_position' ),
							array( 'property' => 'background_repeat' ),
							array( 'property' => 'background_cover' ),
							array( 'property' => 'gradient' ),
						),
						'Logo Box' => array(
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'text_align' ),
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
						'Menu Box' => array(
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Menu Item' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'font_weight' ),
							array( 'property' => 'font_style' ),
							array( 'property' => 'text_transform' ),
							array( 'property' => 'text_decoration' ),
							array( 'property' => 'line_height' ),
							array( 'property' => 'letter_spacing' ),
							array( 'property' => 'overflow' ),
							array( 'property' => 'word_break' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Current Menu Item' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'font_weight' ),
							array( 'property' => 'font_style' ),
							array( 'property' => 'text_transform' ),
							array( 'property' => 'text_decoration' ),
							array( 'property' => 'line_height' ),
							array( 'property' => 'letter_spacing' ),
							array( 'property' => 'overflow' ),
							array( 'property' => 'word_break' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Current Item Shape' => array(
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'position' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Submenu Item' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'font_weight' ),
							array( 'property' => 'font_style' ),
							array( 'property' => 'text_transform' ),
							array( 'property' => 'text_decoration' ),
							array( 'property' => 'line_height' ),
							array( 'property' => 'letter_spacing' ),
							array( 'property' => 'overflow' ),
							array( 'property' => 'word_break' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Search Input' => array(
							array( 'property' => 'font_size' ),
							array( 'property' => 'line_height' ),
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Search Box' => array(
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Elements Box' => array(
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'text_align' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Content' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'font_weight' ),
							array( 'property' => 'font_style' ),
							array( 'property' => 'text_transform' ),
							array( 'property' => 'text_decoration' ),
							array( 'property' => 'line_height' ),
							array( 'property' => 'letter_spacing' ),
							array( 'property' => 'overflow' ),
							array( 'property' => 'word_break' ),
						),
						'Socials' => array(
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'text_align' ),
							array( 'property' => 'line_height' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
						),
						'Copyright' => array(
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

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Extra class for panel', 'lahfb-textdomain' ),
						'id'			=> 'extra_class_panel',
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