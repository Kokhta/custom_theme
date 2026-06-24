<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_15_Terms_Conditions extends \Elementor\Widget_Base {
	public function get_name() { return '15-terms-conditions'; }
	public function get_title() { return esc_html__( '15-Terms & Conditions', 'kriss' ); }
	public function get_icon() { return 'eicon-document-file'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$this->add_control('introduction', ['label' => 'Introduction', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Welcome to Kriss.ai. These Terms and Conditions govern your use...']);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$data = [
			'globalType' => 'terms-and-conditions',
			'introduction' => [['children' => [['text' => $settings['introduction']]]]],
			'layout' => [
				['title' => 'Introduction', 'blockType' => 'content-section', 'text' => [['children' => [['text' => 'Welcome to Kriss.ai. These Terms and Conditions...']]]]]
			]
		];
		Kriss_Data_Collector::get_instance()->set_data('terms-and-conditions', $data);
		echo '<div style="display:none;">Terms & Conditions Loaded</div>';
	}
}
