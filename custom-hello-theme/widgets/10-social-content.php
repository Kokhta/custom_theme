<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_10 extends \Elementor\Widget_Base {

	public function get_name() { return '10-social-content'; }
	public function get_title() { return esc_html__( '10. Social Content', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-gallery-grid'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'item_id', [ 'label' => 'ID', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'item_title', [ 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'item_note', [ 'label' => 'Note', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'item_image', [ 'label' => 'Image', 'type' => \Elementor\Controls_Manager::MEDIA ] );

		$this->add_control( 'items', [ 'label' => esc_html__( 'Grid Items', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[ 'item_id' => 'edge', 'item_title' => 'Runs on the edge', 'item_note' => 'On-device.', 'item_image' => [ 'url' => '/images/social-content/edge.webp' ] ],
			[ 'item_id' => 'always_on', 'item_title' => 'Always On', 'item_note' => '24/7 UPTIME.', 'item_image' => [ 'url' => '/images/social-content/always_on.webp' ] ],
		] ] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="social-content" class="section" style="visibility: hidden; height: 3777.35px;">
			<div class="section__inner">
				<div id="social-content-items-wrapper" style="transform: translate3d(0px, 0px, 0px);">
					<?php foreach($settings['items'] as $item): ?>
					<div class="social-content-item" data-id="<?php echo esc_attr($item['item_id']); ?>">
						<div class="social-content-item-clipper">
							<div class="social-content-item-inner">
								<img src="<?php echo esc_url($item['item_image']['url']); ?>" class="social-content-item-bg">
								<?php if(!empty($item['item_title'])): ?><h5 class="social-content-item-title"><?php echo esc_html($item['item_title']); ?></h5><?php endif; ?>
								<?php if(!empty($item['item_note'])): ?><div class="social-content-item-note"><?php echo esc_html($item['item_note']); ?></div><?php endif; ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
