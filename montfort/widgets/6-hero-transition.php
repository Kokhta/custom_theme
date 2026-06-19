<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Widget_6_Hero_Transition extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort-hero-transition';
	}

	public function get_title() {
		return esc_html__( '6-Hero Transition', 'montfort' );
	}

	public function get_icon() {
		return 'eicon-animation';
	}

	public function get_categories() {
		return [ 'montfort' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_transition_content',
			[
				'label' => esc_html__( 'Transition Content', 'montfort' ),
			]
		);

		$this->add_control(
			'data_astro_cid',
			[
				'label' => esc_html__( 'Data Astro CID', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'data-astro-cid-3rse3tms',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Montfort',
			]
		);
		$repeater->add_control(
			'opacity',
			[
				'label' => esc_html__( 'Opacity', 'montfort' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 0.5,
			]
		);

		$this->add_control(
			'transition_titles',
			[
				'label' => esc_html__( 'Transition Titles', 'montfort' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'title' => 'Montfort', 'opacity' => 0.5 ],
					[ 'title' => 'Trading', 'opacity' => 0.5 ],
					[ 'title' => 'Capital', 'opacity' => 0.5 ],
					[ 'title' => 'Maritime', 'opacity' => 0.5 ],
					[ 'title' => 'Fort Energy', 'opacity' => 1 ],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$cid = $settings['data_astro_cid'];
		?>
		<div class="hero-transition" data-astro-transition-persist="transition-hero" data-cursor="draggable" data-cursor-down="dragging" <?php echo esc_attr( $cid ); ?>="" style="opacity: 0; --slide-progress: 4;">
			<div class="inner" <?php echo esc_attr( $cid ); ?>="">
				<?php foreach ( $settings['transition_titles'] as $item ) : ?>
					<div class="title" <?php echo esc_attr( $cid ); ?>="" style="opacity: <?php echo esc_attr( $item['opacity'] ); ?>;">
						<p <?php echo esc_attr( $cid ); ?>=""><?php echo esc_html( $item['title'] ); ?></p>
						<div class="spinner" <?php echo esc_attr( $cid ); ?>="">
							<svg class="spinner-inner" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" <?php echo esc_attr( $cid ); ?>="">
								<g stroke-width="8" <?php echo esc_attr( $cid ); ?>="">
									<path stroke="url(#spinner-secondHalf)" d="M 4 100 A 96 96 0 0 1 196 100" <?php echo esc_attr( $cid ); ?>=""></path>
									<path stroke="url(#spinner-firstHalf)" d="M 196 100 A 96 96 0 0 1 4 100" <?php echo esc_attr( $cid ); ?>=""></path>
								</g>
							</svg>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<svg class="spinner-defs" xmlns="http://www.w3.org/2000/svg" color="#2d628c" <?php echo esc_attr( $cid ); ?>="">
				<defs <?php echo esc_attr( $cid ); ?>="">
					<linearGradient id="spinner-secondHalf" <?php echo esc_attr( $cid ); ?>="">
						<stop offset="0%" stop-opacity="0" stop-color="currentColor" <?php echo esc_attr( $cid ); ?>=""></stop>
						<stop offset="100%" stop-opacity="0.5" stop-color="currentColor" <?php echo esc_attr( $cid ); ?>=""></stop>
					</linearGradient>
					<linearGradient id="spinner-firstHalf" <?php echo esc_attr( $cid ); ?>="">
						<stop offset="0%" stop-opacity="1" stop-color="currentColor" <?php echo esc_attr( $cid ); ?>=""></stop>
						<stop offset="100%" stop-opacity="0.5" stop-color="currentColor" <?php echo esc_attr( $cid ); ?>=""></stop>
					</linearGradient>
				</defs>
			</svg>
		</div>
		<?php
	}
}
