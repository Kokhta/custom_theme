<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_10_Footer extends Widget_Base {
	public function get_name() { return '10-footer'; }
	public function get_title() { return '10. Footer'; }
	public function get_icon() { return 'eicon-footer'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$repeater = new Repeater();
		$repeater->add_control('text', ['label' => 'Text', 'type' => Controls_Manager::TEXT]);
		$repeater->add_control('url', ['label' => 'URL', 'type' => Controls_Manager::URL]);
		$this->add_control('main_links', ['label' => 'Main Links', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater->get_controls()]);
		$this->add_control('copyright', ['label' => 'Copyright', 'type' => Controls_Manager::TEXT, 'default' => '© 2021 | Montfort - All rights reserved']);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<footer data-astro-transition-persist="footer" id="footer" data-theme="light" data-astro-cid-rhv6ztfp="">
			<div class="grid footer-container" data-astro-cid-rhv6ztfp="">
				<div class="copyright-info dk:col-start-3 dk:col-end-24 ml:col-start-10 ml:col-end-24 lg:col-start-11 lg:col-end-21" data-astro-cid-rhv6ztfp="">
					<p class="fs-body-s montfort-navy-blue" data-astro-cid-rhv6ztfp=""><?php echo esc_html( $settings['copyright'] ); ?></p>
				</div>
			</div>
		</footer>
		<script type="module" data-astro-exec="">let e=document.querySelector("#footer"),o=e.querySelectorAll(".office");const n=(a="light")=>{e=document.querySelector("#footer"),e&&(o=e.querySelectorAll(".office")),e&&(e.dataset.theme=a),o&&o.length>0&&o.forEach(t=>{t.dataset.theme=a})},r=()=>{const t=document.querySelector("main")?.dataset.footer;n(t||"light")},c=()=>{r()},i=()=>{};document.addEventListener("astro:page-load",c);document.addEventListener("astro:before-preparation",i);</script>
		<?php
	}
}
