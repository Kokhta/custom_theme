<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_14_Privacy_Policy extends \Elementor\Widget_Base {
	public function get_name() { return '14-privacy-policy'; }
	public function get_title() { return esc_html__( '14-Privacy Policy', 'kriss' ); }
	public function get_icon() { return 'eicon-lock-user'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$this->add_control('introduction', ['label' => 'Introduction', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Your privacy is of paramount importance...']);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$data = [
			'globalType' => 'privacy-policy',
			'introduction' => [['children' => [['text' => $settings['introduction']]]]],
			'layout' => [
				['title' => 'Information We Collect', 'blockType' => 'content-section', 'text' => [['children' => [['text' => 'We collect several types of information...']]]]]
			]
		];
		Kriss_Data_Collector::get_instance()->set_data('privacy-policy', $data);
		echo '<div style="display:none;">Privacy Policy Loaded</div>';
	}
}
