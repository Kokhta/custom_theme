<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MountFort_Widget_4_Canvas extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mountfort_canvas';
	}

	public function get_title() {
		return esc_html__( '4-Canvas', 'mountfort' );
	}

	public function get_icon() {
		return 'eicon-code-highlight';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function render() {
		?>
		<div id="canvas-wrapper" data-astro-transition-persist="webgl" aria-hidden="true">
			<canvas data-engine="three.js r169" width="828" height="1691" style="width: 414.2px; height: 845.833px;"></canvas>
		</div>
		<?php
	}
}
