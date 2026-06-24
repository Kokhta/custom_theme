<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Widget_1_Global_Elements extends Widget_Base {

	public function get_name() {
		return '1-global-elements';
	}

	public function get_title() {
		return esc_html__( '1-Global Elements', 'custom-hello-theme' );
	}

	public function get_icon() {
		return 'eicon-global-settings';
	}

	public function get_categories() {
		return [ 'custom-hello-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'cursor_section',
			[
				'label' => esc_html__( 'Cursor', 'custom-hello-theme' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'cursor_cid', [ 'type' => Controls_Manager::TEXT, 'label' => 'Cursor CID', 'default' => 'data-astro-cid-x6vourwi' ] );

		$this->end_controls_section();

        $this->start_controls_section(
			'header_section',
			[
				'label' => esc_html__( 'Header', 'custom-hello-theme' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new Repeater();
        $repeater->add_control( 'label', [ 'type' => Controls_Manager::TEXT, 'label' => 'Label' ] );
        $repeater->add_control( 'link', [ 'type' => Controls_Manager::URL, 'label' => 'Link' ] );
        $repeater->add_control( 'is_active', [ 'type' => Controls_Manager::SWITCHER, 'label' => 'Active', 'return_value' => 'active' ] );

        $this->add_control( 'header_links', [
            'label' => 'Header Links',
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [ 'label' => 'Montfort Group', 'link' => [ 'url' => '/' ], 'is_active' => 'active' ],
                [ 'label' => 'Montfort Trading', 'link' => [ 'url' => '/trading/' ] ],
                [ 'label' => 'Montfort Capital', 'link' => [ 'url' => '/capital/' ] ],
                [ 'label' => 'Montfort Maritime', 'link' => [ 'url' => '/maritime/' ] ],
                [ 'label' => 'Fort Energy', 'link' => [ 'url' => '/fort-energy/' ] ],
            ],
            'title_field' => '{{{ label }}}',
        ] );

        $this->add_control( 'news_label', [ 'type' => Controls_Manager::TEXT, 'label' => 'News Label', 'default' => 'News' ] );
        $this->add_control( 'news_count', [ 'type' => Controls_Manager::TEXT, 'label' => 'News Count', 'default' => '20' ] );

        $this->end_controls_section();

        $this->start_controls_section(
			'menu_section',
			[
				'label' => esc_html__( 'Menu Overlay', 'custom-hello-theme' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $terms_repeater = new Repeater();
        $terms_repeater->add_control( 'label', [ 'type' => Controls_Manager::TEXT, 'label' => 'Label' ] );
        $terms_repeater->add_control( 'link', [ 'type' => Controls_Manager::URL, 'label' => 'Link' ] );

        $this->add_control( 'terms_links', [
            'label' => 'Terms Links',
            'type' => Controls_Manager::REPEATER,
            'fields' => $terms_repeater->get_controls(),
            'default' => [
                [ 'label' => 'Contact', 'link' => [ 'url' => '/contact/' ] ],
                [ 'label' => 'ESG', 'link' => [ 'url' => '/#Sustainability' ] ],
                [ 'label' => 'Privacy policy', 'link' => [ 'url' => '/privacy-policy/' ] ],
                [ 'label' => 'Terms of use', 'link' => [ 'url' => '/terms-of-use/' ] ],
            ],
            'title_field' => '{{{ label }}}',
        ] );

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <!-- CURSOR -->
		<div data-astro-transition-persist="cursor" class="cursor" data-component="Cursor" <?php echo esc_attr( $settings['cursor_cid'] ); ?>>
			<div class="inner" <?php echo esc_attr( $settings['cursor_cid'] ); ?>>
				<div class="circle" <?php echo esc_attr( $settings['cursor_cid'] ); ?>></div>
				<div class="middle-dot" <?php echo esc_attr( $settings['cursor_cid'] ); ?>></div>
				<div class="dots dots-left" <?php echo esc_attr( $settings['cursor_cid'] ); ?>></div>
				<div class="dots dots-right" <?php echo esc_attr( $settings['cursor_cid'] ); ?>></div>
			</div>
		</div>

        <!-- HEADER -->
        <header data-astro-transition-persist="header" id="header" data-theme="light" data-component="Header" data-astro-cid-4wsjtibl>
			<div class="grid container-menu" data-astro-cid-4wsjtibl>
				<nav class="tb:col-start-1 tb:col-end-25 dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23" data-astro-cid-4wsjtibl>
					<div class="menu-links-w" data-astro-cid-4wsjtibl>
						<ul data-astro-cid-4wsjtibl>
							<?php foreach ( $settings['header_links'] as $index => $item ) :
                                $setting_key = $this->get_repeater_setting_key( 'label', 'header_links', $index );
                            ?>
								<li data-astro-cid-4wsjtibl>
									<a href="<?php echo esc_url( $item['link']['url'] ); ?>" data-astro-cid-4wsjtibl="true" class="nav-link <?php echo esc_attr( $item['is_active'] ); ?>">
										<span data-astro-cid-4wsjtibl <?php echo $this->get_render_attribute_string( $setting_key ); ?>><?php echo esc_html( $item['label'] ); ?></span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="navbar" data-astro-cid-4wsjtibl></div>
					</div>
					<div class="menu-w" data-astro-cid-4wsjtibl>
						<a href="/news/" class="news-w" data-astro-cid-4wsjtibl="true">
							<p data-astro-cid-4wsjtibl data-elementor-setting-key="news_label"><?php echo esc_html( $settings['news_label'] ); ?></p>
							<div class="counter no-unread" data-astro-cid-4wsjtibl>
								<span data-total-count="<?php echo esc_attr( $settings['news_count'] ); ?>" class="number" data-astro-cid-4wsjtibl data-elementor-setting-key="news_count">
									<?php echo esc_html( $settings['news_count'] ); ?>
								</span>
							</div>
						</a>
						<button class="menu-cta" data-astro-cid-4wsjtibl>
							<p data-astro-cid-4wsjtibl>
								<span data-astro-cid-4wsjtibl>Menu</span><span data-astro-cid-4wsjtibl>Menu</span>
							</p>
							<div class="dots-w" data-astro-cid-4wsjtibl>
								<div class="dot" data-astro-cid-4wsjtibl></div><div class="dot" data-astro-cid-4wsjtibl></div><div class="dot" data-astro-cid-4wsjtibl></div><div class="dot" data-astro-cid-4wsjtibl></div>
							</div>
						</button>
					</div>
				</nav>
			</div>
		</header>

        <!-- MENU OVERLAY -->
        <div data-astro-transition-persist="menu" class="montfort-menu" data-component="Menu" data-astro-cid-6fp6peiy>
			<div class="grid grid-nav" data-astro-cid-6fp6peiy>
				<nav class="col-start-1 col-end-5 tb:col-start-2 dk:col-start-5 lg:col-start-6 dk:col-end-14" data-astro-cid-6fp6peiy>
					<ul data-astro-cid-6fp6peiy>
						<?php foreach ( $settings['header_links'] as $item ) : ?>
							<li data-astro-cid-6fp6peiy>
								<a href="<?php echo esc_url( $item['link']['url'] ); ?>" data-astro-cid-6fp6peiy="true" class="nav-link <?php echo esc_attr( $item['is_active'] ); ?>">
									<div class="svg-container" data-astro-cid-6fp6peiy>
										<svg data-astro-cid-6fp6peiy="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true"><path fill="currentColor" d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"/></svg>
									</div>
									<div class="text-content" data-astro-cid-6fp6peiy>
										<span data-astro-cid-6fp6peiy><?php echo esc_html( $item['label'] ); ?></span>
									</div>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</div>
			<div class="grid grid-terms" data-astro-cid-6fp6peiy>
				<div class="terms-w col-start-3 col-end-5 tb:col-start-1 tb:col-end-5 dk:col-start-3 dk:col-end-20 lg:col-start-4 lg:col-end-20" data-astro-cid-6fp6peiy>
					<ul data-astro-cid-6fp6peiy>
						<?php foreach ( $settings['terms_links'] as $item ) : ?>
							<li class="terms-link" data-astro-cid-6fp6peiy>
								<a href="<?php echo esc_url( $item['link']['url'] ); ?>" data-astro-cid-6fp6peiy="true">
									<span data-astro-cid-6fp6peiy><?php echo esc_html( $item['label'] ); ?></span>
									<span data-astro-cid-6fp6peiy><?php echo esc_html( $item['label'] ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="overlay" data-astro-cid-6fp6peiy></div>
		</div>

        <!-- UTILITY CANVAS & SOUND -->
        <div id="canvas-wrapper" data-astro-transition-persist="webgl" aria-hidden="true">
			<canvas></canvas>
		</div>
        <div data-astro-transition-persist="sound" class="buttons-container" data-theme="dark" data-component="Sound" data-astro-cid-epuvuop6>
			<div class="buttons-wrapper grid" data-astro-cid-epuvuop6>
				<div class="buttons-inner dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23" data-astro-cid-epuvuop6>
					<button id="scroll-top" class="scroll-top" data-astro-cid-epuvuop6>
						<svg data-astro-cid-epuvuop6="true" xmlns="http://www.w3.org/2000/svg" width="10" height="12" fill="none" viewBox="0 0 10 12" focusable="false" aria-hidden="true"><path fill="#2D628C" fill-rule="evenodd" d="M.87 3.982 4.464.386a.757.757 0 0 1 1.07 0L9.13 3.982a.757.757 0 1 1-1.07 1.07L5.757 2.748v8.331a.757.757 0 1 1-1.514 0V2.748L1.94 5.052a.757.757 0 1 1-1.07-1.07" clip-rule="evenodd" style="fill:#2d628c;fill:color(display-p3 .1765 .3843 .549);fill-opacity:1"/></svg>
					</button>
					<button class="sound" data-astro-cid-epuvuop6>
						<canvas id="sound-canvas" width="24" height="24" data-astro-cid-epuvuop6></canvas>
					</button>
				</div>
			</div>
		</div>
		<?php
	}
}
