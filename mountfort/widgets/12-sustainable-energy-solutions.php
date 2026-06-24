<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MountFort_Widget_12_Sustainable_Energy_Solutions extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mountfort_sustainable_energy_solutions';
	}

	public function get_title() {
		return esc_html__( '12-Sustainable Energy Solutions', 'mountfort' );
	}

	public function get_icon() {
		return 'eicon-battery-charging';
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

		$this->add_control( 'section_id', [ 'label' => 'Section ID', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'WhatWeDo' ] );
		$this->add_control( 'section_class', [ 'label' => 'Section Class', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'section-solutions' ] );

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'DELIVERING SUSTAINABLE ENERGY SOLUTIONS',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p>We are dedicated to fostering a future where energy is both sustainable and accessible. Our strategy includes innovative practices to reduce environmental impact and promote renewable energy sources. By connecting people, ingenuity, and resources with a shared vision of value and prosperity, we aim to create a resilient energy ecosystem. This includes optimizing supply chains, investing in clean energy projects, and adhering to high environmental standards. Through these efforts, we drive sustainable growth and positively impact the global energy landscape.</p>',
			]
		);

		$this->end_controls_section();

		// Tabs Content
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => esc_html__( 'Tabs', 'mountfort' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Environmental Tab
		$this->add_control( 'env_label', [ 'label' => 'Environmental Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Environmental' ] );
		$this->add_control( 'env_text', [ 'label' => 'Environmental Intro', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Reducing our impact on the environment is paramount to our business. Our environmental policies and culture focus on:' ] );

		$env_repeater = new \Elementor\Repeater();
		$env_repeater->add_control( 'item_label', [ 'type' => \Elementor\Controls_Manager::TEXT ] );
		$env_repeater->add_control( 'item_svg', [ 'type' => \Elementor\Controls_Manager::RAW_HTML, 'label' => 'SVG Code' ] );

		$this->add_control( 'env_items', [
			'label' => 'Environmental Items',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $env_repeater->get_controls(),
			'default' => [
				[ 'item_label' => 'Clean Energy' ],
				[ 'item_label' => 'Reduced Resource Usage' ],
				[ 'item_label' => 'Climate Change' ],
				[ 'item_label' => 'Carbon Emissions' ],
				[ 'item_label' => 'Carbon Reduction/Offsets' ],
			]
		]);

		// Social Tab
		$this->add_control( 'soc_label', [ 'label' => 'Social Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Social' ] );
		$this->add_control( 'soc_text', [ 'label' => 'Social Intro', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Our impact on society starts with our employees and extends to our vast network of customers, partners, and stakeholders. We place tremendous importance on:' ] );

		$this->add_control( 'soc_items', [
			'label' => 'Social Items',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $env_repeater->get_controls(),
			'default' => [
				[ 'item_label' => 'Diversified Workforce' ],
				[ 'item_label' => 'Health, Safety and Security' ],
				[ 'item_label' => 'Human Rights and Labor Practices' ],
				[ 'item_label' => 'Community Impact' ],
				[ 'item_label' => 'Supply Chain Standards' ],
			]
		]);

		// Governance Tab
		$this->add_control( 'gov_label', [ 'label' => 'Governance Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Governance' ] );
		$this->add_control( 'gov_text', [ 'label' => 'Governance Intro', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Good governance is good business. We set the highest compliance standards, maintain strict policies and procedures, and adhere to international regulations. Our governance structure is supported by:' ] );

		$this->add_control( 'gov_items', [
			'label' => 'Governance Items',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $env_repeater->get_controls(),
			'default' => [
				[ 'item_label' => 'Corporate Governance Framework, supported by a centralized policy hub' ],
				[ 'item_label' => 'Code of Ethics' ],
				[ 'item_label' => 'Ethics and compliance oversight' ],
				[ 'item_label' => 'Multiple board and management committees to provide strategic oversight' ],
				[ 'item_label' => 'Risk Management Framework' ],
				[ 'item_label' => 'Stringent and digitized onboarding process' ],
				[ 'item_label' => 'Initial onboarding and annual refresher compliance trainings' ],
			]
		]);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="<?php echo esc_attr($settings['section_class']); ?>" id="<?php echo esc_attr($settings['section_id']); ?>" data-astro-cid-odekpglu="" style="--overflow: 20px;">
			<div class="grid" data-astro-cid-odekpglu="">
				<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs=""> 2 </div>
				<div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs="" style=""></div>
				<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs="">
					<?php echo esc_html($settings['title']); ?>
				</h2>
			</div>
			<div class="grid-no-margin" data-astro-cid-odekpglu="">
				<div class="description fs-s1 white dk:col-start-4 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-astro-cid-odekpglu="">
					<div class="read-more expandable" data-animation="ReadMore" data-line-count="7" data-no-margin="true" data-astro-cid-mer3b7za="" style="--line-count: 7;">
						<div class="content-wrapper" data-astro-cid-mer3b7za="" style="--line-count: 7;">
							<div data-astro-cid-mer3b7za="" style="--line-count: 7;">
								<div class="content" data-astro-cid-mer3b7za="" style="">
									<div class="inner clamp fs-body white" data-astro-cid-mer3b7za="" style="--line-count: 7;">
										<?php echo wp_kses_post($settings['description']); ?>
									</div>
								</div>
								<button class="read-more-button grey" data-animation="FadeIn" aria-label="Expand text button" data-astro-cid-pgfm4fb2="">
									<div class="arrow" aria-hidden="true" data-astro-cid-pgfm4fb2=""></div>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="solutions-container dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-astro-cid-odekpglu="">
					<div class="navigation-container" data-astro-cid-odekpglu="">
						<button class="navigation-item fs-label white active" data-astro-cid-odekpglu=""><?php echo esc_html($settings['env_label']); ?></button>
						<button class="navigation-item fs-label white" data-astro-cid-odekpglu=""><?php echo esc_html($settings['soc_label']); ?></button>
						<button class="navigation-item fs-label white" data-astro-cid-odekpglu=""><?php echo esc_html($settings['gov_label']); ?></button>
					</div>
					<div class="content-container" id="solutions-content" data-astro-cid-odekpglu="">
						<!-- Tab 1: Environmental -->
						<div class="content-item active" data-astro-cid-odekpglu="" style="opacity: 1; pointer-events: auto;">
							<p class="fs-body white" data-animation="SplitBlock" data-astro-cid-odekpglu=""><?php echo esc_html($settings['env_text']); ?></p>
							<div class="items-container" data-astro-cid-odekpglu="">
								<?php foreach ($settings['env_items'] as $item): ?>
								<div class="item-container" data-animation="FadeIn" data-astro-cid-odekpglu="" style="opacity: 1;">
									<div class="image-container" data-astro-cid-odekpglu="">
										<?php echo $item['item_svg']; // RAW HTML for SVG ?>
									</div>
									<p class="fs-body-s white" data-astro-cid-odekpglu=""><?php echo esc_html($item['item_label']); ?></p>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<!-- Tab 2: Social -->
						<div class="content-item" data-astro-cid-odekpglu="" style="opacity: 0; pointer-events: none;">
							<p class="fs-body white" data-animation="SplitBlock" data-astro-cid-odekpglu=""><?php echo esc_html($settings['soc_text']); ?></p>
							<div class="items-container" data-astro-cid-odekpglu="">
								<?php foreach ($settings['soc_items'] as $item): ?>
								<div class="item-container" data-animation="FadeIn" data-astro-cid-odekpglu="">
									<div class="image-container" data-astro-cid-odekpglu="">
										<?php echo $item['item_svg']; ?>
									</div>
									<p class="fs-body-s white" data-astro-cid-odekpglu=""><?php echo esc_html($item['item_label']); ?></p>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<!-- Tab 3: Governance -->
						<div class="content-item" data-astro-cid-odekpglu="" style="opacity: 0; pointer-events: none;">
							<p class="fs-body white" data-animation="SplitBlock" data-astro-cid-odekpglu=""><?php echo esc_html($settings['gov_text']); ?></p>
							<div class="items-container" data-astro-cid-odekpglu="">
								<?php foreach ($settings['gov_items'] as $item): ?>
								<div class="item-container" data-animation="FadeIn" data-astro-cid-odekpglu="">
									<div class="image-container" data-astro-cid-odekpglu="">
										<?php echo $item['item_svg']; ?>
									</div>
									<p class="fs-body-s white" data-astro-cid-odekpglu=""><?php echo esc_html($item['item_label']); ?></p>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
