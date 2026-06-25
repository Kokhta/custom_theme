<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_14_Privacy_Policy extends \Elementor\Widget_Base {
	public function get_name() { return '14-privacy-policy'; }
	public function get_title() { return '14-Privacy Policy'; }
	protected function register_controls() {
		$this->start_controls_section('content', ['label' => 'Content']);
		$this->add_control('intro', ['label' => 'Introduction', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Your privacy is of paramount importance...']);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$data = [
			'globalType' => 'privacy-policy',
			'introduction' => [['children' => [['text' => $settings['intro']]]]],
			'layout' => []
		];
		Kriss_Data_Collector::get_instance()->set_data('privacy-policy', $data);
	}
}
