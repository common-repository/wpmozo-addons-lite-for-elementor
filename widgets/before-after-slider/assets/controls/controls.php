<?php
use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;

$this->start_controls_section( 
	'before_after_slider_settings',
	array( 
		'label' => esc_html__( 'Slider Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );

	$this->start_controls_tabs( 
		'before_after_settings_control_tab'
	 );

		// Before image settings.
		$this->start_controls_tab( 
			'before_state_tab',
			array( 
				'label' => esc_html__( 'Before', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for before tab.
			$this->add_control( 
				'before_state_image',
				array( 
					'label'   => esc_html__( 'Before Image', 'wpmozo-addons-lite-for-elementor' ),
					'type'    => Controls_Manager::MEDIA,
					'dynamic' => array( 
						'active' => true,
					 ),
					'default' => array( 
						'url' => Utils::get_placeholder_image_src(),
						'id'  => 'default-image-id',
					 ),
				 )
			 );

			$this->add_control( 
				'before_label_show_switcher',
				array( 
					'label'                => esc_html__( 'Show Label', 'wpmozo-addons-lite-for-elementor' ),
					'separator'            => 'before',
					'type'                 => Controls_Manager::SWITCHER,
					'label_off'            => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
					'label_on'             => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
					'return_value'         => 'yes', // return value when the switch is on.
					'default'              => 'no',
					'selectors_dictionary' => array( 
						'yes' => 'yes',
						''    => 'no',
					 ),
				 )
			 );

			$this->add_control( 
				'before_label_hover_show_switcher',
				array( 
					'label'       => esc_html__( 'Show Label Only on Hover', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array( 
						'1' => array( 
							'title' => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-close',
						 ),
						'0' => array( 
							'title' => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-check',
						 ),
					 ),
					'selectors'   => array( 
						'{{WRAPPER}} .twentytwenty-before-label' => 'opacity:{{VALUE}};',
						'{{WRAPPER}} .twentytwenty-overlay:hover .twentytwenty-before-label' => 'opacity:1;',
					 ),
					'toggle'      => false,
					'label_block' => false,
					'default'     => '0',
					'condition'   => array( 'before_label_show_switcher' => 'yes' ),

				 )
			 );

			// Before label.
			$this->add_control( 
				'before_label_text',
				array( 
					'label'       => __( 'Enter Lable', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'type'        => Controls_Manager::TEXT,
					'dynamic'     => array( 'active' => true ),
					'placeholder' => __( 'Enter Label For Before Image', 'wpmozo-addons-lite-for-elementor' ),
					'condition'   => array( 'before_label_show_switcher' => 'yes' ),
				 )
			 );

			$this->add_responsive_control( 
				'before_label_background_color',
				array( 
					'label'       => esc_html__( 'Label Background Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#0000006E',
					'selectors'   => array( 
						'{{WRAPPER}} .twentytwenty-before-label:before' => 'background-color:{{VALUE}};',
					 ),
					'condition'   => array( 'before_label_show_switcher' => 'yes' ),
				 )
			 );

		$this->end_controls_tab();

		// After image settings.
		$this->start_controls_tab( 
			'after_state_tab',
			array( 
				'label' => esc_html__( 'After', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for after tab.
			$this->add_control( 
				'after_state_image',
				array( 
					'label'   => esc_html__( 'After Image', 'wpmozo-addons-lite-for-elementor' ),
					'type'    => Controls_Manager::MEDIA,
					'dynamic' => array( 
						'active' => true,
					 ),
					'default' => array( 
						'url' => Utils::get_placeholder_image_src(),
						'id'  => 'default-image-id',
					 ),
				 )
			 );

			$this->add_control( 
				'after_label_show_switcher',
				array( 
					'label'                => esc_html__( 'Show Label', 'wpmozo-addons-lite-for-elementor' ),
					'separator'            => 'before',
					'type'                 => Controls_Manager::SWITCHER,
					'label_off'            => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
					'label_on'             => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
					'return_value'         => 'yes', // return value when the switch is on.
					'default'              => 'no',
					'selectors_dictionary' => array( 
						'yes' => 'yes',
						''    => 'no',
					 ),
				 )
			 );

			$this->add_control( 
				'after_label_hover_show_switcher',
				array( 
					'label'       => esc_html__( 'Show Label Only on Hover', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array( 
						'1' => array( 
							'title' => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-close',
						 ),
						'0' => array( 
							'title' => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-check',
						 ),
					 ),
					'selectors'   => array( 
						'{{WRAPPER}} .twentytwenty-after-label' => 'opacity:{{VALUE}};',
						'{{WRAPPER}} .twentytwenty-overlay:hover .twentytwenty-after-label' => 'opacity:1;',
					 ),
					'toggle'      => false,
					'label_block' => false,
					'default'     => '0',
					'condition'   => array( 'after_label_show_switcher' => 'yes' ),
				 )
			 );

			// After label.
			$this->add_control( 
				'after_label_text',
				array( 
					'label'       => __( 'Enter Lable', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'type'        => Controls_Manager::TEXT,
					'dynamic'     => array( 'active' => true ),
					'placeholder' => __( 'Enter Label For After Image', 'wpmozo-addons-lite-for-elementor' ),
					'condition'   => array( 'after_label_show_switcher' => 'yes' ),
				 )
			 );

			$this->add_responsive_control( 
				'after_label_background_color',
				array( 
					'label'       => esc_html__( 'Label Background Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#0000006E',
					'selectors'   => array( 
						'{{WRAPPER}} .twentytwenty-after-label:before' => 'background-color:{{VALUE}};',
					 ),
					'condition'   => array( 'after_label_show_switcher' => 'yes' ),
				 )
			 );

		$this->end_controls_tab();

	$this->end_controls_tabs();

$this->end_controls_section();

// Styling section.

// Gallery Styling.
$this->start_controls_section( 
	'before_after_slider_styling_section',
	array( 
		'label' => esc_html__( 'Slider Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );

	$this->add_control( 
		'slider_orientation_select',
		array( 
			'label'       => __( 'Slider Orientation', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				''         => __( 'Horizontal', 'wpmozo-addons-lite-for-elementor' ),
				'vertical' => __( 'Vertical', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => '',
		 )
	 );

	$this->add_responsive_control( 
		'handle_position_slider',
		array( 
			'type'    => Controls_Manager::SLIDER,
			'label'   => esc_html__( 'Handle Offset ', 'wpmozo-addons-lite-for-elementor' ),
			'range'   => array( 
				'%' => array( 
					'min'  => 0.0,
					'max'  => 1.0,
					'step' => 0.1,
				 ),
			 ),
			'default' => array( 
				'size' => 0.5,
				'unit' => '%',
			 ),
		 )
	 );

	$this->add_control( 
		'move_handle_on_hover_switcher',
		array( 
			'label'                => esc_html__( 'Move Handle On Hover', 'wpmozo-addons-lite-for-elementor' ),
			'separator'            => 'before',
			'type'                 => Controls_Manager::SWITCHER,
			'label_off'            => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'             => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value'         => 'yes', // return value when the switch is on.
			'default'              => 'no',
			'selectors_dictionary' => array( 
				'yes' => 'yes',
				''    => 'no',
			 ),
			'condition'            => array( 'move_handle_on_click_switcher!' => 'yes' ),
		 )
	 );

	$this->add_control( 
		'move_handle_on_click_switcher',
		array( 
			'label'                => esc_html__( 'Move Handle On Click', 'wpmozo-addons-lite-for-elementor' ),
			'separator'            => 'before',
			'type'                 => Controls_Manager::SWITCHER,
			'label_off'            => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'             => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value'         => 'yes', // return value when the switch is on.
			'default'              => 'no',
			'selectors_dictionary' => array( 
				'yes' => 'yes',
				''    => 'no',
			 ),
			'condition'            => array( 'move_handle_on_hover_switcher!' => 'yes' ),
		 )
	 );

	$this->add_responsive_control( 
		'handle_color',
		array( 
			'label'       => esc_html__( 'Handle Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'separator'   => 'before',
			'type'        => Controls_Manager::COLOR,
			'default'     => '#203949',
			'selectors'   => array( 
				'{{WRAPPER}} .twentytwenty-handle' => 'border-color: {{VALUE}};',
				'{{WRAPPER}} .twentytwenty-up-arrow' => 'border-bottom-color: {{VALUE}};',
				'{{WRAPPER}} .twentytwenty-down-arrow' => 'border-top-color: {{VALUE}};',
				'{{WRAPPER}} .twentytwenty-left-arrow' => 'border-right-color: {{VALUE}};',
				'{{WRAPPER}} .twentytwenty-right-arrow' => 'border-left-color: {{VALUE}};',
				'{{WRAPPER}} .twentytwenty-handle:before,{{WRAPPER}} .twentytwenty-handle:after' => 'background: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_control( 
		'overlay_on_hover_switcher',
		array( 
			'label'                => esc_html__( 'Overlay On Hover', 'wpmozo-addons-lite-for-elementor' ),
			'separator'            => 'before',
			'type'                 => Controls_Manager::SWITCHER,
			'label_off'            => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'             => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value'         => 'yes', // return value when the switch is on.
			'default'              => 'no',
			'selectors_dictionary' => array( 
				'yes' => 'yes',
				''    => 'no',
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'      => 'overlay_color',
			'label'     => esc_html__( 'Overlay Color', 'wpmozo-addons-lite-for-elementor' ),
			'types'     => array( 'classic', 'gradient' ),
			'exclude'   => array( 'image' ),
			'selector'  => '{{WRAPPER}} .twentytwenty-overlay:hover',
			'condition' => array( 'overlay_on_hover_switcher' => 'yes' ),
		 )
	 );


$this->end_controls_section();

$this->start_controls_section( 
	'slider_label_text_styling',
	array( 
		'label'      => esc_html__( 'Label Text Settings', 'wpmozo-addons-lite-for-elementor' ),
		'tab'        => Controls_Manager::TAB_STYLE,
		'conditions' => array( 
			'relation' => 'or',
			'terms'    => array( 
				array( 
					'name'     => 'before_label_show_switcher',
					'operator' => '===',
					'value'    => 'yes',
				 ),
				array( 
					'name'     => 'after_label_show_switcher',
					'operator' => '===',
					'value'    => 'yes',
				 ),
			 ),
		 ),
	 )
 );

	$this->add_responsive_control( 
		'label_text_color',
		array( 
			'label'       => esc_html__( 'Label Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'separator'   => 'after',
			'default'     => '#fff',
			'selectors'   => array( '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'color : {{VALUE}};' ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'label'       => esc_html__( 'Label Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'label_text_typography',
			'separator'   => 'after',
			'selector'    => '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before',
		 )
	 );


	$this->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'      => 'label_text_shadow',
			'label'     => esc_html__( 'Label Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'separator' => 'after',
			'selector'  => '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before',
			'separator' => 'before',
		 )
	 );

$this->end_controls_section();
