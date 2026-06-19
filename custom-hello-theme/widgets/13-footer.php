<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_13 extends \Elementor\Widget_Base {

	public function get_name() { return '13-footer'; }
	public function get_title() { return esc_html__( '13. Footer', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-footer'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
		$this->add_control( 'title', [ 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'We caught your attention with a non-existent product.' ] );
		$this->add_control( 'newsletter_label', [ 'label' => 'Newsletter Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => "Subscribe to Lusion's Newsletter:" ] );
		$this->add_control( 'business_email', [ 'label' => 'Business Email', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'business@lusion.co' ] );
		$this->add_control( 'general_email', [ 'label' => 'General Email', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'hello@lusion.co' ] );
		$this->add_control( 'disclaimer', [ 'label' => 'Footer Disclaimer', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "This entire site is a fictional creative project by Lusion. Oryzo doesn't exist." ] );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="footer" class="section">
			<div class="section__inner o-container o-grid">
				<div id="footer-top">
					<div id="footer-lusion-logo"></div>
					<h2 id="footer-title"><span><?php echo esc_html($settings['title']); ?></span></h2>
				</div>
				<a id="footer-lusion-link" class="btn is-dark is-flipper" href="https://lusion.co/" target="_blank">lusion.co</a>

				<div id="footer-email">
					<label class="footer-item-caption sub2"><?php echo esc_html($settings['newsletter_label']); ?></label>
					<form id="footer-newsletter-form">
						<div id="footer-email-input-wrapper">
							<input type="email" placeholder="Your Email">
							<button type="submit" id="footer-email-btn">SUBMIT</button>
						</div>
					</form>
				</div>

				<div id="footer-contact-wrapper">
					<div class="footer-item">
						<div class="footer-item-caption sub2">New Business:</div>
						<a class="footer-item-link" href="mailto:<?php echo esc_attr($settings['business_email']); ?>"><?php echo esc_html($settings['business_email']); ?></a>
					</div>
					<div class="footer-item">
						<div class="footer-item-caption sub2">General Enquires:</div>
						<a class="footer-item-link" href="mailto:<?php echo esc_attr($settings['general_email']); ?>"><?php echo esc_html($settings['general_email']); ?></a>
					</div>
				</div>

				<div id="footer-caption" class="sub2">
					<span><?php echo esc_html($settings['disclaimer']); ?></span>
				</div>
			</div>
		</div>
		<?php
	}
}
