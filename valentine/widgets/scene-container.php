<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Valentine_Scene_Container_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'valentine_scene_container';
	}

	public function get_title() {
		return esc_html__( '4-Scene Container', 'valentine' );
	}

	public function get_icon() {
		return 'eicon-navigator';
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
			'hero_title',
			[
				'label' => esc_html__( 'Hero Title', 'valentine' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Connecting Every<br> Heart with Love', 'valentine' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'valentine' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Begin Journey', 'valentine' ),
			]
		);

		$this->add_control(
			'scroll_text',
			[
				'label' => esc_html__( 'Scroll Text', 'valentine' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'scroll to explore', 'valentine' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-v-8a5dcb6b="" id="scene-container">
			<div data-v-8a5dcb6b="" class="start-hero">
				<h2 data-v-8a5dcb6b="" class="font-fontspring-36-300-black line-1" style="filter: blur(40px); opacity: 0; display: none;">
					<?php echo wp_kses_post( $settings['hero_title'] ); ?>
				</h2>
				<div data-v-8a5dcb6b="" style="filter: blur(40px); opacity: 0; display: none;">
					<button data-v-8378461c="" data-v-8a5dcb6b="" class="btn btn-primary" style="--y: 20.16668701171875px; --x: 69.41668701171875px; --s: 0;">
						<span data-v-8378461c="" class="btn__background"></span>
						<span data-v-8378461c="" class="btn__inset">
							<span data-v-8378461c=""><?php echo esc_html( $settings['button_text'] ); ?></span>
							<span data-v-8378461c="" class="btn__label"></span>
						</span>
						<svg data-v-8378461c="" preserveAspectRatio="none" width="168" height="42" viewBox="0 0 168 42" fill="none" xmlns="http://www.w3.org/2000/svg">
							<defs data-v-8378461c="">
								<linearGradient data-v-8378461c="" id="animatedGradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse">
									<stop data-v-8378461c="" stop-color="currentColor"></stop>
									<stop data-v-8378461c="" offset="0.182292" stop-color="currentColor" stop-opacity="0.81"></stop>
									<stop data-v-8378461c="" offset="0.432292" stop-color="white" stop-opacity="0"></stop>
									<stop data-v-8378461c="" offset="0.841669" stop-color="currentColor" stop-opacity="0.82"></stop>
									<stop data-v-8378461c="" offset="1" stop-color="currentColor"></stop>
								</linearGradient>
								<animateTransform data-v-8378461c="" xlink:href="#animatedGradient" attributeName="gradientTransform" type="rotate" from="0 84 21" to="360 84 21" dur="4s" repeatCount="indefinite"></animateTransform>
							</defs>
							<rect data-v-8378461c="" x="0" y="0" width="168" height="42" stroke="url(#animatedGradient)" stroke-opacity="0.5" stroke-width="2" stroke-linejoin="round"></rect>
						</svg>
					</button>
				</div>
			</div>
			<audio data-v-8a5dcb6b="" src="/audio/glass.mp3" class="_volume-boosted" crossorigin="anonymous"></audio>
			<audio data-v-8a5dcb6b="" src="/audio/back.mp3" class="_volume-boosted" crossorigin="anonymous" loop=""></audio>
			<audio data-v-8a5dcb6b="" src="/audio/sticker.mp3" class="_volume-boosted" crossorigin="anonymous"></audio>
			<audio data-v-8a5dcb6b="" src="/audio/Heartcollidesound.mp3" class="_volume-boosted" crossorigin="anonymous"></audio>
			<div data-v-8a5dcb6b="" class="scroll-down">
				<p data-v-8a5dcb6b="" class="font-fontspring-16-300-black"><?php echo esc_html( $settings['scroll_text'] ); ?></p>
			</div>
			<canvas style="display: block; width: 414px; height: 846px; touch-action: none;" data-engine="three.js r175 webgpu" width="621" height="1269"></canvas>
		</div>
		<?php
	}
}
