<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test2_Investors_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'test2_investors';
	}

	public function get_title() {
		return esc_html__( '4-Investors', 'test2' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'general' ];
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
			'section_id',
			[
				'label' => esc_html__( 'Section ID', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '//02',
			]
		);

		$this->add_control(
			'section_name',
			[
				'label' => esc_html__( 'Section Name', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Investors',
			]
		);

		$this->add_control(
			'title_html',
			[
				'label' => esc_html__( 'Title HTML', 'test2' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p aria-label="Early access"><div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: start;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.2s;">E</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.04s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.08s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.16s;">l</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.12s;">y</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.24s;">c</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.28s;">c</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.4s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.36s;">s</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.32s;">s</div></div></p><p aria-label="permanent"><div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: start;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.1s;">p</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.22s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.14s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.18s;">m</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.3s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.26s;">n</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.34s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.38s;">n</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.42s;">t</div></div></p><p aria-label="advantage"><div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: start;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.32s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.2s;">d</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.28s;">v</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.36s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.44s;">n</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.4s;">t</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.48s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.52s;">g</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.24s;">e</div></div></p>',
			]
		);

		$this->add_control(
			'copy_aria_label',
			[
				'label' => esc_html__( 'Copy ARIA Label', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Hashgraph Ventures sits at the apex of a deliberate trifecta, bringing together the Hashgraph Group as the tech arm, the Hashgraph Association for enterprise integration and community, and Ventures as fast-moving capital. For select investors, this means one thing: your investment doesn’t rely on a fund alone. It’s backed by a proven adoption machine with sovereign partnerships, global tech teams, and enterprise-grade distribution. Infrastructure first. Returns follow.',
			]
		);

		$this->add_control(
			'copy_html',
			[
				'label' => esc_html__( 'Copy HTML', 'test2' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.1s;">Hashgraph Ventures sits at the apex of a </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.2s;">deliberate trifecta, bringing together the </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.3s;">Hashgraph Group as the tech arm, the </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.4s;">Hashgraph Association for enterprise </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.5s;">integration and community, and Ventures as </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.6s;">fast-moving capital. For select investors, this </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.7s;">means one thing: your investment doesn’t </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.8s;">rely on a fund alone. It’s backed by a proven </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.9s;">adoption machine with sovereign </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 1s;">partnerships, global tech teams, and </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 1.1s;">enterprise-grade distribution. Infrastructure </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 1.2s;">first. Returns follow.</div>',
			]
		);

		$this->add_control(
			'explore_btn_label',
			[
				'label' => esc_html__( 'Explore Portfolio Label', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Explore our portfolio',
			]
		);

		$this->add_control(
			'explore_btn_url',
			[
				'label' => esc_html__( 'Explore Portfolio URL', 'test2' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [ 'url' => '/companies/debyt' ],
			]
		);

		$this->add_control(
			'back_btn_label',
			[
				'label' => esc_html__( 'Back Button Label', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Back to homepage',
			]
		);

		$this->add_control(
			'read_more_label',
			[
				'label' => esc_html__( 'Read More Label', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Read more',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="home-portfolio grid fixed-section" style="opacity: 0; visibility: hidden;">
			<h2 class="portable-text text-splitter--splitted text-splitter home-portfolio__title h1">
				<?php echo $settings['title_html']; ?>
			</h2>
			<div class="home-portfolio__copy-wrapper">
				<p class="home-portfolio__copy body-copy">
					<span class="text-splitter--splitted text-splitter" aria-label="<?php echo esc_attr($settings['copy_aria_label']); ?>">
						<?php echo $settings['copy_html']; ?>
					</span>
				</p>
				<div class="home-portfolio__cta anim-fade" style="transition-delay: 1.2s;">
					<a href="<?php echo esc_url($settings['explore_btn_url']['url']); ?>" class="btn ff-detail ttu">
						<span class="btn__wrapper oh"><span class="btn__label btn__label--base"><?php echo esc_html($settings['explore_btn_label']); ?></span></span>
						<svg class="btn__svg" fill="none" aria-hidden="true"><rect x="0.5" y="0.5" height="31" rx="5" ry="5" stroke="url(#btnBorderGrad)" width="174" style="stroke-dashoffset: 0px; stroke-dasharray: 180.972px, 4px, 196.709px, 4px;"></rect></svg>
						<span class="btn__shimmer"><span class="btn__shimmer-inner"></span></span>
					</a>
				</div>
				<div class="home-portfolio__copy-cta">
					<button class="btn ff-detail ttu">
						<span class="btn__wrapper oh"><span class="btn__label btn__label--base"><?php echo esc_html($settings['back_btn_label']); ?></span></span>
						<svg class="btn__svg" fill="none" aria-hidden="true"><rect x="0.5" y="0.5" height="31" rx="5" ry="5" stroke="url(#btnBorderGrad)" width="174" style="stroke-dashoffset: 0px; stroke-dasharray: 180.972px, 4px, 196.709px, 4px;"></rect></svg>
					</button>
				</div>
			</div>
			<div class="home-portfolio__mobile-cta">
				<button class="btn--small btn ff-detail ttu">
					<span class="btn__wrapper oh"><span class="btn__label btn__label--base"><?php echo esc_html($settings['read_more_label']); ?></span></span>
					<svg class="btn__svg" fill="none" aria-hidden="true"><rect x="0.5" y="0.5" height="31" rx="5" ry="5" stroke="url(#btnBorderGrad)" width="105.51666259765625" style="stroke-dashoffset: 0px; stroke-dasharray: 112.197px, 4px, 128.225px, 4px;"></rect></svg>
				</button>
			</div>
			<div class="section-title btn-label ttu"><span class="section-title__id"><?php echo esc_html($settings['section_id']); ?></span> <?php echo esc_html($settings['section_name']); ?></div>
		</div>
		<?php
	}
}
