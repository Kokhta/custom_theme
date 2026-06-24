<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MountFort_Widget_15_Chapters_Navigation extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mountfort_chapters_navigation';
	}

	public function get_title() {
		return esc_html__( '15-Chapters Navigation', 'mountfort' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
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

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'key', [ 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'label', [ 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'href', [ 'type' => \Elementor\Controls_Manager::TEXT ] );

		$this->add_control(
			'chapters',
			[
				'label' => esc_html__( 'Chapters', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'key' => 'WhoWeAre', 'label' => 'Who we are', 'href' => '#WhoWeAre' ],
					[ 'key' => 'WhatWeDo', 'label' => 'What we do', 'href' => '#WhatWeDo' ],
					[ 'key' => 'GlobalConnectivity', 'label' => 'Global connectivity', 'href' => '#GlobalConnectivity' ],
					[ 'key' => 'Sustainability', 'label' => 'Sustainability', 'href' => '#Sustainability' ],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="chapters-navigation" data-theme="light" data-astro-cid-gpzihxjt="" style="pointer-events: all;">
			<div class="chapters-container grid" data-astro-cid-gpzihxjt="">
				<nav class="chapters-list fs-cta montfort-navy-blue uppercase tb:col-start-1 dk:col-start-2 ml:col-start-3 lg:col-start-3" data-astro-cid-gpzihxjt="">
					<?php foreach ( $settings['chapters'] as $chapter ) : ?>
						<div class="chapter-wrapper" data-chapter-key="<?php echo esc_attr($chapter['key']); ?>" data-astro-cid-gpzihxjt="">
							<div class="progress-wrapper" data-astro-cid-gpzihxjt="">
								<div class="progress-bar white-part" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform-origin: 50% 100% 0px; transform: translate3d(0px, 0px, 0px) scale(1, 0);"></div>
								<div class="progress-bar blue-part" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px) scale(1, 0); transform-origin: 50% 100% 0px;"></div>
							</div>
							<a class="chapter-link" href="<?php echo esc_attr($chapter['href']); ?>" data-astro-cid-gpzihxjt="true">
								<div class="dot" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, -8px, 0px);">
									<span data-astro-cid-gpzihxjt=""></span>
								</div>
								<div class="text-container" data-astro-cid-gpzihxjt="">
									<span data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, -200%, 0px);"><?php echo esc_html($chapter['label']); ?></span>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
					<div class="chapter-wrapper" data-astro-cid-gpzihxjt="">
						<div class="dot" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, -8px, 0px);">
							<span data-astro-cid-gpzihxjt=""></span>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<?php
	}
}
