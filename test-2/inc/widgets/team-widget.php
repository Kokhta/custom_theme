<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test2_Team_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'test2_team';
	}

	public function get_title() {
		return esc_html__( '5-Team', 'test2' );
	}

	public function get_icon() {
		return 'eicon-person';
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
				'default' => '//03',
			]
		);

		$this->add_control(
			'section_name',
			[
				'label' => esc_html__( 'Section Name', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Team',
			]
		);

		$this->add_control(
			'title_html',
			[
				'label' => esc_html__( 'Title HTML', 'test2' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p aria-label="Experience"><div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: start;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.08s;">E</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.12s;">x</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.16s;">p</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.04s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.2s;">r</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.32s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.36s;">e</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.28s;">n</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.24s;">c</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0s;">e</div></div></p><p aria-label="you can build on"><div class="anim-line" aria-hidden="true" style="position: relative; display: block; text-align: start;"><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.18s;">y</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.14s;">o</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.22s;">u</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.1s;">c</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.38s;">a</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.3s;">n</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.26s;">b</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.34s;">u</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.54s;">i</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.58s;">l</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.46s;">d</div> <div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.5s;">o</div><div class="anim-fade" aria-hidden="true" style="position: relative; display: inline-block; transition-delay: 0.42s;">n</div></div></p>',
			]
		);

		$this->add_control(
			'copy_html',
			[
				'label' => esc_html__( 'Copy HTML', 'test2' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p aria-label="No career investors. No tourists. We\'ve been the founder who couldn\'t sleep. The investor who got it wrong and came back smarter. The operator who scaled through chaos. Every person on this team carries real reps across VC, Blockchain, Web3, Investment Banking, Tech and Enterprise."><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.1s;">No career investors. No tourists. We\'ve been </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.2s;">the founder who couldn\'t sleep. The investor </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.3s;">who got it wrong and came back smarter. </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.4s;">The operator who scaled through chaos. </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.5s;">Every person on this team carries real reps </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.6s;">across VC, Blockchain, Web3, Investment </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.7s;">Banking, Tech and Enterprise.</div></p><p aria-label="50+ years of combined experience that only comes one way. The hard way. This team wasn\'t assembled. It was forged."><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.8s;">50+ years of combined experience that only </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 0.9s;">comes one way. The hard way. This team </div><div class="anim-fade" aria-hidden="true" style="position: relative; display: block; text-align: center; transition-delay: 1s;">wasn\'t assembled. It was forged.</div></p>',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name',
			[
				'label' => esc_html__( 'Name', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Dara Campbell',
			]
		);

		$repeater->add_control(
			'position',
			[
				'label' => esc_html__( 'Position', 'test2' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Managing Partner',
			]
		);

		$this->add_control(
			'team_members',
			[
				'label' => esc_html__( 'Team Members', 'test2' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'name' => 'Dara Campbell', 'position' => 'Managing Partner' ],
					[ 'name' => 'Will Patterson', 'position' => 'Head of Venture' ],
					[ 'name' => 'Arjun Chirumamilla', 'position' => 'Senior Associate' ],
					[ 'name' => 'Jeff Sun', 'position' => 'Venture Capital Analyst' ],
					[ 'name' => 'Tracie Hutchins', 'position' => 'Executive Operations Manager' ],
					[ 'name' => 'Stefan Deiss', 'position' => 'Co-Founder' ],
					[ 'name' => 'Kamal Youssefi', 'position' => 'Co-Founder & Executive Chairman' ],
				],
				'title_field' => '{{{ name }}}',
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
		<div class="home-team grid fixed-section" style="opacity: 0; visibility: hidden;">
			<div class="home-team__wrapper">
				<h2 class="portable-text text-splitter--splitted text-splitter home-team__title h1">
					<?php echo $settings['title_html']; ?>
				</h2>
				<div class="home-team__copy-wrapper">
					<div class="home-team__copy body-copy">
						<div class="portable-text text-splitter--splitted text-splitter">
							<?php echo $settings['copy_html']; ?>
						</div>
					</div>
					<div class="home-team__copy-cta">
						<button class="btn ff-detail ttu">
							<span class="btn__wrapper oh"><span class="btn__label btn__label--base"><?php echo esc_html($settings['back_btn_label']); ?></span></span>
							<svg class="btn__svg" fill="none" aria-hidden="true"><rect x="0.5" y="0.5" height="31" rx="5" ry="5" stroke="url(#btnBorderGrad)" width="174" style="stroke-dashoffset: 0px; stroke-dasharray: 180.972px, 4px, 196.709px, 4px;"></rect></svg>
						</button>
					</div>
				</div>
			</div>
			<div class="home-team__inner">
				<nav class="nav-prev-next--vertical nav-prev-next">
					<button aria-label="Show previous team member" class="nav-prev-next__btn nav-prev-next__btn--prev"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 12" aria-hidden="true" class="nav-prev-next__btn-arrow nav-prev-next__btn-arrow--base"><path d="M0 7.978 4 12v-1.978L0 6zm0-3.956L4 0v1.978L0 6z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 12" aria-hidden="true" class="nav-prev-next__btn-arrow nav-prev-next__btn-arrow--hover"><path d="M0 7.978 4 12v-1.978L0 6zm0-3.956L4 0v1.978L0 6z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 31 33" aria-hidden="true" class="nav-prev-next__svg-border"><path d="M30.5 32.5h-25a5 5 0 0 1-5-5v-22a5 5 0 0 1 5-5h25"></path></svg></button>
					<button aria-label="Show next team member" class="nav-prev-next__btn nav-prev-next__btn--next"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 12" aria-hidden="true" class="nav-prev-next__btn-arrow nav-prev-next__btn-arrow--base"><path d="M0 7.978 4 12v-1.978L0 6zm0-3.956L4 0v1.978L0 6z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 12" aria-hidden="true" class="nav-prev-next__btn-arrow nav-prev-next__btn-arrow--hover"><path d="M0 7.978 4 12v-1.978L0 6zm0-3.956L4 0v1.978L0 6z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 31 33" aria-hidden="true" class="nav-prev-next__svg-border"><path d="M0 32.5h25a5 5 0 0 0 5-5v-22a5 5 0 0 0-5-5H0"></path></svg></button>
				</nav>
				<div class="home-team__members">
					<?php foreach ( $settings['team_members'] as $index => $member ) : ?>
					<div class="home-team-member">
						<p class="h2">
							<span class="text-splitter--splitted text-splitter" aria-label="<?php echo esc_attr($member['name']); ?>">
								<?php
								$chars = preg_split('//u', $member['name'], -1, PREG_SPLIT_NO_EMPTY);
								foreach($chars as $char) {
									echo '<span class="home-team-member__char" aria-hidden="true">'.esc_html($char).'</span>';
								}
								?>
							</span>
						</p>
						<p class="home-team-member__position btn-label ttu">
							<span class="text-splitter--splitted text-splitter" aria-label="<?php echo esc_attr($member['position']); ?>">
								<?php
								$chars = preg_split('//u', $member['position'], -1, PREG_SPLIT_NO_EMPTY);
								foreach($chars as $char) {
									echo '<span class="home-team-member__char" aria-hidden="true">'.esc_html($char).'</span>';
								}
								?>
							</span>
						</p>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="home-team__cta">
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
