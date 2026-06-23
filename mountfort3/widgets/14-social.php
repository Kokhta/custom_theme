<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Social_Widget extends Widget_Base {

	public function get_name() {
		return '14-social';
	}

	public function get_title() {
		return '14. Social (CSR)';
	}

	public function get_icon() {
		return 'eicon-slideshow';
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

		$this->add_control(
			'index_num',
			array(
				'label'   => 'Index Number',
				'type'    => Controls_Manager::TEXT,
				'default' => '4',
			)
		);

		$this->add_control(
			'title_html',
			array(
				'label'   => 'Title HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div style="display: block; text-align: start; position: relative;">OUR PLEDGE TO CORPORATE SOCIAL RESPONSIBILITY</div>',
			)
		);

		$this->add_control(
			'desc_html',
			array(
				'label'   => 'Description HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<p>Giving back to our communities is an imperative part of the work we do.</p>',
			)
		);

		$slide_repeater = new Repeater();
		$slide_repeater->add_control( 'image', array( 'label' => 'Slide Image', 'type' => Controls_Manager::MEDIA ) );
		$slide_repeater->add_control( 'label', array( 'label' => 'Slide Label', 'type' => Controls_Manager::TEXT ) );
		$slide_repeater->add_control( 'body_html', array( 'label' => 'Slide Body HTML', 'type' => Controls_Manager::WYSIWYG ) );

		// Flattening the nested repeater: For simplicity in this case, we'll allow up to 4 logos per slide as separate controls within the slide repeater.
		$slide_repeater->add_control( 'logo1', array( 'label' => 'Logo 1', 'type' => Controls_Manager::MEDIA ) );
		$slide_repeater->add_control( 'alt1', array( 'label' => 'Alt 1', 'type' => Controls_Manager::TEXT ) );
		$slide_repeater->add_control( 'logo2', array( 'label' => 'Logo 2', 'type' => Controls_Manager::MEDIA ) );
		$slide_repeater->add_control( 'alt2', array( 'label' => 'Alt 2', 'type' => Controls_Manager::TEXT ) );
		$slide_repeater->add_control( 'logo3', array( 'label' => 'Logo 3', 'type' => Controls_Manager::MEDIA ) );
		$slide_repeater->add_control( 'alt3', array( 'label' => 'Alt 3', 'type' => Controls_Manager::TEXT ) );
		$slide_repeater->add_control( 'logo4', array( 'label' => 'Logo 4', 'type' => Controls_Manager::MEDIA ) );
		$slide_repeater->add_control( 'alt4', array( 'label' => 'Alt 4', 'type' => Controls_Manager::TEXT ) );

		$this->add_control(
			'slides',
			array(
				'label'       => 'Slider Slides',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $slide_repeater->get_controls(),
				'title_field' => '{{{ label }}}',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="section-social" data-astro-cid-232lwzcd="">
			<div class="grid" data-astro-cid-232lwzcd="">
				<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
					<?php echo esc_html( $settings['index_num'] ); ?>
				</div>
				<div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs=""></div>
				<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs="">
					<?php echo $settings['title_html']; ?>
				</h2>
				<div class="description fs-s1 white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-232lwzcd="">
					<?php echo $settings['desc_html']; ?>
				</div>
			</div>
			<div class="grid-no-margin dk:grid" data-astro-cid-232lwzcd="">
				<div class="images-container dk:col-start-7 dk:col-end-22 lg:col-start-9 lg:col-end-22" data-animation="ImagesContainer" data-astro-cid-232lwzcd="" style="height: 230px;">
					<?php foreach ( $settings['slides'] as $index => $slide ) : ?>
						<div class="slide" data-astro-cid-232lwzcd="" style="z-index: <?php echo $index === 0 ? '4' : '0'; ?>; translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px);">
							<div class="image-container" data-astro-cid-232lwzcd="">
								<img src="<?php echo esc_url( $slide['image']['url'] ); ?>" alt="<?php echo esc_attr( $slide['label'] ); ?>" data-astro-cid-uvauvyym="true" loading="lazy" decoding="async">
							</div>
							<div class="content-mb-wrapper" data-astro-cid-232lwzcd="">
								<h3 class="label fs-label white" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-232lwzcd=""><?php echo esc_html( $slide['label'] ); ?></h3>
								<div class="body fs-body white" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-232lwzcd="">
									<?php echo $slide['body_html']; ?>
								</div>
								<div class="logo-container" data-astro-cid-232lwzcd="">
									<?php for ( $i = 1; $i <= 4; $i ++ ) :
										$logo_key = 'logo' . $i;
										$alt_key = 'alt' . $i;
										if ( ! empty( $slide[$logo_key]['url'] ) ) : ?>
										<div class="logo-item" data-animation="FadeIn" data-astro-cid-232lwzcd="">
											<img src="<?php echo esc_url( $slide[$logo_key]['url'] ); ?>" alt="<?php echo esc_attr( $slide[$alt_key] ); ?>" data-astro-cid-uvauvyym="true" loading="lazy" decoding="async">
										</div>
									<?php endif; endfor; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="navigation-social-dk dk:col-start-6 dk:col-end-10 lg:col-start-10 lg:col-end-13" data-animation="Navigation" data-astro-cid-232lwzcd="">
					<?php foreach ( $settings['slides'] as $index => $slide ) : ?>
						<button class="navigation-social-button" aria-label="Show slide <?php echo $index + 1; ?>" data-astro-cid-232lwzcd="">
							<div class="navigation-social-item <?php echo $index === 0 ? 'active' : ''; ?>" data-astro-cid-232lwzcd=""></div>
						</button>
					<?php endforeach; ?>
				</div>
				<div class="content-social-dk dk:col-start-11 dk:col-end-22 lg:col-start-13 lg:col-end-22" id="content-social-dk" data-astro-cid-232lwzcd="" style="height: 279px;">
					<?php foreach ( $settings['slides'] as $index => $slide ) : ?>
						<div class="content-social-item" data-astro-cid-232lwzcd="" style="<?php echo $index === 0 ? 'opacity: 1; pointer-events: auto;' : 'opacity: 0; pointer-events: none;'; ?>">
							<h3 class="label fs-label white" data-animation="FadeIn" data-astro-cid-232lwzcd=""><?php echo esc_html( $slide['label'] ); ?></h3>
							<div class="body fs-body white" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-232lwzcd="">
								<?php echo $slide['body_html']; ?>
							</div>
							<div class="logo-container" data-astro-cid-232lwzcd="">
								<?php for ( $i = 1; $i <= 4; $i ++ ) :
									$logo_key = 'logo' . $i;
									$alt_key = 'alt' . $i;
									if ( ! empty( $slide[$logo_key]['url'] ) ) : ?>
									<div class="logo-item" data-animation="FadeIn" data-astro-cid-232lwzcd="">
										<img src="<?php echo esc_url( $slide[$logo_key]['url'] ); ?>" alt="<?php echo esc_attr( $slide[$alt_key] ); ?>" data-astro-cid-uvauvyym="true" loading="lazy" decoding="async">
									</div>
								<?php endif; endfor; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
