<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_Skill_Stacks_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_skill_stacks'; }
	public function get_title() { return esc_html__( '5-skill-stacks', 'test-theme' ); }
	public function get_icon() { return 'eicon-gallery-grid'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );
		$this->add_control( 'stacks', [
			'label' => 'Stacks',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				[ 'name' => 'title', 'label' => 'Title', 'type' => 'text' ],
				[ 'name' => 'desc', 'label' => 'Description', 'type' => 'text' ],
				[ 'name' => 'cmd', 'label' => 'Command', 'type' => 'text' ],
				[ 'name' => 'url', 'label' => 'URL', 'type' => 'url' ],
				[ 'name' => 'color', 'label' => 'Color (CSS Var)', 'type' => 'text', 'default' => 'var(--primary)' ],
				[ 'name' => 'icon_svg', 'label' => 'Icon SVG', 'type' => 'code', 'language' => 'html' ],
			],
			'default' => [
				[
					'title' => 'Full-Stack Starter',
					'desc' => 'Everything you need to ship quality code from day one',
					'cmd' => 'npx @skills-hub-ai/cli install code-review unit-test security-review deploy preflight',
					'url' => ['url' => '/browse'],
					'color' => 'var(--primary)',
					'icon_svg' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path></svg>',
				],
			],
			'title_field' => '{{{ title }}}',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="py-12">
			<h2 class="mb-2 text-2xl font-bold tracking-tight sm:text-3xl lg:text-4xl" style="font-family:var(--font-display)">Skill Stacks</h2>
			<p class="mb-8 text-[var(--muted)]">Curated bundles for common workflows. Install an entire stack with one command.</p>
			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
				<?php foreach ( $settings['stacks'] as $stack ) : ?>
					<a class="card-engaging group flex flex-col rounded-xl border border-[var(--card-border)] bg-[var(--card)] p-6" style="--_card-tint:<?php echo esc_attr($stack['color']); ?>" href="<?php echo esc_url($stack['url']['url']); ?>">
						<div class="mb-4 flex items-start gap-3">
							<div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl transition-transform group-hover:scale-110" style="background-color:color-mix(in oklch, <?php echo esc_attr($stack['color']); ?> 15%, var(--card));border:1px solid color-mix(in oklch, <?php echo esc_attr($stack['color']); ?> 15%, transparent)">
								<div style="color:<?php echo esc_attr($stack['color']); ?>"><?php echo $stack['icon_svg']; ?></div>
							</div>
							<div class="min-w-0">
								<h3 class="font-semibold leading-tight"><?php echo esc_html($stack['title']); ?></h3>
								<p class="mt-1 text-sm text-[var(--muted)]"><?php echo esc_html($stack['desc']); ?></p>
							</div>
						</div>
						<div class="mt-auto">
							<div class="flex items-center gap-1 overflow-x-auto rounded-lg bg-[var(--background)] px-3 py-2 font-mono text-xs text-[var(--muted)]">
								<span class="mr-1 shrink-0 text-[var(--success)]">$</span>
								<span class="whitespace-nowrap"><?php echo esc_html($stack['cmd']); ?></span>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
