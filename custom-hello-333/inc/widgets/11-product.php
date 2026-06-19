<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_11_product extends \Elementor\Widget_Base {

	public function get_name() {
		return '11-product';
	}

	public function get_title() {
		return esc_html__( '11-product', 'custom-hello-333' );
	}

	public function get_icon() {
		return 'eicon-products';
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

		$this->add_control(
			'hero_caption',
			[
				'label' => esc_html__( 'Hero Caption', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Choose you own',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="product" class="section" style="visibility: hidden;">
			<div class="section__inner o-container">
				<div id="product-hero" style="visibility: hidden;">
					<div id="product-hero-inner" style="transform: translate3d(0px, 0px, 0px) translate3d(0px, -50%, 0px);">
						<h4 id="product-hero-caption"><?php echo esc_html($settings['hero_caption']); ?></h4>
						<div id="product-hero-title-wrapper">
							<svg id="product-hero-title"><use href="#logo-tmpl"></use></svg>
						</div>
						<div id="product-hero-options">
							<button data-id="0" id="product-hero-option-oryzo" class="product-hero-option-item btn is-large is-dark is-active is-flipper" aria-label="ORYZO">ORYZO</button>
							<button data-id="1" id="product-hero-option-oryzo-pro" class="product-hero-option-item btn is-large is-dark is-flipper" aria-label="ORYZO Pro">ORYZO Pro</button>
							<button data-id="2" id="product-hero-option-oryzo-pro-max" class="product-hero-option-item btn is-large is-dark is-flipper" aria-label="ORYZO Pro Max">ORYZO Pro Max</button>
						</div>
					</div>
				</div>
				<div id="product-details" style="visibility: hidden;">
					<div id="product-details-inner">
						<div id="product-details-main">
							<h4 id="product-details-title-wrapper">
								<span aria-label="ORYZO">ORYZO</span>
								<span aria-label="ORYZO Pro">ORYZO Pro</span>
								<span aria-label="ORYZO Pro Max">ORYZO Pro Max</span>
							</h4>
							<div id="product-details-desc-wrapper" class="body2">
								<div aria-label="The original. Refined until it feels inevitable. Lifts just enough, grips just right, and quietly disappears into your day like it was never there.">The original. Refined until it feels inevitable. Lifts just enough, grips just right, and quietly disappears into your day like it was never there.</div>
								<div aria-label="A little more presence. Double the cork, double the confidence - without losing the plot.">A little more presence. Double the cork, double the confidence - without losing the plot.</div>
								<div aria-label="Maximum stack for maximum unnecessary satisfaction. A bold little pedestal for your mug and a quiet flex for the whole desk.">Maximum stack for maximum unnecessary satisfaction. A bold little pedestal for your mug and a quiet flex for the whole desk.</div>
							</div>
						</div>
						<svg style="display: none;">
							<symbol id="product-double-circles">
								<circle cx="10" cy="10" r="9.5" fill="#FFEDD7" fill-opacity=".1" stroke="#FFEDD6" stroke-dasharray="2 2"></circle><circle cx="9.999" cy="10.002" r="5.499" stroke="#FFEDD6" stroke-dasharray="2 2"></circle>
							</symbol>
						</svg>
						<div id="product-details-extra" class="body2">
							<div class="product-details-extra-item"><svg viewBox="0 0 20 20"><use href="#product-double-circles"></use></svg><div>Single layer lift</div></div>
							<div class="product-details-extra-item"><svg viewBox="0 0 20 20"><use href="#product-double-circles"></use></svg><div>Natural cork insulation</div></div>
							<div class="product-details-extra-item"><svg viewBox="0 0 20 20"><use href="#product-double-circles"></use></svg><div>Stable grip on everyday surfaces</div></div>
						</div>
						<table id="product-compare" class="sub2">
							<tbody>
								<tr>
									<th><h5>New</h5><h4>ORYZO</h4></th>
									<th><h5>New</h5><h4>ORYZO Pro</h4></th>
									<th><h5>New</h5><h4>ORYZO Pro Max</h4></th>
								</tr>
								<tr class="body3">
									<td><span>One coaster. One job. Done beautifully.</span></td>
									<td><span>Twice the cork. Twice the commitment. Still effortless.</span></td>
									<td><span>Three layers of confidence. For people who like their coffee slightly above it all.</span></td>
								</tr>
								<tr><td><div>Stack:</div><span>1</span></td><td><div>Stack:</div><span>2</span></td><td><div>Stack:</div><span>3</span></td></tr>
								<tr><td><div>Lift:</div><span>1 coaster thick</span></td><td><div>Lift:</div><span>2 coasters thick</span></td><td><div>Lift:</div><span>3 coasters thick</span></td></tr>
								<tr><td><div>Material:</div><span>Cork</span></td><td><div>Material:</div><span>Cork</span></td><td><div>Material:</div><span>Cork</span></td></tr>
								<tr><td><div>Connectivity:</div><span>None</span></td><td><div>Connectivity:</div><span>None</span></td><td><div>Connectivity:</div><span>None</span></td></tr>
								<tr><td><div>Pairing:</div><span>Not Required</span></td><td><div>Pairing:</div><span>Not Required</span></td><td><div>Pairing:</div><span>Not Required</span></td></tr>
								<tr><td><div>Updates:</div><span>Never</span></td><td><div>Updates:</div><span>Never</span></td><td><div>Updates:</div><span>Never</span></td></tr>
								<tr><td><div>Best for:</div><span>Daily mugs and quiet desks</span></td><td><div>Best for:</div><span>Taller cups and extra stability</span></td><td><div>Best for:</div><span>Maximum lift and maximum presence</span></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
