<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Equality_Widget extends Widget_Base {

	public function get_name() {
		return '13-equality';
	}

	public function get_title() {
		return '13. Equality';
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return array( 'mountfort' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => 'Content',
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'index_num',
			array(
				'label'   => 'Index Number',
				'type'    => Controls_Manager::TEXT,
				'default' => '3',
			)
		);

		$this->add_control(
			'title_html',
			array(
				'label'   => 'Title HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div style="display: block; text-align: start; position: relative;">OUR COMMITMENT TO EQUALITY</div>',
			)
		);

		$this->add_control(
			'desc_left_html',
			array(
				'label'   => 'Left Description HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div style="display: block; text-align: start; position: relative;">We strive to create an environment where everyone can thrive and contribute to our success.</div>',
			)
		);

		$this->add_control(
			'desc_right_html',
			array(
				'label'   => 'Right Description HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div style="display: block; text-align: start; position: relative;">We are proud that our staff come from almost 27 nationalities across five continents. We are committed to equality, with over 35% of our global team being female.</div>',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section data-chapter="Equality" id="Equality" data-label="Equality" class="section-equality grid" data-astro-cid-rvf7guv4="">
			<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
				<?php echo esc_html( $settings['index_num'] ); ?>
			</div>
			<div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs=""></div>
			<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs="">
				<?php echo $settings['title_html']; ?>
			</h2>
			<div class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-rvf7guv4="">
				<?php echo $settings['desc_left_html']; ?>
			</div>
			<div class="second-description fs-body white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-rvf7guv4="">
				<?php echo $settings['desc_right_html']; ?>
			</div>
		</section>
		<?php
	}
}
