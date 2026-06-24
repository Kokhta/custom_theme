<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_4_Canvas extends Widget_Base {
	public function get_name() { return '4-canvas'; }
	public function get_title() { return '4. WebGL Canvas'; }
	public function get_icon() { return 'eicon-code-bold'; }
	public function get_categories() { return [ 'general' ]; }
	protected function render() {
		?>
		<div id="canvas-wrapper" data-astro-transition-persist="webgl" aria-hidden="true">
			<canvas data-engine="three.js r169"></canvas>
		</div>
		<?php
	}
}
