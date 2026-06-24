<?php
class Noono_Widget_4_Mobile_Hero extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-mobile-hero';
    }

    public function get_title() {
        return '4. Mobile Hero';
    }

    public function get_icon() {
        return 'eicon-heading';
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
            'subtitle',
            [
                'label' => 'Subtitle',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Award-winning design agency building websites, activations, and experiences that make people stop scrolling.',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div data-v-1d267d81="" class="mobile-hero">
            <div data-v-1d267d81="" class="wrapper">
                <h1 data-v-1d267d81="" data-elementor-setting-key="title"> <?php echo esc_html($settings['title']); ?> </h1>
                <h2 data-v-1d267d81="" data-elementor-setting-key="subtitle"><?php echo esc_html($settings['subtitle']); ?></h2>
            </div>
        </div>
        <?php
    }
}
