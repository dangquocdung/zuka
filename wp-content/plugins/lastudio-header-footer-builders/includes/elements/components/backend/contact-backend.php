<!-- modal search edit -->
<div class="lahfb-modal-wrap lahfb-modal-edit" data-element-target="contact">

	<div class="lahfb-modal-header">
		<h4><?php esc_html_e( 'Contact Settings', 'lahfb-textdomain' ); ?></h4>
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

					// Select Form
					lahfb_contact( array(
						'title'			=> esc_html__( 'Select contact form', 'lahfb-textdomain' ),
						'id'			=> 'contact_form',
					));

					// Select Type
					lahfb_select( array(
						'title'			=> esc_html__( 'Type', 'lahfb-textdomain' ),
						'id'			=> 'contact_type',
						'default'		=> 'icon',
						'options'		=> array(
							'text'	=> esc_html__( 'Text', 'lahfb-textdomain' ),
							'icon' 	=> esc_html__( 'Icon', 'lahfb-textdomain' ),
							'form' 	=> esc_html__( 'Just Form', 'lahfb-textdomain' ),
						),
						'dependency'	=> array(
							'text'  => array( 'contact_text' ),
						),
					));

					// Select Open type
					lahfb_select( array(
						'title'			=> esc_html__( 'How to open the form?', 'lahfb-textdomain' ),
						'id'			=> 'open_form',
						'default'		=> 'modal',
						'options'		=> array(
							'modal'		 => esc_html__( 'Modal', 'lahfb-textdomain' ),
							'dropdown' 	 => esc_html__( 'Dropdown', 'lahfb-textdomain' ),
						),
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

				?>

			</div> <!-- end general -->

			<!-- styling -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#styling">
				
				<?php
					lahfb_styling_tab( array(
						'Text' => array(
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
						'Icon' => array(
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
						'Form' => array(
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
						'Tooltip' => array(
							array( 'property' => 'color' ),
							array( 'property' => 'font_size' ),
							array( 'property' => 'font_weight' ),
							array( 'property' => 'font_style' ),
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

				?>

			</div> <!-- end #extra-class -->

		</div>
	</div> <!-- end lahfb-modal-contents-wrap -->

	<div class="lahfb-modal-footer">
		<input type="button" class="lahfb_close button" value="<?php esc_html_e( 'Close', 'lahfb-textdomain' ); ?>">
		<input type="button" class="lahfb_save button button-primary" value="<?php esc_html_e( 'Save Changes', 'lahfb-textdomain' ); ?>">
	</div>

</div> <!-- end lahfb-elements -->