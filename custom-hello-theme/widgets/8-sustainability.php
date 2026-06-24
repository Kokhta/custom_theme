<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_8_Sustainability extends Widget_Base {

	public function get_name() {
		return '8-sustainability';
	}

	public function get_title() {
		return esc_html__( '8. Sustainability Chapter (Framework to Social)', 'custom-hello-theme' );
	}

	public function get_icon() {
		return 'eicon-shield-check';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		// Framework
		$this->start_controls_section('sec_f', ['label' => 'Framework']);
		$this->add_control('f_intro', ['label' => 'Intro', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We are committed to integrating our sustainability strategy...']);
		$this->add_control('f_title', ['label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Our ethics and compliance framework']);
		$this->add_control('f_desc', ['label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'At Montfort, we operate under an integrated Sustainability Framework...']);
		$repeater_f = new Repeater();
		$repeater_f->add_control('p', ['label' => 'Paragraph', 'type' => Controls_Manager::TEXTAREA]);
		$this->add_control('f_paragraphs', ['label' => 'Paragraphs', 'type' => Controls_Manager::REPEATER, 'fields' => $repeater_f->get_controls()]);
		$this->end_controls_section();

		// Energy
		$this->start_controls_section('sec_e', ['label' => 'Energy']);
		$this->add_control('e_title', ['label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'DELIVERING SUSTAINABLE ENERGY SOLUTIONS']);
		$this->add_control('e_desc', ['label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We are dedicated to fostering a future where energy is both sustainable and accessible...']);
		$this->end_controls_section();

		// Equality
		$this->start_controls_section('sec_eq', ['label' => 'Equality']);
		$this->add_control('eq_title', ['label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'OUR COMMITMENT TO EQUALITY']);
		$this->add_control('eq_desc1', ['label' => 'Desc 1', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We strive to create an environment where everyone can thrive...']);
		$this->add_control('eq_desc2', ['label' => 'Desc 2', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We are proud that our staff come from almost 27 nationalities...']);
		$this->end_controls_section();

		// Social
		$this->start_controls_section('sec_s', ['label' => 'Social']);
		$this->add_control('s_title', ['label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'OUR PLEDGE TO CORPORATE SOCIAL RESPONSIBILITY']);
		$this->add_control('s_desc', ['label' => 'Description', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Giving back to our communities is an imperative part of the work we do...']);
		$logo_rep = new Repeater();
		$logo_rep->add_control('img', ['label' => 'Logo', 'type' => Controls_Manager::MEDIA]);
		$logo_rep->add_control('alt', ['label' => 'Alt', 'type' => Controls_Manager::TEXT]);
		$slide_rep = new Repeater();
		$slide_rep->add_control('title', ['label' => 'Title', 'type' => Controls_Manager::TEXT]);
		$slide_rep->add_control('desc', ['label' => 'Desc', 'type' => Controls_Manager::TEXTAREA]);
		$slide_rep->add_control('img', ['label' => 'Image', 'type' => Controls_Manager::MEDIA]);
		$slide_rep->add_control('logos', ['label' => 'NGO Logos', 'type' => Controls_Manager::REPEATER, 'fields' => $logo_rep->get_controls()]);
		$this->add_control('s_slides', ['label' => 'Slides', 'type' => Controls_Manager::REPEATER, 'fields' => $slide_rep->get_controls()]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-chapter="Sustainability" id="Sustainability" data-label="Sustainability" data-theme-chapters="dark">
			<section class="grid section-sustainability" data-astro-cid-arf6gcv7="">
				<p class="fs-h5 white dk:col-start-3 dk:col-end-14 lg:col-start-7 lg:col-end-14" data-animation="SplitBlock" data-animation-color="#ffffff"><?php echo wp_kses_post($settings['f_intro']); ?></p>
				<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn"> 1 </div>
				<div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line"></div>
				<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff"><?php echo esc_html($settings['f_title']); ?></h2>
				<p class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-animation="FadeIn" data-animation-color="#ffffff"><?php echo wp_kses_post($settings['f_desc']); ?></p>
				<div class="paragraphs-container dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22">
					<?php foreach ($settings['f_paragraphs'] as $item) : ?><p class="fs-body white" data-animation="FadeIn" data-animation-color="#ffffff"><?php echo wp_kses_post($item['p']); ?></p><?php endforeach; ?>
				</div>
			</section>

			<section class="section-solutions" data-astro-cid-odekpglu="" style="--overflow: 20px;">
				<div class="grid"><div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn"> 2 </div><div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line"></div><h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff"><?php echo esc_html($settings['e_title']); ?></h2></div>
				<div class="grid-no-margin"><div class="description fs-s1 white dk:col-start-4 dk:col-end-11 lg:col-start-7 lg:col-end-12"><p><?php echo wp_kses_post($settings['e_desc']); ?></p></div></div>
			</section>

			<section data-chapter="Equality" id="Equality" data-label="Equality" class="section-equality grid">
				<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn"> 3 </div><div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line"></div><h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff"><?php echo esc_html($settings['eq_title']); ?></h2>
				<div class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12"><?php echo wp_kses_post($settings['eq_desc1']); ?></div>
				<div class="second-description fs-body white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22"><?php echo wp_kses_post($settings['eq_desc2']); ?></div>
			</section>

			<section class="section-social">
				<div class="grid"><div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn"> 4 </div><div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line"></div><h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff"><?php echo esc_html($settings['s_title']); ?></h2><p class="description fs-s1 white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22"><?php echo wp_kses_post($settings['s_desc']); ?></p></div>
				<div class="grid-no-margin dk:grid"><div class="images-container dk:col-start-7 dk:col-end-22 lg:col-start-9 lg:col-end-22">
					<?php foreach ($settings['s_slides'] as $slide) : ?>
						<div class="slide"><div class="image-container"><img src="<?php echo esc_url($slide['img']['url'] ?: '/_astro/m_Lob0Q.png'); ?>" alt=""></div><div class="content-mb-wrapper"><h3 class="label fs-label white"><?php echo esc_html($slide['title']); ?></h3><p class="body fs-body white"><?php echo wp_kses_post($slide['desc']); ?></p></div></div>
					<?php endforeach; ?>
				</div></div>
			</section>
		</div>
		</main>
		<script type="module" src="/_astro/Solutions.astro_astro_type_script_index_0_lang.DH4T_DBQ.js" data-astro-exec=""></script>
		<script type="module" src="/_astro/Social.astro_astro_type_script_index_0_lang.DMS86Kjn.js" data-astro-exec=""></script>
		<?php
	}
}
