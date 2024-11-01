<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPMOZO_Addons_Lite_For_Elementor_Public' ) ) {
	class WPMOZO_Addons_Lite_For_Elementor_Public {

		/**
		 * Initialize required files and funcitons.
		 *
		 * @since    1.0.0
		 */
		public function init() {

			$this->include_files();
		}

		/**
		 * Include file with helper funcitons.
		 *
		 * @since    1.0.0
		 */
		public function include_files() {
			require_once plugin_dir_path( __DIR__ ) . 'includes/wpmozo-helper-functions.php';

		}

		/**
		 * Register the editor styles
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function wpmozo_ale_editor_enqueue_scripts() {

			wp_enqueue_style(
				'wpmozo-icons',
				plugins_url( 'assets/css/wpmozoicon/wpmozoicon.min.css', plugin_dir_path( __FILE__ ) ),
				false,
				WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION
			);
		}

		/**
		 * Register the styles
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function register_frontend_styles() {

			wp_register_style( 'wpmozo-ae-swiper-style', plugins_url( 'assets/css/swiper/swiper.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ae-animate-style', plugins_url( 'assets/css/animate/animate.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ae-font-awesome-style', plugins_url( 'assets/css/font-awesome/font-awesome.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ae-mfp-style', plugins_url( 'assets/css/magnificPopup/magnificPopup.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ae-icons', plugins_url( 'assets/css/wpmozoicon/wpmozoicon.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_enqueue_style(
	            'wpmozo-ae-icons',
	            plugins_url( 'assets/css/wpmozoicon/wpmozoicon.min.css', plugin_dir_path( __FILE__ ) ),
	            false,
		        WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION
	        );
		}

		/**
		 * Register the scripts
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function register_frontend_scripts() {

			wp_register_script( 'wpmozo-ae-isotope', plugins_url( 'assets/js/isotope/isotope.pkgd.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );
			wp_register_script( 'wpmozo-ae-masonry', plugins_url( 'assets/js/masonry/masonry.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );
			wp_register_script( 'wpmozo-ae-magnify', plugins_url( 'assets/js/magnify/magnify.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-popper', plugins_url( 'assets/js/popper/popper.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-tippy', plugins_url( 'assets/js/tippyBundle/tippy-bundle.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-imagesloaded', plugins_url( 'assets/js/imagesLoaded/imagesloaded.pkgd.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-move-event', plugins_url( 'assets/js/jqueryEventMove/jquery_event_move.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-twenty-twenty', plugins_url( 'assets/js/jqueryTwentyTwenty/jquery_twentytwenty.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-mfp', plugins_url( 'assets/js/magnificPopup/magnificPopup.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-swiper', plugins_url( 'assets/js/swiper/swiper.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ae-waypoints', plugins_url( 'assets/js/waypoints/waypoints.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		}

		/**
		 * Add category for widgets.
		 *
		 * @since    1.0.0
		 */
		public function add_elementor_widget_categories( $elements_manager ) {

			$elements_manager->add_category(
				'wpmozo',
				array(
					'title' => esc_html__( 'WPMozo', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'fa fa-plug',
				)
			);
		}

		/**
		 * Register widgets.
		 *
		 * @since    1.0.0
		 */
		public function register_oembed_widget( $widgets_manager ) {

			$plugin_option = get_option( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_OPTION, array() );
			if ( defined( 'WPMOZO_ADDONS_FOR_ELEMENTOR_VERSION' ) && isset( $plugin_option['wpmozo_inactive_widgets'] ) && '' !== $plugin_option['wpmozo_inactive_widgets'] ) {
				$inactive_widgets  	= explode( ',', $plugin_option['wpmozo_inactive_widgets'] );
				$active_widgets 	= array_diff( $this->get_all_widgets(), $inactive_widgets );
			} else {
				$active_widgets = $this->get_all_widgets();
			}
			$this->register_widgets( $active_widgets, $widgets_manager );
		}

		/**
		 * Get all widgets.
		 *
		 * @since    1.0.0
		 */
		private function get_all_widgets() {
			$widgets_path = plugin_dir_path( __DIR__ ) . '/widgets/';
			$widgets      = glob( $widgets_path . '*', GLOB_ONLYDIR );

			if ( ! empty( $widgets ) ) {
				$widgets = array_map( 'basename', $widgets );
				return $widgets;
			}
			return array();
		}

		/**
		 * Register widgets.
		 *
		 * @since    1.0.0
		 */
		private function register_widgets( $widgets, $widgets_manager ) {
			if ( ! empty( $widgets ) ) {
				$widgets_list = array();
				foreach ( $widgets as $widget ) {
					$mod                  = trim( preg_replace( '/[A-Z]([A-Z](?![a-z]))*/', ' $0', $widget ) );
					$key                  = 'WPMOZO_AE_' . ucwords( strtolower( str_replace( '-', '_', $mod ) ) );
					$widgets_list[ $key ] = esc_html( $mod );
				}

				$this->include_widgets( $widgets_list );
				foreach ( $widgets_list as $key => $value ) {
					if ( class_exists( $key ) ) {
						$widgets_manager->register( new $key() );
					}
				}
			}
		}
		/**
		 * Include widget files.
		 *
		 * @since    1.0.0
		 */
		public function include_widgets( $widgets ) {
			foreach ( $widgets as $key => $value ) {
				$widget_path = plugin_dir_path( __DIR__ ) . '/widgets/' . $value . '/' . $value . '.php';
				if ( file_exists( $widget_path ) ) {
					require_once $widget_path;
				}
			}
		}
	}
}
