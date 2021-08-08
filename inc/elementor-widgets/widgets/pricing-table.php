<?php
namespace Gymelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Gym Pricing Table Contents section widget.
 *
 * @since 1.0
 */
class Gym_Pricing_Contents extends Widget_Base {

	public function get_name() {
		return 'gym-pricing-contents';
	}

	public function get_title() {
		return __( 'Pricing Contents', 'gym-companion' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'gym-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Pricing contents  ------------------------------
		$this->start_controls_section(
			'pricing_content',
			[
				'label' => __( 'Pricing Contents', 'gym-companion' ),
			]
        );
        
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'gym-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Our Pricing', 'gym-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'gym-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'There are many variations of passages of lorem Ipsum available, but the majority <br> have suffered alteration.',
            ]
        );
		$this->add_control(
            'pricing', [
                'label' => __( 'Create New', 'gym-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ pack_name }}}',
                'fields' => [
                    [
                        'name' => 'pack_name',
                        'label' => __( 'Package Name', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Beginner', 'gym-companion' ),
                    ],
                    [
                        'name' => 'pack_price',
                        'label' => __( 'Package Price', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '$45/m', 'gym-companion' ),
                    ],
                    [
                        'name' => 'fet_1',
                        'label' => __( 'Feature 1', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '24h unlimited access', 'gym-companion' ),
                    ],
                    [
                        'name' => 'fet_2',
                        'label' => __( 'Feature 2', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Trainer Advice', 'gym-companion' ),
                    ],
                    [
                        'name' => 'fet_3',
                        'label' => __( 'Feature 3', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Locker + Bathroom', 'gym-companion' ),
                    ],
                    [
                        'name' => 'fet_4',
                        'label' => __( 'Feature 4', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Personal trainer', 'gym-companion' ),
                    ],
                    [
                        'name' => 'btn_label',
                        'label' => __( 'Button Label', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Join Now', 'gym-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Button URL', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                ],
                'default'   => [
                    [
                        'pack_name'       => __( 'Beginner', 'gym-companion' ),
                        'pack_price'      => __( '$45/m', 'gym-companion' ),
                        'fet_1'           => __( '24h unlimited access', 'gym-companion' ),
                        'fet_2'           => __( 'Trainer Advice', 'gym-companion' ),
                        'fet_3'           => __( 'Locker + Bathroom', 'gym-companion' ),
                        'fet_4'           => __( 'Personal trainer', 'gym-companion' ),
                        'btn_label'       => __( 'Join Now', 'gym-companion' ),
                        'btn_url'         => [
                            'url'         => '#'
                        ],
                    ],
                    [
                        'pack_name'       => __( 'Expert', 'gym-companion' ),
                        'pack_price'      => __( '$55/m', 'gym-companion' ),
                        'fet_1'           => __( '24h unlimited access', 'gym-companion' ),
                        'fet_2'           => __( 'Trainer Advice', 'gym-companion' ),
                        'fet_3'           => __( 'Locker + Bathroom', 'gym-companion' ),
                        'fet_4'           => __( 'Personal trainer', 'gym-companion' ),
                        'btn_label'       => __( 'Join Now', 'gym-companion' ),
                        'btn_url'         => [
                            'url'         => '#'
                        ],
                    ],
                    [
                        'pack_name'       => __( 'Pro', 'gym-companion' ),
                        'pack_price'      => __( '$65/m', 'gym-companion' ),
                        'fet_1'           => __( '24h unlimited access', 'gym-companion' ),
                        'fet_2'           => __( 'Trainer Advice', 'gym-companion' ),
                        'fet_3'           => __( 'Locker + Bathroom', 'gym-companion' ),
                        'fet_4'           => __( 'Personal trainer', 'gym-companion' ),
                        'btn_label'       => __( 'Join Now', 'gym-companion' ),
                        'btn_url'         => [
                            'url'         => '#'
                        ],
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Pricing content

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_pricing_section', [
                'label' => __( 'Style Pricing Section', 'gym-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .priscing_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .priscing_area .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        
        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'gym-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label' => __( 'Plan Name Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .priscing_area .single_prising .prising_header h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_price_color', [
                'label' => __( 'Price Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .priscing_area .single_prising .prising_header span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .priscing_area .single_prising:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'gym-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_bg_col', [
                'label' => __( 'Button BG Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .priscing_area .single_prising .boxed-btn3' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hov_col', [
                'label' => __( 'Button Hover Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .priscing_area .single_prising .boxed-btn3:hover' => 'background: transparent; color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings = $this->get_settings();
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $pricing  = !empty( $settings['pricing'] ) ? $settings['pricing'] : '';
    ?>

    <!-- prising_area  -->
    <div class="priscing_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-73">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                            if ( $sub_title ) { 
                                echo '<p>'.wp_kses_post( nl2br( $sub_title ) ).'</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $pricing ) && count( $pricing ) > 0 ){
                    foreach ( $pricing as $item ) {
                        $pack_name = !empty( $item['pack_name'] ) ? $item['pack_name'] : '';
                        $pack_price = !empty( $item['pack_price'] ) ? $item['pack_price'] : '';
                        $fet_1 = !empty( $item['fet_1'] ) ? $item['fet_1'] : '';
                        $fet_2 = !empty( $item['fet_2'] ) ? $item['fet_2'] : '';
                        $fet_3 = !empty( $item['fet_3'] ) ? $item['fet_3'] : '';
                        $fet_4 = !empty( $item['fet_4'] ) ? $item['fet_4'] : '';
                        $btn_label = !empty( $item['btn_label'] ) ? $item['btn_label'] : '';
                        $btn_url = !empty( $item['btn_url']['url'] ) ? $item['btn_url']['url'] : '';
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single_prising text-center">
                                <div class="prising_header">
                                    <?php 
                                        if ( $pack_name ) { 
                                            echo '<h3>'.esc_html( $pack_name ).'</h3>';
                                        }
                                        if ( $pack_price ) { 
                                            echo '<span>'.esc_html( $pack_price ).'</span>';
                                        }
                                    ?>
                                </div>
                                <div class="pricing_body">
                                    <ul>
                                        <?php 
                                            if ( $fet_1 ) { 
                                                echo '<li>'.esc_html( $fet_1 ).'</li>';
                                            }
                                            if ( $fet_2 ) { 
                                                echo '<li>'.esc_html( $fet_2 ).'</li>';
                                            }
                                            if ( $fet_3 ) { 
                                                echo '<li class="off-color">'.esc_html( $fet_3 ).'</li>';
                                            }
                                            if ( $fet_4 ) { 
                                                echo '<li class="off-color">'.esc_html( $fet_4 ).'</li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <?php 
                                    if ( $btn_label ) { 
                                        echo '
                                        <div class="pricing_btn">    
                                            <a href="'.esc_url( $btn_url ).'" class="boxed-btn3">'.esc_html( $btn_label ).'</a>
                                        </div>    
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- prising_area_end  -->
    <?php

    }	
}
