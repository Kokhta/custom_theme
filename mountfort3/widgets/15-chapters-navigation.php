<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chapters_Navigation_Widget extends Widget_Base {

	public function get_name() {
		return '15-chapters-navigation';
	}

	public function get_title() {
		return '15. Chapters Navigation';
	}

	public function get_icon() {
		return 'eicon-bullet-list';
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

		$repeater = new Repeater();
		$repeater->add_control( 'key', array( 'label' => 'Chapter Key (ID)', 'type' => Controls_Manager::TEXT ) );
		$repeater->add_control( 'label', array( 'label' => 'Chapter Label', 'type' => Controls_Manager::TEXT ) );

		$this->add_control(
			'chapters',
			array(
				'label'       => 'Chapters',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array( 'key' => 'WhoWeAre', 'label' => 'Who we are' ),
					array( 'key' => 'WhatWeDo', 'label' => 'What we do' ),
					array( 'key' => 'GlobalConnectivity', 'label' => 'Global connectivity' ),
					array( 'key' => 'Sustainability', 'label' => 'Sustainability' ),
				),
				'title_field' => '{{{ label }}}',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="chapters-navigation" data-theme="light" data-astro-cid-gpzihxjt="" style="pointer-events: none;">
			<div class="chapters-container grid" data-astro-cid-gpzihxjt="">
				<nav class="chapters-list fs-cta montfort-navy-blue uppercase tb:col-start-1 dk:col-start-2 ml:col-start-3 lg:col-start-3" data-astro-cid-gpzihxjt="">
					<?php foreach ( $settings['chapters'] as $chapter ) : ?>
						<div class="chapter-wrapper" data-chapter-key="<?php echo esc_attr( $chapter['key'] ); ?>" data-astro-cid-gpzihxjt="">
							<div class="progress-wrapper" data-astro-cid-gpzihxjt="">
								<div class="progress-bar white-part" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform-origin: 50% 0% 0px; transform: translate3d(0px, 0px, 0px) scale(1, 0);"></div>
								<div class="progress-bar blue-part" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px) scale(1, 0); transform-origin: 50% 0% 0px;"></div>
							</div>
							<a class="chapter-link" href="#<?php echo esc_attr( $chapter['key'] ); ?>" data-astro-cid-gpzihxjt="true">
								<div class="dot" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, -8px, 0px) scale(0);">
									<span data-astro-cid-gpzihxjt=""></span>
								</div>
								<div class="text-container" data-astro-cid-gpzihxjt="">
									<span data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 200%, 0px);"><?php echo esc_html( $chapter['label'] ); ?></span>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
					<div class="chapter-wrapper" data-astro-cid-gpzihxjt="">
						<div class="dot" data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, -8px, 0px) scale(0);">
							<span data-astro-cid-gpzihxjt=""></span>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<?php
	}
}
