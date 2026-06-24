<?php
class Noono_Widget_13_Home_Footer extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-home-footer';
    }

    public function get_title() {
        return '13. Home Footer';
    }

    public function get_icon() {
        return 'eicon-footer';
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
            'footer_menu',
            [
                'label' => 'Footer Menu',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'text',
                        'label' => 'Text',
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => \Elementor\Controls_Manager::URL,
                    ],
                ],
                'default' => [
                    [ 'text' => 'Work', 'link' => [ 'url' => '/work' ] ],
                    [ 'text' => 'Our story', 'link' => [ 'url' => '/our-story' ] ],
                    [ 'text' => 'Insights', 'link' => [ 'url' => '/insights' ] ],
                    [ 'text' => 'Connect', 'link' => [ 'url' => '/connect' ] ],
                    [ 'text' => 'Privacy policy', 'link' => [ 'url' => '/privacy-policy' ] ],
                ],
            ]
        );

        $this->add_control(
            'email',
            [
                'label' => 'Email',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'hello@noomoagency.com',
            ]
        );

        $this->add_control(
            'coffee_text',
            [
                'label' => 'Coffee Text',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => ' We are based in Los Angeles but often come to San Francisco ☕ ',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="home-footer">
            <div class="wrapper">
                <div class="col-1">
                    <div>
                        <p class="font-neue-roman-14-500 small-title"> Menu. </p>
                        <?php foreach ( $settings['footer_menu'] as $item ) : ?>
                            <a href="<?php echo esc_url($item['link']['url']); ?>" class="font-neue-roman-16 link"> <?php echo esc_html($item['text']); ?> </a><br>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-2"><div></div></div>
                <div class="col-3">
                    <div>
                        <p class="font-neue-roman-14-500 small-title"> Social. </p>
                        <a target="_blank" href="https://www.linkedin.com/company/noomoagency" class="social-link font-neue-roman-16 link"> LinkedIn </a><br>
                        <a target="_blank" href="https://www.instagram.com/noomoagency/" class="social-link font-neue-roman-16 link"> Instagram </a><br>
                        <a target="_blank" href="https://dribbble.com/noomoagency" class="social-link font-neue-roman-16 link"> Dribbble </a><br>
                        <a target="_blank" href="https://x.com/noomoagency" class="social-link font-neue-roman-16 link"> X </a>
                    </div>
                    <div>
                        <p class="font-neue-roman-14-500 small-title email"> Email. </p>
                        <a class="font-neue-roman-16 link email-address" href="mailto:<?php echo esc_attr($settings['email']); ?>" data-elementor-setting-key="email"><?php echo esc_html($settings['email']); ?></a>
                    </div>
                </div>
                <div class="col-4">
                    <p class="font-neue-roman-16"> Let’s grab some coffee. </p>
                    <p class="font-neue-roman-16 desc" data-elementor-setting-key="coffee_text"><?php echo esc_html($settings['coffee_text']); ?></p>
                </div>
            </div>
            <div class="mobile-copy">
                <div class="left">
                    <a aria-current="page" href="/" class="router-link-active router-link-exact-active">
                        <img alt="netrix logo" class="logo-icon desctop-logo" src="/icons/footerlogo.png">
                        <img alt="netrix logo" class="logo-icon mobile-logo" src="/logos/mobileLogo.svg">
                    </a>
                </div>
                <a class="font-neue-roman-16 link mobile-email" href="mailto:<?php echo esc_attr($settings['email']); ?>"><?php echo esc_html($settings['email']); ?></a>
                <div class="animation-icons"><img alt="icons" src="/icons/oiG.svg"></div>
            </div>
        </div>
        <?php
    }
}
