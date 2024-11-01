<?php

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;

// Content tab.
// Text content controls.
$this->start_controls_section( 
	'text_content',
	array( 
		'label' => esc_html__( 'Heading Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 
		'pre_heading',
		array( 
			'label'       => esc_html__( 'Pre Heading', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Pre', 'wpmozo-addons-lite-for-elementor' ),
			'dynamic'     => array( 'active' => true ),
			'placeholder' => esc_html__( 'Pre Heading', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );
	$this->add_control( 
		'heading',
		array( 
			'label'       => esc_html__( 'Heading', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::TEXT,
			'default'     => __( ' Main ', 'wpmozo-addons-lite-for-elementor' ),
			'dynamic'     => array( 'active' => true ),
			'placeholder' => esc_html__( 'Main Heading', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );
	$this->add_control( 
		'post_heading',
		array( 
			'label'       => esc_html__( 'Post Heading', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Post', 'wpmozo-addons-lite-for-elementor' ),
			'dynamic'     => array( 'active' => true ),
			'placeholder' => esc_html__( 'Post Heading', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );
	$this->add_control( 
		'display_inline',
		array( 
			'label'        => esc_html__( 'Display In Stack', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'column',
			'default'      => '',
			'selectors'    => array( 
				'{{WRAPPER}} .wpmozo_ae_text_wrapper_inner' => 'flex-direction: {{VALUE}};',
			 ),
		 )
	 );
$this->end_controls_section();

// Style tab starts here.
// Global text settings tab starts here.
$this->start_controls_section( 
	'global_text_settings',
	array( 
		'label' => esc_html__( 'Global Text Settings', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_control( 
		'global_heading_level',
		array( 
			'label'       => esc_html__( 'Heading Level', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'options'     =>
			array( 
				'h1' =>
					array( 
						'title' => esc_html__( 'H1', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-editor-h1',
					 ),
				'h2' =>
					array( 
						'title' => esc_html__( 'H2', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-editor-h2',
					 ),
				'h3' =>
					array( 
						'title' => esc_html__( 'H3', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-editor-h3',
					 ),
				'h4' =>
					array( 
						'title' => esc_html__( 'H4', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-editor-h4',
					 ),
				'h5' =>
					array( 
						'title' => esc_html__( 'H5', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-editor-h5',
					 ),
				'h6' =>
					array( 
						'title' => esc_html__( 'H6', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-editor-h6',
					 ),
			 ),
			'default'     => 'h2',
			'separator'   => 'before',
			'toggle'      => true,
			'description' => 'Here you can select the heading level of the title',
		 )
	 );
	$this->add_responsive_control( 
		'global_text_alignment_when_flex_column',
		array( 
			'label'       => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'separator'   => 'before',
			'options'     =>
			array( 
				'flex-start' =>
					array( 
						'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-left',
					 ),
				'center'     =>
					array( 
						'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-center',
					 ),
				'flex-end'   =>
					array( 
						'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-right',
					 ),
			 ),
			'default'     => 'center',
			'toggle'      => true,
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_text_wrapper_inner' => 'align-items: {{VALUE}};' ),
			'condition'   => array( 'display_inline' => 'column' ),
		 )
	 );
	$this->add_responsive_control( 
		'global_text_alignment_when_flex_row',
		array( 
			'label'       => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'separator'   => 'before',
			'options'     =>
			array( 
				'flex-start' =>
					array( 
						'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-left',
					 ),
				'center'     =>
					array( 
						'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-center',
					 ),
				'flex-end'   =>
					array( 
						'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-right',
					 ),
			 ),
			'default'     => 'center',
			'toggle'      => true,
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_text_wrapper_inner' => 'justify-content: {{VALUE}};' ),
			'condition'   => array( 'display_inline' => '' ),
		 )
	 );
	$this->add_responsive_control( 
		'global_text_color',
		array( 
			'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#000',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_pre_text,{{WRAPPER}} .wpmozo_ae_main_text,{{WRAPPER}} .wpmozo_ae_post_text' => 'color: {{VALUE}};',
			 ),
		 )
	 );
	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'     => 'global_text_background',
			'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
			'types'    => array( 'classic', 'gradient' ),
			'selector' => '{{WRAPPER}} .wpmozo_ae_pre_text,{{WRAPPER}} .wpmozo_ae_main_text,{{WRAPPER}} .wpmozo_ae_post_text',
		 )
	 );
$this->end_controls_section();

// Pre text settings tab starts here.
$this->start_controls_section( 
	'pre_text_settings',
	array( 
		'label' => esc_html__( 'Pre Text Settings', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'       => esc_html__( 'Pre Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'pre_text_typography',
			'selector'    => '{{WRAPPER}} .wpmozo_ae_pre_text',
		 )
	 );

	$this->add_responsive_control( 
		'pre_text_alignment',
		array( 
			'label'       => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'separator'   => 'before',
			'options'     =>
			array( 
				'flex-start' =>
					array( 
						'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-left',
					 ),
				'center'     =>
					array( 
						'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-center',
					 ),
				'flex-end'   =>
					array( 
						'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-right',
					 ),
			 ),
			'default'     => 'none',
			'toggle'      => true,
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_pre_text' => 'align-self: {{VALUE}};' ),
			'condition'   => array( 'display_inline' => 'column' ),
		 )
	 );
	$this->add_control( 
		'pre_styling_section_subheading',
		array( 
			'label'     => esc_html__( 'Styling', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		 )
	 );
	// Pre text normal and hover state control section.
	$this->start_controls_tabs( 'pre_text_hover_control' );

		// Pre text normal tab.
		$this->start_controls_tab( 
			'pre_text_normal_state',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'pre_text_color',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_pre_text' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'pre_text_background',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_pre_text',
				 )
			 );
			$this->add_control( 
				'pre_normal_tab_divider',
				array( 
					'type'  => Controls_Manager::DIVIDER,
					'style' => 'thin',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'pre_text_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_pre_text',
					'separator' => 'before',
				 )
			 );
		$this->end_controls_tab();

		// Pre text hover tab.
		$this->start_controls_tab( 
			'pre_text_hover_state',
			array( 
				'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'pre_text_hover_state_color',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_pre_text:hover' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'pre_text_hover_state_background',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_pre_text:hover',
				 )
			 );
			$this->add_control( 
				'pre_hover_tab_divider',
				array( 
					'type'  => Controls_Manager::DIVIDER,
					'style' => 'thin',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'pre_text_hover_state_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_pre_text:hover',
					'separator' => 'before',
				 )
			 );
			$this->add_responsive_control( 
				'pre_text_transition_control',
				array( 
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Transition Duration ( ms )', 'wpmozo-addons-lite-for-elementor' ),
					'range'     => array( 
						'ms' => array( 
							'min'  => 0,
							'max'  => 10000,
							'step' => 100,
						 ),
					 ),
					'default'   => array( 
						'size' => 1000,
						'unit' => 'ms',
					 ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_pre_text' => 'transition: color {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_control( 
		'pre_spacing_subheading',
		array( 
			'label'     => esc_html__( 'Spacing', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		 )
	 );
	// Pre text margin and padding control section.
	$this->start_controls_tabs( 'pre_text_padding_margin_control_tabs' );
		// Pre text padding tab.
		$this->start_controls_tab( 
			'pre_text_padding_tab',
			array( 
				'label' => __( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'pre_text_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pre_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
		// Pre text margin tab.
		$this->start_controls_tab( 
			'pre_text_margin_tab',
			array( 
				'label' => __( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'pre_text_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pre_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();

// Main text settings tab starts here.
$this->start_controls_section( 
	'main_text_settings',
	array( 
		'label' => esc_html__( 'Main Text Settings', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'       => esc_html__( 'Main Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'main_text_typography',
			'selector'    => '{{WRAPPER}} .wpmozo_ae_main_text',
		 )
	 );
	$this->add_responsive_control( 
		'main_text_alignment',
		array( 
			'label'       => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'separator'   => 'before',
			'options'     =>
			array( 
				'flex-start' =>
					array( 
						'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-left',
					 ),
				'center'     =>
					array( 
						'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-center',
					 ),
				'flex-end'   =>
					array( 
						'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-right',
					 ),
			 ),
			'default'     => 'none',
			'toggle'      => true,
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_main_text' => 'align-self: {{VALUE}};',
			 ),
			'condition'   => array( 'display_inline' => 'column' ),
		 )
	 );
	$this->add_control( 
		'main_styling_section_subheading',
		array( 
			'label'     => esc_html__( 'Styling', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		 )
	 );

	// Main text normal and hover state control section.
	$this->start_controls_tabs( 'main_text_hover_control' );

		// Main text normal tab.
		$this->start_controls_tab( 
			'main_text_normal_state',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'main_text_color',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_main_text' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'main_text_background',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_main_text',
				 )
			 );
			$this->add_control( 
				'main_normal_tab_divider',
				array( 
					'type'  => Controls_Manager::DIVIDER,
					'style' => 'thin',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'main_text_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_main_text',
					'separator' => 'before',
				 )
			 );
		$this->end_controls_tab();

		// Main text hover tab.
		$this->start_controls_tab( 
			'main_text_hover_state',
			array( 
				'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'main_text_hover_state_color',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_main_text:hover' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'main_text_hover_state_background',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_main_text:hover',
				 )
			 );
			$this->add_control( 
				'main_hover_tab_divider',
				array( 
					'type'  => Controls_Manager::DIVIDER,
					'style' => 'thin',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'main_text_hover_state_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_main_text:hover',
					'separator' => 'before',
				 )
			 );
			$this->add_responsive_control( 
				'main_text_transition_control',
				array( 
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Transition Duration ( ms )', 'wpmozo-addons-lite-for-elementor' ),
					'range'     => array( 
						'ms' => array( 
							'min'  => 0,
							'max'  => 10000,
							'step' => 100,
						 ),
					 ),
					'default'   => array( 
						'size' => 1000,
						'unit' => 'ms',
					 ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_main_text' => 'transition: color {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_control( 
		'main_spacing_subheading',
		array( 
			'label'     => esc_html__( 'Spacing', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		 )
	 );

	// Main text margin and padding tabs section.
	$this->start_controls_tabs( 'main_text_padding_margin_control_tabs' );

		// Main text padding tab.
		$this->start_controls_tab( 
			'main_text_padding_tab',
			array( 
				'label' => __( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'main_text_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_main_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();

		// Main text margin tab.
		$this->start_controls_tab( 
			'main_text_margin_tab',
			array( 
				'label' => __( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'main_text_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_main_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();

// Post text setting tab starts here.
$this->start_controls_section( 
	'post_text_settings',
	array( 
		'label' => esc_html__( 'Post Text Settings', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'       => esc_html__( 'Post Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'post_typography',
			'selector'    => '{{WRAPPER}} .wpmozo_ae_post_text',
		 )
	 );
	$this->add_responsive_control( 
		'post_text_alignment',
		array( 
			'label'       => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'separator'   => 'before',
			'options'     =>
			array( 
				'flex-start' =>
					array( 
						'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-left',
					 ),
				'center'     =>
					array( 
						'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-center',
					 ),
				'flex-end'   =>
					array( 
						'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
						'icon'  => 'eicon-text-align-right',
					 ),
			 ),
			'default'     => 'none',
			'toggle'      => true,
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_post_text' => 'align-self: {{VALUE}};',
			 ),
			'condition'   => array( 'display_inline' => 'column' ),
		 )
	 );
	$this->add_control( 
		'post_styling_section_subheading',
		array( 
			'label'     => esc_html__( 'Styling', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		 )
	 );

	// Post text normal and hover state control section.
	$this->start_controls_tabs( 'post_text_hover_control' );

		// Post text normal tab.
		$this->start_controls_tab( 
			'post_text_normal_state',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'post_text_color',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_post_text' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'post_text_background',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_post_text',
				 )
			 );
			$this->add_control( 
				'post_normal_tab_divider',
				array( 
					'type'  => Controls_Manager::DIVIDER,
					'style' => 'thin',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'post_text_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_post_text',
					'separator' => 'before',
				 )
			 );
		$this->end_controls_tab();

		// Post text hover tab.
		$this->start_controls_tab( 
			'post_text_hover_state',
			array( 
				'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'post_text_hover_state_color',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_post_text:hover' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'post_text_hover_state_background',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_post_text:hover',
				 )
			 );
			$this->add_control( 
				'post_hover_tab_divider',
				array( 
					'type'  => Controls_Manager::DIVIDER,
					'style' => 'thin',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'post_text_hover_state_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_post_text:hover',
					'separator' => 'before',
				 )
			 );
			$this->add_responsive_control( 
				'post_text_transition_control',
				array( 
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Transition Duration ( ms )', 'wpmozo-addons-lite-for-elementor' ),
					'range'     => array( 
						'ms' => array( 
							'min'  => 0,
							'max'  => 10000,
							'step' => 100,
						 ),

					 ),
					'default'   => array( 
						'size' => 1000,
						'unit' => 'ms',
					 ),

					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_post_text' => 'transition: color {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_control( 
		'post_spacing_subheading',
		array( 
			'label'     => esc_html__( 'Spacing', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		 )
	 );

	$this->start_controls_tabs( 'post_text_padding_margin_control_tabs' );

		// Post text padding tab.
		$this->start_controls_tab( 
			'post_text_padding_tab',
			array( 
				'label' => __( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'post_text_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_post_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();

		// Post text margin tab.
		$this->start_controls_tab( 
			'post_text_margin_tab',
			array( 
				'label' => __( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'post_text_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_post_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();
