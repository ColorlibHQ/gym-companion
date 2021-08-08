<?php
namespace Gymelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Gym elementor offer section widget.
 *
 * @since 1.0
 */
class Gym_Offer_Section extends Widget_Base {

	public function get_name() {
		return 'gym-offer';
	}

	public function get_title() {
		return __( 'Offer Section', 'gym-companion' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'gym-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  offer content ------------------------------
        $this->start_controls_section(
            'offer_content',
            [
                'label' => __( 'Offer Settings', 'gym-companion' ),
            ]
        );
        $this->add_control(
            'style_type',
            [
                'label' => esc_html__( 'Select Style', 'gym-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default'     => 'style_1',
                'options'     => [
                    'style_1' => __( 'Style 1', 'gym-companion' ),
                    'style_2' => __( 'Style 2', 'gym-companion' ),
                ]
            ]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'gym-companion' ),
                'description' => esc_html__( 'Best size is 1920x800', 'gym-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'gym-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'A Big Offer for <br> This Summer',
            ]
        );
        $this->add_control(
            'promo_text',
            [
                'label' => esc_html__( 'Promotional Text', 'gym-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '50% Off', 'gym-companion' ),
                'condition' => [
                    'style_type' => 'style_1',
                ]
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Section Text', 'gym-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration.', 'gym-companion' ),
                'condition' => [
                    'style_type' => 'style_1',
                ]
            ]
        );
        $this->add_control(
            'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'gym-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Join Now', 'gym-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'gym-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End offer content

        //------------------------------ Style title ------------------------------
        
        // Offer Section Styles
        $this->start_controls_section(
            'offer_sec_style', [
                'label' => __( 'Offer Section Styles', 'gym-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Title Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offer_area .offer_text h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .big_offer_area .offter_text h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offer_area .offer_text h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_text_col', [
                'label' => __( 'Text Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offer_area .offer_text p' => 'color: {{VALUE}};',
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
                'label' => __( 'Button Bg Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offer_area .offer_text .boxed-btn3' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .big_offer_area .offter_text .boxed-btn3' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_col', [
                'label' => __( 'Button Hover Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offer_area .offer_text .boxed-btn3:hover' => 'background: transparent; color: {{VALUE}} !important; border-color: {{VALUE}};',
                    '{{WRAPPER}} .big_offer_area .offter_text .boxed-btn3:hover' => 'background: transparent; color: {{VALUE}} !important; border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
    $settings   = $this->get_settings();  
    $style_type = $settings['style_type'];
    if ( $style_type == 'style_1' ) {
        $bg_img    = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
        $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $promo_text  = !empty( $settings['promo_text'] ) ? $settings['promo_text'] : '';
        $sec_text  = !empty( $settings['sec_text'] ) ? $settings['sec_text'] : '';
        $btn_title  = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
        $btn_url  = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
        ?>
        <!-- promo_area_start  -->
        <div class="offer_area" <?php echo gym_inline_bg_img( esc_url( $bg_img ) ); ?>>
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6">
                        <div class="offer_text">
                            <?php 
                                if ( $sec_title ) { 
                                    echo '<h4>'.wp_kses_post(nl2br($sec_title)).'</h4>';
                                }
                                if ( $promo_text ) { 
                                    echo '<h3>'.esc_html($promo_text).'</h3>';
                                }
                                if ( $sec_text ) { 
                                    echo '<p>'.wp_kses_post( $sec_text ).'</p>';
                                }
                                if ( $btn_title ) { 
                                    echo '<a href="'.esc_url( $btn_url ).'" class="boxed-btn3">'.esc_html( $btn_title ).'</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- promo_area_end  -->
        <?php
    } else { 
        $bg_img    = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
        $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $btn_title  = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
        $btn_url  = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
        ?>
        <!-- big_offer_area start  -->
        <div class="big_offer_area" <?php echo gym_inline_bg_img( esc_url( $bg_img ) ); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="offter_text text-center">
                            <?php 
                                if ( $sec_title ) { 
                                    echo '<h3>'.wp_kses_post(nl2br($sec_title)).'</h3>';
                                }
                                if ( $btn_title ) { 
                                    echo '<a href="'.esc_url( $btn_url ).'" class="boxed-btn3">'.esc_html( $btn_title ).'</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- big_offer_area end  -->
        <?php
    } // end style
    }
}