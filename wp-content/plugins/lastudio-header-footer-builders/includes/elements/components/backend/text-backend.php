<!-- modal text edit -->
<div class="lahfb-modal-wrap lahfb-modal-edit" data-element-target="text">

    <div class="lahfb-modal-header">
        <h4><?php esc_html_e( 'Text Settings', 'lahfb-textdomain' ); ?></h4>
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

                lahfb_switcher( array(
                    'title'			=> esc_html__( 'Your text is shortcode?', 'lahfb-textdomain' ),
                    'id'			=> 'is_shortcode',
                    'default'		=> 'false',
                ));

                lahfb_textfield( array(
                    'title'			=> esc_html__( 'Text', 'lahfb-textdomain' ),
                    'id'			=> 'text',
                    'default'		=> 'This is a text field',
                    'placeholder'	=> true,
                ));

                lahfb_textfield( array(
                    'title'			=> esc_html__( 'Link (optional)', 'lahfb-textdomain' ),
                    'id'			=> 'link',
                ));

                lahfb_switcher( array(
                    'title'			=> esc_html__( 'Open link in a new tab', 'lahfb-textdomain' ),
                    'id'			=> 'link_new_tab',
                    'default'		=> 'false',
                ));

                lahfb_icon( array(
                    'title'			=> esc_html__( 'Select your desired icon', 'lahfb-textdomain' ),
                    'id'			=> 'icon',
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
                    'Icon' => array(
                        array( 'property' => 'color' ),
                        array( 'property' => 'color_hover' ),
                        array( 'property' => 'font_size' ),
                        array( 'property' => 'font_weight' ),
                        array( 'property' => 'font_style' ),
                        array( 'property' => 'line_height' ),
                        array( 'property' => 'margin' ),
                        array( 'property' => 'padding' ),
                        array( 'property' => 'border' ),
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