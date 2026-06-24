<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_2_Header extends Widget_Base {
	public function get_name() { return '2-header'; }
	public function get_title() { return '2. Header'; }
	public function get_icon() { return 'eicon-header'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$repeater = new Repeater();
		$repeater->add_control('text', ['label' => 'Link Text', 'type' => Controls_Manager::TEXT, 'default' => 'Link']);
		$repeater->add_control('url', ['label' => 'Link URL', 'type' => Controls_Manager::URL, 'default' => ['url' => '#']]);
		$repeater->add_control('is_active', ['label' => 'Active', 'type' => Controls_Manager::SWITCHER]);
		$this->add_control('menu_links', [
			'label' => 'Menu Links',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				[ 'text' => 'Montfort Group', 'url' => [ 'url' => '/' ], 'is_active' => 'yes' ],
				[ 'text' => 'Montfort Trading', 'url' => [ 'url' => '/trading/' ] ],
				[ 'text' => 'Montfort Capital', 'url' => [ 'url' => '/capital/' ] ],
				[ 'text' => 'Montfort Maritime', 'url' => [ 'url' => '/maritime/' ] ],
				[ 'text' => 'Fort Energy', 'url' => [ 'url' => '/fort-energy/' ] ],
			],
			'title_field' => '{{{ text }}}',
		]);
		$this->add_control('news_count', ['label' => 'News Count', 'type' => Controls_Manager::TEXT, 'default' => '20']);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<header data-astro-transition-persist="header" id="header" data-theme="dark" data-component="Header" data-astro-cid-4wsjtibl="" class="fade">
			<div class="grid container-menu" data-astro-cid-4wsjtibl="">
				<nav class="tb:col-start-1 tb:col-end-25 dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23" data-astro-cid-4wsjtibl="">
					<div class="menu-links-w" data-astro-cid-4wsjtibl="">
						<ul data-astro-cid-4wsjtibl="">
							<?php foreach ( $settings['menu_links'] as $item ) : ?>
								<li data-astro-cid-4wsjtibl="">
									<a href="<?php echo esc_url( $item['url']['url'] ); ?>" data-astro-cid-4wsjtibl="true" class="nav-link <?php echo ( 'yes' === $item['is_active'] ) ? 'active' : ''; ?>">
										<span data-astro-cid-4wsjtibl=""><?php echo esc_html( $item['text'] ); ?></span>
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
