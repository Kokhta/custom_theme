<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_1 extends \Elementor\Widget_Base {

	public function get_name() { return '1-header'; }
	public function get_title() { return esc_html__( '1. Header', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-header'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
		$this->add_control( 'logo_url', [ 'label' => esc_html__( 'Logo Link URL', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#hero' ] ] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'menu_title', [ 'label' => esc_html__( 'Title', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Intro' ] );
		$repeater->add_control( 'menu_link', [ 'label' => esc_html__( 'Link', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#hero' ] ] );
		$repeater->add_control( 'menu_id', [ 'label' => esc_html__( 'Section ID', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'hero' ] );

		$this->add_control( 'menu_items', [ 'label' => esc_html__( 'Menu Items', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[ 'menu_title' => 'Intro', 'menu_link' => [ 'url' => '#hero' ], 'menu_id' => 'hero' ],
			[ 'menu_title' => 'Features', 'menu_link' => [ 'url' => '#features' ], 'menu_id' => 'features' ],
			[ 'menu_title' => 'Product', 'menu_link' => [ 'url' => '#testimonies' ], 'menu_id' => 'testimonies' ],
			[ 'menu_title' => 'Contact', 'menu_link' => [ 'url' => '#contact' ], 'menu_id' => 'footer' ],
		] ] );

		$this->add_control( 'enquiries_text', [ 'label' => esc_html__( 'Enquiries Label', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'general enquires:' ] );
		$this->add_control( 'enquiries_email', [ 'label' => esc_html__( 'Enquiries Email', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'hello@lusion.co' ] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<header id="site-header" class="link-header">
			<a id="site-header-logo" data-width="94" href="<?php echo esc_url( $settings['logo_url']['url'] ); ?>" style="transform: translate3d(-7.28334px, 33.8167px, 0px) scale(1); opacity: 1;">
				<div style="width: 512.6px; height: 110.25px;">
					<svg viewBox="0 0 94 21"><use href="#logo-tmpl"></use></svg>
				</div>
			</a>
			<nav id="site-header-nav" class="desktop-only" style="transform: translate3d(-30.8134px, 0px, 0px);">
				<ul>
					<?php foreach ( $settings['menu_items'] as $index => $item ) :
						$active_class = ( $index === 0 ) ? 'is-active' : '';
						?>
						<li class="is-flipper <?php echo esc_attr($active_class); ?>" data-id="<?php echo esc_attr($item['menu_id']); ?>">
							<a class="is-flipper-target" href="<?php echo esc_url($item['menu_link']['url']); ?>" aria-label="<?php echo esc_attr($item['menu_title']); ?>">
								<?php
								$chars = str_split($item['menu_title']);
								foreach($chars as $char) {
									echo '<div aria-hidden="true" style="position: relative; display: inline-block; overflow: clip;"><div aria-hidden="true" style="position: relative; display: inline-block;">' . esc_html($char) . '<div style="position: absolute; top: 100%; left: 0px;">' . esc_html($char) . '</div></div></div>';
								}
								?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				<div id="site-header-line" class="o-dashline" style="transform: translateX(0px); width: 27.2333px; opacity: 1;"></div>
			</nav>
			<div id="site-header-mobile-menu" class="mobile-only">
				<div></div>
				<ul>
					<?php foreach ( $settings['menu_items'] as $item ) : ?>
						<li data-id="<?php echo esc_attr($item['menu_id']); ?>"><a href="<?php echo esc_url($item['menu_link']['url']); ?>"><?php echo esc_html($item['menu_title']); ?></a></li>
					<?php endforeach; ?>
				</ul>
				<div id="site-header-mobile-bottom">
					<div class="sub2"><?php echo esc_html($settings['enquiries_text']); ?></div>
					<a class="sub1" href="mailto:<?php echo esc_attr($settings['enquiries_email']); ?>" target="_blank"><?php echo esc_html($settings['enquiries_email']); ?></a>
				</div>
			</div>
			<div id="site-header-mobile-btn" class="mobile-only" style="visibility: visible; opacity: 1;"><span>Menu</span><span>Close</span></div>
			<div id="site-header-blocker"></div>
		</header>
		<?php
	}
}
