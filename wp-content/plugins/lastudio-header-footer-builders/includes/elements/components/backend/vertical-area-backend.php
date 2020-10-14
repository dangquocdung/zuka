<!-- modal header area -->
<div class="lahfb-modal-wrap lahfb-modal-edit" data-element-target="vertical-area">

	<div class="lahfb-modal-header">
		<h4><?php esc_html_e( 'Vertical Header Area', 'lahfb-textdomain' ); ?></h4>
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
					<a href="#contact">
						<span><?php esc_html_e( 'Toggle Contact', 'lahfb-textdomain' ); ?></span>
					</a>
				</li>
				<li class="lahfb-tab">
					<a href="#socials">
						<span><?php esc_html_e( 'Toggle Socials', 'lahfb-textdomain' ); ?></span>
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

					lahfb_select( array(
						'title'			=> esc_html__( 'Alignment', 'lahfb-textdomain' ),
						'id'			=> 'alignment',
						'default'		=> 'flex-start',
						'options'		=> array(
							'flex-start'	 => esc_html__( 'Left', 'lahfb-textdomain' ),
							'center' 		 => esc_html__( 'Center', 'lahfb-textdomain' ),
							'flex-end' 		 => esc_html__( 'Right', 'lahfb-textdomain' ),
						),
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Header Toggle', 'lahfb-textdomain' ),
						'id'			=> 'vertical_toggle',
						'default'		=> 'false',
					));

					lahfb_imageselect( array(
						'title'			=> esc_html__( 'Select Toggle Type', 'lahfb-textdomain' ),
						'id'			=> 'vertical_toggle_type',
						'default'		=> 'freelancer',
						'options'		=> array(
							'freelancer'	=> LAHFB_Helper::get_file_uri( 'assets/dist/images/fields/freelancer.jpg' ),
							'photography'	=> LAHFB_Helper::get_file_uri( 'assets/dist/images/fields/photography.jpg' ),
						),
					));

					lahfb_imageselect( array(
						'title'			=> esc_html__( 'Select Toggle Icon', 'lahfb-textdomain' ),
						'id'			=> 'vertical_toggle_icon',
						'default'		=> 'foursome',
						'options'		=> array(
							'triad'			=> LAHFB_Helper::get_file_uri( 'assets/dist/images/fields/triad.png' ),
							'foursome'		=> LAHFB_Helper::get_file_uri( 'assets/dist/images/fields/foursome.png' ),
						),
					));

					lahfb_image( array(
						'title'			=> esc_html__( 'Toggle Logo', 'lahfb-textdomain' ),
						'id'			=> 'logo',
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Toggle Contact Icon', 'lahfb-textdomain' ),
						'id'			=> 'contact_icon',
						'default'		=> 'false',
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Toggle Full Screen Icon', 'lahfb-textdomain' ),
						'id'			=> 'full_screen',
						'default'		=> 'false',
					));

				?>

			</div> <!-- end general -->
			
			<!-- contact -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#contact">

				<?php

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Contact Box Title', 'lahfb-textdomain' ),
						'id'			=> 'box_title',
						'default'		=> 'Contact David',
					));

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Email', 'lahfb-textdomain' ),
						'id'			=> 'email',
						'default'		=> 'youremail@yourserver.com',
					));

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Telephone', 'lahfb-textdomain' ),
						'id'			=> 'tel',
						'default'		=> '123 456 789',
					));

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Schedule', 'lahfb-textdomain' ),
						'id'			=> 'schedule',
						'default'		=> 'Office hours are 9 a.m. and 5 p.m. Central time.',
					));

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Address', 'lahfb-textdomain' ),
						'id'			=> 'address',
						'default'		=> 'address',
					));

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Social', 'lahfb-textdomain' ),
						'id'			=> 'social',
						'default'		=> 'false'
					));

					lahfb_textfield( array(
						'title'			=> esc_html__( 'Contact Form Title', 'lahfb-textdomain' ),
						'id'			=> 'form_title',
						'default'		=> 'General form',
					));

					lahfb_contact( array(
						'title'			=> esc_html__( 'Select contact form', 'lahfb-textdomain' ),
						'id'			=> 'contact_form',
					));

				?>

			</div><!-- end #contact -->

			<!-- socials -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#socials">

				<?php

					lahfb_switcher( array(
						'title'			=> esc_html__( 'Socials', 'lahfb-textdomain' ),
						'id'			=> 'socials',
						'default'		=> 'true',
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

			</div> <!-- socials -->


			<!-- styling -->
			<div class="lahfb-tab-panel lahfb-group-panel" data-id="#styling">

				<?php
					lahfb_styling_tab( array(
						'Box' => array(
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
						'Toggle Bar' => array(
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
							array( 'property' => 'background_image' ),
							array( 'property' => 'background_position' ),
							array( 'property' => 'background_repeat' ),
							array( 'property' => 'background_cover' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
						),
						'Toggle Icon Color' => array(
							array( 'property' => 'background_color' ),
							array( 'property' => 'background_color_hover' ),
						),
						'Toggle Icon Box' => array(
							array( 'property' => 'position' ),
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
						'Logo' => array(
							array( 'property' => 'position' ),
							array( 'property' => 'width' ),
							array( 'property' => 'height' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Contact' => array(
							array( 'property' => 'position' ),
							array( 'property' => 'background_color' ),
							array( 'property' => 'margin' ),
							array( 'property' => 'padding' ),
							array( 'property' => 'border' ),
							array( 'property' => 'border_radius' ),
						),
						'Fullscreen' => array(
							array( 'property' => 'position' ),
							array( 'property' => 'background_color' ),
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