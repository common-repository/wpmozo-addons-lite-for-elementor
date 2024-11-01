<?php
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;

// Content tab.
$this->start_controls_section( 
	'content_section',
	array( 
		'label' => esc_html__( 'Fancy Text Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 
		'text_style',
		array( 
			'label'       => esc_html__( 'Text Style', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'wpmozo_ae_gradient' => esc_html__( 'Gradient', 'wpmozo-addons-lite-for-elementor' ),
				'wpmozo_ae_clipping' => esc_html__( 'Background Clipping', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => 'wpmozo_ae_gradient',
		 )
	 );
	$this->add_control( 
		'fancy_text',
		array( 
			'label'       => esc_html__( 'Fancy Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'default'     => esc_html__( 'Here you can set text.', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );
$this->end_controls_section();

// Style tab.
$this->start_controls_section( 
	'fancy_text_settings',
	array( 
		'label' => esc_html__( 'Fancy Text Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'           => 'text_color_gradient',
			'types'          => array( 'gradient' ),
			'fields_options' => array( 
				'background' => array( 
					'label'   => _x( 'Gradient', 'Background Control', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'  => false,
					'default' => 'gradient',
				 ),
				'color'      => array( 
					'default' => '#062ACA',
				 ),
				'color_b'    => array( 
					'default' => '#9401D9',
				 ),
			 ),
			'selector'       => '{{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner',
			'condition'      => array( 
				'text_style' => 'wpmozo_ae_gradient',
			 ),
		 )
	 );
	$this->add_control( 
		'clip_image',
		array( 
			'label'       => esc_html__( 'Clip Background Image', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true,
			'default'     => array( 
				'url' => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==',
			 ),
			'condition'   => array( 
				'text_style' => 'wpmozo_ae_clipping',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'clip_bg_size',
		array( 
			'label'       => esc_html__( 'Background Size', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'cover'   => esc_html__( 'Cover', 'wpmozo-addons-lite-for-elementor' ),
				'contain' => esc_html__( 'Fit', 'wpmozo-addons-lite-for-elementor' ),
				'auto'    => esc_html__( 'Actual Size', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => 'cover',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_clipping_text:before' => 'background-size: {{VALUE}};',
			 ),
			'condition'   => array( 
				'text_style' => 'wpmozo_ae_clipping',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'clip_bg_position',
		array( 
			'label'       => esc_html__( 'Background Position', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'top left'      => esc_html__( 'Top Left', 'wpmozo-addons-lite-for-elementor' ),
				'top center'    => esc_html__( 'Top Center', 'wpmozo-addons-lite-for-elementor' ),
				'top right'     => esc_html__( 'Top Right', 'wpmozo-addons-lite-for-elementor' ),
				'center left'   => esc_html__( 'Center Left', 'wpmozo-addons-lite-for-elementor' ),
				'center'        => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'center right'  => esc_html__( 'Center Right', 'wpmozo-addons-lite-for-elementor' ),
				'bottom left'   => esc_html__( 'Bottom Left', 'wpmozo-addons-lite-for-elementor' ),
				'bottom center' => esc_html__( 'Bottom Center', 'wpmozo-addons-lite-for-elementor' ),
				'bottom right'  => esc_html__( 'Bottom Right', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => 'center',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_clipping_text:before' => 'background-position: {{VALUE}};',
			 ),
			'condition'   => array( 
				'text_style' => 'wpmozo_ae_clipping',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'clip_bg_repeat',
		array( 
			'label'       => esc_html__( 'Background Repeat', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'initial'  => esc_html__( 'No Repeat', 'wpmozo-addons-lite-for-elementor' ),
				'repeat'   => esc_html__( 'Repeat', 'wpmozo-addons-lite-for-elementor' ),
				'repeat-x' => esc_html__( 'Repeat X ( horizontal )', 'wpmozo-addons-lite-for-elementor' ),
				'repeat-y' => esc_html__( 'Repeat Y ( vertical )', 'wpmozo-addons-lite-for-elementor' ),
				'space'    => esc_html__( 'Space', 'wpmozo-addons-lite-for-elementor' ),
				'round'    => esc_html__( 'Round', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => 'initial',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_clipping_text:before' => 'background-repeat: {{VALUE}};',
			 ),
			'condition'   => array( 
				'text_style' => 'wpmozo_ae_clipping',
			 ),
		 )
	 );

	$this->add_control( 
		'clip_overlay',
		array( 
			'label'       => esc_html__( 'Background Color Overlay', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'none'     => esc_html__( 'None', 'wpmozo-addons-lite-for-elementor' ),
				'color'    => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
				'gradient' => esc_html__( 'Gradient', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => 'none',
			'condition'   => array( 
				'text_style' => 'wpmozo_ae_clipping',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'clip_bg_color',
		array( 
			'label'     => esc_html__( 'Clip Background Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner:after' => 'background-color: {{VALUE}};',
			 ),
			'condition' => array( 
				'text_style'   => 'wpmozo_ae_clipping',
				'clip_overlay' => 'color',
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'           => 'clip_color_gradient',
			'types'          => array( 'gradient' ),
			'fields_options' => array( 
				'background' => array( 
					'label'   => _x( 'Gradient', 'Background Control', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'  => false,
					'default' => 'gradient',
				 ),
				'color'      => array( 
					'default' => '#062ACA',
				 ),
				'color_b'    => array( 
					'default' => '#9401D9',
				 ),
			 ),
			'selector'       => '{{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner::after',
			'condition'      => array( 
				'text_style'   => 'wpmozo_ae_clipping',
				'clip_overlay' => 'gradient',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'overlay_custom_padding',
		array( 
			'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_ae_text_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 ),
			'condition'  => array( 
				'text_style'   => 'wpmozo_ae_clipping',
				'clip_overlay' => array( 'color', 'gradient' ),
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'fancy_text_alignment',
		array( 
			'label'       => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => false,
			'options'     => array( 
				'left' =>
				array( 
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				 ),
				'center'     =>
				array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				 ),
				'right'   =>
				array( 
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				 ),
				'justify'   =>
				array( 
					'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-justify',
				 ),
			 ),
			'default'     => 'center',
			'toggle'      => true,
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner' => 'text-align: {{VALUE}};' ),
		 )
	 );
$this->end_controls_section();

// Fancy text typography controls start here.
$this->start_controls_section( 
	'fancy_text_typography',
	array( 
		'label' => esc_html__( 'Fancy Text Typography', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'name'     => 'wpmozo_ae_fancy_text_typography',
			'selector' => '{{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h1, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h2, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h3, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h4, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h5, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h6, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner',
		 )
	 );

	$this->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'     => 'wpmozo_ae_fancy_text_shadow',
			'selector' => '{{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h1, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h2, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h3, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h4, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h5, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner h6, {{WRAPPER}} .wpmozo_ae_text_wrapper .wpmozo_ae_text_wrapper_inner',
		 )
	 );
$this->end_controls_section();
