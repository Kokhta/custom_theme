<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Widget_3_Menu extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort-menu';
	}

	public function get_title() {
		return esc_html__( '3-Menu', 'montfort' );
	}

	public function get_icon() {
		return 'eicon-nav-menu';
	}

	public function get_categories() {
		return [ 'montfort' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_menu_content',
			[
				'label' => esc_html__( 'Menu Content', 'montfort' ),
			]
		);

		$this->add_control(
			'data_astro_cid',
			[
				'label' => esc_html__( 'Data Astro CID', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'data-astro-cid-6fp6peiy',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Link Text', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Link',
			]
		);
		$repeater->add_control(
			'link_url',
			[
				'label' => esc_html__( 'Link URL', 'montfort' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '#' ],
			]
		);
		$repeater->add_control(
			'is_active',
			[
				'label' => esc_html__( 'Is Active', 'montfort' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'active',
				'default' => '',
			]
		);

		$this->add_control(
			'main_links',
			[
				'label' => esc_html__( 'Main Links', 'montfort' ),
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

		$legal_repeater = new \Elementor\Repeater();
		$legal_repeater->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Link Text', 'montfort' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Link',
			]
		);
		$legal_repeater->add_control(
			'link_url',
			[
				'label' => esc_html__( 'Link URL', 'montfort' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '#' ],
			]
		);

		$this->add_control(
			'legal_links',
			[
				'label' => esc_html__( 'Legal Links', 'montfort' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $legal_repeater->get_controls(),
				'default' => [
					[ 'link_text' => 'Contact', 'link_url' => [ 'url' => '/contact/' ] ],
					[ 'link_text' => 'ESG', 'link_url' => [ 'url' => '/#Sustainability' ] ],
					[ 'link_text' => 'Privacy policy', 'link_url' => [ 'url' => '/privacy-policy/' ] ],
					[ 'link_text' => 'Terms of use', 'link_url' => [ 'url' => '/terms-of-use/' ] ],
				],
				'title_field' => '{{{ link_text }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$cid = $settings['data_astro_cid'];
		?>
		<div data-astro-transition-persist="menu" class="montfort-menu" data-component="Menu" <?php echo esc_attr( $cid ); ?>="">
			<div class="grid grid-nav" <?php echo esc_attr( $cid ); ?>="">
				<nav class="col-start-1 col-end-5 tb:col-start-2 dk:col-start-5 lg:col-start-6 dk:col-end-14" <?php echo esc_attr( $cid ); ?>="">
					<ul <?php echo esc_attr( $cid ); ?>="">
						<?php foreach ( $settings['main_links'] as $link ) : ?>
							<li <?php echo esc_attr( $cid ); ?>="">
								<a href="<?php echo esc_url( $link['link_url']['url'] ); ?>" <?php echo esc_attr( $cid ); ?>="true" class="nav-link <?php echo esc_attr( $link['is_active'] ); ?>">
									<div class="svg-container" <?php echo esc_attr( $cid ); ?>="">
										<svg <?php echo esc_attr( $cid ); ?>="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true"><path fill="currentColor" d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path></svg>
									</div>
									<div class="text-content" <?php echo esc_attr( $cid ); ?>="">
										<span <?php echo esc_attr( $cid ); ?>=""><?php echo esc_html( $link['link_text'] ); ?></span>
									</div>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</div>
			<div class="grid grid-terms" <?php echo esc_attr( $cid ); ?>="">
				<div class="terms-w col-start-3 col-end-5 tb:col-start-1 tb:col-end-5 dk:col-start-3 dk:col-end-20 lg:col-start-4 lg:col-end-20" <?php echo esc_attr( $cid ); ?>="">
					<ul <?php echo esc_attr( $cid ); ?>="">
						<?php foreach ( $settings['legal_links'] as $link ) : ?>
							<li class="terms-link" <?php echo esc_attr( $cid ); ?>="">
								<a href="<?php echo esc_url( $link['link_url']['url'] ); ?>" <?php echo esc_attr( $cid ); ?>="true">
									<span <?php echo esc_attr( $cid ); ?>=""><?php echo esc_html( $link['link_text'] ); ?></span>
									<span <?php echo esc_attr( $cid ); ?>=""><?php echo esc_html( $link['link_text'] ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="overlay" <?php echo esc_attr( $cid ); ?>=""></div>
		</div>
		<?php
	}
}
