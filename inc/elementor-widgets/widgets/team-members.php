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
 * Gym Team Members Contents section widget.
 *
 * @since 1.0
 */
class Gym_Team_Members extends Widget_Base {

	public function get_name() {
		return 'gym-team-members-contents';
	}

	public function get_title() {
		return __( 'Trainers', 'gym-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'gym-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Team Members contents  ------------------------------
		$this->start_controls_section(
			'team_members_content',
			[
				'label' => __( 'Trainers Contents', 'gym-companion' ),
			]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'gym-companion' ),
                'description' => esc_html__( 'Best size is 1920x1080', 'gym-companion' ),
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
                'label'         => __( 'Section Title', 'gym-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Our Trainers', 'gym-companion' )
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => __( 'Sub Title', 'gym-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => 'There are many variations of passages of lorem Ipsum available, but the majority <br> have suffered alteration.'
            ]
        );
		$this->add_control(
            'members', [
                'label' => __( 'Create New', 'gym-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ member_name }}}',
                'fields' => [
                    [
                        'name' => 'member_img',
                        'label' => __( 'Member Image', 'gym-companion' ),
                        'description' => __( 'Member Image size should be 362x422', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ]
                    ],
                    [
                        'name' => 'member_name',
                        'label' => __( 'Member Name', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Jessica Mino', 'gym-companion' ),
                    ],
                    [
                        'name' => 'designation',
                        'label' => __( 'Member Designation', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Woman Trainer', 'gym-companion' ),
                    ],
                    [
                        'name' => 'fb_url',
                        'label' => __( 'Facebook URL', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default'   => [
                            'url'   => '#',
                        ],
                    ],
                    [
                        'name' => 'tw_url',
                        'label' => __( 'Twitter URL', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default'   => [
                            'url'   => '#',
                        ],
                    ],
                    [
                        'name' => 'ins_url',
                        'label' => __( 'Instagram URL', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default'   => [
                            'url'   => '#',
                        ],
                    ],
                ],
                'default'   => [
                    [
                        'member_img'         => [
                            'url'            => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'        => __( 'Jessica Mino', 'gym-companion' ),
                        'designation' => __( 'Woman Trainer', 'gym-companion' ),
                        'fb_url'             => [
                            'url'            => '#',
                        ],
                        'tw_url'             => [
                            'url'            => '#',
                        ],
                        'ins_url'            => [
                            'url'            => '#',
                        ],
                    ],
                    [
                        'member_img'         => [
                            'url'            => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'        => __( 'Amit Khan', 'gym-companion' ),
                        'designation' => __( 'Men Trainer', 'gym-companion' ),
                        'fb_url'             => [
                            'url'            => '#',
                        ],
                        'tw_url'             => [
                            'url'            => '#',
                        ],
                        'ins_url'            => [
                            'url'            => '#',
                        ],
                    ],
                    [
                        'member_img'         => [
                            'url'            => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'        => __( 'Paulo Rolac', 'gym-companion' ),
                        'designation' => __( 'Men Trainer', 'gym-companion' ),
                        'fb_url'             => [
                            'url'            => '#',
                        ],
                        'tw_url'             => [
                            'url'            => '#',
                        ],
                        'ins_url'            => [
                            'url'            => '#',
                        ],
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_team_member', [
                'label' => __( 'Style Member Section', 'gym-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_color', [
                'label' => __( 'Text Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings = $this->get_settings();
    $bg_img  = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $members  = !empty( $settings['members'] ) ? $settings['members'] : '';
    ?>

    <!-- team_area_start  -->
    <div class="team_area overlay2" <?php echo gym_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-73">
                        <?php
                            if ( $sec_title ) {
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                            if ( $sub_title ) {
                                echo '<p>'.wp_kses_post( nl2br($sub_title) ).'</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $members ) && count( $members ) > 0 ){
                    foreach ( $members as $item ) {
                        $member_name = !empty( $item['member_name'] ) ? $item['member_name'] : '';
                        $member_img = !empty( $item['member_img']['id'] ) ? wp_get_attachment_image( $item['member_img']['id'], 'gym_team_member_thumb_362x422', '', array('alt' => gym_image_alt( $item['member_img']['url'] ) ) ) : '';
                        $designation = !empty( $item['designation'] ) ? $item['designation'] : '';
                        $fb_url = !empty( $item['fb_url']['url'] ) ? $item['fb_url']['url'] : '';
                        $tw_url = !empty( $item['tw_url']['url'] ) ? $item['tw_url']['url'] : '';
                        $ins_url = !empty( $item['ins_url']['url'] ) ? $item['ins_url']['url'] : '';
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single_team">
                                <div class="team_thumb">
                                    <?php
                                        if ( $member_img ) {
                                            echo $member_img;
                                        }
                                    ?>
                                    <div class="team_hover">
                                        <div class="hover_inner text-center">
                                            <ul>
                                                <?php
                                                    if ( $fb_url ) {
                                                        echo '
                                                        <li>
                                                            <a href="'.esc_url( $fb_url ).'">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                        </li>';
                                                    }
                                                    if ( $tw_url ) {
                                                        echo '
                                                        <li>
                                                            <a href="'.esc_url( $tw_url ).'">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>';
                                                    }
                                                    if ( $ins_url ) {
                                                        echo '
                                                        <li>
                                                            <a href="'.esc_url( $ins_url ).'">
                                                                <i class="fa fa-instagram"></i>
                                                            </a>
                                                        </li>';
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="team_title text-center">
                                    <?php
                                        if ( $member_name ) {
                                            echo '<h3>'.esc_html( $member_name ).'</h3>';
                                        }
                                        if ( $designation ) {
                                            echo '<p>'.esc_html( $designation ).'</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- team_area_end  -->
    <?php

    }
}
