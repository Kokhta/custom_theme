<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_10_social_content extends \Elementor\Widget_Base {

	public function get_name() {
		return '10-social-content';
	}

	public function get_title() {
		return esc_html__( '10-social-content', 'custom-hello-333' );
	}

	public function get_icon() {
		return 'eicon-social-icons';
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'item_id',
			[
				'label' => esc_html__( 'ID', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'edge',
			]
		);

		$repeater->add_control(
			'item_offset',
			[
				'label' => esc_html__( 'Offset', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '0',
			]
		);

		$repeater->add_control(
			'item_title',
			[
				'label' => esc_html__( 'Title', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '',
			]
		);

		$repeater->add_control(
			'item_note',
			[
				'label' => esc_html__( 'Note', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '',
			]
		);

		$repeater->add_control(
			'item_img',
			[
				'label' => esc_html__( 'Image Path', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
			]
		);

		$repeater->add_control(
			'item_img_mobile',
			[
				'label' => esc_html__( 'Mobile Image Path', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
			]
		);

		$repeater->add_control(
			'item_cover',
			[
				'label' => esc_html__( 'Cover Image Path', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
			]
		);

		$this->add_control(
			'social_items',
			[
				'label' => esc_html__( 'Social Items', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_id' => 'edge',
						'item_offset' => '0.49',
						'item_title' => 'Runs on the edge<br>Refuses the cloud',
						'item_note' => 'On-device.',
						'item_img' => '/images/social-content/edge.webp',
						'item_img_mobile' => '/images/social-content/edge_MOBILE.webp',
					],
					[
						'item_id' => 'sticker_1',
						'item_offset' => '0',
						'item_img' => '/images/social-content/sticker_1.webp',
						'item_img_mobile' => '/images/social-content/sticker_1_MOBILE.webp',
					],
					[
						'item_id' => 'always_on',
						'item_offset' => '0.825',
						'item_title' => 'Always On',
						'item_note' => '24/7 UPTIME. No power required.',
						'item_img' => '/images/social-content/always_on.webp',
						'item_img_mobile' => '/images/social-content/always_on_MOBILE.webp',
						'item_cover' => '/images/social-content/always_on_cover.webp',
					],
					[
						'item_id' => 'color',
						'item_offset' => '0',
						'item_img' => '/images/social-content/color.webp',
						'item_img_mobile' => '/images/social-content/color_MOBILE.webp',
					],
					[
						'item_id' => '3090',
						'item_offset' => '0.47',
						'item_title' => 'Runs on RTX 3090',
						'item_note' => 'No More OOM on any consumer GPUs',
						'item_img' => '/images/social-content/3090.webp',
						'item_img_mobile' => '/images/social-content/3090_MOBILE.webp',
						'item_cover' => '/images/social-content/3090_cover.webp',
					],
					[
						'item_id' => 'perfect',
						'item_offset' => '0',
						'item_note' => 'Perfect By Design',
						'item_img' => '/images/social-content/perfect.webp',
						'item_img_mobile' => '/images/social-content/perfect_MOBILE.webp',
					],
					[
						'item_id' => 'drop_test',
						'item_offset' => '0.5',
						'item_title' => 'Drop-Tested',
						'item_note' => '<span>Test conditions: hard surface</span> <span>DATE: 02/29/2026</span> <span>Damage: The Floor ;)</span>',
						'item_img' => '/images/social-content/drop_test.webp',
						'item_img_mobile' => '/images/social-content/drop_test_MOBILE.webp',
						'item_cover' => '/images/social-content/drop_test_cover.webp',
					],
					[
						'item_id' => 'sticker_2',
						'item_offset' => '0',
						'item_img' => '/images/social-content/sticker_2.webp',
						'item_img_mobile' => '/images/social-content/sticker_2_MOBILE.webp',
					],
					[
						'item_id' => 'legacy_support',
						'item_offset' => '0.61',
						'item_title' => 'Legacy Support',
						'item_note' => 'Supporting backward compatibility since the 5th millennium BCE',
						'item_img' => '/images/social-content/legacy_support.webp',
						'item_img_mobile' => '/images/social-content/legacy_support_MOBILE.webp',
					],
				],
				'title_field' => '{{{ item_id }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="social-content" class="section" style="visibility: hidden; height: 3777.35px;">
			<div class="section__inner">
				<div id="social-content-items-wrapper" style="transform: translate3d(0px, 0px, 0px);">
					<?php foreach ( $settings['social_items'] as $item ) : ?>
					<div class="social-content-item" data-id="<?php echo esc_attr($item['item_id']); ?>" data-offset="<?php echo esc_attr($item['item_offset']); ?>" style="transform: translateZ(0px); visibility: visible;">
						<div class="social-content-item-clipper" style="width: 0%;">
							<div class="social-content-item-inner" style="opacity: 1;">
								<picture class="social-content-item-bg">
									<?php if ($item['item_img']) : ?><source media="(min-width:768px)" srcset="<?php echo esc_url($item['item_img']); ?>"><?php endif; ?>
									<img src="<?php echo esc_url($item['item_img_mobile']); ?>" loading="eager" decoding="async">
								</picture>
								<?php if ($item['item_title']) : ?><h5 class="social-content-item-title"><?php echo $item['item_title']; ?></h5><?php endif; ?>
								<?php if ($item['item_note']) : ?><div class="social-content-item-note"><?php echo $item['item_note']; ?></div><?php endif; ?>
								<?php if ($item['item_cover']) : ?>
								<picture class="social-content-item-cover desktop-only">
									<source media="(min-width:768px)" srcset="<?php echo esc_url($item['item_cover']); ?>">
									<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" width="1" height="1" loading="eager" decoding="async">
								</picture>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div id="social-content-progress" class="mobile-only">
					<?php foreach ( $settings['social_items'] as $index => $item ) : ?>
					<div class="social-content-progress-item<?php echo ($index === 2) ? ' is-active' : ''; ?>"></div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
