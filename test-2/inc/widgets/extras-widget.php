<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test2_Extras_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'test2_extras';
	}

	public function get_title() {
		return esc_html__( '7-Extras', 'test2' );
	}

	public function get_icon() {
		return 'eicon-nerd-chapeau';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function render() {
		?>
		<div id="gl-canvas"><canvas width="491" height="1065" style="display: block; width: 100%; height: 100%; touch-action: none;" data-engine="three.js r182 webgpu"></canvas></div>
		<div class="scrollbar scrollbar--visible"><div class="scrollbar__inner"></div><div class="scrollbar__progress" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px);"></div></div>
		<svg class="svg-sprite" fill="none" aria-hidden="true">
			<defs>
				<linearGradient id="btnBorderGrad" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#9BB8E1"></stop><stop offset="100%" stop-color="#2C4E73"></stop></linearGradient>
				<linearGradient id="navBorderLeft" x1="0.5" y1="14.5" x2="65" y2="14.5" gradientUnits="userSpaceOnUse"><stop stop-color="#9BB8E1"></stop><stop offset="1" stop-color="#235792"></stop></linearGradient>
				<linearGradient id="navBorderRight" x1="-34.5" y1="14.5" x2="30" y2="14.5" gradientUnits="userSpaceOnUse"><stop stop-color="#9BB8E1"></stop><stop offset="1" stop-color="#235792"></stop></linearGradient>
			</defs>
		</svg>
		<?php
	}
}
