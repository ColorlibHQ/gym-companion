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
 * Gym elementor features section widget.
 *
 * @since 1.0
 */
class Gym_Features extends Widget_Base {

	public function get_name() {
		return 'gym-features';
	}

	public function get_title() {
		return __( 'Features', 'gym-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'gym-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  features content ------------------------------
		$this->start_controls_section(
			'features_content',
			[
				'label' => __( 'Features content', 'gym-companion' ),
			]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'gym-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Our Features', 'gym-companion' ),
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
            'features', [
                'label' => __( 'Create New', 'gym-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Select Icon', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::ICON,
                        'default' => 'weightfitting-icon',
                        'options' => gym_themify_icon(),
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Weightlifting', 'gym-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Text', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( 'There are many variations of passages of lorem Ipsum available.', 'gym-companion' ),
                    ],
                ],
                'default'   => [
                    [ 
                        'item_icon'    => 'weightfitting-icon',
                        'item_title'    => __( 'Weightlifting', 'gym-companion' ),
                        'item_text'   => __( 'There are many variations of passages of lorem Ipsum available.', 'gym-companion' ),
                    ],
                    [ 
                        'item_icon'    => 'special-muscle-icon',
                        'item_title'    => __( 'Specific Muscles', 'gym-companion' ),
                        'item_text'   => __( 'There are many variations of passages of lorem Ipsum available.', 'gym-companion' ),
                    ],
                    [ 
                        'item_icon'    => 'flex-muscle-icon',
                        'item_title'    => __( 'Flex Your Muscles', 'gym-companion' ),
                        'item_text'   => __( 'There are many variations of passages of lorem Ipsum available.', 'gym-companion' ),
                    ],
                    [ 
                        'item_icon'    => 'cardio-exercise-icon',
                        'item_title'    => __( 'Cardio Exercises', 'gym-companion' ),
                        'item_text'   => __( 'There are many variations of passages of lorem Ipsum available.', 'gym-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End features content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_features_section', [
                'label' => __( 'Style Features Section', 'gym-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Section Title Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .section_title p' => 'color: {{VALUE}};',
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
                'label' => __( 'Title Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .single_feature h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_color', [
                'label' => __( 'Text Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .single_feature p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'section_bg_style_seperator',
            [
                'label' => esc_html__( 'BG Styles', 'gym-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sec_bg_color', [
                'label' => __( 'Bg Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $features  = !empty( $settings['features'] ) ? $settings['features'] : '';
    ?>

    <!-- features_area_start  -->
    <div class="features_area">
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
                if( is_array( $features ) && count( $features ) > 0 ) {
                    foreach( $features as $item ) {
                        $item_icon = !empty( $item['item_icon'] ) ? $item['item_icon'] : '';
                        $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                        $item_text = ( !empty( $item['item_text'] ) ) ? $item['item_text'] : '';
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="single_feature text-center mb-73">
                                <?php 
                                    if ( $item_icon ) { 
                                        echo '
                                        <div class="icon">
                                            <img src="'.esc_url( GYM_DIR_ICON_IMG_URI .$item_icon .'.svg' ).'" alt="'.esc_attr( $item_title ).'">
                                        </div>  
                                        ';
                                    }
                                    if ( $item_title ) { 
                                        echo '<h4>'.esc_html( $item_title ).'</h4>';
                                    }
                                    if ( $item_text ) { 
                                        echo '<p>'.wp_kses_post( $item_text ).'</p>';
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
    <!-- features_area_end  -->
    <?php
    }
}