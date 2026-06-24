<?php
class Noono_Widget_7_Home_Real extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-home-real';
    }

    public function get_title() {
        return '7. Home Real (Video)';
    }

    public function get_icon() {
        return 'eicon-video-camera';
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
            'video_url',
            [
                'label' => 'Video URL',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'https://noomo-website.cdn.prismic.io/noomo-website/aHDVIEMqNJQqHyXy_Showreel2025.mp4',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="home-real">
            <video autoplay="" loop="" playsinline="" id="video" crossorigin="anonymous" class="_volume-boosted">
                <source src="<?php echo esc_url($settings['video_url']); ?>" type="video/mp4" data-elementor-setting-key="video_url">
            </video>
        </div>
        <?php
    }
}
