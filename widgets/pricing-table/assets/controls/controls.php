<?php

use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Border;

// Header settings.
$this->start_controls_section( 
	'header_content',
	array( 
		'label' => esc_html__( 'Header', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );

	$this->add_control( 
		'table_title_text',
		array( 
			'label'       => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'WPMozo Pricing', 'wpmozo-addons-lite-for-elementor' ),
			'dynamic'     => array( 'active' => true ),
			'placeholder' => esc_html__( 'Enter Title', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );

	$this->add_control( 
		'table_subtitle_text',
		array( 
			'label'       => esc_html__( 'Subtitle', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Ultimate plan', 'wpmozo-addons-lite-for-elementor' ),
			'dynamic'     => array( 'active' => true ),
			'placeholder' => esc_html__( 'Enter Subtitle', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );

	$this->add_control( 
		'header_graphics',
		array( 
			'label'     => esc_html__( 'Header Graphics', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array( 
				'icon'  => array( 
					'title' => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-icon-box',
				 ),
				'image' => array( 
					'title' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-image',
				 ),
			 ),
			'default'   => 'icon',
			'toggle'    => true,
			'separator' => 'before',
		 )
	 );

	$this->add_control( 
		'header_icon',
		array( 
			'label'            => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'             => Controls_Manager::ICONS,
			'fa4compatibility' => 'header_icon_old',
			'default'          => array( 
				'value'   => 'fas fa-star',
				'library' => 'fa-solid',
			 ),
			'condition'        => array( 
				'header_graphics' => 'icon',
			 ),
		 )
	 );

	$this->add_control( 
		'header_image',
		array( 
			'label'     => esc_html__( 'Choose Image', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::MEDIA,
			'default'   => array( 
				'url' => Utils::get_placeholder_image_src(),
				'id'  => 'placehoder_image',
			 ),
			'condition' => array( 
				'header_graphics' => 'image',
			 ),
		 )
	 );

$this->end_controls_section();

// Pricing settings.
$this->start_controls_section( 
	'pricing_content',
	array( 
		'label' => esc_html__( 'Table Pricing', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );

	$this->add_control( 
		'currency_symbol',
		array( 
			'label'   => esc_html__( 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'options' => array( 
				''        => esc_html__( 'None', 'wpmozo-addons-lite-for-elementor' ),
				'dollar'  => '&#36;' . _x( ' Dollar', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'euro'    => '&#128;' . _x( ' Euro', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'baht'    => '&#3647; ' . _x( 'Baht', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'franc'   => '&#8355; ' . _x( 'Franc', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'guilder' => '&fnof; ' . _x( 'Guilder', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'krona'   => 'kr ' . _x( 'Krona', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'lira'    => '&#8356; ' . _x( 'Lira', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'peseta'  => '&#8359 ' . _x( 'Peseta', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'peso'    => '&#8369; ' . _x( 'Peso', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'pound'   => '&#163; ' . _x( 'Pound Sterling', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'real'    => 'R$ ' . _x( 'Real', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'ruble'   => '&#8381; ' . _x( 'Ruble', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'rupee'   => '&#8360; ' . _x( 'Rupee', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'inr'     => '&#8377; ' . _x( 'Rupee ( Indian )', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'shekel'  => '&#8362; ' . _x( 'Shekel', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'yen'     => '&#165; ' . _x( 'Yen/Yuan', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'won'     => '&#8361; ' . _x( 'Won', 'Currency Symbol', 'wpmozo-addons-lite-for-elementor' ),
				'custom'  => esc_html__( 'Custom', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default' => 'dollar',
		 )
	 );

	$this->add_control( 
		'currency_symbol_custom',
		array( 
			'label'     => esc_html__( 'Custom Symbol', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::TEXT,
			'dynamic'   => array( 'active' => true ),
			'condition' => array( 
				'currency_symbol' => 'custom',
			 ),
		 )
	 );

	$this->add_control( 
		'table_price',
		array( 
			'label'       => esc_html__( 'Price', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::NUMBER,
			'min'         => 0,
			'max'         => 10000,
			'step'        => 1,
			'default'     => 139,
			'placeholder' => esc_html__( 'Enter your price', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );

	$this->add_control( 
		'currency_position',
		array( 
			'label'     => esc_html__( 'Currency Symbol Position', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array( 
				'before' => array( 
					'title' => esc_html__( 'Before', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-angle-left',
				 ),
				'after'  => array( 
					'title' => esc_html__( 'After', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-angle-right',
				 ),
			 ),
			'default'   => 'before',
			'toggle'    => false,
			'condition' => array( 'table_price!' => '' ),
		 )
	 );

	$this->add_control( 
		'pricing_period',
		array( 
			'label'       => esc_html__( 'Period', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'dynamic'     => array( 'active' => true ),
			'default'     => __( 'Year', 'wpmozo-addons-lite-for-elementor' ),
			'placeholder' => esc_html__( 'Enter your period', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );

$this->end_controls_section();

// Features settings.
$this->start_controls_section( 
	'features_content',
	array( 
		'label' => esc_html__( 'Features', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );

	$repeater = new Repeater();

	$repeater->add_control( 
		'list_feature',
		array( 
			'label'       => esc_html__( 'Feature 1', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::TEXT,
			'dynamic'     => array( 'active' => true ),
			'default'     => esc_html__( 'Enter Feature', 'wpmozo-addons-lite-for-elementor' ),
			'placeholder' => esc_html__( 'Enter Feature', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );

	$repeater->add_control( 
		'list_icon',
		array( 
			'label'            => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'             => Controls_Manager::ICONS,
			'fa4compatibility' => 'list_icon_old',
			'default'          => array( 
				'value'   => 'fas fa-dot-circle',
				'library' => 'fa-solid',
			 ),
		 )
	 );

	$repeater->add_control( 
		'enable_custom_styles',
		array( 
			'label'        => esc_html__( 'Enable Custom Style', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'return_value' => 'yes',
			'separator'    => 'before',
		 )
	 );

	$repeater->add_responsive_control( 
		'feature_row_background_color',
		array( 
			'label'       => esc_html__( 'Row Background', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_features_list{{CURRENT_ITEM}}' => 'background: {{VALUE}};',
			 ),
			'condition'   => array( 
				'enable_custom_styles' => 'yes',
			 ),
		 )
	 );

	$repeater->add_control( 
		'feature_list_heading',
		array( 
			'label'     => esc_html__( 'Features', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => array( 
				'enable_custom_styles' => 'yes',
			 ),
		 )
	 );

	$repeater->add_responsive_control( 
		'features_list_text_color',
		array( 
			'label'       => esc_html__( 'List Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			/*'default'     => '#222',*/
			'selectors'   => array( 
				'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_ae_pricing_table_feature_text' => 'color: {{VALUE}};',
			 ),
			'condition'   => array( 
				'enable_custom_styles' => 'yes',
			 ),
		 )
	 );

	$repeater->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'          => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block'    => true,
			'name'           => 'features_list_text_typography',
			'selector'       => '{{WRAPPER}} {{CURRENT_ITEM}}.wpmozo_ae_pricing_table_features_list',
			/*'fields_options' => array( 
				'typography' => array( 
					'default' => 'yes',
				 ),
				'font_size' => array( 
					'selectors' => array( 
						'{{WRAPPER}} {{CURRENT_ITEM}}.wpmozo_ae_pricing_table_features_list svg.wpmozo_ae_pricing_table_feature_icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} {{CURRENT_ITEM}}.wpmozo_ae_pricing_table_features_list .wpmozo_ae_pricing_table_feature_icon, {{WRAPPER}} {{CURRENT_ITEM}}.wpmozo_ae_pricing_table_features_list' => 'font-size:{{SIZE}}{{UNIT}};',
					 ),
					'default'   => array( 'size' => 18 ),
				 ),
			 ),*/
			'condition'   => array( 
				'enable_custom_styles' => 'yes',
			 ),
		 )
	 );
	/*$repeater->add_responsive_control( 
		'feature_list_font_size',
		array( 
			'type'       => Controls_Manager::SLIDER,
			'label'      => esc_html__( 'Font Size', 'wpmozo-addons-lite-for-elementor' ),
			'range'      => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 1000,
					'step' => 1,
				 ),
				'%'  => array( 
					'min' => 0,
					'max' => 200,
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
				'size' => '18',
				'unit' => 'px',
			 ),
			'size_units' => array( 'px', '%', 'vw', 'vh' ),
			'selectors'  => array( 
				'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_ae_pricing_table_feature_text, 
                {{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_ae_pricing_table_feature_icon' => 'font-size: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			 ),
			'condition'  => array( 
				'enable_custom_styles' => 'yes',
			 ),
		 )
	 );*/

	$repeater->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'      => 'feature_list_text_shadow',
			'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_ae_pricing_table_feature_text',
			'separator' => 'after',
			'condition' => array( 
				'enable_custom_styles' => 'yes',
			 ),
		 )
	 );

	$repeater->add_control( 
		'list_icon_heading',
		array( 
			'label'     => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => array( 
				'enable_custom_styles' => 'yes',
			 ),
		 )
	 );

	$repeater->add_responsive_control( 
		'list_icon_text_color',
		array( 
			'label'       => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '',
			'selectors'   => array( 
				'{{WRAPPER}} {{CURRENT_ITEM}}.wpmozo_ae_pricing_table_features_list .wpmozo_ae_pricing_table_feature_icon' => 'color: {{VALUE}};',
				'{{WRAPPER}} {{CURRENT_ITEM}}.wpmozo_ae_pricing_table_features_list svg.wpmozo_ae_pricing_table_feature_icon' => 'color: {{VALUE}}; fill:{{VALUE}};',
			 ),
			'condition'   => array( 
				'enable_custom_styles' => 'yes',
			 ),
		 )
	 );

	$repeater->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'           => 'list_icon_text_shadow_when_svg',
			'label'          => esc_html__( 'Icon Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'fields_options' => array( 
				'text_shadow' => array( 
					'selectors' => array( 
						'{{WRAPPER}} .{{CURRENT_ITEM}} svg' => 'filter: drop-shadow( {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}} );',
					 ),
				 ),
			 ),
			'separator'      => 'after',
			'condition'      => array( 
				'enable_custom_styles' => 'yes',
				'list_icon[library]'   => 'svg',
			 ),
		 )
	 );

	$this->add_control( 
		'features_list',
		array( 
			'label'       => esc_html__( 'Features List', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => array( 
				array( 
					'list_feature' => esc_html__( 'Feature #1', 'wpmozo-addons-lite-for-elementor' ),
					'list_icon'    => 'fa fa-caret-right',
				 ),
				array( 
					'list_feature' => esc_html__( 'Feature #2', 'wpmozo-addons-lite-for-elementor' ),
					'list_icon'    => 'fa fa-caret-right',
				 ),
				array( 
					'list_feature' => esc_html__( 'Feature #3', 'wpmozo-addons-lite-for-elementor' ),
					'list_icon'    => 'fa fa-caret-right',
				 ),
			 ),
			'title_field' => '{{ list_feature }}',
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
				'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button' => 'flex-flow:{{VALUE}}; gap:5px;'
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
				'{{WRAPPER}}.icon_row-reverse .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button .wpmozo_ae_button_icon, {{WRAPPER}}.icon_row-reverse .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button svg' => 'opacity: 0; transition: all 300ms; margin-right: -{{button_text_normal_state_typography_font_size.SIZE}}{{button_text_normal_state_typography_font_size.UNIT}};',
				'{{WRAPPER}}.icon_row-reverse .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover .wpmozo_ae_button_icon, {{WRAPPER}}.icon_row-reverse .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover svg' => 'opacity: 1; margin-right:0;',
				'{{WRAPPER}}.icon_row .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button .wpmozo_ae_button_icon, {{WRAPPER}}.icon_row .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button svg' => 'opacity: 0; transition: all 300ms; margin-left: -{{button_text_normal_state_typography_font_size.SIZE}}{{button_text_normal_state_typography_font_size.UNIT}};',
				'{{WRAPPER}}.icon_row .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover .wpmozo_ae_button_icon, {{WRAPPER}}.icon_row .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover svg' => 'opacity: 1; margin-left:0;',
				'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button .wpmozo_ae_button_icon' => ' min-width:{{button_text_normal_state_typography_font_size.SIZE}}{{button_text_normal_state_typography_font_size.UNIT}};',
				'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button' => ' gap:0px;',
				'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover' => 'gap:5px;',

			 ),
			'condition'    => array( 
				'button_icon[value]!'  => '',
			 ),
		 )
	 );
$this->end_controls_section();

// Style tab.
// Global alignment.
$this->start_controls_section( 
	'global_alingment',
	array( 
		'label' => esc_html__( 'Global Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );

	$this->add_responsive_control( 
		'global_alignment',
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
			'default'     => 'center',
			'toggle'      => true,
			'separator'   => 'after',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_wrapper' => 'text-align: {{VALUE}};',
			 ),
		 )
	 );

$this->end_controls_section();

// Title styling.
$this->start_controls_section( 
	'title_settings',
	array( 
		'label' => esc_html__( 'Title Styling', 'wpmozo-addons-lite-for-elementor' ),
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
			'default'     => 'h3',
			'separator'   => 'after',
			'toggle'      => false,
		 )
	 );

	$this->add_responsive_control( 
		'title_text_color',
		array( 
			'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#000',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_title' => 'color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'title_text_typography',
			'selector'    => '{{WRAPPER}} .wpmozo_ae_pricing_table_title',
		 )
	 );

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
			'toggle'      => true,
			'separator'   => 'after',
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_pricing_table_title' => 'text-align: {{VALUE}};' ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'     => 'title_background',
			'label'    => esc_html__( 'Background Title', 'wpmozo-addons-lite-for-elementor' ),
			'types'    => array( 'classic', 'gradient' ),
			'selector' => '{{WRAPPER}} .wpmozo_ae_pricing_table_title',
		 )
	 );

	$this->start_controls_tabs( 'title_padding_margin_control_tabs' );

		// Tab 1.
		$this->start_controls_tab( 
			'title_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for first tab.
			$this->add_responsive_control( 
				'title_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

		// Tab 2.
		$this->start_controls_tab( 
			'title_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for second tab.
			$this->add_responsive_control( 
				'title_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

	$this->end_controls_tabs();

$this->end_controls_section();

// Subtitle styling.
$this->start_controls_section( 
	'subtitle_settings',
	array( 
		'label' => esc_html__( 'Subtitle Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );

	$this->add_responsive_control( 
		'subtitle_text_color',
		array( 
			'label'       => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#000',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_subtitle' => 'color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'subtitle_text_typography',
			'selector'    => '{{WRAPPER}} .wpmozo_ae_pricing_table_subtitle',
		 )
	 );

	$this->add_responsive_control( 
		'subtitle_text_alignment',
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
				'{{WRAPPER}} .wpmozo_ae_pricing_table_subtitle,{{WRAPPER}} .wpmozo_ae_bar_container' => 'text-align: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'     => 'subtitle_background',
			'label'    => esc_html__( 'Background Subtitle', 'wpmozo-addons-lite-for-elementor' ),
			'types'    => array( 'classic', 'gradient' ),
			'selector' => '{{WRAPPER}} .wpmozo_ae_pricing_table_subtitle',
		 )
	 );

	$this->start_controls_tabs( 'subtitle_padding_margin_control_tabs' );

		// Tab 1.
		$this->start_controls_tab( 
			'subtitle_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for first tab.
			$this->add_responsive_control( 
				'subtitle_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

		// Tab 2.
		$this->start_controls_tab( 
			'subtitle_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for second tab.
			$this->add_responsive_control( 
				'subtitle_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

	$this->end_controls_tabs();

	$this->add_responsive_control( 
		'underline_color',
		array( 
			'label'       => esc_html__( 'Underline Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#000',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_bar' => 'background-color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'underline_thickness',
		array( 
			'label'       => esc_html__( 'Underline Thickness', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SLIDER,
			'size_units'  => array( 'px' ),
			'range'       => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				 ),
			 ),
			'default'     => array( 
				'unit' => 'px',
				'size' => 2,
			 ),
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_bar' => 'height: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'underline_width',
		array( 
			'label'       => esc_html__( 'Underline Width', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SLIDER,
			'size_units'  => array( 'px', '%' ),
			'range'       => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 1000,
					'step' => 1,
				 ),
				'%'  => array( 
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				 ),
			 ),
			'default'     => array( 
				'unit' => 'px',
				'size' => 50,
			 ),
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_bar' => 'width: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );

$this->end_controls_section();

// Icon styling.
$this->start_controls_section( 
	'header_icon_settings',
	array( 
		'label'     => esc_html__( 'Icon Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 
			'header_graphics' => 'icon',
		 ),
	 )
 );

	$this->add_responsive_control( 
		'header_icon_color',
		array( 
			'label'       => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_header_icon' => 'color: {{VALUE}};',
				'{{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic_inner svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'header_icon_alignment',
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
				'{{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic' => 'text-align: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'header_icon_size',
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
				'size' => 100,
				'unit' => 'px',
			 ),
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_header_icon' => 'font-size: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic_inner svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );

	$this->start_controls_tabs( 'header_icon_padding_margin_control_tabs' );

		// Tab 1.
		$this->start_controls_tab( 
			'header_icon_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for first tab.
			$this->add_responsive_control( 
				'header_icon_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

		// Tab 2.
		$this->start_controls_tab( 
			'header_icon_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for second tab.
			$this->add_responsive_control( 
				'header_icon_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

	$this->end_controls_tabs();

	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'      => 'header_icon_background',
			'label'     => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
			'types'     => array( 'classic', 'gradient' ),
			'selector'  => '{{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic',
			'separator' => 'before',
		 )
	 );

	$this->add_control( 
		'header_icon_hover_animation',
		array( 
			'label' => esc_html__( 'Hover Animation', 'wpmozo-addons-lite-for-elementor' ),
			'type'  => Controls_Manager::HOVER_ANIMATION,
		 )
	 );

	$this->add_responsive_control( 
		'header_icon_animation_duration',
		array( 
			'type'      => Controls_Manager::SLIDER,
			'label'     => esc_html__( 'Animation Duration ( ms )', 'wpmozo-addons-lite-for-elementor' ),
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
				'{{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic_inner, {{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic_inner svg' => 'animation-duration: {{SIZE}}{{UNIT}}; transition: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );

$this->end_controls_section();

// Image styling.
$this->start_controls_section( 
	'header_image_settings',
	array( 
		'label'     => esc_html__( 'Image Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 
			'header_graphics' => 'image',
		 ),
	 )
 );

	$this->add_responsive_control( 
		'header_image_alignment',
		array( 
			'label'     => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => array( 
				'flex-start'    => array( 
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				 ),
				'center'  => array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				 ),
				'flex-end'   => array( 
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				 ),
			 ),
			'toggle'    => false,
			'default'   => 'center',
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic .wpmozo_ae_pricing_table_header_graphic_inner' => 'justify-content: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'header_image_width',
		array( 
			'type'      => Controls_Manager::SLIDER,
			'label'     => esc_html__( 'Width', 'wpmozo-addons-lite-for-elementor' ),
			'range'     => array( 
				'%' => array( 
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				 )
			 ),
			'default'   => array( 
				'size' => 25,
				'unit' => '%',
			 ),
			'size_units' => [ '%', 'px', 'vw' ],
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic .wpmozo_ae_header_image' => 'width: {{SIZE}}{{UNIT}};',
			 ),
		 ),
	 );

	$this->add_group_control( 
		Group_Control_Border::get_type(),
		array( 
			'name'     => 'header_image_border',
			'label'    => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => 'div.wpmozo_ae_header_image_container img',
		 )
	 );

	$this->add_responsive_control( 
		'header_image_border_radius',
		array( 
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				'div.wpmozo_ae_header_image_container img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'      => 'header_image_background',
			'label'     => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
			'types'     => array( 'classic', 'gradient' ),
			'selector'  => '{{WRAPPER}} .wpmozo_ae_pricing_table_header_graphic',
			'separator' => 'before',
		 )
	 );

	$this->start_controls_tabs( 'header_image_padding_margin_control_tabs' );

		// Tab 1.
		$this->start_controls_tab( 
			'header_image_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for first tab.
			$this->add_responsive_control( 
				'header_image_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_header_image_container > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

		// Tab 2.
		$this->start_controls_tab( 
			'header_image_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for second tab.
			$this->add_responsive_control( 
				'header_image_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_header_image_container > img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

	$this->end_controls_tabs();

	$this->add_control( 
		'header_image_hover_animation',
		array( 
			'label' => esc_html__( 'Hover Animation', 'wpmozo-addons-lite-for-elementor' ),
			'type'  => Controls_Manager::HOVER_ANIMATION,
		 )
	 );

	$this->add_responsive_control( 
		'header_image_animation_duration',
		array( 
			'type'      => Controls_Manager::SLIDER,
			'label'     => esc_html__( 'Animation Duration ( ms )', 'wpmozo-addons-lite-for-elementor' ),
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
				'{{WRAPPER}} .wpmozo_ae_header_image' => 'animation-duration: {{SIZE}}{{UNIT}}; transition: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );

$this->end_controls_section();

// Pricing styling.
$this->start_controls_section( 
	'pricing_settings',
	array( 
		'label' => esc_html__( 'Pricing Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );

	$this->add_responsive_control( 
		'currency_text_color',
		array( 
			'label'       => esc_html__( 'Currency Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#222',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_currency_symbol' => 'color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'          => esc_html__( 'Currency Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block'    => true,
			'name'           => 'currency_text_typography',
			'selector'       => '{{WRAPPER}} .wpmozo_ae_pricing_table_currency_symbol',
			'fields_options' => array( 
				'word_spacing' => array( 
					'range' => array( 
						'px' => array( 
							'min' => -50,
						 ),
						'em' => array( 
							'min' => -5,
							'max' => 5,
						 ),
						'rem' => array( 
							'min' => -5,
							'max' => 5,
						 ),
					 )
				 )
			 )
		 )
	 );

	$this->add_responsive_control( 
		'price_text_color',
		array( 
			'label'       => esc_html__( 'Price Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#222',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_price' => 'color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'          => esc_html__( 'Price Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block'    => true,
			'name'           => 'price_text_typography',
			'selector'       => '{{WRAPPER}} .wpmozo_ae_pricing_table_price',
			'fields_options' => array( 
				'typography' => array( 
					'default' => 'yes',
				 ),
				'font_size'  => array( 
					'default' => array( 
						'size' => 26,
						'unit' => 'px',
					 ),
				 ),
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'period_text_color',
		array( 
			'label'       => esc_html__( 'Period Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#8F8F8F',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_period' => 'color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'          => esc_html__( 'Period Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block'    => true,
			'name'           => 'period_text_typography',
			'selector'       => '{{WRAPPER}} .wpmozo_ae_pricing_table_period, {{WRAPPER}} .wpmozo_ae_period_slash',
			'fields_options' => array( 
				'typography' => array( 
					'default' => 'yes',
				 ),
				'font_size'  => array( 
					'default' => array( 
						'size' => 26,
						'unit' => 'px',
					 ),
				 ),
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'period_slash_size',
		array( 
			'label'       => esc_html__( 'Period Slash Size ( px )', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SLIDER,
			'size_units'  => array( 'px' ),
			'separator'   => 'before',
			'range'       => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 150,
					'step' => 1,
				 ),
			 ),
			'default'     => array( 
				'size' => '',
				'unit' => 'px',
			 ),
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_period_slash' => 'font-size: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'period_slash_color',
		array( 
			'label'       => esc_html__( 'Period Slash Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_period_slash' => 'color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'pricing_text_alignment',
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
			'separator' => 'before',
			'selectors' => array( '{{WRAPPER}} .wpmozo_ae_pricing_table_pricing' => 'text-align: {{VALUE}};' ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'     => 'pricing_section_background',
			'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
			'types'    => array( 'classic', 'gradient' ),
			'selector' => '{{WRAPPER}} .wpmozo_ae_pricing_table_pricing',
		 )
	 );

	$this->add_control( 
		'pricing_section_padding_margin_heading',
		array( 
			'label' => esc_html__( 'Padding and Margin', 'wpmozo-addons-lite-for-elementor' ),
			'type'  => Controls_Manager::HEADING,
		 )
	 );

	$this->start_controls_tabs( 'pricing_section_padding_margin_control_tabs' );

		// Tab 1.
		$this->start_controls_tab( 
			'pricing_section_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for first tab.
			$this->add_responsive_control( 
				'pricing_section_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

		// Tab 2.
		$this->start_controls_tab( 
			'pricing_section_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for second tab.
			$this->add_responsive_control( 
				'pricing_section_margin',
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
						'{{WRAPPER}} .wpmozo_ae_pricing_table_pricing' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

	$this->end_controls_tabs();

$this->end_controls_section();


// Features styling.
$this->start_controls_section( 
	'features_settings',
	array( 
		'label' => esc_html__( 'Features Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );

	$this->add_responsive_control( 
		'features_list_alignment',
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
			'selectors' => array( '{{WRAPPER}} .wpmozo_ae_pricing_table_features' => 'text-align: {{VALUE}};' ),
			'separator' => 'before',
		 )
	 );

	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'          => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block'    => true,
			'name'           => 'global_features_list_typography',
			'selector'       => '{{WRAPPER}} .wpmozo_ae_pricing_table_features_list',
			'fields_options' => array( 
				'typography' => array( 
					'default' => 'yes',
				 ),
				'font_size' => array( 
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_features_list svg.wpmozo_ae_pricing_table_feature_icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo_ae_pricing_table_features_list .wpmozo_ae_pricing_table_feature_icon, {{WRAPPER}} .wpmozo_ae_pricing_table_features_list' => 'font-size:{{SIZE}}{{UNIT}};',
					 ),
					'default'   => array( 'size' => 18 ),
				 ),
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'     => 'features_list_background',
			'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
			'types'    => array( 'classic', 'gradient' ),
			'selector' => '{{WRAPPER}} .wpmozo_ae_pricing_table_features',
		 )
	 );

	$this->add_responsive_control( 
		'list_icon_global_color',
		array( 
			'label'       => esc_html__( 'Icons Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#00DB05',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_features_list .wpmozo_ae_pricing_table_feature_icon' => 'color:{{VALUE}};',
				'{{WRAPPER}} .wpmozo_ae_pricing_table_features_list svg.wpmozo_ae_pricing_table_feature_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'list_icon_spacing_slider',
		array( 
			'label'      => esc_html__( 'Icon Spacing', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => array( 
				'px' => array( 
					'max'  => 50,
					'step' => 1,
				 ),
			 ),
			'default'    => array( 
				'size' => 5,
			 ),
			'size_units' => array( 'px' ),
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_ae_pricing_table_feature_icon,{{WRAPPER}} .wpmozo_ae_pricing_table_features_list svg' => 'margin-right: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );

	$this->add_control( 
		'features_list_padding_margin_heading',
		array( 
			'label' => esc_html__( 'Margin and Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'  => Controls_Manager::HEADING,
		 )
	 );

	$this->start_controls_tabs( 'features_list_padding_margin_control_tabs' );

		// Tab 1.
		$this->start_controls_tab( 
			'features_list_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for first tab.
			$this->add_responsive_control( 
				'features_list_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_features' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

		// Tab 2.
		$this->start_controls_tab( 
			'features_list_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for second tab.
			$this->add_responsive_control( 
				'features_list_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_features' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

	$this->end_controls_tabs();

	// Divider styling.
	$this->add_responsive_control( 
		'divider_color',
		array( 
			'label'       => esc_html__( 'Divider Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#dedede',
			'separator'   => 'before',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_divider' => 'background-color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'divider_thickness',
		array( 
			'label'       => esc_html__( 'Divider Size', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SLIDER,
			'size_units'  => array( 'px' ),
			'range'       => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				 ),
			 ),
			'default'     => array( 
				'unit' => 'px',
				'size' => 0,
			 ),
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_divider' => 'height: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );
	
	$this->add_responsive_control( 
		'divider_size',
		array( 
			'label'       => esc_html__( 'Divider Spacing', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SLIDER,
			'size_units'  => array( 'px' ),
			'range'       => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				 ),
			 ),
			'default'     => array( 
				'unit' => 'px',
				'size' => 10,
			 ),
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_divider' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );

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
						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
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
						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button svg.wpmozo_ae_button_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'          => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block'    => true,
					'name'           => 'button_text_normal_state_typography',
					'selector'       => '{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button',
					'fields_options' => array( 
						'typography' => array( 
							'default' => 'yes',
						 ),
						'font_size' => array( 
							'selectors' => array( 
								'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button' => 'font-size:{{SIZE}}{{UNIT}};',
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
					'selector'  => '{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button',
					'separator' => 'before',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Box_Shadow::get_type(),
				array( 
					'name'     => 'button_box_shadow_normal_state',
					'label'    => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Border::get_type(),
				array( 
					'name'           => 'button_border_normal_state',
					'label'          => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
					'selector'       => '{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button',
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
						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'button_background_normal_state',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button',
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
						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover, {{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover, {{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
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
						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover svg.wpmozo_ae_button_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'          => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block'    => true,
					'name'           => 'button_text_hover_state_typography',
					'selector'       => '{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper_inner:hover',
					'fields_options' => array( 
						'font_size' => array( 
							'selectors' => array( 
								'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover' => 'font-size:{{SIZE}}{{UNIT}};',
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
					'selector'  => '{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover',
					'separator' => 'before',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Box_Shadow::get_type(),
				array( 
					'name'     => 'button_box_shadow_hover_state',
					'label'    => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover',
				 )
			 );
			$this->add_group_control( 
				Group_Control_Border::get_type(),
				array( 
					'name'     => 'button_border_hover_state',
					'label'    => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover',
				 )
			 );
			$this->add_responsive_control( 
				'button_border_radius_hover_state',
				array( 
					'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
			$this->add_group_control( 
				Group_Control_Background::get_type(),
				array( 
					'name'     => 'button_background_hover_state',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button:hover',
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
						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper, {{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button' => 'transition: color {{SIZE}}{{UNIT}}, border {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, border-radius {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, font {{SIZE}}{{UNIT}}, size {{SIZE}}{{UNIT}}, letter-spacing {{SIZE}}{{UNIT}}, word-spacing {{SIZE}}{{UNIT}}, margin 300ms; animation-duration:{{SIZE}}{{UNIT}}; transition-timing-function: linear;',

						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button svg' => 'transition: color {{SIZE}}{{UNIT}}, fill {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, height {{SIZE}}{{UNIT}}, width {{SIZE}}{{UNIT}}, opacity 300ms; animation-duration:{{SIZE}}{{UNIT}}; transition-timing-function: linear;',
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
				'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper' => 'text-align: {{VALUE}};',
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
						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wpmozo_ae_pricing_table_button_wrapper .wpmozo_ae_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();
