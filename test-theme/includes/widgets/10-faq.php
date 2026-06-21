<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_FAQ_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_faq'; }
	public function get_title() { return esc_html__( '10-faq', 'test-theme' ); }
	public function get_icon() { return 'eicon-help-o'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );
		$this->add_control( 'faqs', [
			'label' => 'FAQs',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				[ 'name' => 'q', 'label' => 'Question', 'type' => 'text' ],
				[ 'name' => 'a', 'label' => 'Answer', 'type' => 'textarea' ],
			],
			'default' => [
				[ 'q' => 'What is a skill on Skills Hub?', 'a' => 'A skill is an AI specialist already trained on one job — code review, marketing brief, legal abstract, clinical summary, security audit. Instead of re-explaining the process every session, install the specialist once and your AI tool remembers it forever. Skills work across Claude Code, Cursor, Windsurf, GitHub Copilot, and any MCP-compatible tool.' ],
				[ 'q' => 'How do I install a skill?', 'a' => "One command: 'npx @skills-hub-ai/cli install <skill-name>'. The CLI detects your AI tool, installs the skill in the right place, and it's ready immediately. No config files, no restarts. You can also browse and install from the web at skills-hub.ai/browse." ],
				[ 'q' => 'Which AI tools are supported?', 'a' => 'All of them. Claude Code, Cursor, Windsurf, GitHub Copilot, Cline, Codex CLI, Gemini CLI, and any MCP-compatible tool. Skills use the open Agent Skills standard (SKILL.md), adopted by 26+ platforms. Install once, use everywhere.' ],
				[ 'q' => 'Where do the skills come from?', 'a' => 'From the companies that build the tools you use. We sync skills directly from Anthropic, Microsoft, Google, Cloudflare, Vercel, Supabase, Sentry, Expo, Hugging Face, and 10+ other companies, plus community-published skills from developers like you. Every external skill links back to its official GitHub repo.' ],
				[ 'q' => 'How do I publish my own skill?', 'a' => "Create a SKILL.md file with a name, description, and instructions. Run 'skills-hub publish' or upload at skills-hub.ai/publish. Your skill gets AI-powered quality scoring, semantic versioning, security review, and a creator analytics dashboard showing installs, ratings, and referrer data. The whole process takes about 30 seconds." ],
				[ 'q' => 'What are combo skills?', 'a' => 'Combos chain multiple skills into automated pipelines. A single combo can run code review, then test generation, then security audit, then PR creation, in sequence or in parallel. Pair them with /loop for real-time checks while you code, or schedule them with Claude\'s scheduled tasks to run a nightly security sweep or a pre-standup quality pipeline, even while you sleep.' ],
				[ 'q' => 'What are scheduled tasks?', 'a' => "Claude Code's scheduled tasks run skills on a cron schedule without keeping a terminal open. Schedule a security audit every weekday at 9am, a dependency check every night, or a full quality pipeline before standup. They run headlessly with full access to your codebase, making commits, opening PRs, and running tests automatically. Set it and forget it." ],
				[ 'q' => 'Is skills-hub.ai free?', 'a' => 'Completely free. Browse, install, publish, and organize skills at no cost. Every skill on the platform is free and open-source. No premium tiers, no paywalls, no limits.' ],
			],
			'title_field' => '{{{ q }}}',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section aria-labelledby="faq-heading" class="py-20 sm:py-28">
			<h2 id="faq-heading" class="mb-12 text-center text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl" style="font-family:var(--font-display);letter-spacing:-0.02em">Frequently Asked Questions</h2>
			<div class="mx-auto max-w-3xl divide-y divide-[var(--border)]">
				<?php foreach ( $settings['faqs'] as $index => $faq ) : ?>
					<details class="group">
						<summary class="flex min-h-[48px] cursor-pointer items-center justify-between py-5 text-base font-medium transition-colors hover:text-[var(--primary)] [&::-webkit-details-marker]:hidden list-none">
							<?php echo esc_html($faq['q']); ?>
							<svg class="h-5 w-5 flex-shrink-0 transition-transform duration-200 ease-out group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
						</summary>
						<p class="pb-5 text-sm leading-relaxed text-[var(--muted)]"><?php echo esc_html($faq['a']); ?></p>
					</details>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
