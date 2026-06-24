<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Valentine_Footer_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'valentine_footer';
	}

	public function get_title() {
		return esc_html__( '7-Footer', 'valentine' );
	}

	public function get_icon() {
		return 'eicon-footer';
	}

	public function get_categories() {
		return [ 'valentine' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'valentine' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'footer_text',
			[
				'label' => esc_html__( 'Footer Text', 'valentine' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '', 'valentine' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<footer>
			<?php echo esc_html( $settings['footer_text'] ); ?>
		</footer>
		<?php
	}
}
