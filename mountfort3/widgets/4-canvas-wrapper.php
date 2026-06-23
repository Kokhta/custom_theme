<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Canvas_Wrapper_Widget extends Widget_Base {

	public function get_name() {
		return '4-canvas-wrapper';
	}

	public function get_title() {
		return '4. Canvas Wrapper';
	}

	public function get_icon() {
		return 'eicon-code';
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
			'canvas_data',
			array(
				'label'       => 'Canvas Data Engine',
				'type'        => Controls_Manager::TEXT,
				'default'     => 'three.js r169',
				'placeholder' => 'Enter canvas engine info',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="canvas-wrapper" data-astro-transition-persist="webgl" aria-hidden="true">
			<canvas data-engine="<?php echo esc_attr( $settings['canvas_data'] ); ?>" width="1582" height="693" style="width: 1319.17px; height: 577.5px;"></canvas>
		</div>
		<?php
	}
}
