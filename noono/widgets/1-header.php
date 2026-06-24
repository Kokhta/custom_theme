<?php
class Noono_Widget_1_Header extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-header';
    }

    public function get_title() {
        return '1. Header';
    }

    public function get_icon() {
        return 'eicon-header';
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
            'logo1',
            [
                'label' => 'Logo 1',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '/logos/noomoLogo1.png',
                ],
            ]
        );

        $this->add_control(
            'logo2',
            [
                'label' => 'Logo 2',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '/logos/noomoLogo2.png',
                ],
            ]
        );

        $this->add_control(
            'menu_items',
            [
                'label' => 'Menu Items',
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
                    [ 'text' => 'Labs', 'link' => [ 'url' => 'https://labs.noomoagency.com/' ] ],
                    [ 'text' => 'Insights', 'link' => [ 'url' => '/insights' ] ],
                    [ 'text' => 'Connect', 'link' => [ 'url' => '/connect' ] ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <header class="">
            <div class="back"></div>
            <div class="wrapper">
                <div class="left">
                    <span>
                        <a aria-current="page" href="/" class="router-link-active router-link-exact-active for-logo">
                            <img alt="netrix logo" class="logo" src="<?php echo esc_url($settings['logo1']['url']); ?>" data-elementor-setting-key="logo1">
                            <img alt="netrix logo" class="logo" src="<?php echo esc_url($settings['logo2']['url']); ?>" data-elementor-setting-key="logo2">
                        </a>
                    </span>
                </div>
                <div class="right">
                    <?php foreach ( $settings['menu_items'] as $item ) :
                        $target = $item['link']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                    ?>
                        <a href="<?php echo esc_url($item['link']['url']); ?>" class="font-12-dark" <?php echo $target . $nofollow; ?>>
                            <?php echo esc_html($item['text']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="burger">
                    <div class="font-14-dark">Menu</div>
                </div>
            </div>
        </header>
        <?php
    }
}
