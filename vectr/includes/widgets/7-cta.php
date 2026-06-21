<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Vectr_Widget_7_cta extends \Elementor\Widget_Base {

	public function get_name() {
		return '7-cta';
	}

	public function get_title() {
		return esc_html__( '7-cta', 'vectr' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
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
				'default' => '<span>Staff your outage with fast response, </span><span>and crews you can rely on.</span>',
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Request Crews',
			]
		);

		$this->add_control(
			'btn_url',
			[
				'label' => esc_html__( 'Button URL', 'vectr' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '/request-crew' ],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="cta-section">
			<h2 class="cta-section__title"><?php echo $settings['title']; ?></h2>
			<div class="flx">
				<a href="<?php echo esc_url( $settings['btn_url']['url'] ); ?>" class="pill-btn pill-btn--light"><span class="pill-btn-span"><?php echo esc_html( $settings['btn_text'] ); ?></span></a>
			</div>
		</section>
		<?php
	}
}
