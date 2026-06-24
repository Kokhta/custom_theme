<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MountFort_Widget_1_Cursor extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mountfort_cursor';
	}

	public function get_title() {
		return esc_html__( '1-Cursor', 'mountfort' );
	}

	public function get_icon() {
		return 'eicon-pointer';
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

		$this->add_control( 'cursor_class', [ 'label' => 'Class', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'cursor' ] );
		$this->add_control( 'cursor_cid', [ 'label' => 'Astro CID', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'x6vourwi' ] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$cid = esc_attr($settings['cursor_cid']);
		?>
		<div data-astro-transition-persist="cursor" class="<?php echo esc_attr($settings['cursor_class']); ?>" data-component="Cursor" data-astro-cid-<?php echo $cid; ?>="" style="transform: translate3d(0px, 0px, 0px) rotate(0deg) scale(1);">
			<div class="inner" data-astro-cid-<?php echo $cid; ?>="">
				<div class="circle" data-astro-cid-<?php echo $cid; ?>=""></div>
				<div class="middle-dot" data-astro-cid-<?php echo $cid; ?>=""></div>
				<div class="dots dots-left" data-astro-cid-<?php echo $cid; ?>=""></div>
				<div class="dots dots-right" data-astro-cid-<?php echo $cid; ?>=""></div>
			</div>
		</div>
		<?php
	}
}
