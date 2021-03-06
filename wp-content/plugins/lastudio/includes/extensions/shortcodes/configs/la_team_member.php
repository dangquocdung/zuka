<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


$shortcode_params = array(
    array(
        'type' => 'dropdown',
        'heading' => __('Design','lastudio'),
        'param_name' => 'style',
        'value' => array(
            __('Style 01','lastudio') => '1',
            __('Style 02','lastudio') => '2',
            __('Style 03','lastudio') => '3',
            __('Style 04','lastudio') => '4',
            __('Style 05','lastudio') => '5',
            __('Style 06','lastudio') => '6',
            __('Style 07','lastudio') => '7'
        ),
        'std' => '1'
    ),
    array(
        'type'       => 'autocomplete',
        'heading'    => __( 'Choose member', 'lastudio' ),
        'param_name' => 'ids',
        'settings'   => array(
            'unique_values'  => true,
            'multiple'       => true,
            'sortable'       => true,
            'groups'         => false,
            'min_length'     => 1,
            'auto_focus'     => true,
            'display_inline' => true
        ),
    ),
    array(
        'type' => 'la_number',
        'heading' => __('Total items', 'lastudio'),
        'description' => __('Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'lastudio'),
        'param_name' => 'per_page',
        'value' => 4,
        'min' => -1,
        'max' => 1000
    ),
    LaStudio_Shortcodes_Helper::fieldColumn(array(
        'heading' 		=> __('Items to show', 'lastudio')
    )),
    LaStudio_Shortcodes_Helper::getParamItemSpace(array(
        'std' => 'default'
    )),
    array(
        'type'       => 'checkbox',
        'heading'    => __('Enable slider', 'lastudio' ),
        'param_name' => 'enable_carousel',
        'value'      => array( __( 'Yes', 'lastudio' ) => 'yes' )
    ),
    array(
        'type' => 'dropdown',
        'heading' => __('Image Height Mode','lastudio'),
        'param_name' => 'height_mode',
        'value' => array(
            __('1:1','lastudio') => '1-1',
            __('Original','lastudio') => 'original',
            __('4:3','lastudio') => '4-3',
            __('3:4','lastudio') => '3-4',
            __('16:9','lastudio') => '16-9',
            __('9:16','lastudio') => '9-16',
            __('Custom','lastudio') => 'custom',
        ),
        'std' => 'original',
        'description' => __('Sizing proportions for height and width. Select "Original" to scale image without cropping.', 'lastudio'),
    ),
    array(
        'type' 			=> 'textfield',
        'heading' 		=> __('Height', 'lastudio'),
        'param_name' 	=> 'height',
        'value'			=> '',
        'description' 	=> __('Enter custom height.', 'lastudio'),
        'dependency' => array(
            'element'   => 'height_mode',
            'value'     => array('custom')
        )
    ),
    LaStudio_Shortcodes_Helper::fieldImageSize(),
    LaStudio_Shortcodes_Helper::fieldElementID(array(
        'param_name' 	=> 'el_id'
    )),
    LaStudio_Shortcodes_Helper::fieldExtraClass()
);


$carousel = LaStudio_Shortcodes_Helper::paramCarouselShortCode(false);
$slides_column_idx = LaStudio_Shortcodes_Helper::getParamIndex( $carousel, 'slides_column');
if($slides_column_idx){
    unset($carousel[$slides_column_idx]);
}

$shortcode_params = array_merge( $shortcode_params, $carousel);

return apply_filters(
    'LaStudio/shortcodes/configs',
    array(
        'name'			=> __('Team Member', 'lastudio'),
        'base'			=> 'la_team_member',
        'icon'          => 'la-wpb-icon la_team_member',
        'category'  	=> __('La Studio', 'lastudio'),
        'description' 	=> __('Display the team member','lastudio'),
        'params' 		=> $shortcode_params
    ),
    'la_team_member'
);