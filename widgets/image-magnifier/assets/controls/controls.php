<?php
use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
// Image controls.
$this->start_controls_section( 
	'image_section',
	array( 
		'label' => __( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 
		'image',
		array( 
			'label'   => esc_html__( 'Choose Image', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => array( 
				'url' => Utils::get_placeholder_image_src(),
			 ),
		 )
	 );
	$this->add_group_control( 
		Group_Control_Image_Size::get_type(),
		array( 
			'name'    => 'image_size',
			'default' => 'large',
		 )
	 );
	$this->add_control( 
		'image_alt_text',
		array( 
			'label'       => __( 'Image Alt Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		 )
	 );
$this->end_controls_section();

// Image Alignment controls.
$this->start_controls_section( 
	'image_alignment_section',
	array( 
		'label' => esc_html__( 'Image Settings', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_responsive_control( 
		'image_alignment',
		array( 
			'label'       => esc_html__( 'Image Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
			'default'     => 'center',
			'toggle'      => true,
			'selectors'   => array( '{{WRAPPER}} .wpmozo_image_magnifier .magnify' => 'justify-content: {{VALUE}};' ),
		 )
	 );
$this->end_controls_section();

// Magnifier controls.
$this->start_controls_section( 
	'magnifier_settings',
	array( 
		'label' => esc_html__( 'Lens Settings', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_responsive_control( 
		'width',
		array( 
			'type'           => Controls_Manager::SLIDER,
			'label'          => esc_html__( 'Width', 'wpmozo-addons-lite-for-elementor' ),
			'range'          => array( 
				'px' => array( 
					'min' => 100,
					'max' => 600,
				 ),
			 ),
			'devices'        => array( 'desktop', 'tablet', 'mobile' ),
			'default'        => array( 
				'size' => 200,
				'unit' => 'px',
			 ),
			'tablet_default' => array( 
				'size' => 200,
				'unit' => 'px',
			 ),
			'mobile_default' => array( 
				'size' => 200,
				'unit' => 'px',
			 ),
			'selectors'      => array( 
				'{{WRAPPER}} .magnify>.magnify-lens' => 'width: {{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
			 ),
		 )
	 );
	$this->add_control( 
		'lense_speed',
		array( 
			'label'       => esc_html__( 'Transition Speed', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::SLIDER,
			'range'       => array( 
				'%' => array( 
					'min'  => 0,
					'max'  => 1000,
					'step' => 100,
				 ),
			 ),
			'default'     => array( 
				'unit' => '%',
				'size' => 100,
			 ),
			'render_type' => 'template',
		 )
	 );

	$this->add_responsive_control( 
		'lense_border_width',
		array( 
			'label'       => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::SLIDER,
			'range'       => array( 
				'px' => array( 
					'min' => 1,
					'max' => 50,
				 ),
			 ),
			'default'     => array( 
				'unit' => 'px',
				'size' => 7,
			 ),
			'selectors'    => array( 
				'{{WRAPPER}} .wpmozo_image_magnifier .magnify > .magnify-lens' => 'box-shadow: 0 0 0 {{SIZE}}{{UNIT}} {{lense_border_color.VALUE}};'
			 )
		 )
	 );
	$this->add_control( 
		'lense_border_color',
		array( 
			'label'       => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::COLOR,
		 )
	 );
$this->end_controls_section();

// Sizing controls.
$this->start_controls_section( 
	'image_size_section',
	array( 
		'label' => esc_html__( 'Sizing', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
	 );
	$this->add_responsive_control( 
		'image_width',
		array( 
			'label'       => esc_html__( 'Image Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::SLIDER,
			'range'       => array( 
				'%' => array( 
					'min' => 1,
					'max' => 100,
				 ),
			 ),
			'default'     => array( 
				'unit' => '%',
				'size' => 50,
			 ),
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_image_magnifier .magnify img' => 'width: {{SIZE}}{{UNIT}};',
			 )
		 )
	 );
	$this->add_responsive_control( 
		'image_max_width',
		array( 
			'label'       => esc_html__( 'Image Max Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::SLIDER,
			'range'       => array( 
				'%' => array( 
					'min' => 1,
					'max' => 100,
				 ),
			 ),
			'default'     => array( 
				'unit' => '%',
				'size' => 100,
			 ),
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_image_magnifier .magnify img' => 'max-width: {{SIZE}}{{UNIT}};',
			 )

		 )
	 );
$this->end_controls_section();

// Spacing controls.
$this->start_controls_section( 
	'spacing_section',
	array( 
		'label' => esc_html__( 'Spacing', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_responsive_control( 
		'padding',
		array( 
			'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_image_magnifier .magnify img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 ),

		 )
	 );
	$this->add_responsive_control( 
		'margin',
		array( 
			'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_image_magnifier .magnify img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 ),

		 )
	 );
$this->end_controls_section();

// Border controls.
$this->start_controls_section( 
	'border_section',
	array( 
		'label' => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_group_control( 
		Group_Control_Border::get_type(),
		array( 
			'name'     => 'image_border',
			'selector' => '{{WRAPPER}} .wpmozo_image_magnifier .magnify img',
		 )
	 );
$this->end_controls_section();
