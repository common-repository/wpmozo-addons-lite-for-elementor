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

if ( ! class_exists( 'WPMOZO_AE_Floating_Image' ) ) {
	class WPMOZO_AE_Floating_Image extends Widget_Base {

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
			return 'wpmozo_ae_floating_image';
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
			return esc_html__( 'Floating Image', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-floating-image wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-floating-image-style', plugins_url( 'assets/css/style.min.css?test=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-floating-image-style' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'floating-image/assets/controls/controls.php';
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
			$settings   = $this->get_settings_for_display();
			$widget_id  = $this->get_id();
			$image_list = $settings[ 'image_list' ];
			?>		
			<div class="wpmozo_floating_image wpmozo_floating_image_<?php echo esc_attr( $widget_id ); ?>">
				<?php
				foreach ( $image_list as $index => $single_item ) {
					$image_link     = $single_item[ 'image_link_url' ];
					$image_link_url = isset( $image_link[ 'url' ] ) ? $image_link[ 'url' ] : '';
					$is_external    = isset( $image_link[ 'is_external' ] ) ? $image_link[ 'is_external' ] : '';
					$link_taget     = '_self';
					if ( 1 === $is_external ) {
						$link_taget = '_blank';
					}
					if ( ! empty( $image_link_url ) ) :
						?>
							<a href="<?php echo esc_url( $image_link_url ); ?>" target="<?php echo esc_attr( $link_taget ); ?>" > 
								<?php endif; ?>									
									<div class="wpmozo_floating_images_wrapper">
										<div class="wpmozo_floating_image_item elementor-repeater-item-<?php echo esc_attr( $single_item[ '_id' ] ); ?>">				
												<img decoding="async" class="wpmozo_floating_img" src="<?php echo esc_attr( $single_item[ 'image' ][ 'url' ] ); ?>" alt="<?php echo esc_attr( $single_item[ 'image_alt_text' ] ); ?>" >	
										</div>					
									</div>	
								<?php
								if ( ! empty( $image_link_url ) ) :
									?>
							</a> 
									<?php
						endif;
				}
				?>
			</div>			
			<?php
		}
	}
}