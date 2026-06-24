<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MountFort_Widget_14_Social_Responsibility extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mountfort_social_responsibility';
	}

	public function get_title() {
		return esc_html__( '14-Social Responsibility', 'mountfort' );
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'mountfort' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'section_class', [ 'label' => 'Section Class', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'section-social' ] );

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'OUR PLEDGE TO CORPORATE SOCIAL RESPONSIBILITY',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Giving back to our communities is an imperative part of the work we do. Montfort Group’s CSR efforts are centered around three pillars: supporting education, alleviating poverty, and empowering women.',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'slide_title', [ 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'slide_body', [ 'type' => \Elementor\Controls_Manager::TEXTAREA ] );
		$repeater->add_control( 'slide_image', [ 'type' => \Elementor\Controls_Manager::MEDIA ] );

		$logo_repeater = new \Elementor\Repeater();
		$logo_repeater->add_control( 'logo_img', [ 'type' => \Elementor\Controls_Manager::MEDIA ] );
		$logo_repeater->add_control( 'logo_alt', [ 'type' => \Elementor\Controls_Manager::TEXT ] );

		$repeater->add_control(
			'logos',
			[
				'label' => 'Logos',
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $logo_repeater->get_controls(),
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => esc_html__( 'Slides', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'slide_title' => 'Alleviating Poverty',
						'slide_body' => 'With the help of local NGOs, we support the communities where we invest. Montfort has successfully financed clean water projects, initiatives for orphaned children, earthquake relief, food distribution, and medical support for those in need.',
					],
					[
						'slide_title' => 'Empowering Women',
						'slide_body' => 'We are \'Creating Experts Through Education\' in collaboration with The Doyenne Initiative, a non-profit organization that drives female experts to take on industry, education, and government leadership roles.',
					],
					[
						'slide_title' => 'Supporting Education',
						'slide_body' => 'We aim to help children secure a future for themselves through the support of education. We provide opportunities for success by building schools, funding scholarship programs and renewable energy projects, and supplying drinking water for schools.',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="<?php echo esc_attr($settings['section_class']); ?>" data-astro-cid-232lwzcd="">
			<div class="grid" data-astro-cid-232lwzcd="">
				<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs=""> 4 </div>
				<div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs="" style=""></div>
				<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs="">
					<?php echo esc_html($settings['title']); ?>
				</h2>
				<p class="description fs-s1 white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-232lwzcd="">
					<?php echo esc_html($settings['description']); ?>
				</p>
			</div>
			<div class="grid-no-margin dk:grid" data-astro-cid-232lwzcd="">
				<div class="images-container dk:col-start-7 dk:col-end-22 lg:col-start-9 lg:col-end-22" data-animation="ImagesContainer" data-astro-cid-232lwzcd="">
					<?php foreach ( $settings['slides'] as $index => $slide ) : ?>
						<div class="slide" data-astro-cid-232lwzcd="">
							<div class="image-container" data-astro-cid-232lwzcd="">
								<img src="<?php echo esc_url($slide['slide_image']['url'] ?: '/_astro/m_Lob0Q.png'); ?>" alt="<?php echo esc_attr($slide['slide_title']); ?>" draggable="false" data-astro-cid-uvauvyym="true" loading="lazy" decoding="async">
							</div>
							<div class="content-mb-wrapper" data-astro-cid-232lwzcd="">
								<h3 class="label fs-label white" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-232lwzcd=""> <?php echo esc_html($slide['slide_title']); ?> </h3>
								<p class="body fs-body white" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-232lwzcd=""> <?php echo esc_html($slide['slide_body']); ?> </p>
								<?php if ( !empty($slide['logos']) ) : ?>
								<div class="logo-container" data-astro-cid-232lwzcd="">
									<?php foreach ($slide['logos'] as $logo) : ?>
									<div class="logo-item" data-animation="FadeIn" data-astro-cid-232lwzcd="">
										<img src="<?php echo esc_url($logo['logo_img']['url']); ?>" alt="<?php echo esc_attr($logo['logo_alt']); ?>" data-astro-cid-uvauvyym="true" loading="lazy">
									</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="navigation-social-dk dk:col-start-6 dk:col-end-10 lg:col-start-10 lg:col-end-13" data-animation="Navigation" data-astro-cid-232lwzcd="">
					<?php foreach ( $settings['slides'] as $index => $slide ) : ?>
						<button class="navigation-social-button" aria-label="Show slide <?php echo $index + 1; ?>" data-astro-cid-232lwzcd="">
							<div class="navigation-social-item" data-astro-cid-232lwzcd=""></div>
						</button>
					<?php endforeach; ?>
				</div>
				<div class="content-social-dk dk:col-start-11 dk:col-end-22 lg:col-start-13 lg:col-end-22" id="content-social-dk" data-astro-cid-232lwzcd="">
					<?php foreach ( $settings['slides'] as $index => $slide ) : ?>
						<div class="content-social-item" data-astro-cid-232lwzcd="">
							<h3 class="label fs-label white" data-animation="FadeIn" data-astro-cid-232lwzcd=""> <?php echo esc_html($slide['slide_title']); ?> </h3>
							<p class="body fs-body white" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-232lwzcd=""> <?php echo esc_html($slide['slide_body']); ?> </p>
							<?php if ( !empty($slide['logos']) ) : ?>
							<div class="logo-container" data-astro-cid-232lwzcd="">
								<?php foreach ($slide['logos'] as $logo) : ?>
								<div class="logo-item" data-animation="FadeIn" data-astro-cid-232lwzcd="">
									<img src="<?php echo esc_url($logo['logo_img']['url']); ?>" alt="<?php echo esc_attr($logo['logo_alt']); ?>" data-astro-cid-uvauvyym="true" loading="lazy">
								</div>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
