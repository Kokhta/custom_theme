<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Menu_Widget extends Widget_Base {

	public function get_name() {
		return '3-menu';
	}

	public function get_title() {
		return '3. Menu';
	}

	public function get_icon() {
		return 'eicon-menu-bar';
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

		$nav_repeater = new Repeater();
		$nav_repeater->add_control( 'text', array( 'label' => 'Text', 'type' => Controls_Manager::TEXT ) );
		$nav_repeater->add_control( 'url', array( 'label' => 'URL', 'type' => Controls_Manager::URL ) );
		$nav_repeater->add_control( 'is_active', array( 'label' => 'Active?', 'type' => Controls_Manager::SWITCHER ) );

		$this->add_control(
			'nav_links',
			array(
				'label'       => 'Navigation Links',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $nav_repeater->get_controls(),
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

		$terms_repeater = new Repeater();
		$terms_repeater->add_control( 'text', array( 'label' => 'Text', 'type' => Controls_Manager::TEXT ) );
		$terms_repeater->add_control( 'url', array( 'label' => 'URL', 'type' => Controls_Manager::URL ) );

		$this->add_control(
			'terms_links',
			array(
				'label'       => 'Terms Links',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $terms_repeater->get_controls(),
				'default'     => array(
					array( 'text' => 'Contact', 'url' => array( 'url' => '/contact/' ) ),
					array( 'text' => 'ESG', 'url' => array( 'url' => '/#Sustainability' ) ),
					array( 'text' => 'Privacy policy', 'url' => array( 'url' => '/privacy-policy/' ) ),
					array( 'text' => 'Terms of use', 'url' => array( 'url' => '/terms-of-use/' ) ),
				),
				'title_field' => '{{{ text }}}',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-astro-transition-persist="menu" class="montfort-menu" data-component="Menu" data-astro-cid-6fp6peiy="">
			<div class="grid grid-nav" data-astro-cid-6fp6peiy="">
				<nav class="col-start-1 col-end-5 tb:col-start-2 dk:col-start-5 lg:col-start-6 dk:col-end-14" data-astro-cid-6fp6peiy="">
					<ul data-astro-cid-6fp6peiy="">
						<?php foreach ( $settings['nav_links'] as $link ) : ?>
							<li data-astro-cid-6fp6peiy="">
								<a href="<?php echo esc_url( $link['url']['url'] ); ?>" data-astro-cid-6fp6peiy="true" class="nav-link <?php echo $link['is_active'] === 'yes' ? 'active' : ''; ?>">
									<div class="svg-container" data-astro-cid-6fp6peiy="">
										<svg data-astro-cid-6fp6peiy="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true"><path fill="currentColor" d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path></svg>
									</div>
									<div class="text-content" data-astro-cid-6fp6peiy="">
										<span data-astro-cid-6fp6peiy=""><?php echo esc_html( $link['text'] ); ?></span>
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
						<?php foreach ( $settings['terms_links'] as $link ) : ?>
							<li class="terms-link" data-astro-cid-6fp6peiy="">
								<a href="<?php echo esc_url( $link['url']['url'] ); ?>" data-astro-cid-6fp6peiy="true">
									<span data-astro-cid-6fp6peiy=""><?php echo esc_html( $link['text'] ); ?></span>
									<span data-astro-cid-6fp6peiy=""><?php echo esc_html( $link['text'] ); ?></span>
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
