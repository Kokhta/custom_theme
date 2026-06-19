<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_3_ai extends \Elementor\Widget_Base {

	public function get_name() {
		return '3-ai';
	}

	public function get_title() {
		return esc_html__( '3-ai', 'custom-hello-333' );
	}

	public function get_icon() {
		return 'eicon-ai';
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
			'ai_pre_h2',
			[
				'label' => esc_html__( 'AI Pre H2', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'isn’t just a coaster.',
			]
		);

		$this->add_control(
			'ai_pre_body',
			[
				'label' => esc_html__( 'AI Pre Body', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Oryzo isn’t just a coaster. It’s the result of unprecedented AI* breakthroughs.',
			]
		);

		$this->add_control(
			'ai_title',
			[
				'label' => esc_html__( 'AI Title', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Powered by AI*',
			]
		);

		$this->add_control(
			'ai_tagline',
			[
				'label' => esc_html__( 'AI Tagline', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Oryzo-1',
			]
		);

		$this->add_control(
			'ai_desc',
			[
				'label' => esc_html__( 'AI Description', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'AI fills in the gaps. We said high five. It heard six.',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="ai" class="section" style="visibility: hidden;">
			<div class="section__inner o-container">
				<div id="ai-pre" style="visibility: hidden;">
					<h2 aria-label="<?php echo esc_attr($settings['ai_pre_h2']); ?>" style="transform: translate3d(0px, -0.862255em, 0px);">
						<?php
						$h2_chars = mb_str_split($settings['ai_pre_h2']);
						foreach ($h2_chars as $char) {
							if ($char === ' ') {
								echo ' ';
							} else {
								echo '<div aria-hidden="true" style="position: relative; display: inline-block; opacity: 0;">' . esc_html($char) . '</div>';
							}
						}
						?>
					</h2>
					<div class="body1" aria-label="<?php echo esc_attr($settings['ai_pre_body']); ?>" style="transform: translate3d(0px, 0.862255em, 0px);">
						<?php
						$body_chars = mb_str_split($settings['ai_pre_body']);
						foreach ($body_chars as $char) {
							if ($char === ' ') {
								echo ' ';
							} else {
								echo '<div aria-hidden="true" style="position: relative; display: inline-block; opacity: 0;">' . esc_html($char) . '</div>';
							}
						}
						?>
					</div>
				</div>
				<div id="ai-header" style="visibility: hidden;">
					<h1 id="ai-title" aria-label="<?php echo esc_attr($settings['ai_title']); ?>">
						<?php echo esc_html($settings['ai_title']); ?>
					</h1>
					<h4 id="ai-tagline" aria-label="<?php echo esc_attr($settings['ai_tagline']); ?>">
						<?php echo esc_html($settings['ai_tagline']); ?>
					</h4>
				</div>
				<div id="ai-instruction" class="sub2 desktop-only" style="visibility: hidden;">
					<svg id="ai-instruction-icon" style="transform: translate3d(49.7836%, -0.925285%, 0px) rotate(-0.557584deg); opacity: 0;"><use href="#hand-tmpl"></use></svg>
					<div class="o-dashline" style="width: 0%;"></div>
					<div id="ai-instruction-text" aria-label="Try to hover hand" style="opacity: 1; transform: translate3d(0em, 0px, 0px);">
						Try to hover hand
					</div>
				</div>
				<div id="ai-desc" class="sub1" style="visibility: hidden;" aria-label="<?php echo esc_attr($settings['ai_desc']); ?>">
					<?php echo esc_html($settings['ai_desc']); ?>
				</div>
				<div id="ai-disclaimer-wrapper" style="visibility: hidden;">
					<div class="o-dashline" style="width: 0%;"></div>
					<div id="ai-disclaimer" class="sub2" style="opacity: 0;"><span>* Adobe</span><span> Illustrator</span></div>
				</div>
			</div>
		</div>
		<?php
	}
}
