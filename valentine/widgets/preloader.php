<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Valentine_Preloader_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'valentine_preloader';
	}

	public function get_title() {
		return esc_html__( '3-Preloader', 'valentine' );
	}

	public function get_icon() {
		return 'eicon-preloader';
	}

	public function get_categories() {
		return [ 'valentine' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'valentine' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'loading_text',
			[
				'label' => esc_html__( 'Loading Text', 'valentine' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'finding love', 'valentine' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="preloader" data-v-f69ce2bf="" style="display: none;">
			<div class="wrapper" data-v-f69ce2bf="">
				<div class="logo-wrap" data-v-f69ce2bf="">
					<svg id="preloder-logo" xmlns="http://www.w3.org/2000/svg" width="55" height="37" viewBox="0 0 55 37" fill="none" data-v-f69ce2bf="">
						<path d="M53.9036 9.42541C48.0673 10.3151 30.4648 13.5865 31.9973 13.5865C34.4657 13.2114 38.8775 12.0875 40.9009 11.7058C41.4625 11.3835 41.3066 10.7067 41.1833 10.3675C40.5551 8.64016 35.6086 0.317465 24.1453 12.0164C23.8573 7.93348 21.7266 0.0661005 15.5081 1.25954C9.28962 2.45299 8.85132 12.1142 9.40949 16.7956L2.35891 18.4045C-1.1433 19.1328 9.11141 16.7956 9.40949 17.1402C9.85687 18.0571 11.5941 28.8414 15.063 35.5727C15.3046 36.0416 15.8815 36.2155 16.3537 35.9804C32.3011 28.0415 40.893 18.3298 41.3923 11.6141" stroke="#202020" stroke-width="1.5" stroke-linecap="round" data-v-f69ce2bf="" stroke-dasharray="160.6560516357422" stroke-dashoffset="160.6560516357422" style="stroke-dashoffset: 14px;"></path>
					</svg>
					<p class="font-fontspring-16-300-black" data-v-f69ce2bf="">
						<?php echo esc_html( $settings['loading_text'] ); ?><span data-v-f69ce2bf="">...</span>
					</p>
				</div>
			</div>
			<svg id="preloaderMask" width="100%" height="100%" viewBox="0 0 100% 100%" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-v-f69ce2bf="">
				<defs data-v-f69ce2bf="">
					<radialGradient id="gradMask" cx="50%" cy="50%" r="100%" data-v-f69ce2bf="" style="translate: none; rotate: none; scale: none; transform-origin: 50% 50% 0px; transform: translate(0px);">
						<stop class="first" offset="100%" stop-color="black" data-v-f69ce2bf="" style="translate: none; rotate: none; scale: none; transform-origin: 50% 50% 0px; transform: translate(0px);"></stop>
						<stop offset="100%" stop-color="white" data-v-f69ce2bf=""></stop>
					</radialGradient>
					<mask id="fadeMask" data-v-f69ce2bf="">
						<rect width="100%" height="100%" fill="url(#gradMask)" data-v-f69ce2bf=""></rect>
					</mask>
					<filter id="blurFilter" x="0" y="0" width="100%" height="100%" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB" data-v-f69ce2bf="">
						<feGaussianBlur stdDeviation="0" data-v-f69ce2bf=""></feGaussianBlur>
					</filter>
				</defs>
				<rect width="100%" height="100%" fill="white" mask="url(#fadeMask)" filter="url(#blurFilter)" data-v-f69ce2bf=""></rect>
			</svg>
		</div>
		<?php
	}
}
