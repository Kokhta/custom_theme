<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_1_Cursor extends Widget_Base {
	public function get_name() { return '1-cursor'; }
	public function get_title() { return '1. Cursor'; }
	public function get_icon() { return 'eicon-pointer-alt'; }
	public function get_categories() { return [ 'general' ]; }
	protected function render() {
		?>
		<div data-astro-transition-persist="cursor" class="cursor" data-component="Cursor" data-astro-cid-x6vourwi="" style="transform: translate3d(0px, 0px, 0px) rotate(0deg) scale(1);">
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
