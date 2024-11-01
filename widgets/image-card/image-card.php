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

if ( ! class_exists( 'WPMOZO_AE_Image_Card' ) ) {
	class WPMOZO_AE_Image_Card extends Widget_Base {

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
			return 'wpmozo_ae_image_card';
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
			return esc_html__( 'Image Card', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-image-card wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-imagecard-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			return array( 'wpmozo-ae-imagecard-style' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'image-card/assets/controls/controls.php';
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
			$image                  = array_map( 'esc_attr', $settings[ 'image_card_image' ] );
			$title_text             = $settings[ 'title_text' ];
			$title_heading_level    = $settings[ 'title_heading_level' ];
			$content_text           = $settings[ 'content_text' ];
			$button_text            = $settings[ 'button_text' ];
			$icon_shape             = $settings[ 'select_icon_shape' ];
			$icon                   = '';
			$button_hover_animation = isset( $settings[ 'button_hover_animation' ] ) ? $settings[ 'button_hover_animation' ] : '';
			$button_url             = isset( $settings[ 'button_url' ] ) ? esc_attr( $settings[ 'button_url' ][ 'url' ] ) : '#';
			$icon_position          = 'row' === $settings[ 'button_icon_position' ] ? 'icon_after' : 'icon_before';

			$this->add_inline_editing_attributes( 'title_text', 'none' );
			$this->add_render_attribute( 'title_text', 'class', 'wpmozo_ae_image_card_title' );
			$this->add_inline_editing_attributes( 'content_text', 'none' );
			$this->add_render_attribute( 'content_text', 'class', 'wpmozo_ae_image_card_content' );
			$this->add_render_attribute( 'icon_wrapper', 'class', 'wpmozo_ae_image_card_icon_wrapper' );
			$this->add_render_attribute( 'icon_wrapper_shape', 'class', array( 'wpmozo_ae_image_card_icon_wrapper', 'wpmozo_ae_icon_shape_' . $icon_shape . '_container' ) );
			$this->add_render_attribute( 'wpmozo_ae_button', 'class', 'wpmozo_ae_button' );
			$this->add_render_attribute( 'button_text', 'class', 'button_text' );
			$this->add_inline_editing_attributes( 'button_text', 'none' );
			$this->add_render_attribute( 'wpmozo_ae_button_wrapper', 'class', 'wpmozo_ae_image_card_button_wrapper '.$icon_position );
			$this->add_render_attribute( 'image_card_button_wrapper_inner', 'class', 'wpmozo_ae_image_card_button_wrapper_inner' );

			if ( ! empty( $button_hover_animation ) ) {
				$this->add_render_attribute( 'wpmozo_ae_button', 'class', 'elementor-animation-' . $button_hover_animation );
			}
			if ( ! empty( $settings[ 'button_url' ][ 'url' ] ) ) {
				$sanitized_url                 = esc_attr( $settings[ 'button_url' ][ 'url' ] );
				$settings[ 'button_url' ][ 'url' ] = $sanitized_url;
				$this->add_link_attributes( 'wpmozo_ae_button', $settings[ 'button_url' ] );
			}
			if ( ! empty( $image ) ) {
				$image = wp_get_attachment_image( $image[ 'id' ], 'full', '', array( 'loading' => 'eager' ) );
			}

			// Main output.
			?>
				<div class="wpmozo_ae_image_card_wrapper">
						<?php
							// Image card image html.
						if ( ! empty( $settings[ 'image_card_image' ][ 'url' ] ) ) {
							?>
								<div class="wpmozo_ae_image_card_wrapper_inner">
									<?php
									$size      = isset( $settings[ 'image_size_size' ] ) ? esc_attr( $settings[ 'image_size_size' ] ) : 'full';
									$img_url   = esc_url( $settings[ 'image_card_image' ][ 'url' ] );
									$attach_id = is_numeric( $settings[ 'image_card_image' ][ 'id' ] ) ? absint( $settings[ 'image_card_image' ][ 'id' ] ) : '';
									$img_url   = ! empty( $attach_id ) ? Group_Control_Image_Size::get_attachment_image_src( $attach_id, 'image_size', $settings ) : $img_url;
									if ( empty( $img_url ) ) {
										$img_url = esc_url( $settings[ 'image_card_image' ][ 'url' ] );
									}
									$image_sizing = 'attachment-' . $size . ' size-' . $size;
									// Set attributes for the image element.
									$this->add_render_attribute( 
										'image',
										array( 
											'src'   => $img_url,
											'class' => array( 'wpmozo_ae_image_card_image', $image_sizing ),
											'title' => Control_Media::get_image_title( $image ),
											'alt'   => Control_Media::get_image_alt( $image ),
										 )
									 );
									?>
									<img <?php $this->print_render_attribute_string( 'image' ); ?> />
								</div>
							<?php
						}
						?>
					<div class="wpmozo_ae_image_card_content_wrapper">
						<?php
							// Image card icon html.
						if ( ! empty( $settings[ 'select_icon' ][ 'value' ] ) && 'yes' !== $settings[ 'icon_style_switcher' ] ) {
							?>
								<div <?php $this->print_render_attribute_string( 'icon_wrapper' ); ?> > 
								<?php
									Icons_Manager::render_icon( 
										$settings[ 'select_icon' ],
										array( 
											'aria-hidden' => 'true',
											'class' => 'wpmozo_ae_image_card_icon',
										 ),
										'span'
									 );
								?>
								</div>
							<?php
						} elseif ( ! empty( $settings[ 'select_icon' ][ 'value' ] ) && '' !== $settings[ 'select_icon_shape' ] ) {
							if ( 'svg' === $settings[ 'select_icon' ][ 'library' ] ) {
								?>
									<div <?php $this->print_render_attribute_string( 'icon_wrapper_shape' ); ?> >
										<?php
											Icons_Manager::render_icon( 
												$settings[ 'select_icon' ],
												array( 
													'aria-hidden' => 'true',
													'class' => array( 'wpmozo_ae_image_card_icon', 'wpmozo_ae_icon_shape_' . $icon_shape ),
												 ),
												'span'
											 );
										?>
									</div>
								<?php
							} else {
								?>
									<div <?php $this->print_render_attribute_string( 'icon_wrapper' ); ?> >
										<?php
											Icons_Manager::render_icon( 
												$settings[ 'select_icon' ],
												array( 
													'aria-hidden' => 'true',
													'class' => array( 'wpmozo_ae_image_card_icon', 'wpmozo_ae_icon_shape_' . $icon_shape ),
												 ),
												'span'
											 );
										?>
									</div>
								<?php
							}
						}
						?>
						<div class="wpmozo_ae_image_card_inner_content_wrapper">
							<?php
							if ( ! empty( $title_text ) ) {
								?>
										<<?php echo esc_attr( $title_heading_level ); ?> <?php $this->print_render_attribute_string( 'title_text' ); ?> > 
										<?php echo esc_html( $title_text ); ?> 
										</<?php echo esc_attr( $title_heading_level ); ?> >
									<?php
							}
							?>
							<?php
								// Image card content html.
							if ( ! empty( $content_text ) ) {
								?>
										<div <?php $this->print_render_attribute_string( 'content_text' ); ?> >  
										<?php echo wp_kses_post( $content_text ); ?> 
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