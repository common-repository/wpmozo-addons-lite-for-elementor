<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

/** If this file is called directly, abort. **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;

if ( ! class_exists( 'WPMOZO_AE_Fancy_Heading' ) ) {
	class WPMOZO_AE_Fancy_Heading extends Widget_Base {

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
			return 'wpmozo_ae_fancy_heading';
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
			return esc_html__( 'Fancy Heading', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-fancy-heading wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-fancyheading-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			return array( 'wpmozo-ae-fancyheading-style' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'fancy-heading/assets/controls/controls.php';
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

			$pre_heading          = '' !== $settings[ 'pre_heading' ] ? $settings[ 'pre_heading' ] : '';
			$heading              = '' !== $settings[ 'heading' ] ? $settings[ 'heading' ] : '';
			$post_heading         = '' !== $settings[ 'post_heading' ] ? $settings[ 'post_heading' ] : '';
			$display_inline       = $settings[ 'display_inline' ];
			$global_heading_level = $settings[ 'global_heading_level' ];
			$display_inline       = $settings[ 'display_inline' ];

			$this->add_render_attribute( 'heading_wrapper', 'class', 'wpmozo_ae_text_wrapper' );
			$this->add_render_attribute( 'heading_wrapper_inner', 'class', 'wpmozo_ae_text_wrapper_inner' );
			$this->add_render_attribute( 'pre_text_wrapper', 'class', 'wpmozo_ae_pre_text_wrapper' );
			$this->add_render_attribute( 'main_text_wrapper', 'class', 'wpmozo_ae_main_text_wrapper' );
			$this->add_render_attribute( 'post_text_wrapper', 'class', 'wpmozo_ae_post_text_wrapper' );

			$this->add_inline_editing_attributes( 'pre_heading', 'none' );
			$this->add_render_attribute( 'pre_heading', 'class', 'wpmozo_ae_pre_text' );

			$this->add_inline_editing_attributes( 'heading', 'none' );
			$this->add_render_attribute( 'heading', 'class', 'wpmozo_ae_main_text' );

			$this->add_inline_editing_attributes( 'post_heading', 'none' );
			$this->add_render_attribute( 'post_heading', 'class', 'wpmozo_ae_post_text' );

			$this->add_render_attribute( 'text_wrapper', 'class', 'wpmozo_ae_global_text_wrapper' );

			if ( '' !== $pre_heading ) {
				$pre_heading = '<span ' . $this->get_render_attribute_string( 'pre_heading' ) . '>' . $pre_heading . '</span>';
			}

			if ( '' !== $heading ) {
				$heading = '<span ' . $this->get_render_attribute_string( 'heading' ) . '>' . $heading . '</span>';
			}

			if ( '' !== $post_heading ) {
				$post_heading = '<span ' . $this->get_render_attribute_string( 'post_heading' ) . '>' . $post_heading . '</span>';
			}

			?>
			<div <?php $this->print_render_attribute_string( 'heading_wrapper' ); ?> >
				<<?php echo esc_html( ( '' !== $global_heading_level ? $global_heading_level : 'h2' ) ); ?> <?php $this->print_render_attribute_string( 'heading_wrapper_inner' ); ?> >
					<?php echo wp_kses_post( $pre_heading ); ?>
					<?php echo wp_kses_post( $heading ); ?>
					<?php echo wp_kses_post( $post_heading ); ?>
				</<?php echo esc_html( ( '' !== $global_heading_level ? $global_heading_level : 'h2' ) ); ?>>
			</div>
			<?php
		}
	}
}