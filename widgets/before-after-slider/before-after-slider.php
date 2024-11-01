<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Control_Media;

if ( ! class_exists( 'WPMOZO_AE_Before_After_Slider' ) ) {
	class WPMOZO_AE_Before_After_Slider extends Widget_Base {

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
			return 'wpmozo_ae_before_after_slider';
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
			return esc_html__( 'Before After Slider', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-before-after-slider wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-before-after-slider-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-before-after-slider-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			return array( 'wpmozo-ae-twenty-twenty', 'wpmozo-ae-move-event' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'before-after-slider/assets/controls/controls.php';
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

			// Before image.
			if ( ! empty( $settings[ 'before_state_image' ][ 'url' ] ) ) {
				$before_image           = $settings[ 'before_state_image' ];
				$before_image_attach_id = $before_image[ 'id' ];
				$before_img_url         = ( 'default-image-id' !== $before_image_attach_id ) ? wp_get_attachment_image_src( $before_image_attach_id, 'full' )[ 0 ] : $before_image[ 'url' ];

				$this->add_render_attribute( 
					'before_image',
					array( 
						'src'   => $before_img_url,
						'class' => array( 'wpmozo-ale-before-state-image' ),
						'title' => Control_Media::get_image_title( $before_image ),
						'alt'   => Control_Media::get_image_alt( $before_image ),
					 )
				 );
			}

			// After image.
			if ( ! empty( $settings[ 'after_state_image' ][ 'url' ] ) ) {
				$after_image           = $settings[ 'after_state_image' ];
				$after_image_attach_id = $after_image[ 'id' ];
				$after_img_url         = ( 'default-image-id' !== $after_image_attach_id ) ? wp_get_attachment_image_src( $after_image_attach_id, 'full' )[ 0 ] : $after_image[ 'url' ];

				$this->add_render_attribute( 
					'after_image',
					array( 
						'src'   => $after_img_url,
						'class' => array( 'wpmozo-ale-after-state-image' ),
						'title' => Control_Media::get_image_title( $after_image ),
						'alt'   => Control_Media::get_image_alt( $after_image ),
					 )
				 );
			}

			$offset               = ( '' !== $settings[ 'handle_position_slider' ] ) ? ( $settings[ 'handle_position_slider' ][ 'size' ] ) : 0.5;
			$orientation          = ( '' !== $settings[ 'slider_orientation_select' ] ) ? $settings[ 'slider_orientation_select' ] : 'horizontal';
			$move_slider_on_hover = ( 'yes' === $settings[ 'move_handle_on_hover_switcher' ] ) ? true : false;
			$click_to_move        = ( 'yes' === $settings[ 'move_handle_on_click_switcher' ] && ! $move_slider_on_hover ) ? true : false;
			$order_class          = 'elementor-element-' . $this->get_id();

			if ( 'yes' === $settings[ 'before_label_show_switcher' ] ) {
				$before_label = ( '' !== $settings[ 'before_label_text' ] ) ? sprintf( esc_html( '%s' ), esc_html( $settings[ 'before_label_text' ] ) ) : '';
			} else {
				$before_label = '';
			}

			if ( 'yes' === $settings[ 'after_label_show_switcher' ] ) {
				$after_label = ( '' !== $settings[ 'after_label_text' ] ) ? sprintf( esc_html( '%s' ), esc_html( $settings[ 'after_label_text' ] ) ) : '';
			} else {
				$after_label = '';
			}
			?>
				<div class="wpmozo-ale-before-after-slider-wrapper">
					<div class="wpmozo-ale-before-after-image-wrapper">
						<img <?php $this->print_render_attribute_string( 'before_image' ); ?> />
						<img <?php $this->print_render_attribute_string( 'after_image' ); ?> />
					</div>
				</div>
				<!-- Slider script -->
				<script type="text/javascript">
					jQuery( function( $ ) {
						$( ".<?php echo esc_attr( $order_class ); ?> .wpmozo-ale-before-after-image-wrapper" ).twentytwenty( {
							default_offset_pct: "<?php echo esc_attr( $offset ); ?>",
							orientation: "<?php echo esc_attr( $orientation ); ?>",
							before_label: "<?php echo esc_attr( $before_label ); ?>",
							after_label: "<?php echo esc_attr( $after_label ); ?>",
							move_slider_on_hover: "<?php echo esc_attr( $move_slider_on_hover ); ?>",
							move_with_handle_only: true,
							click_to_move: "<?php echo esc_attr( $click_to_move ); ?>"
						} );
					} );
				</script>
			<?php
		}
	}
}