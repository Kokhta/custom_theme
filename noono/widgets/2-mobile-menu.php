<?php
class Noono_Widget_2_Mobile_Menu extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-mobile-menu';
    }

    public function get_title() {
        return '2. Mobile Menu';
    }

    public function get_icon() {
        return 'eicon-menu-bar';
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
            'menu_links',
            [
                'label' => 'Menu Links',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'text',
                        'label' => 'Text',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Link',
                    ],
                    [
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => \Elementor\Controls_Manager::URL,
                        'default' => [
                            'url' => '#',
                        ],
                    ],
                ],
                'default' => [
                    [ 'text' => 'Work', 'link' => [ 'url' => '/work' ] ],
                    [ 'text' => 'Our Story', 'link' => [ 'url' => '/our-story' ] ],
                    [ 'text' => 'LABS', 'link' => [ 'url' => 'https://labs.noomoagency.com/' ] ],
                    [ 'text' => 'Insights', 'link' => [ 'url' => '/insights' ] ],
                    [ 'text' => 'Connect', 'link' => [ 'url' => '/connect' ] ],
                ],
            ]
        );

        $this->add_control(
            'footer_text',
            [
                'label' => 'Footer Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => "Let's work together",
            ]
        );

        $this->add_control(
            'footer_link',
            [
                'label' => 'Footer Link',
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '/connect',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="mobile-menu">
            <div class="mobile-links">
                <?php foreach ( $settings['menu_links'] as $item ) :
                    $target = $item['link']['is_external'] ? ' target="_blank"' : '';
                ?>
                    <a href="<?php echo esc_url($item['link']['url']); ?>" class="font-12-dark" <?php echo $target; ?>>
                        <span><?php echo esc_html($item['text']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="lets">
                <a href="<?php echo esc_url($settings['footer_link']['url']); ?>" class="">
                    <span data-elementor-setting-key="footer_text"><?php echo esc_html($settings['footer_text']); ?></span>
                </a>
            </div>
        </div>
        <?php
    }
}
