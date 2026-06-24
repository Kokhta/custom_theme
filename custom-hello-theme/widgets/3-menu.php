<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_3_Menu extends Widget_Base {
	public function get_name() { return '3-menu'; }
	public function get_title() { return '3. Menu'; }
	public function get_icon() { return 'eicon-nav-menu'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$repeater = new Repeater();
		$repeater->add_control('text', ['label' => 'Text', 'type' => Controls_Manager::TEXT, 'default' => 'Link']);
		$repeater->add_control('url', ['label' => 'URL', 'type' => Controls_Manager::URL, 'default' => ['url' => '#']]);
		$repeater->add_control('is_active', ['label' => 'Active', 'type' => Controls_Manager::SWITCHER]);
		$this->add_control('main_links', [
			'label' => 'Main Links',
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				[ 'text' => 'Montfort Group', 'url' => [ 'url' => '/' ], 'is_active' => 'yes' ],
				[ 'text' => 'Montfort Trading', 'url' => [ 'url' => '/trading/' ] ],
				[ 'text' => 'Montfort Capital', 'url' => [ 'url' => '/capital/' ] ],
				[ 'text' => 'Montfort Maritime', 'url' => [ 'url' => '/maritime/' ] ],
				[ 'text' => 'Fort Energy', 'url' => [ 'url' => '/fort-energy/' ] ],
			],
		]);
		$terms_repeater = new Repeater();
		$terms_repeater->add_control('text', ['label' => 'Text', 'type' => Controls_Manager::TEXT, 'default' => 'Term']);
		$terms_repeater->add_control('url', ['label' => 'URL', 'type' => Controls_Manager::URL, 'default' => ['url' => '#']]);
		$this->add_control('terms_links', [
			'label' => 'Terms Links',
			'type' => Controls_Manager::REPEATER,
			'fields' => $terms_repeater->get_controls(),
			'default' => [
				[ 'text' => 'Contact', 'url' => [ 'url' => '/contact/' ] ],
				[ 'text' => 'ESG', 'url' => [ 'url' => '/#Sustainability' ] ],
				[ 'text' => 'Privacy policy', 'url' => [ 'url' => '/privacy-policy/' ] ],
				[ 'text' => 'Terms of use', 'url' => [ 'url' => '/terms-of-use/' ] ],
			],
		]);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-astro-transition-persist="menu" class="montfort-menu" data-component="Menu" data-astro-cid-6fp6peiy="">
			<div class="grid grid-nav" data-astro-cid-6fp6peiy="">
				<nav class="col-start-1 col-end-5 tb:col-start-2 dk:col-start-5 lg:col-start-6 dk:col-end-14" data-astro-cid-6fp6peiy="">
					<ul data-astro-cid-6fp6peiy="">
						<?php foreach ( $settings['main_links'] as $item ) : ?>
							<li data-astro-cid-6fp6peiy="">
								<a href="<?php echo esc_url( $item['url']['url'] ); ?>" data-astro-cid-6fp6peiy="true" class="nav-link <?php echo ( 'yes' === $item['is_active'] ) ? 'active' : ''; ?>">
									<div class="svg-container" data-astro-cid-6fp6peiy="">
										<svg data-astro-cid-6fp6peiy="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true"><path fill="currentColor" d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path></svg>
									</div>
									<div class="text-content" data-astro-cid-6fp6peiy="">
										<span data-astro-cid-6fp6peiy=""><?php echo esc_html( $item['text'] ); ?></span>
									</div>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</div>
			<div class="grid grid-terms" data-astro-cid-6fp6peiy="">
				<div class="terms-w col-start-3 col-end-5 tb:col-start-1 tb:col-end-5 dk:col-start-3 dk:col-end-20 lg:col-start-4 lg:col-end-20" data-astro-cid-6fp6peiy="">
					<ul data-astro-cid-6fp6peiy="">
						<?php foreach ( $settings['terms_links'] as $item ) : ?>
							<li class="terms-link" data-astro-cid-6fp6peiy="">
								<a href="<?php echo esc_url( $item['url']['url'] ); ?>" data-astro-cid-6fp6peiy="true">
									<span data-astro-cid-6fp6peiy=""><?php echo esc_html( $item['text'] ); ?></span>
									<span data-astro-cid-6fp6peiy=""><?php echo esc_html( $item['text'] ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="overlay" data-astro-cid-6fp6peiy=""></div>
		</div>
		<?php
	}
}
