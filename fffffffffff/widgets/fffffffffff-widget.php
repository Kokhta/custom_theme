<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class fffffffffff_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'fffffffffff_widget';
	}

	public function get_title() {
		return esc_html__( 'fffffffffff Widget', 'fffffffffff' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'fffffffffff', 'custom' ];
	}

	protected function register_controls() {

		// --- Header Section ---
		$this->start_controls_section(
			'section_header',
			[
				'label' => esc_html__( 'Header & Menu', 'fffffffffff' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Link Text', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Link',
			]
		);
		$repeater->add_control(
			'link_url',
			[
				'label' => esc_html__( 'Link URL', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'fffffffffff' ),
			]
		);
		$repeater->add_control(
			'is_active',
			[
				'label' => esc_html__( 'Is Active', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$this->add_control(
			'header_menu_links',
			[
				'label' => esc_html__( 'Menu Links', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'link_text' => 'Montfort Group', 'link_url' => [ 'url' => '/' ], 'is_active' => 'yes' ],
					[ 'link_text' => 'Montfort Trading', 'link_url' => [ 'url' => '/trading/' ] ],
					[ 'link_text' => 'Montfort Capital', 'link_url' => [ 'url' => '/capital/' ] ],
					[ 'link_text' => 'Montfort Maritime', 'link_url' => [ 'url' => '/maritime/' ] ],
					[ 'link_text' => 'Fort Energy', 'link_url' => [ 'url' => '/fort-energy/' ] ],
				],
				'title_field' => '{{{ link_text }}}',
			]
		);

		$this->add_control(
			'news_count',
			[
				'label' => esc_html__( 'News Count', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 20,
			]
		);

		$this->end_controls_section();

		// --- Hero ---
		$this->start_controls_section(
			'section_hero',
			[
				'label' => esc_html__( 'Hero Section', 'fffffffffff' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'hero_scroll_text_mb',
			[
				'label' => esc_html__( 'Scroll Text (Mobile)', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Swipe down',
			]
		);

		$this->add_control(
			'hero_scroll_text_dk',
			[
				'label' => esc_html__( 'Scroll Text (Desktop)', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Scroll down to discover',
			]
		);

		$this->end_controls_section();

		// --- Who We Are ---
		$this->start_controls_section(
			'section_who_we_are',
			[
				'label' => esc_html__( 'Who We Are', 'fffffffffff' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'who_we_are_title',
			[
				'label' => esc_html__( 'Title', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Montfort is a global commodity trading and asset investment company.',
			]
		);

		$this->add_control(
			'who_we_are_content',
			[
				'label' => esc_html__( 'Content', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p>We trade, refine, store, and transport energy and commodities. We also invest in related assets and provide innovative services with integrity and efficiency to create long-term value for our clients.</p>',
			]
		);

		$this->add_control(
			'who_we_are_link_text',
			[
				'label' => esc_html__( 'Link Text', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Who we are',
			]
		);

		$this->add_control(
			'who_we_are_link_url',
			[
				'label' => esc_html__( 'Link URL', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '/who-we-are/' ],
			]
		);

		$this->end_controls_section();

		// --- What We Do ---
		$this->start_controls_section(
			'section_what_we_do',
			[
				'label' => esc_html__( 'What We Do', 'fffffffffff' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'what_we_do_title',
			[
				'label' => esc_html__( 'Title', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We provide energy solutions with integrity and efficiency through our different business divisions.',
			]
		);

		$this->add_control(
			'what_we_do_read_more',
			[
				'label' => esc_html__( 'Read More Text', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Montfort\'s interlinked divisions complement each other, providing integrated services that leverage their combined expertise. This synergy enhances our operational efficiency, enabling us to drive collective success in the global market and deliver exceptional value to our stakeholders.',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'index',
			[
				'label' => esc_html__( 'Index', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '1',
			]
		);
		$repeater->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Montfort Trading',
			]
		);
		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Operating Efficiently by Leading with Innovation.',
			]
		);
		$repeater->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Link Text', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Montfort Trading',
			]
		);
		$repeater->add_control(
			'link_url',
			[
				'label' => esc_html__( 'Link URL', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::URL,
			]
		);
		$repeater->add_control(
			'row',
			[
				'label' => esc_html__( 'Grid Row', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 2,
			]
		);
		$repeater->add_control(
			'col_class',
			[
				'label' => esc_html__( 'Column Classes', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'tb:col-start-1 tb:col-end-4 dk:col-start-5 dk:col-end-18 lg:col-start-7 lg:col-end-14',
			]
		);

		$this->add_control(
			'what_we_do_divisions',
			[
				'label' => esc_html__( 'Divisions', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'index' => '1', 'subtitle' => 'Montfort Trading', 'title' => 'Operating Efficiently by Leading with Innovation.', 'link_text' => 'Montfort Trading', 'link_url' => [ 'url' => '/trading/' ], 'row' => 2, 'col_class' => 'tb:col-start-1 tb:col-end-4 dk:col-start-5 dk:col-end-18 lg:col-start-7 lg:col-end-14' ],
					[ 'index' => '2', 'subtitle' => 'Montfort Capital', 'title' => 'Identify and seize opportunities that maximise Value', 'link_text' => 'Montfort Capital', 'link_url' => [ 'url' => '/capital/' ], 'row' => 3, 'col_class' => 'tb:col-start-2 tb:col-end-5 dk:col-start-12 dk:col-end-24 lg:col-start-16 lg:col-end-23' ],
					[ 'index' => '3', 'subtitle' => 'Montfort Maritime', 'title' => 'Powering Progress, Delivering Energy.', 'link_text' => 'Montfort Maritime', 'link_url' => [ 'url' => '/maritime/' ], 'row' => 4, 'col_class' => 'tb:col-start-1 tb:col-end-4 dk:col-start-5 dk:col-end-18 lg:col-start-7 lg:col-end-14' ],
					[ 'index' => '4', 'subtitle' => 'Fort Energy', 'title' => 'Advancing Innovation in Energy Investments', 'link_text' => 'Fort Energy', 'link_url' => [ 'url' => '/fort-energy/' ], 'row' => 5, 'col_class' => 'tb:col-start-2 tb:col-end-5 dk:col-start-12 dk:col-end-24 lg:col-start-16 lg:col-end-23' ],
				],
				'title_field' => '{{{ subtitle }}}',
			]
		);

		$this->end_controls_section();

		// --- Global Connectivity ---
		$this->start_controls_section(
			'section_global_connectivity',
			[
				'label' => esc_html__( 'Global Connectivity', 'fffffffffff' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'global_connectivity_title',
			[
				'label' => esc_html__( 'Title', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Established in the world’s major trade hubs and financial markets with over 15 global offices, we connect and serve both emerging and mature markets worldwide.',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'name',
			[
				'label' => esc_html__( 'Name', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'longitude',
			[
				'label' => esc_html__( 'Longitude', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'latitude',
			[
				'label' => esc_html__( 'Latitude', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'global_connectivity_points',
			[
				'label' => esc_html__( 'Map Points', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'name' => 'Switzerland', 'longitude' => '4', 'latitude' => '46.818188' ],
					[ 'name' => 'Istanbul', 'longitude' => '24', 'latitude' => '41.00824' ],
					[ 'name' => 'United Arab Emirates', 'longitude' => '54.35495', 'latitude' => '24.48818' ],
					[ 'name' => 'Nairobi', 'longitude' => '36.828842', 'latitude' => '-1.3026148' ],
					[ 'name' => 'Dar es Salam', 'longitude' => '39.2803583', 'latitude' => '-6.8160837' ],
					[ 'name' => 'Cape Town', 'longitude' => '18.4172197', 'latitude' => '-33.9288301' ],
					[ 'name' => 'Mumbai', 'longitude' => '72.8281049', 'latitude' => '18.9733536' ],
					[ 'name' => 'Karachi', 'longitude' => '67.0207055', 'latitude' => '24.8546842' ],
					[ 'name' => 'Maputo', 'longitude' => '32.56745', 'latitude' => '-25.966213' ],
					[ 'name' => 'Luxembourg', 'longitude' => '6.1296751', 'latitude' => '49.8158683' ],
					[ 'name' => 'Xiamen', 'longitude' => '118.0853479', 'latitude' => '24.4801069' ],
					[ 'name' => 'Singapore', 'longitude' => '97', 'latitude' => '1.352083' ],
				],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();

		// --- Sustainability ---
		$this->start_controls_section(
			'section_sustainability',
			[
				'label' => esc_html__( 'Sustainability', 'fffffffffff' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sustainability_intro',
			[
				'label' => esc_html__( 'Intro Text', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We are committed to integrating our sustainability strategy with our pursuit of value — powering lives and respecting nature. We recognize the profound and lasting impact our decisions have on people, communities, and the environment.',
			]
		);

		$this->add_control(
			'sustainability_title',
			[
				'label' => esc_html__( 'Title', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Our ethics and compliance framework',
			]
		);

		$this->add_control(
			'sustainability_framework_desc',
			[
				'label' => esc_html__( 'Framework Description', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'At Montfort, we operate under an integrated Sustainability Framework and adhere to strict corporate governance principles that allow us drive transformative social and environmental progress.',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'paragraph',
			[
				'label' => esc_html__( 'Paragraph', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);
		$this->add_control(
			'sustainability_paragraphs',
			[
				'label' => esc_html__( 'Framework Paragraphs', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'paragraph' => 'We ensure compliance with all applicable laws and regulations across our global operations, including those of the UN, EU, Switzerland, UK, US, Singapore, and the UAE.' ],
					[ 'paragraph' => 'Prior to engaging with any counterparty, a thorough and rigorous external onboarding process is conducted for all our trade counterparties and vessels we employ.' ],
					[ 'paragraph' => 'Any products purchased, sold, or shipped by Montfort are in full compliance with all applicable laws and regulations, including those related to trade, sanctions, and anti-bribery & corruption (ABAC).' ],
					[ 'paragraph' => 'Using renowned global compliance platforms, we analyze the counterparty, their corporate structure, and their UBO.' ],
					[ 'paragraph' => 'Our processes are thoroughly in line with the leading standards and best practices of international companies.' ],
					[ 'paragraph' => 'We use our internally developed, digitized platform to onboard the counterparties. Our goal is to deliver products responsibly and reliably, upholding international standards and prioritizing health, safety, environmental, and social considerations in all our activities.' ],
				],
			]
		);

		$this->end_controls_section();

		// --- Sustainable Solutions ---
		$this->start_controls_section(
			'section_solutions',
			[
				'label' => esc_html__( 'Sustainable Solutions', 'fffffffffff' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'solutions_title',
			[
				'label' => esc_html__( 'Title', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'DELIVERING SUSTAINABLE ENERGY SOLUTIONS',
			]
		);

		$this->add_control(
			'solutions_description',
			[
				'label' => esc_html__( 'Description', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p>We are dedicated to fostering a future where energy is both sustainable and accessible. Our strategy includes innovative practices to reduce environmental impact and promote renewable energy sources. By connecting people, ingenuity, and resources with a shared vision of value and prosperity, we aim to create a resilient energy ecosystem. This includes optimizing supply chains, investing in clean energy projects, and adhering to high environmental standards. Through these efforts, we drive sustainable growth and positively impact the global energy landscape.</p>',
			]
		);

		$this->end_controls_section();

		// --- Equality ---
		$this->start_controls_section(
			'section_equality',
			[
				'label' => esc_html__( 'Equality', 'fffffffffff' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'equality_title',
			[
				'label' => esc_html__( 'Title', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'OUR COMMITMENT TO EQUALITY',
			]
		);

		$this->add_control(
			'equality_desc_1',
			[
				'label' => esc_html__( 'Description 1', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We strive to create an environment where everyone can thrive and contribute to our success.',
			]
		);

		$this->add_control(
			'equality_desc_2',
			[
				'label' => esc_html__( 'Description 2', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We are proud that our staff come from almost 27 nationalities across five continents. We are committed to equality, with over 35% of our global team being female. We are proud to share that over 22% of our management team are women, reflecting our dedication to empowering women in leadership.',
			]
		);

		$this->end_controls_section();

		// --- Social / CSR ---
		$this->start_controls_section(
			'section_social',
			[
				'label' => esc_html__( 'Social Responsibility', 'fffffffffff' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'social_title',
			[
				'label' => esc_html__( 'Title', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'OUR PLEDGE TO CORPORATE SOCIAL RESPONSIBILITY',
			]
		);

		$this->add_control(
			'social_intro',
			[
				'label' => esc_html__( 'Intro', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Giving back to our communities is an imperative part of the work we do. Montfort Group’s CSR efforts are centered around three pillars: supporting education, alleviating poverty, and empowering women.',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'label',
			[
				'label' => esc_html__( 'Label', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'content',
			[
				'label' => esc_html__( 'Content', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);
		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'social_slides',
			[
				'label' => esc_html__( 'CSR Slides', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'label' => 'Alleviating Poverty', 'content' => 'With the help of local NGOs, we support the communities where we invest. Montfort has successfully financed clean water projects, initiatives for orphaned children, earthquake relief, food distribution, and medical support for those in need.' ],
					[ 'label' => 'Empowering Women', 'content' => 'We are \'Creating Experts Through Education\' in collaboration with The Doyenne Initiative, a non-profit organization that drives female experts to take on industry, education, and government leadership roles.' ],
					[ 'label' => 'Supporting Education', 'content' => 'We aim to help children secure a future for themselves through the support of education. We provide opportunities for success by building schools, funding scholarship programs and renewable energy projects, and supplying drinking water for schools.' ],
				],
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();

		// --- Footer ---
		$this->start_controls_section(
			'section_footer_legal',
			[
				'label' => esc_html__( 'Footer', 'fffffffffff' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'copyright_text',
			[
				'label' => esc_html__( 'Copyright', 'fffffffffff' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '© 2021 | Montfort - All rights reserved',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Add inline editing attributes
		$this->add_inline_editing_attributes( 'who_we_are_title', 'none' );
		$this->add_inline_editing_attributes( 'what_we_do_title', 'none' );
		$this->add_inline_editing_attributes( 'sustainability_title', 'none' );
		$this->add_inline_editing_attributes( 'copyright_text', 'none' );
		?>
		<style>
			.logo-dk > path,
			.logo-dk > g,
			.scroll-to-cta {
				opacity: 0;
			}
			body {
				opacity: 0;
				transition: opacity 0.4s linear;
			}
			body.loaded {
				opacity: 1;
			}
		</style>
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5F3SQM6J" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<div data-astro-transition-persist="cursor" class="cursor" data-component="Cursor" data-astro-cid-x6vourwi> <div class="inner" data-astro-cid-x6vourwi> <div class="circle" data-astro-cid-x6vourwi></div> <div class="middle-dot" data-astro-cid-x6vourwi></div> <div class="dots dots-left" data-astro-cid-x6vourwi></div> <div class="dots dots-right" data-astro-cid-x6vourwi></div> </div> </div>

		<header data-astro-transition-persist="header" id="header" data-theme="light" data-component="Header" data-astro-cid-4wsjtibl>
			<div class="grid container-menu" data-astro-cid-4wsjtibl>
				<nav class="tb:col-start-1 tb:col-end-25 dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23" data-astro-cid-4wsjtibl>
					<div class="menu-links-w" data-astro-cid-4wsjtibl>
						<ul data-astro-cid-4wsjtibl>
							<?php foreach ( $settings['header_menu_links'] as $item ) : ?>
								<li data-astro-cid-4wsjtibl>
									<a href="<?php echo esc_url( $item['link_url']['url'] ); ?>" class="nav-link <?php echo $item['is_active'] === 'yes' ? 'active' : ''; ?>" data-astro-cid-4wsjtibl="true">
										<span data-astro-cid-4wsjtibl><?php echo esc_html( $item['link_text'] ); ?></span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="navbar" data-astro-cid-4wsjtibl></div>
					</div>
					<div class="menu-w" data-astro-cid-4wsjtibl>
						<a href="/news/" class="news-w" data-astro-cid-4wsjtibl="true">
							<p data-astro-cid-4wsjtibl>News</p>
							<div class="counter no-unread" data-astro-cid-4wsjtibl>
								<span data-total-count="<?php echo esc_attr( $settings['news_count'] ); ?>" class="number" data-astro-cid-4wsjtibl><?php echo esc_html( $settings['news_count'] ); ?></span>
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

		<div data-astro-transition-persist="menu" class="montfort-menu" data-component="Menu" data-astro-cid-6fp6peiy>
			<div class="grid grid-nav" data-astro-cid-6fp6peiy>
				<nav class="col-start-1 col-end-5 tb:col-start-2 dk:col-start-5 lg:col-start-6 dk:col-end-14" data-astro-cid-6fp6peiy>
					<ul data-astro-cid-6fp6peiy>
						<?php foreach ( $settings['header_menu_links'] as $item ) : ?>
							<li data-astro-cid-6fp6peiy>
								<a href="<?php echo esc_url( $item['link_url']['url'] ); ?>" class="nav-link <?php echo $item['is_active'] === 'yes' ? 'active' : ''; ?>" data-astro-cid-6fp6peiy="true">
									<div class="svg-container" data-astro-cid-6fp6peiy>
										<svg data-astro-cid-6fp6peiy="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true"><path fill="currentColor" d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"/></svg>
									</div>
									<div class="text-content" data-astro-cid-6fp6peiy>
										<span data-astro-cid-6fp6peiy><?php echo esc_html( $item['link_text'] ); ?></span>
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
						<li class="terms-link" data-astro-cid-6fp6peiy><a href="/contact/"><span>Contact</span><span>Contact</span></a></li>
						<li class="terms-link" data-astro-cid-6fp6peiy><a href="/#Sustainability"><span>ESG</span><span>ESG</span></a></li>
						<li class="terms-link" data-astro-cid-6fp6peiy><a href="/privacy-policy/"><span>Privacy policy</span><span>Privacy policy</span></a></li>
						<li class="terms-link" data-astro-cid-6fp6peiy><a href="/terms-of-use/"><span>Terms of use</span><span>Terms of use</span></a></li>
					</ul>
				</div>
			</div>
			<div class="overlay" data-astro-cid-6fp6peiy></div>
		</div>

		<div id="canvas-wrapper" data-astro-transition-persist="webgl" aria-hidden="true"> <canvas></canvas> </div>

		<div data-astro-transition-persist="sound" class="buttons-container" data-theme="dark" data-component="Sound" data-astro-cid-epuvuop6>
			<div class="buttons-wrapper grid" data-astro-cid-epuvuop6>
				<div class="buttons-inner dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23" data-astro-cid-epuvuop6>
					<button id="scroll-top" class="scroll-top" data-astro-cid-epuvuop6>
						<svg data-astro-cid-epuvuop6="true" xmlns="http://www.w3.org/2000/svg" width="10" height="12" fill="none" viewBox="0 0 10 12" focusable="false" aria-hidden="true"><path fill="#2D628C" fill-rule="evenodd" d="M.87 3.982 4.464.386a.757.757 0 0 1 1.07 0L9.13 3.982a.757.757 0 1 1-1.07 1.07L5.757 2.748v8.331a.757.757 0 1 1-1.514 0V2.748L1.94 5.052a.757.757 0 1 1-1.07-1.07" clip-rule="evenodd" style="fill:#2d628c;fill-opacity:1"/></svg>
					</button>
					<button class="sound" data-astro-cid-epuvuop6>
						<canvas id="sound-canvas" width="24" height="24" data-astro-cid-epuvuop6></canvas>
					</button>
				</div>
			</div>
		</div>

		<div class="hero-transition" data-astro-transition-persist="transition-hero" data-cursor="draggable" data-cursor-down="dragging" data-astro-cid-3rse3tms>
			<div class="inner" data-astro-cid-3rse3tms>
				<?php
				$hero_titles = ['Montfort', 'Trading', 'Capital', 'Maritime', 'Fort Energy'];
				foreach($hero_titles as $ht): ?>
				<div class="title" data-astro-cid-3rse3tms>
					<p data-astro-cid-3rse3tms><?php echo $ht; ?></p>
					<div class="spinner" data-astro-cid-3rse3tms>
						<svg class="spinner-inner" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" data-astro-cid-3rse3tms>
							<g stroke-width="8" data-astro-cid-3rse3tms>
								<path stroke="url(#spinner-secondHalf)" d="M 4 100 A 96 96 0 0 1 196 100" data-astro-cid-3rse3tms></path>
								<path stroke="url(#spinner-firstHalf)" d="M 196 100 A 96 96 0 0 1 4 100" data-astro-cid-3rse3tms></path>
							</g>
						</svg>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<svg class="spinner-defs" xmlns="http://www.w3.org/2000/svg" color="#2d628c" data-astro-cid-3rse3tms>
				<defs data-astro-cid-3rse3tms>
					<linearGradient id="spinner-secondHalf" data-astro-cid-3rse3tms><stop offset="0%" stop-opacity="0" stop-color="currentColor"></stop><stop offset="100%" stop-opacity="0.5" stop-color="currentColor"></stop></linearGradient>
					<linearGradient id="spinner-firstHalf" data-astro-cid-3rse3tms><stop offset="0%" stop-opacity="1" stop-color="currentColor"></stop><stop offset="100%" stop-opacity="0.5" stop-color="currentColor"></stop></linearGradient>
				</defs>
			</svg>
		</div>

		<main data-scene="Homepage">
			<div class="topChapters" data-chapter="TopChapters" data-chapter-first="true">
				<section class="hero" data-chapter="Hero" data-chapter-first="true" data-theme="dark" data-animation="Hero" data-astro-cid-226k2nfd>
					<div class="hero-inner" data-astro-cid-226k2nfd>
						<!-- Logo SVG -->
						<svg class="logo logo-mb" data-astro-cid-226k2nfd="true" xmlns="http://www.w3.org/2000/svg" width="311" height="140" fill="none" viewBox="0 0 311 140" focusable="false" aria-hidden="true"><path fill="#2D628C" d="M155.5 87.016 0 87.483l155.5.467 155.5-.467zm-.076 51.962-98.107.467 98.107.467 98.107-.467zm142.009-38.161h-9.386v23.887h-2.015v-23.812h-9.385v-1.863h20.786zm-50.49 10.547h6.594c1.863 0 3.258-.467 4.263-1.471 1.01-1.011 1.472-2.249 1.472-3.803s-.467-2.791-1.472-3.802c-1.01-.928-2.406-1.471-4.263-1.471h-6.594zm14.887 13.34-8.609-11.477h-6.284v11.477h-2.015V99.035h8.685c2.406 0 4.263.695 5.659 2.015s2.091 3.026 2.091 5.04c0 1.782-.543 3.335-1.554 4.573-1.01 1.239-2.482 2.015-4.345 2.407l8.685 11.634h-2.325zM206.3 103.69c-2.097 2.173-3.183 4.888-3.183 8.066 0 3.177 1.086 5.893 3.183 8.065q3.143 3.26 7.907 3.259c3.178 0 5.742-1.086 7.832-3.259 2.097-2.172 3.183-4.888 3.183-8.065 0-3.178-1.086-5.893-3.183-8.066-2.09-2.173-4.73-3.259-7.832-3.259-3.177.076-5.817 1.162-7.907 3.259m17.217-1.244c2.558 2.558 3.878 5.659 3.878 9.386s-1.32 6.827-3.878 9.385-5.659 3.802-9.31 3.802c-3.65 0-6.827-1.238-9.303-3.802-2.558-2.558-3.802-5.659-3.802-9.385s1.238-6.904 3.802-9.386c2.558-2.558 5.659-3.802 9.303-3.802s6.746 1.238 9.31 3.802m-36.683-1.629h-13.649v9.928h11.324v1.863h-11.324v12.102h-2.015V99.041h15.664v1.781zm-32.111 0h-9.385v23.887h-2.015v-23.812h-9.386v-1.863h20.786zm-37.226-1.782v26.06h-.853L99.66 103.299v21.405h-2.015v-26.06h.777l17.06 21.872v-21.48zm-58.398 4.655c-2.097 2.173-3.177 4.888-3.177 8.066 0 3.177 1.086 5.893 3.177 8.065 2.097 2.173 4.73 3.259 7.914 3.259 3.182 0 5.74-1.086 7.831-3.259 2.097-2.172 3.178-4.888 3.178-8.065 0-3.178-1.087-5.893-3.178-8.066-2.09-2.173-4.73-3.259-7.831-3.259-3.184.076-5.818 1.162-7.914 3.259m17.217-1.244c2.558 2.558 3.878 5.659 3.878 9.386s-1.32 6.827-3.878 9.385-5.66 3.802-9.303 3.802c-3.645 0-6.828-1.238-9.31-3.802-2.558-2.558-3.802-5.659-3.802-9.385s1.238-6.904 3.802-9.386c2.558-2.558 5.66-3.802 9.31-3.802s6.745 1.238 9.303 3.802M36.298 98.65v26.06h-2.015v-20.938l-8.994 12.872h-.777l-9.076-12.872v20.938h-2.015V98.65h.777l10.624 15.278 10.7-15.278zm137.506-80.738a2.777 2.777 0 0 0 2.791-2.791 2.777 2.777 0 0 0-2.791-2.792c-1.087 0-2.097.62-2.558 1.554v.076c-.076.157-.076.233-.158.385-1.705 4.188-6.827 4.421-6.827 4.421-1.32 0-2.407.853-2.792 2.015-1.011 3.335-3.802 3.41-5.04 3.259-.31-.076-.695-.158-1.011-.158h-.467c-.234 0-.385.076-.619.076-1.238.158-4.036.158-5.04-3.101v-.076c-.386-1.162-1.554-2.015-2.868-2.015 0 0-5.122-.233-6.827-4.421-.076-.158-.076-.31-.158-.467-.467-.929-1.396-1.554-2.558-1.554a2.777 2.777 0 0 0-2.792 2.792 2.777 2.777 0 0 0 2.792 2.792s5.35.233 6.594 4.263c.233 1.32 1.238 2.406 2.558 2.558h.385c.234 0 .386 0 .619-.076 1.32.076 3.493.701 4.188 3.878 0 .158.076.386.076.543.233.929.852 1.706 1.553 2.325 0 0 3.102 2.173.152 6.126q-.076.077-.076.158l-.076.076c-.309.467-.543 1.086-.543 1.705q0 1.281.929 2.097.076.075.157.076c.544.467 2.407 2.634.158 5.432-.385.467-.695 1.01-.695 1.63a2.45 2.45 0 0 0 2.482 2.481 2.45 2.45 0 0 0 2.482-2.482c0-.619-.233-1.238-.695-1.63-.157-.157-2.014-2.324.31-5.507.543-.543.929-1.32.929-2.172 0-.62-.234-1.239-.544-1.706-.075-.076-.075-.158-.157-.233-.543-.777-2.173-3.569.157-6.127a4.27 4.27 0 0 0 1.706-2.95c.777-3.1 2.867-3.72 4.187-3.802.234.076.386.076.619.076 1.472 0 2.792-1.086 2.95-2.558 1.162-3.878 6.518-4.187 6.518-4.187zm-9.538 31.562c-1.01 0-1.781.777-1.781 1.781s.777 1.781 1.781 1.781a1.76 1.76 0 0 0 1.788-1.78c.075-1.011-.777-1.782-1.788-1.782m7.447-9.462a2.45 2.45 0 0 0-2.482 2.483 2.45 2.45 0 0 0 2.482 2.482 2.45 2.45 0 0 0 2.482-2.482c-.076-1.396-1.162-2.483-2.482-2.483m-8.072 1.396a2.45 2.45 0 0 0-2.482 2.482 2.45 2.45 0 0 0 2.482 2.483 2.45 2.45 0 0 0 2.483-2.483c0-1.32-1.163-2.482-2.483-2.482m.625-35.906a2.45 2.45 0 0 0 2.483-2.483 2.45 2.45 0 0 0-2.483-2.482 2.45 2.45 0 0 0-2.482 2.482c.076 1.396 1.162 2.483 2.482 2.483m8.451 2.015a2.45 2.45 0 0 0 2.483-2.483c0-1.32-1.087-2.482-2.483-2.482a2.45 2.45 0 0 0-2.482 2.482c0 1.396 1.163 2.483 2.482 2.483m0 15.67a3.03 3.03 0 0 0-3.025 3.025c0 1.705 1.32 3.025 3.025 3.025 1.706 0 3.026-1.32 3.026-3.025a3.03 3.03 0 0 0-3.026-3.026m-8.451 7.983a3.03 3.03 0 0 0-3.025 3.025c0 1.706 1.32 3.026 3.025 3.026 1.706 0 3.026-1.32 3.026-3.026s-1.32-3.025-3.026-3.025m17.603-11.943a2.777 2.777 0 0 0-2.791 2.791 2.777 2.777 0 0 0 2.791 2.792 2.777 2.777 0 0 0 2.792-2.792c-.076-1.553-1.32-2.791-2.792-2.791m2.331-11.32a3.03 3.03 0 0 0-3.026 3.026c0 1.706 1.32 3.026 3.026 3.026s3.025-1.32 3.025-3.026a3.03 3.03 0 0 0-3.025-3.025m-19.934 6.513a3.03 3.03 0 0 0 3.026-3.025c0-1.706-1.32-3.026-3.026-3.026s-3.025 1.32-3.025 3.026c.076 1.705 1.396 3.025 3.025 3.025m-17.842 35.054c-1.01 0-1.781.777-1.781 1.781s.777 1.781 1.781 1.781a1.755 1.755 0 0 0 1.781-1.78c0-1.005-.852-1.782-1.781-1.782m8.924 6.284c-1.01 0-1.781.777-1.781 1.781s.777 1.782 1.781 1.782a1.755 1.755 0 0 0 1.781-1.782c0-.928-.776-1.78-1.781-1.78m0-52.195a1.75 1.75 0 0 0 1.781-1.782A1.755 1.755 0 0 0 155.348 0a1.755 1.755 0 0 0-1.781 1.781c0 .929.777 1.782 1.781 1.782m-16.365 36.45c-1.32 0-2.482 1.086-2.482 2.482a2.45 2.45 0 0 0 2.482 2.482 2.45 2.45 0 0 0 2.483-2.482 2.45 2.45 0 0 0-2.483-2.483m8.066 1.395a2.45 2.45 0 0 0-2.482 2.482 2.45 2.45 0 0 0 2.482 2.483c1.32 0 2.482-1.087 2.482-2.483 0-1.32-1.086-2.482-2.482-2.482m-.625-35.906a2.45 2.45 0 0 0 2.482-2.483 2.45 2.45 0 0 0-2.482-2.482 2.45 2.45 0 0 0-2.482 2.482 2.45 2.45 0 0 0 2.482 2.483m-8.451 2.015a2.45 2.45 0 0 0 2.482-2.483c0-1.32-1.086-2.482-2.482-2.482a2.45 2.45 0 0 0-2.482 2.482 2.45 2.45 0 0 0 2.482 2.483m17.375 3.41a2.45 2.45 0 0 0 2.482-2.482 2.45 2.45 0 0 0-2.482-2.482c-1.32 0-2.482 1.086-2.482 2.482a2.45 2.45 0 0 0 2.482 2.482m-17.375 18.228a3.03 3.03 0 0 0 3.025-3.025c0-1.706-1.32-3.025-3.025-3.025s-3.025 1.32-3.025 3.025 1.32 3.025 3.025 3.025m39.475 1.63a2.253 2.253 0 0 0-2.248 2.248 2.253 2.253 0 0 0 2.248 2.249 2.254 2.254 0 0 0 2.249-2.249c-.076-1.238-1.087-2.248-2.249-2.248m-43.663 0a2.253 2.253 0 0 0-2.248 2.248 2.253 2.253 0 0 0 2.248 2.249 2.253 2.253 0 0 0 2.249-2.249 2.253 2.253 0 0 0-2.249-2.248m15.588 3.335a3.03 3.03 0 0 0-3.025-3.026c-1.705 0-3.025 1.32-3.025 3.026s1.32 3.025 3.025 3.025c1.706 0 3.025-1.32 3.025-3.026m-20.552-14.893a2.777 2.777 0 0 0-2.792 2.791 2.777 2.777 0 0 0 2.792 2.792 2.777 2.777 0 0 0 2.792-2.792 2.777 2.777 0 0 0-2.792-2.791m.619-8.3a3.03 3.03 0 0 0-3.025-3.025c-1.705 0-3.025 1.32-3.025 3.025 0 1.706 1.32 3.026 3.025 3.026a3.03 3.03 0 0 0 3.025-3.026m16.984 3.493c1.63 0 3.025-1.32 3.025-3.025 0-1.706-1.32-3.026-3.025-3.026s-3.025 1.32-3.025 3.026 1.32 3.025 3.025 3.025m5.899 2.324a3.03 3.03 0 0 1 3.025-3.025c1.706 0 3.025 1.32 3.025 3.025 0 1.706-1.319 3.026-3.025 3.026a3.03 3.03 0 0 1-3.025-3.026"/></svg>
						<div class="scroll-to-cta" data-astro-cid-226k2nfd>
							<div class="scroll-to-cta-inner" data-astro-cid-226k2nfd>
								<div class="scroll-to-cta-content-mb" data-astro-cid-226k2nfd>
									<span class="fs-cta-s" data-astro-cid-226k2nfd><?php echo esc_html($settings['hero_scroll_text_mb']); ?></span>
								</div>
								<div class="scroll-to-cta-content-dk" data-astro-cid-226k2nfd>
									<span class="fs-cta-s" data-astro-cid-226k2nfd><?php echo esc_html($settings['hero_scroll_text_dk']); ?></span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<section class="astro-va4abrey" data-chapter="WhoWeAre" id="WhoWeAre" data-label="Who we are" data-astro-cid-va4abrey>
				<div class="grid" data-astro-cid-va4abrey>
					<h2 data-animation="Title" class="fs-h2 uppercase tb:col-end-4 dk:col-start-10 dk:col-end-23 lg:col-start-14" data-astro-cid-va4abrey <?php echo $this->get_render_attribute_string( 'who_we_are_title' ); ?>>
						<?php echo esc_html( $settings['who_we_are_title'] ); ?>
					</h2>
					<div class="text-block dk:col-start-5 dk:col-end-13 lg:col-start-7" data-astro-cid-tbw6esjt>
						<div class="content fs-s1 montfort-navy-blue" data-astro-cid-tbw6esjt>
							<div class="content fs-s1 montfort-navy-blue" data-animation="TextBlock" data-astro-cid-tbw6esjt>
								<?php echo $settings['who_we_are_content']; ?>
							</div>
						</div>
						<a href="<?php echo esc_url( $settings['who_we_are_link_url']['url'] ); ?>" class="link-block montfort-navy-blue" data-animation="FadeIn" data-astro-cid-chamlvsj="true">
							<span class="link-block-label" data-astro-cid-chamlvsj><?php echo esc_html( $settings['who_we_are_link_text'] ); ?></span>
						</a>
					</div>
				</div>
			</section>

			<section class="astro-zdjhxtfb" data-chapter="WhatWeDo" id="WhatWeDo" data-label="What we do" data-astro-cid-zdjhxtfb>
				<div class="grid" data-astro-cid-zdjhxtfb>
					<h2 data-animation="Title" class="fs-h2 uppercase tb:col-end-4 dk:col-start-5 dk:col-end-19 lg:col-start-7 lg:col-end-17" data-astro-cid-zdjhxtfb <?php echo $this->get_render_attribute_string( 'what_we_do_title' ); ?>>
						<?php echo esc_html( $settings['what_we_do_title'] ); ?>
					</h2>
					<div class="read-more expandable tb:col-start-2 dk:col-start-14 dk:col-end-22 lg:col-start-15 lg:col-end-21" data-animation="ReadMore" data-line-count="4" data-astro-cid-mer3b7za style="--line-count: 4;">
						<div class="content-wrapper" data-astro-cid-mer3b7za style="--line-count: 4;">
							<div class="inner clamp fs-body montfort-navy-blue" data-astro-cid-mer3b7za style="--line-count: 4;">
								<p class="fs-s1" data-astro-cid-zdjhxtfb><?php echo esc_html( $settings['what_we_do_read_more'] ); ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="grid divisions-container" data-astro-cid-zdjhxtfb>
					<?php foreach ( $settings['what_we_do_divisions'] as $division ) : ?>
						<div class="division-link-ship <?php echo esc_attr( $division['col_class'] ); ?>" style="grid-row: <?php echo esc_attr( $division['row'] ); ?>;" data-astro-cid-r7rfymor>
							<div class="division-index white" data-animation="FadeIn" data-astro-cid-r7rfymor>
								<span class="fs-label" data-astro-cid-r7rfymor><?php echo esc_html( $division['index'] ); ?></span>
							</div>
							<div class="division-content" data-astro-cid-r7rfymor>
								<h3 class="fs-h4 white" data-animation="FadeIn" data-astro-cid-r7rfymor><?php echo esc_html( $division['subtitle'] ); ?></h3>
								<h4 class="fs-h3 white" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-r7rfymor><?php echo esc_html( $division['title'] ); ?></h4>
								<a href="<?php echo esc_url( $division['link_url']['url'] ); ?>" class="link-block white" data-animation="FadeIn" data-astro-cid-chamlvsj="true">
									<span class="link-block-label" data-astro-cid-chamlvsj><?php echo esc_html( $division['link_text'] ); ?></span>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</section>

			<section class="astro-5vnrzpll" data-chapter="GlobalConnectivity" id="GlobalConnectivity" data-label="Global connectivity" data-theme-chapters="dark" data-cursor="draggable" data-cursor-down="dragging" data-animation="GlobalConnectivity" data-astro-cid-5vnrzpll>
				<div class="grid" data-astro-cid-5vnrzpll>
					<h2 class="fs-h2 uppercase montfort-navy-blue-2 tb:col-end-4 dk:col-start-7 dk:col-end-22 lg:col-start-10" data-label="Global connectivity" data-astro-cid-5vnrzpll>
						<?php echo esc_html($settings['global_connectivity_title']); ?>
					</h2>
				</div>
				<?php foreach($settings['global_connectivity_points'] as $point): ?>
					<p class="fs-cta-s uppercase" data-point data-longitude="<?php echo esc_attr($point['longitude']); ?>" data-latitude="<?php echo esc_attr($point['latitude']); ?>" data-astro-cid-u35nqrgz>
						<span data-astro-cid-u35nqrgz><?php echo esc_html($point['name']); ?></span>
					</p>
				<?php endforeach; ?>
			</section>

			<div data-chapter="Sustainability" id="Sustainability" data-label="Sustainability" data-theme-chapters="dark">
				<section class="grid section-sustainability" data-astro-cid-arf6gcv7>
					<p class="fs-h5 white dk:col-start-3 dk:col-end-14 lg:col-start-7 lg:col-end-14" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-arf6gcv7>
						<?php echo esc_html( $settings['sustainability_intro'] ); ?>
					</p>
					<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs <?php echo $this->get_render_attribute_string( 'sustainability_title' ); ?>>
						<?php echo esc_html( $settings['sustainability_title'] ); ?>
					</h2>
					<p class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-animation="FadeIn" data-animation-color="#ffffff" data-astro-cid-arf6gcv7>
						<?php echo esc_html($settings['sustainability_framework_desc']); ?>
					</p>
					<div class="paragraphs-container dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-astro-cid-arf6gcv7>
						<?php foreach ( $settings['sustainability_paragraphs'] as $p ) : ?>
							<p class="fs-body white" data-animation="FadeIn" data-animation-color="#ffffff" data-astro-cid-arf6gcv7><?php echo esc_html( $p['paragraph'] ); ?></p>
						<?php endforeach; ?>
					</div>
				</section>

				<section class="section-solutions" data-chapter data-astro-cid-odekpglu>
					<div class="grid" data-astro-cid-odekpglu>
						<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs>
							<?php echo esc_html($settings['solutions_title']); ?>
						</h2>
					</div>
					<div class="grid-no-margin" data-astro-cid-odekpglu>
						<div class="description fs-s1 white dk:col-start-4 dk:col-end-11 lg:col-start-7 lg:col-end-12">
							<div class="inner clamp fs-body white">
								<?php echo $settings['solutions_description']; ?>
							</div>
						</div>
					</div>
				</section>

				<section data-chapter="Equality" id="Equality" data-label="Equality" class="section-equality grid" data-astro-cid-rvf7guv4>
					<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs>
						<?php echo esc_html($settings['equality_title']); ?>
					</h2>
					<div class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-rvf7guv4>
						<?php echo esc_html($settings['equality_desc_1']); ?>
					</div>
					<div class="second-description fs-body white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-rvf7guv4>
						<?php echo esc_html($settings['equality_desc_2']); ?>
					</div>
				</section>

				<section class="section-social" data-astro-cid-232lwzcd>
					<div class="grid" data-astro-cid-232lwzcd>
						<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs>
							<?php echo esc_html($settings['social_title']); ?>
						</h2>
						<p class="description fs-s1 white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-232lwzcd>
							<?php echo esc_html($settings['social_intro']); ?>
						</p>
					</div>
					<div class="grid-no-margin dk:grid" data-astro-cid-232lwzcd>
						<div class="images-container dk:col-start-7 dk:col-end-22 lg:col-start-9 lg:col-end-22" data-animation="ImagesContainer" data-astro-cid-232lwzcd>
							<?php foreach($settings['social_slides'] as $slide): ?>
								<div class="slide" data-astro-cid-232lwzcd>
									<div class="image-container">
										<img src="<?php echo esc_url($slide['image']['url']); ?>" alt="<?php echo esc_attr($slide['label']); ?>" loading="lazy">
									</div>
									<div class="content-mb-wrapper">
										<h3 class="label fs-label white"><?php echo esc_html($slide['label']); ?></h3>
										<p class="body fs-body white"><?php echo esc_html($slide['content']); ?></p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</section>
			</div>

			<div class="chapters-navigation" data-theme="light" data-astro-cid-gpzihxjt>
				<div class="chapters-container grid" data-astro-cid-gpzihxjt>
					<nav class="chapters-list fs-cta montfort-navy-blue uppercase tb:col-start-1 dk:col-start-2 ml:col-start-3 lg:col-start-3" data-astro-cid-gpzihxjt>
						<div class="chapter-wrapper" data-chapter-key="WhoWeAre"><a class="chapter-link" href="#WhoWeAre"><div class="dot"><span></span></div><div class="text-container"><span>Who we are</span></div></a></div>
						<div class="chapter-wrapper" data-chapter-key="WhatWeDo"><a class="chapter-link" href="#WhatWeDo"><div class="dot"><span></span></div><div class="text-container"><span>What we do</span></div></a></div>
						<div class="chapter-wrapper" data-chapter-key="GlobalConnectivity"><a class="chapter-link" href="#GlobalConnectivity"><div class="dot"><span></span></div><div class="text-container"><span>Global connectivity</span></div></a></div>
						<div class="chapter-wrapper" data-chapter-key="Sustainability"><a class="chapter-link" href="#Sustainability"><div class="dot"><span></span></div><div class="text-container"><span>Sustainability</span></div></a></div>
					</nav>
				</div>
			</div>
		</main>

		<footer data-astro-transition-persist="footer" id="footer" data-theme="light" data-astro-cid-rhv6ztfp>
			<div class="grid footer-container" data-astro-cid-rhv6ztfp>
				<div class="menu-left dk:col-start-3 dk:col-end-10 ml:col-start-3 ml:col-end-9 lg:col-start-4 lg:col-end-10">
					<ul class="menu-links">
						<?php foreach($settings['header_menu_links'] as $item): ?>
							<li><a href="<?php echo esc_url($item['link_url']['url']); ?>" class="fs-cta-s uppercase"><?php echo esc_html($item['link_text']); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="copyright-info dk:col-start-3 dk:col-end-24 ml:col-start-10 ml:col-end-24 lg:col-start-11 lg:col-end-21" data-astro-cid-rhv6ztfp>
				<p class="fs-body-s montfort-navy-blue" <?php echo $this->get_render_attribute_string( 'copyright_text' ); ?>><?php echo esc_html( $settings['copyright_text'] ); ?></p>
			</div>
		</footer>

		<script type="text/plain" data-cookieconsent="statistics">
			;(function (w, d, s, l, i) {
				w[l] = w[l] || []
				w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' })
				const f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != 'dataLayer' ? '&l=' + l : ''
				j.async = true
				j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl
				f.parentNode.insertBefore(j, f)
			})(window, document, 'script', 'dataLayer', 'GTM-5F3SQM6J')
		</script>
		<?php
	}

	protected function _content_template() {
		?>
		<header id="header" data-theme="light">
			<nav class="dk:col-start-2 dk:col-end-24">
				<div class="menu-links-w">
					<ul>
						<# _.each( settings.header_menu_links, function( item ) { #>
							<li>
								<a href="{{ item.link_url.url }}" class="nav-link {{ item.is_active === 'yes' ? 'active' : '' }}">
									<span>{{{ item.link_text }}}</span>
								</a>
							</li>
						<# } ); #>
					</ul>
				</div>
			</nav>
		</header>
		<main>
			<section><h2 data-elementor-setting-key="who_we_are_title">{{{ settings.who_we_are_title }}}</h2></section>
			<section><h2 data-elementor-setting-key="what_we_do_title">{{{ settings.what_we_do_title }}}</h2></section>
			<section><h2 data-elementor-setting-key="sustainability_title">{{{ settings.sustainability_title }}}</h2></section>
		</main>
		<footer>
			<p data-elementor-setting-key="copyright_text">{{{ settings.copyright_text }}}</p>
		</footer>
		<?php
	}
}
