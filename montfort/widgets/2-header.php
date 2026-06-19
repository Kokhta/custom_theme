<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Widget_2_Header extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort-header';
	}

	public function get_title() {
		return esc_html__( '2-Header', 'montfort' );
	}

	public function get_icon() {
		return 'eicon-header';
	}

	public function get_categories() {
		return [ 'montfort' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_header_content',
			[
				'label' => esc_html__( 'Header Content', 'montfort' ),
			]
		);

		$this->add_control(
			'header_id',
			[
				'label' => esc_html__( 'Header ID', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'header',
			]
		);

		$this->add_control(
			'data_theme',
			[
				'label' => esc_html__( 'Data Theme', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'light',
			]
		);

		$this->add_control(
			'data_component',
			[
				'label' => esc_html__( 'Data Component', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Header',
			]
		);

		$this->add_control(
			'data_astro_cid',
			[
				'label' => esc_html__( 'Data Astro CID', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'data-astro-cid-4wsjtibl',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Link Text', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Link', 'montfort' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'link_url',
			[
				'label' => esc_html__( 'Link URL', 'montfort' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'montfort' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$repeater->add_control(
			'is_active',
			[
				'label' => esc_html__( 'Is Active', 'montfort' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'montfort' ),
				'label_off' => esc_html__( 'No', 'montfort' ),
				'return_value' => 'active',
				'default' => '',
			]
		);

		$this->add_control(
			'menu_links',
			[
				'label' => esc_html__( 'Menu Links', 'montfort' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'link_text' => 'Montfort Group', 'link_url' => [ 'url' => '/' ] ],
					[ 'link_text' => 'Montfort Trading', 'link_url' => [ 'url' => '/trading/' ] ],
					[ 'link_text' => 'Montfort Capital', 'link_url' => [ 'url' => '/capital/' ] ],
					[ 'link_text' => 'Montfort Maritime', 'link_url' => [ 'url' => '/maritime/' ] ],
					[ 'link_text' => 'Fort Energy', 'link_url' => [ 'url' => '/fort-energy/' ], 'is_active' => 'active' ],
				],
				'title_field' => '{{{ link_text }}}',
			]
		);

		$this->add_control(
			'news_count',
			[
				'label' => esc_html__( 'News Count', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '20',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$cid = $settings['data_astro_cid'];
		?>
		<header data-astro-transition-persist="header" id="<?php echo esc_attr( $settings['header_id'] ); ?>" data-theme="<?php echo esc_attr( $settings['data_theme'] ); ?>" data-component="<?php echo esc_attr( $settings['data_component'] ); ?>" <?php echo esc_attr( $cid ); ?>="" class="">
			<div class="grid container-menu" <?php echo esc_attr( $cid ); ?>="">
				<nav class="tb:col-start-1 tb:col-end-25 dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23" <?php echo esc_attr( $cid ); ?>="">
					<div class="menu-links-w" <?php echo esc_attr( $cid ); ?>="">
						<ul <?php echo esc_attr( $cid ); ?>="">
							<?php foreach ( $settings['menu_links'] as $link ) : ?>
								<li <?php echo esc_attr( $cid ); ?>="">
									<a href="<?php echo esc_url( $link['link_url']['url'] ); ?>" <?php echo esc_attr( $cid ); ?>="true" class="nav-link <?php echo esc_attr( $link['is_active'] ); ?>">
										<span <?php echo esc_attr( $cid ); ?>=""><?php echo esc_html( $link['link_text'] ); ?></span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="navbar" <?php echo esc_attr( $cid ); ?>="" style="opacity: 1; translate: none; rotate: none; scale: none; transform: translate3d(642.817px, 0px, 0px) scale(0.1042, 1);"></div>
					</div>
					<div class="menu-w" <?php echo esc_attr( $cid ); ?>="">
						<a href="/news/" class="news-w" <?php echo esc_attr( $cid ); ?>="true">
							<p <?php echo esc_attr( $cid ); ?>="">News</p>
							<div class="counter" <?php echo esc_attr( $cid ); ?>="">
								<span data-total-count="<?php echo esc_attr( $settings['news_count'] ); ?>" class="number" <?php echo esc_attr( $cid ); ?>=""><?php echo esc_html( $settings['news_count'] ); ?></span>
							</div>
						</a>
						<button class="menu-cta" <?php echo esc_attr( $cid ); ?>="">
							<p <?php echo esc_attr( $cid ); ?>="">
								<span <?php echo esc_attr( $cid ); ?>="">Menu</span><span <?php echo esc_attr( $cid ); ?>="">Menu</span>
							</p>
							<div class="dots-w" <?php echo esc_attr( $cid ); ?>="">
								<div class="dot" <?php echo esc_attr( $cid ); ?>=""></div><div class="dot" <?php echo esc_attr( $cid ); ?>=""></div><div class="dot" <?php echo esc_attr( $cid ); ?>=""></div><div class="dot" <?php echo esc_attr( $cid ); ?>=""></div>
							</div>
						</button>
					</div>
				</nav>
			</div>
		</header>
		<?php
	}
}
