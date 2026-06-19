<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_8_sustainability extends \Elementor\Widget_Base {

	public function get_name() {
		return '8-sustainability';
	}

	public function get_title() {
		return esc_html__( '8-sustainability', 'custom-hello-333' );
	}

	public function get_icon() {
		return 'eicon-leaf';
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
			'tagline',
			[
				'label' => esc_html__( 'Tagline', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '100% Plant-based',
			]
		);

		$this->add_control(
			'title_pre',
			[
				'label' => esc_html__( 'Title Pre', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Vegan-friendly',
			]
		);

		$this->add_control(
			'title_main',
			[
				'label' => esc_html__( 'Title Main', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'sustainability',
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => esc_html__( 'Description', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Pure cork sourced sustainably. Completely vegan - no cows were harmed, but it might be full of "bull"sh*t.',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control('item_title', ['label' => 'Item Title', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('item_desc', ['label' => 'Item Description', 'type' => \Elementor\Controls_Manager::TEXTAREA]);
		$repeater->add_control('item_num', ['label' => 'Item Number (Optional)', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('canvas_id', ['label' => 'Canvas ID (Optional)', 'type' => \Elementor\Controls_Manager::TEXT]);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Sustainability Items', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_title' => 'Average age of first harvest',
						'item_desc' => 'Cork oaks are typically first harvested at around 25 years, once the bark is thick enough to remove safely.',
						'item_num' => '25',
					],
					[
						'item_title' => 'Harvesting interval',
						'item_desc' => 'After each harvest, the bark takes about 9 years to regrow, making cork a renewable material.',
						'canvas_id' => 'sustainability-rive-canvas-harvesting',
					],
					[
						'item_title' => 'Power draw while in use',
						'item_desc' => 'No compute. No tokens. So you can say “please” and “thank you” as much as you want, guilt free.',
						'canvas_id' => 'sustainability-rive-canvas-text',
					],
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="sustainability" class="section" style="visibility: hidden; background-color: transparent; color: rgb(255, 237, 215);">
			<div class="section__inner o-container">
				<div id="sustainability-hero" style="visibility: hidden;">
					<div id="sustainability-hero-inner">
						<div id="sustainability-tagline" class="sub2" style="transform: translateY(-0.859228em); opacity: 0.0493163;"><?php echo esc_html($settings['tagline']); ?></div>
						<div id="sustainability-title">
							<h4 id="sustainability-title-pre" style="transform: translateX(-20%); opacity: 0;"><?php echo esc_html($settings['title_pre']); ?></h4>
							<h2 id="sustainability-title-main"><?php echo esc_html($settings['title_main']); ?></h2>
						</div>
						<div id="sustainability-desc" class="body2" aria-label="<?php echo esc_attr($settings['desc']); ?>">
							<?php echo esc_html($settings['desc']); ?>
						</div>
					</div>
				</div>
				<div id="sustainability-items" class="o-grid">
					<?php foreach ( $settings['items'] as $item ) : ?>
					<div class="sustainability-item">
						<h3 class="sustainability-item-title" aria-label="<?php echo esc_attr($item['item_title']); ?>"><?php echo esc_html($item['item_title']); ?></h3>
						<div class="sustainability-item-desc body2" aria-label="<?php echo esc_attr($item['item_desc']); ?>"><?php echo esc_html($item['item_desc']); ?></div>
						<?php if ($item['item_num']) : ?>
							<div class="sustainability-item-num"><?php echo esc_html($item['item_num']); ?></div>
						<?php endif; ?>
						<?php if ($item['canvas_id']) : ?>
							<canvas id="<?php echo esc_attr($item['canvas_id']); ?>" width="481" height="481" style="opacity: 0;"></canvas>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
