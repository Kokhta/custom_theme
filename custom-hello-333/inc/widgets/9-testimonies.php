<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_9_testimonies extends \Elementor\Widget_Base {

	public function get_name() {
		return '9-testimonies';
	}

	public function get_title() {
		return esc_html__( '9-testimonies', 'custom-hello-333' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'custom-hello-333' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'People all around the world love Oryzo',
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => esc_html__( 'Description', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Do not take our word for it, see what people say after living with Oryzo.',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control('rating', ['label' => 'Rating', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '5/5']);
		$repeater->add_control('star_type', ['label' => 'Star Type', 'type' => \Elementor\Controls_Manager::SELECT, 'options' => ['star' => 'Full', 'star-half' => 'Half'], 'default' => 'star']);
		$repeater->add_control('quote', ['label' => 'Quote', 'type' => \Elementor\Controls_Manager::TEXTAREA]);
		$repeater->add_control('author_name', ['label' => 'Author Name', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('author_desc', ['label' => 'Author Description', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('img_desktop', ['label' => 'Image Desktop', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('img_mobile', ['label' => 'Image Mobile', 'type' => \Elementor\Controls_Manager::TEXT]);

		$this->add_control(
			'reviews',
			[
				'label' => esc_html__( 'Reviews', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'rating' => '5/5',
						'star_type' => 'star',
						'quote' => '"This is the best coaster that I\'ve ever used. I can\'t go to the spacewithout it"',
						'author_name' => 'Edan K.',
						'author_desc' => 'NASA astronaut wannabe',
						'img_desktop' => '/images/testimonies/astronut.webp',
						'img_mobile' => '/images/testimonies/astronut_MOBILE.webp',
					]
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="testimonies" class="section" style="visibility: hidden;">
			<div class="section__inner o-container">
				<div id="testimonies-hero">
					<h2 id="testimonies-hero-title" aria-label="<?php echo esc_attr($settings['title']); ?>"><?php echo esc_html($settings['title']); ?></h2>
					<div id="testimonies-hero-desc" class="body1" aria-label="<?php echo esc_attr($settings['desc']); ?>"><?php echo esc_html($settings['desc']); ?></div>
				</div>
				<div id="testimonies-table">
					<svg style="display: none;">
						<symbol id="star-half">
							<path d="M6.9907.9943c.1811-.464.8376-.464,1.0187,0l1.5153,3.8817c.0777.1991.2643.3347.4776.347l4.1599.2415c.4972.0289.7001.6533.3148.9689l-3.2234,2.6405c-.1654.1355-.2366.3548-.1825.5616l1.0558,4.0309c.1262.4818-.405.8677-.8242.5988l-3.5074-2.2497c-.1799-.1154-.4105-.1154-.5904,0l-3.5074,2.2497c-.4192.2689-.9504-.117-.8242-.5988l1.0558-4.0309c.0542-.2068-.0171-.4261-.1825-.5616L.523,6.4334c-.3853-.3156-.1824-.94.3148-.9689l4.1599-.2415c.2134-.0124.4-.1479.4777-.347l1.5152-3.8817Z" style="fill:#ffedd6; opacity:.5;"></path><path d="M7.4709.6548c-.199.0107-.3942.1188-.4803.3395l-1.5152,3.8817c-.0778.1991-.2643.3347-.4777.347l-4.1599.2415c-.4972.0289-.7001.6533-.3148.9689l3.2234,2.6406c.1653.1355.2366.3548.1824.5616l-1.0557,4.0309c-.1262.4818.4049.8677.8242.5988l3.5074-2.2497c.0811-.052.1738-.0729.2662-.078V.6548Z" style="fill:#ffedd6;"></path>
						</symbol>
						<symbol id="star">
							<path d="M6.9604.9533c.1811-.464.8376-.464,1.0187,0l1.5153,3.8817c.0777.1991.2643.3347.4776.347l4.1599.2415c.4972.0289.7001.6533.3148.9689l-3.2234,2.6405c-.1654.1355-.2366.3548-.1825.5616l1.0558,4.0309c.1262.4818-.405.8677-.8242.5988l-3.5074-2.2497c-.1799-.1154-.4105-.1154-.5904,0l-3.5074,2.2497c-.4192.2689-.9504-.117-.8242-.5988l1.0558-4.0309c.0542-.2068-.0171-.4261-.1825-.5616L.4928,6.3925c-.3853-.3156-.1824-.94.3148-.9689l4.1599-.2415c.2134-.0124.4-.1479.4777-.347l1.5152-3.8817Z" style="fill: #ffedd7;"></path>
						</symbol>
					</svg>
					<div id="testimonies-table-header" class="sub2">
						<div id="testimonies-table-header-title">Rating &amp; Reviews</div>
						<div id="testimonies-table-header-center">
							<div id="testimonies-table-header-reviews">Custom reviews [ 364 ]</div>
							<div class="testimonies-table-rating">
								<svg width="96" height="15"><use href="#star"></use><use href="#star" x="19"></use><use href="#star" x="38"></use><use href="#star" x="57"></use><use href="#star" x="76"></use></svg>
								<div class="testimonies-table-rating-text">[ 4.9/5 ]</div>
							</div>
						</div>
						<div id="testimonies-table-header-right">ORYZO in use</div>
					</div>
					<div class="o-dashline" style="opacity: 0.665849;"></div>
					<div id="testimonies-table-list">
						<?php foreach ( $settings['reviews'] as $review ) : ?>
						<div class="testimonies-table-item" style="opacity: 1;">
							<div class="testimonies-table-item-content">
								<div class="testimonies-table-rating" style="opacity: 0.2;">
									<svg width="96" height="15">
										<use href="#star"></use>
										<use href="#star" x="19"></use>
										<use href="#star" x="38"></use>
										<use href="#star" x="57"></use>
										<use href="#<?php echo esc_attr($review['star_type']); ?>" x="76"></use>
									</svg>
									<div class="testimonies-table-rating-text sub2">[ <?php echo esc_html($review['rating']); ?> ]</div>
								</div>
								<div class="testimonies-table-item-content-title quote"><?php echo esc_html($review['quote']); ?></div>
								<div class="testimonies-table-item-content-author sub2">
									<div class="testimonies-table-item-content-author-name" style="opacity: 0.2;"><?php echo esc_html($review['author_name']); ?></div>
									<div class="testimonies-table-item-content-author-desc" style="opacity: 0.2;"><?php echo esc_html($review['author_desc']); ?></div>
								</div>
							</div>
							<div class="testimonies-table-item-image-wrapper" style="opacity: 0.2; transform: scale(0.8);">
								<picture>
									<source media="(min-width:768px)" srcset="<?php echo esc_url($review['img_desktop']); ?>" width="640" height="480">
									<img src="<?php echo esc_url($review['img_mobile']); ?>" width="64" height="64" loading="eager" decoding="async">
								</picture>
							</div>
						</div>
						<div class="o-dashline" style="opacity: 0.2;"></div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
