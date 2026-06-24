<?php
class Noono_Widget_8_Scene_Awards extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-scene-awards';
    }

    public function get_title() {
        return '8. Scene Awards';
    }

    public function get_icon() {
        return 'eicon-star';
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
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "<span>Innovate –</span> with a human touch.",
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => 'Description',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Our design expertise and craftsmanship means we convert big, innovative ideas into powerful, accessible human experiences, which ignite emotions and provoke action.",
            ]
        );

        $this->add_control(
            'awards',
            [
                'label' => 'Mobile Awards List',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'name',
                        'label' => 'Name',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Webby',
                    ],
                ],
                'default' => [
                    [ 'name' => 'Webby' ],
                    [ 'name' => 'reddot' ],
                    [ 'name' => 'SF Design WEEk' ],
                    [ 'name' => 'awwwards' ],
                    [ 'name' => '+50 awards' ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="scene-awards">
            <div class="wrapper">
                <div class="left">
                    <p class="font-machina-120 title" data-elementor-setting-key="title"><?php echo wp_kses_post($settings['title']); ?></p>
                </div>
                <div class="right">
                    <p class="font-neue-roman-18 desc" data-elementor-setting-key="description"><?php echo esc_html($settings['description']); ?></p>
                </div>
                <div class="mobile-awards-list">
                    <?php foreach ( $settings['awards'] as $item ) : ?>
                    <div class="item">
                        <p class="font-machina-54"><?php echo esc_html($item['name']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
}
