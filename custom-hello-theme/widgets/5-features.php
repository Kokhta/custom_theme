<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_5 extends \Elementor\Widget_Base {

	public function get_name() { return '5-features'; }
	public function get_title() { return esc_html__( '5. Features', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-bullet-list'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'item_id', [ 'label' => 'ID', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'elevate' ] );
		$repeater->add_control( 'item_tagline', [ 'label' => 'Tagline', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Rise above mediocrity' ] );
		$repeater->add_control( 'item_title', [ 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Elevate your coffee experience' ] );
		$repeater->add_control( 'item_desc', [ 'label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'With a precision-engineered lift (exactly one coaster thick), Oryzo doesn’t just hold your mug - it elevates it.' ] );
		$repeater->add_control( 'item_icon', [ 'label' => 'Icon SVG', 'type' => \Elementor\Controls_Manager::CODE, 'language' => 'html' ] );

		$this->add_control( 'feature_items', [ 'label' => esc_html__( 'Feature Items', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[ 'item_id' => 'elevate', 'item_tagline' => 'Rise above mediocrity', 'item_title' => 'Elevate your coffee experience' ],
			[ 'item_id' => 'temperature', 'item_tagline' => 'Handles Extremes with Ease', 'item_title' => 'Thermodynamic stability' ],
			[ 'item_id' => 'curve', 'item_tagline' => 'Perfectly Round, Seriously', 'item_title' => 'Now 37.9% More Circular' ],
		] ] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="features" class="section" style="visibility: hidden;">
			<div class="section__inner o-container">
				<div id="features-items">
					<?php foreach ( $settings['feature_items'] as $item ) : ?>
					<div id="features-item-<?php echo esc_attr($item['item_id']); ?>" class="features-item" data-id="<?php echo esc_attr($item['item_id']); ?>" style="opacity: 0; visibility: hidden;">
						<div class="features-item-top">
							<div class="features-item-icon">
								<?php echo $item['item_icon']; // SVG ?>
							</div>
							<div class="features-item-tagline sub1" aria-label="<?php echo esc_attr($item['item_tagline']); ?>">
								<?php echo esc_html($item['item_tagline']); ?>
							</div>
						</div>
						<div class="features-item-desc body2" aria-label="<?php echo esc_attr($item['item_desc']); ?>">
							<?php echo esc_html($item['item_desc']); ?>
						</div>
						<div class="o-dashline" style="width: 0%; opacity: 1;"></div>
						<h3 class="features-item-title" aria-label="<?php echo esc_attr($item['item_title']); ?>">
							<?php echo esc_html($item['item_title']); ?>
						</h3>
					</div>
					<?php endforeach; ?>
				</div>
				<div id="features-circular-logo-wrapper">
					<svg id="features-circular-logo" style="opacity: 0; transform: translateY(0px) scale(1); color: rgb(255, 237, 215);"><use href="#logo-tmpl"></use></svg>
				</div>
				<canvas id="features-curve-canvas" width="1401" height="590" style="visibility: hidden; opacity: 0;"></canvas>
			</div>
		</div>
		<?php
	}
}
