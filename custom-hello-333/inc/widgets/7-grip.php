<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_7_grip extends \Elementor\Widget_Base {

	public function get_name() {
		return '7-grip';
	}

	public function get_title() {
		return esc_html__( '7-grip', 'custom-hello-333' );
	}

	public function get_icon() {
		return 'eicon-hand';
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
			'tagline',
			[
				'label' => esc_html__( 'Tagline', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Precision Grip, Zero Drama',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Grip-locked Antisliptechnology',
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => esc_html__( 'Description', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Micro-textured cork so grippy your drink files a restraining order against gravity. Spills? Consider them politely discouraged.',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="grip" class="section" style="visibility: hidden;">
			<div class="section__inner o-container">
				<div id="grip-header">
					<div id="grip-tagline" class="sub1" aria-label="<?php echo esc_attr($settings['tagline']); ?>"><?php echo esc_html($settings['tagline']); ?></div>
					<h2 id="grip-title" aria-label="<?php echo esc_attr($settings['title']); ?>"><?php echo esc_html($settings['title']); ?></h2>
					<div id="grip-desc" class="body2" aria-label="<?php echo esc_attr($settings['desc']); ?>"><?php echo esc_html($settings['desc']); ?></div>
				</div>
				<div id="grip-zoom-box" class="sub2 prevent-select" style="transform: translateZ(0px);">
					<div id="grip-zoom-box__inner" style="pointer-events: none; transform: translate3d(0px, 0px, 0px);">
						<div id="grip-zoom-box__image"></div>
						<div id="grip-zoom-box__content" style="opacity: 1;">
							<div id="grip-zoom-box__content-bg" style="transform-origin: 0px 105.983px 0px; width: 17.1079%; opacity: 1;"></div>
							<div id="grip-zoom-box__content-label" style="opacity: 0;">Friction coefficient (est):</div>
							<div id="grip-zoom-box__content-coeff" style="opacity: 0;">0.80</div>
						</div>
					</div>
				</div>
				<div id="grip-instruction" style="opacity: 0;">
					<svg id="grip-instruction-wheel" viewBox="0 0 100 15">
						<path fill="none" stroke="currentColor" stroke-width="0.25" d="M50,12.125c32,0,50,-8.5,50,-10" stroke-dasharray="1 1"></path>
						<path fill="none" stroke="currentColor" stroke-width="0.25" d="M50,12.125c-32,0,-50,-8.5,-50,-10" stroke-dasharray="1 1"></path>
						<circle cx="50" cy="12.125" r="0.8" fill="currentColor"></circle>
						<circle id="grip-instruction-wheel-circle" cx="50" cy="12.125" r="1.8" fill="currentColor" style="transform: translate3d(2.41072px, -0.045345%, 0px);"></circle>
					</svg>
					<svg id="grip-instruction-icon" style="transform: translate3d(6.94449px, -0.0935089px, 0px) translateX(-50%) rotate(1.34703deg);"><use href="#hand-tmpl"></use></svg>
				</div>
			</div>
		</div>
		<?php
	}
}
