<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_3 extends \Elementor\Widget_Base {

	public function get_name() { return '3-ai'; }
	public function get_title() { return esc_html__( '3. AI Section', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-ai'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
		$this->add_control( 'pre_title', [ 'label' => esc_html__( 'Pre Title', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'isn’t just a coaster.' ] );
		$this->add_control( 'pre_body', [ 'label' => esc_html__( 'Pre Body', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Oryzo isn’t just a coaster. It’s the result of unprecedented AI* breakthroughs.' ] );
		$this->add_control( 'title', [ 'label' => esc_html__( 'Main Title', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Powered by AI*' ] );
		$this->add_control( 'tagline', [ 'label' => esc_html__( 'Tagline', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Oryzo-1' ] );
		$this->add_control( 'instruction_text', [ 'label' => esc_html__( 'Instruction', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Try to hover hand' ] );
		$this->add_control( 'desc_text', [ 'label' => esc_html__( 'Description', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'AI fills in the gaps. We said high five. It heard six.' ] );
		$this->add_control( 'disclaimer_text', [ 'label' => esc_html__( 'Disclaimer', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '* Adobe Illustrator' ] );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="ai" class="section" style="visibility: hidden;">
			<div class="section__inner o-container">
				<div id="ai-pre" style="visibility: hidden;">
					<h2 aria-label="<?php echo esc_attr($settings['pre_title']); ?>" style="transform: translate3d(0px, -0.862255em, 0px);">
						<?php echo esc_html($settings['pre_title']); ?>
					</h2>
					<div class="body1" aria-label="<?php echo esc_attr($settings['pre_body']); ?>" style="transform: translate3d(0px, 0.862255em, 0px);">
						<?php echo esc_html($settings['pre_body']); ?>
					</div>
				</div>
				<div id="ai-header" style="visibility: hidden;">
					<h1 id="ai-title" aria-label="<?php echo esc_attr($settings['title']); ?>">
						<?php echo esc_html($settings['title']); ?>
					</h1>
					<h4 id="ai-tagline" aria-label="<?php echo esc_attr($settings['tagline']); ?>">
						<?php echo esc_html($settings['tagline']); ?>
					</h4>
				</div>
				<div id="ai-instruction" class="sub2 desktop-only" style="visibility: hidden;">
					<svg id="ai-instruction-icon" style="transform: translate3d(49.7836%, -0.925285%, 0px) rotate(-0.557584deg); opacity: 0;"><use href="#hand-tmpl"></use></svg>
					<div class="o-dashline" style="width: 0%;"></div>
					<div id="ai-instruction-text" aria-label="<?php echo esc_attr($settings['instruction_text']); ?>" style="opacity: 1; transform: translate3d(0em, 0px, 0px);"><?php echo esc_html($settings['instruction_text']); ?></div>
				</div>
				<div id="ai-desc" class="sub1" style="visibility: hidden;" aria-label="<?php echo esc_attr($settings['desc_text']); ?>">
					<?php echo esc_html($settings['desc_text']); ?>
				</div>
				<div id="ai-disclaimer-wrapper" style="visibility: hidden;">
					<div class="o-dashline" style="width: 0%;"></div>
					<div id="ai-disclaimer" class="sub2" style="opacity: 0;">
						<?php
						$parts = explode(' ', $settings['disclaimer_text']);
						foreach($parts as $part) echo '<span>' . esc_html($part) . '</span> ';
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
