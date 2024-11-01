<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;

if ( ! class_exists( 'WPMOZO_AE_Fancy_Text' ) ) {
	class WPMOZO_AE_Fancy_Text extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_fancy_text';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Fancy Text', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-fancy-text wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'wpmozo' );
		}

		/**
		 * Define Dependencies.
		 *
		 * Define the CSS files required to run the widget.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-fancytext-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-fancytext-style' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function register_controls() {

			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'fancy-text/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function render() {

			$settings = $this->get_settings_for_display();

			$this->add_render_attribute( 'wrapper', 'class', esc_attr( $settings[ 'text_style' ] ) );
			$this->add_render_attribute( 'wrapper', 'id', esc_attr( $settings[ 'text_style' ] . '-' . $this->get_id() ) );
			$this->add_render_attribute( 'text-wrapper', 'class', 'wpmozo_ae_text_wrapper' );
			$this->add_render_attribute( 'inner-text-wrapper', 'class', array( 'wpmozo_ae_text_wrapper_inner', esc_attr( $settings[ 'text_style' ] ) . '_text' ) );

			if ( isset( $settings[ 'clip_image' ][ 'url' ] ) ) {
				$this->add_render_attribute( 'image', 'style', 'background-image: url( ' . $settings[ 'clip_image' ][ 'url' ] . ' );' );
			}

			if ( 'none' !== $settings[ 'clip_overlay' ] ) {
				?>
				<style type="text/css">
					#wpmozo_ae_clipping-<?php echo wp_kses_post( $this->get_id() ); ?> .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner::before,
					#wpmozo_ae_clipping-<?php echo wp_kses_post( $this->get_id() ); ?> .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner::after {
						content: "";
					}
				</style>
				<?php
			}
			?>
				<div <?php $this->print_render_attribute_string( 'wrapper' ); ?> >
					<div <?php $this->print_render_attribute_string( 'text-wrapper' ); ?> >
						<div <?php $this->print_render_attribute_string( 'inner-text-wrapper' ); ?> <?php $this->print_render_attribute_string( 'image' ); ?> >
							<?php echo esc_textarea( $this->parse_text_editor( $settings[ 'fancy_text' ] ) ); ?>
						</div>
					</div>
				</div>
			<?php

		}
	}
}