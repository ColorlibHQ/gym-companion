<?php
namespace Gymelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Gym elementor gym category section widget.
 *
 * @since 1.0
 */
class Gym_Category_Section extends Widget_Base {

	public function get_name() {
		return 'gym-category-section';
	}

	public function get_title() {
		return __( 'Category Section', 'gym-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'gym-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Category Section content ------------------------------
        $this->start_controls_section(
            'category_section_content',
            [
                'label' => __( 'Category Settings', 'gym-companion' ),
            ]
        );

        // Girls content
        $this->add_control(
            'girl_sec_separator',
            [
                'label' => esc_html__( 'Girl Section', 'gym-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'girl_bg_img',
            [
                'label' => esc_html__( 'Girls BG Image', 'gym-companion' ),
                'description' => esc_html__( 'Best size is 960x600', 'gym-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'girl_title',
            [
                'label' => esc_html__( 'Category Title', 'gym-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'For Girl', 'gym-companion' ),
            ]
        );
        $this->add_control(
            'girl_text',
            [
                'label' => esc_html__( 'Category Text', 'gym-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'There are many variations of passages of lorem <br> Ipsum available, but the majority have suffered <br> alteration.'
            ]
        );
        $this->add_control(
            'girl_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'gym-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Join Now', 'gym-companion' ),
            ]
        );
        $this->add_control(
            'girl_btn_url',
            [
                'label' => esc_html__( 'Button URL', 'gym-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );
        
        // Boys content
        $this->add_control(
            'boy_sec_separator',
            [
                'label' => esc_html__( 'Boys Section', 'gym-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'boy_bg_img',
            [
                'label' => esc_html__( 'Boys BG Image', 'gym-companion' ),
                'description' => esc_html__( 'Best size is 960x600', 'gym-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'boy_title',
            [
                'label' => esc_html__( 'Category Title', 'gym-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'For Boys', 'gym-companion' ),
            ]
        );
        $this->add_control(
            'boy_text',
            [
                'label' => esc_html__( 'Category Text', 'gym-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'There are many variations of passages of lorem <br> Ipsum available, but the majority have suffered <br> alteration.'
            ]
        );
        $this->add_control(
            'boy_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'gym-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Join Now', 'gym-companion' ),
            ]
        );
        $this->add_control(
            'boy_btn_url',
            [
                'label' => esc_html__( 'Button URL', 'gym-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End left content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'category_sec_style', [
                'label' => __( 'Category Section Styles', 'gym-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Title Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .catagory_area .single_catagory h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Text Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .catagory_area .single_catagory p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .catagory_area .single_catagory .boxed-btn3' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hov_col', [
                'label' => __( 'Button Hover Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .catagory_area .single_catagory .boxed-btn3:hover' => 'background: transparent; color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'bg_overlay_col_separator',
            [
                'label'     => __( 'Overlay Styles', 'gym-companion' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bg_overlay_col',
                'label' => __( 'BG Overlay Color', 'gym-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .catagory_area .single_catagory.overlay2::before',
            ]
        );
        $this->end_controls_section();

    }

	protected function render() {
    $settings   = $this->get_settings();  
    // Girls content
    $girl_bg_img = !empty( $settings['girl_bg_img']['url'] ) ? $settings['girl_bg_img']['url'] : '';
    $girl_title  = !empty( $settings['girl_title'] ) ? $settings['girl_title'] : '';
    $girl_text  = !empty( $settings['girl_text'] ) ? $settings['girl_text'] : '';
    $girl_btn_title  = !empty( $settings['girl_btn_title'] ) ? $settings['girl_btn_title'] : '';
    $girl_btn_url  = !empty( $settings['girl_btn_url']['url'] ) ? $settings['girl_btn_url']['url'] : '';

    // Boys content
    $boy_bg_img = !empty( $settings['boy_bg_img']['url'] ) ? $settings['boy_bg_img']['url'] : '';
    $boy_title  = !empty( $settings['boy_title'] ) ? $settings['boy_title'] : '';
    $boy_text  = !empty( $settings['boy_text'] ) ? $settings['boy_text'] : '';
    $boy_btn_title  = !empty( $settings['boy_btn_title'] ) ? $settings['boy_btn_title'] : '';
    $boy_btn_url  = !empty( $settings['boy_btn_url']['url'] ) ? $settings['boy_btn_url']['url'] : '';
    ?>

    <!-- catagory_area  -->
    <div class="catagory_area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-6">
                    <div class="single_catagory text-center overlay2" <?php echo gym_inline_bg_img( esc_url( $girl_bg_img ) ); ?>>
                        <?php 
                            if ( $girl_title ) { 
                                echo '<h3>'.esc_html($girl_title).'</h3>';
                            }
                            if ( $girl_text ) { 
                                echo '<p>'.wp_kses_post( nl2br($girl_text) ).'</p>';
                            }
                            if ( $girl_btn_title ) { 
                                echo '<a href="'.esc_url( $girl_btn_url ).'" class="boxed-btn3">'.esc_html( $girl_btn_title ).'</a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_catagory text-center overlay2" <?php echo gym_inline_bg_img( esc_url( $boy_bg_img ) ); ?>>
                        <?php 
                            if ( $boy_title ) { 
                                echo '<h3>'.esc_html($boy_title).'</h3>';
                            }
                            if ( $boy_text ) { 
                                echo '<p>'.wp_kses_post( nl2br($boy_text) ).'</p>';
                            }
                            if ( $boy_btn_title ) { 
                                echo '<a href="'.esc_url( $boy_btn_url ).'" class="boxed-btn3">'.esc_html( $boy_btn_title ).'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ catagory_area  -->
    <?php
    }
}