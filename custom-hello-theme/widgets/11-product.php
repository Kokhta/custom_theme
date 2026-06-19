<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_11 extends \Elementor\Widget_Base {

	public function get_name() { return '11-product'; }
	public function get_title() { return esc_html__( '11. Product', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-products'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
		$this->add_control( 'caption', [ 'label' => 'Caption', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Choose you own' ] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'row_label', [ 'label' => 'Row Label', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'val1', [ 'label' => 'ORYZO Value', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'val2', [ 'label' => 'Pro Value', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'val3', [ 'label' => 'Pro Max Value', 'type' => \Elementor\Controls_Manager::TEXT ] );

		$this->add_control( 'rows', [ 'label' => esc_html__( 'Table Rows', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[ 'row_label' => 'Stack:', 'val1' => '1', 'val2' => '2', 'val3' => '3' ],
			[ 'row_label' => 'Material:', 'val1' => 'Cork', 'val2' => 'Cork', 'val3' => 'Cork' ],
		] ] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="product" class="section" style="visibility: hidden;">
			<div class="section__inner o-container">
				<div id="product-hero" style="visibility: hidden;">
					<div id="product-hero-inner">
						<h4 id="product-hero-caption"><?php echo esc_html($settings['caption']); ?></h4>
						<div id="product-hero-title-wrapper">
							<svg id="product-hero-title"><use href="#logo-tmpl"></use></svg>
						</div>
						<div id="product-hero-options">
							<button class="btn is-large is-dark is-active">ORYZO</button>
							<button class="btn is-large is-dark">ORYZO Pro</button>
							<button class="btn is-large is-dark">ORYZO Pro Max</button>
						</div>
					</div>
				</div>
				<table id="product-compare" class="sub2">
					<tbody>
						<tr>
							<th><h5>New</h5><h4>ORYZO</h4></th>
							<th><h5>New</h5><h4>ORYZO Pro</h4></th>
							<th><h5>New</h5><h4>ORYZO Pro Max</h4></th>
						</tr>
						<?php foreach($settings['rows'] as $row): ?>
						<tr>
							<td><div><?php echo esc_html($row['row_label']); ?></div><span><?php echo esc_html($row['val1']); ?></span></td>
							<td><div><?php echo esc_html($row['row_label']); ?></div><span><?php echo esc_html($row['val2']); ?></span></td>
							<td><div><?php echo esc_html($row['row_label']); ?></div><span><?php echo esc_html($row['val3']); ?></span></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php
	}
}
