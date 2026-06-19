<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_6 extends \Elementor\Widget_Base {

	public function get_name() { return '6-encryption'; }
	public function get_title() { return esc_html__( '6. Encryption', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-lock-user'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
		$this->add_control( 'tagline', [ 'label' => 'Tagline', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Secure communications simplified' ] );
		$this->add_control( 'title', [ 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Smart flip encryption' ] );
		$this->add_control( 'desc', [ 'label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Write a message. Flip. Instantly secure - until someone flips it back. Genius.' ] );
		$this->add_control( 'btn_encode', [ 'label' => 'Encode Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Encode Message' ] );
		$this->add_control( 'btn_decode', [ 'label' => 'Decode Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Decode Message' ] );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="encryption" class="section" style="visibility: hidden;">
			<div class="section__inner o-container">
				<div id="encryption-main">
					<div id="encryption-header">
						<div id="encryption-tagline" class="sub1" aria-label="<?php echo esc_attr($settings['tagline']); ?>"><?php echo esc_html($settings['tagline']); ?></div>
						<h2 id="encryption-title" aria-label="<?php echo esc_attr($settings['title']); ?>"><?php echo esc_html($settings['title']); ?></h2>
						<div id="encryption-desc" class="body2" aria-label="<?php echo esc_attr($settings['desc']); ?>"><?php echo esc_html($settings['desc']); ?></div>
					</div>
					<div id="encryption-field" style="opacity: 1;">
						<div class="encryption-field-line" style="width: 22.6961%;"></div>
						<div class="encryption-field-line" style="height: 22.6961%;"></div>
						<div class="encryption-field-line" style="width: 22.6961%;"></div>
						<div class="encryption-field-line" style="height: 22.6961%;"></div>
						<input type="text" id="encryption-field-input" value="ORYZO" maxlength="10" style="opacity: 0;">
					</div>
					<button id="encryption-field-flip-btn" class="btn is-flipper" style="opacity: 0;">
						<span id="encryption-field-flip-btn-inner">
							<span class="is-flipper-target" aria-label="<?php echo esc_attr($settings['btn_encode']); ?>"><?php echo esc_html($settings['btn_encode']); ?></span>
							<span class="is-flipper-target" aria-label="<?php echo esc_attr($settings['btn_decode']); ?>"><?php echo esc_html($settings['btn_decode']); ?></span>
						</span>
					</button>
				</div>
			</div>
		</div>
		<?php
	}
}
