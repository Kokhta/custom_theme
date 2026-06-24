<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_13_FAQ extends \Elementor\Widget_Base {
	public function get_name() { return '13-faq'; }
	public function get_title() { return esc_html__( '13-FAQ', 'kriss' ); }
	public function get_icon() { return 'eicon-help'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('question', ['label' => 'Question', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('answer', ['label' => 'Answer', 'type' => \Elementor\Controls_Manager::TEXTAREA]);
		$this->add_control('questions', [
			'label' => 'Questions',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				['question' => 'What is Kriss.ai and how can it benefit my dental practice?', 'answer' => 'Kriss.ai is an advanced AI chatbot designed specifically for dental practices...'],
			],
			'title_field' => '{{{ question }}}',
		]);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$qa_data = [];
		foreach($settings['questions'] as $item) {
			$qa_data[] = ['question' => $item['question'], 'answer' => [['children' => [['text' => $item['answer']]]]]];
		}
		$data = [
			'globalType' => 'faq',
			'layout' => [
				['title' => 'Get Started', 'blockType' => 'faq-section', 'questions' => $qa_data]
			]
		];
		Kriss_Data_Collector::get_instance()->set_data('faq', $data);
		echo '<div style="display:none;">FAQ Data Loaded</div>';
	}
}
