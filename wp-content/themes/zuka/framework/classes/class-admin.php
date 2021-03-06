<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class Zuka_Admin {

    public function __construct(){
        $this->init_page_options();
        $this->init_meta_box();

        add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts') );
        add_action( 'customize_register', array( $this, 'override_customize_control') );
        new Zuka_MegaMenu_Init();
        add_filter('lastudio/filter/framework/field/icon/json', array( $this, 'add_icon_to_fw'));
    }

    public function admin_scripts(){
        wp_enqueue_style('zuka-admin-css', Zuka::$template_dir_url. '/assets/admin/css/admin.css');
        wp_enqueue_script('zuka-admin-theme', Zuka::$template_dir_url . '/assets/admin/js/admin.js', array( 'jquery'), false, true );
        $asset_font_without_domain = apply_filters('zuka/filter/assets_font_url', zuka_get_relative_url(untrailingslashit(get_template_directory_uri())));
        wp_add_inline_style(
            "zuka-admin-css",
            "@font-face{
                font-family: 'dl-icon';
                src: url('{$asset_font_without_domain}/assets/fonts/dl-icon.eot');
                src: url('{$asset_font_without_domain}/assets/fonts/dl-icon.eot') format('embedded-opentype'),
                     url('{$asset_font_without_domain}/assets/fonts/dl-icon.woff') format('woff'),
                     url('{$asset_font_without_domain}/assets/fonts/dl-icon.ttf') format('truetype'),
                     url('{$asset_font_without_domain}/assets/fonts/dl-icon.svg') format('svg');
                font-weight:normal;
                font-style:normal
            }"
        );
    }

    public function add_icon_to_fw( $icon_path ) {
        $icon_path[] = Zuka::$template_dir_path . '/assets/fonts/dl-icon.json';
        return $icon_path;
    }

    private function init_page_options(){
        $options = !empty(Zuka()->options()->sections) ? Zuka()->options()->sections : array();
        if(class_exists('LaStudio_Theme_Options') && !empty($options)) {
            $settings = array(
                'menu_title' => esc_html_x('Theme Options', 'admin-view', 'zuka'),
                'menu_type' => 'theme',
                'menu_slug' => 'theme_options',
                'ajax_save' => false,
                'show_reset_all' => true,
                'disable_header' => false,
                'framework_title' => esc_html_x('Zuka', 'admin-view', 'zuka')
            );
            LaStudio_Theme_Options::instance( $settings, $options, Zuka::get_option_name());
        }
        if(class_exists('LaStudio_Theme_Customize') && function_exists('la_convert_option_to_customize')){
            if(!empty($options)){
                $customize_options = la_convert_option_to_customize($options);
                LaStudio_Theme_Customize::instance( $customize_options, Zuka::get_option_name());
            }
        }
    }

    private function init_meta_box(){


        $default_metabox_opts = !empty(Zuka()->options()->metabox_sections) ? Zuka()->options()->metabox_sections : array();

        if(!class_exists('LaStudio_Metabox') || empty($default_metabox_opts)){
            return;
        }

        $metaboxes = array();
        $taxonomy_metaboxes = array();

        /**
         * Pages
         */
        $metaboxes[] = array(
            'id'        => Zuka::get_original_option_name(),
            'title'     => esc_html_x('Page Options', 'admin-view', 'zuka'),
            'post_type' => 'page',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Zuka()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional',
                'fullpage'
            ))
        );

        /**
         * Post
         */
        $metaboxes[] = array(
            'id'        => Zuka::get_original_option_name(),
            'title'     => esc_html_x('Post Options', 'admin-view', 'zuka'),
            'post_type' => 'post',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Zuka()->options()->get_metabox_by_sections(array(
                'post',
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Product
         */
        $metaboxes[] = array(
            'id'        => Zuka::get_original_option_name(),
            'title'     => esc_html_x('Product View Options', 'admin-view', 'zuka'),
            'post_type' => 'product',
            'context'   => 'normal',
            'priority'  => 'default',
            'sections'  => Zuka()->options()->get_metabox_by_sections(array(
                'product',
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Portfolio
         */
        $metaboxes[] = array(
            'id'        => Zuka::get_original_option_name(),
            'title'     => esc_html_x('Portfolio Options', 'admin-view', 'zuka'),
            'post_type' => 'la_portfolio',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Zuka()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Testimonial
         */
        $metaboxes[] = array(
            'id'        => Zuka::get_original_option_name(),
            'title'     => esc_html_x('Testimonial Information', 'admin-view', 'zuka'),
            'post_type' => 'la_testimonial',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Zuka()->options()->get_metabox_by_sections(array(
                'testimonial'
            ))
        );

        /**
         * Member
         */
        $metaboxes[] = array(
            'id'        => Zuka::get_original_option_name(),
            'title'     => esc_html_x('Page Options', 'admin-view', 'zuka'),
            'post_type' => 'la_team_member',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Zuka()->options()->get_metabox_by_sections(array(
                'member',
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Product Category
         */
        $taxonomy_metaboxes[] = array(
            'id'        => Zuka::get_original_option_name(),
            'title'     => esc_html_x('Product Category Options', 'admin-view', 'zuka'),
            'taxonomy' => 'product_cat',
            'sections'  => Zuka()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Category
         */
        $taxonomy_metaboxes[] = array(
            'id'        => Zuka::get_original_option_name(),
            'title'     => esc_html_x('Category Options', 'admin-view', 'zuka'),
            'taxonomy' => 'category',
            'sections'  => Zuka()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        /**
         * Playlist
         */
        $metaboxes[] = array(
            'id'        => Zuka::get_original_option_name(),
            'title'     => esc_html_x('Page Options', 'admin-view', 'zuka'),
            'post_type' => 'lpm_playlist',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Zuka()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        LaStudio_Metabox::instance($metaboxes);
        LaStudio_Taxonomy::instance($taxonomy_metaboxes);
    }

    private function init_shortcode_manager(){
        if(class_exists('LaStudio_Shortcode_Manager')){
            $options       = array();
            $options[]     = array(
                'title'      => esc_html_x('La Shortcodes', 'admin-view', 'zuka'),
                'shortcodes' => array(
                    array(
                        'name'      => 'la_text',
                        'title'     => esc_html_x('Custom Text', 'admin-view', 'zuka'),
                        'fields'    => array(
                            array(
                                'id'    => 'color',
                                'type'  => 'color_picker',
                                'title' => esc_html_x('Color', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'        => 'font_size',
                                'type'      => 'responsive',
                                'title'     => esc_html_x('Font Size', 'admin-view', 'zuka'),
                                'desc'      => esc_html_x('Enter the font size (ie 20px )', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'        => 'line_height',
                                'type'      => 'responsive',
                                'title'     => esc_html_x('Line Height', 'admin-view', 'zuka'),
                                'desc'      => esc_html_x('Enter the line height (ie 20px )', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'    => 'el_class',
                                'type'  => 'text',
                                'title' => esc_html_x('Extra Class Name', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'    => 'content',
                                'type'  => 'textarea',
                                'title' => esc_html_x('Content', 'admin-view', 'zuka')
                            )
                        )
                    ),
                    array(
                        'name'      => 'la_btn',
                        'title'     => esc_html_x('Button', 'admin-view', 'zuka'),
                        'fields'    => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => esc_html_x('Text', 'admin-view', 'zuka'),
                                'default' => esc_html_x('Text on the button', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'        => 'link',
                                'type'      => 'fieldset',
                                'title'     => esc_html_x('URL (Link)', 'admin-view', 'zuka'),
                                'desc'      => esc_html_x('Add link to button.', 'admin-view', 'zuka'),
                                'before'    => '<div data-parent-atts="1" data-atts="link" data-atts-separator="|">',
                                'after'     => '</div>',
                                'fields'    => array(
                                    array(
                                        'id'    => 'url',
                                        'type'  => 'text',
                                        'title' => esc_html_x('URL', 'admin-view', 'zuka'),
                                        'default' => '#',
                                        'attributes' => array(
                                            'data-child-atts' => 'url'
                                        )
                                    ),
                                    array(
                                        'id'    => 'title',
                                        'type'  => 'text',
                                        'title' => esc_html_x('Link Text', 'admin-view', 'zuka'),
                                        'attributes' => array(
                                            'data-child-atts' => 'title'
                                        )
                                    ),
                                    array(
                                        'id'        => 'target',
                                        'type'      => 'radio',
                                        'default'   => '_self',
                                        'class'     => 'la-radio-style',
                                        'title'     => esc_html_x('Open link in a new tab', 'admin-view', 'zuka'),
                                        'options'   => array(
                                            '_self' => esc_html_x('No', 'admin-view', 'zuka'),
                                            '_blank' => esc_html_x('Yes', 'admin-view', 'zuka')
                                        ),
                                        'attributes' => array(
                                            'data-child-atts' => 'target',
                                            'data-check' => 'yes'
                                        )
                                    ),
                                ),
                            ),

                            array(
                                'id'    => 'style',
                                'type'  => 'select',
                                'title' => esc_html_x('Style', 'admin-view', 'zuka'),
                                'desc'  => esc_html_x('Select button display style.', 'admin-view', 'zuka'),
                                'options'        => array(
                                    'flat'          => esc_html_x('Flat', 'admin-view', 'zuka'),
                                    'outline'       => esc_html_x('Outline', 'admin-view', 'zuka'),
                                ),
                                'default' => 'flat'
                            ),
                            array(
                                'id'    => 'border_width',
                                'type'  => 'select',
                                'title' => esc_html_x('Border width', 'admin-view', 'zuka'),
                                'desc'  => esc_html_x('Select border width.', 'admin-view', 'zuka'),
                                'options'        => array(
                                    '0'       => esc_html_x('None', 'admin-view', 'zuka'),
                                    '1'       => esc_html_x('1px', 'admin-view', 'zuka'),
                                    '2'       => esc_html_x('2px', 'admin-view', 'zuka'),
                                    '3'       => esc_html_x('3px', 'admin-view', 'zuka')
                                ),
                                'default' => 'square'
                            ),
                            array(
                                'id'    => 'shape',
                                'type'  => 'select',
                                'title' => esc_html_x('Shape', 'admin-view', 'zuka'),
                                'desc'  => esc_html_x('Select button shape.', 'admin-view', 'zuka'),
                                'options'        => array(
                                    'rounded'   => esc_html_x('Rounded', 'admin-view', 'zuka'),
                                    'square'    => esc_html_x('Square', 'admin-view', 'zuka'),
                                    'round'     => esc_html_x('Round', 'admin-view', 'zuka')
                                ),
                                'default' => 'square'
                            ),
                            array(
                                'id'    => 'color',
                                'type'  => 'select',
                                'title' => esc_html_x('Color', 'admin-view', 'zuka'),
                                'desc'  => esc_html_x('Select button color.', 'admin-view', 'zuka'),
                                'options'        => array(
                                    'black'      => esc_html_x('Black', 'admin-view', 'zuka'),
                                    'primary'    => esc_html_x('Primary', 'admin-view', 'zuka'),
                                    'white'      => esc_html_x('White', 'admin-view', 'zuka'),
                                    'white2'     => esc_html_x('White2', 'admin-view', 'zuka'),
                                    'gray'       => esc_html_x('Gray', 'admin-view', 'zuka'),
                                ),
                                'default' => 'black'
                            ),
                            array(
                                'id'    => 'size',
                                'type'  => 'select',
                                'title' => esc_html_x('Size', 'admin-view', 'zuka'),
                                'desc'  => esc_html_x('Select button display size.', 'admin-view', 'zuka'),
                                'options'        => array(
                                    'md'    => esc_html_x('Normal', 'admin-view', 'zuka'),
                                    'lg'    => esc_html_x('Large', 'admin-view', 'zuka'),
                                    'sm'    => esc_html_x('Small', 'admin-view', 'zuka'),
                                    'xs'    => esc_html_x('Mini', 'admin-view', 'zuka')
                                ),
                                'default' => 'md'
                            ),
                            array(
                                'id'    => 'align',
                                'type'  => 'select',
                                'title' => esc_html_x('Alignment', 'admin-view', 'zuka'),
                                'desc'  => esc_html_x('Select button alignment.', 'admin-view', 'zuka'),
                                'options'        => array(
                                    'inline'    => esc_html_x('Inline', 'admin-view', 'zuka'),
                                    'left'      => esc_html_x('Left', 'admin-view', 'zuka'),
                                    'right'     => esc_html_x('Right', 'admin-view', 'zuka'),
                                    'center'    => esc_html_x('Center', 'admin-view', 'zuka')
                                ),
                                'default' => 'left'
                            ),
                            array(
                                'id'    => 'el_class',
                                'type'  => 'text',
                                'title' => esc_html_x('Extra Class Name', 'admin-view', 'zuka'),
                                'desc' => esc_html_x('Style particular content element differently - add a class name and refer to it in custom CSS.', 'admin-view', 'zuka')
                            )
                        )
                    ),
                    array(
                        'name'      => 'la_dropcap',
                        'title'     => esc_html_x('DropCap', 'admin-view', 'zuka'),
                        'fields'    => array(
                            array(
                                'id'    => 'style',
                                'type'  => 'select',
                                'title' => esc_html_x('Design', 'admin-view', 'zuka'),
                                'options'        => array(
                                    '1'          => esc_html_x('Style 1', 'admin-view', 'zuka')
                                )
                            ),
                            array(
                                'id'    => 'color',
                                'type'  => 'color_picker',
                                'title' => esc_html_x('Text Color', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'    => 'content',
                                'type'  => 'text',
                                'title' => esc_html_x('Content', 'admin-view', 'zuka')
                            )
                        )
                    ),
                    array(
                        'name'      => 'la_quote',
                        'title'     => esc_html_x('Custom Quote', 'admin-view', 'zuka'),
                        'fields'    => array(
                            array(
                                'id'    => 'style',
                                'type'  => 'select',
                                'title' => esc_html_x('Design', 'admin-view', 'zuka'),
                                'options'        => array(
                                    '1'          => esc_html_x('Style 1', 'admin-view', 'zuka'),
                                    '2'          => esc_html_x('Style 2', 'admin-view', 'zuka'),
                                    '3'          => esc_html_x('Style 3', 'admin-view', 'zuka')
                                )
                            ),
                            array(
                                'id'    => 'author',
                                'type'  => 'text',
                                'title' => esc_html_x('Source Name', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'    => 'link',
                                'type'  => 'text',
                                'title' => esc_html_x('Source Link', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'    => 'content',
                                'type'  => 'textarea',
                                'title' => esc_html_x('Content', 'admin-view', 'zuka')
                            )
                        )
                    ),
                    array(
                        'name'          => 'la_icon_list',
                        'title'         => esc_html_x('Icon List', 'admin-view', 'zuka'),
                        'view'          => 'clone',
                        'clone_id'      => 'la_icon_list_item',
                        'clone_title'   => esc_html_x('Add New', 'admin-view', 'zuka'),
                        'fields'        => array(
                            array(
                                'id'        => 'el_class',
                                'type'      => 'text',
                                'title'     => esc_html_x('Extra Class', 'admin-view', 'zuka'),
                                'desc'      => esc_html_x('Style particular content element differently - add a class name and refer to it in custom CSS.', 'admin-view', 'zuka'),
                            )
                        ),
                        'clone_fields'  => array(
                            array(
                                'id'        => 'icon',
                                'type'      => 'icon',
                                'default'   => 'fa fa-check',
                                'title'     => esc_html_x('Icon', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'        => 'icon_color',
                                'type'      => 'color_picker',
                                'title'     => esc_html_x('Icon Color', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'        => 'content',
                                'type'      => 'textarea',
                                'title'     => esc_html_x('Content', 'admin-view', 'zuka')
                            ),
                            array(
                                'id'        => 'el_class',
                                'type'      => 'text',
                                'title'     => esc_html_x('Extra Class', 'admin-view', 'zuka'),
                                'desc'     => esc_html_x('Style particular content element differently - add a class name and refer to it in custom CSS.', 'admin-view', 'zuka'),
                            )
                        )
                    ),
                )
            );
            LaStudio_Shortcode_Manager::instance( $options );
        }
    }

    public function override_customize_control( $wp_customize ) {
        $wp_customize->remove_section('colors');
        $wp_customize->remove_section('header_image');
        $wp_customize->remove_section('background_image');
    }

}