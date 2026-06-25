<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_10_Setup extends \Elementor\Widget_Base {
	public function get_name() { return '10-setup'; }
	public function get_title() { return '10-Setup'; }
	public function get_icon() { return 'eicon-settings'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section('content', ['label' => 'Content']);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('s_title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('s_subtitle', ['label' => 'Subtitle', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('s_text', ['label' => 'Text', 'type' => \Elementor\Controls_Manager::TEXTAREA]);
		$this->add_control('layout', [
			'label' => 'Setup Steps',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				['s_title' => 'Questionnaire', 's_subtitle' => 'Our team will walk you through the form', 's_text' => 'Our team will send a detailed questionnaire...'],
				['s_title' => 'Chatbot Training', 's_subtitle' => 'We customize', 's_text' => 'Our expert team uses the information provided...'],
				['s_title' => 'Website integration', 's_subtitle' => 'We Implement Seamlessly', 's_text' => 'Our IT team then collaborates...'],
				['s_title' => 'Ongoing Maintenance', 's_subtitle' => 'We constantly refine', 's_text' => 'We offer technical support...'],
			],
			'title_field' => '{{{ s_title }}}',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$layout = [];
		foreach($settings['layout'] as $item) {
			$layout[] = [
				'title' => $item['s_title'],
				'subtitle' => $item['s_subtitle'],
				'text' => [['children' => [['text' => $item['s_text']]]]],
				'blockName' => $item['s_title'],
				'blockType' => 'setup-content-section'
			];
		}
		$data = [
			'globalType' => 'setup',
			'introduction' => [['children' => [['text' => "Here’s how to seamlessly integrate..."]]]],
			'layout' => $layout
		];
		Kriss_Data_Collector::get_instance()->set_data('setup', $data);
	}
}
