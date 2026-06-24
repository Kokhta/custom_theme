<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Widget_2_Hero_Transition extends Widget_Base {

	public function get_name() {
		return '2-hero-transition';
	}

	public function get_title() {
		return esc_html__( '2-Hero Transition', 'custom-hello-theme' );
	}

	public function get_icon() {
		return 'eicon-animation';
	}

	public function get_categories() {
		return [ 'custom-hello-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Titles', 'custom-hello-theme' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
		$repeater->add_control( 'title', [ 'type' => Controls_Manager::TEXT, 'label' => 'Title' ] );

		$this->add_control( 'titles', [
			'label' => 'Titles',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				[ 'title' => 'Montfort' ],
				[ 'title' => 'Trading' ],
				[ 'title' => 'Capital' ],
				[ 'title' => 'Maritime' ],
				[ 'title' => 'Fort Energy' ],
			],
            'title_field' => '{{{ title }}}',
		] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="hero-transition" data-astro-transition-persist="transition-hero" data-cursor="draggable" data-cursor-down="dragging" data-astro-cid-3rse3tms>
			<div class="inner" data-astro-cid-3rse3tms>
				<?php foreach ( $settings['titles'] as $index => $item ) :
                    $setting_key = $this->get_repeater_setting_key( 'title', 'titles', $index );
                ?>
					<div class="title" data-astro-cid-3rse3tms>
						<p data-astro-cid-3rse3tms <?php echo $this->get_render_attribute_string( $setting_key ); ?>><?php echo esc_html( $item['title'] ); ?></p>
						<div class="spinner" data-astro-cid-3rse3tms>
							<svg class="spinner-inner" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" data-astro-cid-3rse3tms>
								<g stroke-width="8" data-astro-cid-3rse3tms>
									<path stroke="url(#spinner-secondHalf)" d="M 4 100 A 96 96 0 0 1 196 100" data-astro-cid-3rse3tms></path>
									<path stroke="url(#spinner-firstHalf)" d="M 196 100 A 96 96 0 0 1 4 100" data-astro-cid-3rse3tms></path>
								</g>
							</svg>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<svg class="spinner-defs" xmlns="http://www.w3.org/2000/svg" color="#2d628c" data-astro-cid-3rse3tms>
				<defs data-astro-cid-3rse3tms>
					<linearGradient id="spinner-secondHalf" data-astro-cid-3rse3tms>
						<stop offset="0%" stop-opacity="0" stop-color="currentColor" data-astro-cid-3rse3tms></stop>
						<stop offset="100%" stop-opacity="0.5" stop-color="currentColor" data-astro-cid-3rse3tms></stop>
					</linearGradient>
					<linearGradient id="spinner-firstHalf" data-astro-cid-3rse3tms>
						<stop offset="0%" stop-opacity="1" stop-color="currentColor" data-astro-cid-3rse3tms></stop>
						<stop offset="100%" stop-opacity="0.5" stop-color="currentColor" data-astro-cid-3rse3tms></stop>
					</linearGradient>
				</defs>
			</svg>
		</div>
		<?php
	}
}
