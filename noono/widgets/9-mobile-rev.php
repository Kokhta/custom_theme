<?php
class Noono_Widget_9_Mobile_Rev extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-mobile-rev';
    }

    public function get_title() {
        return '9. Mobile Reviews (Swiper)';
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => 'Content',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => 'Title',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => " Great work can’t happen without team a. ",
            ]
        );

        $this->add_control(
            'description1',
            [
                'label' => 'Description 1',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => " When working with us, you get the value of working with founders. Building strong relationships with our clients is at the heart of our approach. ",
            ]
        );

        $this->add_control(
            'description2',
            [
                'label' => 'Description 2',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => " We take the time to understand your unique needs and create tailored design solutions to help you make an impact. ",
            ]
        );

        $this->add_control(
            'reviews',
            [
                'label' => 'Reviews',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'logo',
                        'label' => 'Company Logo',
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [ 'url' => '/mobileRev/mrev1.png' ],
                    ],
                    [
                        'name' => 'text',
                        'label' => 'Review Text',
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => '“Noomo does such incredible and thoughtful work...”',
                    ],
                    [
                        'name' => 'name',
                        'label' => 'Name',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Wallis Mills',
                    ],
                    [
                        'name' => 'position',
                        'label' => 'Position (HTML)',
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => 'Director of Marketing,<br>Network Technology Solutions Group',
                    ],
                ],
                'default' => [
                    [
                        'name' => 'Wallis Mills',
                        'text' => '“Noomo does such incredible and thoughtful work. I have been at this almost 25 years and have never been more impressed with an agency.”',
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="mobile-rev">
            <div class="wrapper">
                <h2 class="font-machina-60" data-elementor-setting-key="title"><?php echo esc_html($settings['title']); ?></h2>
                <p class="desc font-neue-roman-16" data-elementor-setting-key="description1"><?php echo esc_html($settings['description1']); ?></p>
                <p class="font-neue-roman-16" data-elementor-setting-key="description2"><?php echo esc_html($settings['description2']); ?></p>
            </div>
            <div class="swiper swiper-initialized swiper-horizontal swiper-free-mode swiper-backface-hidden">
                <div class="swiper-wrapper">
                    <?php foreach ( $settings['reviews'] as $item ) : ?>
                    <div class="swiper-slide slide" style="margin-right: 15px;">
                        <div>
                            <div class="company"><img alt="logo" src="<?php echo esc_url($item['logo']['url']); ?>"></div>
                            <p class="desc font-neue-roman-16"><?php echo esc_html($item['text']); ?></p>
                        </div>
                        <div>
                            <p class="name font-12-dark"><?php echo esc_html($item['name']); ?></p>
                            <p class="position font-14-dark"><?php echo wp_kses_post($item['position']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
}
