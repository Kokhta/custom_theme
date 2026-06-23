<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Hero_Transition_Widget extends Widget_Base {

	public function get_name() {
		return '6-hero-transition';
	}

	public function get_title() {
		return '6. Hero Transition';
	}

	public function get_icon() {
		return 'eicon-animation-text';
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
		$repeater->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT ) );
		$repeater->add_control( 'opacity', array( 'label' => 'Initial Opacity', 'type' => Controls_Manager::NUMBER, 'default' => 0.5 ) );

		$this->add_control(
			'transition_titles',
			array(
				'label'       => 'Transition Titles',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array( 'title' => 'Montfort', 'opacity' => 1 ),
					array( 'title' => 'Trading', 'opacity' => 0.5 ),
					array( 'title' => 'Capital', 'opacity' => 0.5 ),
					array( 'title' => 'Maritime', 'opacity' => 0.5 ),
					array( 'title' => 'Fort Energy', 'opacity' => 0.5 ),
				),
				'title_field' => '{{{ title }}}',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="hero-transition" data-astro-transition-persist="transition-hero" data-cursor="draggable" data-cursor-down="dragging" data-astro-cid-3rse3tms="" style="--slide-progress: 0; opacity: 0;">
			<div class="inner" data-astro-cid-3rse3tms="">
				<?php foreach ( $settings['transition_titles'] as $title ) : ?>
					<div class="title" data-astro-cid-3rse3tms="" style="opacity: <?php echo esc_attr( $title['opacity'] ); ?>;">
						<p data-astro-cid-3rse3tms=""><?php echo esc_html( $title['title'] ); ?></p>
						<div class="spinner" data-astro-cid-3rse3tms="">
							<svg class="spinner-inner" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" data-astro-cid-3rse3tms="">
								<g stroke-width="8" data-astro-cid-3rse3tms="">
									<path stroke="url(#spinner-secondHalf)" d="M 4 100 A 96 96 0 0 1 196 100" data-astro-cid-3rse3tms=""></path>
									<path stroke="url(#spinner-firstHalf)" d="M 196 100 A 96 96 0 0 1 4 100" data-astro-cid-3rse3tms=""></path>
								</g>
							</svg>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<svg class="spinner-defs" xmlns="http://www.w3.org/2000/svg" color="#2d628c" data-astro-cid-3rse3tms="">
				<defs data-astro-cid-3rse3tms="">
					<linearGradient id="spinner-secondHalf" data-astro-cid-3rse3tms="">
						<stop offset="0%" stop-opacity="0" stop-color="currentColor" data-astro-cid-3rse3tms=""></stop>
						<stop offset="100%" stop-opacity="0.5" stop-color="currentColor" data-astro-cid-3rse3tms=""></stop>
					</linearGradient>
					<linearGradient id="spinner-firstHalf" data-astro-cid-3rse3tms="">
						<stop offset="0%" stop-opacity="1" stop-color="currentColor" data-astro-cid-3rse3tms=""></stop>
						<stop offset="100%" stop-opacity="0.5" stop-color="currentColor" data-astro-cid-3rse3tms=""></stop>
					</linearGradient>
				</defs>
			</svg>
		</div>
		<?php
	}
}
