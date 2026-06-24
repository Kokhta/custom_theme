<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Valentine_Heart_Customise_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'valentine_heart_customise';
	}

	public function get_title() {
		return esc_html__( '5-Heart Customise', 'valentine' );
	}

	public function get_icon() {
		return 'eicon-editor-external-link';
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
			'customise_text',
			[
				'label' => esc_html__( 'Customise Text', 'valentine' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Let’s customise your 360 heart', 'valentine' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-v-de440ced="" class="heart-customise" style="pointer-events: none;">
			<div data-v-de440ced="" class="wrapper">
				<div data-v-de440ced="" class="left-w" style="filter: blur(40px); opacity: 0;">
					<div data-v-91912782="" data-v-de440ced="" class="home-customise-tabs">
						<button data-v-8378461c="" data-v-91912782="" class="btn btn-secondary active tab-button">
							<span data-v-8378461c="" class="btn__background"></span>
							<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">Material</span><span data-v-8378461c="" class="btn__label"></span></span>
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
						<button data-v-8378461c="" data-v-91912782="" class="btn btn-secondary tab-button">
							<span data-v-8378461c="" class="btn__background"></span>
							<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">Color</span><span data-v-8378461c="" class="btn__label"></span></span>
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
						<button data-v-8378461c="" data-v-91912782="" class="btn btn-secondary tab-button" style="--y: 6.58331298828125px; --x: 44px; --s: 0;">
							<span data-v-8378461c="" class="btn__background"></span>
							<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">Frame</span><span data-v-8378461c="" class="btn__label"></span></span>
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
						<button data-v-8378461c="" data-v-91912782="" class="btn btn-secondary tab-button">
							<span data-v-8378461c="" class="btn__background"></span>
							<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">Stickers</span><span data-v-8378461c="" class="btn__label"></span></span>
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
					<div data-v-de440ced="" class="for-decals-control">
						<button data-v-8378461c="" data-v-de440ced="" class="btn btn-secondary tab-button">
							<span data-v-8378461c="" class="btn__background"></span>
							<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">clear all stickers</span><span data-v-8378461c="" class="btn__label"></span></span>
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
						<button data-v-8378461c="" data-v-de440ced="" class="btn btn-secondary tab-button">
							<span data-v-8378461c="" class="btn__background"></span>
							<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">undo</span><span data-v-8378461c="" class="btn__label"></span></span>
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
					<button data-v-8378461c="" data-v-de440ced="" class="btn btn-primary hide-mobile">
						<span data-v-8378461c="" class="btn__background"></span>
						<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">Finish &amp; Share</span><span data-v-8378461c="" class="btn__label"></span></span>
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
				<div data-v-de440ced="" class="center-w" style="filter: blur(40px); opacity: 0;">
					<div data-v-de440ced="" class="center-height">
						<div data-v-de440ced="" class="mobile-sticker-controls">
							<div data-v-de440ced="" class="undo control-button"><img data-v-de440ced="" alt="undo" src="/images/icons/undo.svg"></div>
							<div data-v-de440ced="" class="tap-info"><p data-v-de440ced="" class="font-fontspring-16-300-black">Select a sticker and tap on the heart</p></div>
							<div data-v-de440ced="" class="remove-all control-button"><img data-v-de440ced="" alt="remove all" src="/images/icons/removeStickers.svg"></div>
						</div>
						<div data-v-de440ced="" class="text-1 text">
							<p class="font-fontspring-24-300-black" data-v-de440ced="">
								<span class="top" data-v-de440ced=""><span class="left" data-v-de440ced=""></span><span class="center" data-v-de440ced=""><span class="center-red" data-v-de440ced=""></span></span><span class="right" data-v-de440ced=""></span></span>
								<?php echo esc_html( $settings['customise_text'] ); ?>
								<span class="bottom" data-v-de440ced=""><span class="left" data-v-de440ced=""></span><span class="center" data-v-de440ced=""><span class="center-red" data-v-de440ced=""></span></span><span class="right" data-v-de440ced=""></span></span>
							</p>
						</div>
						<div data-v-de440ced="">
							<p data-v-de440ced="" class="font-fontspring-24-300-black rotate-info">Drag to rotate</p>
							<button data-v-8378461c="" data-v-de440ced="" class="btn btn-primary hide-desktop" style="--y: 2.16668701171875px; --x: 149.41668701171875px; --s: 0;">
								<span data-v-8378461c="" class="btn__background"></span>
								<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">Finish &amp; Share</span><span data-v-8378461c="" class="btn__label"></span></span>
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
				</div>
				<div data-v-de440ced="" class="right-w" style="filter: blur(40px); opacity: 0;">
					<div data-v-de440ced="" class="for-limit">
						<div data-v-70c76ea7="" data-v-de440ced="" class="sticker-limit" style="translate: none; rotate: none; scale: none; transform: translate(238px);">
							<p data-v-70c76ea7="" class="font-fontspring-16-300-black">Click on the heart to add stickers</p>
						</div>
					</div>
					<div data-v-61bc8494="" data-v-de440ced="" class="home-customise-selected-list">
						<div data-v-61bc8494="" class="list">
							<?php for ($i = 1; $i <= 8; $i++) : ?>
							<div data-v-6ea4bce1="" data-v-61bc8494="" class="list-item" style="animation-delay: <?php echo ($i-1)*100; ?>ms;">
								<img data-v-6ea4bce1="" alt="image" class="ram" src="/images/activeRam.png">
								<div data-v-6ea4bce1="" class="wrapper"><img data-v-6ea4bce1="" alt="image" class="image" src="/images/materials/mat<?php echo $i; ?>.png"></div>
							</div>
							<?php endfor; ?>
						</div>
						<div data-v-61bc8494="" id="color-slider">
							<div id="slider" class="noUi-target noUi-rtl noUi-vertical noUi-txt-dir-ltr">
								<div class="noUi-base">
									<div class="noUi-connects"><div class="noUi-connect" style="transform: translate(0px, 0%) scale(1);"></div></div>
									<div class="noUi-origin" style="transform: translate(0px, 0%); z-index: 4;">
										<div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="vertical" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="100.00">
											<div class="noUi-touch-area"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
