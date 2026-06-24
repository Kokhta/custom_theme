<?php
class Noono_Widget_12_Home_Contact_Form extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-home-contact-form';
    }

    public function get_title() {
        return '12. Home Contact Form';
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
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
                'default' => "BUT WE'RE HERE NOT TO TALK ABOUT OURSELVES - WE'RE HERE TO TALK ABOUT YOU, YOUR COMPANY, YOUR PRODUCT, AND YOUR GOALS.",
            ]
        );

        $this->add_control(
            'info_text',
            [
                'label' => 'Info Text (HTML)',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "With us it happens.<br> We would love to hear from you.",
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="home-contact-form">
            <div class="wrapper">
                <div class="top">
                    <h3 class="font-machina-60" data-elementor-setting-key="title"><?php echo esc_html($settings['title']); ?></h3>
                </div>
                <div class="bottom">
                    <div class="info-text">
                        <p class="font-14-dark" data-elementor-setting-key="info_text"><?php echo wp_kses_post($settings['info_text']); ?></p>
                    </div>
                    <form novalidate="" class="form-inputs">
                        <div class="input-wrapper done-trigger"><input id="form-name" type="text" placeholder="Your name" name="name"></div>
                        <div class="input-wrapper done-trigger"><input type="email" placeholder="Your email" name="email"></div>
                        <div class="input-wrapper done-trigger"><input type="text" placeholder="Your project is about" name="message"></div>
                        <p class="font-neue-roman-16 budget done-trigger"> Project budget (USD) </p>
                        <div class="input-wrapper-bottom done-trigger">
                            <div class="radio-block">
                                <input type="radio" id="radio1" value="50K–100K" name="radio"><label for="radio1">50K–100K</label>
                                <input type="radio" id="radio2" value="100K–300K" name="radio"><label for="radio2">100K–300K</label>
                                <input type="radio" id="radio3" value="300K+" name="radio"><label for="radio3">300K+</label>
                            </div>
                            <button class="its-mac submit" type="submit">
                                <span>Send</span><img alt="arrow" class="arrow" src="/icons/smallArrow.svg">
                                <i class="hover-mask"><span class="its-mac"> Send </span><img alt="arrow" class="arrow" src="/icons/smallArrowBlack.svg"></i>
                            </button>
                        </div>
                        <div class="form-send-suc">
                            <p class="font-machina-30"> Thank you </p>
                            <img loading="lazy" alt="done" src="/icons/formheart.svg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
}
