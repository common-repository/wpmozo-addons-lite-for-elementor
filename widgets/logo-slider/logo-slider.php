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
use \Elementor\Icons_Manager;
use \Elementor\Controls_Manager;

if ( ! class_exists( 'WPMOZO_AE_Logo_Slider' ) ) {
	class WPMOZO_AE_Logo_Slider extends Widget_Base {

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
			return 'wpmozo_ae_logo_slider';
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
			return esc_html__( 'Logo Slider', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-logo-slider wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-logo-slider-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			return array( 'wpmozo-ae-logo-slider-style', 'wpmozo-ae-swiper-style' );
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
			wp_register_script( 'wpmozo-ae-logo-slider-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-logo-slider-script', 'wpmozo-ae-swiper' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'logo-slider/assets/controls/controls.php';
		}

		/**
		 * This function dynamically creates script parameters according to the user settings
		 *
		 * @return string
		 * */
		public function wpmozo_ae_render_slider_script() {
			$order_class         = 'elementor-element-'.$this->get_id();
			$swiper              = str_replace( '-', '_', $order_class );
			$settings            = $this->get_settings_for_display();
			$slide_effect        = esc_attr( $settings[ 'slide_effect' ] );
			$show_arrow          = esc_attr( $settings[ 'show_arrow' ] );
			$show_control_dot    = esc_attr( $settings[ 'show_control_dot' ] );
			$loop                = esc_attr( $settings[ 'slider_loop' ] );
			$autoplay            = esc_attr( $settings[ 'autoplay' ] );
			$autoplay_speed      = intval( $settings[ 'autoplay_speed' ] );
			$transition_duration = intval( $settings[ 'slide_transition_duration' ] );
			$pause_on_hover      = esc_attr( $settings[ 'pause_on_hover' ] );
			$dynamic_bullets     = 'yes' === $settings[ 'enable_dynamic_dots' ] && in_array( $settings[ 'control_dot_style' ], array( 'solid_dot', 'transparent_dot', 'square_dot' ), true ) ? 'true' : 'false';
			$autoheight          = 'yes' === $settings[ 'enable_auto_height' ] ? 'true' : 'false';

			if( 'coverflow' === $slide_effect || 'slide' === $slide_effect ) {
				$cards_per_slide          = $settings[ 'cards_per_slide' ];
				$slides_per_group         = $settings[ 'slides_per_group' ];
				$space_between_slides     = $settings[ 'space_between_slides' ][ 'size' ];
				$enable_coverflow_shadow  = 'yes' === $settings[ 'enable_coverflow_shadow' ] ? 'true' : 'false';
				$coverflow_rotate         = 'coverflow' === $slide_effect ? intval( $settings[ 'coverflow_rotate' ][ 'size' ] ) : '';
				$coverflow_depth          = 'coverflow' === $slide_effect ? intval( $settings[ 'coverflow_depth' ][ 'size' ] ) : '' ;
			}

			$autoplay_speed       = '' !== $autoplay_speed || 0 !== $autoplay_speed ? $autoplay_speed : 3000;
			$transition_duration  = '' !== $transition_duration || 0 !== $transition_duration ? $transition_duration : 1000;
			$loop                 = 'yes' === $loop ? 'true' : 'false';
			$arrows               = 'false';
			$dots                 = 'false';
			$autoplaySlides       = 0;
			$cube                 = 'false';
			$coverflow            = 'false';
			$slidesPerGroup       = 1;
			$slidesPerGroupSkip   = 0;
			$slidesPerGroupIpad   = 1;
			$slidesPerGroupMobile = 1;
		

			if ( in_array( $slide_effect, array( 'slide', 'coverflow' ), true ) ) {
				$cards_per_view             = $cards_per_slide;
				$cards_space_between        = $space_between_slides;
				$slidesPerGroup             = $slides_per_group;

				if ( $cards_per_view > $slidesPerGroup && 1 !== $slidesPerGroup ) {
					$slidesPerGroupSkip = $cards_per_view - $slidesPerGroup;
				}
			} else {
				$cards_per_view             = 1;
				$cards_space_between        = 0;
				$slides_per_group            = 1;
			}

			$cards_per_slide_tablet = isset( $settings[ 'cards_per_slide_tablet' ] ) && !empty( $settings[ 'cards_per_slide_tablet' ] ) ? $settings[ 'cards_per_slide_tablet' ] : $cards_per_view;
			$cards_per_slide_mobile = isset( $settings[ 'cards_per_slide_mobile' ] ) && !empty( $settings[ 'cards_per_slide_mobile' ] ) ? $settings[ 'cards_per_slide_mobile' ] : $cards_per_view;
			$slides_per_group_tablet = isset( $settings[ 'slides_per_group_tablet' ] ) && !empty( $settings[ 'slides_per_group_tablet' ] ) ? $settings[ 'slides_per_group_tablet' ] : $slides_per_group;
			$slides_per_group_mobile = isset( $settings[ 'slides_per_group_mobile' ] )  && !empty( $settings[ 'slides_per_group_mobile' ] ) ? $settings[ 'slides_per_group_tablet' ] : $slides_per_group;	

			$space_between_slides_tablet = $cards_space_between;
			if( isset( $settings[ 'space_between_slides_tablet' ][ 'size' ] ) )
			{
				$space_between_slides_tablet = $settings[ 'space_between_slides_tablet' ][ 'size' ];
			}	

			$space_between_slides_mobile = $cards_space_between;
			if( isset( $settings[ 'space_between_slides_mobile' ][ 'size' ] ) )
			{
				$space_between_slides_mobile = $settings[ 'space_between_slides_mobile' ][ 'size' ];
			}
			if ( 'yes' === $show_arrow ) {
				$arrows = "{    
	                            nextEl: '." . esc_attr( $order_class ) . " .swiper-button-next',
	                            prevEl: '." . esc_attr( $order_class ) . " .swiper-button-prev',
	                    }";
			}

			if ( 'yes' === $show_control_dot ) {
				$dots = "{
	                        el: '." . esc_attr( $order_class ) . " .swiper-pagination',
	                        dynamicBullets: " . $dynamic_bullets . ",
	                        clickable: true,
	                    }";
			}

			if ( 'yes' === $autoplay ) {
				if ( 'yes' === $pause_on_hover ) {
					$autoplaySlides = '{
	                                delay:' . $autoplay_speed . ',
	                                disableOnInteraction: true,
	                            }';
				} else {
					$autoplaySlides = '{
	                                delay:' . $autoplay_speed . ',
	                                disableOnInteraction: false,
	                            }';
				}
			}

			if ( 'cube' === $slide_effect ) {
				$cube = '{
	                        shadow: false,
	                        slideShadows: false,
	                    }';
			}

			if ( 'coverflow' === $slide_effect ) {
				$coverflow = '{
	                            rotate: ' . $coverflow_rotate . ',
	                            stretch: 0,
	                            depth: ' . $coverflow_depth . ',
	                            modifier: 1,
	                            slideShadows : ' . $enable_coverflow_shadow . ',
	                        }';
			}
			?>
			<script type="text/javascript">
				jQuery( function( $ ) {
					var <?php echo esc_attr( $swiper ); ?>_swiper = new Swiper( '.<?php echo esc_attr( $order_class ); ?> .swiper-container',{
						slidesPerView: <?php echo $cards_per_view; ?>,
						autoplay: <?php echo $autoplaySlides; ?>,
						spaceBetween: <?php echo intval( $cards_space_between ); ?>,
						slidesPerGroup: <?php echo $slidesPerGroup; ?>,
						slidesPerGroupSkip: <?php echo $slidesPerGroupSkip; ?>,
						effect: "<?php echo $slide_effect; ?>",
						cubeEffect: <?php echo $cube; ?>,
						coverflowEffect: <?php echo $coverflow; ?>,
						speed: <?php echo $transition_duration; ?>,
						pagination: <?php echo $dots; ?>,
						navigation: <?php echo $arrows; ?>,
						grabCursor: 'true',
						autoHeight: <?php echo $autoheight; ?>,
						observer: true,
						observeParents: true,
						loop: <?php echo $loop; ?>,
						breakpoints: {
	                            	981: {
			                          	slidesPerView: <?php echo  $cards_per_view ; ?>,
			                          	spaceBetween: <?php echo  intval( $cards_space_between ) ; ?>,
	                            		slidesPerGroup: <?php echo  $slidesPerGroup ; ?>,
	                            		slidesPerGroupSkip: <?php echo  $slidesPerGroupSkip ; ?>,
			                        },
									768: {
										slidesPerView: <?php echo $cards_per_slide_tablet; ?>,
										spaceBetween: <?php echo intval( $space_between_slides_tablet ); ?>,
										slidesPerGroup: <?php echo isset( $slides_per_group_tablet ) ? $slides_per_group_tablet : 1; ?>,
										slidesPerGroupSkip: <?php echo $slidesPerGroupSkip; ?>,
									},
									0: {
										slidesPerView: <?php echo $cards_per_slide_mobile; ?>,
										spaceBetween:<?php echo intval( $space_between_slides_mobile ); ?>,
										slidesPerGroup: <?php echo isset( $slides_per_group_mobile ) ? $slides_per_group_mobile : 1; ?>,
										slidesPerGroupSkip: <?php echo $slidesPerGroupSkip; ?>,
									},
			                    },
					
					} );
			
					<?php
					if ( 'yes' === $pause_on_hover && 'yes' === $autoplay ) {
						?>					
							jQuery( ".<?php echo esc_attr( $order_class ); ?> .swiper-container" ).on( "mouseenter", function( e ) {
								if ( typeof <?php echo esc_attr( $swiper ); ?>_swiper.autoplay.stop === "function" ) {
									<?php echo esc_attr( $swiper ); ?>_swiper.autoplay.stop();
								}
							} );

							jQuery( ".<?php echo esc_attr( $order_class ); ?> .swiper-container" ).on( "mouseleave", function( e ) {
								if ( typeof <?php echo esc_attr( $swiper ); ?>_swiper.autoplay.start === "function" ) {
									<?php echo esc_attr( $swiper ); ?>_swiper.autoplay.start();
								}
							} );					
						<?php
					}
					if ( 'true' !== $loop ) {
						?>				
							<?php echo esc_attr( $swiper ); ?>_swiper.on( 'reachEnd', function() {
								<?php echo esc_attr( $swiper ); ?>_swiper.autoplay = false;
							} );
						
						<?php
					}
					?>
				} );
			</script>
			<?php
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 * ( 
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function render() {

			$settings = $this->get_settings_for_display();

			$swiper_layout_items     = $settings[ 'logo_list' ];
			$slide_effect            = $settings[ 'slide_effect' ];
			$cards_per_slide         = $settings[ 'cards_per_slide' ];
			$enable_coverflow_shadow = $settings[ 'enable_coverflow_shadow' ];
			$coverflow_shadow_color  = $settings[ 'coverflow_shadow_color' ];
			$coverflow_rotate        = $settings[ 'coverflow_rotate' ];
			$coverflow_depth         = $settings[ 'coverflow_depth' ];
			$equalize_slides_height  = $settings[ 'equalize_slides_height' ];
			$equal_height            = ( 'equal_height' === $settings[ 'equalize_slides_height' ] ) ? ' equal-height' : '';
			$slider_loop             = $settings[ 'slider_loop' ];
			$autoplay                = $settings[ 'autoplay' ];
			$autoplay_speed          = $settings[ 'autoplay_speed' ];
			$pause_on_hover          = $settings[ 'pause_on_hover' ];
			$show_arrow              = $settings[ 'show_arrow' ];
			$show_arrow_on_hover     = $settings[ 'show_arrow_on_hover' ];
			$show_control_dot        = $settings[ 'show_control_dot' ];
			$control_dot_style       = $settings[ 'control_dot_style' ];
			$arrows_position         = $settings[ 'arrows_position' ];
			$order_class             = 'elementor-element-' . $this->get_id();

			$this->add_render_attribute( 'wpmozo_ae_swiper_layout_title', 'class', 'wpmozo_ae_swiper_layout_title' );
			$this->add_render_attribute( 'wpmozo_ae_swiper_layout_description', 'class', 'wpmozo_ae_swiper_layout_description' );
			$this->add_render_attribute( 'button_text', 'class', 'wpmozo_ae_button' );
			$this->add_render_attribute( 'button_wrapper', 'class', 'wpmozo_ae_swiper_layout_button_wrapper' );
			$this->add_render_attribute( 'button_wrapper_inner', 'class', 'wpmozo_ae_swiper_layout_button_inner_wrapper' );

			if ( '' !== $swiper_layout_items ) {
				?>
					<div class="wpmozo_swiper_wrapper <?php echo $equal_height; ?>">
						<div class="wpmozo_swiper_layout wpmozo_swiper_inner_wrap">
							<div class="swiper-container">
								<div class="swiper-wrapper<?php echo $equal_height; ?>">
									<?php
									foreach ( $swiper_layout_items as $index => $item ) {
										$logo_setting_key = $this->get_repeater_setting_key( 'logo_image', 'logo_list', $index );
										$logo_link        = '' !== $item[ 'logo_link' ][ 'url' ] ? 'wpmozo_ae_clickable' : '';
										$att_array        = array( 
											'class'   => array( 'wpmozo_ae_wrapper', 'wpmozo_ae_swiper_layout_item_' . $index, 'swiper-slide', 'elementor-repeater-item-' . $item[ '_id' ], $logo_link )
										 );
										'' !== $item[ 'logo_link' ][ 'url' ] ? $att_array[ 'onclick' ] = ( 'window.open( \'' . $item[ 'logo_link' ][ 'url' ] . '\',\'' . $item[ 'logo_link_target' ] . '\' )' ) : '';

										$this->add_render_attribute( 
											'swiper_layout_item' . $index,
											$att_array
										 );
										?>
												<div <?php $this->print_render_attribute_string( 'swiper_layout_item' . sanitize_key( $index ) ) ; ?> >
													<div class="single-image">
														<img src="<?php echo esc_url( $swiper_layout_items[ $index ][ 'logo_image' ][ 'url' ] ); ?> " alt=" <?php echo esc_attr( $swiper_layout_items[ $index ][ 'logo_alt_text' ] ); ?> ">
													</div>
												</div>
											<?php
									}
									?>
								</div><!-- swiper-wrapper -->
							</div><!-- swiper-container -->
				<?php
				if ( 'yes' === $show_arrow ) {
					$this->add_render_attribute( 'swiper_arrow_next', 
						array( 
							'class' => array( 'wpmozo_swiper_layout_icon_next', 'swiper-button-next' ),
							'aria-hidden' => 'true',
							'data-next_slide_arrow' => $settings[ 'next_slide_arrow' ][ 'value' ]
						 ) 
					 );				
					$this->add_render_attribute( 'swiper_arrow_prev', 
						array( 
							'class' => array( 'wpmozo_swiper_layout_icon_prev', 'swiper-button-prev' ),
							'aria-hidden' => 'true',
							'data-previous_slide_arrow' => $settings[ 'previous_slide_arrow' ][ 'value' ]
						 ) 
					 );
					if ( ! empty( $arrows_position ) ) {
						$this->add_render_attribute( 'data-arrow', 'data-arrows', $arrows_position );
						$arrows_position_data = '';
							$arrows_position_data .= $this->get_render_attribute_string( 'data-arrow' );
					}
					?>
					<div class="wpmozo_swiper_navigation" <?php echo  ( !empty( $arrows_position ) ? $arrows_position_data : '' ) ; ?> >
						<?php 
						if( 'svg' !== $settings[ 'next_slide_arrow' ][ 'library' ] ) {
							Icons_Manager::render_icon( 
								$settings[ 'next_slide_arrow' ],
								array( 
									'aria-hidden' => 'true',
									'class' => array( 'wpmozo_swiper_layout_icon_next', 'swiper-button-next' ),
									'data-next_slide_arrow' => $settings[ 'next_slide_arrow' ][ 'value' ]
								 ),
								'i'
							 );
							
						}
						if( 'svg' === $settings[ 'next_slide_arrow' ][ 'library' ] ) {	
							?><div <?php $this->print_render_attribute_string( 'swiper_arrow_next' )?> ><?php 
									Icons_Manager::render( 
										$settings[ 'next_slide_arrow' ],
										array( 
											'aria-hidden' => 'true',
											'class' => array( 'wpmozo_swiper_layout_icon_next', 'swiper-button-next' ),
											'data-next_slide_arrow' => $settings[ 'next_slide_arrow' ][ 'value' ]
										 ),
										'i'
									 )
								?></div><?php
						} ?>  
						<?php 
							if( 'svg' !== $settings[ 'previous_slide_arrow' ][ 'library' ] ) {
								Icons_Manager::render_icon( 
									$settings[ 'previous_slide_arrow' ],
									array( 
										'aria-hidden' => 'true',
										'class' => array( 'wpmozo_swiper_layout_icon_prev', 'swiper-button-prev' ),
										'data-next_slide_arrow' => $settings[ 'previous_slide_arrow' ][ 'value' ]
									 ),
									'i'
								 );
								
							}
							if( 'svg' === $settings[ 'previous_slide_arrow' ][ 'library' ] ) {	
								?><div <?php $this->print_render_attribute_string( 'swiper_arrow_prev' ) ?>><?php
										Icons_Manager::render_icon( 
											$settings[ 'previous_slide_arrow' ],
											array( 
												'aria-hidden' => 'true',
												'class' => array( 'wpmozo_swiper_layout_icon_prev', 'swiper-button-prev' ),
												'data-previous_slide_arrow' => $settings[ 'previous_slide_arrow' ][ 'value' ]
											 ),
											'i'
										 )
								?></div><?php
							} ; ?> 
					</div>
					<?php
						if ( 'yes' === $show_arrow_on_hover ) {

							?>
							<style> 
								.<?php echo $order_class; ?> .wpmozo_swiper_navigation .swiper-button-prev { 
									visibility: hidden; 
									opacity: 0; 
									transition: all 300ms ease; 
								} .<?php echo $order_class; ?> .wpmozo_swiper_navigation .swiper-button-next {
									visibility: hidden; 
									opacity: 0; 
									transition: all 300ms ease;
								} .<?php echo $order_class; ?>:hover .wpmozo_swiper_navigation .swiper-button-prev, 
								.<?php echo $order_class; ?>:hover .wpmozo_swiper_navigation .swiper-button-next {
									visibility: visible;
									opacity: 1;
								} .<?php echo $order_class; ?>:hover .wpmozo_swiper_navigation .swiper-button-prev.swiper-button-disabled, .<?php echo $order_class; ?>:hover .wpmozo_swiper_navigation .swiper-button-next.swiper-button-disabled {
									opacity: 0.35;
								} .<?php echo $order_class; ?> .wpmozo_arrows_outside .swiper-button-prev {
									'declaration' => 'left: 50px;
								} .<?php echo $order_class; ?> .wpmozo_arrows_outside .swiper-button-next {
									right: 50px;
								} .<?php echo $order_class; ?>:hover .wpmozo_arrows_outside .swiper-button-prev {
									'declaration' => 'left: 0;
								} .<?php echo $order_class; ?>:hover .wpmozo_arrows_outside .swiper-button-next {
									right: 0;
								} .<?php echo $order_class; ?> .wpmozo_arrows_inside .swiper-button-prev
									left: -50px;
								} .<?php echo $order_class; ?> .wpmozo_arrows_inside .swiper-button-next {
									right: -50px;
								} .<?php echo $order_class; ?>:hover .wpmozo_arrows_inside .swiper-button-prev {
									left: 0;
								} .<?php echo $order_class; ?>:hover .wpmozo_arrows_inside .swiper-button-next {
									right: 0;
								}
						</style>
						<?php
					}
				}
				?>
					</div> <!-- wpmozo_swiper_layout_layout -->
				<?php

				if ( 'yes' === $show_control_dot ) {
					?>				
						<div class="wpmozo_swiper_pagination"><div class="swiper-pagination <?php echo  esc_attr( $control_dot_style ) ; ?>"></div></div>
					<?php
				}
				?>
				</div> <!-- wpmozo_swiper_wrapper -->
				<?php

			} else {
				?>

					<div class="entry">
						<h1>
							<?php echo esc_html__( 'No Result Found!', 'wpmozo-addons-lite-for-elementor' ); ?>
						</h1>
						<p>
							<?php echo esc_html__( 'The swiper layout you requested could not be found try changing your module settings or add some new cards.', 'wpmozo-addons-lite-for-elementor' ); ?> 
						</p>
					</div>
				<?php
			}
			$this->wpmozo_ae_render_slider_script();
		}
	}
}