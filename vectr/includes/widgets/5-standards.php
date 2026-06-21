<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Vectr_Widget_5_standards extends \Elementor\Widget_Base {

	public function get_name() {
		return '5-standards';
	}

	public function get_title() {
		return esc_html__( '5-standards', 'vectr' );
	}

	public function get_icon() {
		return 'eicon-image-box';
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
				'default' => '<span>Nuclear-grade </span><span>standards across </span><span>every site.</span>',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Modeled on nuclear-grade environments, our process enforces badge compliance, protected timelines and zero-error tolerance.',
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Explore our industries',
			]
		);

		$this->add_control(
			'btn_url',
			[
				'label' => esc_html__( 'Button URL', 'vectr' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '/industries' ],
			]
		);

		$this->add_control(
			'image_url',
			[
				'label' => esc_html__( 'Image URL', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '/_astro/apply-door.CA6YLUcA_Z12L5fE.png',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="standards">
			<div class="standards__container">
				<div class="standards__image">
					<picture>
						<source srcset="/_astro/apply-door.CA6YLUcA_HnYyn.avif 360w, /_astro/apply-door.CA6YLUcA_ZmDXJs.avif 720w, /_astro/apply-door.CA6YLUcA_Z1Wri67.avif 800w" type="image/avif" sizes="(max-width: 820px) 100vw, 800px">
						<source srcset="/_astro/apply-door.CA6YLUcA_GOkXG.webp 360w, /_astro/apply-door.CA6YLUcA_ZndCk9.webp 720w, /_astro/apply-door.CA6YLUcA_Z1X0VFN.webp 800w" type="image/webp" sizes="(max-width: 820px) 100vw, 800px">
						<img src="<?php echo esc_url( $settings['image_url'] ); ?>" srcset="/_astro/apply-door.CA6YLUcA_1C4coP.png 360w, /_astro/apply-door.CA6YLUcA_x1e60.png 720w, <?php echo esc_url( $settings['image_url'] ); ?> 800w" alt="Workers in safety vests coordinating at industrial site" loading="lazy" decoding="async" sizes="(max-width: 820px) 100vw, 800px" width="800" height="400">
					</picture>
				</div>
				<div class="standards__content">
					<h2 class="standards__title"><?php echo $settings['title']; ?></h2>
					<p class="standards__description"><?php echo esc_html( $settings['description'] ); ?></p>
					<div class="flx">
						<a href="<?php echo esc_url( $settings['btn_url']['url'] ); ?>" class="pill-btn pill-btn--dark"><span class="pill-btn-span"><?php echo esc_html( $settings['btn_text'] ); ?></span></a>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
