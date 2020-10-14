<!-- modal menu edit -->
<div class="lahfb-modal-wrap lahfb-modal-edit" data-element-target="menu">

	<div class="lahfb-modal-header">
		<h4><?php esc_html_e( 'Menu Settings', 'lahfb-textdomain' ); ?></h4>
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

                    lahfb_switcher( array(
                        'title'         => esc_html__( 'Show MegaMenu ?', 'lahfb-textdomain' ),
                        'id'            => 'show_megamenu',
                        'default'       => 'false'
                    ));

					lahfb_switcher( array(
						'title'         => esc_html__( 'Show mobile menu ?', 'lahfb-textdomain' ),
						'id'            => 'show_mobile_menu',
						'default'       => 'true',
						'dependency'	=> array(
							'true'  => array( 'mobile_menu_display_width' ),
						),
					));

					// lahfb_number_unit( array(
					// 	'title'			=> esc_html__( 'display responsive toggle menu under ... px', 'lahfb-textdomain' ),
					// 	'id'			=> 'mobile_menu_display_width',
					// 	'options'		=> array(
					// 		'px'	=> 'px',
					// 	),
					// 	'default_unit'	=> 'px',
					// ));

					lahfb_switcher( array(
						'title'         => esc_html__( 'Show parent menu arrow ?', 'lahfb-textdomain' ),
						'id'            => 'show_parent_arrow',
						'default'       => 'true',
						'dependency'	=> array(
							'true'  => array( 'parent_arrow_direction' ),
						),
					));

					lahfb_custom_select( array(
						'title'			=> esc_html__( 'Parent menu arrow direction', 'lahfb-textdomain' ),
						'id'			=> 'parent_arrow_direction',
						'options'		=> array(
							'top'	=> 'top',
							'bottom'=> 'bottom',
							'left'	=> 'left',
							'right'	=> 'right',
						),
						'default'	=> 'bottom',
					));

                    lahfb_switcher( array(
                        'title'         => esc_html__( 'Display "Description" under menu item?', 'lahfb-textdomain' ),
                        'id'            => 'desc_item',
                        'default'       => 'false',
                    ));

                    lahfb_switcher( array(
                        'title'         => esc_html__( 'Full Width?', 'lahfb-textdomain' ),
                        'id'            => 'full_menu',
                        'default'       => 'false',
                    ));

                    lahfb_switcher( array(
                        'title'         => esc_html__( '100% Height?', 'lahfb-textdomain' ),
                        'id'            => 'height_100',
                        'default'       => 'false',
                    ));

				?>

			</div> <!-- end general -->

			<!-- styling -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#styling">
                
                <?php
					lahfb_styling_tab( array(
						'Menu Item' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
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
						'Parent Menu Arrow' => array(
							array( 'property' => 'position' ),
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
							array( 'property' => 'border' ),
							array( 'property' => 'overflow' ),
							array( 'property' => 'word_break' ),
						),
						'Menu Icon' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
						),
						'Submenu Menu Icon' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
						),
						'Menu Description' => array(
							array( 'property' => 'position' ),
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
							array( 'property' => 'border' ),
						),
						'Menu Badge' => array(
							array( 'property' => 'position' ),
							array( 'property' => 'color' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'font_weight' ),
							array( 'property' => 'font_style' ),
							array( 'property' => 'text_transform' ),
							array( 'property' => 'text_decoration' ),
							array( 'property' => 'line_height' ),
							array( 'property' => 'letter_spacing' ),
						),
						'Submenu Item' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
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
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Submenu Currnet Item' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'color_hover' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
						),
						'Submenu Box' => array(
							array( 'property' => 'width' ),
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
						'Responsive Menu Box' => array(
							array( 'property' => 'width' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'background_image' ),
							array( 'property' => 'background_position' ),
							array( 'property' => 'background_repeat' ),
							array( 'property' => 'background_cover' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'position' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
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