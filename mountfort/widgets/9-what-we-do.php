<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MountFort_Widget_9_What_We_Do extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mountfort_what_we_do';
	}

	public function get_title() {
		return esc_html__( '9-What We Do', 'mountfort' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
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
				'default' => 'We provide energy solutions with integrity and efficiency through our different business divisions.',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p>Montfort\'s interlinked divisions complement each other, providing integrated services that leverage their combined expertise. This synergy enhances our operational efficiency, enabling us to drive collective success in the global market and deliver exceptional value to our stakeholders.</p>',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'index', [ 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'division_title', [ 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'division_heading', [ 'type' => \Elementor\Controls_Manager::TEXTAREA ] );
		$repeater->add_control( 'link_text', [ 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'link_url', [ 'type' => \Elementor\Controls_Manager::URL ] );
		$repeater->add_control( 'grid_row', [ 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 2 ] );

		$this->add_control(
			'divisions',
			[
				'label' => esc_html__( 'Divisions', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'index' => '1', 'division_title' => 'Montfort Trading', 'division_heading' => 'Operating Efficiently by Leading with Innovation.', 'link_text' => 'Montfort Trading', 'link_url' => [ 'url' => '/trading/' ], 'grid_row' => 2 ],
					[ 'index' => '2', 'division_title' => 'Montfort Capital', 'division_heading' => 'Identify and seize opportunities that maximise Value', 'link_text' => 'Montfort Capital', 'link_url' => [ 'url' => '/capital/' ], 'grid_row' => 3 ],
					[ 'index' => '3', 'division_title' => 'Montfort Maritime', 'division_heading' => 'Powering Progress, Delivering Energy.', 'link_text' => 'Montfort Maritime', 'link_url' => [ 'url' => '/maritime/' ], 'grid_row' => 4 ],
					[ 'index' => '4', 'division_title' => 'Fort Energy', 'division_heading' => 'Advancing Innovation in Energy Investments', 'link_text' => 'Fort Energy', 'link_url' => [ 'url' => '/fort-energy/' ], 'grid_row' => 5 ],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="astro-zdjhxtfb" data-chapter="WhatWeDo" id="WhatWeDo" data-label="What we do" data-astro-cid-zdjhxtfb="" style="--overflow: 212px;">
			<div class="grid" data-astro-cid-zdjhxtfb="">
				<h2 data-animation="Title" class="fs-h2 uppercase tb:col-end-4 dk:col-start-5 dk:col-end-19 lg:col-start-7 lg:col-end-17" data-astro-cid-zdjhxtfb="">
					<?php echo esc_html($settings['title']); ?>
				</h2>
				<div class="read-more expandable tb:col-start-2 dk:col-start-14 dk:col-end-22 lg:col-start-15 lg:col-end-21" data-animation="ReadMore" data-line-count="4" data-astro-cid-mer3b7za="" style="--line-count: 4;">
					<div class="content-wrapper" data-astro-cid-mer3b7za="" style="--line-count: 4;">
						<div data-astro-cid-mer3b7za="" style="--line-count: 4;">
							<div class="content" data-astro-cid-mer3b7za="" style="">
								<div class="inner clamp fs-body montfort-navy-blue" data-astro-cid-mer3b7za="" style="--line-count: 4;">
									<?php echo wp_kses_post($settings['description']); ?>
								</div>
							</div>
							<button class="read-more-button secondary" data-animation="FadeIn" aria-label="Expand text button" data-astro-cid-pgfm4fb2="">
								<div class="arrow" aria-hidden="true" data-astro-cid-pgfm4fb2=""></div>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="grid divisions-container" data-astro-cid-zdjhxtfb="">
				<?php foreach ( $settings['divisions'] as $index => $division ) :
					$col_class = ( ($index % 2) == 0 ) ? 'tb:col-start-1 tb:col-end-4 dk:col-start-5 dk:col-end-18 lg:col-start-7 lg:col-end-14' : 'tb:col-start-2 tb:col-end-5 dk:col-start-12 dk:col-end-24 lg:col-start-16 lg:col-end-23';
					?>
					<div class="division-link-ship <?php echo esc_attr($col_class); ?>" style="grid-row: <?php echo esc_attr($division['grid_row']); ?>;" data-astro-cid-r7rfymor="">
						<div class="division-index white" data-animation="FadeIn" data-astro-cid-r7rfymor="">
							<span class="fs-label" data-astro-cid-r7rfymor=""><?php echo esc_html($division['index']); ?></span>
						</div>
						<div class="division-content" data-astro-cid-r7rfymor="">
							<h3 class="fs-h4 white" data-animation="FadeIn" data-astro-cid-r7rfymor=""><?php echo esc_html($division['division_title']); ?></h3>
							<h4 class="fs-h3 white" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-r7rfymor=""><?php echo esc_html($division['division_heading']); ?></h4>
							<a href="<?php echo esc_url($division['link_url']['url']); ?>" class="link-block white" data-animation="FadeIn" data-astro-cid-chamlvsj="true">
								<div class="arrow-wrapper left" data-astro-cid-chamlvsj="">
									<div class="arrow-container left" data-astro-cid-chamlvsj="">
										<svg data-astro-cid-chamlvsj="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true"><path fill="currentColor" d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path></svg>
									</div>
								</div>
								<span class="link-block-label" data-astro-cid-chamlvsj=""><?php echo esc_html($division['link_text']); ?></span>
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
