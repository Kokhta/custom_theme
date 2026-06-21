<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_Footer_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_footer_section'; }
	public function get_title() { return esc_html__( '12-footer-section', 'test-theme' ); }
	public function get_icon() { return 'eicon-footer'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );

		$this->add_control( 'footer_desc', [
			'label' => 'Footer Description',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'The open registry for AI agent skills. One command to install, works across every major AI coding tool.',
		]);

		$this->add_control( 'columns', [
			'label' => 'Link Columns',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				[ 'name' => 'col_title', 'label' => 'Column Title', 'type' => 'text', 'default' => 'Column' ],
				[ 'name' => 'col_links', 'label' => 'Links (Text|URL per line)', 'type' => 'textarea', 'default' => "Link 1|#\nLink 2|#" ],
			],
			'default' => [
				[ 'col_title' => 'Product', 'col_links' => "Browse|/browse\nCategories|/categories\nIndustries|/industries\nBundles|/bundles\nPublish|/publish" ],
				[ 'col_title' => 'Developers', 'col_links' => "Getting Started|/docs/getting-started\nCLI Reference|/docs/cli\nIntegrations|/docs/integrations\nWorkflows|/docs/workflows" ],
				[ 'col_title' => 'Resources', 'col_links' => "Skills for every tool|/for-every-tool\nCompare AI tools|/compare\nAlternatives|/alternatives\nBest AI coding tools|/best-ai-coding-tools\nSKILL.md format|/skill-md\nBlog|/blog" ],
				[ 'col_title' => 'Company', 'col_links' => "About|/about\nOrganizations|/orgs\nTerms|/terms\nPrivacy|/privacy" ],
			],
		]);

		$this->add_control( 'newsletter_title', [ 'label' => 'Newsletter Title', 'type' => 'text', 'default' => 'Weekly: new skills, AI tool releases, and one practical automation.' ] );
		$this->add_control( 'newsletter_desc', [ 'label' => 'Newsletter Description', 'type' => 'text', 'default' => 'Trending AI coding intel for engineers. Free, no spam, one-click unsubscribe.' ] );

		$this->add_control( 'tagline', [ 'label' => 'Tagline', 'type' => 'text', 'default' => 'Your AI is only as good as the skills you give it.' ] );
		$this->add_control( 'copyright', [ 'label' => 'Copyright', 'type' => 'text', 'default' => '© 2026 Team Bearie LLC' ] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<footer class="site-footer">
			<div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
				<div class="grid gap-x-8 gap-y-10 sm:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr_1fr_1fr]">
					<div class="sm:col-span-2 lg:col-span-1 lg:pr-4">
						<a class="footer-brand-mark" aria-label="skills-hub.ai" href="/">
							<span class="site-logo-mark" aria-hidden="true">&gt;_</span><span class="site-logo-text">skills-hub.ai</span>
						</a>
						<p class="mt-3 max-w-[28ch] text-sm leading-relaxed text-[var(--muted)]"><?php echo esc_html($settings['footer_desc']); ?></p>
					</div>
					<?php foreach ( $settings['columns'] as $column ) : ?>
						<nav>
							<h3 class="footer-col-title"><?php echo esc_html($column['col_title']); ?></h3>
							<ul class="footer-link-list">
								<?php
								$lines = explode("\n", $column['col_links']);
								foreach($lines as $line) {
									$parts = explode('|', $line);
									if(count($parts) >= 2) {
										echo '<li><a class="footer-link" href="'.esc_url(trim($parts[1])).'">'.esc_html(trim($parts[0])).'</a></li>';
									}
								}
								?>
							</ul>
						</nav>
					<?php endforeach; ?>
				</div>
				<div class="mt-10 grid gap-6 rounded-2xl border border-[var(--border)] bg-[var(--card)] p-5 sm:p-6 lg:grid-cols-[1fr_minmax(280px,420px)] lg:items-center lg:gap-10">
					<div>
						<p class="text-sm font-semibold text-[var(--foreground)] sm:text-base"><?php echo esc_html($settings['newsletter_title']); ?></p>
						<p class="mt-1 text-xs text-[var(--muted)] sm:text-sm"><?php echo esc_html($settings['newsletter_desc']); ?></p>
					</div>
					<form class="flex flex-col gap-2 sm:flex-row sm:items-center">
						<input type="email" required="" placeholder="your@email.com" class="min-h-[40px] flex-1 rounded-lg border border-[var(--border)] bg-[var(--background)] px-3 py-2 text-sm text-[var(--foreground)]">
						<button type="submit" class="min-h-[40px] whitespace-nowrap rounded-lg bg-[var(--primary)] px-4 py-2 text-sm font-semibold text-white">Subscribe</button>
					</form>
				</div>
				<div class="footer-tagline-card">
					<p class="footer-tagline"><?php echo esc_html($settings['tagline']); ?></p>
					<p class="footer-meta"><?php echo esc_html($settings['copyright']); ?></p>
				</div>
			</div>
		</footer>
		<?php
	}
}
