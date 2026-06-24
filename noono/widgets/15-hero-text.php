<?php
class Noono_Widget_15_Hero_Text extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-hero-text';
    }

    public function get_title() {
        return '15. Hero Text (Fixed)';
    }

    public function get_icon() {
        return 'eicon-t-letter';
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
                'default' => ' Design that elevates your digital presence ',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => 'Description',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Award-winning design agency building websites, activations, and experiences that make people stop scrolling.',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="hero-text" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <h1 data-elementor-setting-key="title"><?php echo esc_html($settings['title']); ?></h1>
            <p><span data-elementor-setting-key="description"><?php echo esc_html($settings['description']); ?></span></p>
        </div>
        <?php
    }
}
