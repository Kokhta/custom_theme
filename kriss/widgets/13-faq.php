<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_13_FAQ extends \Elementor\Widget_Base {
	public function get_name() { return '13-faq'; }
	public function get_title() { return '13-FAQ'; }
	public function get_icon() { return 'eicon-help'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section('content', ['label' => 'Content']);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('q', ['label' => 'Question', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('a', ['label' => 'Answer', 'type' => \Elementor\Controls_Manager::TEXTAREA]);
		$this->add_control('questions', [
			'label' => 'Questions',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				['q' => 'What is Kriss.ai...?', 'a' => 'Kriss.ai is an advanced AI chatbot...'],
			],
			'title_field' => '{{{ q }}}',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$qa = [];
		foreach($settings['questions'] as $item) {
			$qa[] = ['question' => $item['q'], 'answer' => [['children' => [['text' => $item['a']]]]]];
		}
		$data = [
			'globalType' => 'faq',
			'introduction' => [['children' => [['text' => 'Discover how our cutting-edge AI technology...']]]],
			'layout' => [['title' => 'Get Started', 'blockType' => 'faq-section', 'questions' => $qa]]
		];
		Kriss_Data_Collector::get_instance()->set_data('faq', $data);
	}
}
