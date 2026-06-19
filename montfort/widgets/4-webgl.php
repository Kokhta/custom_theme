<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Widget_4_Webgl extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort-webgl';
	}

	public function get_title() {
		return esc_html__( '4-WebGL', 'montfort' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'montfort' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_webgl_content',
			[
				'label' => esc_html__( 'WebGL Content', 'montfort' ),
			]
		);

		$this->add_control(
			'canvas_id',
			[
				'label' => esc_html__( 'Canvas Wrapper ID', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'canvas-wrapper',
			]
		);

		$this->add_control(
			'transition_persist',
			[
				'label' => esc_html__( 'Data Astro Transition Persist', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'webgl',
			]
		);

		$this->add_control(
			'three_js_ver',
			[
				'label' => esc_html__( 'Three.js Version', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'three.js r169',
			]
		);

		$this->add_control(
			'script_src',
			[
				'label' => esc_html__( 'Script Source', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '/_astro/WebGL.astro_astro_type_script_index_0_lang.ClLv70z8.js',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="<?php echo esc_attr( $settings['canvas_id'] ); ?>" data-astro-transition-persist="<?php echo esc_attr( $settings['transition_persist'] ); ?>" aria-hidden="true">
			<canvas data-engine="<?php echo esc_attr( $settings['three_js_ver'] ); ?>" width="1582" height="644" style="width: 1319.17px; height: 536.667px;"></canvas>
		</div>
		<script type="module" src="<?php echo esc_url( $settings['script_src'] ); ?>" data-astro-exec=""></script>
		<?php
	}
}
