<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Vectr_Widget_9_footer extends \Elementor\Widget_Base {

	public function get_name() {
		return '9-footer';
	}

	public function get_title() {
		return esc_html__( '9-footer', 'vectr' );
	}

	public function get_icon() {
		return 'eicon-footer';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'vectr' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'link_label',
			[
				'label' => esc_html__( 'Link Label', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Label',
			]
		);
		$repeater->add_control(
			'link_url',
			[
				'label' => esc_html__( 'Link URL', 'vectr' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '#' ],
			]
		);

		$this->add_control(
			'footer_nav',
			[
				'label' => esc_html__( 'Footer Navigation', 'vectr' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'link_label' => 'Our Industries', 'link_url' => [ 'url' => '/industries' ] ],
					[ 'link_label' => 'Our Mission', 'link_url' => [ 'url' => '/our-mission' ] ],
					[ 'link_label' => 'Apply', 'link_url' => [ 'url' => '/apply' ] ],
				],
			]
		);

		$this->add_control(
			'logo_svg',
			[
				'label' => esc_html__( 'Logo SVG', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 16" fill="none" class="logo footer__logo"><path d="M9.69877 11.9986H9.49841L4.39929 0H0L5.703 13.4208C6.36614 14.9841 7.90123 15.9972 9.59718 15.9972C11.2959 15.9972 12.8282 14.9841 13.4914 13.4208L19.1972 0H14.7979L9.69877 11.9986Z" fill="#FCFCFC"></path><path d="M19.4286 3.99859V11.9986C19.4286 14.2081 21.2205 15.9972 23.4272 15.9972H35.4257V12.3965H23.4272V9.79753H33.8257V6.19683H23.4272V3.59788H35.4257V0H23.4272C21.2176 0 19.4286 1.79189 19.4286 3.99859Z" fill="#FCFCFC"></path><path d="M44.3598 3.99859H47.5598C49.0384 3.99859 50.328 4.80282 51.0194 5.99929H55.3058C54.4169 2.54815 51.2846 0 47.5598 0H44.3598C39.9407 0 36.3598 3.58095 36.3598 8C36.3598 12.419 39.9407 16 44.3598 16H47.5598C51.2875 16 54.4198 13.4519 55.3058 10.0007H51.0194C50.328 11.1944 49.0384 12.0014 47.5598 12.0014H44.3598C42.1503 12.0014 40.3612 10.2095 40.3612 8.00282C40.3612 5.79612 42.1531 4.00423 44.3598 4.00423V3.99859Z" fill="#FCFCFC"></path><path d="M56.0395 0V3.60071H62.0388V15.9972H66.0374V3.60071H72.0367V0H56.0395Z" fill="#FCFCFC"></path><path d="M92.5968 5.39824C92.5968 2.41552 90.1785 0 87.1986 0H77.4011C75.1915 0 73.4025 1.79189 73.4025 3.99859V15.9972H77.4011V10.7965H84.0409L88.2003 15.9972H92.5996L88.3414 10.6751C90.7739 10.1503 92.5996 7.98871 92.5996 5.39824H92.5968ZM88.5982 5.39824C88.5982 6.39153 87.7912 7.19859 86.7979 7.19859H77.3982V3.59788H86.7979C87.7912 3.59788 88.5982 4.40494 88.5982 5.39824Z" fill="#FCFCFC"></path></svg>',
			]
		);

		$this->add_control(
			'copyright',
			[
				'label' => esc_html__( 'Copyright Text', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '© 2026 Vectr, Inc.',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<footer class="footer">
			<nav class="footer-nav">
				<?php foreach ( $settings['footer_nav'] as $item ) : ?>
					<a href="<?php echo esc_url( $item['link_url']['url'] ); ?>" class="footer-nav-btn">
						<span class="footer-nav-btn__bg"></span>
						<span class="footer-nav-btn__label"><?php echo esc_html( $item['link_label'] ); ?></span>
						<span class="footer-nav-btn__arrows">
							<img src="/_astro/arrow-right.BfejkNdO.svg" alt="" class="footer-nav-btn__arrow footer-nav-btn__arrow--current" width="23" height="32" loading="lazy">
							<img src="/_astro/arrow-right.BfejkNdO.svg" alt="" class="footer-nav-btn__arrow footer-nav-btn__arrow--next" width="23" height="32" loading="lazy">
						</span>
					</a>
				<?php endforeach; ?>
			</nav>
			<div class="footer__bottom">
				<?php echo $settings['logo_svg']; ?>
				<div class="footer__meta">
					<p class="footer__copyright"><?php echo esc_html( $settings['copyright'] ); ?></p>
					<a href="/privacy" class="footer__privacy">Privacy Policy</a>
					<a href="/terms" class="footer__privacy">ToS</a>
					<a href="https://utsubo.com" target="_blank" rel="noopener" class="footer__credit">Made by Utsubo</a>
				</div>
			</div>
		</footer>
		<?php
	}
}
