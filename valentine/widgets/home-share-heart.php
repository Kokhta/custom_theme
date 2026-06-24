<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Valentine_Home_Share_Heart_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'valentine_home_share_heart';
	}

	public function get_title() {
		return esc_html__( '6-Home Share Heart', 'valentine' );
	}

	public function get_icon() {
		return 'eicon-share';
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
			'share_title',
			[
				'label' => esc_html__( 'Share Title', 'valentine' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Share your creation on social media', 'valentine' ),
			]
		);

		$this->add_control(
			'back_text',
			[
				'label' => esc_html__( 'Back to Editing Text', 'valentine' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'back to editing', 'valentine' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-v-07c346be="" class="home-share-heart">
			<div data-v-07c346be="" class="wrapper">
				<div data-v-07c346be="" class="left">
					<div data-v-10a00f35="" data-v-07c346be="" class="tab-button back-to-editing-desktop">
						<div data-v-10a00f35="" class="wrapper">
							<p data-v-10a00f35="" class="font-fontspring-16-300-black"><?php echo esc_html( $settings['back_text'] ); ?></p>
						</div>
					</div>
					<p data-v-07c346be="" class="font-fontspring-36-300-black title-mobile"><?php echo esc_html( $settings['share_title'] ); ?></p>
				</div>
				<div data-v-07c346be="" class="center">
					<div data-v-07c346be="" class="center-height">
						<div data-v-07c346be=""></div>
						<div data-v-07c346be="">
							<p data-v-07c346be="" class="font-fontspring-36-300-black title"><?php echo esc_html( $settings['share_title'] ); ?></p>
							<div data-v-10a00f35="" data-v-07c346be="" class="tab-button back-to-editing-mobile">
								<div data-v-10a00f35="" class="wrapper">
									<p data-v-10a00f35="" class="font-fontspring-16-300-black"><?php echo esc_html( $settings['back_text'] ); ?></p>
								</div>
							</div>
							<div data-v-07c346be="" class="socials">
								<button data-v-8378461c="" data-v-07c346be="" class="btn btn-primary">
									<span data-v-8378461c="" class="btn__background"></span>
									<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">Copy link</span><span data-v-8378461c="" class="btn__label"></span></span>
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
								<a data-v-8378461c="" data-v-07c346be="" href="https://x.com/intent/tweet?text=My Custom Heart on Noomo Valentine&amp;url=https://valentime.noomoagency.com/personal/" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
									<span data-v-8378461c="" class="btn__background"></span>
									<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">X</span><span data-v-8378461c="" class="btn__label"></span></span>
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
								</a>
								<a data-v-8378461c="" data-v-07c346be="" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://valentime.noomoagency.com/&amp;title=Noomo Valentime&amp;summary=My Custom Heart on Noomo Valentine" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
									<span data-v-8378461c="" class="btn__background"></span>
									<span data-v-8378461c="" class="btn__inset"><span data-v-8378461c="">Linkedin</span><span data-v-8378461c="" class="btn__label"></span></span>
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
								</a>
							</div>
						</div>
					</div>
				</div>
				<div data-v-07c346be="" class="right"></div>
			</div>
		</div>
		<?php
	}
}
