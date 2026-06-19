<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_2_hero extends \Elementor\Widget_Base {

	public function get_name() {
		return '2-hero';
	}

	public function get_title() {
		return esc_html__( '2-hero', 'custom-hello-333' );
	}

	public function get_icon() {
		return 'eicon-info-box';
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
			'tagline',
			[
				'label' => esc_html__( 'Tagline', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Made for mugs. Built for tables.',
			]
		);

		$this->add_control(
			'copy',
			[
				'label' => esc_html__( 'Copy', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Designed to lift, insulate, and grip in all the right ways. Oryzo makes the simplest moment feel considered.',
			]
		);

		$this->add_control(
			'card_header',
			[
				'label' => esc_html__( 'Card Header', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Designed by Lusion, the award-winning design studio.',
			]
		);

		$this->add_control(
			'card_desc',
			[
				'label' => esc_html__( 'Card Description', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => "The world's most unnecessarily sophisticated cork coaster.",
			]
		);

		$this->add_control(
			'video_thumb',
			[
				'label' => esc_html__( 'Video Thumbnail URL', 'custom-hello-333' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '/images/video_thumb.webp',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="hero" class="section" style="visibility: visible; --active-ratio: 1;">
			<div class="section__inner o-container">
				<div id="hero-top" class="sub1">
					<div id="hero-top-tagline" aria-label="<?php echo esc_attr($settings['tagline']); ?>">
						<?php
						$tagline_words = explode(' ', $settings['tagline']);
						foreach ($tagline_words as $word) {
							echo '<div aria-hidden="true" style="position: relative; display: inline-block; overflow: clip;"><div aria-hidden="true" style="position: relative; display: inline-block; transform: translate3d(0px, 0em, 0px); opacity: 1;">' . esc_html($word) . '</div></div> ';
						}
						?>
					</div>
					<div id="hero-logo-ref"></div>
				</div>
				<div id="hero-copy" class="body1" aria-label="<?php echo esc_attr($settings['copy']); ?>">
					<div aria-hidden="true" style="position: relative; display: block; text-align: start; transform: translate3d(0em, 0px, 0px);">
						<?php
						$copy_chars = mb_str_split($settings['copy']);
						foreach ($copy_chars as $char) {
							if ($char === ' ') {
								echo ' ';
							} else {
								echo '<div aria-hidden="true" style="position: relative; display: inline-block; opacity: 1; filter: blur(0em); transform: translate3d(0em, 0px, 0px);">' . esc_html($char) . '</div>';
							}
						}
						?>
					</div>
				</div>
				<div id="hero-card">
					<div id="hero-card-inner">
						<h4 id="hero-card-header" aria-label="<?php echo esc_attr($settings['card_header']); ?>">
							<?php
							// We could split by lines if we want to be exact, but simple echo for now to keep structure
							echo esc_html($settings['card_header']);
							?>
						</h4>
						<div class="o-dashline desktop-only" style="transform: translate3d(0px, 0px, 0px); width: 100%;"></div>
						<div id="hero-card-desc" class="body2" aria-label="<?php echo esc_attr($settings['card_desc']); ?>">
							<span><?php echo esc_html($settings['card_desc']); ?></span>
						</div>
					</div>
				</div>
				<div id="hero-video-wrapper" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
					<span class="hero-video__glow"></span>
					<span class="hero-video__border"></span>
					<div id="hero-video-thumbnail-wrapper">
						<img id="hero-video-thumbnail" width="320" height="180" src="<?php echo esc_url($settings['video_thumb']); ?>" fetchpriority="high" alt="Video thumbnail">
					</div>
					<div id="hero-video-play">PLAY</div>
				</div>
			</div>
		</div>
		<?php
	}
}
