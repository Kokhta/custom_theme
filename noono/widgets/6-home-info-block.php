<?php
class Noono_Widget_6_Home_Info_Block extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-home-info-block';
    }

    public function get_title() {
        return '6. Home Info Block';
    }

    public function get_icon() {
        return 'eicon-info-circle';
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
            'title1',
            [
                'label' => 'Main Title 1',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "At Noomo, we create 3D storytelling websites and immersive digital experiences where craft and narrative become one.",
            ]
        );

        $this->add_control(
            'title2',
            [
                'label' => 'Main Title 2',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "From immersive 3D websites to cinematic brand videos, we let the story dictate the medium—whether that's real-time rendering, editorial design, or interactive experiences.",
            ]
        );

        $this->add_control(
            'right_desc',
            [
                'label' => 'Right Side Description',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "We partner with brands like Salesforce, AMD, Red Bull and Vogue Business who believe craft makes the difference.\n\nCompanies that value innovation, obsess over details, and understand great digital work requires time, trust, and true collaboration.",
            ]
        );

        $this->add_control(
            'services_list',
            [
                'label' => 'Services (HTML)',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "3D websites<br>\nStorytelling websites<br>\n3D storytelling videos<br>\nImmersive web experiences <br>\nWebGL development<br>\nBrand activation microsites<br>\nDigital event experiences<br>\nInteractive website design<br>\nAI-driven experiences<br>\nDigital branding<br>",
            ]
        );

        $this->add_control(
            'clients_list',
            [
                'label' => 'Clients (HTML)',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "Salesforce<br> \nAMD<br>\nCoinbase<br>\nRed Bull<br>\nIntel | ai.io<br>\nYolo Federal Credit Union<br>\nPercipio Health<br>\nDandy Vision<br>\nVibrant Wellness<br>",
            ]
        );

        $this->add_control(
            'love_list',
            [
                'label' => '♥‿♥ (HTML)',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "Vogue Business<br>\nSamsung<br>\nCadence Design Systems<br>\nSpace Needle<br>\nOneLine Health<br>\nMiddle Finance<br>\nThe Art of Living<br>\nLife House<br>\nBattalion<br>",
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="home-info-block">
            <div class="wrapper">
                <div class="top">
                    <div class="left">
                        <h1 class="font-machina-60 title-1" data-elementor-setting-key="title1"><?php echo wp_kses_post($settings['title1']); ?></h1>
                        <h2 class="font-machina-60" data-elementor-setting-key="title2"><?php echo wp_kses_post($settings['title2']); ?></h2>
                    </div>
                    <div class="right">
                        <p class="font-neue-roman-16" data-elementor-setting-key="right_desc"><?php echo nl2br(esc_html($settings['right_desc'])); ?></p>
                    </div>
                </div>
                <div class="bottom">
                    <div class="left">
                        <div class="bottom-item">
                            <p class="tag">Services</p>
                            <p class="font-neue-roman-16 line" data-elementor-setting-key="services_list"><?php echo wp_kses_post($settings['services_list']); ?></p>
                        </div>
                        <div class="bottom-item show-m">
                            <p class="tag">♥‿♥</p>
                            <p class="font-neue-roman-16 line" data-elementor-setting-key="love_list"><?php echo wp_kses_post($settings['love_list']); ?></p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="bottom-item">
                            <p class="tag">Clients</p>
                            <p class="font-neue-roman-16 line" data-elementor-setting-key="clients_list"><?php echo wp_kses_post($settings['clients_list']); ?></p>
                        </div>
                        <div class="bottom-item item-margin hide-m">
                            <p class="tag">♥‿♥</p>
                            <p class="font-neue-roman-16 line" data-elementor-setting-key="love_list"><?php echo wp_kses_post($settings['love_list']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
