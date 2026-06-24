<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_12_About extends \Elementor\Widget_Base {
	public function get_name() { return '12-about'; }
	public function get_title() { return esc_html__( '12-About', 'kriss' ); }
	public function get_icon() { return 'eicon-info-circle'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$this->add_control('introduction', ['label' => 'Introduction', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Committed to shaping a healthier tomorrow.']);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$data = [
			'globalType' => 'about',
			'introduction' => [['children' => [['text' => $settings['introduction']]]]],
			'layout' => [
				[
					'title' => 'The Vision',
					'blockType' => 'content-section',
					'text' => [['children' => [['text' => 'Kriss.ai envisions a future where healthcare is more accessible, precise, and proactive.']]]]
				],
				[
					'title' => 'Ethics & Privacy',
					'blockType' => 'content-section',
					'text' => [['children' => [['text' => 'At Kriss.ai, we prioritize the ethical use of AI and the privacy of patient data.']]]]
				]
			]
		];
		Kriss_Data_Collector::get_instance()->set_data('about', $data);
		echo '<div style="display:none;">About Data Loaded</div>';
	}
}
