<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test2_Hero_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'test2_hero';
	}

	public function get_title() {
		return esc_html__( '2-Hero', 'test2' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'general' ];
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
			'title_aria_label',
			[
				'label' => esc_html__( 'Title ARIA Label', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'The next waveof venture capital',
			]
		);

		$this->add_control(
			'title_html',
			[
				'label' => esc_html__( 'Title HTML (for animations)', 'test2' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: left;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.08s;">T</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.12s;">h</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.16s;">e</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.04s;">n</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.36s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.4s;">x</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.32s;">t</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.28s;">w</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.24s;">v</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.2s;">e</div></div><div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: left;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.18s;">o</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.3s;">f</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.34s;">v</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.38s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.26s;">n</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.1s;">t</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.14s;">u</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.22s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.58s;">e</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.46s;">c</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.66s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.7s;">p</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.42s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.5s;">t</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.54s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.62s;">l</div></div>',
			]
		);

		$this->add_control(
			'scroll_label',
			[
				'label' => esc_html__( 'Scroll Label', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Scroll down to discover more',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="home-hero gutters fixed-section" style="opacity: 0; visibility: hidden;">
			<h1 class="portable-text text-splitter--splitted text-splitter home-hero__title">
				<p aria-label="<?php echo esc_attr($settings['title_aria_label']); ?>">
					<?php echo $settings['title_html']; ?>
				</p>
			</h1>
			<button class="home-hero__btn btn-label ttu">
				<span class="home-hero__btn-label"><?php echo esc_html( $settings['scroll_label'] ); ?></span>
				<span class="home-hero__btn-line"></span>
			</button>
		</div>
		<?php
	}
}
