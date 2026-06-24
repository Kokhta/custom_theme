<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Kriss_Header_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return '1-header';
	}

	public function get_title() {
		return esc_html__( '1-Header', 'kriss' );
	}

	public function get_icon() {
		return 'eicon-header';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'kriss' ),
			]
		);

		$this->add_control(
			'logo_url',
			[
				'label' => esc_html__( 'Logo URL', 'kriss' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '/',
				],
			]
		);

		$this->add_control(
			'nav_links',
			[
				'label' => esc_html__( 'Navigation Links', 'kriss' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'text',
						'label' => esc_html__( 'Text', 'kriss' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'Link',
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'kriss' ),
						'type' => \Elementor\Controls_Manager::URL,
					],
				],
				'default' => [
					[ 'text' => 'Home', 'link' => [ 'url' => '/' ] ],
					[ 'text' => 'Setup', 'link' => [ 'url' => '/setup' ] ],
					[ 'text' => 'Plans', 'link' => [ 'url' => '/plans' ] ],
					[ 'text' => 'About', 'link' => [ 'url' => '/about' ] ],
					[ 'text' => 'FAQ', 'link' => [ 'url' => '/faq' ] ],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Book Demo',
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'kriss' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '/booking',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_attributes',
			[
				'label' => esc_html__( 'Attributes & Classes', 'kriss' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'logo_class',
			[
				'label' => esc_html__( 'Logo Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'logo svelte-na9uof',
			]
		);

		$this->add_control(
			'logo_id',
			[
				'label' => esc_html__( 'Logo ID', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
			]
		);

		$this->add_control(
			'nav_class',
			[
				'label' => esc_html__( 'Nav Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'nav D9 glass-bg svelte-na9uof',
			]
		);

		$this->add_control(
			'nav_id',
			[
				'label' => esc_html__( 'Nav ID', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
			]
		);

		$this->add_control(
			'nav_links_class',
			[
				'label' => esc_html__( 'Nav Links Container Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'nav_links svelte-na9uof',
			]
		);

		$this->add_control(
			'nav_link_class',
			[
				'label' => esc_html__( 'Nav Link Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'nav_link svelte-na9uof',
			]
		);

		$this->add_control(
			'button_class',
			[
				'label' => esc_html__( 'Button Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'nav_button svelte-na9uof',
			]
		);

		$this->add_control(
			'mobile_nav_class',
			[
				'label' => esc_html__( 'Mobile Nav Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'mobile-nav svelte-na9uof',
			]
		);

		$this->add_control(
			'mobile_nav_button_class',
			[
				'label' => esc_html__( 'Mobile Nav Button Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'nav_button glass-bg D9 svelte-na9uof',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_svg',
			[
				'label' => esc_html__( 'SVG Attributes', 'kriss' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'svg_width',
			[
				'label' => esc_html__( 'SVG Width', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '501.08331298828125',
			]
		);

		$this->add_control(
			'svg_height',
			[
				'label' => esc_html__( 'SVG Height', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '69',
			]
		);

		$this->add_control(
			'svg_viewbox',
			[
				'label' => esc_html__( 'SVG ViewBox', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '0 0 501.08331298828125 69',
			]
		);

		$this->add_control(
			'rect_1_style',
			[
				'label' => esc_html__( 'Rect 1 Style', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'stroke-dashoffset: 22.5469px; stroke-dasharray: 32.5664px, 1081.86px;',
			]
		);

		$this->add_control(
			'rect_2_style',
			[
				'label' => esc_html__( 'Rect 2 Style', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'stroke-dashoffset: -534.818px; stroke-dasharray: 32.5664px, 1081.86px;',
			]
		);

		$this->add_control(
			'rect_3_style',
			[
				'label' => esc_html__( 'Rect 3 Style', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'stroke-dasharray: 504.799px, 609.633px; stroke-dashoffset: -20.0194px;',
			]
		);

		$this->add_control(
			'rect_4_style',
			[
				'label' => esc_html__( 'Rect 4 Style', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'stroke-dasharray: 504.5px, 609.931px; stroke-dashoffset: 1651.48px;',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<a id="<?php echo esc_attr($settings['logo_id']); ?>" href="<?php echo esc_url( $settings['logo_url']['url'] ); ?>" class="<?php echo esc_attr($settings['logo_class']); ?>" data-elementor-setting-key="logo_url"></a>

		<div id="<?php echo esc_attr($settings['nav_id']); ?>" class="<?php echo esc_attr($settings['nav_class']); ?>">
			<div class="nav_stroke svelte-na9uof">
				<div class="border svelte-dtzj9">
					<svg fill="none" xmlns="http://www.w3.org/2000/svg" class="svelte-dtzj9" width="<?php echo esc_attr($settings['svg_width']); ?>" height="<?php echo esc_attr($settings['svg_height']); ?>" viewBox="<?php echo esc_attr($settings['svg_viewbox']); ?>">
						<rect x="1.5" y="1.5" stroke-width="3" stroke-linecap="round" stroke="white" width="498.08331298828125" height="66" rx="8" style="<?php echo esc_attr($settings['rect_1_style']); ?>"></rect>
						<rect x="1.5" y="1.5" stroke-width="3" stroke-linecap="round" stroke="white" width="498.08331298828125" height="66" rx="8" style="<?php echo esc_attr($settings['rect_2_style']); ?>"></rect>
						<rect x="1.5" y="1.5" stroke-width="1" stroke-linecap="round" stroke="rgba(255, 255, 255, 0.3)" width="498.08331298828125" height="66" rx="8" style="<?php echo esc_attr($settings['rect_3_style']); ?>"></rect>
						<rect x="1.5" y="1.5" stroke-width="1" stroke-linecap="round" stroke="rgba(255, 255, 255, 0.3)" width="498.08331298828125" height="66" rx="8" style="<?php echo esc_attr($settings['rect_4_style']); ?>"></rect>
					</svg>
				</div>
			</div>
			<div class="<?php echo esc_attr($settings['nav_links_class']); ?>" data-elementor-setting-key="nav_links">
				<?php foreach ( $settings['nav_links'] as $item ) : ?>
					<a href="<?php echo esc_url( $item['link']['url'] ); ?>" class="<?php echo esc_attr($settings['nav_link_class']); ?>"><?php echo esc_html( $item['text'] ); ?></a>
				<?php endforeach; ?>
			</div>
			<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="<?php echo esc_attr($settings['button_class']); ?>" data-elementor-setting-key="button_text"><?php echo esc_html( $settings['button_text'] ); ?></a>
		</div>

		<div class="<?php echo esc_attr($settings['mobile_nav_class']); ?>">
			<div class="nav_stroke svelte-na9uof">
				<div class="border svelte-dtzj9">
					<svg fill="none" xmlns="http://www.w3.org/2000/svg" class="svelte-dtzj9" width="0" height="0" viewBox="0 0 0 0">
						<rect x="1.5" y="1.5" stroke-width="3" stroke-linecap="round" stroke="white" width="0" height="0" rx="8" style="stroke-dashoffset: 22.5664px;"></rect>
						<rect x="1.5" y="1.5" stroke-width="3" stroke-linecap="round" stroke="white" width="0" height="0" rx="8" style="stroke-dashoffset: 22.5664px;"></rect>
						<rect x="1.5" y="1.5" stroke-width="1" stroke-linecap="round" stroke="rgba(255, 255, 255, 0.3)" width="0" height="0" rx="8" style="stroke-dashoffset: -20px;"></rect>
						<rect x="1.5" y="1.5" stroke-width="1" stroke-linecap="round" stroke="rgba(255, 255, 255, 0.3)" width="0" height="0" rx="8" style="stroke-dashoffset: -20px;"></rect>
					</svg>
				</div>
			</div>
			<div class="menu-prompt glass-bg svelte-na9uof">
				<div class="menu-prompt_icon svelte-na9uof">
					<svg width="37" height="37" viewBox="0 0 37 37" xmlns="http://www.w3.org/2000/svg" fill="#080232" class="svelte-na9uof">
						<rect x="9" y="18" width="19" height="1"></rect>
						<rect x="9" y="22" width="19" height="1"></rect>
						<rect x="9" y="14" width="19" height="1"></rect>
					</svg>
				</div>
			</div>
			<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="<?php echo esc_attr($settings['mobile_nav_button_class']); ?>" data-elementor-setting-key="button_text"><?php echo esc_html( $settings['button_text'] ); ?></a>
		</div>
		<?php
	}
}
