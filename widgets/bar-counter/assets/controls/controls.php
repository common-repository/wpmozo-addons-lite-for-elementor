<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Css_Filter;

// Configuration controls start here.
$this->start_controls_section( 
	'configuration_section',
	array( 
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 
		'layout',
		array( 
			'label'       => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::SELECT,
			'default'     => 'layout1',
			'options'     => array( 
				'layout1' => esc_html__( 'Layout 1', 'wpmozo-addons-lite-for-elementor' ),
				'layout2' => esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'render_type' => 'template',
		 )
	 );
	$this->add_control( 
		'title',
		array( 
			'label'       => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		 )
	 );
	$this->add_control( 
		'percentage',
		array( 
			'label'       => esc_html__( 'Percentage', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::SLIDER,
			'range'       => array( 
				'%' => array( 
					'min' => 0,
					'max' => 100,
				 ),
			 ),
			'default'     => array( 
				'unit' => '%',
				'size' => 50,
			 ),
			'render_type' => 'template',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_bar_counter  .wpmozo_bar_counter_filled_bar_wrapper' => 'width: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );
	$this->add_control( 
		'display_empty_bar',
		array( 
			'label'        => esc_html__( 'Display Empty Bar/Chunks', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'Show', 'wpmozo-addons-lite-for-elementor' ),
			'label_off'    => esc_html__( 'Hide', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => 'no',
		 )
	 );
	$this->add_control( 
		'enable_custom_bar_size',
		array( 
			'label'        => esc_html__( 'Enable Custom Chunks Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'Show', 'wpmozo-addons-lite-for-elementor' ),
			'label_off'    => esc_html__( 'Hide', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => 'no',
			'condition'    => array( 
				'layout' => 'layout2',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'chunks_width',
		array( 
			'label'     => esc_html__( 'Chunks Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'      => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 1000,
					'step' => 1,
				 ),
				'vw' => array( 
					'min' => 0,
					'max' => 200,
				 ),
				'vh' => array( 
					'min' => 0,
					'max' => 200,
				 ),
			 ),
			'default'   => array( 
				'unit' => '%',
				'size' => 50,
			 ),
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_bar_counter_bar_wrapper .wpmozo_bar_counter_chunks, {{WRAPPER}} .wpmozo_bar_counter_bar_wrapper .wpmozo_bar_counter_bar' => 'max-width: {{SIZE}}{{UNIT}};',
			 ),
			'size_units' => array( 'px', 'vw', 'vh' ),
			'condition' => array( 
				'enable_custom_bar_size' => 'yes',
				'layout' => 'layout2',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'chunks_height',
		array( 
			'label'     => esc_html__( 'Chunks Height', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'      => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 1000,
					'step' => 1,
				 ),
				'vw' => array( 
					'min' => 0,
					'max' => 200,
				 ),
				'vh' => array( 
					'min' => 0,
					'max' => 200,
				 ),
			 ),
			'default'   => array( 
				'unit' => 'px',
				'size' => 50,
			 ),
			'size_units' => array( 'px', 'vw', 'vh' ),
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_bar_counter_bar_wrapper .wpmozo_bar_counter_chunks, {{WRAPPER}} .wpmozo_bar_counter_bar_wrapper .wpmozo_bar_counter_bar' => 'height: {{SIZE}}{{UNIT}};',
			 ),
			'condition' => array( 
				'enable_custom_bar_size' => 'yes',
				'layout' => 'layout2',
			 ),
		 )
	 );
	$this->add_control( 
		'use_stripes',
		array( 
			'label'        => esc_html__( 'Use Stripes', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
			'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => 'no',
			'condition'    => array( 
				'layout' => 'layout1',
			 ),
		 )
	 );
	$this->add_control( 
		'stripe_color',
		array( 
			'label'       => esc_html__( 'Stripe Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::COLOR,
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_bar_counter_wrapper.layout1 .wpmozo_bar_counter_bar_wrapper .wpmozo_bar_counter_animated_striped_bar:before' => '				
	            background-image: linear-gradient( -45deg, {{VALUE}} 25%, transparent 25%, transparent 50%, {{VALUE}} 50%, {{VALUE}} 75%, transparent 75%, transparent ) !important;
	            ',
			 ),
			'render_type' => 'template',
			'condition'   => array( 
				'use_stripes' => 'yes',
				'layout'      => 'layout1',
			 ),
		 )
	 );
	$this->add_control( 
		'enable_stripe_animation',
		array( 
			'label'        => esc_html__( 'Enable Stripe Animation', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
			'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => 'no',
			'condition'    => array( 
				'use_stripes' => 'yes',
				'layout'      => 'layout1',
			 ),
		 )
	 );
	$this->add_control( 
		'animatin_speed',
		array( 
			'label'     => esc_html__( 'Animation Speed', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 
				'px' => array( 
					'min'  => 1,
					'max'  => 10,
					'step' => 1,
				 ),

			 ),
			'default'   => array( 
				'unit' => 'px',
				'size' => 3,
			 ),
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_bar_counter_animated_striped_bar:before' => 'animation-duration: {{SIZE}}s !important;',
			 ),
			'condition' => array( 
				'use_stripes'             => 'yes',
				'enable_stripe_animation' => 'yes',
				'layout'                  => 'layout1',
			 ),
		 )
	 );
	$this->end_controls_section();

	// Background section controls start here.
	$this->start_controls_section( 
		'background_section',
		array( 
			'label' => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		 )
	 );
	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'           => 'bar_background',
			'types'          => array( 'classic', 'gradient', 'video' ),
			'selector'       => '{{WRAPPER}} .wpmozo_bar_counter .wpmozo_bar_counter_chunks.wpmozo_bar_counter_empty_chunks , {{WRAPPER}} .wpmozo_bar_counter .wpmozo_bar_counter_bar',
			'fields_options' => array( 
				'background' => array( 
					'label' => esc_html__( 'Bar/Chunks Background', 'wpmozo-addons-lite-for-elementor' ),
				 ),
			 ),
		 )
	 );
	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'           => 'filled_bar_background',
			'types'          => array( 'classic', 'gradient', 'video' ),
			'selector'       => '{{WRAPPER}} .wpmozo_bar_counter .wpmozo_bar_counter_filled_chunks:before , {{WRAPPER}} .wpmozo_bar_counter .layout1 .wpmozo_bar_counter_filled_bar',
			'fields_options' => array( 
				'background' => array( 
					'label' => esc_html__( 'Filled Bar/Chunks Background', 'wpmozo-addons-lite-for-elementor' ),
				 ),
			 ),
			'separator'      => 'before',
		 )
	 );
	$this->end_controls_section();

	// Text style controls start here.
	$this->start_controls_section( 
		'text_style_section',
		array( 
			'label' => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		 )
	 );
	$this->start_controls_tabs( 'title_and_percentage_tabs' );
		// Tab 1.
		$this->start_controls_tab( 
			'title_tab',
			array( 
				'label' => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_control( 
				'title_heading_level',
				array( 
					'label'       => esc_html__( 'Title Heading Level', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array( 
						'h1' => array( 
							'title' => esc_html__( 'H1', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-editor-h1',
						 ),
						'h2' => array( 
							'title' => esc_html__( 'H2', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-editor-h2',
						 ),
						'h3' => array( 
							'title' => esc_html__( 'H3', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-editor-h3',
						 ),
						'h4' => array( 
							'title' => esc_html__( 'H4', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-editor-h4',
						 ),
						'h5' => array( 
							'title' => esc_html__( 'H5', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-editor-h5',
						 ),
						'h6' => array( 
							'title' => esc_html__( 'H6', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-editor-h6',
						 ),
					 ),
					'default'     => 'h2',
					'toggle'      => true,
				 )
			 );
			$this->add_responsive_control( 
				'title_color',
				array( 
					'label'     => esc_html__( 'Title Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_bar_counter_wrapper .wpmozo_bar_counter_title' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'name'     => 'title_typography',
					'label'    => esc_html__( 'Title Typography', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_bar_counter_wrapper .wpmozo_bar_counter_title',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'     => 'title_text_shadow',
					'label'    => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_bar_counter_wrapper .wpmozo_bar_counter_title',
				 )
			 );
			$this->add_responsive_control( 
				'title_alignment',
				array( 
					'label'       => esc_html__( 'Title Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array( 
						'left'   =>
							array( 
								'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							 ),
						'center' =>
							array( 
								'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							 ),
						'right'  =>
							array( 
								'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							 ),
					 ),
					'default'     => 'left',
					'toggle'      => true,
					'condition'   => array( 
						'layout' => 'layout1',
					),
					'selectors'   => array( '{{WRAPPER}} .wpmozo_bar_counter_wrapper .wpmozo_bar_counter_title' => 'text-align: {{VALUE}};' ),
				)
			);
			$this->end_controls_tab();
			// Tab 2.
			$this->start_controls_tab( 
				'percentage_tab',
				array( 
					'label' => esc_html__( 'Percentage', 'wpmozo-addons-lite-for-elementor' ),
				 )
			 );
			$this->add_responsive_control( 
				'percentage_color',
				array( 
					'label'     => esc_html__( 'Percentage Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_bar_counter_bar_wrapper .wpmozo_bar_counter_percent' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'name'     => 'percentage_typography',
					'label'    => esc_html__( 'Percentage Typography', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_bar_counter_bar_wrapper .wpmozo_bar_counter_percent',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'     => 'percentage_text_shadow',
					'label'    => esc_html__( 'Percentage Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_bar_counter_bar_wrapper .wpmozo_bar_counter_percent',
				 )
			 );
			$this->add_responsive_control( 
				'percentage_alignment',
				array( 
					'label'       => esc_html__( 'Percentage Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array( 
						'left'   =>
							array( 
								'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							 ),
						'center' =>
							array( 
								'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							 ),
						'right'  =>
							array( 
								'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							 ),
					 ),
					'default'     => 'right',
					'toggle'      => true,
					'condition'   => array( 
						'layout' => 'layout1',
					),
					'selectors'   => array( '{{WRAPPER}} .wpmozo_bar_counter_bar_wrapper .wpmozo_bar_counter_percent' => 'text-align: {{VALUE}};' ),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();

			// Spacing controls start here.
			$this->start_controls_section( 
				'border_section',
				array( 
					'label' => esc_html__( 'Bar/Chunk  Border', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				 )
			 );
			$this->add_group_control( 
				Group_Control_Border::get_type(),
				array( 
					'name'     => 'bar_border',
					'label'    => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_bar_counter .wpmozo_bar_counter_chunks, {{WRAPPER}} .wpmozo_bar_counter .layout1 .wpmozo_bar_counter_bar_wrapper',

				 )
			 );
			$this->add_responsive_control( 
				'bar_border_radius',
				array( 
					'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_bar_counter .wpmozo_bar_counter_chunks, {{WRAPPER}}  .wpmozo_bar_counter .layout1 .wpmozo_bar_counter_bar_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
			$this->end_controls_section();