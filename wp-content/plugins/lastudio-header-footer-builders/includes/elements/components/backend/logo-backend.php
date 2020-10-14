<!-- modal logo edit -->
<div class="lahfb-modal-wrap lahfb-modal-edit" data-element-target="logo">

    <div class="lahfb-modal-header">
        <h4><?php esc_html_e( 'Logo Settings', 'lahfb-textdomain' ); ?></h4>
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

                lahfb_select( array(
                    'title'			=> esc_html__( 'Type', 'lahfb-textdomain' ),
                    'id'			=> 'type',
                    'default'		=> 'image',
                    'options'		=> array(
                        'image'	=> esc_html__( 'Image', 'lahfb-textdomain' ),
                        'text'	=> esc_html__( 'Text', 'lahfb-textdomain' ),
                    ),
                    'dependency'	=> array(
                        'image'	=> array( 'logo', 'transparent_logo' ),
                        'text'  => array( 'logo_text' ),
                    ),
                ));

                lahfb_image( array(
                    'title'			=> esc_html__( 'Logo', 'lahfb-textdomain' ),
                    'id'			=> 'logo',
                    'placeholder'	=> true,
                ));

                lahfb_image( array(
                    'title'			=> esc_html__( 'Transparent Logo', 'lahfb-textdomain' ),
                    'id'			=> 'transparent_logo',
                ));

                lahfb_textfield( array(
                    'title'			=> esc_html__( 'Logo Text', 'lahfb-textdomain' ),
                    'id'			=> 'logo_text',
                ));

                ?>

            </div> <!-- end general -->

            <!-- styling -->
            <div class="lahfb-tab-panel lahfb-group-panel" data-id="#styling">


                <?php
                lahfb_styling_tab( array(
                    'Logo' => array(
                        array( 'property' => 'width' ),
                        array( 'property' => 'height' ),
                        array( 'property' => 'background_color' ),
                        array( 'property' => 'margin' ),
                        array( 'property' => 'padding' ),
                        array( 'property' => 'border' ),
                        array( 'property' => 'border_radius' ),
                        array( 'property' => 'box_shadow' ),
                    ),
                    'Transparent Logo' => array(
                        array( 'property' => 'width' ),
                        array( 'property' => 'height' ),
                        array( 'property' => 'margin' ),
                        array( 'property' => 'padding' ),
                        array( 'property' => 'border' ),
                        array( 'property' => 'border_radius' ),
                    ),
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