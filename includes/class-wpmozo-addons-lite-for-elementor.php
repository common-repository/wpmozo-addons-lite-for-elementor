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

if ( ! class_exists( 'WPMOZO_Addons_Lite_For_Elementor' ) ) {
	class WPMOZO_Addons_Lite_For_Elementor {

		/**
		 * The loader that's responsible for maintaining and registering all hooks that power
		 * the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      Object    $loader    Maintains and registers all hooks for the plugin.
		 */
		private $loader;

		/**
		 * The unique identifier of this plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
		 */
		protected $plugin_name = WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_SLUG;

		/**
		 * The current version of the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string    $version    The current version of the plugin.
		 */
		protected $plugin_version = WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION;

		/**
		 * Plugin option name.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string    $plugin_option    The plugin option name where all the settings are stored.
		 */
		protected $plugin_option = WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_OPTION;

		/**
		 * Define the core functionality of the plugin.
		 *
		 * Set the plugin name and the plugin version that can be used throughout the plugin.
		 * Load the dependencies, define the locale, and set the hooks for the admin area and
		 * the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {

			$this->load_dependencies();
			$this->set_locale();
			$this->define_admin_hooks();
			$this->define_public_hooks();
		}

		/**
		 * Load the required dependencies for this plugin.
		 *
		 * Include the following files that make up the plugin:
		 *
		 * - WPMOZO_Addons_Lite_For_Elementor_Loader. Orchestrates the hooks of the plugin.
		 * - WPMOZO_Addons_Lite_For_Elementor_i18n. Defines internationalization functionality.
		 * - WPMOZO_Addons_Lite_For_Elementor_Admin. Defines all hooks for the admin area.
		 * - WPMOZO_Addons_Lite_For_Elementor_Public. Defines all hooks for the public side of the site.
		 *
		 * Create an instance of the loader which will be used to register the hooks
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function load_dependencies() {

			/**
			 * The class responsible for orchestrating the actions and filters of the
			 * core plugin.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wpmozo-addons-lite-for-elementor-loader.php';

			/**
			 * The class responsible for defining internationalization functionality
			 * of the plugin.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wpmozo-addons-lite-for-elementor-i18n.php';
			/**
			 * The class responsible for defining all actions that occur in the admin area.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wpmozo-addons-lite-for-elementor-admin.php';

			/**
			 * The class responsible for defining all actions that occur in the public-facing side of the site.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wpmozo-addons-lite-for-elementor-public.php';

			$this->loader = new WPMOZO_Addons_Lite_For_Elementor_Loader();
		}

		/**
		 * Define the locale for this plugin for internationalization.
		 *
		 * Uses the WPMOZO_Addons_Lite_For_Elementor_i18n class in order to set the domain and to register the hook
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function set_locale() {

			$plugin_i18n = new WPMOZO_Addons_Lite_For_Elementor_I18n();

			$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
		}

		/**
		 * Register all of the hooks related to the admin area functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_admin_hooks() {
			global $wp_version;

			$plugin_admin = new WPMOZO_Addons_Lite_For_Elementor_Admin();

			$this->loader->add_action( 'wp_loaded', $plugin_admin, 'wp_loaded' );
			$this->loader->add_action( 'init', $plugin_admin, 'wpmozo_register_post_types' );
			$this->loader->add_action( 'init', $plugin_admin, 'wpmozo_register_taxonomies' );
			$this->loader->add_action( 'save_post', $plugin_admin, 'wpmozo_save_team_member_meta_fields' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
			if ( ! $plugin_admin->wpmozo_is_team_disabled() ) {
				// Hook to add meta box.
				$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'wpmozo_add_team_member_metabox' );
				// Hook to save meta box data.
				$this->loader->add_action( 'save_post', $plugin_admin, 'wpmozo_save_team_member_meta_fields' );
			}
		}

		/**
		 * Register all of the hooks related to the public-facing functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_public_hooks() {

			$plugin_public = new WPMOZO_Addons_Lite_For_Elementor_Public();
			$this->loader->add_action( 'elementor/init', $plugin_public, 'init' );
			$this->loader->add_action( 'elementor/elements/categories_registered', $plugin_public, 'add_elementor_widget_categories', 99 );
			$this->loader->add_action( 'elementor/widgets/register', $plugin_public, 'register_oembed_widget', 99 );
			$this->loader->add_action( 'elementor/frontend/after_register_styles', $plugin_public, 'register_frontend_styles' );
			$this->loader->add_action( 'elementor/frontend/after_register_scripts', $plugin_public, 'register_frontend_scripts' );
			$this->loader->add_action( 'elementor/editor/before_enqueue_scripts', $plugin_public, 'wpmozo_ale_editor_enqueue_scripts' );
		}

		/**
		 * Run the loader to execute all of the hooks with WordPress.
		 *
		 * @since    1.0.0
		 */
		public function run() {
			$this->loader->run();
		}

		/**
		 * The name of the plugin used to uniquely identify it within the context of
		 * WordPress and to define internationalization functionality.
		 *
		 * @since     1.0.0
		 * @return    string    The name of the plugin.
		 */
		public function get_plugin_name() {
			return $this->plugin_name;
		}

		/**
		 * The reference to the class that orchestrates the hooks with the plugin.
		 *
		 * @since     1.0.0
		 * @return    WPMOZO_PRODUCT_GRID_For_Elementor_Loader    Orchestrates the hooks of the plugin.
		 */
		public function get_loader() {
			return $this->loader;
		}

		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @since     1.0.0
		 * @return    string    The version number of the plugin.
		 */
		public function get_plugin_version() {
			return $this->plugin_version;
		}

		/**
		 * Retrieve the option name of the plugin.
		 *
		 * @since     1.0.0
		 * @return    string    The option name of the plugin.
		 */
		public function get_plugin_option() {
			return $this->plugin_option;
		}
	}
}
