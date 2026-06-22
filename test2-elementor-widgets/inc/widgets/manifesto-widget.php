<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test2_Manifesto_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'test2_manifesto';
	}

	public function get_title() {
		return esc_html__( '3-Manifesto', 'test2' );
	}

	public function get_icon() {
		return 'eicon-text-area';
	}

	public function get_categories() {
		return [ 'test2-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'test2' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_id',
			[
				'label' => esc_html__( 'Section ID', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '//01',
			]
		);

		$this->add_control(
			'section_name',
			[
				'label' => esc_html__( 'Section Name', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Manifesto',
			]
		);

		$this->add_control(
			'title_html',
			[
				'label' => esc_html__( 'Title HTML', 'test2' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p aria-label="Capital with"><div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: start;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.08s;">C</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.04s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0s;">p</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.12s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.16s;">t</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.24s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.2s;">l</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.28s;">w</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.4s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.36s;">t</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.32s;">h</div></div></p><p aria-label="conviction"><div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: right;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.18s;">c</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.3s;">o</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.14s;">n</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.26s;">v</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.22s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.1s;">c</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.38s;">t</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.34s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.46s;">o</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.42s;">n</div></div></p>',
			]
		);

		$this->add_control(
			'copy_aria_label',
			[
				'label' => esc_html__( 'Copy ARIA Label', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Hashgraph Ventures is an early-stage VC fund at the intersection of blockchain infrastructure and AI — pre-seed through Series A. We believe decentralised infrastructure and AI-native applications will rewire how value, data, and trust move across the world. We don\'t wait for consensus. We move with speed and clarity.',
			]
		);

		$this->add_control(
			'copy_html',
			[
				'label' => esc_html__( 'Copy HTML', 'test2' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.1s;">Hashgraph Ventures is an early-stage VC </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.2s;">fund at the intersection of blockchain </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.3s;">infrastructure and AI — pre-seed through </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.4s;">Series A. We believe decentralised </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.5s;">infrastructure and AI-native applications will </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.6s;">rewire how value, data, and trust move </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.7s;">across the world. We don\'t wait for </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.8s;">consensus. We move with speed and clarity. </div>',
			]
		);

		$this->add_control(
			'back_btn_label',
			[
				'label' => esc_html__( 'Back Button Label', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Back to homepage',
			]
		);

		$this->add_control(
			'read_more_label',
			[
				'label' => esc_html__( 'Read More Label', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Read more',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		test2_mark_widget_used();
		$settings = $this->get_settings_for_display();
		?>
		<div class="home-investors grid fixed-section" style="opacity: 0; visibility: hidden;">
			<div class="home-investors__wrapper">
				<h2 class="portable-text text-splitter--splitted text-splitter home-investors__title h1">
					<?php echo $settings['title_html']; ?>
				</h2>
				<div class="home-investors__copy-wrapper">
					<p class="home-investors__copy body-copy">
						<span class="text-splitter--splitted text-splitter" aria-label="<?php echo esc_attr($settings['copy_aria_label']); ?>">
							<?php echo $settings['copy_html']; ?>
						</span>
					</p>
					<div class="home-investors__copy-cta">
						<button class="btn ff-detail ttu">
							<span class="btn__wrapper oh"><span class="btn__label btn__label--base"><?php echo esc_html($settings['back_btn_label']); ?></span></span>
							<svg class="btn__svg" fill="none" aria-hidden="true"><rect x="0.5" y="0.5" height="31" rx="5" ry="5" stroke="url(#btnBorderGrad)" width="174" style="stroke-dashoffset: 0px; stroke-dasharray: 180.972px, 4px, 196.709px, 4px;"></rect></svg>
						</button>
					</div>
				</div>
			</div>
			<div class="home-investors__cta">
				<button class="btn--small btn ff-detail ttu">
					<span class="btn__wrapper oh"><span class="btn__label btn__label--base"><?php echo esc_html($settings['read_more_label']); ?></span></span>
					<svg class="btn__svg" fill="none" aria-hidden="true"><rect x="0.5" y="0.5" height="31" rx="5" ry="5" stroke="url(#btnBorderGrad)" width="105.51666259765625" style="stroke-dashoffset: 0px; stroke-dasharray: 112.197px, 4px, 128.225px, 4px;"></rect></svg>
				</button>
			</div>
			<div class="section-title btn-label ttu"><span class="section-title__id"><?php echo esc_html($settings['section_id']); ?></span> <?php echo esc_html($settings['section_name']); ?></div>
		</div>
		<?php
	}
}
