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
 * Gym elementor gallery section widget.
 *
 * @since 1.0
 */
class Gym_Gallery extends Widget_Base {

	public function get_name() {
		return 'gym-gallery';
	}

	public function get_title() {
		return __( 'Gallery', 'gym-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'gym-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Gallery content ------------------------------
		$this->start_controls_section(
			'gallery_content',
			[
				'label' => __( 'Gallery content', 'gym-companion' ),
			]
        );
		$this->add_control(
            'galleries', [
                'label' => __( 'Create New', 'gym-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ img_size }}}',
                'fields' => [
                    [
                        'name' => 'item_img',
                        'label' => __( 'Item Image', 'gym-companion' ),
                        'description' => __( 'The Image size should be 680x482 or 560x482', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'img_size',
                        'label' => __( 'Select Image Size', 'gym-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'default' => 'gym_gallery_thumb_560x482',
                        'options' => [
                            'gym_gallery_thumb_680x482' => '680x482',
                            'gym_gallery_thumb_560x482' => '560x482',
                        ]
                    ],
                ],
                'default'   => [
                    [      
                        'img_size'    => 'gym_gallery_thumb_680x482',
                        'item_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [      
                        'img_size'    => 'gym_gallery_thumb_680x482',
                        'item_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [      
                        'img_size'    => 'gym_gallery_thumb_560x482',
                        'item_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [      
                        'img_size'    => 'gym_gallery_thumb_560x482',
                        'item_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [      
                        'img_size'    => 'gym_gallery_thumb_680x482',
                        'item_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [      
                        'img_size'    => 'gym_gallery_thumb_680x482',
                        'item_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
		);

        $this->add_control(
            'btn_title',
            [
                'label' => esc_html__( 'View More Button Title', 'gym-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'View More', 'gym-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'View More Button URL', 'gym-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ],
            ]
        );
		$this->end_controls_section(); // End gallery content

    /**
     * Style Tab
     * ------------------------------ Style Section ------------------------------
     *
     */

        $this->start_controls_section(
            'style_gallery_section', [
                'label' => __( 'Style Gallery Section', 'gym-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'hover_overlay_col', [
                'label' => __( 'Hover overy Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .single_gallery .hover_pop:before' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .gallery_area .view_pore.boxed-btn3' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hov_col', [
                'label' => __( 'Button Hover Color', 'gym-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .view_pore.boxed-btn3:hover' => 'background: transparent; color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $galleries = !empty( $settings['galleries'] ) ? $settings['galleries'] : '';
    $btn_title  = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url  = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>
    
    <!-- gallery_start -->
    <div class="gallery_area">
        <?php 
        if( is_array( $galleries ) && count( $galleries ) > 0 ) {
            foreach( $galleries as $item ) {
                $img_url = !empty( $item['item_img']['url'] ) ? $item['item_img']['url'] : '';
                $img_size = ( !empty( $item['img_size'] ) ) ? $item['img_size'] : '';
                
                // Get the img size
                switch ($img_size) {
                    case 'gym_gallery_thumb_680x482':
                        $dynamic_class = 'big_img ';
                        break;
                    
                    default:
                        $dynamic_class = 'small_img ';
                        break;
                }

                $bg_img = !empty( $item['item_img']['id'] ) ? wp_get_attachment_image( $item['item_img']['id'], $img_size, '', array( 'alt' => gym_image_alt( $item['item_img']['url'] ) ) ) : '';
                ?>
                <div class="<?=esc_attr($dynamic_class)?>single_gallery">
                    <div class="hover_pop">
                        <a class="popup-image" href="<?=esc_url($img_url)?>">
                            <i class="ti-plus"></i>
                        </a>
                    </div>
                    <?php echo $bg_img; ?>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <?php
        if ( $btn_title ) { 
            echo '<a href="'.esc_url( $btn_url ).'" class="view_pore boxed-btn3">'.esc_html( $btn_title ).'</a>';
        }
    ?>
    <!-- gallery_end -->
    <?php
    }
}