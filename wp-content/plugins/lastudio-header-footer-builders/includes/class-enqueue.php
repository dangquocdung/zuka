<?php
/**
 * Header Builder - Enqueue Class.
 *
 * @author  LaStudio
 */

// don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

if ( ! class_exists( 'LAHFB_Enqueue' ) ) :

    class LAHFB_Enqueue {

		/**
		 * Instance of this class.
         *
		 * @since	1.0.0
		 * @access	private
		 * @var		LAHFB_Enqueue
		 */
		private static $instance;

		/**
		 * Provides access to a single instance of a module using the singleton pattern.
		 *
		 * @since	1.0.0
		 * @return	object
		 */
		public static function get_instance() {

			if ( self::$instance === null ) {
				self::$instance = new self();
            }

			return self::$instance;

		}

		/**
		 * Constructor.
		 *
		 * @since	1.0.0
		 */
		public function __construct() {

            // Enqueue editor scripts
            add_action( 'admin_enqueue_scripts',    array( $this, 'editor_scripts'), 0 );

            // Enqueue frontend scripts
            add_action( 'wp_enqueue_scripts',       array( $this, 'frontend_scripts' ) );

            add_action( 'wp_footer', array( $this, 'dynamic_styles') );
		}

        /**
         * Enqueue editor scripts.
         *
         * @since	1.0.0
         */
        public function editor_scripts() {

            if ( LAHFB_Helper::is_backend_builder() ) {
                // admin utilities
                wp_enqueue_media();

                $script_dependencies = array(
                    'jquery',
                    'wp-color-picker',
                    'jquery-ui-sortable',
                    'jquery-ui-droppable',
                );

                // JavaScripts
                wp_register_script( 'lahfb-nicescroll-script', LAHFB_Helper::get_file_uri( 'assets/js/jquery.nicescroll.js' ) , $script_dependencies, null, true );
                wp_enqueue_script( 'lahfb-editor-scripts', LAHFB_Helper::get_file_uri('assets/src/editor/editor.min.js' ), array('lahfb-nicescroll-script'), LAHFB::VERSION, true );

                $header_preset_key = !empty($_GET['prebuild_header']) ? esc_attr($_GET['prebuild_header']) : '';
                $frontend_components = LAHFB_Helper::get_data_frontend_components();

                $localize_data = array(
                    'nonce'                 => wp_create_nonce( 'lahfb-nonce' ),
                    'ajaxurl'               => admin_url( 'admin-ajax.php', 'relative' ),
                    'assets_url'            => LAHFB_Helper::get_file_uri( 'assets/' ),
                    'prebuilds_url'         => LAHFB_Helper::get_file_uri( 'includes/prebuilds/headers/' ),
                    'components'            => LAHFB_Helper::get_components_from_settings($frontend_components),
                    'editor_components'     => LAHFB_Helper::get_backend_editor_components_from_settings($frontend_components),
                    'prebuild_header_key'   => LAHFB_Helper::is_prebuild_header_exists($header_preset_key) ? $header_preset_key : '',
                    'frontend_components'   => $frontend_components,
                    'backend_setting_page'  => admin_url( 'admin.php?page=lastudio_header_builder_setting' ),
                    'i18n'                  => array(
                        'save_text'                 => esc_attr__('Save Changes', 'lahfb-textdomain'),
                        'saved_text'                => esc_attr__('Saved', 'lahfb-textdomain'),
                        'horizontal_header_text'    => esc_attr__('Horizontal Header', 'lahfb-textdomain'),
                        'vertical_header_text'      => esc_attr__('Vertical Header', 'lahfb-textdomain'),
                    )
                );
                wp_localize_script( 'lahfb-editor-scripts', 'lahfb_localize', $localize_data );

                // Styles
                wp_enqueue_style( 'lahfb-editor-styles', LAHFB_Helper::get_file_uri( 'assets/src/editor/css/editor.css' ), LAHFB::VERSION, true );
            }

        }

        /**
         * Enqueue frontend scripts.
         * 
         * @since	1.0.0
         */
        public function frontend_scripts() {

            $localize_data = array(
                'ajax_url'  => admin_url( 'admin-ajax.php' ),
            );

            $asset_url = apply_filters('LAHFB/asset_url', LAHFB::get_url());

            // JavaScripts
            wp_register_script( 'lahfb-jquery-plugins', $asset_url . 'assets/src/frontend/jquery-plugins.js' , array( 'jquery' ), LAHFB::VERSION, true );
            wp_enqueue_script( 'lahfb-frontend-scripts', $asset_url . 'assets/src/frontend/frontend.js', array( 'lahfb-jquery-plugins' ), LAHFB::VERSION, true );
            wp_localize_script( 'lahfb-frontend-scripts', 'lahfb_localize', $localize_data );

            // Styles
            wp_enqueue_style( 'lahfb-frontend-styles', $asset_url . 'assets/src/frontend/header-builder.css' , array(), LAHFB::VERSION );

        }

        public function dynamic_styles(){
            $header_preset_key = !empty($_GET['prebuild_header']) ? esc_attr($_GET['prebuild_header']) : '';
            $dynamic_styles = apply_filters( 'LAHFB/get_dynamic_styles', LAHFB_Helper::get_dynamic_styles(LAHFB_Helper::is_prebuild_header_exists($header_preset_key) ? $header_preset_key : '') );
            printf('<style id="lahfb-frontend-styles-inline-css">%s</style>', $dynamic_styles);
        }

    }

endif;
