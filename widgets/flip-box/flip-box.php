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
use \Elementor\Icons_Manager;

if ( ! class_exists( 'WPMOZO_AE_Flip_Box' ) ) {
	class WPMOZO_AE_Flip_Box extends Widget_Base {

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
			return 'wpmozo_ae_flip_box';
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
			return __( 'Flip Box', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-flip-box  wpmozo-ae-brandicon';
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

			wp_register_style( 'wpmozo-ae-flipbox-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-flipbox-style' );

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
			wp_register_script( 'wpmozo-ae-flipbox-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

				return array( 'wpmozo-ae-flipbox-script' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'flip-box/assets/controls/controls.php';
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

			$settings                         = $this->get_settings_for_display();
			$settings[ 'layout1_shake_effect' ] = isset( $settings[ 'layout1_shake_effect' ] ) ? $settings[ 'layout1_shake_effect' ] : 'no';
			$front_title                      = '';
			$front_content                    = '';
			$back_title                       = '';
			$back_content                     = '';
			$new_icon                         = '';
			$old_icon                         = '';
			$front_icon                       = '';
			$front_image                      = '';
			$back_icon                        = '';
			$back_image                       = '';

			$display_button         = $settings[ 'display_button' ];
			$button_text            = $settings[ 'button_text' ];
			$button_hover_animation = isset( $settings[ 'button_hover_animation' ] ) ? $settings[ 'button_hover_animation' ] : '';
			$button_url             = isset( $settings[ 'button_url' ][ 'url' ] ) ? $settings[ 'button_url' ][ 'url' ]: '';


			$this->add_render_attribute( 'wpmozo_ae_button', 'class', 'wpmozo_ae_button' );
			$this->add_render_attribute( 'button_text', 'class', 'button_text' );
			$this->add_inline_editing_attributes( 'button_text', 'none' );
			$this->add_render_attribute( 'wpmozo_ae_button_wrapper', 'class', 'wpmozo_ae_flip_box_button_wrapper' );
			$this->add_render_attribute( 'flip_box_button_wrapper_inner', 'class', 'wpmozo_ae_flip_box_button_wrapper_inner' );
			if ( '' !== $button_url ) {
				$this->add_link_attributes( 'wpmozo_ae_button', $settings[ 'button_url' ] );
			}
			if ( ! empty( $button_hover_animation ) ) {
				$this->add_render_attribute( 'wpmozo_ae_button', 'class', 'elementor-animation-' . $button_hover_animation );
			};

			$allowed_html_tags = array( 
				'h1'     => array( 
					'class' => array(),
					'id'    => array(),
				 ),
				'h2'     => array( 
					'class' => array(),
					'id'    => array(),
				 ),
				'h3'     => array( 
					'class' => array(),
					'id'    => array(),
				 ),
				'h4'     => array( 
					'class' => array(),
					'id'    => array(),
				 ),
				'h5'     => array( 
					'class' => array(),
					'id'    => array(),
				 ),
				'h6'     => array( 
					'class' => array(),
					'id'    => array(),
				 ),
				'p'      => array( 
					'class' => array(),
					'id'    => array(),
				 ),
				'span'   => array( 
					'class' => array(),
					'id'    => array(),
				 ),
				'a'      => array( 
					'class' => array(),
					'id'    => array(),
					'href'  => array(),
					'title' => array(),
				 ),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
			 );

			$this->add_render_attribute( 'wrapper', 'class', 'wpmozo_ae_flipbox_wrapper' );
			$this->add_render_attribute( 'front-wrapper', 'class', array( 'wpmozo_ae_flipbox_side wpmozo_ae_flipbox_front' ) );
			$this->add_render_attribute( 'back-wrapper', 'class', array( 'wpmozo_ae_flipbox_side wpmozo_ae_flipbox_back' ) );

			// Button icon HTML.
			$this->add_render_attribute( 'flipbox_title', 'class', 'wpmozo_ae_flipbox_heading' );
			$this->add_render_attribute( 'flipbox_content', 'class', 'wpmozo_ae_flipbox_description' );

			?>
				<div class="wpmozo_ae_flipbox_wrapper <?php echo esc_attr( $settings[ 'flipbox_layout' ] ); ?>" flip-direction="<?php echo 'layout1' === $settings[ 'flipbox_layout' ] ? esc_attr( $settings[ 'layout1_flip_style' ] ) : esc_attr( $settings[ 'layout2_flip_style' ] ); ?>">
							<div class="wpmozo_ae_flipbox_side wpmozo_ae_flipbox_front wpmozo_ae_flipbox_position_<?php echo esc_attr( $settings[ 'front_icon_placement' ] ); ?> wpmozo_ae_flipbox_content_<?php echo esc_attr( $settings[ 'front_content_align' ] ); ?> ">
								<div class="wpmozo_ae_flipbox_inner">
								<?php
								if ( 'image' === $settings[ 'front_use_icon_image' ] && '' !== $settings[ 'front_image' ] && '' !== $settings[ 'front_image' ][ 'url' ] ) {
									?>
											<div class="wpmozo_ae_flipbox_image">
												<img src="<?php echo esc_url( $settings[ 'front_image' ][ 'url' ] ); ?>" alt="<?php echo esc_attr( $settings[ 'front_image_alt' ] ); ?>"/>
											</div>
										<?php
								}
								if ( 'icon' === $settings[ 'front_use_icon_image' ] && '' !== $settings[ 'front_icon_new' ] ) {
									if ( 'yes' === $settings[ 'front_style_icon' ] ) {

										$icon_class  = 'wpmozo_ae_icon_' . $settings[ 'front_icon_shape' ];
										$icon_style .= 'background-color:' . esc_attr( $settings[ 'front_shape_color' ] ) . ';';
										if ( 'hexagon' === $settings[ 'front_icon_shape' ] ) {
											?>
													<div class="wpmozo_ae_flipbox_icon">
														<div class="wpmozo_ae_hexagon <?php echo ( 'yes' === $settings[ 'front_use_shape_border' ] ? ' wpmozo_ae_icon_shape_border' : '' ); ?> ">
															<div class="wpmozo_ae_hexagon_shape">
															<?php
																Icons_Manager::render_icon( 
																	$settings[ 'front_icon_new' ],
																	array( 
																		'aria-hidden' => 'true',
																		'class'       => $icon_class,
																	 )
																 );
															?>
															</div>
														</div>
													</div>
												<?php
										} else {
											if ( 'yes' === $settings[ 'front_use_shape_border' ] && 'hexagon' !== $settings[ 'front_icon_shape' ] ) {
												$icon_class .= ' wpmozo_ae_icon_shape_border';

												?>
														<div class="wpmozo_ae_flipbox_icon">
														<?php
															Icons_Manager::render_icon( 
																$settings[ 'front_icon_new' ],
																array( 
																	'aria-hidden' => 'true',
																	'class'       => $icon_class,
																	'style'       => $icon_style,
																 )
															 );
														?>
														</div>
													<?php
											} else {
												?>
														<div class="wpmozo_ae_flipbox_icon">
														<?php
															Icons_Manager::render_icon( 
																$settings[ 'front_icon_new' ],
																array( 
																	'aria-hidden' => 'true',
																	'class'       => $icon_class,
																	'style'       => $icon_style,
																 )
															 );
														?>
														</div>
													<?php
											}
										}
									} else {
										?>
												<div class="wpmozo_ae_flipbox_icon">
												<?php
													Icons_Manager::render_icon( 
														$settings[ 'front_icon_new' ],
														array( 
															'aria-hidden' => 'true',
														 )
													 );
												?>
												</div>
											<?php
									}
								}
								?>
									<div class="wpmozo_ae_flipbox_front_content_wrapper">
										<?php
										if ( '' !== $settings[ 'front_title' ] ) {
											?>
												<div <?php $this->print_render_attribute_string( 'flipbox_title' ); ?> >
													<<?php echo esc_html( $settings[ 'front_heading_level' ] ); ?> class="wpmozo_ae_flipbox_title">
														<?php echo wp_kses_post( $this->parse_text_editor( $settings[ 'front_title' ] ), $allowed_html_tags ); ?>
													</<?php echo esc_html( $settings[ 'front_heading_level' ] ); ?> >
												</div>
											<?php
										}
										if ( '' !== $settings[ 'front_content' ] ) {
											?>
												<div <?php $this->print_render_attribute_string( 'flipbox_content' ); ?> >
													<?php echo wp_kses_post( $this->parse_text_editor( $settings[ 'front_content' ] ) ); ?>
												</div>
											<?php
										}
										?>
									</div>
								</div>
							</div>
							<div class="wpmozo_ae_flipbox_side wpmozo_ae_flipbox_back wpmozo_ae_flipbox_position_<?php echo esc_attr( $settings[ 'back_icon_placement' ] ); ?> wpmozo_ae_flipbox_content_<?php echo esc_attr( $settings[ 'back_content_align' ] ); ?> ">
								<div class="wpmozo_ae_flipbox_inner">
								<?php
								if ( 'image' === $settings[ 'back_use_icon_image' ] && '' !== $settings[ 'back_image' ] && '' !== $settings[ 'back_image' ][ 'url' ] ) {
									?>
										<div class="wpmozo_ae_flipbox_image">
											<img src="<?php echo esc_url( $settings[ 'back_image' ][ 'url' ] ); ?>" alt="<?php echo esc_attr( $settings[ 'back_image_alt' ] ); ?>"/>
										</div>
									<?php
								}
								if ( 'icon' === $settings[ 'back_use_icon_image' ] && '' !== $settings[ 'back_icon_new' ] ) {
									if ( 'yes' === $settings[ 'back_style_icon' ] ) {

										$icon_class  = 'wpmozo_ae_icon_' . $settings[ 'back_icon_shape' ];
										$icon_style .= 'background-color:' . esc_attr( $settings[ 'back_shape_color' ] ) . ';';
										if ( 'hexagon' === $settings[ 'back_icon_shape' ] ) {
											?>
												<div class="wpmozo_ae_flipbox_icon">
													<div class="wpmozo_ae_hexagon <?php echo ( 'yes' === $settings[ 'back_use_shape_border' ] ? ' wpmozo_ae_icon_shape_border' : '' ); ?> ">
														<div class="wpmozo_ae_hexagon_shape">
															<?php
																Icons_Manager::render_icon( 
																	$settings[ 'back_icon_new' ],
																	array( 
																		'aria-hidden' => 'true',
																		'class'       => $icon_class,
																	 )
																 );
															?>
														</div>
													</div>
												</div>
											<?php
										} else {
											if ( 'yes' === $settings[ 'back_use_shape_border' ] && 'hexagon' !== $settings[ 'back_icon_shape' ] ) {
												$icon_class .= ' wpmozo_ae_icon_shape_border';

												?>
													<div class="wpmozo_ae_flipbox_icon">
														<?php
															Icons_Manager::render_icon( 
																$settings[ 'back_icon_new' ],
																array( 
																	'aria-hidden' => 'true',
																	'class'       => $icon_class,
																	'style'       => $icon_style,
																 )
															 );
														?>
													</div>
												<?php
											} else {
												?>
													<div class="wpmozo_ae_flipbox_icon">
														<?php
															Icons_Manager::render_icon( 
																$settings[ 'back_icon_new' ],
																array( 
																	'aria-hidden' => 'true',
																	'class'       => $icon_class,
																	'style'       => $icon_style,
																 )
															 );
														?>
													</div>
												<?php
											}
										}
									} else {
										?>
											<div class="wpmozo_ae_flipbox_icon">
												<?php
													Icons_Manager::render_icon( 
														$settings[ 'back_icon_new' ],
														array( 
															'aria-hidden' => 'true',
														 )
													 );
												?>
											</div>
										<?php
									}
								}
								?>
									<div class="wpmozo_ae_flipbox_back_content_wrapper">
									<?php
									if ( '' !== $settings[ 'back_title' ] ) {
										?>
												<div <?php $this->print_render_attribute_string( 'flipbox_title' ); ?> >
													<<?php echo esc_html( $settings[ 'back_heading_level' ] ); ?> class="wpmozo_ae_flipbox_title">
													<?php echo wp_kses_post( $this->parse_text_editor( $settings[ 'back_title' ], $allowed_html_tags ), $allowed_html_tags ); ?>
													</<?php echo esc_html( $settings[ 'back_heading_level' ] ); ?> >
												</div>
											<?php
									}
									if ( '' !== $settings[ 'back_content' ] ) {
										?>
												<div <?php $this->print_render_attribute_string( 'flipbox_content' ); ?> >
												<?php echo wp_kses_post( $this->parse_text_editor( $settings[ 'back_content' ] ) ); ?>
												</div>
											<?php
									}
									if ( 'yes' === $settings[ 'display_button' ] ) {
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
									} else {
										echo '';
									}
									?>
									</div>
								</div>
							</div>
						</div>
			<?php
		}
	}
}