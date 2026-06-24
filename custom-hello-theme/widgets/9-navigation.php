<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_9_Navigation extends Widget_Base {
	public function get_name() { return '9-navigation'; }
	public function get_title() { return '9. Chapters Navigation'; }
	public function get_icon() { return 'eicon-bullet-list'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$repeater = new Repeater();
		$repeater->add_control('key', ['label' => 'Key', 'type' => Controls_Manager::TEXT]);
		$repeater->add_control('label', ['label' => 'Label', 'type' => Controls_Manager::TEXT]);
		$repeater->add_control('anchor', ['label' => 'Anchor', 'type' => Controls_Manager::TEXT]);
		$this->add_control('chapters', [
			'label' => 'Chapters',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				[ 'key' => 'WhoWeAre', 'label' => 'Who we are', 'anchor' => '#WhoWeAre' ],
				[ 'key' => 'WhatWeDo', 'label' => 'What we do', 'anchor' => '#WhatWeDo' ],
				[ 'key' => 'GlobalConnectivity', 'label' => 'Global connectivity', 'anchor' => '#GlobalConnectivity' ],
				[ 'key' => 'Sustainability', 'label' => 'Sustainability', 'anchor' => '#Sustainability' ],
			]
		]);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="chapters-navigation" data-theme="light" data-astro-cid-gpzihxjt="" style="pointer-events: all;">
			<div class="chapters-container grid" data-astro-cid-gpzihxjt="">
				<nav class="chapters-list fs-cta montfort-navy-blue uppercase tb:col-start-1 dk:col-start-2 ml:col-start-3 lg:col-start-3" data-astro-cid-gpzihxjt="">
					<?php foreach ( $settings['chapters'] as $item ) : ?>
						<div class="chapter-wrapper" data-chapter-key="<?php echo esc_attr( $item['key'] ); ?>" data-astro-cid-gpzihxjt="">
							<div class="progress-wrapper" data-astro-cid-gpzihxjt="">
								<div class="progress-bar white-part" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform-origin: 50% 100% 0px; transform: translate3d(0px, 0px, 0px) scale(1, 0);"></div>
								<div class="progress-bar blue-part" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px) scale(1, 0); transform-origin: 50% 100% 0px;"></div>
							</div>
							<a class="chapter-link" href="<?php echo esc_url( $item['anchor'] ); ?>" data-astro-cid-gpzihxjt="true">
								<div class="dot" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, -8px, 0px);"><span></span></div>
								<div class="text-container" data-astro-cid-gpzihxjt=""><span data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, -200%, 0px);"><?php echo esc_html( $item['label'] ); ?></span></div>
							</a>
						</div>
					<?php endforeach; ?>
				</nav>
			</div>
		</div>
		<script type="module" src="/_astro/ChaptersNavigation.astro_astro_type_script_index_0_lang.DYrj7sV6.js" data-astro-exec=""></script>
		<?php
	}
}
