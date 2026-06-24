<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MountFort_Widget_2_Header extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mountfort_header';
	}

	public function get_title() {
		return esc_html__( '2-Header', 'mountfort' );
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
				'label' => esc_html__( 'Content', 'mountfort' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'header_id', [ 'label' => 'Header ID', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'header' ] );
		$this->add_control( 'header_class', [ 'label' => 'Header Class', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'fade' ] );
		$this->add_control( 'header_theme', [ 'label' => 'Header Theme', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'dark' ] );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'link_text', [
				'label' => esc_html__( 'Link Text', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Link' , 'mountfort' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'link_url', [
				'label' => esc_html__( 'Link URL', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'mountfort' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$repeater->add_control(
			'is_active', [
				'label' => esc_html__( 'Is Active?', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$this->add_control(
			'menu_links',
			[
				'label' => esc_html__( 'Menu Links', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'link_text' => 'Montfort Group', 'link_url' => [ 'url' => '/' ], 'is_active' => 'yes' ],
					[ 'link_text' => 'Montfort Trading', 'link_url' => [ 'url' => '/trading/' ] ],
					[ 'link_text' => 'Montfort Capital', 'link_url' => [ 'url' => '/capital/' ] ],
					[ 'link_text' => 'Montfort Maritime', 'link_url' => [ 'url' => '/maritime/' ] ],
					[ 'link_text' => 'Fort Energy', 'link_url' => [ 'url' => '/fort-energy/' ] ],
				],
				'title_field' => '{{{ link_text }}}',
			]
		);

		$this->add_control(
			'news_count',
			[
				'label' => esc_html__( 'News Count', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '20',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<header data-astro-transition-persist="header" id="<?php echo esc_attr($settings['header_id']); ?>" data-theme="<?php echo esc_attr($settings['header_theme']); ?>" data-component="Header" data-astro-cid-4wsjtibl="" class="<?php echo esc_attr($settings['header_class']); ?>">
			<div class="grid container-menu" data-astro-cid-4wsjtibl="">
				<nav class="tb:col-start-1 tb:col-end-25 dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23" data-astro-cid-4wsjtibl="">
					<div class="menu-links-w" data-astro-cid-4wsjtibl="">
						<ul data-astro-cid-4wsjtibl="">
							<?php foreach ( $settings['menu_links'] as $link ) : ?>
								<li data-astro-cid-4wsjtibl="">
									<a href="<?php echo esc_url( $link['link_url']['url'] ); ?>" data-astro-cid-4wsjtibl="true" class="nav-link <?php echo $link['is_active'] ? 'active' : ''; ?>">
										<span data-astro-cid-4wsjtibl=""><?php echo esc_html( $link['link_text'] ); ?></span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="navbar" data-astro-cid-4wsjtibl="" style="translate: none; rotate: none; scale: none; transform: translate3d(16px, 0px, 0px) scale(0.4829, 1); opacity: 1;"></div>
					</div>
					<div class="menu-w" data-astro-cid-4wsjtibl="">
						<a href="/news/" class="news-w" data-astro-cid-4wsjtibl="true">
							<p data-astro-cid-4wsjtibl="">News</p>
							<div class="counter" data-astro-cid-4wsjtibl="">
								<span data-total-count="<?php echo esc_attr( $settings['news_count'] ); ?>" class="number" data-astro-cid-4wsjtibl=""><?php echo esc_html( $settings['news_count'] ); ?></span>
							</div>
						</a>
						<button class="menu-cta" data-astro-cid-4wsjtibl="">
							<p data-astro-cid-4wsjtibl="">
								<span data-astro-cid-4wsjtibl="">Menu</span><span data-astro-cid-4wsjtibl="">Menu</span>
							</p>
							<div class="dots-w" data-astro-cid-4wsjtibl="">
								<div class="dot" data-astro-cid-4wsjtibl=""></div><div class="dot" data-astro-cid-4wsjtibl=""></div><div class="dot" data-astro-cid-4wsjtibl=""></div><div class="dot" data-astro-cid-4wsjtibl=""></div>
							</div>
						</button>
					</div>
				</nav>
			</div>
		</header>
		<?php
	}
}
