<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Sustainability_Widget extends Widget_Base {

	public function get_name() {
		return '11-sustainability';
	}

	public function get_title() {
		return '11. Sustainability';
	}

	public function get_icon() {
		return 'eicon-leaf';
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
			'top_desc_html',
			array(
				'label'   => 'Top Description HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div style="display: block; text-align: start; position: relative;">We are committed to integrating our sustainability strategy with our pursuit of value — powering lives and respecting nature. We recognize the profound and lasting impact our decisions have on people, communities, and the environment.</div>',
			)
		);

		$this->add_control(
			'index_num',
			array(
				'label'   => 'Index Number',
				'type'    => Controls_Manager::TEXT,
				'default' => '1',
			)
		);

		$this->add_control(
			'title_html',
			array(
				'label'   => 'Title HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div style="display: block; text-align: start; position: relative;"><div style="position:relative;display:inline-block;"> <div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">O</div><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">u</div><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">r</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">e</div><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">t</div><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">h</div><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">i</div><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">c</div><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">s</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">a</div><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">n</div><div style="position: relative; display: inline-block; color: rgba(255, 255, 255, 0.3);">d</div></div> </div>',
			)
		);

		$this->add_control(
			'side_desc',
			array(
				'label'   => 'Side Description',
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'At Montfort, we operate under an integrated Sustainability Framework and adhere to strict corporate governance principles that allow us drive transformative social and environmental progress.',
			)
		);

		$repeater = new Repeater();
		$repeater->add_control( 'text', array( 'label' => 'Paragraph Text', 'type' => Controls_Manager::TEXTAREA ) );

		$this->add_control(
			'paragraphs',
			array(
				'label'       => 'Paragraphs',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array( 'text' => 'We ensure compliance with all applicable laws and regulations across our global operations.' ),
					array( 'text' => 'Prior to engaging with any counterparty, a thorough and rigorous external onboarding process is conducted.' ),
				),
				'title_field' => '{{{ text.substring(0, 50) }}}...',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-chapter="Sustainability" id="Sustainability" data-label="Sustainability" data-theme-chapters="dark">
			<section class="grid section-sustainability" data-astro-cid-arf6gcv7="">
				<p class="fs-h5 white dk:col-start-3 dk:col-end-14 lg:col-start-7 lg:col-end-14" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-arf6gcv7="">
					<?php echo $settings['top_desc_html']; ?>
				</p>
				<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
					<?php echo esc_html( $settings['index_num'] ); ?>
				</div>
				<div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs=""></div>
				<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs="">
					<?php echo $settings['title_html']; ?>
				</h2>
				<p class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-animation="FadeIn" data-animation-color="#ffffff" data-astro-cid-arf6gcv7="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
					<?php echo esc_html( $settings['side_desc'] ); ?>
				</p>
				<div class="paragraphs-container dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-astro-cid-arf6gcv7="">
					<?php foreach ( $settings['paragraphs'] as $para ) : ?>
						<p class="fs-body white" data-animation="FadeIn" data-animation-color="#ffffff" data-astro-cid-arf6gcv7="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
							<?php echo esc_html( $para['text'] ); ?>
						</p>
					<?php endforeach; ?>
				</div>
			</section>
		</div>
		<?php
	}
}
