<?php 
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;

//content section starts here
$this->start_controls_section( 'content_section',
        array( 
            'label' => __( 'Content', 'wpmozo-addons-lite-for-elementor' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        )
    );
    $this->add_control( 'layout',
        array( 
            'label'       => __( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'layout1'   => esc_html__( 'Layout1', 'wpmozo-addons-lite-for-elementor' ),
                'layout2'   => esc_html__( 'Layout2', 'wpmozo-addons-lite-for-elementor' ),                
            ),
            'default'     => 'layout1',           
        )
    );
    $this->add_control( 'number_of_members',
        array( 
            'label'     => esc_html__( 'Number of Members', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::NUMBER,
            'min'       => 1,
            'max'       => 15,
            'step'      => 1,
            'default'   => 10,            
        )
    );
    $this->add_control( 'team_order',
        array( 
            'label'       => __( 'Order', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'desc'     => esc_html__( 'DESC', 'wpmozo-addons-lite-for-elementor' ),
                'asc'      => esc_html__( 'ASC', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'     => 'desc',
        )
    );
    $this->add_control( 'team_order_by',
        array( 
            'label'       => __( 'Order By', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'date'          => esc_html__( 'Date', 'wpmozo-addons-lite-for-elementor' ),
                'modified_date' => esc_html__( 'Modified Date', 'wpmozo-addons-lite-for-elementor' ),
                'title'         => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
                'slue'          => esc_html__( 'Slug', 'wpmozo-addons-lite-for-elementor' ),
                'ID'            => esc_html__( 'ID', 'wpmozo-addons-lite-for-elementor' ),
                'random'        => esc_html__( 'Random', 'wpmozo-addons-lite-for-elementor' ),
                'relevance'     => esc_html__( 'Relevance', 'wpmozo-addons-lite-for-elementor' ),
                'none'          => esc_html__( 'None', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'   => 'date',
        )
    );
    $this->add_control( 'select_categories',
        array( 
            'label'         => esc_html__( 'Select Categories', 'wpmozo-addons-lite-for-elementor' ),
            'type'          => Controls_Manager::SELECT2,
            'label_block'   => true,
            'multiple'      => true,
            'options'       => wpmozo_team_slider_for_elementor_get_team_member_categories(),            
        )
    );
    $this->add_control( 
        'no_result_text',
        array( 
            'label'         => esc_html__( 'No Result Text', 'wpmozo-addons-lite-for-elementor' ),
            'type'          => Controls_Manager::TEXT,
            'label_block'   => true,
            'placeholder'   => esc_html__( 'The team member you requested could not be found. Try changing your widget settings or create some new team members.', 'wpmozo-addons-lite-for-elementor' ),
        )
    );
$this->end_controls_section();

//Element section starts here
$this->start_controls_section( 'elements_section',
        array( 
            'label' => __( 'Elements', 'wpmozo-addons-lite-for-elementor' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        )
    );
    $this->add_control( 'show_designation',
        array( 
            'label'        => esc_html__( 'Show Designation', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            )
    );
    $this->add_control( 'show_description',
        array( 
            'label'        => esc_html__( 'Show Descripton', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        )
    );
    $this->add_control( 'show_skills',
        array( 
            'label'        => esc_html__( 'Show Skills', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        )
    );
    $this->add_control( 'show_social_icon',
        array( 
            'label'        => esc_html__( 'Show Social Icon', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        )
    );
    $this->add_control( 'link_target',
        array( 
            'label'       => __( 'Social Icon Link Target', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => true,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                '_self'         => esc_html__( 'In The Same Window', 'wpmozo-addons-lite-for-elementor' ),
                '_blank'        => esc_html__( 'In the New Tab', 'wpmozo-addons-lite-for-elementor' ),                
            ),
            'default'     => '_self',
            'condition'   => array( 'show_social_icon' => 'yes' )
        )
    );
    $this->add_control( 'enable_member_link',
        array( 
            'label'        => esc_html__( 'Enable Member Link', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        )
    );
    $this->add_control( 'member_link_target',
        array( 
            'label'       => __( 'Member Link Target', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => true,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                '_self'         => esc_html__( 'In The Same Window', 'wpmozo-addons-lite-for-elementor' ),
                '_blank'        => esc_html__( 'In the New Tab', 'wpmozo-addons-lite-for-elementor' ),                
            ),
            'default'     => '_self',
            'condition'   => array( 'enable_member_link' => 'yes' )
        )
    );
$this->end_controls_section();

//Slider settings start here
$this->start_controls_section( 'slider_settings',
    array( 
        'label' => esc_html__( 'Slider', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_CONTENT,
    )
 );    
    $this->add_control( 'slide_effect',
        array( 
            'label'       => __( 'Slider Effect', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'separator'   => 'after',
            'options'     => array( 
                'slide'     => esc_html__( 'Slide', 'wpmozo-addons-lite-for-elementor' ),
                'cube'      => esc_html__( 'Cube', 'wpmozo-addons-lite-for-elementor' ),
                'coverflow' => esc_html__( 'Coverflow', 'wpmozo-addons-lite-for-elementor' ),
                'flip'      => esc_html__( 'Flip', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'     => 'slide',
            'render_type' => 'template'
        )
    );
    $this->add_responsive_control( 'cards_per_slide',
        array( 
            'label'     => esc_html__( 'Number of Cards Per Slide', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::NUMBER,
            'min'       => 1,
            'max'       => 15,
            'step'      => 1,
            'default'   => 3,
            'condition' => array( 'slide_effect' => array( 'slide', 'coverflow' ) ),
        )
    );
    $this->add_responsive_control( 'slides_per_group',
        array( 
            'label'     => esc_html__( 'Number of Slides Per Group', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::NUMBER,
            'min'       => 1,
            'max'       => 15,
            'step'      => 1,
            'default'   => 1,
            'condition' => array( 'slide_effect' => array( 'slide', 'coverflow' ) ),
        )
    );
    $this->add_responsive_control( 'space_between_slides',
        array( 
            'label' => esc_html__( 'Space Between Slides', 'wpmozo-addons-lite-for-elementor' ),
            'type'  => Controls_Manager::SLIDER,
            'range' => array( 
                'px' => array( 
                    'min'  => 10,
                    'max'  => 100,
                    'step' => 1,
                )
            ),
            'devices' => array( 'desktop', 'tablet', 'mobile' ),
            'default' => array( 
                'size' => 20,
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
            'size_units'  => array( 'px' ),
            'condition'   => array( 'slide_effect' => array( 'slide', 'coverflow' ) ),
            'render_type' => 'template'
        )
    );
    $this->add_control( 'enable_coverflow_shadow',
        array( 
            'label'        => esc_html__( 'Enable Slide Shadow', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'condition'      => array( 'slide_effect' => 'coverflow' ),
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_responsive_control( 'coverflow_shadow_color',
        array( 
            'label'         => esc_html__( 'Shadow Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#222',
            'condition'     => array( 'enable_coverflow_shadow' => 'yes', 'slide_effect' => 'coverflow' ),
            'selectors'     => array( '{{WRAPPER}} .wpmozo_wrapper .swiper-slide-shadow-left' => 'background-image: linear-gradient( to left,{{VALUE}},rgba( 0,0,0,0 ) ) !important;',
                '{{WRAPPER}} .wpmozo_wrapper .swiper-slide-shadow-right' => 'background-image: linear-gradient( to right,{{VALUE}},rgba( 0,0,0,0 ) ) !important;'
            )
        )
    );
    $this->add_responsive_control( 'coverflow_rotate',
        array( 
            'type' => Controls_Manager::SLIDER,
            'label' => esc_html__( 'Coverflow Rotate ', 'wpmozo-addons-lite-for-elementor' ),
            'range' => array( 
                'px' => array( 
                    'min' => 1,
                    'max' => 360,
                    'step'=>1,
                ),
            ),
            'default' => array( 
                'size' => 40,
                'unit' => 'px',
            ),
            'condition'      => array( 'slide_effect' => 'coverflow' ),
            'selectors' => array( 
                '{{WRAPPER}} .' => 'transform: rotate( {{SIZE}}{{UNIT}} );',
            ),
            'render_type' => 'template'
        )
    );
    $this->add_responsive_control( 'coverflow_depth',
        array( 
            'type' => Controls_Manager::SLIDER,
            'label' => esc_html__( 'Coverflow Depth ', 'wpmozo-addons-lite-for-elementor' ),
            'range' => array( 
                'px' => array( 
                    'min' => 1,
                    'max' => 1000,
                    'step'=>1,
                ),
            ),
            'default' => array( 
                'size' => 100,
                'unit' => 'px',
            ),
            'condition'      => array( 'slide_effect' => 'coverflow' ),
            'selectors' => array( 
                '{{WRAPPER}} .' => 'transform: rotate( {{SIZE}}{{UNIT}} );',
            ),
            'render_type' => 'template'
        )
    );
    $this->add_control( 'equalize_slides_height',
        array( 
            'label'        => esc_html__( 'Equalize Slides Height', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'equal_height',
            'default'      => 'no',
            'render_type'  => 'template',
            'prefix_class' => 'wpmozo_ae_',
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
            'condition'    => array( 'enable_auto_height!' => 'yes' ),
            'selectors' => array( 
                '{{WRAPPER}}.wpmozo_ae_equal_height .wpmozo_wrapper' => 'align-self: flex-start;',
                '{{WRAPPER}}.wpmozo_ae_equal_height .wpmozo_wrapper .wpmozo_ae_team_member_card' => 'height:100%;',
            )
        )
    );
    $this->add_control( 'enable_auto_height',
        array( 
            'label'        => esc_html__( 'Enable Auto Height', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'condition'    => array( 'equalize_slides_height!' => 'equal_height' ),
            'selectors_dictionary'  => array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 'slider_loop',
        array( 
            'label'        => esc_html__( 'Enable Loop', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 'autoplay',
        array( 
            'label'        => esc_html__( 'Autoplay', 'wpmozo-addons-lite-for-elementor' ),
            'separator'	   => 'before',
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 'autoplay_speed',
        array( 
            'label'     => esc_html__( 'Autoplay Delay', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::NUMBER,
            'min'       => 0,
            'max'       => 10000,
            'step'      => 100,
            'default'   => 3000,
            'condition' => array( 'autoplay' => 'yes' ),
        )
    );
    $this->add_control( 'pause_on_hover',
        array( 
            'label'        => esc_html__( 'Pause On Hover', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'condition' => array( 'autoplay' => 'yes' ),
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 
        'enable_linear_transition',
        array( 
            'label'                => esc_html__( 'Enable Linear Transition', 'wpmozo-addons-lite-for-elementor' ),
            'type'                 => Controls_Manager::SWITCHER,
            'label_off'            => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'             => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value'         => 'linear', // return value when the switch is on.
            'default'              => 'no',
            'selectors_dictionary' => array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
            'selectors'            => array( '{{WRAPPER}} .swiper-wrapper' => 'transition-timing-function: {{VALUE}} !important; align-items:center;' ),
        )
    );
    $this->add_control( 'slide_transition_duration',
        array( 
            'label'   => esc_html__( 'Transition Duration', 'wpmozo-addons-lite-for-elementor' ),
            'type'    => Controls_Manager::NUMBER,
            'min'     => 100,
            'max'     => 10000,
            'step'    => 100,
            'default' => 1000,
        )
    );
    $this->add_control( 'show_arrow',
        array( 
            'label'        => esc_html__( 'Show Arrows', 'wpmozo-addons-lite-for-elementor' ),
            'separator'	   => 'before',
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 'previous_slide_arrow',
        array( 
            'label'            => esc_html__( 'Previous Arrow', 'wpmozo-addons-lite-for-elementor' ),
            'type'             => Controls_Manager::ICONS,
            'default'          => array( 
                'value'        => 'fas fa-chevron-left',
                'library'      => 'fa-solid',
            ),
            'condition'        => array( 'show_arrow' => 'yes' ),
        )
    );
    $this->add_control( 'next_slide_arrow',
        array( 
            'label'            => esc_html__( 'Next Arrow', 'wpmozo-addons-lite-for-elementor' ),
            'type'             => Controls_Manager::ICONS,
            'default'          => array( 
                'value'        => 'fas fa-chevron-right',
                'library'      => 'fa-solid',
            ),
            'condition'        => array( 'show_arrow' => 'yes' ),
        )
    );
    $this->add_control( 'show_arrow_on_hover',
        array( 
            'label'        => esc_html__( 'Show Arrows On Hover', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'condition'    => array( 'show_arrow' => 'yes' ),
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_responsive_control( 'arrows_position',
        array( 
            'label'       => __( 'Arrows Position', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'inside'        => esc_html__( 'Inside', 'wpmozo-addons-lite-for-elementor' ),
                'outside'       => esc_html__( 'Outside', 'wpmozo-addons-lite-for-elementor' ),
                'top_left'      => esc_html__( 'Top Left', 'wpmozo-addons-lite-for-elementor' ),
                'top_right'     => esc_html__( 'Top Right', 'wpmozo-addons-lite-for-elementor' ),
                'top_center'    => esc_html__( 'Top Center', 'wpmozo-addons-lite-for-elementor' ),
                'bottom_left'   => esc_html__( 'Bottom Left', 'wpmozo-addons-lite-for-elementor' ),
                'bottom_right'  => esc_html__( 'Bottom Right', 'wpmozo-addons-lite-for-elementor' ),
                'bottom_center' => esc_html__( 'Bottom Center', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'   => 'inside',
            'condition' => array( 'show_arrow' => 'yes' )
        )
    );
    $this->add_control( 'show_control_dot',
        array( 
            'label'        => esc_html__( 'Show Dots Pagination', 'wpmozo-addons-lite-for-elementor' ),
            'separator'	   => 'before',
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 'control_dot_style',
        array( 
            'label'       => __( 'Dots Pagination Style', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'solid_dot'       => esc_html__( 'Solid Dot', 'wpmozo-addons-lite-for-elementor' ),
                'transparent_dot' => esc_html__( 'Transparent Dot', 'wpmozo-addons-lite-for-elementor' ),
                'stretched_dot'   => esc_html__( 'Stretched Dot', 'wpmozo-addons-lite-for-elementor' ),
                'line'            => esc_html__( 'Line', 'wpmozo-addons-lite-for-elementor' ),
                'rounded_line'    => esc_html__( 'Rounded Line', 'wpmozo-addons-lite-for-elementor' ),
                'square_dot'      => esc_html__( 'Squared Dot', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'     => 'solid_dot',
            'condition'   => array( 'show_control_dot' => 'yes' ),
            'render-type' => 'template'
        )
    );
    $this->add_control( 'enable_dynamic_dots',
        array( 
            'label'        => esc_html__( 'Enable Dynamic Dots', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'condition'        => array( 
                'show_control_dot' => 'yes',
                'control_dot_style' => array( 
                    'solid_dot',
                    'transparent_dot',
                    'square_dot'
                ),
            ),
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
$this->end_controls_section();

// Text Alignment section starts here
$this->start_controls_section( 'style_section',
        array( 
            'label' => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
            'tab' =>Controls_Manager::TAB_STYLE,
        )
    );   
    $this->add_responsive_control( 
        'team_alignment',
        array( 
            'label'     => esc_html__( 'Team Alignment', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::CHOOSE,
            'options'   => array( 
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
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper' => 'text-align: {{VALUE}};',
            ),
        )
    );
$this->end_controls_section();

// Name text section starts here
$this->start_controls_section( 'name_text',
        array( 
            'label' => esc_html__( 'Name Text', 'wpmozo-addons-lite-for-elementor' ),
            'tab' =>Controls_Manager::TAB_STYLE,
        )
    );
    $this->add_control( 
        'name_text_heading_level',
        array( 
            'label'       => esc_html__( 'Name Text Heading Level', 'wpmozo-addons-lite-for-elementor' ),
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
    $this->add_responsive_control( 'name_text_color',
        array( 
            'label'         => esc_html__( 'Name Text Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#333',
            'selectors'     => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_ae_team_member_name' => 'color:{{VALUE}};',
                
            )
        )
    );  
    $this->add_group_control( 
        Group_Control_Typography::get_type(),
        array( 
            'name' => 'name_text_typography',
            'selector' => '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_ae_team_member_name .wpmozo_ae_team_member_name_heading',
        )
    );
    $this->add_group_control( 
        Group_Control_Text_Shadow::get_type(),
        array( 
            'name' => 'name_text_shadow',
            'selector' => '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_ae_team_member_name .wpmozo_ae_team_member_name_heading',
        )
    );
    $this->add_responsive_control( 
        'name_text_alignment',
        array( 
            'label'     => esc_html__( 'Name Alignment', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::CHOOSE,
            'options'   => array( 
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
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_ae_team_member_name .wpmozo_ae_team_member_name_heading' => 'text-align: {{VALUE}};',
            ),
        )
    );    
$this->end_controls_section();


// Designation text section starts here
$this->start_controls_section( 'designation_text',
        array( 
            'label' => esc_html__( 'Designation Text', 'wpmozo-addons-lite-for-elementor' ),
            'tab' =>Controls_Manager::TAB_STYLE,
            'condition' => array( 'show_designation' => 'yes' )
        )
    );
    $this->add_control( 
        'designation_heading_level',
        array( 
            'label'       => esc_html__( 'Designation Heading Level', 'wpmozo-addons-lite-for-elementor' ),
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
            'default'     => 'h4',
            'toggle'      => true,
        )
    );   
    $this->add_responsive_control( 'designation_text_color',
        array( 
            'label'         => esc_html__( 'Designation Text Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#333',
            'selectors'     => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_ae_team_member_designation .wpmozo_ae_team_member_designation_heading' => 'color:{{VALUE}};',
            )
        )
    );  
    $this->add_group_control( 
        Group_Control_Typography::get_type(),
        array( 
            'name'      => 'designation_text_typography',
            'selector'  => '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_ae_team_member_designation .wpmozo_ae_team_member_designation_heading',
        )
    );
    $this->add_group_control( 
        Group_Control_Text_Shadow::get_type(),
        array( 
            'name'      => 'designation_text_shadow',
            'selector'  => '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_ae_team_member_designation .wpmozo_ae_team_member_designation_heading',
        )
    );
    $this->add_responsive_control( 
        'designation_text_alignment',
        array( 
            'label'     => esc_html__( 'Designation Alignment', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::CHOOSE,
            'options'   => array( 
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
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_ae_team_member_designation .wpmozo_ae_team_member_designation_heading' => 'text-align: {{VALUE}};',
            ),
        )
    );    
$this->end_controls_section();

// Description text section starts here
$this->start_controls_section( 'description_text',
        array( 
            'label' => esc_html__( 'Description Text', 'wpmozo-addons-lite-for-elementor' ),
            'tab' =>Controls_Manager::TAB_STYLE,
            'condition' => array( 'show_description' => 'yes' )
        )
    );     
    $this->add_responsive_control( 'description_text_color',
        array( 
            'label'         => esc_html__( 'Description Text Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#333',
            'selectors'     => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper p.wpmozo_ae_team_member_short_desc_text' => 'color:{{VALUE}};',
            )
        )
    );  
    $this->add_group_control( 
        Group_Control_Typography::get_type(),
        array( 
            'name' => 'description_text_typography',
            'selector' => '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper p.wpmozo_ae_team_member_short_desc_text',
        )
    );
    $this->add_group_control( 
        Group_Control_Text_Shadow::get_type(),
        array( 
            'name' => 'description_text_shadow',
            'selector' => '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper p.wpmozo_ae_team_member_short_desc_text',
        )
    );
    $this->add_responsive_control( 
        'description_text_alignment',
        array( 
            'label'     => esc_html__( 'Description Alignment', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::CHOOSE,
            'options'   => array( 
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
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper p.wpmozo_ae_team_member_short_desc_text' => 'text-align: {{VALUE}};',
            ),
        )
    );    
$this->end_controls_section();

// Skill text section starts here
$this->start_controls_section( 'skill_text',
        array( 
            'label' => esc_html__( 'Skill Text', 'wpmozo-addons-lite-for-elementor' ),
            'tab' =>Controls_Manager::TAB_STYLE,
            'condition' => array( 'show_skills' => 'yes' )
        )
    );     
    $this->add_responsive_control( 'skill_text_color',
        array( 
            'label'         => esc_html__( 'Skill Text Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#333',
            'selectors'     => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_skill_bar_wrapper .wpmozo_skill_name' => 'color:{{VALUE}};',
               
            )
        )
    );  
    $this->add_group_control( 
        Group_Control_Typography::get_type(),
        array( 
            'name' => 'skill_text_typography',
            'selector' => '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_skill_bar_wrapper .wpmozo_skill_name',
        )
    );

    $this->add_group_control( 
        Group_Control_Text_Shadow::get_type(),
        array( 
            'name' => 'skill_text_shadow',
            'selector' => '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_skill_bar_wrapper .wpmozo_skill_name',
        )
    );
    $this->add_responsive_control( 
        'skill_text_alignment',
        array( 
            'label'     => esc_html__( 'Skill Alignment', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::CHOOSE,
            'options'   => array( 
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
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_content_wrapper .wpmozo_skill_bar_wrapper .wpmozo_skill_name' => 'text-align: {{VALUE}};',
            ),
        )
    );    
$this->end_controls_section();

// Skills section starts here
$this->start_controls_section( 'skills',
        array( 
            'label' => esc_html__( 'Skills', 'wpmozo-addons-lite-for-elementor' ),
            'tab' =>Controls_Manager::TAB_STYLE,
            'condition' => array( 'show_skills' => 'yes' )
        )
    );
    $this->add_responsive_control( 'bar_height',
        array( 
            'label' => esc_html__( 'Bar Height', 'wpmozo-addons-lite-for-elementor' ),
            'type'  => Controls_Manager::SLIDER,
            'range' => array( 
                'px' => array( 
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                )
            ),
            'devices' => array( 'desktop', 'tablet', 'mobile' ),
            'default' => array( 
                'size' => 20,
                'unit' => 'px',
            ),
            'tablet_default' => array( 
                'size' => 15,
                'unit' => 'px',
            ),
            'mobile_default' => array( 
                'size' => 10,
                'unit' => 'px',
            ),
            'size_units' => array( 'px' ),            
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_empty_bar '   => 'height: {{SIZE}}{{UNIT}};'

            ),
        )
    );
    $this->add_responsive_control( 'empty_bar_color',
        array( 
            'label'         => esc_html__( 'Empty Bar Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#AFAFAF',
            'selectors'     => array( 
                '{{WRAPPER}} .wpmozo_empty_bar'    => 'background:{{VALUE}};'
            )
        )
    );  
    $this->add_responsive_control( 'filled_bar_color',
        array( 
            'label'         => esc_html__( 'Filled Bar Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#007AFE',
            'selectors'     => array( 
                '{{WRAPPER}} .wpmozo_filled_bar'    => 'background:{{VALUE}};'
            )
        )
    ); 
$this->end_controls_section();

// Social Icons style section starts here
$this->start_controls_section( 'social_icons_style',
        array( 
            'label' => esc_html__( 'Social Icons', 'wpmozo-addons-lite-for-elementor' ),
            'tab' =>Controls_Manager::TAB_STYLE,
            'condition' => array( 'show_social_icon' => 'yes' )
        )
    );
    $this->add_responsive_control( 'icon_size',
        array( 
            'label' => esc_html__( 'Icon Size', 'wpmozo-addons-lite-for-elementor' ),
            'type'  => Controls_Manager::SLIDER,
            'range' => array( 
                'px' => array( 
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                )
            ),
            'devices' => array( 'desktop', 'tablet', 'mobile' ),
            'default' => array( 
                'size' => 20,
                'unit' => 'px',
            ),
            'tablet_default' => array( 
                'size' => 15,
                'unit' => 'px',
            ),
            'mobile_default' => array( 
                'size' => 10,
                'unit' => 'px',
            ),
            'size_units' => array( 'px' ),            
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_social_wrapper i.wpmozo_ae_team_member_social_icon'   => 'font-size: {{SIZE}}{{UNIT}};',
            ),
        )
    );
    $this->add_responsive_control( 'icon_color',
        array( 
            'label'         => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '',
            'selectors'     => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_social_wrapper i.wpmozo_ae_team_member_social_icon'  => 'color:{{VALUE}}!important;',
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_social_wrapper i.wpmozo_ae_team_member_social_icon.fa-instagram.with_bg'  => 'background: none;-webkit-background-clip: unset;background-clip: unset;-webkit-text-fill-color: unset;',
            ),
            'render_type'   => 'template'
        )
    );  
    $this->add_responsive_control( 'icon_background_color',
        array( 
            'label'         => esc_html__( 'Icon Background Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'selectors'     => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_social_wrapper i.wpmozo_ae_team_member_social_icon'  => 'background-color:{{VALUE}}!important;',
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_social_wrapper i.wpmozo_ae_team_member_social_icon.fa-instagram.with_bg'  => 'background: none;-webkit-background-clip: unset;background-clip: unset;-webkit-text-fill-color: unset;',
            ),
            'render_type'   => 'template'
        )
    );
    $this->add_group_control( 
        Group_Control_Border::get_type(),
        array( 
            'name'      => 'social_icon_border',
            'selector'  => '{{WRAPPER}} .wpmozo_team_social_wrapper .wpmozo_ae_team_member_social_icon',
        )
    );
    $this->add_responsive_control( 'social_icon_border_radius',
        array( 
            'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::DIMENSIONS,
            'label_block' => true,
            'size_units'  => array( 'px', 'em', '%' ),
            'default'     =>array( 'top'=> 5, 'right'=> 5, 'bottom'=> 5, 'left'=> 5 ),
            'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_team_social_wrapper .wpmozo_ae_team_member_social_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
        )
    );
    $this->add_responsive_control( 
        'social_icon_alignment',
        array( 
            'label'     => esc_html__( 'Social Icon Alignment', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::CHOOSE,
            'options'   => array( 
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
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_ae_team_member_card .wpmozo_team_social_wrapper' => 'justify-content: {{VALUE}};',
            ),
        )
    ); 
$this->end_controls_section();

$this->start_controls_section( 'slider_styling',
    array( 
        'label' => esc_html__( 'Slider', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
 );

    $this->add_group_control( 
        Group_Control_Background::get_type(),
        array( 
            'name'     => 'slide_background',
            'label'    => esc_html__( 'Slide Background', 'wpmozo-addons-lite-for-elementor' ),
            'types'    => array( 'classic', 'gradient', 'image' ),
            'selector' => '{{WRAPPER}} .swiper-wrapper .wpmozo_ae_team_member_card',
            'fields_options' => array( 
                'background' => array( 
                    'label' => esc_html__( 'Slide Background', 'wpmozo-addons-lite-for-elementor' )
                )
            )
        )
    );

    $this->start_controls_tabs( 'slider_padding_tabs',
        array( 
            'separator' => 'before'
        )
    );

        //Tab 1
        $this->start_controls_tab( 'container_padding_tab',
            array( 
                'label' => esc_html__( 'Container', 'wpmozo-addons-lite-for-elementor' )
            )
        );
            $this->add_responsive_control( 'slider_container_custom_padding',
                array( 
                    'label'       => esc_html__( 'Slider Container Padding', 'wpmozo-addons-lite-for-elementor' ),
                    'type'        => Controls_Manager::DIMENSIONS,
                    'label_block' => true,
                    'size_units'  => array( 'px', 'em', '%' ),
                    'default'     =>array( 'top'=> 5, 'right'=> 5, 'bottom'=> 5, 'left'=> 5 ),
                    'separator' => 'after',
                    'selectors'   => array( 
                        '{{WRAPPER}} .swiper-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );
        $this->end_controls_tab();

        $this->start_controls_tab( 'slide_padding_tab',
            array( 
                'label' => esc_html__( 'Slide', 'wpmozo-addons-lite-for-elementor' )
            )
        );
            $this->add_responsive_control( 'slide_custom_padding',
                array( 
                    'label'       => esc_html__( 'Slide Padding', 'wpmozo-addons-lite-for-elementor' ),
                    'type'        => Controls_Manager::DIMENSIONS,
                    'label_block' => true,
                    'size_units'  => array( 'px', 'em', '%' ),
                    'default'     =>array( 'top'=> 5, 'right'=> 5, 'bottom'=> 5, 'left'=> 5 ),
                    'separator' => 'after',
                    'selectors'   => array( 
                        '{{WRAPPER}} .swiper-wrapper .wpmozo_wrapper .wpmozo_ae_team_member_card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ),
                )
            );
        $this->end_controls_tab();
        $this->start_controls_tab( 'arrows_padding_tab',
            array( 
                'label' => esc_html__( 'Arrows', 'wpmozo-addons-lite-for-elementor' ),
                'condition'   => array( 'show_arrow' => 'yes' ),
            )
        );
            $this->add_responsive_control( 'arrows_custom_padding',
                array( 
                    'label'       => esc_html__( 'Arrows Padding', 'wpmozo-addons-lite-for-elementor' ),
                    'type'        => Controls_Manager::DIMENSIONS,
                    'label_block' => true,
                    'size_units'  => array( 'px', 'em', '%' ),
                    'default'     =>array( 'top'=> 5, 'right'=> 5, 'bottom'=> 5, 'left'=> 5 ),
                    'condition'   => array( 'show_arrow' => 'yes' ),
                    'separator' => 'after',
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->add_group_control( 
        Group_Control_Border::get_type(),
        array( 
            'name'      => 'slide_border',
            'selector'  => '{{WRAPPER}} .wpmozo_wrapper .wpmozo_ae_team_member_card',
            'fields_options' => array( 
                'border' => array( 'label' => esc_html__( 'Member Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
                'width' => array( 'label' => esc_html__( 'Member Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
                'color' => array( 'label' => esc_html__( 'Member Border Color', 'wpmozo-addons-lite-for-elementor' ) )
            )
        )
    );
    $this->add_responsive_control( 'slide_border_radius',
        array( 
            'label'       => esc_html__( 'Member Border Radius', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::DIMENSIONS,
            'label_block' => true,
            'size_units'  => array( 'px', 'em', '%' ),
            'default'     =>array( 'top'=> 5, 'right'=> 5, 'bottom'=> 5, 'left'=> 5 ),
            'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_wrapper .wpmozo_ae_team_member_card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
        )
    );
    $this->add_group_control( 
        Group_Control_Box_Shadow::get_type(),
        array( 
            'name'      => 'member_box_shadow',
            'selector'  => '{{WRAPPER}} .wpmozo_wrapper .wpmozo_ae_team_member_card',
            'fields_options' => array( 
                'box-shadow' => array( 
                    'label' => esc_html__( 'Member Box Shadow' , 'wpmozo-addons-lite-for-elementor' ),
                )
            )
        )
    );
    $this->add_responsive_control( 'arrows_font_size',
        array( 
            'label' => esc_html__( 'Arrows Font Size', 'wpmozo-addons-lite-for-elementor' ),
            'type'  => Controls_Manager::SLIDER,
            'range' => array( 
                'px' => array( 
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                )
            ),
            'devices' => array( 'desktop', 'tablet', 'mobile' ),
            'default' => array( 
                'size' => 20,
                'unit' => 'px',
            ),
            'tablet_default' => array( 
                'size' => 15,
                'unit' => 'px',
            ),
            'mobile_default' => array( 
                'size' => 10,
                'unit' => 'px',
            ),
            'size_units' => array( 'px' ),
            'condition'   => array( 'show_arrow' => 'yes' ),
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_swiper_navigation i ' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .wpmozo_swiper_navigation svg ' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};'

            ),
        )
    );
    $this->start_controls_tabs( 'arrows_background_normal_and_hover_state_control_tab',
        array( 
            'separator' => 'before'
        )
    );

        //Tab 1
        $this->start_controls_tab( 'arrows_background_normal_state_tab',
            array( 
                'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
                'condition'   => array( 'show_arrow' => 'yes' ),
            )
        );
            $this->add_responsive_control( 'arrows_color',
                array( 
                    'label'         => esc_html__( 'Arrows Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'   	=> '#007AFE',
                    'condition'   => array( 'show_arrow' => 'yes' ),
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation i' => 'color:{{VALUE}};',
                        '{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'fill:{{VALUE}};'
                    )
                )
            );
            $this->add_responsive_control( 'arrows_background_color',
                array( 
                    'label'         => esc_html__( 'Arrows Background', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'condition'   => array( 'show_arrow' => 'yes' ),
                    'default'   	=> '',
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation i' => 'background-color:{{VALUE}};',
                        '{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'background-color:{{VALUE}};' 
                    ),
                )
            );
            $this->add_responsive_control( 'arrows_background_border_size',
                array( 
                    'label' => esc_html__( 'Arrows Background Border', 'wpmozo-addons-lite-for-elementor' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => array( 
                        'px' => array( 
                            'min' => 1,
                            'max' => 1000,
                            'step' => 1,
                        )
                    ),
                    'default' => array( 
                        'size' => '',
                        'unit' => 'px',
                    ),
                    'size_units' => array( 'px' ),
                    'condition'   => array( 'show_arrow' => 'yes' ),
                    'selectors' => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next' => 'border: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'border: {{SIZE}}{{UNIT}} solid;'
                    ),
                )
            );
            $this->add_responsive_control( 'arrows_background_border_color',
                array( 
                    'label'         => esc_html__( 'Arrows Background Border Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'   	=> '',
                    'condition'     => array( 'show_arrow' => 'yes' ),
                    'separator'     => 'after',
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next' => 'border-color:{{VALUE}};', 
                        '{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'border-color:{{VALUE}};' 
                    ),
                )
            );
        $this->end_controls_tab();

        //Tab 2
        $this->start_controls_tab( 'arrows_background_border_hover_state_tab',
            array( 
                'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
                'condition'   => array( 'show_arrow' => 'yes' ),
            )
        );
            $this->add_responsive_control( 'arrows_hover_color',
                array( 
                    'label'         => esc_html__( 'Arrows Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'   	=> '',
                    'condition'   => array( 'show_arrow' => 'yes' ),
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next:hover' => 'color:{{VALUE}};',
                        '{{WRAPPER}} .wpmozo_swiper_navigation svg:hover' => 'fill:{{VALUE}};'
                    )
                )
            );
            $this->add_responsive_control( 'arrows_background_hover_color',
                array( 
                    'label'         => esc_html__( 'Arrows Background', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'   	=> '',
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next:hover' => 'background-color:{{VALUE}};', 
                        '{{WRAPPER}} .wpmozo_swiper_navigation svg:hover' => 'background-color:{{VALUE}};' 
                    ),
                    'condition'   => array( 'show_arrow' => 'yes' ),
                )
            );
            $this->add_responsive_control( 'arrows_background_border_hover_size',
                array( 
                    'label' => esc_html__( 'Arrows Background Border', 'wpmozo-addons-lite-for-elementor' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => array( 
                        'px' => array( 
                            'min' => 1,
                            'max' => 1000,
                            'step' => 1,
                        )
                    ),
                    'default' => array( 
                        'size' => '',
                        'unit' => 'px',
                    ),
                    'size_units' => array( 'px' ),
                    'condition'   => array( 'show_arrow' => 'yes' ),
                    'selectors' => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next:hover' => 'border: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} .wpmozo_swiper_navigation svg:hover' => 'border: {{SIZE}}{{UNIT}} solid;',
                    ),
                )
            );
            $this->add_responsive_control( 'arrows_background_border_hover_color',
                array( 
                    'label'         => esc_html__( 'Arrows Background Border Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'   	=> '',
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next:hover' => 'border-color:{{VALUE}};',
                        '{{WRAPPER}} .wpmozo_swiper_navigation svg:hover' => 'border-color:{{VALUE}};' 
                    ),
                    'condition'   => array( 'show_arrow' => 'yes' ),
                )
            );
            $this->add_responsive_control( 'arrows_transition_duration',
                array( 
                    'type'  => Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Transition Duration ( ms ) ', 'wpmozo-addons-lite-for-elementor' ),
                    'range' => array( 
                        'ms' => array( 
                            'min' => 0,
                            'max' => 10000,
                            'step'=>100,
                        ),
                    ),
                    'default' => array( 
                        'size' => 300,
                        'unit' => 'ms',
                    ),
                    'separator' => 'after',
                    'selectors' => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next:hover' => 'transition: color {{SIZE}}{{UNIT}}, opacity {{SIZE}}{{UNIT}}, border {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, border-radius {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, font {{SIZE}}{{UNIT}}, size {{SIZE}}{{UNIT}}, letter-spacing {{SIZE}}{{UNIT}}, word-spacing {{SIZE}}{{UNIT}}, margin {{SIZE}}{{UNIT}}, padding {{SIZE}}{{UNIT}}; transition-timing-function: linear;',
                        '{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'transition: fill {{SIZE}}{{UNIT}}, opacity {{SIZE}}{{UNIT}}, border {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, border-radius {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, font {{SIZE}}{{UNIT}}, height {{SIZE}}{{UNIT}}, width {{SIZE}}{{UNIT}}, size {{SIZE}}{{UNIT}}, letter-spacing {{SIZE}}{{UNIT}}, word-spacing {{SIZE}}{{UNIT}}, margin {{SIZE}}{{UNIT}}, padding {{SIZE}}{{UNIT}}; transition-timing-function: linear;'
                    ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();

    $this->add_responsive_control( 'control_dot_active_color',
        array( 
            'label'         => esc_html__( 'Active Dot Pagination Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#000',
            'selectors'     => array( '{{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullet-active-main, {{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background : {{VALUE}};' ),
            'condition'   => array( 'show_control_dot' => 'yes' ),
        )
    );
    $this->add_responsive_control( 'control_dot_inactive_color',
        array( 
            'label'         => esc_html__( 'Inactive Dot Pagination Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#cccccc',
            'selectors'     => array( 
                '{{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullet' => 'background: {{VALUE}};',
                '{{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullets-dynamic' => 'width: 100% !important;' ),
            'condition'   => array( 'show_control_dot' => 'yes' ),
        )
    );
$this->end_controls_section();

/* Custom functions */

function wpmozo_team_slider_for_elementor_get_team_member_categories() {
    $terms = get_terms( array( 
        'taxonomy' =>'wpmozo-ae-team-member-category',
        'hide_empty' => false,
    ) );
    $dynamic_options = array();
    if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
            $dynamic_options[ $term->term_id ] = $term->name;
        }
    }
    return $dynamic_options;
}
