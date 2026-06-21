<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Vectr_Widget_10_loader extends \Elementor\Widget_Base {

	public function get_name() {
		return '10-loader';
	}

	public function get_title() {
		return esc_html__( '10-loader', 'vectr' );
	}

	public function get_icon() {
		return 'eicon-loading';
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
			'loader_html',
			[
				'label' => esc_html__( 'Loader HTML', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '<div id="loader" class="flx-center hide" style="display: none;"><svg width="96" height="96" viewBox="0 0 96 96" fill="none" class="loader__logo" overflow="visible"><defs><mask id="arrow-mask"><path class="arrow-mask-line" d="M14.0002 13.9917L47.0002 46.9917" stroke="white" stroke-width="16.1"></path><path class="arrow-mask-line" d="M14.0002 81.9917L47.0002 48.9917" stroke="white" stroke-width="16.1"></path><path class="arrow-mask-line" d="M0 47.9917H56" stroke="white" stroke-width="16.1"></path></mask></defs><g id="block_full" fill="#0F32DC"><path id="cube_05" d="M39.9963 96.0002H55.9926V80.0039H39.9963V96.0002Z" fill="#0F32DC"></path><path id="cube_04" d="M76.2787 87.59L64.9673 76.2787L76.2787 64.9673L87.59 76.2787L76.2787 87.59Z" fill="#0F32DC"></path><path id="cube_03" d="M80.0039 55.9926V39.9963H96.0001V55.9926H80.0039Z" fill="#0F32DC"></path><path id="cube_02" d="M76.2899 8.39893L87.6013 19.7103L76.2899 31.0217L64.9785 19.7103L76.2899 8.39893Z" fill="#0F32DC"></path><path id="cube_01" d="M40.0076 0H56.0038V15.9962H40.0076V0Z" fill="#0F32DC"></path><path id="cube_06" d="M19.7216 87.59L31.033 76.2787L19.7216 64.9673L8.41019 76.2787L19.7216 87.59Z" fill="#0F32DC"></path><path id="cube_07" d="M15.9963 55.9926V39.9963H9.91821e-05V55.9926H15.9963Z" fill="#0F32DC"></path><path id="cube_08" d="M19.7103 8.39893L8.39896 19.7103L19.7103 31.0217L31.0217 19.7103L19.7103 8.39893Z" fill="#0F32DC"></path></g><path id="arrow" d="M53.6557 53.6557C56.7827 50.5287 56.7827 45.4713 53.6557 42.3443V42.3556L19.7103 8.41016L13.7046 14.4158L8.39887 19.7215L28.6736 40.0188H0V56.015H28.6849L19.7103 64.9784L8.39887 76.2897L19.7103 87.6011L53.6557 53.6557Z" fill="#0F32DC" mask="url(#arrow-mask)"></path></svg><svg class="loader__ellipse loader__ellipse--outer" viewBox="0 0 1500 800"><defs><mask id="mask-outer"><path d="M 750 1 A 749 399 0 0 1 750 799 A 749 399 0 0 1 750 1" fill="none" stroke="white" stroke-width="4" pathLength="3700" class="loader__draw loader__draw--outer"></path></mask></defs><ellipse cx="750" cy="400" rx="749" ry="399" mask="url(#mask-outer)"></ellipse></svg><svg class="loader__ellipse loader__ellipse--inner" viewBox="0 0 800 800"><defs><mask id="mask-inner"><path d="M 400 1 A 399 399 0 0 1 400 799 A 399 399 0 0 1 400 1" fill="none" stroke="white" stroke-width="4" pathLength="2520" class="loader__draw loader__draw--inner"></path></mask></defs><ellipse cx="400" cy="400" rx="399" ry="399" mask="url(#mask-inner)"></ellipse></svg></div>',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo $settings['loader_html'];
	}
}
