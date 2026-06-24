<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_5_Sound extends Widget_Base {
	public function get_name() { return '5-sound'; }
	public function get_title() { return '5. Sound Buttons'; }
	public function get_icon() { return 'eicon-v-align-bottom'; }
	public function get_categories() { return [ 'general' ]; }
	protected function render() {
		?>
		<div data-astro-transition-persist="sound" class="buttons-container" data-theme="dark" data-component="Sound" data-astro-cid-epuvuop6="">
			<div class="buttons-wrapper grid" data-astro-cid-epuvuop6="">
				<div class="buttons-inner dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23" data-astro-cid-epuvuop6="">
					<button id="scroll-top" class="scroll-top" data-astro-cid-epuvuop6="" style="pointer-events: auto; opacity: 1;">
						<svg data-astro-cid-epuvuop6="true" xmlns="http://www.w3.org/2000/svg" width="10" height="12" fill="none" viewBox="0 0 10 12" focusable="false" aria-hidden="true"><path fill="#2D628C" fill-rule="evenodd" d="M.87 3.982 4.464.386a.757.757 0 0 1 1.07 0L9.13 3.982a.757.757 0 1 1-1.07 1.07L5.757 2.748v8.331a.757.757 0 1 1-1.514 0V2.748L1.94 5.052a.757.757 0 1 1-1.07-1.07" clip-rule="evenodd" style="fill:#2d628c;fill:color(display-p3 .1765 .3843 .549);fill-opacity:1"></path></svg>
					</button>
					<button class="sound" data-astro-cid-epuvuop6="">
						<canvas id="sound-canvas" width="84" height="84" data-astro-cid-epuvuop6=""></canvas>
					</button>
				</div>
			</div>
		</div>
		<?php
	}
}
