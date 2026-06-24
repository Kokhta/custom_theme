<?php
class Noono_Widget_14_Testimonials_Text extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-testimonials-text';
    }

    public function get_title() {
        return '14. Testimonials Floating Text';
    }

    public function get_icon() {
        return 'eicon-text-area';
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
                'label' => 'Text (HTML)',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'We work as one team with our clients. Through discovery workshops, we uncover your story and translate it into digital experiences that reflect your vision.<br><br>Our agency combines storytelling craft with technical expertise to create work that connects emotionally and drives engagement.',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="testimonails-text" style="translate: none; rotate: none; scale: none; transform: translate(0px, 24vh);">
            <div class="wrapper">
                <div class="texts">
                    <p class="font-neue-roman-18" data-elementor-setting-key="text"><?php echo wp_kses_post($settings['text']); ?></p>
                </div>
            </div>
        </div>
        <?php
    }
}
