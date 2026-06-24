<?php
class Noono_Widget_18_Preloader extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-preloader';
    }

    public function get_title() {
        return '18. Preloader';
    }

    public function get_icon() {
        return 'eicon-preloader';
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
            'logo',
            [
                'label' => 'Preloader Logo',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '/logos/preloadLogoadjusted.svg',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="preloader" style="clip-path: polygon(0% 0%, 100% 0px, 100% 0%, 0% 0%);">
            <div class="logo-wrapper">
                <img src="<?php echo esc_url($settings['logo']['url']); ?>" alt="logo" data-elementor-setting-key="logo">
            </div>
        </div>
        <?php
    }
}
