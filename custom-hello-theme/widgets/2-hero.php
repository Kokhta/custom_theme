<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_2 extends \Elementor\Widget_Base {

	public function get_name() { return '2-hero'; }
	public function get_title() { return esc_html__( '2. Hero', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-image-hotspot'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
		$this->add_control( 'tagline', [ 'label' => esc_html__( 'Tagline', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Made for mugs. Built for tables.' ] );
		$this->add_control( 'copy', [ 'label' => esc_html__( 'Copy', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Designed to lift, insulate, and grip in all the right ways. Oryzo makes the simplest moment feel considered.' ] );
		$this->add_control( 'card_header', [ 'label' => esc_html__( 'Card Header', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Designed by Lusion, the award-winning design studio.' ] );
		$this->add_control( 'card_desc', [ 'label' => esc_html__( 'Card Description', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => "The world's most unnecessarily sophisticated cork coaster." ] );
		$this->add_control( 'thumbnail', [ 'label' => esc_html__( 'Video Thumbnail', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => [ 'url' => '/images/video_thumb.webp' ] ] );
		$this->add_control( 'play_text', [ 'label' => esc_html__( 'Play Button Text', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'PLAY' ] );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="hero" class="section" style="visibility: visible; --active-ratio: 1;">
			<div class="section__inner o-container">
				<div id="hero-top" class="sub1">
					<div id="hero-top-tagline" aria-label="<?php echo esc_attr( $settings['tagline'] ); ?>">
						<?php
						$words = explode(' ', $settings['tagline']);
						foreach($words as $word) {
							echo '<div aria-hidden="true" style="position: relative; display: inline-block; overflow: clip;"><div aria-hidden="true" style="position: relative; display: inline-block; transform: translate3d(0px, 0em, 0px); opacity: 1;">' . esc_html($word) . '</div></div> ';
						}
						?>
					</div>
					<div id="hero-logo-ref"></div>
				</div>
				<div id="hero-copy" class="body1" aria-label="<?php echo esc_attr( $settings['copy'] ); ?>">
					<?php
					$lines = explode('.', $settings['copy']);
					foreach($lines as $line) {
						if(empty(trim($line))) continue;
						$l = trim($line) . '.';
						echo '<div aria-hidden="true" style="position: relative; display: block; text-align: start; transform: translate3d(0em, 0px, 0px);">';
						$chars = str_split($l);
						foreach($chars as $char) {
							echo '<div aria-hidden="true" style="position: relative; display: inline-block; opacity: 1; filter: blur(0em); transform: translate3d(0em, 0px, 0px);">' . ($char === ' ' ? '&nbsp;' : esc_html($char)) . '</div>';
						}
						echo '</div>';
					}
					?>
				</div>
				<div id="hero-card">
					<div id="hero-card-inner">
						<h4 id="hero-card-header" aria-label="<?php echo esc_attr( $settings['card_header'] ); ?>">
							<?php
							$parts = explode(',', $settings['card_header']);
							foreach($parts as $part) {
								echo '<div aria-hidden="true" style="position: relative; display: block; text-align: start; overflow: clip; transform: translate3d(0em, 0px, 0px); opacity: 1;"><div aria-hidden="true" style="position: relative; display: block; text-align: start; transform: translate3d(0px, 0em, 0px);">' . esc_html(trim($part)) . '</div></div>';
							}
							?>
						</h4>
						<div class="o-dashline desktop-only" style="transform: translate3d(0px, 0px, 0px); width: 100%;"></div>
						<div id="hero-card-desc" class="body2" aria-label="<?php echo esc_attr( $settings['card_desc'] ); ?>">
							<div aria-hidden="true" style="position: relative; display: block; text-align: right; overflow: clip; transform: translate3d(0em, 0px, 0px); opacity: 1;"><div aria-hidden="true" style="position: relative; display: block; text-align: right; transform: translate3d(0px, 0em, 0px);"><span><?php echo esc_html($settings['card_desc']); ?></span></div></div>
						</div>
					</div>
				</div>
				<div id="hero-video-wrapper" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
					<span class="hero-video__glow"></span>
					<span class="hero-video__border"></span>
					<div id="hero-video-thumbnail-wrapper">
						<img id="hero-video-thumbnail" width="320" height="180" src="<?php echo esc_url( $settings['thumbnail']['url'] ); ?>" fetchpriority="high" alt="Video thumbnail">
					</div>
					<div id="hero-video-play"><?php echo esc_html($settings['play_text']); ?></div>
				</div>
			</div>
		</div>
		<?php
	}
}
