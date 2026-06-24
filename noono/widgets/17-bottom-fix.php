<?php
class Noono_Widget_17_Bottom_Fix extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-bottom-fix';
    }

    public function get_title() {
        return '17. Bottom Fix (Scroll Down)';
    }

    public function get_icon() {
        return 'eicon-scroll';
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
            'scroll_text',
            [
                'label' => 'Scroll Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Scroll',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="bottom-fix">
            <div class="scroll-down" style="display: none; opacity: 0;">
                <p class="scroll-text" style="display: none; opacity: 0;" data-elementor-setting-key="scroll_text"><?php echo esc_html($settings['scroll_text']); ?></p>
                <img alt="scroll" class="icon" src="/icons/arrowpixel.svg">
            </div>
        </div>
        <?php
    }
}
