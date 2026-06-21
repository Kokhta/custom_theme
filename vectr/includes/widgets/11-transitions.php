<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Vectr_Widget_11_transitions extends \Elementor\Widget_Base {

	public function get_name() {
		return '11-transitions';
	}

	public function get_title() {
		return esc_html__( '11-transitions', 'vectr' );
	}

	public function get_icon() {
		return 'eicon-animation';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'vectr' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'transitions_html',
			[
				'label' => esc_html__( 'Transitions HTML', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '<div class="transition-pages"></div><div class="mobile-nav__overlay"></div>',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo $settings['transitions_html'];
	}
}
