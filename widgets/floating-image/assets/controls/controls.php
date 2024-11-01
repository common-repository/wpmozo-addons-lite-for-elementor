<?php
use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Css_Filter;

// Content section.
$this->start_controls_section( 
	'content_section',
	array( 
		'label' => __( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$repeater = new Repeater();
	$repeater->add_control( 
		'image',
		array( 
			'label'   => __( 'Image', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => array( 
				'url' => Utils::get_placeholder_image_src(),
			 ),
		 )
	 );
	$repeater->add_control( 
		'image_alt_text',
		array( 
			'label'       => __( 'Image Alt Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		 )
	 );
	$repeater->add_control( 
		'image_position',
		array( 
			'label'     => esc_html__( 'Image Position', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		 )
	 );
	$repeater->add_responsive_control( 
		'horizontal_align',
		array( 
			'type'           => Controls_Manager::SLIDER,
			'label'          => esc_html__( 'Horizontal Align', 'wpmozo-addons-lite-for-elementor' ),
			'size_units' => array( 'px', '%', 'vw' ),
			'range'          => array( 
				'%' => array( 
					'min' => -100,
					'max' => 100,
				 ),
				'px' => array( 
					'min' => 0,
					'max' => 500,
				 ),
			 ),
			'devices'        => array( 'desktop', 'tablet', 'mobile' ),
			'default'        => array( 
				'size' => 0,
				'unit' => '%',
			 ),
			'tablet_default'        => array( 
				'unit' => '%',
			 ),
			'mobile_default'        => array( 
				'unit' => '%',
			 ),
			'selectors'      => array( 
				'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );
	$repeater->add_responsive_control( 
		'vertical_align',
		array( 
			'type'           => Controls_Manager::SLIDER,
			'label'          => esc_html__( 'Vertical Align', 'wpmozo-addons-lite-for-elementor' ),
			'size_units' => array( 'px', '%', 'vw' ),
			'range'          => array( 
				'%' => array( 
					'min' => -100,
					'max' => 100,
				 ),
				'px' => array( 
					'min' => 0,
					'max' => 500,
				 ),
			 ),
			'devices'        => array( 'desktop', 'tablet', 'mobile' ),
			'default'        => array( 
				'size' => 0,
				'unit' => '%',
			 ),
			'tablet_default'        => array( 
				'unit' => '%',
			 ),
			'mobile_default'        => array( 
				'unit' => '%',
			 ),
			'selectors'      => array( 
				'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );

	$repeater->add_control( 
		'image_animation_heading',
		array( 
			'label'        => esc_html__( 'Image Animation', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::POPOVER_TOGGLE,
			'label_off'    => esc_html__( 'Default', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'Custom', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => 'yes',
		 )
	 );
	$repeater->start_popover();
		$repeater->add_responsive_control( 
			'floating_effect',
			array( 
				'label'     => esc_html__( 'Floating Effect', 'wpmozo-addons-lite-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'wpmozo_float_up_down',
				'options'   => array( 
					'wpmozo_float_up_down'    => esc_html__( 'Up Down', 'wpmozo-addons-lite-for-elementor' ),
					'wpmozo_float_left_right' => esc_html__( 'Left Right', 'wpmozo-addons-lite-for-elementor' ),
					'no_effect'               => esc_html__( 'No Effect', 'wpmozo-addons-lite-for-elementor' ),
				 ),
				'selectors' => array( 
					'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'animation-name: {{VALUE}};',
				 ),
			 )
		 );
		$repeater->add_responsive_control( 
			'animation_delay',
			array( 
				'label'     => esc_html__( 'Animation Delay', 'wpmozo-addons-lite-for-elementor' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 100,
				'max'       => 10000,
				'step'      => 100,
				'default'   => 0,
				'selectors' => array( 
					'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'animation-delay: {{VALUE}}ms;',
				 ),
			 )
		 );
		$repeater->add_responsive_control( 
			'animation_duration',
			array( 
				'label'     => esc_html__( 'Animation Duration', 'wpmozo-addons-lite-for-elementor' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 100,
				'max'       => 10000,
				'step'      => 100,
				'default'   => 4000,
				'selectors' => array( 
					'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'animation-duration: {{VALUE}}ms;',
				 ),

			 )
		 );
		$repeater->add_responsive_control( 
			'animation_speed_curve',
			array( 
				'label'     => esc_html__( 'Animation Speed Curve', 'wpmozo-addons-lite-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'ease-in-out',
				'options'   => array( 
					'ease-in-out' => esc_html__( 'Ease-In-Out', 'wpmozo-addons-lite-for-elementor' ),
					'ease'        => esc_html__( 'Ease', 'wpmozo-addons-lite-for-elementor' ),
					'ease-in'     => esc_html__( 'Ease-In', 'wpmozo-addons-lite-for-elementor' ),
					'ease-out'    => esc_html__( 'Ease-Out', 'wpmozo-addons-lite-for-elementor' ),
					'linear'      => esc_html__( 'Linear', 'wpmozo-addons-lite-for-elementor' ),
				 ),
				'selectors' => array( 
					'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'animation-timing-function: {{VALUE}};',
				 ),
			 )
		 );
		$repeater->add_responsive_control( 
			'animation_repeat',
			array( 
				'label'     => esc_html__( 'Animation Repeat', 'wpmozo-addons-lite-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'infinite',
				'options'   => array( 
					'infinite' => esc_html__( 'Infinite', 'wpmozo-addons-lite-for-elementor' ),
					'initial'  => esc_html__( 'Initial', 'wpmozo-addons-lite-for-elementor' ),
				 ),
				'selectors' => array( 
					'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'animation-iteration-count: {{VALUE}};',
				 ),
			 )
		 );
	$repeater->end_popover();
	$repeater->add_control( 
		'enable_advanced_option',
		array( 
			'label'        => esc_html__( 'Enable Advanced Option', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'Show', 'wpmozo-addons-lite-for-elementor' ),
			'label_off'    => esc_html__( 'Hide', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => 'no',
			'separator'    => 'before',
		 )
	 );
	$repeater->add_control( 
		'image_link_url',
		array( 
			'label'       => esc_html__( 'Image Link Url', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::URL,
			'options'     => array( 'url', 'is_external', 'nofollow' ),
			'default'     => array( 
				'url'         => '',
				'is_external' => true,
				'nofollow'    => true,
			 ),
			'label_block' => true,
			'condition'   => array( 
				'enable_advanced_option' => 'yes',
			 ),

		 )
	 );
	$repeater->add_group_control( 
		Group_Control_Background::get_type(),
		array( 
			'name'      => 'item_background',
			'types'     => array( 'classic', 'gradient', 'video' ),
			'selector'  => '{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}',
			'condition' => array( 
				'enable_advanced_option' => 'yes',
			 ),

		 )
	 );
	$repeater->start_controls_tabs( 
		'item_normal_and_hover_tabs',
		array( 
			'separator' => 'before',
			'condition' => array( 'enable_advanced_option' => 'yes' ),
		 )
	 );
		// Tab 1.
		$repeater->start_controls_tab( 
			'item_normal_tab',
			array( 
				'label'     => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
				'condition' => array( 'enable_advanced_option' => 'yes' ),
			 )
		 );
			$repeater->add_control( 
				'image_sizing_normal',
				array( 
					'label'     => esc_html__( 'Image Sizing', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_responsive_control( 
				'image_width_normal',
				array( 
					'type'           => Controls_Manager::SLIDER,
					'label'          => esc_html__( 'Width', 'wpmozo-addons-lite-for-elementor' ),
					'range'          => array( 
						'%' => array( 
							'min' => 0,
							'max' => 100,
						 ),
					 ),
					'devices'        => array( 'desktop', 'tablet', 'mobile' ),
					'default'        => array( 
						'size' => 20,
						'unit' => '%',
					 ),
					'tablet_default' => array( 
						'size' => 20,
						'unit' => '%',
					 ),
					'mobile_default' => array( 
						'size' => 20,
						'unit' => '%',
					 ),
					'selectors'      => array( 
						'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'width: {{SIZE}}{{UNIT}};',
					 ),
					'condition'      => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_responsive_control( 
				'image_max_width_normal',
				array( 
					'type'           => Controls_Manager::SLIDER,
					'label'          => esc_html__( 'Max Width', 'wpmozo-addons-lite-for-elementor' ),
					'range'          => array( 
						'%' => array( 
							'min' => 0,
							'max' => 100,
						 ),
					 ),
					'devices'        => array( 'desktop', 'tablet', 'mobile' ),
					'default'        => array( 
						'size' => 100,
						'unit' => '%',
					 ),
					'tablet_default' => array( 
						'size' => 100,
						'unit' => '%',
					 ),
					'mobile_default' => array( 
						'size' => 100,
						'unit' => '%',
					 ),
					'selectors'      => array( 
						'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'max-width: {{SIZE}}{{UNIT}};',
					 ),
					'condition'      => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_control( 
				'image_spacing_normal',
				array( 
					'label'     => esc_html__( 'Image Spacing', 'wpmozo-addons-lite-for-elementor' ),
					'separator' => 'before',
					'type'      => Controls_Manager::HEADING,
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_responsive_control( 
				'image_margin_noraml',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
					'condition'  => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_responsive_control( 
				'image_padding_normal',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
					'condition'  => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_control( 
				'image_border_heading_normal',
				array( 
					'label'     => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
					'separator' => 'before',
					'type'      => Controls_Manager::HEADING,
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_group_control( 
				Group_Control_Border::get_type(),
				array( 
					'name'      => 'image_border_normal',
					'selector'  => '{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}} img',
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_responsive_control( 
				'image_border_radius_normal',
				array( 
					'type'           => Controls_Manager::SLIDER,
					'label'          => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'range'          => array( 
						'px' => array( 
							'min' => 1,
							'max' => 100,
						 ),
					 ),
					'devices'        => array( 'desktop', 'tablet', 'mobile' ),
					'default'        => array( 
						'size' => 0,
						'unit' => 'px',
					 ),
					'tablet_default' => array( 
						'size' => 0,
						'unit' => 'px',
					 ),
					'mobile_default' => array( 
						'size' => 0,
						'unit' => 'px',
					 ),
					'selectors'      => array( 
						'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}} img' => 'border-radius: {{SIZE}}{{UNIT}};',
					 ),
					'condition'      => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_control( 
				'box_shadow_heading_normal',
				array( 
					'label'     => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'separator' => 'before',
					'type'      => Controls_Manager::HEADING,
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_group_control( 
				Group_Control_Box_Shadow::get_type(),
				array( 
					'name'           => 'box_shadow_normal',
					'selector'       => '{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}} img',
					'fields_options' =>
						array( 
							'box_shadow_type' => array( 
								'default' => 'yes',
							 ),
							'box_shadow'      => array( 
								'default' => array( 
									'horizontal' => 0,
									'vertical'   => 0,
									'blur'       => 0,
									'spread'     => 0,
									'color'      => 'rgba( 0, 0, 0, 0 )',
								 ),
							 ),
						 ),
				 )
			 );
			$repeater->add_control( 
				'css_filter_heading_normal',
				array( 
					'label'     => esc_html__( 'CSS Filter', 'wpmozo-addons-lite-for-elementor' ),
					'separator' => 'before',
					'type'      => Controls_Manager::HEADING,
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_group_control( 
				Group_Control_Css_Filter::get_type(),
				array( 
					'name'     => 'css_filter_normal',
					'selector' => '{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}} img',
				 )
			 );
		$repeater->end_controls_tab();

		// Tab 2.
		$repeater->start_controls_tab( 
			'item_hover_tab',
			array( 
				'label'     => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				'condition' => array( 'enable_advanced_option' => 'yes' ),
			 )
		 );
			$repeater->add_control( 
				'image_sizing_hover',
				array( 
					'label'     => esc_html__( 'Image Sizing', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_responsive_control( 
				'image_width_hover',
				array( 
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Width', 'wpmozo-addons-lite-for-elementor' ),
					'range'     => array( 
						'%' => array( 
							'min' => 0,
							'max' => 100,
						 ),
					 ),
					'devices'   => array( 'desktop', 'tablet', 'mobile' ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}:hover' => 'width: {{SIZE}}%;',
					 ),
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_responsive_control( 
				'image_max_width_hover',
				array( 
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Max Width', 'wpmozo-addons-lite-for-elementor' ),
					'range'     => array( 
						'%' => array( 
							'min' => 0,
							'max' => 100,
						 ),
					 ),
					'devices'   => array( 'desktop', 'tablet', 'mobile' ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}:hover' => 'max-width: {{SIZE}}%;',
					 ),
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_control( 
				'image_spacing_hover',
				array( 
					'label'     => esc_html__( 'Image Spacing', 'wpmozo-addons-lite-for-elementor' ),
					'separator' => 'before',
					'type'      => Controls_Manager::HEADING,
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_responsive_control( 
				'image_margin_hover',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
					'condition'  => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_responsive_control( 
				'image_padding_hover',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
					'condition'  => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_control( 
				'image_border_heading_hover',
				array( 
					'label'     => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
					'separator' => 'before',
					'type'      => Controls_Manager::HEADING,
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_group_control( 
				Group_Control_Border::get_type(),
				array( 
					'name'      => 'image_border_hover',
					'selector'  => '{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}} img:hover',
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );

			$repeater->add_responsive_control( 
				'image_border_radius_hover',
				array( 
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'range'     => array( 
						'px' => array( 
							'min' => 1,
							'max' => 100,
						 ),
					 ),
					'devices'   => array( 'desktop', 'tablet', 'mobile' ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}}:hover img' => 'border-radius: {{SIZE}}{{UNIT}};',
					 ),
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_control( 
				'box_shadow_heading_hover',
				array( 
					'label'     => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'separator' => 'before',
					'type'      => Controls_Manager::HEADING,
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_group_control( 
				Group_Control_Box_Shadow::get_type(),
				array( 
					'name'           => 'box_shadow_hover',
					'selector'       => '{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}} img:hover',
					'fields_options' =>
						array( 
							'box_shadow_type' =>
							array( 
								'default' => 'yes',
							 ),
							'box_shadow'      => array( 
								'default' =>
									array( 
										'horizontal' => 0,
										'vertical'   => 0,
										'blur'       => 0,
										'spread'     => 0,
										'color'      => 'rgba( 0, 0, 0, 0 )',
									 ),
							 ),
						 ),
				 )
			 );
			$repeater->add_control( 
				'css_fileter_heading_hover',
				array( 
					'label'     => esc_html__( 'CSS Filter', 'wpmozo-addons-lite-for-elementor' ),
					'separator' => 'before',
					'type'      => Controls_Manager::HEADING,
					'condition' => array( 
						'enable_advanced_option' => 'yes',
					 ),
				 )
			 );
			$repeater->add_group_control( 
				Group_Control_Css_Filter::get_type(),
				array( 
					'name'     => 'css_fileter_hover',
					'selector' => '{{WRAPPER}} .wpmozo_floating_images_wrapper {{CURRENT_ITEM}} img:hover',
				 )
			 );
		$repeater->end_controls_tab();
	$repeater->end_controls_tabs();
	$this->add_control( 
		'image_list',
		array( 
			'label'       => __( 'Image List', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => array( 
				array( 
					'image'          => __( 'Item Media', 'wpmozo-addons-lite-for-elementor' ),
					'image_alt_text' => __( 'Floating Image Item', 'wpmozo-addons-lite-for-elementor' ),
				 ),
				array( 
					'image'          => __( 'Item Media', 'wpmozo-addons-lite-for-elementor' ),
					'image_alt_text' => __( 'Floating Image Item', 'wpmozo-addons-lite-for-elementor' ),

				 ),
			 ),
			'title_field' => 'Floating Image Item',
		 )
	 );
	$this->add_responsive_control( 
		'container_height',
		array( 
			'type'           => Controls_Manager::SLIDER,
			'label'          => esc_html__( 'Container Height', 'wpmozo-addons-lite-for-elementor' ),
			'range'          => array( 
				'px' => array( 
					'min' => 1,
					'max' => 2000,
				 ),
			 ),
			'devices'        => array( 'desktop', 'tablet', 'mobile' ),
			'default'        => array( 
				'size' => 450,
				'unit' => 'px',
			 ),
			'tablet_default' => array( 
				'size' => 450,
				'unit' => 'px',
			 ),
			'mobile_default' => array( 
				'size' => 450,
				'unit' => 'px',
			 ),
			'selectors'      => array( 
				'{{WRAPPER}} ' => 'height: {{SIZE}}{{UNIT}}; max-height: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );
$this->end_controls_section();
