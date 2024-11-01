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
use \Elementor\Icons_Manager;
use \Elementor\Control_Media;

if ( ! class_exists( 'WPMOZO_AE_Tilt_Image' ) ) {
	class WPMOZO_AE_Tilt_Image extends Widget_Base {

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
			return 'wpmozo_ae_tilt_image';
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
			return esc_html__( 'Tilt Image', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-tilt-image wpmozo-ae-brandicon';
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

			wp_register_style( 'wpmozo-ae-tiltimage-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-tiltimage-style' );
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
			wp_register_script( 'wpmozo-ae-tiltimage-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-tiltimage-script' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'tilt-image/assets/controls/controls.php';
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
			$settings               = $this->get_settings_for_display();
			$icon                   = '';
			$image                  = '';
			$tilt_max               = $settings[ 'max_rotation_slider' ][ 'size' ];
			$use_glare              = $settings[ 'use_glare_switcher' ];
			$icon_shape             = $settings[ 'select_icon_shape' ];
			$title_text             = $settings[ 'title_text' ];
			$button_url             = isset( $settings[ 'button_url' ] ) ? esc_attr( $settings[ 'button_url' ][ 'url' ] ) : '#';
			$tilt_scale             = $settings[ 'scale_on_hover_slider' ][ 'size' ];
			$tilt_speed             = $settings[ 'speed_slider' ][ 'size' ];
			$button_text            = $settings[ 'button_text' ];
			$tilt_mobile            = 'yes' === $settings[ 'disable_on_mobile_switcher' ] ? 'on' : 'off';
			$description_text       = $settings[ 'description_text' ];
			$tilt_perspective       = $settings[ 'perspective_slider' ][ 'size' ];
			$use_disable_axis       = $settings[ 'use_disable_xy_axis_switcher' ];
			$tilt_disable_axis      = $settings[ 'disable_x/y_axis_select' ];
			$content_animation      = $settings[ 'content_animation_selector' ];
			$content_alignment      = $settings[ 'content_alignment_selector' ];
			$title_heading_level    = $settings[ 'title_heading_level' ];
			$button_hover_animation = isset( $settings[ 'button_hover_animation' ] ) ? $settings[ 'button_hover_animation' ] : '';

			if ( 'on' === $settings[ 'use_glare_switcher' ] ) {
				null !== absint( $settings[ 'max_glare_slider' ][ 'size' ] ) ? $tilt_max_glare = absint( $settings[ 'max_glare_slider' ][ 'size' ] ) : '';
			}

			$tilt_max         = '' !== $tilt_max ? 'data-tilt-max="' . $tilt_max . '"' : '';
			$tilt_perspective = '' !== $tilt_perspective ? 'data-tilt-perspective="' . $tilt_perspective . '"' : '';
			$tilt_scale       = '' !== $tilt_scale ? 'data-tilt-scale="' . $tilt_scale . '"' : '';
			$tilt_speed       = '' !== $tilt_speed ? 'data-tilt-speed="' . $tilt_speed . '"' : '';
			$tilt_mobile      = '' !== $tilt_mobile ? 'data-tilt-mobile-disable="' . $tilt_mobile . '"' : '';

			$this->add_render_attribute( 'contents_animations', 'class', 'wpmozo_ae_tilt_content_wrapper' );

			if ( '' !== $settings[ 'content_on_hover_switcher' ] ) {
				$this->add_render_attribute( 'contents_animations', 'class', $content_animation );
			}

			$this->add_inline_editing_attributes( 'title_text', 'none' );
			$this->add_render_attribute( 'title_text', 'class', 'wpmozo_ae_tilt_title' );
			$this->add_inline_editing_attributes( 'description_text', 'none' );
			$this->add_render_attribute( 'description_text', 'class', 'wpmozo_ae_tilt_desc' );
			$this->add_render_attribute( 'icon_wrapper', 'class', 'wpmozo_ae_tilt_image_icon_wrapper' );
			$this->add_render_attribute( 'icon_wrapper_shape', 'class', array( 'wpmozo_ae_tilt_image_icon_wrapper', 'wpmozo_icon_shape_' . $icon_shape . '_container' ) );
			$this->add_render_attribute( 'wpmozo_ae_button', 'class', 'wpmozo_ae_button' );
			$this->add_render_attribute( 'button_text', 'class', 'button_text' );
			$this->add_inline_editing_attributes( 'button_text', 'none' );
			$this->add_render_attribute( 'wpmozo_ae_button_wrapper', 'class', 'wpmozo_ae_tilt_image_button_wrapper' );
			if ( ! empty( $button_hover_animation ) ) {
				$this->add_render_attribute( 'wpmozo_ae_button', 'class', 'elementor-animation-' . $button_hover_animation );
			}
			if ( ! empty( $settings[ 'button_url' ][ 'url' ] ) ) {
				$sanitized_url                 = esc_attr( $settings[ 'button_url' ][ 'url' ] );
				$settings[ 'button_url' ][ 'url' ] = $sanitized_url;
				$this->add_link_attributes( 'wpmozo_ae_button', $settings[ 'button_url' ] );
			}

			// Tilt attributes.
				$tilt_attr = 'data-tilt ' . $tilt_max . ' ' . $tilt_perspective . ' ' . $tilt_scale . ' ' . $tilt_speed . ' ' . $tilt_mobile . ' ' . ( 'on' === $use_glare ? wp_kses_post( " data-tilt-glare=true data-tilt-max-glare=$tilt_max_glare" ) : '' ) . ' ' . ( 'on' === $use_disable_axis ? wp_kses_post( " data-tilt-axis=$tilt_disable_axis" ) : '' );

			// Main output.

			?>
				<div class="wpmozo_ae_tilt_image_wrapper <?php echo '' !== $content_alignment ? 'wpmozo_ae_tilt_align_' . esc_attr( $content_alignment ) : ''; ?>" <?php echo wp_kses_post( $tilt_attr ); ?> >
					<div class="wpmozo_ae_tilt_image_inner_wrapper"> 
						<?php
						if ( ! empty( $settings[ 'tilt_image_image' ][ 'url' ] ) ) {
							$size         = $settings[ 'tilt_image_size_size' ];
							$image_sizing = 'attachment-' . $size . ' size-' . $size;
							$image        = $settings[ 'tilt_image_image' ];
							$attach_id    = $image[ 'id' ];
							$img_url      = Group_Control_Image_Size::get_attachment_image_src( $attach_id, 'tilt_image_size', $settings );

							// To show placeholder image.
							if ( empty( $img_url ) ) {
								$img_url = $settings[ 'tilt_image_image' ][ 'url' ];
							}

							$this->add_render_attribute( 
								'image',
								array( 
									'src'   => $img_url,
									'class' => array( 'wpmozo_ae_tilt_image_image', $image_sizing ),
									'title' => Control_Media::get_image_title( $image ),
									'alt'   => Control_Media::get_image_alt( $image ),
								 )
							 );
							?>
									<img <?php $this->print_render_attribute_string( 'image' ); ?> />
								<?php
						}
						?>
						<div <?php $this->print_render_attribute_string( 'contents_animations' ); ?> >
							<?php
							// Tilt image icon.
							if ( 'yes' === $settings[ 'use_icon_switcher' ] ) {
								if ( 'yes' !== $settings[ 'icon_style_switcher' ] && '' !== $settings[ 'select_icon' ][ 'value' ] ) {
									?>
										<div <?php $this->print_render_attribute_string( 'icon_wrapper' ); ?> >
										<?php
											Icons_Manager::render_icon( 
												$settings[ 'select_icon' ],
												array( 
													'aria-hidden' => 'true',
													'class' => 'wpmozo_ae_tilt-image_icon ',
												 ),
												'i'
											 );
										?>
										</div>
									<?php
								}
								if ( '' !== $settings[ 'select_icon' ][ 'value' ] && 'yes' === $settings[ 'icon_style_switcher' ] && '' !== $settings[ 'select_icon_shape' ] ) {
									?>
										<div <?php $this->print_render_attribute_string( 'icon_wrapper_shape' ); ?> >
										<?php
											Icons_Manager::render_icon( 
												$settings[ 'select_icon' ],
												array( 
													'aria-hidden' => 'true',
													'class' => array( 'wpmozo_ae_tilt_image_icon', 'wpmozo_icon_shape_' . $icon_shape ),
												 ),
												'i'
											 );
										?>
										</div>
									<?php
								}
							}
							// Tilt image title.
							if ( '' !== $title_text ) {
								?>
										<<?php echo sanitize_key( $title_heading_level ); ?> <?php $this->print_render_attribute_string( 'title_text' ); ?> >
										<?php echo esc_textarea( $title_text ); ?> 
										</<?php echo sanitize_key( $title_heading_level ); ?> >
									<?php
							}
							// Tilt image description.
							if ( '' !== $description_text ) {
								?>
										<div <?php $this->print_render_attribute_string( 'description_text' ); ?> >
											<p> <?php echo esc_textarea( $description_text ); ?> </p>
										</div>
									<?php
							}
							?>
							<?php
								if( '' !== $button_text ) {
									?>
										<div <?php $this->print_render_attribute_string( 'wpmozo_ae_button_wrapper' ); ?> >
											<a <?php $this->print_render_attribute_string( 'wpmozo_ae_button' ); ?> >
												<span <?php $this->print_render_attribute_string( 'button_text' ); ?> >
													<?php echo esc_html( $button_text ); ?>
												</span> 
											<?php 
											if( '' !== $settings[ 'button_icon' ] ) {
												Icons_Manager::render_icon( 
													$settings[ 'button_icon' ],
													array( 
														'aria-hidden' => 'true',
														'class'       => 'wpmozo_ae_button_icon',
													 )
												 );
											}else {
												echo esc_html( '' );
											} ?>
											</a>
										</div>
									<?php
								}
							?>
							</div>
					</div>
				</div>
			<?php
		}
	}
}