<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Kriss_Hero_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return '2-hero';
	}

	public function get_title() {
		return esc_html__( '2-Hero', 'kriss' );
	}

	public function get_icon() {
		return 'eicon-v-align-middle';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'kriss' ),
			]
		);

		$this->add_control(
			'greeting',
			[
				'label' => esc_html__( 'Greeting', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => "Hi, I'm Kriss.",
			]
		);

		$this->add_control(
			'description_prefix',
			[
				'label' => esc_html__( 'Description Prefix', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'An AI chatbot for ',
			]
		);

		$this->add_control(
			'industries',
			[
				'label' => esc_html__( 'Industries', 'kriss' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'industry',
						'label' => esc_html__( 'Industry', 'kriss' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'dentists',
					],
				],
				'default' => [
					[ 'industry' => 'dentists' ],
					[ 'industry' => 'pharmacists' ],
					[ 'industry' => 'healthcare professionals' ],
					[ 'industry' => 'health insurance agents' ],
					[ 'industry' => 'doctors' ],
				],
				'title_field' => '{{{ industry }}}',
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label' => esc_html__( 'CTA Text', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Learn More',
			]
		);

		$this->add_control(
			'scroll_text',
			[
				'label' => esc_html__( 'Scroll Text', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Scroll or click hotspots to explore the experience',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_attributes',
			[
				'label' => esc_html__( 'Attributes & Classes', 'kriss' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'container_style',
			[
				'label' => esc_html__( 'Container Style', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '--h: 631; --w: 1333; --vh: 631px; --vw: 1333px; --aspect: 2.1125198098256734; --text-color: var(--blue-text); --cta-color: var(--blue-cta); --cta-hover-color: var(--blue-cta-hover); --cta-text-color: var(--blue-cta-text);',
			]
		);

		$this->add_control(
			'webgl_container_class',
			[
				'label' => esc_html__( 'WebGL Container Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'webgl-container svelte-12ctfyc',
			]
		);

		$this->add_control(
			'canvas_style',
			[
				'label' => esc_html__( 'Canvas Style', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'width: 1333px; height: 631px;',
			]
		);

		$this->add_control(
			'home_class',
			[
				'label' => esc_html__( 'Home Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'home svelte-hipe91',
			]
		);

		$this->add_control(
			'home_style',
			[
				'label' => esc_html__( 'Home Style', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'transform: scale(calc( max(1.0, max(var(--h) / 900, var(--w) / 1440)) ));',
			]
		);

		$this->add_control(
			'typewriter_class',
			[
				'label' => esc_html__( 'Typewriter Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'typewriter svelte-1my3x9z',
			]
		);

		$this->add_control(
			'greeting_class',
			[
				'label' => esc_html__( 'Greeting Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'greeting D2 svelte-hipe91',
			]
		);

		$this->add_control(
			'description_class',
			[
				'label' => esc_html__( 'Description Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'description D5 svelte-hipe91',
			]
		);

		$this->add_control(
			'scroll_class',
			[
				'label' => esc_html__( 'Scroll Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'scroll svelte-hipe91',
			]
		);

		$this->add_control(
			'scroller_class',
			[
				'label' => esc_html__( 'Scroller Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'scroller svelte-ofep1b',
			]
		);

		$this->add_control(
			'outer_class',
			[
				'label' => esc_html__( 'Outer Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'outer svelte-70iorf',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div style="<?php echo esc_attr($settings['container_style']); ?>">
			<div class="<?php echo esc_attr($settings['webgl_container_class']); ?>">
				<canvas width="2666" height="1262" style="<?php echo esc_attr($settings['canvas_style']); ?>"></canvas>
			</div>

			<div class="<?php echo esc_attr($settings['home_class']); ?>" style="<?php echo esc_attr($settings['home_style']); ?>">
				<div class="<?php echo esc_attr($settings['typewriter_class']); ?>">
					<div class="<?php echo esc_attr($settings['greeting_class']); ?>" data-elementor-setting-key="greeting">
						<?php
						$greeting = $settings['greeting'];
						for ($i = 0; $i < mb_strlen($greeting, 'UTF-8'); $i++) {
							echo '<span style="opacity: 1;">' . esc_html(mb_substr($greeting, $i, 1, 'UTF-8')) . '</span>';
						}
						?>
						<span class="cursor svelte-1my3x9z blink"></span>
					</div>
				</div>

				<div class="<?php echo esc_attr($settings['description_class']); ?>">
					<div class="description_line svelte-hipe91" data-elementor-setting-key="description_prefix"><?php echo esc_html( $settings['description_prefix'] ); ?></div>
					<div class="description_anim_container svelte-hipe91">
						<div class="description_anim svelte-hipe91" data-elementor-setting-key="industries">
							<?php echo esc_html( $settings['industries'][0]['industry'] ); ?>
						</div>
					</div>
				</div>

				<div class="home_cta D9 svelte-hipe91">
					<div class="button svelte-9mb1te">
						<div class="border svelte-9mb1te">
							<div class="border svelte-dtzj9">
								<svg fill="none" xmlns="http://www.w3.org/2000/svg" class="svelte-dtzj9" width="142" height="60" viewBox="0 0 142 60">
									<rect x="1.5" y="1.5" stroke-width="3" stroke-linecap="round" stroke="white" width="139" height="57" rx="8" style="stroke-dashoffset: 22.5664px; stroke-dasharray: 32.5664px, 345.701px;"></rect>
									<rect x="1.5" y="1.5" stroke-width="3" stroke-linecap="round" stroke="white" width="139" height="57" rx="8" style="stroke-dashoffset: -166.567px; stroke-dasharray: 32.5664px, 345.701px;"></rect>
									<rect x="1.5" y="1.5" stroke-width="1" stroke-linecap="round" stroke="rgba(255, 255, 255, 0.3)" width="139" height="57" rx="8" style="stroke-dashoffset: -20px; stroke-dasharray: 136.567px, 241.7px;"></rect>
									<rect x="1.5" y="1.5" stroke-width="1" stroke-linecap="round" stroke="rgba(255, 255, 255, 0.3)" width="139" height="57" rx="8" style="stroke-dasharray: 136.567px, 241.7px; stroke-dashoffset: 547.401px;"></rect>
								</svg>
							</div>
						</div>
						<div class="text svelte-9mb1te" data-elementor-setting-key="cta_text"><?php echo esc_html( $settings['cta_text'] ); ?></div>
					</div>
				</div>
			</div>

			<div class="<?php echo esc_attr($settings['scroll_class']); ?>">
				<svg class="scroll_icon svelte-hipe91" width="17" height="28" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="0.5" y="0.5" width="16" height="27" rx="8" stroke="white" class="svelte-hipe91"></rect>
					<circle cx="8.5" cy="9.5" r="2.5" fill="white" class="svelte-hipe91"></circle>
					<rect opacity="0.6" x="7" y="10" width="3" height="9" fill="white" fill-opacity="0.3" class="svelte-hipe91"></rect>
				</svg>
				<div class="scroll_text D8 svelte-hipe91" data-elementor-setting-key="scroll_text"><?php echo esc_html( $settings['scroll_text'] ); ?></div>
			</div>

			<div class="<?php echo esc_attr($settings['scroller_class']); ?>"><div class="scroll_content svelte-ofep1b" style="height: 110%;"></div></div>
			<div class="<?php echo esc_attr($settings['outer_class']); ?>" style="opacity: 0;"><div class="inner svelte-70iorf" style="transform: translateX(-100%);"></div></div>
		</div>
		<?php
	}
}
