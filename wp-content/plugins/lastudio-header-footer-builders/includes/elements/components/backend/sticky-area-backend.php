<!-- modal header area -->
<div class="lahfb-modal-wrap lahfb-modal-edit" data-element-target="sticky-area">

	<div class="lahfb-modal-header">
		<h4><?php esc_html_e( 'Header Area', 'lahfb-textdomain' ); ?></h4>
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
					<a href="#sticky">
						<span><?php esc_html_e( 'Sticky', 'lahfb-textdomain' ); ?></span>
					</a>
				</li>
				<li class="lahfb-tab">
					<a href="#styling">
						<span><?php esc_html_e( 'Styling', 'lahfb-textdomain' ); ?></span>
					</a>
				</li>
				<li class="lahfb-tab">
					<a href="#classID">
						<span><?php esc_html_e( 'Class & ID', 'lahfb-textdomain' ); ?></span>
					</a>
				</li>
			</ul> <!-- end .lahfb-tabs-list -->

			<!-- general -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#general">

				<?php

					lahfb_number_unit( array(
						'title'			=> esc_html__( 'Height', 'lahfb-textdomain' ),
						'id'			=> 'area_height',
						'options'		=> array(
							'px'	=> 'px',
							'em'	=> 'em',
							'%'		=> '%',
						),
						'default_unit'	=> 'px',
						'default'		=> '100',
					));

					lahfb_number_unit( array(
						'title'			=> esc_html__( 'Width', 'lahfb-textdomain' ),
						'id'			=> 'area_width',
						'options'		=> array(
							'px'	=> 'px',
							'em'	=> 'em',
							'%'		=> '%',
						),
						'default_unit'	=> 'px',
						'default'		=> '',
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Full Container?', 'lahfb-textdomain' ),
						'id'			=> 'full_container',
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Padding Container?', 'lahfb-textdomain' ),
						'id'			=> 'container_padd',
						'default'		=> 'true', 
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Super Sticky (Fixed)', 'lahfb-textdomain' ),
						'id'			=> 'super_sticky',
						'default'		=> 'false', 
					));

					lahfb_select( array(
						'title'			=> esc_html__( 'Content Position', 'lahfb-textdomain' ),
						'id'			=> 'content_position',
						'default'		=> 'middle',
						'options'		=> array(
							'top'	 => esc_html__( 'Top', 'lahfb-textdomain' ),
							'middle' => esc_html__( 'Middle', 'lahfb-textdomain' ),
							'bottom' => esc_html__( 'Bottom', 'lahfb-textdomain' ),
						),
					));

				?>

			</div> <!-- end general -->

			<!-- sticky -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#sticky">

				<?php

					lahfb_select( array(
						'title'			=> esc_html__( 'In what case Sticky Menu will appear?', 'lahfb-textdomain' ),
						'id'			=> 'sticky_appear',
						'default'		=> 'both',
						'options'		=> array(
							'upscroll'	 => esc_html__( 'Upward Scrolling', 'lahfb-textdomain' ),
							'downscroll' => esc_html__( 'Downward Scrolling', 'lahfb-textdomain' ),
							'both' 		 => esc_html__( 'Both', 'lahfb-textdomain' ),
						),
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Display Sticky in Tablets/Mobiles?', 'lahfb-textdomain' ),
						'id'			=> 'mobile_sticky',
						'default'		=> 'false', 
					));

				?>

			</div> <!-- end sticky -->

			<!-- styling -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#styling">

				<?php
					lahfb_styling_tab( array(
						'Typography' => array(
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
						'Background' => array(
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'background_image' ),
							array( 'property' => 'background_position' ),
							array( 'property' => 'background_repeat' ),
							array( 'property' => 'background_cover' ),
						),
						'Box' => array(
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
							array( 'property' => 'box_shadow' ),
						),
					) );
				?>

			</div> <!-- end #styling -->

			<!-- classID -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#classID">

				<?php

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Extra class', 'lahfb-textdomain' ),
						'id'			=> 'extra_class',
					));

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Extra ID', 'lahfb-textdomain' ),
						'id'			=> 'extra_id',
					));

				?>

			</div> <!-- end #classID -->

		</div>
	</div> <!-- end lahfb-modal-contents-wrap -->

	<div class="lahfb-modal-footer">
		<input type="button" class="lahfb_close button" value="<?php esc_html_e( 'Close', 'lahfb-textdomain' ); ?>">
		<input type="button" class="lahfb_save button button-primary" value="<?php esc_html_e( 'Save Changes', 'lahfb-textdomain' ); ?>">
	</div>

</div> <!-- end lahfb-elements -->