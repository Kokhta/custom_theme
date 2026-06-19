<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_12_open_weight extends \Elementor\Widget_Base {

	public function get_name() {
		return '12-open-weight';
	}

	public function get_title() {
		return esc_html__( '12-open-weight', 'custom-hello-333' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'custom-hello-333' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		?>
		<div id="open-weight" class="section" style="visibility: hidden;">
			<div class="section__inner body2">
				<div id="open-weight-header">
					<h5 id="open-weight-tagline" class="sub2">Our SOTA Open Weight model</h5>
					<h2 id="open-weight-title"><svg viewBox="0 0 809 174"><use href="#logo-tmpl"></use></svg><svg viewBox="0 0 66 62"><path fill="currentColor" d="M65.132 0v61.077H52.22v-48.82h-.358l-13.986 8.768V9.573L52.994 0zM27.854 25.498v10.08H0v-10.08z"></path></svg></h2>
					<div id="open-weight-btns-wrapper">
						<a href="https://github.com/lusionltd/ORYZO-1/tree/main/paper.pdf" target="_blank" class="btn is-dark is-flipper">Paper</a>
						<a href="https://github.com/lusionltd/ORYZO-1/tree/main/checkpoints" target="_blank" class="btn is-dark is-flipper">MODEL (.OBJ)</a>
						<a href="https://github.com/lusionltd/ORYZO-1" target="_blank" class="btn is-dark is-flipper">Code coming soon</a>
					</div>
				</div>
				<div class="open-weight-article">
					<h5 class="open-weight-cat">Abstract</h5>
					<div class="open-weight-desc">We present <span>Oryzo-1</span>, an open-weight 3D model of a cork coaster for rendering, simulation, and gloriously unnecessary research. Oryzo-1 faithfully reproduces key coaster behaviors - table protection, perfect circularity, and passive thermal moderation under everyday beverage conditions. Released in clean OBJ format with baseline results on our own WoodenBench (a standardized evaluation suite conducted on a single desk and very possibly rigged by us). Limitations include heavy dependency on gravity, mugs, and human deployment.</div>
				</div>
				<div class="open-weight-article">
					<h5 class="open-weight-cat">Acknowledgements</h5>
					<div class="open-weight-desc">This website was single-shot espresso’d into existence by the creative team at Lusion.</div>
				</div>
				<div class="open-weight-article">
					<h5 class="open-weight-cat">Peer Review</h5>
					<div class="open-weight-desc">"Oryzo-1 A0B is the best model out there. <span>Trust me bro</span>."<br><span class="open-weight-article-small">- Anonymous LocalLLaMA Reddit user</span></div>
				</div>
				<div class="open-weight-article">
					<h5 class="open-weight-cat">BibTeX</h5>
					<pre id="open-weight-bibtex">@misc{oryzo2026,
  title        = {Oryzo-1: Open-Weight Coaster Model},
  author       = {Lusion},
  year         = {2026},
  howpublished = {OBJ release},
  note         = {A high-fidelity 3D model of a cork coaster. Code: coming soon.
}</pre>
				</div>
			</div>
		</div>
		<?php
	}
}
