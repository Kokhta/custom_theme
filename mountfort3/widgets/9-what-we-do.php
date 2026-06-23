<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class What_We_Do_Widget extends Widget_Base {

	public function get_name() {
		return '9-what-we-do';
	}

	public function get_title() {
		return '9. What We Do';
	}

	public function get_icon() {
		return 'eicon-cog';
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
			'title_html',
			array(
				'label'   => 'Title HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div style="display: block; text-align: start; position: relative;">We provide energy solutions with integrity and efficiency through our different business divisions.</div>',
			)
		);

		$this->add_control(
			'read_more_text',
			array(
				'label'   => 'Read More Text',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => 'Montfort\'s interlinked divisions complement each other, providing integrated services that leverage their combined expertise.',
			)
		);

		$repeater = new Repeater();
		$repeater->add_control( 'index', array( 'label' => 'Index', 'type' => Controls_Manager::TEXT ) );
		$repeater->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT ) );
		$repeater->add_control( 'desc_html', array( 'label' => 'Description HTML', 'type' => Controls_Manager::WYSIWYG ) );
		$repeater->add_control( 'link_text', array( 'label' => 'Link Text', 'type' => Controls_Manager::TEXT ) );
		$repeater->add_control( 'link_url', array( 'label' => 'Link URL', 'type' => Controls_Manager::URL ) );
		$repeater->add_control( 'grid_row', array( 'label' => 'Grid Row', 'type' => Controls_Manager::NUMBER, 'default' => 2 ) );
		$repeater->add_control( 'col_classes', array( 'label' => 'Column Classes', 'type' => Controls_Manager::TEXT, 'default' => 'tb:col-start-1 tb:col-end-4 dk:col-start-5 dk:col-end-18 lg:col-start-7 lg:col-end-14' ) );

		$this->add_control(
			'divisions',
			array(
				'label'       => 'Divisions',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'index'       => '1',
						'title'       => 'Montfort Trading',
						'desc_html'   => '<div style="display: block; text-align: start; position: relative;">Operating Efficiently by Leading with Innovation.</div>',
						'link_text'   => 'Montfort Trading',
						'link_url'    => array( 'url' => '/trading/' ),
						'grid_row'    => 2,
						'col_classes' => 'tb:col-start-1 tb:col-end-4 dk:col-start-5 dk:col-end-18 lg:col-start-7 lg:col-end-14',
					),
					array(
						'index'       => '2',
						'title'       => 'Montfort Capital',
						'desc_html'   => '<div style="display: block; text-align: start; position: relative;">Identify and seize opportunities that maximize Value.</div>',
						'link_text'   => 'Montfort Capital',
						'link_url'    => array( 'url' => '/capital/' ),
						'grid_row'    => 3,
						'col_classes' => 'tb:col-start-2 tb:col-end-5 dk:col-start-12 dk:col-end-24 lg:col-start-16 lg:col-end-23',
					),
				),
				'title_field' => '{{{ title }}}',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="astro-zdjhxtfb" data-chapter="WhatWeDo" id="WhatWeDo" data-label="What we do" data-astro-cid-zdjhxtfb="" style="--overflow: 250px;">
			<div class="grid" data-astro-cid-zdjhxtfb="">
				<h2 data-animation="Title" class="fs-h2 uppercase tb:col-end-4 dk:col-start-5 dk:col-end-19 lg:col-start-7 lg:col-end-17" data-astro-cid-zdjhxtfb="">
					<?php echo $settings['title_html']; ?>
				</h2>
				<div class="read-more expandable tb:col-start-2 dk:col-start-14 dk:col-end-22 lg:col-start-15 lg:col-end-21" data-animation="ReadMore" data-line-count="4" data-astro-cid-mer3b7za="" style="--line-count: 4; translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
					<div class="content-wrapper" data-astro-cid-mer3b7za="" style="--line-count: 4;">
						<div data-astro-cid-mer3b7za="" style="--line-count: 4;">
							<div class="content" data-astro-cid-mer3b7za="">
								<div class="inner clamp fs-body montfort-navy-blue" data-astro-cid-mer3b7za="" style="--line-count: 4;">
									<p class="fs-s1" data-astro-cid-zdjhxtfb=""><?php echo wp_kses_post( $settings['read_more_text'] ); ?></p>
								</div>
							</div>
							<button class="read-more-button secondary" data-animation="FadeIn" aria-label="Expand text button" data-astro-cid-pgfm4fb2="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
								<div class="arrow" aria-hidden="true" data-astro-cid-pgfm4fb2=""></div>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="grid divisions-container" data-astro-cid-zdjhxtfb="">
				<?php foreach ( $settings['divisions'] as $division ) : ?>
					<div class="division-link-ship <?php echo esc_attr( $division['col_classes'] ); ?>" style="grid-row: <?php echo esc_attr( $division['grid_row'] ); ?>;" data-astro-cid-r7rfymor="">
						<div class="division-index white" data-animation="FadeIn" data-astro-cid-r7rfymor="" style="translate: none; rotate: none; scale: none; transform: translate3d(-87px, 0px, 0px) rotate(45deg); opacity: 1;">
							<span class="fs-label" data-astro-cid-r7rfymor=""><?php echo esc_html( $division['index'] ); ?></span>
						</div>
						<div class="division-content" data-astro-cid-r7rfymor="">
							<h3 class="fs-h4 white" data-animation="FadeIn" data-astro-cid-r7rfymor="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;"><?php echo esc_html( $division['title'] ); ?></h3>
							<h4 class="fs-h3 white" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-r7rfymor="">
								<?php echo $division['desc_html']; ?>
							</h4>
							<a href="<?php echo esc_url( $division['link_url']['url'] ); ?>" class="link-block white" data-animation="FadeIn" data-astro-cid-chamlvsj="true" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
								<div class="arrow-wrapper left" data-astro-cid-chamlvsj="">
									<div class="arrow-container left" data-astro-cid-chamlvsj="">
										<svg data-astro-cid-chamlvsj="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true"><path fill="currentColor" d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path></svg>
									</div>
								</div>
								<span class="link-block-label" data-astro-cid-chamlvsj=""><?php echo esc_html( $division['link_text'] ); ?></span>
								<div class="arrow-wrapper right" data-astro-cid-chamlvsj="">
									<div class="arrow-container right" data-astro-cid-chamlvsj="">
										<svg data-astro-cid-chamlvsj="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true"><path fill="currentColor" d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path></svg>
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
