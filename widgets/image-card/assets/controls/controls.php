<?php
use \Elementor\Utils;
use \Elementor\Plugin;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Flex_Item;

// Content tab.

// Image setting controls.
$this->start_controls_section( 
	'image_setting',
	array( 
		'label' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 
		'image_card_image',
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
			'default' => 'thumbnail',
		 )
	 );
$this->end_controls_section();

// Title and content setting controls.
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
			'default'     => 'Image Card Title',
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
			'default'     => '',
		 )
	 );
$this->end_controls_section();

// Icon controls.
$this->start_controls_section( 
	'icon_content',
	array( 
		'label' => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 
		'select_icon',
		array( 
			'label'            => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'             => Controls_Manager::ICONS,
			'default'          => array( 
				'value'   => '',
				'library' => '',
			 ),
		 )
	 );

$this->end_controls_section();

// Button content controls.
$this->start_controls_section( 
	'button_content',
	array( 
		'label' => esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 
		'button_text',
		array( 
			'label'       => esc_html__( 'Button Text', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::TEXT,
			'dynamic'     => array( 'active' => true ),
			'default'     => esc_html__( 'Click Me!', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );
	$this->add_control( 
		'button_url',
		array( 
			'label'         => esc_html__( 'Button Url', 'wpmozo-addons-lite-for-elementor' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => esc_html__( 'Enter url', 'wpmozo-addons-lite-for-elementor' ),
			'show_external' => true,
			'default'       => array( 
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			 ),
		 )
	 );
	$this->add_control( 
		'button_icon',
		array( 
			'label'            => esc_html__( 'Button Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'             => Controls_Manager::ICONS,
			'default'          => array( 
				'value'   => 'fas fa-star',
				'library' => 'fa-solid',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'button_icon_position',
		array( 
			'label'     => esc_html__( 'Button Icon Position', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array( 
				'row-reverse' => array( 
					'title' => esc_html__( 'Before', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-angle-left',
				 ),
				'row'  => array( 
					'title' => esc_html__( 'After', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-angle-right',
				 ),
			 ),
			'default'   => 'row-reverse',
			'prefix_class' => 'icon_',
			'toggle'    => false,
			'selectors'    => array( 
				'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button' => 'flex-flow:{{VALUE}}; gap:5px;'
			 ),
			'condition' => array( 'button_icon[value]!' => '' ),
		 )
	 );
	$this->add_control( 
		'show_icon_on_hover_switcher',
		array( 
			'label'        => esc_html__( 'Show Icon On Hover', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
			'selectors'    => array( 
				'{{WRAPPER}}.icon_row-reverse .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button .wpmozo_ae_button_icon, {{WRAPPER}}.icon_row-reverse .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button svg' => 'opacity: 0; transition: all 300ms; margin-right: -{{button_text_normal_state_typography_font_size.SIZE}}{{button_text_normal_state_typography_font_size.UNIT}};',
				'{{WRAPPER}}.icon_row-reverse .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover .wpmozo_ae_button_icon, {{WRAPPER}}.icon_row-reverse .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover svg' => 'opacity: 1; margin-right:0;',
				'{{WRAPPER}}.icon_row .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button .wpmozo_ae_button_icon, {{WRAPPER}}.icon_row .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button svg' => 'opacity: 0; transition: all 300ms; margin-left: -{{button_text_normal_state_typography_font_size.SIZE}}{{button_text_normal_state_typography_font_size.UNIT}};',
				'{{WRAPPER}}.icon_row .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover .wpmozo_ae_button_icon, {{WRAPPER}}.icon_row .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover svg' => 'opacity: 1; margin-left:0;',
				'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button .wpmozo_ae_button_icon' => ' min-width:{{button_text_normal_state_typography_font_size.SIZE}}{{button_text_normal_state_typography_font_size.UNIT}};',
				'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button' => ' gap:0px;',
				'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover' => 'gap:5px;',

			 ),
			'condition'    => array( 
				'button_icon[value]!'  => '',
			 ),
		 )
	 );
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
			$this->add_responsive_control( 
				'title_text_color',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#222',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_title' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'title_text_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_image_card_title',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'title_text_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_image_card_title',
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
					'label_block' => true,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_inner_content_wrapper .wpmozo_ae_image_card_title:hover' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'title_text_hover_state_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_image_card_inner_content_wrapper .wpmozo_ae_image_card_title:hover',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'title_text_hover_state_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_image_card_inner_content_wrapper .wpmozo_ae_image_card_title:hover',
					'separator' => 'before',
				 )
			 );
			$this->add_responsive_control( 
				'title_transition_duration',
				array( 
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Transition Duration ( ms ) ', 'wpmozo-addons-lite-for-elementor' ),
					'range'     => array( 
						'ms' => array( 
							'min'  => 0,
							'max'  => 10000,
							'step' => 100,
						 ),
					 ),
					'default'   => array( 
						'size' => 300,
						'unit' => 'ms',
					 ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_title' => 'transition: {{SIZE}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();

	$this->add_responsive_control( 
		'title_text_alignment',
		array( 
			'label'       => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
			'default'     => is_rtl() ? 'right' : 'left',
			'toggle'      => true,
			'separator'   => 'before',
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_image_card_title' => 'text-align: {{VALUE}};' ),
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
	$this->start_controls_tabs( 'content_normal_and_hover_state_control_tab' );
		// Content normal tab.
		$this->start_controls_tab( 
			'content_normal_state_tab',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
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
						'{{WRAPPER}} .wpmozo_ae_image_card_content' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'content_text_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_image_card_content',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'content_text_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_image_card_content',
					'separator' => 'before',
				 )
			 );
		$this->end_controls_tab();

		// Content hover tab.
		$this->start_controls_tab( 
			'content_hover_state_tab',
			array( 
				'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'content_text_hover_state_color',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_inner_content_wrapper .wpmozo_ae_image_card_content:hover' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'content_text_hover_state_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_image_card_inner_content_wrapper .wpmozo_ae_image_card_content:hover',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'content_text_hover_state_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_image_card_inner_content_wrapper .wpmozo_ae_image_card_content:hover',
					'separator' => 'before',
				 )
			 );
			$this->add_responsive_control( 
				'content_transition_duration',
				array( 
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Transition Duration ( ms ) ', 'wpmozo-addons-lite-for-elementor' ),
					'range'     => array( 
						'ms' => array( 
							'min'  => 0,
							'max'  => 10000,
							'step' => 100,
						 ),
					 ),
					'default'   => array( 
						'size' => 300,
						'unit' => 'ms',
					 ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_content' => 'transition: {{SIZE}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();
	$this->end_controls_tabs();

	$this->add_responsive_control( 
		'content_text_alignment',
		array( 
			'label'       => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
			'default'     => is_rtl() ? 'right' : 'left',
			'toggle'      => true,
			'separator'   => 'before',
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_image_card_content' => 'text-align: {{VALUE}};' ),
		 )
	 );
$this->end_controls_section();

// Image controls.
$this->start_controls_section( 
	'header_image_settings',
	array( 
		'label' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );

	$this->add_responsive_control( 
		'image_alignment',
		array( 
			'label'     => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array( 
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
			'toggle'    => true,
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_image_card_wrapper_inner' => 'text-align: {{VALUE}};',
			 ),
		 )
	 );
	$this->add_group_control( 
		Group_Control_Border::get_type(),
		array( 
			'name'     => 'image_border',
			'label'    => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => 'div.wpmozo_ae_image_card_wrapper_inner img',
		 )
	 );
	$this->add_responsive_control( 
		'image_border_radius',
		array( 
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				'div.wpmozo_ae_image_card_wrapper_inner img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 ),
		 )
	 );
	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'      => 'image_background',
			'label'     => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
			'types'     => array( 'classic', 'gradient' ),
			'selector'  => '{{WRAPPER}} .wpmozo_ae_image_card_wrapper_inner',
			'separator' => 'before',
		 )
	 );
	$this->start_controls_tabs( 'image_padding_margin_control_tabs' );
		// Image padding tab.
		$this->start_controls_tab( 
			'image_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'image_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_wrapper_inner > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();

		// Image margin tab.
		$this->start_controls_tab( 
			'image_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'image_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_wrapper_inner > img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();

$this->end_controls_section();

// Icon style controls.
$this->start_controls_section( 
	'icon_settings',
	array( 
		'label'     => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 'select_icon[value]!' => '' ),
	 )
 );
	$this->add_responsive_control( 
		'icon_color',
		array( 
			'label'       => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::COLOR,
			'default'     => '',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_image_card_icon' => 'color: {{VALUE}};',
				'{{WRAPPER}} .wpmozo_ae_image_card_icon_wrapper svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'icon_size',
		array( 
			'label'       => esc_html__( 'Size', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SLIDER,
			'size_units'  => array( 'px' ),
			'range'       => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 150,
					'step' => 1,
				 ),
			 ),
			'default'     => array( 
				'size' => '40',
				'unit' => 'px',
			 ),
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_image_card_icon' => 'font-size: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .wpmozo_ae_image_card_icon_wrapper svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .wpmozo_ae_image_card_icon_wrapper' => 'margin-top: calc( calc( -{{SIZE}}{{UNIT}} / 2 ) - calc( {{icon_padding.TOP}}{{icon_padding.UNIT}} + 24px ) );',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'icon_alignment',
		array( 
			'label'     => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array( 
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
			'toggle'    => true,
			'default'   => '',
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_image_card_icon_wrapper' => 'text-align: {{VALUE}};',
			 ),
			'separator' => 'before',
		 )
	 );
	$this->add_control( 
		'icon_style_switcher',
		array( 
			'label'        => esc_html__( 'Style Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
		 )
	 );
	$this->add_control( 
		'select_icon_shape',
		array( 
			'label'       => esc_html__( 'Select Style', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'square' => esc_html__( 'Square', 'wpmozo-addons-lite-for-elementor' ),
				'circle' => esc_html__( 'Circle', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => 'square',
			'condition'   => array( 
				'icon_style_switcher' => 'yes',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'icon_shape_background_color',
		array( 
			'label'       => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '',
			'selectors'   =>
			array( 
				'{{WRAPPER}} .wpmozo_ae_icon_shape_square,
		{{WRAPPER}} .wpmozo_ae_icon_shape_circle,
		{{WRAPPER}} .wpmozo_ae_icon_shape_square_container svg,
		{{WRAPPER}} .wpmozo_ae_icon_shape_circle_container svg, 
		{{WRAPPER}} .wpmozo_ae_image_card_icon_wrapper svg' => 'background-color: {{VALUE}};',
			 ),

			'condition'   => array( 
				'icon_style_switcher' => 'yes',
			 ),
		 )
	 );
	$this->add_control( 
		'icon_border_switcher',
		array( 
			'label'        => esc_html__( 'Show Icon Border', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
		 )
	 );
	$this->add_responsive_control( 
		'icon_border_color',
		array( 
			'label'       => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::COLOR,
			'default'     => '',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_image_card_icon.wpmozo_ae_icon_shape_square,
		{{WRAPPER}} .wpmozo_ae_image_card_icon.wpmozo_ae_icon_shape_circle,
		{{WRAPPER}} .wpmozo_ae_image_card_icon_wrapper > svg' => 'border: 2px solid {{VALUE}};',
			 ),
			'condition'   => array( 
				'icon_border_switcher' => 'yes',
			 ),
		 )
	 );
	$this->add_control( 
		'icon_padding_margin_heading',
		array( 
			'label' => esc_html__( 'Padding and Margin', 'wpmozo-addons-lite-for-elementor' ),
			'type'  => Controls_Manager::HEADING,

		 )
	 );

	$this->start_controls_tabs( 'icon_padding_margin_control_tabs' );

		// Icon padding tab.
		$this->start_controls_tab( 
			'icon_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'icon_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'default'    => array( 
						'top'    => 5,
						'right'  => 5,
						'bottom' => 5,
						'left'   => 5,
					 ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_icon,
						{{WRAPPER}} .wpmozo_ae_image_card_icon .wpmozo_ae_icon_shape_square,
							{{WRAPPER}} .wpmozo_ae_image_card_icon .wpmozo_ae_icon_shape_circle, 
						{{WRAPPER}} .wpmozo_ae_image_card_icon_wrapper svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();

		$this->start_controls_tab( 
			'icon_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'icon_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'default'    => array( 
						'top'    => 5,
						'right'  => 5,
						'bottom' => 5,
						'left'   => 5,
					 ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_icon,
						{{WRAPPER}} .wpmozo_ae_image_card_icon .wpmozo_ae_icon_shape_square,
							{{WRAPPER}} .wpmozo_ae_image_card_icon .wpmozo_ae_icon_shape_circle,
						{{WRAPPER}} .wpmozo_ae_image_card_icon_wrapper > svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();

// Button style controls.
$this->start_controls_section( 
	'button_settings',
	array( 
		'label' => esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->start_controls_tabs( 'button_normal_and_hover_state_control_tabs' );
		// Button normal tab.
		$this->start_controls_tab( 
			'button_normal_state_tab',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'button_text_color_normal_state',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#6EC1E4',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_button' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_responsive_control( 
				'button_icon_color_normal_state',
				array( 
					'label'       => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_button .wpmozo_ae_button_icon' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button svg.wpmozo_ae_button_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'          => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block'    => true,
					'name'           => 'button_text_normal_state_typography',
					'selector'       => '{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button',
					'fields_options' => array( 
						'typography' => array( 
							'default' => 'yes',
						 ),
						'font_size' => array( 
							'selectors' => array( 
								'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button' => 'font-size:{{SIZE}}{{UNIT}};',
							 ),
							'default'   => array( 'size' => 18 ),
						 ),
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'button_text_shadow_normal_state',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button',
					'separator' => 'before',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Box_Shadow::get_type(),
				array( 
					'name'     => 'button_box_shadow_normal_state',
					'label'    => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Border::get_type(),
				array( 
					'name'           => 'button_border_normal_state',
					'label'          => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
					'selector'       => '{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button',
					'fields_options' => array( 
						'border' => array( 'default' => 'solid' ),
						'width'  => array( 
							'default' => array( 
								'top'    => 2,
								'right'  => 2,
								'bottom' => 2,
								'left'   => 2,
							 ),
						 ),
					 ),
				 )
			 );
			$this->add_responsive_control( 
				'button_border_radius_normal_state',
				array( 
					'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'default'    => array( 
						'top'    => 0,
						'right'  => 0,
						'bottom' => 0,
						'left'   => 0,
					 ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'button_background_normal_state',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button',
				 )
			 );
		$this->end_controls_tab();

		// Button hover tab.
		$this->start_controls_tab( 
			'button_hover_state_tab',
			array( 
				'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'button_text_color_hover_state',
				array( 
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover, {{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover, {{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_responsive_control( 
				'button_icon_color_hover_state',
				array( 
					'label'       => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_button:hover .wpmozo_ae_button_icon' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover svg.wpmozo_ae_button_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'          => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block'    => true,
					'name'           => 'button_text_hover_state_typography',
					'selector'       => '{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper_inner:hover',
					'fields_options' => array( 
						'font_size' => array( 
							'selectors' => array( 
								'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover' => 'font-size:{{SIZE}}{{UNIT}};',
							 ),
						 ),
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'button_text_shadow_hover_state',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover',
					'separator' => 'before',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Box_Shadow::get_type(),
				array( 
					'name'     => 'button_box_shadow_hover_state',
					'label'    => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Border::get_type(),
				array( 
					'name'     => 'button_border_hover_state',
					'label'    => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover',
				 )
			 );
			$this->add_responsive_control( 
				'button_border_radius_hover_state',
				array( 
					'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'button_background_hover_state',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button:hover',
				 )
			 );
			$this->add_control( 
				'button_hover_animation',
				array( 
					'label'     => esc_html__( 'Hover Animation', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::HOVER_ANIMATION,
					'separator' => 'before',
				 )
			 );
			$this->add_responsive_control( 
				'button_transition_duration',
				array( 
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Transition Duration ( ms ) ', 'wpmozo-addons-lite-for-elementor' ),
					'range'     => array( 
						'ms' => array( 
							'min'  => 0,
							'max'  => 10000,
							'step' => 100,
						 ),
					 ),
					'default'   => array( 
						'size' => 300,
						'unit' => 'ms',
					 ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper, {{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button' => 'transition: color {{SIZE}}{{UNIT}}, border {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, border-radius {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, font {{SIZE}}{{UNIT}}, size {{SIZE}}{{UNIT}}, letter-spacing {{SIZE}}{{UNIT}}, word-spacing {{SIZE}}{{UNIT}}, margin 300ms; animation-duration:{{SIZE}}{{UNIT}}; transition-timing-function: linear;',

						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button svg' => 'transition: color {{SIZE}}{{UNIT}}, fill {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, height {{SIZE}}{{UNIT}}, width {{SIZE}}{{UNIT}}, opacity 300ms; animation-duration:{{SIZE}}{{UNIT}}; transition-timing-function: linear;',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();

	$this->add_responsive_control( 
		'button_text_alignment',
		array( 
			'label'     => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array( 
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
			'toggle'    => true,
			'default'   => 'center',
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper' => 'text-align: {{VALUE}};',
			 ),
			'separator' => 'before',
		 )
	 );
	$this->add_control( 
		'button_padding_margin_heading',
		array( 
			'label' => esc_html__( 'Padding and Margin', 'wpmozo-addons-lite-for-elementor' ),
			'type'  => Controls_Manager::HEADING,
		 )
	 );
	$this->start_controls_tabs( 'button_padding_margin_control_tabs' );
		// Button padding tab.
		$this->start_controls_tab( 
			'button_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'button_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'default'    => array( 
						'top'    => 3,
						'right'  => 3,
						'bottom' => 3,
						'left'   => 3,
					 ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();

		// Button margin tab.
		$this->start_controls_tab( 
			'button_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'button_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'default'    => array( 
						'top'    => 10,
						'right'  => 10,
						'bottom' => 10,
						'left'   => 10,
					 ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_image_card_button_wrapper .wpmozo_ae_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();

// Advance styling with content padding.
$this->start_controls_section( 
	'_section_style',
	array( 
		'label' => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_ADVANCED,
	 )
 );
	// Element name for the navigator.
	$this->add_control( 
		'_title',
		array( 
			'label'       => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::HIDDEN,
			'render_type' => 'none',
		 )
	 );
	$this->add_responsive_control( 
		'content_padding',
		array( 
			'label'      => esc_html__( 'Content Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%', 'rem', 'custom' ),
			'default'    => array( 
				'top'    => 20,
				'right'  => 20,
				'bottom' => 20,
				'left'   => 20,
			 ),
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_ae_image_card_content_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'_margin',
		array( 
			'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%', 'rem', 'custom' ),
			'selectors'  => array( 
				'{{WRAPPER}} > .elementor-widget-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'_padding',
		array( 
			'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%', 'rem', 'custom' ),
			'selectors'  => array( 
				'{{WRAPPER}} > .elementor-widget-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 ),
		 )
	 );
	$experiments_manager = Plugin::$instance->experiments;
	$is_container_active = $experiments_manager->is_feature_active( 'container' );
	$this->add_responsive_control( 
		'_element_width',
		array( 
			'label'                => esc_html__( 'Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'                 => Controls_Manager::SELECT,
			'default'              => '',
			'options'              => array( 
				''        => esc_html__( 'Default', 'wpmozo-addons-lite-for-elementor' ),
				'inherit' => esc_html__( 'Full Width', 'wpmozo-addons-lite-for-elementor' ) . ' ( 100% )',
				'auto'    => esc_html__( 'Inline', 'wpmozo-addons-lite-for-elementor' ) . ' ( auto )',
				'initial' => esc_html__( 'Custom', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'selectors_dictionary' => array( 
				'inherit' => '100%',
			 ),
			'prefix_class'         => 'elementor-widget%s__width-',
			'selectors'            => array( 
				'{{WRAPPER}}' => 'width: {{VALUE}}; max-width: {{VALUE}};',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'_element_custom_width',
		array( 
			'label'      => esc_html__( 'Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'default'    => array( 
				'unit' => '%',
			 ),
			'range'      => array( 
				'px' => array( 
					'max'  => 1000,
					'step' => 1,
				 ),
				'%'  => array( 
					'max'  => 100,
					'step' => 1,
				 ),
			 ),
			'size_units' => array( 'px', '%', 'vw', 'custom' ),
			'selectors'  => array( 
				'{{WRAPPER}}' => '--container-widget-width: {{SIZE}}{{UNIT}}; --container-widget-flex-grow: 0; width: var( --container-widget-width, {{SIZE}}{{UNIT}} ); max-width: {{SIZE}}{{UNIT}};',
			 ),
			'condition'  => array( '_element_width' => 'initial' ),
		 )
	 );

	// Register Flex controls only if the Container experiment is active.
	if ( $is_container_active ) {
		$this->add_group_control( 
			Group_Control_Flex_Item::get_type(),
			array( 
				'name'           => '_flex',
				// Hack to increase specificity and make sure that the current widget overrides the
				// parent flex settings.
				'selector'       => '{{WRAPPER}}.elementor-element',
				'include'        => array( 
					'align_self',
					'order',
					'order_custom',
					'size',
					'grow',
					'shrink',
				 ),
				'fields_options' => array( 
					'align_self' => array( 
						'separator' => 'before',
					 ),
				 ),
			 )
		 );
	}

	$vertical_align_conditions = array( 
		'_element_width!' => '',
		'_position'       => '',
	 );

	if ( $is_container_active ) {
		$vertical_align_conditions[ '_element_vertical_align!' ] = ''; // TODO: For BC.
	}
	// TODO: For BC - Remove in the future.
	$this->add_responsive_control( 
		'_element_vertical_align',
		array( 
			'label'     => esc_html__( 'Vertical Align', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array( 
				'flex-start' => array( 
					'title' => esc_html__( 'Start', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-v-align-top',
				 ),
				'center'     => array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-v-align-middle',
				 ),
				'flex-end'   => array( 
					'title' => esc_html__( 'End', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-v-align-bottom',
				 ),
			 ),
			'condition' => $vertical_align_conditions,
			'selectors' => array( 
				'{{WRAPPER}}' => 'align-self: {{VALUE}};',
			 ),
		 )
	 );
	$this->add_control( 
		'_position_description',
		array( 
			'raw'             => '<strong>' . esc_html__( 'Please note!', 'wpmozo-addons-lite-for-elementor' ) . '</strong> ' . esc_html__( 'Custom positioning is not considered best practice for responsive web design and should not be used too frequently.', 'wpmozo-addons-lite-for-elementor' ),
			'type'            => Controls_Manager::RAW_HTML,
			'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
			'render_type'     => 'ui',
			'condition'       => array( 
				'_position!' => '',
			 ),
		 )
	 );
	$this->add_control( 
		'_position',
		array( 
			'label'              => esc_html__( 'Position', 'wpmozo-addons-lite-for-elementor' ),
			'type'               => Controls_Manager::SELECT,
			'default'            => '',
			'options'            => array( 
				''         => esc_html__( 'Default', 'wpmozo-addons-lite-for-elementor' ),
				'absolute' => esc_html__( 'Absolute', 'wpmozo-addons-lite-for-elementor' ),
				'fixed'    => esc_html__( 'Fixed', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'prefix_class'       => 'elementor-',
			'frontend_available' => true,
			'separator'          => 'before',
		 )
	 );
	$start = is_rtl() ? esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ) : esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' );
	$end   = ! is_rtl() ? esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ) : esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' );
	$this->add_control( 
		'_offset_orientation_h',
		array( 
			'label'       => esc_html__( 'Horizontal Orientation', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'toggle'      => false,
			'default'     => 'start',
			'options'     => array( 
				'start' => array( 
					'title' => $start,
					'icon'  => 'eicon-h-align-left',
				 ),
				'end'   => array( 
					'title' => $end,
					'icon'  => 'eicon-h-align-right',
				 ),
			 ),
			'classes'     => 'elementor-control-start-end',
			'render_type' => 'ui',
			'condition'   => array( 
				'_position!' => '',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'_offset_x',
		array( 
			'label'      => esc_html__( 'Offset', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => array( 
				'px' => array( 
					'min'  => -1000,
					'max'  => 1000,
					'step' => 1,
				 ),
				'%'  => array( 
					'min' => -200,
					'max' => 200,
				 ),
				'vw' => array( 
					'min' => -200,
					'max' => 200,
				 ),
				'vh' => array( 
					'min' => -200,
					'max' => 200,
				 ),
			 ),
			'default'    => array( 
				'size' => '0',
			 ),
			'size_units' => array( 'px', '%', 'vw', 'vh', 'custom' ),
			'selectors'  => array( 
				'body:not( .rtl ) {{WRAPPER}}' => 'left: {{SIZE}}{{UNIT}};',
				'body.rtl {{WRAPPER}}'       => 'right: {{SIZE}}{{UNIT}};',
			 ),
			'condition'  => array( 
				'_offset_orientation_h!' => 'end',
				'_position!'             => '',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'_offset_x_end',
		array( 
			'label'      => esc_html__( 'Offset', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => array( 
				'px' => array( 
					'min'  => -1000,
					'max'  => 1000,
					'step' => 0.1,
				 ),
				'%'  => array( 
					'min' => -200,
					'max' => 200,
				 ),
				'vw' => array( 
					'min' => -200,
					'max' => 200,
				 ),
				'vh' => array( 
					'min' => -200,
					'max' => 200,
				 ),
			 ),
			'default'    => array( 
				'size' => '0',
			 ),
			'size_units' => array( 'px', '%', 'vw', 'vh', 'custom' ),
			'selectors'  => array( 
				'body:not( .rtl ) {{WRAPPER}}' => 'right: {{SIZE}}{{UNIT}};',
				'body.rtl {{WRAPPER}}'       => 'left: {{SIZE}}{{UNIT}};',
			 ),
			'condition'  => array( 
				'_offset_orientation_h' => 'end',
				'_position!'            => '',
			 ),
		 )
	 );
	$this->add_control( 
		'_offset_orientation_v',
		array( 
			'label'       => esc_html__( 'Vertical Orientation', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'toggle'      => false,
			'default'     => 'start',
			'options'     => array( 
				'start' => array( 
					'title' => esc_html__( 'Top', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-v-align-top',
				 ),
				'end'   => array( 
					'title' => esc_html__( 'Bottom', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-v-align-bottom',
				 ),
			 ),
			'render_type' => 'ui',
			'condition'   => array( 
				'_position!' => '',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'_offset_y',
		array( 
			'label'      => esc_html__( 'Offset', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => array( 
				'px' => array( 
					'min'  => -1000,
					'max'  => 1000,
					'step' => 1,
				 ),
				'%'  => array( 
					'min' => -200,
					'max' => 200,
				 ),
				'vh' => array( 
					'min' => -200,
					'max' => 200,
				 ),
				'vw' => array( 
					'min' => -200,
					'max' => 200,
				 ),
			 ),
			'size_units' => array( 'px', '%', 'vh', 'vw', 'custom' ),
			'default'    => array( 
				'size' => '0',
			 ),
			'selectors'  => array( 
				'{{WRAPPER}}' => 'top: {{SIZE}}{{UNIT}};',
			 ),
			'condition'  => array( 
				'_offset_orientation_v!' => 'end',
				'_position!'             => '',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'_offset_y_end',
		array( 
			'label'      => esc_html__( 'Offset', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => array( 
				'px' => array( 
					'min'  => -1000,
					'max'  => 1000,
					'step' => 1,
				 ),
				'%'  => array( 
					'min' => -200,
					'max' => 200,
				 ),
				'vh' => array( 
					'min' => -200,
					'max' => 200,
				 ),
				'vw' => array( 
					'min' => -200,
					'max' => 200,
				 ),
			 ),
			'size_units' => array( 'px', '%', 'vh', 'vw', 'custom' ),
			'default'    => array( 
				'size' => '0',
			 ),
			'selectors'  => array( 
				'{{WRAPPER}}' => 'bottom: {{SIZE}}{{UNIT}};',
			 ),
			'condition'  => array( 
				'_offset_orientation_v' => 'end',
				'_position!'            => '',
			 ),
		 )
	 );
	$this->add_responsive_control( 
		'_z_index',
		array( 
			'label'     => esc_html__( 'Z-Index', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::NUMBER,
			'selectors' => array( 
				'{{WRAPPER}}' => 'z-index: {{VALUE}};',
			 ),
		 )
	 );
	$this->add_control( 
		'_element_id',
		array( 
			'label'          => esc_html__( 'CSS ID', 'wpmozo-addons-lite-for-elementor' ),
			'type'           => Controls_Manager::TEXT,
			'dynamic'        => array( 
				'active' => true,
			 ),
			'default'        => '',
			'title'          => esc_html__( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'wpmozo-addons-lite-for-elementor' ),
			'style_transfer' => false,
			'classes'        => 'elementor-control-direction-ltr',
		 )
	 );
	$this->add_control( 
		'_css_classes',
		array( 
			'label'        => esc_html__( 'CSS Classes', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::TEXT,
			'dynamic'      => array( 
				'active' => true,
			 ),
			'prefix_class' => '',
			'title'        => esc_html__( 'Add your custom class WITHOUT the dot. e.g: my-class', 'wpmozo-addons-lite-for-elementor' ),
			'classes'      => 'elementor-control-direction-ltr',
		 )
	 );
$this->end_controls_section();