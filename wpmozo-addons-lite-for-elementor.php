<?php
/**
 * Plugin Name: WPMozo Addons Lite for Elementor
 * Requires Plugins: elementor
 * Plugin URI: https://wpmozo.com
 * Description: A feature-packed plugin designed to complement your Elementor page-building experience with a range of custom widgets to enhance both functionality and design.
 * Version: 1.1.0
 * Author: Elicus
 * Author URI: https://elicus.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wpmozo-addons-lite-for-elementor
 * Domain Path: /languages
 * Requires at least: 5.3
 * Tested up to: 6.6.2
 * Elementor tested up to: 3.23.4
 * Elementor Pro tested up : 3.23.3
 *
 * WPMozo Addons Lite for Elementor - A plugin for WordPress and Elementor.
 * Copyright © 2024 Elicus Technologies Private Limited
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/.>
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_SLUG', 'wpmozo-addons-lite-for-elementor' );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION', '1.1.0' );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME', plugin_basename( __FILE__ ) );
define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_OPTION', 'wpmozo-addons-for-elementor-option' );

if ( ! function_exists( 'wpmozo_addons_lite_for_elementor_activate' ) ) {
	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-wpmozo-addons-lite-for-elementor-activator.php
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function wpmozo_addons_lite_for_elementor_activate() {
		include_once plugin_dir_path( __FILE__ ) . 'includes/class-wpmozo-addons-lite-for-elementor-activator.php';
		WPMOZO_Addons_Lite_For_Elementor_Activator::activate();
	}
	register_activation_hook( __FILE__, 'wpmozo_addons_lite_for_elementor_activate' );
}

if ( ! function_exists( 'wpmozo_addons_lite_for_elementor_admin_notice_missing_elementor' ) ) {
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 */
	function wpmozo_addons_lite_for_elementor_admin_notice_missing_elementor() {
		echo wp_kses_post(
			'
	        <div class="notice notice-warning is-dismissible">
	            <p>' . __( '<strong>WPMozo Addons Lite for Elementor</strong> requires <strong>Elementor</strong> to be installed and activated.', 'wpmozo-addons-lite-for-elementor' ) . '
	            </p>
	        </div>'
		);

		deactivate_plugins( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME );
	}
	// Check for Elementor plugin.
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'wpmozo_addons_lite_for_elementor_admin_notice_missing_elementor' );
		return;
	}
}

if ( ! function_exists( 'wpmozo_addons_lite_for_elementor_admin_notice_minimum_elementor_version' ) ) {
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 */
	function wpmozo_addons_lite_for_elementor_admin_notice_minimum_elementor_version() {
		echo wp_kses_post(
			'
	        <div class="notice notice-warning is-dismissible">
	            <p>' . __( '<strong>WPMozo Addons Lite for Elementor</strong> requires <strong>Elementor</strong> version 2.0 or greater.', 'wpmozo-addons-lite-for-elementor' ) . '
	            </p>
	        </div>'
		);

		deactivate_plugins( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME );
	}
	// Check for required Elementor version.
	if ( ! version_compare( ELEMENTOR_VERSION, '2.0', '>=' ) ) {
		add_action( 'admin_notices', 'wpmozo_addons_lite_for_elementor_admin_notice_minimum_elementor_version' );
		return;
	}
}

if ( ! function_exists( 'wpmozo_addons_lite_for_elementor_admin_notice_minimum_php_version' ) ) {
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 */
	function wpmozo_addons_lite_for_elementor_admin_notice_minimum_php_version() {

		echo wp_kses_post(
			'
	        <div class="notice notice-warning is-dismissible">
	            <p>' . __( '<strong>WPMozo Addons Lite for Elementor</strong> requires <strong>PHP</strong> version 5.6 or greater.', 'wpmozo-addons-lite-for-elementor' ) . '
	            </p>
	        </div>'
		);

		deactivate_plugins( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME );
	}
	// Check for required PHP version.
	if ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
		add_action( 'admin_notices', 'wpmozo_addons_lite_for_elementor_admin_notice_minimum_php_version' );
		return;
	}
}

require_once WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH . 'includes/class-wpmozo-addons-lite-for-elementor.php';

if ( ! function_exists( 'wpmozo_addons_lite_for_elementor' ) ) {
	/**
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 *
	 * @since    1.0.0
	 */
	function wpmozo_addons_lite_for_elementor() {

		$plugin = new WPMOZO_Addons_Lite_For_Elementor();
		$plugin->run();

	}
	wpmozo_addons_lite_for_elementor();
}