<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_4 extends \Elementor\Widget_Base {

	public function get_name() { return '4-wearable'; }
	public function get_title() { return esc_html__( '4. Wearable', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-device-mobile'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
		$this->add_control( 'title_part1', [ 'label' => esc_html__( 'Title Part 1', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'So portable,' ] );
		$this->add_control( 'title_part2', [ 'label' => esc_html__( 'Title Part 2', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => "it's wearable" ] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'item_id', [ 'label' => 'ID', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'item_type', [ 'label' => 'Type', 'type' => \Elementor\Controls_Manager::SELECT, 'options' => [ 'image' => 'Image', 'video' => 'Video', 'intro' => 'Intro', 'outro' => 'Outro' ], 'default' => 'image' ] );
		$repeater->add_control( 'item_file', [ 'label' => 'File', 'type' => \Elementor\Controls_Manager::MEDIA ] );
		$repeater->add_control( 'thumb_file', [ 'label' => 'Thumbnail', 'type' => \Elementor\Controls_Manager::MEDIA ] );

		$this->add_control( 'gallery_items', [ 'label' => esc_html__( 'Gallery Items', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[ 'item_id' => 'intro', 'item_type' => 'intro', 'thumb_file' => [ 'url' => '/images/wearable-gallery/thumbs/intro.webp' ] ],
			[ 'item_id' => 'yoga', 'item_type' => 'video', 'item_file' => [ 'url' => '/images/wearable-gallery/yoga.mp4' ], 'thumb_file' => [ 'url' => '/images/wearable-gallery/thumbs/yoga.webp' ] ],
			[ 'item_id' => 'shoulder', 'item_type' => 'image', 'item_file' => [ 'url' => '/images/wearable-gallery/shoulder.webp' ], 'thumb_file' => [ 'url' => '/images/wearable-gallery/thumbs/shoulder.webp' ] ],
		] ] );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="wearable" class="section" style="visibility: hidden;">
			<div class="section__inner o-container">
				<div id="wearable-copy">
					<h4 id="wearable-title">
						<span aria-label="<?php echo esc_attr($settings['title_part1']); ?>" style="transform: translate3d(0px, 114.633px, 0px); opacity: 1;">
							<?php echo esc_html($settings['title_part1']); ?>
						</span>
						<span style="opacity: 0;"><?php echo esc_html($settings['title_part2']); ?></span>
					</h4>
					<div id="wearable-title-2-dummy"></div>
				</div>

				<div class="wearable-gallery-thumbs-wrapper is-left desktop-only" style="opacity: 0;">
					<div class="wearable-gallery-thumbs-move-container" style="transform: translate3d(0px, -50%, 0px);">
						<?php foreach($settings['gallery_items'] as $item): ?>
							<div class="wearable-gallery-thumb-item"><img src="<?php echo esc_url($item['thumb_file']['url']); ?>"></div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="wearable-gallery-thumbs-wrapper is-right desktop-only" style="opacity: 0;">
					<div class="wearable-gallery-thumbs-move-container" style="transform: translate3d(0px, -50%, 0px);">
						<?php foreach($settings['gallery_items'] as $item): ?>
							<div class="wearable-gallery-thumb-item"><img src="<?php echo esc_url($item['thumb_file']['url']); ?>"></div>
						<?php endforeach; ?>
					</div>
				</div>

				<div id="wearable-main">
					<div id="wearable-main-small"></div>
					<canvas id="wearable-main-canvas" width="382" height="489" style="width: 317.533px; height: 406.8px; visibility: hidden; opacity: 1;"></canvas>
					<div id="wearable-gallery-wrapper" style="visibility: hidden;">
						<div id="wearable-gallery-move-container" style="transform: translate3d(0px, 0px, 0px);">
							<?php foreach($settings['gallery_items'] as $item): ?>
								<div class="wearable-gallery-item" data-id="<?php echo esc_attr($item['item_id']); ?>" data-type="<?php echo esc_attr($item['item_type']); ?>" style="visibility: hidden;">
									<div class="wearable-gallery-item-inner">
										<?php if($item['item_type'] === 'video'): ?>
											<video playsinline="" loop="" src="<?php echo esc_url($item['item_file']['url']); ?>" crossorigin="anonymous"></video>
										<?php elseif($item['item_type'] === 'image'): ?>
											<img src="<?php echo esc_url($item['item_file']['url']); ?>">
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
