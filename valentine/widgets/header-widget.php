<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Valentine_Header_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'valentine_header';
	}

	public function get_title() {
		return esc_html__( '1-Header', 'valentine' );
	}

	public function get_icon() {
		return 'eicon-header';
	}

	public function get_categories() {
		return [ 'valentine' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'valentine' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'logo',
			[
				'label' => esc_html__( 'Logo', 'valentine' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '/images/icons/valentimeLogo.svg',
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Link Text', 'valentine' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'noomo agency', 'valentine' ),
			]
		);

		$repeater->add_control(
			'link_url',
			[
				'label' => esc_html__( 'Link URL', 'valentine' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => 'https://noomoagency.com',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$repeater->add_control(
			'svg_path_d',
			[
				'label' => esc_html__( 'SVG Path D', 'valentine' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$repeater->add_control(
			'svg_width',
			[
				'label' => esc_html__( 'SVG Width', 'valentine' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'menu_links',
			[
				'label' => esc_html__( 'Menu Links', 'valentine' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'link_text' => ' noomo agency ',
						'link_url' => [ 'url' => 'https://noomoagency.com' ],
						'svg_path_d' => 'M78.9675 1.3176C76.1971 0.172375 59.6285 0.817594 50.7821 1.17335C44.4794 1.44295 20.4649 0.442904 9.47528 1.55948C5.73277 1.94749 3.0444 2.23723 0.969982 2.45364C0.14545 2.64486 0.713434 3.119 1.10049 3.33217C2.99656 3.1023 5.3013 2.82775 8.20252 2.50635C20.5334 1.12402 45.5485 2.3629 51.0053 2.22035C59.3188 1.96714 66.7602 1.49698 73.4789 1.719C76.812 1.82914 77.6101 2.17797 78.1892 2.55409C78.8998 3.05677 79.9058 2.14788 79.2292 1.49698C79.154 1.42466 79.0788 1.35234 78.9675 1.3176Z',
						'svg_width' => 80,
					],
					[
						'link_text' => ' about ',
						'link_url' => [ 'url' => '/about' ],
						'svg_path_d' => 'M37.1815 2.97752L37.7753 2.83785C38.4179 2.56191 38.198 2.36465 37.9267 2.07393C37.7289 1.86087 37.1203 1.84404 36.6529 1.83354C35.7802 1.72764 33.1912 1.68817 31.9078 1.53231C31.3295 1.46257 30.4739 1.35576 30.3519 1.41115C30.2201 1.45255 28.9815 1.38487 27.5611 1.32819C22.0603 1.13001 24.5976 0.915678 17.5666 0.876465C11.7113 1.02384 6.83683 1.22439 5.40282 1.37693L4.28184 1.51659C4.01053 1.62129 1.13333 1.78284 0.740021 1.94292C0.513439 2.04578 0.518256 2.54204 0.735204 2.8497C0.873261 3.04548 1.09617 3.16582 1.4099 3.0234C1.98507 2.7623 4.89392 2.25408 5.16912 2.35069L6.20823 2.19281C6.22107 2.11314 6.83362 2.29659 10.211 1.96337C16.0138 1.41523 21.4012 1.85232 27.8345 2.32873C29.6545 2.4625 29.977 2.49468 30.6009 2.55023C31.4761 2.62816 36.4472 3.27396 37.1815 2.97752Z',
						'svg_width' => 39,
					],
					[
						'link_text' => ' Let’s Talk ',
						'link_url' => [ 'url' => '/contacts' ],
						'svg_path_d' => 'M13.8421 2.66392C31.2739 2.70137 45.9008 1.5539 54.6089 2.95627C57.7652 3.47089 58.6634 3.30378 58.6359 2.72442C58.6383 2.60287 58.6739 2.27769 58.4751 2.00138C58.3473 1.82376 58.1461 1.669 57.7783 1.57419C56.5249 1.2479 51.2818 0.497565 50.4293 0.811494C50.1103 0.951123 50.3147 1.19349 50.1742 1.41446C49.9681 1.50281 49.6935 1.37093 49.0092 1.2942C42.1661 0.526884 31.2716 2.07387 18.9672 2.00138C14.5322 1.95766 8.42928 1.88591 5.39048 1.82596C4.18904 1.79922 3.24798 1.77904 2.49798 1.75733C2.28939 1.7506 1.71911 1.78346 1.10664 1.96869C0.494163 2.15393 1.2823 2.62668 1.75628 2.85353C1.98851 2.88284 5.8457 2.66668 13.8421 2.66392Z',
						'svg_width' => 59,
					],
				],
				'title_field' => '{{{ link_text }}}',
			]
		);

		$this->add_control(
			'sound_on_text',
			[
				'label' => esc_html__( 'Sound On Text', 'valentine' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'sound on', 'valentine' ),
			]
		);

		$this->add_control(
			'sound_image',
			[
				'label' => esc_html__( 'Sound Image', 'valentine' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '/images/icons/soundOn.png',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<header data-v-af528366="">
			<div class="wrapper" data-v-af528366="">
				<div class="left" data-v-af528366="">
					<a aria-current="page" href="/" class="router-link-active router-link-exact-active" data-v-af528366="">
						<img class="logo" src="<?php echo esc_url( $settings['logo']['url'] ); ?>" alt="logo" data-v-af528366="">
					</a>
				</div>
				<div class="center" data-v-af528366="">
					<div class="links" data-v-af528366="">
						<?php foreach ( $settings['menu_links'] as $link ) : ?>
							<a class="link font-fontspring-16-300-black line-1" href="<?php echo esc_url( $link['link_url']['url'] ); ?>" <?php echo $link['link_url']['is_external'] ? 'target="_blank"' : ''; ?> data-v-af528366="">
								<?php echo esc_html( $link['link_text'] ); ?>
								<div class="line" data-v-af528366="">
									<svg width="<?php echo esc_attr( $link['svg_width'] ); ?>" height="4" viewBox="0 0 <?php echo esc_attr( $link['svg_width'] ); ?> 4" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-af528366="">
										<path d="<?php echo esc_attr( $link['svg_path_d'] ); ?>" fill="#DA0000" data-v-af528366=""></path>
									</svg>
								</div>
							</a>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="right" data-v-af528366="">
					<div class="show sound" data-v-af528366="">
						<p class="font-fontspring-16-300-black line-1" data-v-af528366=""><?php echo esc_html( $settings['sound_on_text'] ); ?></p>
						<img class="image-on" alt="sound" src="<?php echo esc_url( $settings['sound_image']['url'] ); ?>" data-v-af528366="">
					</div>
					<div class="menu-toggle font-fontspring-16-300-black" data-v-af528366="">menu</div>
					<div class="mobile-menu" data-v-af528366="">
						<div data-v-af528366=""></div>
						<div class="mobile-links" data-v-af528366="">
							<?php foreach ( $settings['menu_links'] as $link ) : ?>
								<a class="link font-fontspring-36-300-black line-1" href="<?php echo esc_url( $link['link_url']['url'] ); ?>" <?php echo $link['link_url']['is_external'] ? 'target="_blank"' : ''; ?> data-v-af528366="">
									<?php echo esc_html( trim( $link['link_text'] ) ); ?>
								</a>
							<?php endforeach; ?>
						</div>
						<div class="socials" data-v-af528366="">
							<a target="_blank" class="font-fontspring-24-300-black" href="https://www.linkedin.com/company/noomoagency" data-v-af528366="">Linkedin</a>
							<a target="_blank" class="font-fontspring-24-300-black" href="https://twitter.com/noomoagency" data-v-af528366="">X</a>
							<a target="_blank" class="font-fontspring-24-300-black" href="https://dribbble.com/noomoagency" data-v-af528366="">Dribbble</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php
	}
}
