<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2024 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;

if ( ! class_exists( 'WPMOZO_AE_Bar_Counter' ) ) {
	class WPMOZO_AE_Bar_Counter extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_bar_counter';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Bar Counter', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-bar-counter wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since  1.0.0
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
		 * @since  1.0.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-bar-counter-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-bar-counter-style' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since  1.0.0
		 * @access protected
		 */
		protected function register_controls() {

			// Seprate file containing all the code for registering controls.
			include_once plugin_dir_path( __DIR__ ) . 'bar-counter/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since  1.0.0
		 * @access protected
		 */
		protected function render() {
			$settings            = $this->get_settings_for_display();
			$widget_id           = $this->get_id();
			$layout              = $settings[ 'layout' ];
			$title               = $settings[ 'title' ];
			$percentage          = $settings[ 'percentage' ][ 'size' ];
			$display_empty_bar   = $settings[ 'display_empty_bar' ];
			$use_strip_class     = isset( $settings[ 'use_stripes' ] ) && 'yes' === $settings[ 'use_stripes' ] ? 'wpmozo_bar_counter_animated_striped_bar' : '';
			$title_heading_level = $settings[ 'title_heading_level' ];
			$chunks_count        = intval( $percentage / 10 );
			$widget_alignment    = isset( $settings[ 'widget_alignment' ] ) ? $settings[ 'widget_alignment' ] : '';
			$stripe_color        = $settings[ 'stripe_color' ];
			$enable_animation    = $settings[ 'enable_stripe_animation' ];
			$empty_bar_class     = '';
			if ( 'yes' === $display_empty_bar ) {
				$empty_bar_class = 'empty_bar_enabled';
			}

			?>
			<style>
				.elementor-element-<?php echo esc_html( $widget_id ); ?> .wpmozo_bar_counter_filled_bar_wrapper .wpmozo_bar_counter_filled_bar.wpmozo_bar_counter_animated_striped_bar:before {
					background-image: linear-gradient( -45deg, <?php echo esc_html( $stripe_color ); ?> 25%, transparent 25%, transparent 50%, <?php echo esc_html( $stripe_color ); ?> 50%, <?php echo esc_html( $stripe_color ); ?> 75%, transparent 75%, transparent ) !important;
				}
			<?php if ( 'yes' === $enable_animation ) : ?>
					.elementor-element-<?php echo esc_html( $widget_id ); ?> .wpmozo_bar_counter_animated_striped_bar:before{
						animation-name: wpmozo_animated_stripe;
					}
			<?php endif; ?>
			</style>
			<?php if ( 'left' === $widget_alignment ) : ?>
				<style>
					.elementor-element.elementor-element-<?php echo esc_html( $widget_id ); ?>{
						margin-left:0;
						margin-right:auto;
					}
				</style>
			<?php elseif ( 'right' === $widget_alignment ) : ?>
				<style>
					.elementor-element.elementor-element-<?php echo esc_html( $widget_id ); ?>{
						margin-left:auto;
						margin-right:0;
					}
				</style>
			<?php elseif ( 'center' === $widget_alignment ) : ?>
				<style>
					.elementor-element.elementor-element-<?php echo esc_html( $widget_id ); ?>{
						margin-left:auto;
						margin-right:auto;
					}
				</style>
				<?php
			endif;

			if ( 'layout1' === $layout ) :
				?>
			<div class="wpmozo_bar_counter <?php echo esc_html( $empty_bar_class ); ?> wpmozo_bar_counter_<?php echo esc_html( $widget_id ); ?>">
				<div class="wpmozo_bar_counter_wrapper <?php echo esc_html( $layout ); ?>">
				<?php if ( ! empty( $title ) ) : ?>
					<<?php echo esc_html( $title_heading_level ); ?> class="wpmozo_bar_counter_title"><?php echo esc_html( $title ); ?></<?php echo esc_html( $title_heading_level ); ?>>
				<?php endif; ?>
					<div class="wpmozo_bar_counter_bar_wrapper">
						<?php if ( 'yes' === $display_empty_bar ) : ?>
							<div class="wpmozo_bar_counter_bar">
						<?php endif; ?>
								<div class="wpmozo_bar_counter_filled_bar_wrapper" data-percent="<?php echo esc_html( $percentage ); ?>" style="width: <?php echo esc_html( $percentage ); ?>%">
									<div class="wpmozo_bar_counter_filled_bar <?php echo esc_html( $use_strip_class ); ?>">
									</div>
									<span class="wpmozo_bar_counter_percent"><?php echo esc_html( $percentage ); ?>%</span>
								</div>
						<?php if ( 'yes' === $display_empty_bar ) : ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( 'layout2' === $layout ) : ?>
				<div class="wpmozo_bar_counter <?php echo esc_html( $empty_bar_class ); ?> wpmozo_bar_counter_<?php echo esc_html( $widget_id ); ?>">
					<div class="wpmozo_bar_counter_wrapper layout2">
						<?php if ( ! empty( $title ) ) : ?>
							<<?php echo esc_html( $title_heading_level ); ?> class="wpmozo_bar_counter_title"><?php echo esc_html( $title ); ?></<?php echo esc_html( $title_heading_level ); ?>>
						<?php endif; ?>
						<div class="wpmozo_bar_counter_bar_wrapper">
							<div class="wpmozo_bar_counter_filled_bar_wrapper" data-percent="<?php echo esc_html( $percentage ); ?>">
								<?php for ( $i = 1; $i <= 10; $i++ ) : ?>
									<?php
									$chunk_class = '';
									if ( $i <= $chunks_count ) {
										?>

											<div class = "wpmozo_bar_counter_chunks wpmozo_bar_counter_filled_chunks wpmozo_animate_filled"> </div>
										<?php
									} elseif ( 'yes' === $display_empty_bar ) {
										?>
											<div class = "wpmozo_bar_counter_chunks wpmozo_bar_counter_empty_chunks"> </div>
										<?php
									}
									?>

								<?php endfor; ?>
								<span class="wpmozo_bar_counter_percent"><?php echo esc_html( $percentage ); ?>%</span>
							</div>
						</div>
					</div>
				</div>
				<?php
			endif;
		}
	}
}
