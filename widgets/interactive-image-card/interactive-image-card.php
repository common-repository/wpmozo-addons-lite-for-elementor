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
use \Elementor\Group_Control_Image_Size;
use \Elementor\Control_Media;

if ( ! class_exists( 'WPMOZO_AE_Interactive_Image_Card' ) ) {
	class WPMOZO_AE_Interactive_Image_Card extends Widget_Base {

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
			return 'wpmozo_ae_interactive_image_card';
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
			return esc_html__( 'Interactive Image Card', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-interactive-image-card wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-interactiveimagecard-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			return array( 'wpmozo-ae-interactiveimagecard-style' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'interactive-image-card/assets/controls/controls.php';
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

			$image               = array_map( 'esc_attr', $settings[ 'image' ] );
			$title_text          = $settings[ 'title_text' ];
			$content_text        = $settings[ 'content_text' ];
			$select_layout       = $settings[ 'select_layout' ];
			$title_heading_level = $settings[ 'title_heading_level' ];

			$this->add_inline_editing_attributes( 'title_text', 'none' );
			$this->add_render_attribute( 'title_text', 'class', 'wpmozo_ae_interactive_image_card_title' );
			$this->add_inline_editing_attributes( 'content_text', 'none' );
			$this->add_render_attribute( 'content_text', 'class', 'wpmozo_ae_interactive_image_card_wrapper_content' );

			// Interactive image card image.
			if ( ! empty( $image ) ) {
				$image = wp_get_attachment_image( $settings[ 'image' ][ 'id' ], 'full', '', array( 'loading' => 'eager' ) );
			}
			if ( ! empty( $settings[ 'image' ][ 'url' ] ) ) {
				$size         = esc_attr( $settings[ 'image_size_size' ] );
				$image_sizing = 'attachment-' . $size . ' size-' . $size;
				$image        = $settings[ 'image' ];
				$attach_id    = absint( $image[ 'id' ] );
				$img_url      = Group_Control_Image_Size::get_attachment_image_src( $attach_id, 'image_size', $settings );
				if ( empty( $img_url ) ) {
					$img_url = esc_url( $settings[ 'image' ][ 'url' ] );
				}
				$this->add_render_attribute( 
					'image',
					array( 
						'src'   => $img_url,
						'class' => array( 'wpmozo_ae_interactive_image_card_image', $image_sizing ),
						'title' => esc_attr( Control_Media::get_image_title( $image ) ),
						'alt'   => esc_attr( Control_Media::get_image_alt( $image ) ),
					 )
				 );
				$image = '<img ' . $this->get_render_attribute_string( 'image' ) . ' />';
			}

			// Interactive image card title.
			if ( ! empty( $title_text ) ) {
				$title_text = '<' . esc_html( $title_heading_level ) . ' ' . $this->get_render_attribute_string( 'title_text' ) . '>' . $title_text . '</' . esc_html( $title_heading_level ) . '>';
			}

			// Interactive image card content.
			if ( ! empty( $content_text ) ) {
				$content_text = '<div ' . $this->get_render_attribute_string( 'content_text' ) . '>' . $content_text . '</div>';
			}
			?>
			<div class="wpmozo_ae_interactive_image_card_wrapper">
				<figure class="effect-<?php echo esc_attr( $select_layout ); ?>">
					<?php echo wp_kses_post( $image ); ?>
					<figcaption>
						<div class="wpmozo_ae_interactive_image_card_wrapper_inner">
							<?php echo wp_kses_post( $title_text ); ?>
							<?php echo wp_kses_post( $content_text ); ?>
						</div>
					</figcaption>
				</figure>
			</div>
			<?php
		}
	}
}