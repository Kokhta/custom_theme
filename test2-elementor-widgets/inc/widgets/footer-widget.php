<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test2_Footer_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'test2_footer';
	}

	public function get_title() {
		return esc_html__( '6-Footer', 'test2' );
	}

	public function get_icon() {
		return 'eicon-footer';
	}

	public function get_categories() {
		return [ 'test2-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'test2' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_aria_label',
			[
				'label' => esc_html__( 'Title ARIA Label', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'We prioritize warm introductionsand ecosystem referrals',
			]
		);

		$this->add_control(
			'title_html',
			[
				'label' => esc_html__( 'Title HTML', 'test2' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: center;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.04s;">W</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0s;">e</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.08s;">p</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.12s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.2s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.24s;">o</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.16s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.28s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.36s;">t</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.32s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.44s;">z</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.4s;">e</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.48s;">w</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.56s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.52s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.6s;">m</div> </div><div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: center;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.38s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.18s;">n</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.46s;">t</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.5s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.3s;">o</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.54s;">d</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.58s;">u</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.42s;">c</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.34s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.14s;">o</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.26s;">n</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.1s;">s</div></div><div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: center;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.2s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.28s;">n</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.24s;">d</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.32s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.44s;">c</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.36s;">o</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.4s;">s</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.48s;">y</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.64s;">s</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.52s;">t</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.56s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.6s;">m</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.8s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.68s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.72s;">f</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.76s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.88s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.84s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.92s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.96s;">l</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 1s;">s</div></div>',
			]
		);

		$this->add_control(
			'copyright',
			[
				'label' => esc_html__( 'Copyright', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '© Hashgraph Ventures 2026',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'label', [ 'label' => 'Label', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'url', [ 'label' => 'URL', 'type' => \Elementor\Controls_Manager::URL ] );

		$this->add_control(
			'social_links',
			[
				'label' => esc_html__( 'Social Links', 'test2' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'label' => 'Email', 'url' => [ 'url' => 'mailto:info@hashgraphvc.com' ] ],
					[ 'label' => 'X (Twitter)', 'url' => [ 'url' => 'https://x.com/HashgraphVC' ] ],
					[ 'label' => 'LinkedIn', 'url' => [ 'url' => 'https://www.linkedin.com/company/hashgraph-ventures/' ] ],
				],
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		test2_mark_widget_used();
		$settings = $this->get_settings_for_display();
		?>
		<footer class="is-visible footer--full-height footer" style="opacity: 0; visibility: hidden;">
			<h3 class="portable-text text-splitter--splitted text-splitter footer__title h2">
				<p aria-label="<?php echo esc_attr($settings['title_aria_label']); ?>">
					<?php echo $settings['title_html']; ?>
				</p>
			</h3>
			<div class="grid btn-label ttu">
				<div class="footer__copyrights"><?php echo esc_html($settings['copyright']); ?></div>
				<ul class="footer__list footer__list--socials">
					<?php foreach($settings['social_links'] as $link): ?>
						<li><a href="<?php echo esc_url($link['url']['url']); ?>" rel="noopener noreferrer" class="link"><?php echo esc_html($link['label']); ?></a></li>
					<?php endforeach; ?>
				</ul>
				<div class="footer__credits">
					<ul class="footer__list footer__list--legals">
						<li><a href="/privacy-policy" class="link">Privacy Policy</a></li>
						<li><a href="https://rbxgc.co/" rel="noopener noreferrer" target="_blank" class="link">Made by rbxgc</a></li>
					</ul>
				</div>
			</div>
		</footer>
		<?php
	}
}
