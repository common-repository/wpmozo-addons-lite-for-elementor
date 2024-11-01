<?php

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;

// Content tab.
// Gallery items.
$this->start_controls_section( 
	'masonry_gallery_settings',
	array( 
		'label' => esc_html__( 'Gallery Setting', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );

	$this->add_control( 
		'gallery',
		array( 
			'label'      => esc_html__( 'Add Gallery Images', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::GALLERY,
			'show_label' => false,
			'dynamic'    => array( 
				'active' => true,
			 ),
			'default'    => array( 
				array( 
					'url' => Utils::get_placeholder_image_src(),
					'id'  => 'default-image-id',
				 ),
				array( 
					'url' => Utils::get_placeholder_image_src(),
					'id'  => 'default-image-id',
				 ),
				array( 
					'url' => Utils::get_placeholder_image_src(),
					'id'  => 'default-image-id',
				 ),
				array( 
					'url' => Utils::get_placeholder_image_src(),
					'id'  => 'default-image-id',
				 ),
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Image_Size::get_type(),
		array( 
			'name'    => 'masonry_gallery_image_size',
			'exclude' => array( 'custom' ),
			'include' => array(),
			'default' => 'large',
		 )
	 );

	$gallery_columns = range( 1, 10 );
	$gallery_columns = array_combine( $gallery_columns, $gallery_columns );

	$this->add_responsive_control( 
		'select_number_of_column',
		array( 
			'label'          => __( 'Number Of Columns', 'wpmozo-addons-lite-for-elementor' ),
			'label_block'    => false,
			'type'           => Controls_Manager::SELECT,
			'options'        => $gallery_columns,
			'devices'        => array( 'desktop', 'tablet', 'mobile' ),
			'default'        => 4,
			'tablet_default' => 2,
			'render_type'    => 'template',
			'mobile_default' => 1,
			'selectors'      => array( '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item' => 'width : calc( calc( 100% / {{VALUE}} ) - calc( {{column_spacing_slider.size}}{{column_spacing_slider.unit}} * calc( {{VALUE}} - 1 ) / {{VALUE}} ) ) ;' ),
		 )
	 );

	$this->add_responsive_control( 
		'column_spacing_slider',
		array( 
			'label'          => esc_html__( 'Column Spacing', 'wpmozo-addons-lite-for-elementor' ),
			'type'           => Controls_Manager::SLIDER,
			'range'          => array( 
				'px' => array( 
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				 ),
			 ),
			'devices'        => array( 'desktop', 'tablet', 'mobile' ),
			'default'        => array( 
				'size' => 30,
				'unit' => 'px',
			 ),
			'tablet_default' => array( 
				'size' => 20,
				'unit' => 'px',
			 ),
			'mobile_default' => array( 
				'size' => 10,
				'unit' => 'px',
			 ),
			'render_type' => 'template',
			'size_units'     => array( 'px' ),
			'selectors'      => array( 
				'{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_gutter ' => 'width: {{SIZE}}{{UNIT}};',
				'{{Wrapper}} .wpmozo_ae_masonry_gallery_item'    => 'margin-bottom: {{SIZE}}{{UNIT}};',

			 ),
		 )
	 );

$this->end_controls_section();

// Gallery elements.
$this->start_controls_section( 
	'masonry_gallery_elements_settings',
	array( 
		'label' => esc_html__( 'Elements', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );

	$this->add_control( 
		'image_title_switcher',
		array( 
			'label'                => esc_html__( 'Show Title', 'wpmozo-addons-lite-for-elementor' ),
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
		'title_show_select',
		array( 
			'label'       => __( 'Show Title in', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'wpmozo_title_lightbox_only' => __( 'Lightbox', 'wpmozo-addons-lite-for-elementor' ),
				'wpmozo_title_gallery_only'  => __( 'Gallery', 'wpmozo-addons-lite-for-elementor' ),
				'wpmozo_title_both'          => __( 'Both', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => 'wpmozo_title_both',
			'condition'   => array( 'image_title_switcher' => 'yes' ),
		 )
	 );

	$this->add_control( 
		'caption_switcher',
		array( 
			'label'                => esc_html__( 'Show Caption', 'wpmozo-addons-lite-for-elementor' ),
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
		'caption_show_select',
		array( 
			'label'       => __( 'Show Caption in', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'wpmozo_caption_lightbox_only' => __( 'Lightbox', 'wpmozo-addons-lite-for-elementor' ),
				'wpmozo_caption_gallery_only'  => __( 'Gallery', 'wpmozo-addons-lite-for-elementor' ),
				'wpmozo_caption_both'          => __( 'Both', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => 'wpmozo_caption_both',
			'condition'   => array( 'caption_switcher' => 'yes' ),
		 )
	 );

	$this->add_control( 
		'lightbox_switcher',
		array( 
			'label'                => esc_html__( 'Enable Lightbox', 'wpmozo-addons-lite-for-elementor' ),
			'separator'            => 'before',
			'type'                 => Controls_Manager::SWITCHER,
			'label_off'            => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'             => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'default'              => 'no',
			'selectors_dictionary' => array( 
				'yes' => 'yes',
				''    => 'no',
			 ),
		 )
	 );

	$this->add_control( 
		'title_caption_style_select',
		array( 
			'label'       => __( 'Title & Caption Style in Lightbox', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'wpmozo_ae_masonry_gallery_img_ovl' => __( 'Image Overlay', 'wpmozo-addons-lite-for-elementor' ),
				'wpmozo_ae_masonry_gallery_img_blw' => __( 'Below Image', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'     => 'wpmozo_ae_masonry_gallery_img_blw',
			'condition'   => array( 'lightbox_switcher' => 'yes' ),
		 )
	 );

	$this->add_control( 
		'overlay_on_hover_switcher',
		array( 
			'label'                => esc_html__( 'Overlay on Hover', 'wpmozo-addons-lite-for-elementor' ),
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
		'overlay_icon_select',
		array( 
			'label'     => esc_html__( 'Overlay Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::ICONS,
			'default'   => array( 
				'value'   => 'fas fa-image',
				'library' => 'fa-solid',
			 ),
			'condition' => array( 'overlay_on_hover_switcher' => 'yes' ),
		 )
	 );

$this->end_controls_section();

// Style tab.
// Gallery styling.
$this->start_controls_section( 
	'gallery_styling_section',
	array( 
		'label' => esc_html__( 'Gallery Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );

	$this->add_group_control( 
		Group_Control_Border::get_type(),
		array( 
			'name'     => 'image_border',
			'selector' => '{{WRAPPER}} .wpmozo_ae_masonry_gallery_image_wrapper',
		 )
	 );

	$this->add_responsive_control( 
		'gallery_image_border_radius',
		array( 
			'label'      => esc_html__( 'Image Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'custom' ),
			'selectors'  => array( 
				'{{WRAPPER}}  .wpmozo_ae_masonry_gallery_image_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
			 ),
		 )
	 );

	$this->add_group_control( 
		Group_Control_Box_Shadow::get_type(),
		array( 
			'name'     => 'image_box_shadow',
			'selector' => '{{WRAPPER}} .wpmozo_ae_masonry_gallery_image_wrapper',
		 )
	 );

$this->end_controls_section();

// Title styling.
$this->start_controls_section( 
	'title_styling_section',
	array( 
		'label'     => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 'image_title_switcher' => 'yes' ),
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
			'default'     => 'h4',
			'separator'   => 'before',
			'toggle'      => false,
		 )
	 );

	$this->start_controls_tabs( 
		'title_normal_and_hover_state_control_tab'
	 );

		// Tab 1.
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
					'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_title' => 'color: {{VALUE}};' ),
				 )
			 );

			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Title Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'title_text_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_title',
				 )
			 );

			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'title_text_shadow',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_title',
					'separator' => 'before',
				 )
			 );

		$this->end_controls_tab();

		// Tab 2.
		$this->start_controls_tab( 
			'title_hover_state_tab',
			array( 
				'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for second tab.
			$this->add_responsive_control( 
				'title_text_hover_state_color',
				array( 
					'label'       => esc_html__( 'Title Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_title:hover' => 'color: {{VALUE}};',
					 ),
				 )
			 );

			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Title Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'title_text_hover_state_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_title:hover',
				 )
			 );

			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'title_text_hover_state_shadow',
					'label'     => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_title:hover',
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
						'{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_title' => 'transition: all {{SIZE}}{{UNIT}};',
					 ),
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
			'default'     => is_rtl() ? 'right' : 'left',
			'toggle'      => true,
			'separator'   => 'before',
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_title' => 'text-align: {{VALUE}};' ),
		 )
	 );

	$this->add_control( 
		'title_padding_margin_heading',
		array( 
			'label' => esc_html__( 'Title Padding and Margin', 'wpmozo-addons-lite-for-elementor' ),
			'type'  => Controls_Manager::HEADING,

		 )
	 );

	$this->start_controls_tabs( 
		'title_padding_margin_control_tabs',
	 );

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
					'default'    => array( 
						'top'    => 5,
						'right'  => 5,
						'bottom' => 5,
						'left'   => 5,
					 ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'default'    => array( 
						'top'    => 0,
						'right'  => 0,
						'bottom' => 0,
						'left'   => 0,
					 ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

	$this->end_controls_tabs();

$this->end_controls_section();

// Caption styling.
$this->start_controls_section( 
	'caption_styling_section',
	array( 
		'label'     => esc_html__( 'Caption', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 'caption_switcher' => 'yes' ),
	 )
 );

	$this->start_controls_tabs( 
		'caption_normal_and_hover_state_control_tab'
	 );

		// Tab 1.
		$this->start_controls_tab( 
			'caption_normal_state_tab',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for FIRST tab.
			$this->add_responsive_control( 
				'caption_text_color',
				array( 
					'label'       => esc_html__( 'Caption Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#222',
					'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_caption' => 'color:{{VALUE}};' ),
				 )
			 );

			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Caption Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'caption_text_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_caption',
				 )
			 );

			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'caption_text_shadow',
					'label'     => esc_html__( 'Caption Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_caption',
					'separator' => 'before',
				 )
			 );

		$this->end_controls_tab();

		// Tab 2.
		$this->start_controls_tab( 
			'caption_hover_state_tab',
			array( 
				'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for second tab.
			$this->add_responsive_control( 
				'caption_text_hover_state_color',
				array( 
					'label'       => esc_html__( 'Caption Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array( 
						'{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_caption:hover' => 'color:{{VALUE}};',
					 ),
				 )
			 );

			$this->add_group_control( 
				Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Caption Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'caption_text_hover_state_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_caption:hover',
				 )
			 );

			$this->add_group_control( 
				Group_Control_Text_Shadow::get_type(),
				array( 
					'name'      => 'caption_text_hover_state_shadow',
					'label'     => esc_html__( 'Caption Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_caption:hover',
					'separator' => 'before',
				 )
			 );

			$this->add_responsive_control( 
				'caption_transition_duration',
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
						'{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_caption' => 'transition: all {{SIZE}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

	$this->end_controls_tabs();

	$this->add_responsive_control( 
		'caption_text_alignment',
		array( 
			'label'       => esc_html__( 'Caption Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'options'     => array( 
				'left'   => array( 
					'caption' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'    => 'eicon-text-align-left',
				 ),
				'center' => array( 
					'caption' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'    => 'eicon-text-align-center',
				 ),
				'right'  => array( 
					'caption' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'    => 'eicon-text-align-right',
				 ),
			 ),
			'default'     => is_rtl() ? 'right' : 'left',
			'toggle'      => true,
			'separator'   => 'before',
			'selectors'   => array( '{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_caption' => 'text-align: {{VALUE}};' ),
		 )
	 );

	$this->add_control( 
		'caption_padding_margin_heading',
		array( 
			'label' => esc_html__( 'Caption Padding and Margin', 'wpmozo-addons-lite-for-elementor' ),
			'type'  => Controls_Manager::HEADING,

		 )
	 );

	$this->start_controls_tabs( 
		'caption_padding_margin_control_tabs',
	 );

		// Tab 1.
		$this->start_controls_tab( 
			'caption_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );

			// Settings for first tab.
			$this->add_responsive_control( 
				'caption_padding',
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
						'{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

		// Tab 2.
		$this->start_controls_tab( 
			'caption_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 ),
		 );

			// Settings for second tab.
			$this->add_responsive_control( 
				'caption_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'default'    => array( 
						'top'    => 0,
						'right'  => 0,
						'bottom' => 0,
						'left'   => 0,
					 ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_ae_masonry_gallery_item_caption' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );

		$this->end_controls_tab();

	$this->end_controls_tabs();

$this->end_controls_section();

// Lightbox styling.
$this->start_controls_section( 
	'lightbox_styling_section',
	array( 
		'label'     => esc_html__( 'Lightbox', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 'lightbox_switcher!' => '' ),
	 )
 );

	$this->add_responsive_control( 
		'lightbox_background_color',
		array( 
			'label'       => esc_html__( 'Lightbox Background Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#0000006E',
			'selectors'   => array( 
				'{{WRAPPER}}.mfp-wrap' => 'background-color:{{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'exit_icon_color',
		array( 
			'label'       => esc_html__( 'Exit Icon Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#ffffff',
			'selectors'   => array( 
				'{{WRAPPER}} .mfp-close' => 'color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'arrows_color',
		array( 
			'label'       => esc_html__( 'Arrow Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#ffffff',
			'selectors'   => array( 
				'{{WRAPPER}} .mfp-arrow.mfp-arrow-right:after' => 'border-left-color: {{VALUE}};',
				'{{WRAPPER}} .mfp-arrow.mfp-arrow-left:after' => 'border-right-color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'arrow_border_color',
		array( 
			'label'       => esc_html__( 'Arrow Border Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#FFFFFF75',
			'selectors'   => array( 
				'{{WRAPPER}}.wpmozo_ae_masonry_gallery_lightbox .mfp-arrow-left::before' => 'border-right-color: {{VALUE}};',
				'{{WRAPPER}}.wpmozo_ae_masonry_gallery_lightbox .mfp-arrow-right::before' => 'border-left-color: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'title_and_caption_color',
		array( 
			'label'       => esc_html__( 'Title & Caption Background Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#FFFFFF75',
			'selectors'   => array( 
				'{{WRAPPER}} .mfp-title > .wpmozo_ae_masonry_gallery_item_title , {{WRAPPER}} .mfp-title > .wpmozo_ae_masonry_gallery_item_caption , {{WRAPPER}} .mfp-title' => 'background-color: {{VALUE}}; padding-right:0;',
			 ),
		 )
	 );

$this->end_controls_section();

// Overlay styling.
$this->start_controls_section( 
	'overlay_styling_section',
	array( 
		'label'     => esc_html__( 'Overlay', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 'overlay_on_hover_switcher' => 'yes' ),
	 )
 );

	$this->add_responsive_control( 
		'overlay_icon_size_slider',
		array( 
			'label'      => esc_html__( 'Icon Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => array( 
				'px' => array( 
					'min'  => 0,
					'max'  => 200,
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
				'size' => '20',
			 ),
			'size_units' => array( 'px', '%', 'vw', 'vh' ),
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_ae_masonry_gallery_icon' => 'font-size: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .wpmozo_ae_masonry_gallery_image_wrapper svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'overlay_icon_color',
		array( 
			'label'       => esc_html__( 'Overlay Icon Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#ffffff',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_masonry_gallery_icon' => 'color: {{VALUE}};',
				'{{WRAPPER}} .wpmozo_ae_masonry_gallery_image_wrapper svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
			 ),
		 )
	 );

	$this->add_responsive_control( 
		'image_overlay_color',
		array( 
			'label'       => esc_html__( 'Overlay Background Color', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::COLOR,
			'default'     => '#0000006E',
			'selectors'   => array( 
				'{{WRAPPER}} .wpmozo_ae_masonry_gallery_image_wrapper::before' => 'background-color: {{VALUE}};',
			 ),
		 )
	 );

$this->end_controls_section();
