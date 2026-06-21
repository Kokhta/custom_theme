<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_For_Everyone_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_for_everyone'; }
	public function get_title() { return esc_html__( '6-for-everyone', 'test-theme' ); }
	public function get_icon() { return 'eicon-person'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );
		$this->add_control( 'roles', [
			'label' => 'Roles',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				[ 'name' => 'title', 'label' => 'Title', 'type' => 'text' ],
				[ 'name' => 'desc', 'label' => 'Description', 'type' => 'text' ],
				[ 'name' => 'items', 'label' => 'Skills List (/command | Description)', 'type' => 'textarea' ],
				[ 'name' => 'btn_text', 'label' => 'Button Text', 'type' => 'text' ],
				[ 'name' => 'btn_url', 'label' => 'Button URL', 'type' => 'url' ],
				[ 'name' => 'icon_svg', 'label' => 'Icon SVG', 'type' => 'code', 'language' => 'html' ],
			],
			'default' => [
				[
					'title' => 'Engineers',
					'desc' => 'Master Claude Code and build custom workflows',
					'items' => "/getting-started | Auto-detects your stack, recommends skills\n/claude-code-101 | Interactive 6-lesson tutorial\n/workflow-builder | Compose skills into pipelines\n/skill-writer | Build and publish your own",
					'btn_text' => 'Start learning',
					'btn_url' => [ 'url' => '/docs/getting-started' ],
					'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"></path></svg>',
				],
				[
					'title' => 'Founders & Builders',
					'desc' => 'Build working apps from plain English descriptions',
					'items' => "/app-builder | Describe it, we build it, zero code\n/automation-builder | Automate repetitive tasks\n/content-creator | Blog, social, email, landing pages",
					'btn_text' => 'Browse build skills',
					'btn_url' => [ 'url' => '/browse?category=build' ],
					'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"></path></svg>',
				],
				[
					'title' => 'Marketers & Creators',
					'desc' => 'Generate content, analyze data, run campaigns',
					'items' => "/content-creator | SEO blog posts, threads, email sequences\n/data-analyst | CSV to charts and insights, no SQL\n/prompt-engineering | Get better results from AI",
					'btn_text' => 'Browse marketing skills',
					'btn_url' => [ 'url' => '/browse?category=marketing' ],
					'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path></svg>',
				],
				[
					'title' => 'Team Leads',
					'desc' => 'Train your team, run workshops, track progress',
					'items' => "/workshop-generator | Complete workshop in one command\n/course-builder | Self-paced courses with assessments\n/daily-standup | Cross-repo morning briefing",
					'btn_text' => 'Train your team',
					'btn_url' => [ 'url' => '/browse?q=workshop' ],
					'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path></svg>',
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
			<div class="mb-8">
				<h2 class="mb-2 text-2xl font-bold tracking-tight sm:text-3xl lg:text-4xl" style="font-family:var(--font-display)">Skills for every role</h2>
				<p class="max-w-2xl text-[var(--muted)]">Most skills require no coding. Whether you are an engineer, founder, marketer, or team lead, there are skills that fit your workflow.</p>
			</div>
			<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
				<?php foreach ( $settings['roles'] as $role ) : ?>
					<div class="card-engaging flex flex-col rounded-xl border border-[var(--card-border)] bg-[var(--card)] p-6">
						<div class="mb-4 flex items-center gap-3">
							<div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[color-mix(in_oklch,var(--primary)_10%,var(--card))]">
								<?php echo $role['icon_svg']; ?>
							</div>
							<div>
								<h3 class="font-semibold"><?php echo esc_html($role['title']); ?></h3>
								<p class="text-sm text-[var(--muted)]"><?php echo esc_html($role['desc']); ?></p>
							</div>
						</div>
						<ul class="mb-5 flex-1 space-y-2">
							<?php
							$lines = explode("\n", $role['items']);
							foreach($lines as $line) {
								$parts = explode('|', $line);
								if(count($parts) >= 2) {
									echo '<li class="flex gap-2 text-sm"><code class="flex-shrink-0 font-mono text-xs text-[var(--primary)]">'.trim($parts[0]).'</code><span class="text-[var(--muted)]">'.trim($parts[1]).'</span></li>';
								}
							}
							?>
						</ul>
						<a class="mt-auto inline-flex min-h-[48px] items-center justify-center rounded-lg border border-[var(--primary)] px-4 py-2 text-sm font-medium text-[var(--primary)]" href="<?php echo esc_url($role['btn_url']['url']); ?>"><?php echo esc_html($role['btn_text']); ?></a>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
