<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Vectr_Widget_2_hero extends \Elementor\Widget_Base {

	public function get_name() {
		return '2-hero';
	}

	public function get_title() {
		return esc_html__( '2-hero', 'vectr' );
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
				'label' => esc_html__( 'Content', 'vectr' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '<span>The New Standard </span><span>in Staffing</span>',
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '<span>AI driven speed. Expert curation.<br class="sp"></span><span>We mobilize verified crews to protect your schedule and your bottom line in high-consequence environments.</span>',
			]
		);

		$this->add_control(
			'scroll_text',
			[
				'label' => esc_html__( 'Scroll Button Text', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'scroll to discover our process',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="hero show hide">
			<div class="hero__content">
				<h1 class="hero__title" style="transition: none; translate: none; rotate: none; scale: none; transform: perspective(1000px) translate(-50%, 0%) translate(222.2px, -120px) rotateY(-60deg) rotateX(-35deg); opacity: 0;">
					<?php echo $settings['title']; ?>
				</h1>
				<p class="hero__subtitle" style="transition: none; translate: none; rotate: none; scale: none; transform: perspective(1000px) translate(-50%, 0%) translate(222.2px, -200px) rotateY(-60deg) rotateX(-35deg); opacity: 0;">
					<?php echo $settings['subtitle']; ?>
				</p>
			</div>
			<div class="hero__scroll-btn"><span><span class="hsbtn-in" style=""><?php echo esc_html( $settings['scroll_text'] ); ?></span></span></div>
		</section>
		<div class="hero-spacer"></div>
		<?php
	}
}
