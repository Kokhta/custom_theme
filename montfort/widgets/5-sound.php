<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Widget_5_Sound extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort-sound';
	}

	public function get_title() {
		return esc_html__( '5-Sound', 'montfort' );
	}

	public function get_icon() {
		return 'eicon-sound-wave';
	}

	public function get_categories() {
		return [ 'montfort' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_sound_content',
			[
				'label' => esc_html__( 'Sound Content', 'montfort' ),
			]
		);

		$this->add_control(
			'data_astro_cid',
			[
				'label' => esc_html__( 'Data Astro CID', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'data-astro-cid-epuvuop6',
			]
		);

		$this->add_control(
			'data_theme',
			[
				'label' => esc_html__( 'Data Theme', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'light',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$cid = $settings['data_astro_cid'];
		?>
		<div data-astro-transition-persist="sound" class="buttons-container" data-theme="<?php echo esc_attr( $settings['data_theme'] ); ?>" data-component="Sound" <?php echo esc_attr( $cid ); ?>="" style="pointer-events: auto; opacity: 1;">
			<div class="buttons-wrapper grid" <?php echo esc_attr( $cid ); ?>="">
				<div class="buttons-inner dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23" <?php echo esc_attr( $cid ); ?>="">
					<button id="scroll-top" class="scroll-top" <?php echo esc_attr( $cid ); ?>="" style="pointer-events: none; opacity: 0;">
						<svg <?php echo esc_attr( $cid ); ?>="true" xmlns="http://www.w3.org/2000/svg" width="10" height="12" fill="none" viewBox="0 0 10 12" focusable="false" aria-hidden="true"><path fill="#2D628C" fill-rule="evenodd" d="M.87 3.982 4.464.386a.757.757 0 0 1 1.07 0L9.13 3.982a.757.757 0 1 1-1.07 1.07L5.757 2.748v8.331a.757.757 0 1 1-1.514 0V2.748L1.94 5.052a.757.757 0 1 1-1.07-1.07" clip-rule="evenodd" style="fill:#2d628c;fill:color(display-p3 .1765 .3843 .549);fill-opacity:1"></path></svg>
					</button>
					<button class="sound" <?php echo esc_attr( $cid ); ?>="">
						<canvas id="sound-canvas" width="28" height="28" <?php echo esc_attr( $cid ); ?>=""></canvas>
					</button>
				</div>
			</div>
		</div>
		<?php
	}
}
