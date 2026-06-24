<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MountFort_Widget_13_Equality extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mountfort_equality';
	}

	public function get_title() {
		return esc_html__( '13-Equality', 'mountfort' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'mountfort' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'OUR COMMITMENT TO EQUALITY',
			]
		);

		$this->add_control(
			'description_1',
			[
				'label' => esc_html__( 'Description 1', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We strive to create an environment where everyone can thrive and contribute to our success.',
			]
		);

		$this->add_control(
			'description_2',
			[
				'label' => esc_html__( 'Description 2', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We are proud that our staff come from almost 27 nationalities across five continents. We are committed to equality, with over 35% of our global team being female. We are proud to share that over 22% of our management team are women, reflecting our dedication to empowering women in leadership.',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section data-chapter="Equality" id="Equality" data-label="Equality" class="section-equality grid" data-astro-cid-rvf7guv4="">
			<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs=""> 3 </div>
			<div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs="" style=""></div>
			<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs="">
				<?php echo esc_html($settings['title']); ?>
			</h2>
			<div class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-rvf7guv4="">
				<?php echo esc_html($settings['description_1']); ?>
			</div>
			<div class="second-description fs-body white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-rvf7guv4="">
				<?php echo esc_html($settings['description_2']); ?>
			</div>
		</section>
		<?php
	}
}
