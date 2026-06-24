<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_7_Top_Chapters extends Widget_Base {

	public function get_name() {
		return '7-top-chapters';
	}

	public function get_title() {
		return esc_html__( '7. Top Chapters (Hero, Who We Are, What We Do, Global)', 'custom-hello-theme' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		// Hero
		$this->start_controls_section('sec_hero', ['label' => 'Hero']);
		$this->add_control('hero_scroll_text', ['label' => 'Scroll Text', 'type' => Controls_Manager::TEXT, 'default' => 'Scroll down to discover']);
		$this->add_control('hero_logo_mb_svg', ['label' => 'Mobile Logo SVG Content', 'type' => Controls_Manager::RAW_HTML, 'default' => '<path fill="#2D628C" d="M155.5 87.016 0 87.483l155.5.467 155.5-.467zm-.076 51.962-98.107.467 98.107.467 98.107-.467zm142.009-38.161h-9.386v23.887h-2.015v-23.812h-9.385v-1.863h20.786zm-50.49 10.547h6.594c1.863 0 3.258-.467 4.263-1.471 1.01-1.011 1.472-2.249 1.472-3.803s-.467-2.791-1.472-3.802c-1.01-.928-2.406-1.471-4.263-1.471h-6.594zm14.887 13.34-8.609-11.477h-6.284v11.477h-2.015V99.035h8.685c2.406 0 4.263.695 5.659 2.015s2.091 3.026 2.091 5.04c0 1.782-.543 3.335-1.554 4.573-1.01 1.239-2.482 2.015-4.345 2.407l8.685 11.634h-2.325zM206.3 103.69c-2.097 2.173-3.183 4.888-3.183 8.066 0 3.177 1.086 5.893 3.183 8.065q3.143 3.26 7.907 3.259c3.178 0 5.742-1.086 7.832-3.259 2.097-2.172 3.183-4.888 3.183-8.065 0-3.178-1.086-5.893-3.183-8.066-2.09-2.173-4.73-3.259-7.832-3.259-3.177.076-5.817 1.162-7.907 3.259m17.217-1.244c2.558 2.558 3.878 5.659 3.878 9.386s-1.32 6.827-3.878 9.385-5.659 3.802-9.31 3.802c-3.65 0-6.827-1.238-9.303-3.802-2.558-2.558-3.802-5.659-3.802-9.385s1.238-6.904 3.802-9.386c2.558-2.558 5.659-3.802 9.303-3.802s6.746 1.238 9.31 3.802m-36.683-1.629h-13.649v9.928h11.324v1.863h-11.324v12.102h-2.015V99.041h15.664v1.781zm-32.111 0h-9.385v23.887h-2.015v-23.812h-9.386v-1.863h20.786zm-37.226-1.782v26.06h-.853L99.66 103.299v21.405h-2.015v-26.06h.777l17.06 21.872v-21.48zm-58.398 4.655c-2.097 2.173-3.177 4.888-3.177 8.066 0 3.177 1.086 5.893 3.177 8.065 2.097 2.173 4.73 3.259 7.914 3.259 3.182 0 5.74-1.086 7.831-3.259 2.097-2.172 3.178-4.888 3.178-8.065 0-3.178-1.087-5.893-3.178-8.066-2.09-2.173-4.73-3.259-7.831-3.259-3.184.076-5.818 1.162-7.914 3.259m17.217-1.244c2.558 2.558 3.878 5.659 3.878 9.386s-1.32 6.827-3.878 9.385-5.66 3.802-9.303 3.802c-3.645 0-6.828-1.238-9.31-3.802-2.558-2.558-3.802-5.659-3.802-9.385s1.238-6.904 3.802-9.386c2.558-2.558 5.66-3.802 9.31-3.802s6.745 1.238 9.303 3.802M36.298 98.65v26.06h-2.015v-20.938l-8.994 12.872h-.777l-9.076-12.872v20.938h-2.015V98.65h.777l10.624 15.278 10.7-15.278zm137.506-80.738a2.777 2.777 0 0 0 2.791-2.791 2.777 2.777 0 0 0-2.791-2.792c-1.087 0-2.097.62-2.558 1.554v.076c-.076.157-.076.233-.158.385-1.705 4.188-6.827 4.421-6.827 4.421-1.32 0-2.407.853-2.792 2.015-1.011 3.335-3.802 3.41-5.04 3.259-.31-.076-.695-.158-1.011-.158h-.467c-.234 0-.385.076-.619.076-1.238.158-4.036.158-5.04-3.101v-.076c-.386-1.162-1.554-2.015-2.868-2.015 0 0-5.122-.233-6.827-4.421-.076-.158-.076-.31-.158-.467-.467-.929-1.396-1.554-2.558-1.554a2.777 2.777 0 0 0-2.792 2.792 2.777 2.777 0 0 0 2.792 2.792s5.35.233 6.594 4.263c.233 1.32 1.238 2.406 2.558 2.558h.385c.234 0 .386 0 .619-.076 1.32.076 3.493.701 4.188 3.878 0 .158.076.386.076.543.233.929.852 1.706 1.553 2.325 0 0 3.102 2.173.152 6.126q-.076.077-.076.158l-.076.076c-.309.467-.543 1.086-.543 1.705q0 1.281.929 2.097.076.075.157.076c.544.467 2.407 2.634.158 5.432-.385.467-.695 1.01-.695 1.63a2.45 2.45 0 0 0 2.482 2.481 2.45 2.45 0 0 0 2.482-2.482c0-.619-.233-1.238-.695-1.63-.157-.157-2.014-2.324.31-5.507.543-.543.929-1.32.929-2.172 0-.62-.234-1.239-.544-1.706-.075-.076-.075-.158-.157-.233-.543-.777-2.173-3.569.157-6.127a4.27 4.27 0 0 0 1.706-2.95c.777-3.1 2.867-3.72 4.187-3.802.234.076.386.076.619.076 1.472 0 2.792-1.086 2.95-2.558 1.162-3.878 6.518-4.187 6.518-4.187zm-9.538 31.562c-1.01 0-1.781.777-1.781 1.781s.777 1.781 1.781 1.781a1.76 1.76 0 0 0 1.788-1.78c.075-1.011-.777-1.782-1.788-1.782m7.447-9.462a2.45 2.45 0 0 0-2.482 2.483 2.45 2.45 0 0 0 2.482 2.482 2.45 2.45 0 0 0 2.482-2.482c-.076-1.396-1.162-2.483-2.482-2.483m-8.072 1.396a2.45 2.45 0 0 0-2.482 2.482 2.45 2.45 0 0 0 2.482 2.483 2.45 2.45 0 0 0 2.483-2.483c0-1.32-1.163-2.482-2.483-2.482m.625-35.906a2.45 2.45 0 0 0 2.483-2.483 2.45 2.45 0 0 0-2.483-2.482 2.45 2.45 0 0 0-2.482 2.482c.076 1.396 1.162 2.483 2.482 2.483m8.451 2.015a2.45 2.45 0 0 0 2.483-2.483c0-1.32-1.087-2.482-2.483-2.482a2.45 2.45 0 0 0-2.482 2.482c0 1.396 1.163 2.483 2.482 2.483m0 15.67a3.03 3.03 0 0 0-3.025 3.025c0 1.705 1.32 3.025 3.025 3.025 1.706 0 3.026-1.32 3.026-3.025a3.03 3.03 0 0 0-3.026-3.026m-8.451 7.983a3.03 3.03 0 0 0-3.025 3.025c0 1.706 1.32 3.026 3.025 3.026 1.706 0 3.026-1.32 3.026-3.026s-1.32-3.025-3.026-3.025m17.603-11.943a2.777 2.777 0 0 0-2.791 2.791 2.777 2.777 0 0 0 2.791 2.792 2.777 2.777 0 0 0 2.792-2.792c-.076-1.553-1.32-2.791-2.792-2.791m2.331-11.32a3.03 3.03 0 0 0-3.026 3.026c0 1.706 1.32 3.026 3.026 3.026s3.025-1.32 3.025-3.026a3.03 3.03 0 0 0-3.025-3.025m-19.934 6.513a3.03 3.03 0 0 0 3.026-3.025c0-1.706-1.32-3.026-3.026-3.026s-3.025 1.32-3.025 3.026c.076 1.705 1.396 3.025 3.025 3.025m-17.842 35.054c-1.01 0-1.781.777-1.781 1.781s.777 1.781 1.781 1.781a1.755 1.755 0 0 0 1.781-1.78c0-1.005-.852-1.782-1.781-1.782m8.924 6.284c-1.01 0-1.781.777-1.781 1.781s.777 1.782 1.781 1.782a1.755 1.755 0 0 0 1.781-1.782c0-.928-.776-1.78-1.781-1.78m0-52.195a1.75 1.75 0 0 0 1.781-1.782A1.755 1.755 0 0 0 155.348 0a1.755 1.755 0 0 0-1.781 1.781c0 .929.777 1.782 1.781 1.782m-16.365 36.45c-1.32 0-2.482 1.086-2.482 2.482a2.45 2.45 0 0 0 2.482 2.482 2.45 2.45 0 0 0 2.483-2.482 2.45 2.45 0 0 0-2.483-2.483m8.066 1.395a2.45 2.45 0 0 0-2.482 2.482 2.45 2.45 0 0 0 2.482 2.483c1.32 0 2.482-1.087 2.482-2.483 0-1.32-1.086-2.482-2.482-2.482m-.625-35.906a2.45 2.45 0 0 0 2.482-2.483 2.45 2.45 0 0 0-2.482-2.482 2.45 2.45 0 0 0-2.482 2.482 2.45 2.45 0 0 0 2.482 2.483m-8.451 2.015a2.45 2.45 0 0 0 2.482-2.483c0-1.32-1.086-2.482-2.482-2.482a2.45 2.45 0 0 0-2.482 2.482 2.45 2.45 0 0 0 2.482 2.483m17.375 3.41a2.45 2.45 0 0 0 2.482-2.482 2.45 2.45 0 0 0-2.482-2.482c-1.32 0-2.482 1.086-2.482 2.482a2.45 2.45 0 0 0 2.482 2.482m-17.375 18.228a3.03 3.03 0 0 0 3.025-3.025c0-1.706-1.32-3.025-3.025-3.025s-3.025 1.32-3.025 3.025 1.32 3.025 3.025 3.025m39.475 1.63a2.253 2.253 0 0 0-2.248 2.248 2.253 2.253 0 0 0 2.248 2.249 2.254 2.254 0 0 0 2.249-2.249c-.076-1.238-1.087-2.248-2.249-2.248m-43.663 0a2.253 2.253 0 0 0-2.248 2.248 2.253 2.253 0 0 0 2.248 2.249 2.253 2.253 0 0 0 2.249-2.249 2.253 2.253 0 0 0-2.249-2.248m15.588 3.335a3.03 3.03 0 0 0-3.025-3.026c-1.705 0-3.025 1.32-3.025 3.026s1.32 3.025 3.025 3.025c1.706 0 3.025-1.32 3.025-3.026m-20.552-14.893a2.777 2.777 0 0 0-2.792 2.791 2.777 2.777 0 0 0 2.792 2.792 2.777 2.777 0 0 0 2.792-2.792 2.777 2.777 0 0 0-2.792-2.791m.619-8.3a3.03 3.03 0 0 0-3.025-3.025c-1.705 0-3.025 1.32-3.025 3.025 0 1.706 1.32 3.026 3.025 3.026a3.03 3.03 0 0 0 3.025-3.026m16.984 3.493c1.63 0 3.025-1.32 3.025-3.025 0-1.706-1.32-3.026-3.025-3.026s-3.025 1.32-3.025 3.026 1.32 3.025 3.025 3.025m5.899 2.324a3.03 3.03 0 0 1 3.025-3.025c1.706 0 3.025 1.32 3.025 3.025 0 1.706-1.319 3.026-3.025 3.026a3.03 3.03 0 0 1-3.025-3.026"></path>']);
		$this->end_controls_section();

		// Who We Are
		$this->start_controls_section('sec_who', ['label' => 'Who We Are']);
		$this->add_control('who_title', ['label' => 'Title', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Montfort is a global commodity trading and asset investment company.']);
		$this->add_control('who_desc', ['label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We trade, refine, store, and transport energy and commodities. We also invest in related assets and provide innovative services with integrity and efficiency to create long-term value for our clients.']);
		$this->add_control('who_url', ['label' => 'URL', 'type' => Controls_Manager::URL, 'default' => ['url' => '/who-we-are/']]);
		$this->end_controls_section();

		// What We Do
		$this->start_controls_section('sec_what', ['label' => 'What We Do']);
		$this->add_control('what_title', ['label' => 'Title', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We provide energy solutions with integrity and efficiency through our different business divisions.']);
		$this->add_control('what_desc', ['label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => "Montfort's interlinked divisions complement each other, providing integrated services that leverage their combined expertise."]);
		$rep_divs = new Repeater();
		$rep_divs->add_control('idx', ['label' => 'Index', 'type' => Controls_Manager::TEXT]);
		$rep_divs->add_control('title', ['label' => 'Title', 'type' => Controls_Manager::TEXT]);
		$rep_divs->add_control('sub', ['label' => 'Subtitle', 'type' => Controls_Manager::TEXTAREA]);
		$rep_divs->add_control('url', ['label' => 'URL', 'type' => Controls_Manager::URL]);
		$this->add_control('divisions', ['label' => 'Divisions', 'type' => Controls_Manager::REPEATER, 'fields' => $rep_divs->get_controls(),
			'default' => [
				['idx' => '1', 'title' => 'Montfort Trading', 'sub' => 'Operating Efficiently by Leading with Innovation.', 'url' => ['url' => '/trading/']],
				['idx' => '2', 'title' => 'Montfort Capital', 'sub' => 'Identify and seize opportunities that maximise Value', 'url' => ['url' => '/capital/']],
				['idx' => '3', 'title' => 'Montfort Maritime', 'sub' => 'Powering Progress, Delivering Energy.', 'url' => ['url' => '/maritime/']],
				['idx' => '4', 'title' => 'Fort Energy', 'sub' => 'Advancing Innovation in Energy Investments', 'url' => ['url' => '/fort-energy/']],
			]
		]);
		$this->end_controls_section();

		// Global
		$this->start_controls_section('sec_global', ['label' => 'Global Connectivity']);
		$this->add_control('g_title', ['label' => 'Title', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Established in the world’s major trade hubs and financial markets with over 15 global offices, we connect and serve both emerging and mature markets worldwide.']);
		$rep_locs = new Repeater();
		$rep_locs->add_control('name', ['label' => 'Name', 'type' => Controls_Manager::TEXT]);
		$rep_locs->add_control('lng', ['label' => 'Lng', 'type' => Controls_Manager::TEXT]);
		$rep_locs->add_control('lat', ['label' => 'Lat', 'type' => Controls_Manager::TEXT]);
		$this->add_control('locations', ['label' => 'Locations', 'type' => Controls_Manager::REPEATER, 'fields' => $rep_locs->get_controls(),
			'default' => [
				['name' => 'Switzerland', 'lng' => '4', 'lat' => '46.818188'], ['name' => 'United Arab Emirates', 'lng' => '54.35495', 'lat' => '24.48818'], ['name' => 'Singapore', 'lng' => '97', 'lat' => '1.352083'],
			]
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<main data-scene="Homepage">
			<div class="topChapters" data-chapter="TopChapters" data-chapter-first="true">
				<section class="hero" data-chapter="Hero" data-chapter-first="true" data-theme="dark" data-animation="Hero" data-astro-cid-226k2nfd="" style="opacity: 1;">
					<div class="hero-inner" data-astro-cid-226k2nfd="">
						<svg class="logo logo-mb" data-astro-cid-226k2nfd="true" xmlns="http://www.w3.org/2000/svg" width="311" height="140" fill="none" viewBox="0 0 311 140" focusable="false" aria-hidden="true" style="opacity: 0;"><?php echo $settings['hero_logo_mb_svg']; ?></svg>
						<div class="scroll-to-cta" data-astro-cid-226k2nfd="" style="opacity: 1;">
							<div class="scroll-to-cta-inner" data-astro-cid-226k2nfd="" style="opacity: 0;">
								<div class="scroll-to-cta-content-dk" data-astro-cid-226k2nfd="">
									<span class="fs-cta-s" data-astro-cid-226k2nfd=""><?php echo esc_html( $settings['hero_scroll_text'] ); ?></span>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="astro-va4abrey" data-chapter="WhoWeAre" id="WhoWeAre" data-label="Who we are" data-astro-cid-va4abrey="">
					<div class="grid" data-astro-cid-va4abrey="">
						<h2 data-animation="Title" class="fs-h2 uppercase tb:col-end-4 dk:col-start-10 dk:col-end-23 lg:col-start-14" data-astro-cid-va4abrey=""><?php echo wp_kses_post( $settings['who_title'] ); ?></h2>
						<div class="text-block dk:col-start-5 dk:col-end-13 lg:col-start-7" data-astro-cid-tbw6esjt="">
							<div class="content fs-s1 montfort-navy-blue" data-astro-cid-tbw6esjt=""><div class="content fs-s1 montfort-navy-blue" data-animation="TextBlock" data-astro-cid-tbw6esjt=""><p><?php echo wp_kses_post( $settings['who_desc'] ); ?></p></div></div>
							<a href="<?php echo esc_url( $settings['who_url']['url'] ); ?>" class="link-block montfort-navy-blue undefined" data-animation="FadeIn" data-astro-cid-chamlvsj="true">
								<span class="link-block-label" data-astro-cid-chamlvsj="">Who we are</span>
							</a>
						</div>
					</div>
				</section>
				<section class="astro-zdjhxtfb" data-chapter="WhatWeDo" id="WhatWeDo" data-label="What we do" data-astro-cid-zdjhxtfb="" style="--overflow: 212px;">
					<div class="grid" data-astro-cid-zdjhxtfb="">
						<h2 data-animation="Title" class="fs-h2 uppercase tb:col-end-4 dk:col-start-5 dk:col-end-19 lg:col-start-7 lg:col-end-17" data-astro-cid-zdjhxtfb=""><?php echo wp_kses_post( $settings['what_title'] ); ?></h2>
						<div class="read-more expandable tb:col-start-2 dk:col-start-14 dk:col-end-22 lg:col-start-15 lg:col-end-21" data-animation="ReadMore" data-line-count="4" data-astro-cid-mer3b7za="" style="--line-count: 4;">
							<div class="content-wrapper" data-astro-cid-mer3b7za="" style="--line-count: 4;"><div data-astro-cid-mer3b7za="" style="--line-count: 4;"><div class="content" data-astro-cid-mer3b7za="" style=""><div class="inner clamp fs-body montfort-navy-blue" data-astro-cid-mer3b7za="" style="--line-count: 4;"><p class="fs-s1" data-astro-cid-zdjhxtfb=""><?php echo wp_kses_post( $settings['what_desc'] ); ?></p></div></div></div></div>
						</div>
					</div>
					<div class="grid divisions-container" data-astro-cid-zdjhxtfb="">
						<?php foreach ( $settings['divisions'] as $index => $item ) : ?>
							<div class="division-link-ship" style="grid-row: <?php echo $index+2; ?>;">
								<div class="division-index white"><span class="fs-label"><?php echo esc_html( $item['idx'] ); ?></span></div>
								<div class="division-content">
									<h3 class="fs-h4 white"><?php echo esc_html( $item['title'] ); ?></h3>
									<h4 class="fs-h3 white"><?php echo esc_html( $item['sub'] ); ?></h4>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</section>
				<section class="astro-5vnrzpll" data-chapter="GlobalConnectivity" id="GlobalConnectivity" data-label="Global connectivity" data-theme-chapters="dark" data-cursor="draggable" data-cursor-down="dragging" data-animation="GlobalConnectivity" data-astro-cid-5vnrzpll="">
					<div class="grid" data-astro-cid-5vnrzpll=""><h2 class="fs-h2 uppercase montfort-navy-blue-2 tb:col-end-4 dk:col-start-7 dk:col-end-22 lg:col-start-10" data-label="Global connectivity" data-astro-cid-5vnrzpll="" style="color: rgb(255, 255, 255);"><?php echo wp_kses_post( $settings['g_title'] ); ?></h2></div>
					<?php foreach ( $settings['locations'] as $item ) : ?>
						<p class="fs-cta-s uppercase" data-point="" data-longitude="<?php echo esc_attr( $item['lng'] ); ?>" data-latitude="<?php echo esc_attr( $item['lat'] ); ?>" data-astro-cid-u35nqrgz="" style="opacity: 0;"><span data-astro-cid-u35nqrgz=""><?php echo esc_html( $item['name'] ); ?></span></p>
					<?php endforeach; ?>
				</section>
			</div>
		<?php
	}
}
