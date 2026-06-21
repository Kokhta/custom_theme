<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Vectr_Widget_8_app extends \Elementor\Widget_Base {

	public function get_name() {
		return '8-app';
	}

	public function get_title() {
		return esc_html__( '8-app', 'vectr' );
	}

	public function get_icon() {
		return 'eicon-code';
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
			'html_content',
			[
				'label' => esc_html__( 'HTML Content', 'vectr' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<div id="app"><canvas width="1920" height="913" style="width: 100vw; height: 100lvh; touch-action: none;" data-engine="three.js r182 webgpu" class="is-ready"></canvas></div>',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo $settings['html_content'];
	}
}
