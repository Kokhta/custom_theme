<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_9 extends \Elementor\Widget_Base {

	public function get_name() { return '9-testimonies'; }
	public function get_title() { return esc_html__( '9. Testimonies', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-testimonial'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
		$this->add_control( 'title', [ 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'People all around the world love Oryzo' ] );
		$this->add_control( 'desc', [ 'label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Do not take our word for it, see what people say after living with Oryzo.' ] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'quote', [ 'label' => 'Quote', 'type' => \Elementor\Controls_Manager::TEXTAREA ] );
		$repeater->add_control( 'author', [ 'label' => 'Author', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'author_desc', [ 'label' => 'Author Desc', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'image', [ 'label' => 'Image', 'type' => \Elementor\Controls_Manager::MEDIA ] );
		$repeater->add_control( 'rating', [ 'label' => 'Rating (0-5)', 'type' => \Elementor\Controls_Manager::NUMBER, 'min' => 0, 'max' => 5, 'step' => 0.5, 'default' => 5 ] );

		$this->add_control( 'reviews', [ 'label' => esc_html__( 'Reviews', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[ 'quote' => "This is the best coaster that I've ever used. I can't go to the space without it", 'author' => 'Edan K.', 'author_desc' => 'NASA astronaut wannabe', 'rating' => 5 ],
			[ 'quote' => "My coaster? If you want it, I'll let you have it. Look for it!", 'author' => 'Gol D. Roger', 'author_desc' => 'Old-school Pirate', 'rating' => 4.5 ],
		] ] );

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
					<div id="testimonies-table-header" class="sub2">
						<div id="testimonies-table-header-title">Rating &amp; Reviews</div>
						<div id="testimonies-table-header-center">
							<div id="testimonies-table-header-reviews">Custom reviews [ <?php echo count($settings['reviews']); ?> ]</div>
						</div>
					</div>
					<div class="o-dashline"></div>
					<div id="testimonies-table-list">
						<?php foreach($settings['reviews'] as $review): ?>
						<div class="testimonies-table-item">
							<div class="testimonies-table-item-content">
								<div class="testimonies-table-rating" style="opacity: 0.2;">
									<div class="testimonies-table-rating-text sub2">[ <?php echo esc_html($review['rating']); ?>/5 ]</div>
								</div>
								<div class="testimonies-table-item-content-title quote">"<?php echo esc_html($review['quote']); ?>"</div>
								<div class="testimonies-table-item-content-author sub2">
									<div class="testimonies-table-item-content-author-name"><?php echo esc_html($review['author']); ?></div>
									<div class="testimonies-table-item-content-author-desc"><?php echo esc_html($review['author_desc']); ?></div>
								</div>
							</div>
							<div class="testimonies-table-item-image-wrapper"><img src="<?php echo esc_url($review['image']['url']); ?>"></div>
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
