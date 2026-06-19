<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_13_footer extends \Elementor\Widget_Base {

	public function get_name() {
		return '13-footer';
	}

	public function get_title() {
		return esc_html__( '13-footer', 'custom-hello-333' );
	}

	public function get_icon() {
		return 'eicon-footer';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'custom-hello-333' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'footer_title',
			[
				'label' => esc_html__( 'Footer Title', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => "We caught your attention with a non-existent product.\nIf we can sell a coaster, imagine what we can do for your brand.",
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="footer" class="section">
			<div class="section__inner o-container o-grid">
				<div id="footer-top">
					<div id="footer-lusion-logo"></div>
					<h2 id="footer-title">
						<?php
						$lines = explode("\n", $settings['footer_title']);
						foreach ($lines as $line) {
							echo '<span>' . esc_html($line) . '</span>';
						}
						?>
					</h2>
				</div>
				<a id="footer-lusion-link" class="btn is-dark is-flipper" href="https://lusion.co/" target="_blank" aria-label="lusion.co">lusion.co</a>
				<div id="footer-love" class="sub2">
					<div>Built by <a href="https://lusion.co/" target="_blank">Lusion</a><br>with love <svg viewBox="0 0 11 9"><path d="M5.5 8.967C4.198 7.234 1.535 6.44.428 4.55-.249 3.47-.141 1.707.732.823 1.502-.083 3.287-.23 4.22.487c.99.703 1.144 1.648 1.232 2.816.15.022.097-.062.112-.224.118-1.143.316-1.904 1.232-2.592.937-.72 2.702-.565 3.472.336.874.884.98 2.649.304 3.728-1.11 1.876-3.77 2.69-5.072 4.416" fill="currentColor"></path></svg></div>
					<div><span>Share with friends</span><span> If you like it</span></div>
					<button class="is-flipper" aria-label="Copy URL">Copy URL</button>
				</div>
				<div id="footer-email" role="region" aria-labelledby="footer-newsletter-label">
					<label id="footer-newsletter-label" class="footer-item-caption sub2" for="footer-email-input">Subscribe to Lusion's Newsletter:</label>
					<form id="footer-newsletter-form" novalidate="">
						<div id="footer-email-input-wrapper">
							<input type="email" id="footer-email-input" name="EMAIL" autocomplete="email" placeholder="Your Email" required="" aria-required="true" aria-describedby="footer-newsletter-message">
							<button type="submit" id="footer-email-btn" aria-label="Subscribe to newsletter">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" aria-hidden="true">
									<path fill="currentColor" fill-rule="evenodd" d="M4.11 12.75a.75.75 0 0 1 0-1.5h13.978l-5.036-5.036a.75.75 0 1 1 1.06-1.06l6.316 6.315.53.53-.53.53-6.316 6.317a.75.75 0 0 1-1.06-1.061l5.035-5.035H4.109Z" clip-rule="evenodd"></path>
								</svg>
							</button>
							<div class="o-dashline"></div>
						</div>
						<div id="footer-newsletter-message" aria-live="polite"></div>
					</form>
				</div>
				<div id="footer-contact-wrapper">
					<div id="contact" class="footer-item">
						<div class="footer-item-caption sub2">New Business:</div>
						<a class="footer-item-link is-flipper" href="mailto:business@lusion.co" target="_blank" aria-label="business@lusion.co">business@lusion.co</a>
					</div>
					<div class="footer-item">
						<div class="footer-item-caption sub2">General Enquires:</div>
						<a class="footer-item-link is-flipper" href="mailto:hello@lusion.co" target="_blank" aria-label="hello@lusion.co">hello@lusion.co</a>
					</div>
				</div>
				<div id="footer-social-wrapper">
					<a class="footer-item-link" href="https://x.com/lusionltd" target="_blank">X</a>
					<a class="footer-item-link is-flipper" href="https://www.instagram.com/lusionltd" target="_blank" aria-label="Instagram">Instagram</a>
					<a class="footer-item-link is-flipper" href="https://www.linkedin.com/company/lusionltd" target="_blank" aria-label="Linkedin">Linkedin</a>
				</div>
				<div id="footer-extra-wrapper">
					<a class="footer-item-link is-flipper" href="/terms_and_conditions.pdf" target="_blank" aria-label="Terms &amp; Conditions">Terms &amp; Conditions</a>
					<a class="footer-item-link is-flipper" href="/privacy_policy.pdf" target="_blank" aria-label="Privacy Policy">Privacy Policy</a>
				</div>
				<div id="footer-caption" class="sub2">
					<div class="o-dashline mobile-only"></div>
					<span>This entire site is a fictional creative project by Lusion. Oryzo doesn't exist. No products are for sale. All claims are satirical and for entertainment purposes only.</span>
				</div>
			</div>
		</div>
		<footer id="site-footer" class="">
			<div id="site-footer-dot"></div>
			<div id="site-footer-scroll" class="sub2" style="visibility: visible; transform: translate3d(715.083px, 0px, 0px);">
				<div id="site-footer-scroll-icon">
					<svg viewBox="0 0 33 33"><path d="M17.58 32.965a17 17 0 0 1-2.16 0l.13-1.995a15 15 0 0 0 1.9 0zM11.837 30.234q.892.303 1.832.49l-.388 1.962a16 16 0 0 1-2.087-.558zM21.806 32.128q-1.017.345-2.087.557l-.388-1.961a14 14 0 0 0 1.832-.49zM8.444 28.559q.787.526 1.642.949L9.2 31.3a16.5 16.5 0 0 1-1.868-1.08zM25.668 30.22q-.895.6-1.868 1.08l-.886-1.792a14.5 14.5 0 0 0 1.642-.95zM5.598 26.06q.627.715 1.342 1.342l-1.32 1.503a17 17 0 0 1-1.525-1.525zM28.905 27.38q-.713.811-1.525 1.525l-1.32-1.503q.715-.627 1.342-1.342zM3.492 22.914q.422.855.95 1.642l-1.663 1.112q-.6-.895-1.08-1.868zM31.3 23.8q-.48.973-1.08 1.868l-1.661-1.112q.526-.787.949-1.642zM2.276 19.331q.187.94.49 1.832l-1.894.643a16 16 0 0 1-.557-2.087zM32.685 19.719q-.211 1.07-.557 2.087l-1.894-.643q.304-.892.49-1.832zM0 16.5q0-.543.035-1.08l1.995.13a15 15 0 0 0 0 1.9l-1.995.13A17 17 0 0 1 0 16.5M31 16.5q0-.48-.03-.95l1.995-.13a17 17 0 0 1 0 2.16l-1.995-.13q.03-.47.03-.95M2.766 11.837a14 14 0 0 0-.49 1.832L.315 13.28q.211-1.07.557-2.087zM32.128 11.194q.345 1.017.557 2.087l-1.961.388a14 14 0 0 0-.49-1.832zM4.441 8.444a14.5 14.5 0 0 0-.949 1.642L1.7 9.2q.48-.973 1.08-1.868zM30.22 7.332q.6.895 1.08 1.868l-1.792.886a14.5 14.5 0 0 0-.95-1.642zM6.94 5.598q-.715.627-1.342 1.342L4.095 5.62q.712-.811 1.525-1.525zM27.38 4.095a17 17 0 0 1 1.525 1.525l-1.503 1.32a15 15 0 0 0-1.342-1.342zM10.086 3.492q-.856.422-1.642.95L7.332 2.778q.895-.6 1.868-1.08zM23.8 1.7q.973.48 1.868 1.08L24.556 4.44a14.5 14.5 0 0 0-1.642-.949zM13.669 2.276q-.94.187-1.832.49L11.194.872q1.017-.345 2.087-.557zM19.719.315q1.07.211 2.087.557l-.643 1.894a14 14 0 0 0-1.832-.49zM16.5 0q.543 0 1.08.035l-.13 1.995a15 15 0 0 0-1.9 0L15.42.035Q15.958 0 16.5 0" fill="currentColor"></path></svg>
					<div id="site-footer-scroll-arrow">
						<svg viewBox="0 0 13 8"><path fill="currentColor" d="M0 1.873 1.654 0l4.82 4.258L11.293 0l1.654 1.873-6.473 5.72z"></path></svg>
						<svg viewBox="0 0 13 8"><path fill="currentColor" d="M0 1.873 1.654 0l4.82 4.258L11.293 0l1.654 1.873-6.473 5.72z"></path></svg>
					</div>
				</div>
				<div id="site-footer-scroll-text" aria-label="Scroll to continue">Scroll to continue</div>
			</div>
		</footer>
		<?php
	}
}
