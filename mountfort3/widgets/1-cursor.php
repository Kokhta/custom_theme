<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Cursor_Widget extends Widget_Base {

	public function get_name() {
		return '1-cursor';
	}

	public function get_title() {
		return '1. Cursor';
	}

	public function get_icon() {
		return 'eicon-cursor';
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

		$this->add_control(
			'theme',
			array(
				'label'   => 'Theme',
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'light' => 'Light',
					'dark'  => 'Dark',
				),
				'default' => 'light',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-astro-transition-persist="cursor" class="cursor visible" data-component="Cursor" data-astro-cid-x6vourwi="" data-config="default" data-theme="<?php echo esc_attr( $settings['theme'] ); ?>" style="transform: translate3d(732.929px, 261.025px, 0px) rotate(0.00659652deg) scale(1.00005);">
			<div class="inner" data-astro-cid-x6vourwi="">
				<div class="circle" data-astro-cid-x6vourwi=""></div>
				<div class="middle-dot" data-astro-cid-x6vourwi=""></div>
				<div class="dots dots-left" data-astro-cid-x6vourwi=""></div>
				<div class="dots dots-right" data-astro-cid-x6vourwi=""></div>
			</div>
		</div>
		<?php
	}
}
