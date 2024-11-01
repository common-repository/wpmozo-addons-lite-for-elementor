<?php
use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;

// Content tab.
// Content controls.
$this->start_controls_section( 
	'title_and_content_text_setting',
	array( 
		'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 
		'title_text',
		array( 
			'label'       => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Image Card Title', 'wpmozo-addons-lite-for-elementor' ),
			'dynamic'     => array( 'active' => true ),
			'placeholder' => esc_html__( 'Enter Title Here', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );
	$this->add_control( 
		'content_text',
		array( 
			'label'       => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'placeholder' => esc_html__( 'Enter Content Here', 'wpmozo-addons-lite-for-elementor' ),
			'show_label'  => true,
			'dynamic'     => array( 'active' => true ),
			'default'     => 'Your content goes here. Edit this text inline or in the widget Content settings. You can also style every aspect of this content in the widget Design settings.',
		 )
	 );
$this->end_controls_section();

// Image controls.
$this->start_controls_section( 
	'image_setting',
	array( 
		'label' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 
		'image',
		array( 
			'label'   => esc_html__( 'Choose Image', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::MEDIA,
			'dynamic' => array( 
				'active' => true,
			 ),
			'default' => array( 
				'url' => Utils::get_placeholder_image_src(),
				'id'  => 'thisistheimage',
			 ),
		 )
	 );
	$this->add_group_control( 
		Group_Control_Image_Size::get_type(),
		array( 
			'name'    => 'image_size',
			'default' => 'full',
		 )
	 );
$this->end_controls_section();

// Style tab.
// Layout selection controls.
$this->start_controls_section( 
	'layout_selection_section',
	array( 
		'label' => esc_html__( 'Select Layout', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_control( 
		'select_layout',
		array( 
			'label'       => esc_html__( 'Select Layout', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'lily'   => esc_html__( 'Effect: Lily', 'wpmozo-addons-lite-for-elementor' ),
				'sadie'  => esc_html__( 'Effect: Sadie', 'wpmozo-addons-lite-for-elementor' ),
				'roxy'   => esc_html__( 'Effect: Roxy', 'wpmozo-addons-lite-for-elementor' ),
				'bubba'  => esc_html__( 'Effect: Bubba', 'wpmozo-addons-lite-for-elementor' ),
				'romeo'  => esc_html__( 'Effect: Romeo', 'wpmozo-addons-lite-for-elementor' ),
				'layla'  => esc_html__( 'Effect: Layla', 'wpmozo-addons-lite-for-elementor' ),
				'oscar'  => esc_html__( 'Effect: Oscar', 'wpmozo-addons-lite-for-elementor' ),
				'marley' => esc_html__( 'Effect: Marley', 'wpmozo-addons-lite-for-elementor' ),
				'ruby'   => esc_html__( 'Effect: Ruby', 'wpmozo-addons-lite-for-elementor' ),
				'milo'   => esc_html__( 'Effect: Milo', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => 'lily',
		 )
	 );
$this->end_controls_section();

// Layout style controls.
$this->start_controls_section( 
	'layout_styling_section',
	array( 
		'label' => esc_html__( 'Layout Settings', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_responsive_control( 
		'border_color',
		array( 
			'label'       => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#000',
			'selectors'   => array( 
				'{{WRAPPER}} figure.effect-roxy figcaption::before, {{WRAPPER}} figure.effect-bubba figcaption::before, {{WRAPPER}} figure.effect-bubba figcaption::after, {{WRAPPER}} figure.effect-layla figcaption::before, {{WRAPPER}} figure.effect-layla figcaption::after, {{WRAPPER}} figure.effect-oscar figcaption::before, {{WRAPPER}} figure.effect-ruby .wpmozo_ae_interactive_image_card_wrapper_content, {{WRAPPER}} figure.effect-milo .wpmozo_ae_interactive_image_card_wrapper_content' => 'border-color: {{VALUE}};',
				'{{WRAPPER}} figure.effect-romeo figcaption::before, {{WRAPPER}} figure.effect-romeo figcaption::after, {{WRAPPER}} figure.effect-marley .wpmozo_ae_interactive_image_card_title::after' => 'background-color: {{VALUE}};',
			 ),
			'condition'   =>
			array( 
				'select_layout' =>
					array( 'roxy', 'bubba', 'romeo', 'layla', 'oscar', 'marley', 'ruby', 'milo' ),
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'border_size_slider',
		array( 
			'label'      => esc_html__( 'Border Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				 ),
				'%'  => array( 
					'min' => 0,
					'max' => 100,
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
			'default'    => array( 
				'size' => '1',
				'unit' => 'px',
			 ),
			'size_units' => array( 'px', '%', 'vw', 'vh' ),
			'selectors'  =>
			array( 
				'{{WRAPPER}} figure.effect-roxy figcaption::before,
				{{WRAPPER}} figure.effect-oscar figcaption::before,
				{{WRAPPER}} figure.effect-ruby .wpmozo_ae_interactive_image_card_wrapper_content'
				=> 'border-width: {{SIZE}}{{UNIT}};',

				'{{WRAPPER}} figure.effect-bubba figcaption::before, 
				{{WRAPPER}} figure.effect-layla figcaption::before'
				=> 'border-top-width: {{SIZE}}{{UNIT}}; border-bottom-width: {{SIZE}}{{UNIT}};',

				'{{WRAPPER}} figure.effect-bubba figcaption::after, 
				{{WRAPPER}} figure.effect-layla figcaption::after'
				=> 'border-left-width: {{SIZE}}{{UNIT}};',

				'{{WRAPPER}} figure.effect-bubba figcaption::after, 
				{{WRAPPER}} figure.effect-layla figcaption::after, 
				{{WRAPPER}} figure.effect-milo .wpmozo_ae_interactive_image_card_wrapper_content'
				=> 'border-right-width: {{SIZE}}{{UNIT}};',

				'{{WRAPPER}} figure.effect-romeo figcaption::after,
				{{WRAPPER}} figure.effect-romeo figcaption::before,
				{{WRAPPER}} figure.effect-marley figcaption .wpmozo_ae_interactive_image_card_title::after'
				=> 'height: {{SIZE}}{{UNIT}};',
			 ),
			'condition'  =>
			array( 
				'select_layout' =>
					array( 'roxy', 'bubba', 'romeo', 'layla', 'oscar', 'marley', 'ruby', 'milo' ),
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'image_opacity_slider',
		array( 
			'label'     => esc_html__( 'Image Opacity', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     =>
			array( 
				'%' =>
				array( 
					'min'  => 0,
					'max'  => 1.0,
					'step' => 0.01,
				 ),
			 ),
			'default'   => array( 
				'size' => '0.7',
				'unit' => '%',
			 ),
			'selectors' =>
			array( 
				'{{WRAPPER}} figure img' => 'opacity: {{SIZE}};',
			 ),
		 )
	 );
$this->end_controls_section();

// Overlay style controls.
$this->start_controls_section( 
	'image_overlay_color_section',
	array( 
		'label'     => esc_html__( 'Overlay Color', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' =>
			array( 
				'select_layout' => array( 'lily', 'sadie', 'roxy', 'bubba', 'layla', 'oscar', 'ruby', 'milo' ),
			 ),
	 )
 );
	$this->start_controls_tabs( 'overlay_normal_and_hover_state_control_tab' );
		// Title normal tab.
		$this->start_controls_tab( 
			'overlay_normal_state_tab',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'image_overlay_color',
					'exclude' => array( 'image' ),
					'fields_options' => array( 
						'background' => array( 
							'label' => esc_html__( 'Overlay Color', 'wpmozo-addons-lite-for-elementor' ),
						 ),
					 ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} figure.effect-lily, {{WRAPPER}} figure.effect-sadie figcaption::before, {{WRAPPER}} figure.effect-roxy, {{WRAPPER}} figure.effect-bubba, {{WRAPPER}} figure.effect-layla, {{WRAPPER}} figure.effect-oscar, {{WRAPPER}} figure.effect-ruby, {{WRAPPER}} figure.effect-milo',
				 )
			 );
		$this->end_controls_tab();
		$this->start_controls_tab( 
			'overlay_hover_state_tab',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'image_hover_overlay_color',
					'exclude' => array( 'image' ),
					'fields_options' => array( 
						'background' => array( 
							'label' => esc_html__( 'Overlay Color', 'wpmozo-addons-lite-for-elementor' ),
						 ),
					 ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} figure.effect-lily:hover, {{WRAPPER}} figure.effect-sadie figcaption:hover::before, {{WRAPPER}} figure.effect-roxy:hover, {{WRAPPER}} figure.effect-bubba:hover, {{WRAPPER}} figure.effect-layla:hover, {{WRAPPER}} figure.effect-oscar:hover, {{WRAPPER}} figure.effect-ruby:hover, {{WRAPPER}} figure.effect-milo:hover',
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();

// Title style controls.
$this->start_controls_section( 
	'title_styling_section',
	array( 
		'label' => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_control( 
		'title_heading_level',
		array( 
			'label'       => esc_html__( 'Title Heading Level', 'wpmozo-addons-lite-for-elementor' ),
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
			'toggle'      => false,
		 )
	 );
	$this->start_controls_tabs( 'title_normal_and_hover_state_control_tab' );
		// Title normal tab.
		$this->start_controls_tab( 
			'title_normal_state_tab',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			// Settings for first tab.
			$this->add_responsive_control( 
				'title_text_color',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#222',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_interactive_image_card_title' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Title Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'title_text_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_interactive_image_card_title',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'title_text_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_interactive_image_card_title',
					'separator' => 'before',
				 )
			 );
		$this->end_controls_tab();

		// Title hover tab.
		$this->start_controls_tab( 
			'title_hover_state_tab',
			array( 
				'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'title_text_hover_state_color',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} figure:hover .wpmozo_ae_interactive_image_card_title' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Title Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'title_text_hover_state_typography',
					'selector'    => '{{WRAPPER}} figure:hover .wpmozo_ae_interactive_image_card_title',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'title_text_hover_state_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} figure:hover .wpmozo_ae_interactive_image_card_title',
					'separator' => 'before',
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_responsive_control( 
		'title_text_alignment',
		array( 
			'label'       => esc_html__( 'Title Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'options'     => array( 
				'left'    => array( 
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				 ),
				'center'  => array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				 ),
				'right'   => array( 
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				 ),
				'justify' => array( 
					'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-justify',
				 ),
			 ),
			'default'     => 'center',
			'toggle'      => true, // Behave like toggle or not.
			'separator'   => 'before',
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_interactive_image_card_title' => 'text-align: {{VALUE}};' ),
			'condition'   => array( 'select_layout' => array( 'lily', 'sadie', 'roxy', 'bubba', 'romeo', 'layla', 'oscar', 'marley', 'ruby' ) ),
		 )
	 );
$this->end_controls_section();

// Content style controls.
$this->start_controls_section( 
	'content_text_styling_section',
	array( 
		'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_responsive_control( 
		'content_text_color',
		array( 
			'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#222',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_interactive_image_card_wrapper_content' => 'color: {{VALUE}};',
			 ),
		 )
	 );
	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'       => esc_html__( 'Content Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'content_text_typography',
			'selector'    => '{{WRAPPER}} .wpmozo_ae_interactive_image_card_wrapper_content',
		 )
	 );
	$this->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'      => 'content_text_shadow',
			'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector'  => '{{WRAPPER}} .wpmozo_ae_interactive_image_card_wrapper_content',
			'separator' => 'before',
		 )
	 );
	$this->add_responsive_control( 
		'content_text_alignment',
		array( 
			'label'       => esc_html__( 'Content Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'options'     => array( 
				'left'    => array( 
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				 ),
				'center'  => array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				 ),
				'right'   => array( 
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				 ),
				'justify' => array( 
					'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-justify',
				 ),
			 ),
			'default'     => 'center',
			'toggle'      => true, // Behave like toggle or not.
			'separator'   => 'before',
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_interactive_image_card_wrapper_content' => 'text-align: {{VALUE}};' ),
			'condition'   => array( 'select_layout' => array( 'lily', 'sadie', 'roxy', 'bubba', 'romeo', 'layla', 'oscar', 'marley', 'ruby' ) ),
		 )
	 );
$this->end_controls_section();

// Interactive Image controls.
$this->start_controls_section( 
	'interactive_image_alignment',
	array( 
		'label'     => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_ADVANCED,
		'condition' => array( 
			'image_size_size!' => 'full',
			'image_size_size!' => 'custom',
		 ),
	 )
 );
	$this->add_responsive_control( 
		'layout_alignment',
		array( 
			'label'       => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'options'     => array( 
				'left'   => array( 
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				 ),
				'center' => array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				 ),
				'right'  => array( 
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				 ),
			 ),
			'default'     => 'center',
			'toggle'      => true, // Behave like toggle or not.
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_interactive_image_card_wrapper' => 'justify-content: {{VALUE}};' ),
		 )
	 );
$this->end_controls_section();
