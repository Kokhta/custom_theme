<?php
class Noono_Widget_19_Transition extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-transition';
    }

    public function get_title() {
        return '19. Page Transition';
    }

    public function get_icon() {
        return 'eicon-exchange';
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
            'text',
            [
                'label' => 'Transition Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'home',
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => 'Transition Icon',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '/icons/home1.svg',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div id="transition">
            <div class="logo-image">
                <div class="parent">
                    <img alt="icon" class="transition-image home" src="<?php echo esc_url($settings['icon']['url']); ?>" data-elementor-setting-key="icon">
                </div>
            </div>
            <div class="transition-text" data-elementor-setting-key="text"><?php echo esc_html($settings['text']); ?></div>
        </div>
        <?php
    }
}
