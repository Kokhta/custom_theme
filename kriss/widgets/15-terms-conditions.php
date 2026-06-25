<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_15_Terms_Conditions extends \Elementor\Widget_Base {
	public function get_name() { return '15-terms-conditions'; }
	public function get_title() { return '15-Terms & Conditions'; }
	protected function register_controls() {
		$this->start_controls_section('content', ['label' => 'Content']);
		$this->add_control('intro', ['label' => 'Introduction', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Welcome to Kriss.ai. These Terms...']);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$data = [
			'globalType' => 'terms-and-conditions',
			'introduction' => [['children' => [['text' => $settings['intro']]]]],
			'layout' => []
		];
		Kriss_Data_Collector::get_instance()->set_data('terms-and-conditions', $data);
	}
}
