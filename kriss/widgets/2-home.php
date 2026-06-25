<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_2_Home extends \Elementor\Widget_Base {
	public function get_name() { return '2-home'; }
	public function get_title() { return '2-Home'; }
	public function get_icon() { return 'eicon-home'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section('section_home', ['label' => 'Home']);
		$this->add_control('greeting', ['label' => 'Greeting', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => "Hi, I'm Kriss."]);
		$this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => "An AI chatbot for "]);
		$this->add_control('cta', ['label' => 'CTA', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => "Learn More"]);
		$this->add_control('scrollPrompt', ['label' => 'Scroll Prompt', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => "Scroll or click hotspots  to explore the experience"]);
		$this->end_controls_section();

		$this->start_controls_section('section_industries', ['label' => 'Industries']);
		$repeater_ind = new \Elementor\Repeater();
		$repeater_ind->add_control('industry', ['label' => 'Industry', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater_ind->add_control('id', ['label' => 'ID', 'type' => \Elementor\Controls_Manager::TEXT]);
		$this->add_control('industries', [
			'label' => 'Industries',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater_ind->get_controls(),
			'default' => [
				['industry' => 'pharmacists', 'id' => '669692435c9b250c9e0f59cf'],
				['industry' => 'healthcare professionals', 'id' => '669692985c9b250c9e0f59d0'],
				['industry' => 'dentists', 'id' => '6696929c5c9b250c9e0f59d1'],
				['industry' => 'health insurance agents', 'id' => '669692ca5c9b250c9e0f59d2'],
				['industry' => 'doctors', 'id' => '669692d65c9b250c9e0f59d3'],
			],
			'title_field' => '{{{ industry }}}',
		]);
		$this->end_controls_section();

		$this->start_controls_section('section_common_copy', ['label' => 'Common Copy']);
		$repeater_cc = new \Elementor\Repeater();
		$repeater_cc->add_control('key', ['label' => 'Key', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater_cc->add_control('value', ['label' => 'Value', 'type' => \Elementor\Controls_Manager::TEXT]);
		$this->add_control('commonCopy', [
			'label' => 'Common Copy',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater_cc->get_controls(),
			'default' => [
				['key' => 'HOME', 'value' => 'Home'],
				['key' => 'SETUP', 'value' => 'Setup'],
				['key' => 'PLANS', 'value' => 'Plans'],
				['key' => 'ABOUT', 'value' => 'About'],
				['key' => 'FAQ', 'value' => 'FAQ'],
				['key' => 'FRONT_DESK', 'value' => 'Front Desk'],
				['key' => 'CONSULTATION_ROOM', 'value' => 'Consultation Room'],
				['key' => 'SURGERY_ROOM', 'value' => 'Surgery Room'],
				['key' => 'DOCTORS_OFFICE', 'value' => 'Doctors Office'],
				['key' => 'SERVER_ROOM', 'value' => 'Server Room'],
				['key' => 'ADMINISTRATION_ROOM', 'value' => 'Administration Room'],
				['key' => 'AFTERCARE', 'value' => 'Post-Operative Care'],
				['key' => 'PRIVACY_POLICIES', 'value' => 'Privacy Policies'],
				['key' => 'TERMS_CONDITIONS', 'value' => 'Terms & Conditions'],
				['key' => 'BOOK_DEMO', 'value' => 'Book Demo'],
				['key' => 'SPEECH_BUBBLE', 'value' => 'I will live down here on your website. Click to try me!'],
				['key' => 'ASSISTS_WITH', 'value' => 'Kriss.ai assists with:'],
				['key' => 'EXPLORE_FEATURES', 'value' => 'Explore Features'],
				['key' => 'PRODUCT_FEATURE', 'value' => 'Product Feature'],
				['key' => 'ATTACHED_DOCUMENT', 'value' => 'Attached Document'],
				['key' => 'MORE_FEATURES', 'value' => 'More Features'],
				['key' => 'CONTINUE_JOURNEY', 'value' => 'Continue Journey'],
				['key' => 'KRISSAI', 'value' => 'Kriss.ai'],
				['key' => 'NAVIGATION', 'value' => 'Navigation'],
				['key' => 'EXPERIENCE', 'value' => 'Experience'],
				['key' => 'CONTACT', 'value' => 'Contact'],
				['key' => 'OTHER_PAGES', 'value' => 'Other Pages'],
				['key' => 'COPYRIGHT', 'value' => 'Copyright © 2024 KRISS.AI.com All Rights Reserved.'],
				['key' => 'TRY_TODAY', 'value' => 'Try Kriss.ai today'],
				['key' => 'BOOK_A_DEMO', 'value' => 'Book a demo'],
				['key' => 'DEMO_DESC', 'value' => 'Free 1hr walkthrough'],
				['key' => 'BOOK_SESSION', 'value' => 'Book Session'],
				['key' => 'BUY_NOW', 'value' => 'Buy Now'],
				['key' => 'BUY_DESC', 'value' => 'To use Kriss.ai today'],
				['key' => 'SIGN_UP', 'value' => 'Sign Up'],
				['key' => 'APPLY_NOW', 'value' => 'Apply Now'],
			],
			'title_field' => '{{{ key }}}: {{{ value }}}',
		]);
		$this->end_controls_section();

		$this->start_controls_section('section_intro', ['label' => 'Introduction']);
		$repeater_intro = new \Elementor\Repeater();
		$repeater_intro->add_control('text', ['label' => 'Text', 'type' => \Elementor\Controls_Manager::TEXTAREA]);
		$this->add_control('introduction', [
			'label' => 'Introduction Lines',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater_intro->get_controls(),
			'default' => [
				['text' => 'I’m integrated into your website to help with intelligent, AI-driven insights to deliver personalized care and transform the patient experience.'],
				['text' => ''],
				['text' => 'Let me show you how I work.'],
			],
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$intro = [];
		foreach($settings['introduction'] as $line) {
			$intro[] = ['children' => [['text' => $line['text']]]];
		}
		$data = [
			'greeting' => $settings['greeting'],
			'description' => $settings['description'],
			'industries' => $settings['industries'],
			'commonCopy' => $settings['commonCopy'],
			'cta' => $settings['cta'],
			'introduction' => $intro,
			'scrollPrompt' => $settings['scrollPrompt'],
			'metaTitle' => 'Kriss.ai',
			'metaDescription' => 'An AI chatbot for healthcare professionals.',
            'metaURL' => 'https://kriss.ai',
            'metaShareImage' => [ 'url' => '/media/share-image-1.jpg' ],
            'globalType' => 'home'
		];
		Kriss_Data_Collector::get_instance()->set_data('home', $data);
		?>
        <div class="kriss-home-container" style="display:none;">
            <h1><?php echo esc_html($settings['greeting']); ?></h1>
            <p><?php echo esc_html($settings['description']); ?></p>
        </div>
        <?php
	}
}
