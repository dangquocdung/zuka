<!-- modal date edit -->
<div class="lahfb-modal-wrap lahfb-modal-edit" data-element-target="date">

	<div class="lahfb-modal-header">
		<h4><?php esc_html_e( 'Date Settings', 'lahfb-textdomain' ); ?></h4>
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
					<a href="#classID">
						<span><?php esc_html_e( 'Class & ID', 'lahfb-textdomain' ); ?></span>
					</a>
				</li>
			</ul> <!-- end .lahfb-tabs-list -->

			<!-- general -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#general">

				<?php

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Text', 'lahfb-textdomain' ),
						'id'			=> 'text',
						'default'		=> 'Today: ',
					));

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Date Format (F j, Y)', 'lahfb-textdomain' ),
						'id'			=> 'date_format',
						'default'		=> 'M. j, Y',
					));

					lahfb_help( array(
						'title'			=> esc_html__( 'Date Example', 'lahfb-textdomain' ),
						'id'			=> 'date_example',
						'default'		=> '
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
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Date' => array(
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
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
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
							array( 'property' => 'width' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
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

				?>

			</div> <!-- end #classID -->

		</div>
	</div> <!-- end lahfb-modal-contents-wrap -->

	<div class="lahfb-modal-footer">
		<input type="button" class="lahfb_close button" value="<?php esc_html_e( 'Close', 'lahfb-textdomain' ); ?>">
		<input type="button" class="lahfb_save button button-primary" value="<?php esc_html_e( 'Save Changes', 'lahfb-textdomain' ); ?>">
	</div>

</div> <!-- end lahfb-elements -->