<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Header_Widget extends Widget_Base {

	public function get_name() {
		return '2-header';
	}

	public function get_title() {
		return '2. Header';
	}

	public function get_icon() {
		return 'eicon-header';
	}

	public function get_categories() {
		return array( 'mountfort' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => 'Content',
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'text',
			array(
				'label'   => 'Link Text',
				'type'    => Controls_Manager::TEXT,
				'default' => 'Link',
			)
		);

		$repeater->add_control(
			'url',
			array(
				'label'   => 'URL',
				'type'    => Controls_Manager::URL,
				'default' => array( 'url' => '#' ),
			)
		);

		$repeater->add_control(
			'is_active',
			array(
				'label' => 'Active?',
				'type'  => Controls_Manager::SWITCHER,
			)
		);

		$this->add_control(
			'nav_links',
			array(
				'label'       => 'Navigation Links',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array( 'text' => 'Montfort Group', 'url' => array( 'url' => '/' ), 'is_active' => 'yes' ),
					array( 'text' => 'Montfort Trading', 'url' => array( 'url' => '/trading/' ) ),
					array( 'text' => 'Montfort Capital', 'url' => array( 'url' => '/capital/' ) ),
					array( 'text' => 'Montfort Maritime', 'url' => array( 'url' => '/maritime/' ) ),
					array( 'text' => 'Fort Energy', 'url' => array( 'url' => '/fort-energy/' ) ),
				),
				'title_field' => '{{{ text }}}',
			)
		);

		$this->add_control(
			'news_label',
			array(
				'label'   => 'News Label',
				'type'    => Controls_Manager::TEXT,
				'default' => 'News',
			)
		);

		$this->add_control(
			'news_count',
			array(
				'label'   => 'News Count',
				'type'    => Controls_Manager::TEXT,
				'default' => '20',
			)
		);

		$this->add_control(
			'menu_label',
			array(
				'label'   => 'Menu Label',
				'type'    => Controls_Manager::TEXT,
				'default' => 'Menu',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<header data-astro-transition-persist="header" id="header" data-theme="dark" data-component="Header" data-astro-cid-4wsjtibl="" class="">
			<div class="grid container-menu" data-astro-cid-4wsjtibl="">
				<nav class="tb:col-start-1 tb:col-end-25 dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23" data-astro-cid-4wsjtibl="">
					<div class="menu-links-w" data-astro-cid-4wsjtibl="">
						<ul data-astro-cid-4wsjtibl="">
							<?php foreach ( $settings['nav_links'] as $link ) : ?>
								<li data-astro-cid-4wsjtibl="">
									<a href="<?php echo esc_url( $link['url']['url'] ); ?>" data-astro-cid-4wsjtibl="true" class="nav-link <?php echo $link['is_active'] === 'yes' ? 'active' : ''; ?>">
										<span data-astro-cid-4wsjtibl=""><?php echo esc_html( $link['text'] ); ?></span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="navbar" data-astro-cid-4wsjtibl="" style="opacity: 1; translate: none; rotate: none; scale: none; transform: translate3d(48px, 0px, 0px) scale(0.1402, 1);"></div>
					</div>
					<div class="menu-w" data-astro-cid-4wsjtibl="">
						<a href="/news/" class="news-w" data-astro-cid-4wsjtibl="true">
							<p data-astro-cid-4wsjtibl=""><?php echo esc_html( $settings['news_label'] ); ?></p>
							<div class="counter" data-astro-cid-4wsjtibl="">
								<span data-total-count="<?php echo esc_attr( $settings['news_count'] ); ?>" class="number" data-astro-cid-4wsjtibl=""><?php echo esc_html( $settings['news_count'] ); ?></span>
							</div>
						</a>
						<button class="menu-cta" data-astro-cid-4wsjtibl="">
							<p data-astro-cid-4wsjtibl="">
								<span data-astro-cid-4wsjtibl=""><?php echo esc_html( $settings['menu_label'] ); ?></span><span data-astro-cid-4wsjtibl=""><?php echo esc_html( $settings['menu_label'] ); ?></span>
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
