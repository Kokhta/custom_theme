<?php
class Noono_Widget_3_Main_Scene extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-main-scene';
    }

    public function get_title() {
        return '3. Main Scene (Canvas)';
    }

    public function get_icon() {
        return 'eicon-nerd-chapeau';
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
            'bg_image',
            [
                'label' => 'Mobile Background Image',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '/backgrounds/background_min.png',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div id="main-scene" style="opacity: 1;">
            <!-- Canvas is injected by script -->
            <canvas style="display: block; width: 414px; height: 846px; touch-action: none;" data-engine="three.js r156" width="496" height="1015"></canvas>
        </div>
        <img alt="background" src="<?php echo esc_url($settings['bg_image']['url']); ?>" loading="lazy" class="custom-l-back-image" data-elementor-setting-key="bg_image">
        <?php
    }
}
