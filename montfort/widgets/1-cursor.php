<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Widget_1_Cursor extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort-cursor';
	}

	public function get_title() {
		return esc_html__( '1-Cursor', 'montfort' );
	}

	public function get_icon() {
		return 'eicon-pointer';
	}

	public function get_categories() {
		return [ 'montfort' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_cursor_attributes',
			[
				'label' => esc_html__( 'Cursor Attributes', 'montfort' ),
			]
		);

		$this->add_control(
			'transition_persist',
			[
				'label' => esc_html__( 'Data Astro Transition Persist', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'cursor',
			]
		);

		$this->add_control(
			'cursor_class',
			[
				'label' => esc_html__( 'Class', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'cursor visible',
			]
		);

		$this->add_control(
			'data_component',
			[
				'label' => esc_html__( 'Data Component', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Cursor',
			]
		);

		$this->add_control(
			'data_astro_cid',
			[
				'label' => esc_html__( 'Data Astro CID', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'data-astro-cid-x6vourwi',
			]
		);

		$this->add_control(
			'data_config',
			[
				'label' => esc_html__( 'Data Config', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'default',
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

		$this->add_control(
			'inline_style',
			[
				'label' => esc_html__( 'Inline Style', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'transform: translate3d(971.979px, 271.008px, 0px) rotate(0.00193424deg) scale(1.00001);',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-astro-transition-persist="<?php echo esc_attr( $settings['transition_persist'] ); ?>"
			 class="<?php echo esc_attr( $settings['cursor_class'] ); ?>"
			 data-component="<?php echo esc_attr( $settings['data_component'] ); ?>"
			 <?php echo esc_attr( $settings['data_astro_cid'] ); ?>=""
			 data-config="<?php echo esc_attr( $settings['data_config'] ); ?>"
			 data-theme="<?php echo esc_attr( $settings['data_theme'] ); ?>"
			 style="<?php echo esc_attr( $settings['inline_style'] ); ?>">
			<div class="inner" <?php echo esc_attr( $settings['data_astro_cid'] ); ?>="">
				<div class="circle" <?php echo esc_attr( $settings['data_astro_cid'] ); ?>=""></div>
				<div class="middle-dot" <?php echo esc_attr( $settings['data_astro_cid'] ); ?>=""></div>
				<div class="dots dots-left" <?php echo esc_attr( $settings['data_astro_cid'] ); ?>=""></div>
				<div class="dots dots-right" <?php echo esc_attr( $settings['data_astro_cid'] ); ?>=""></div>
			</div>
		</div>
		<?php
	}
}
