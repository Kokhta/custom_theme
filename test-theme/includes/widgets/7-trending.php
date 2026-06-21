<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_Trending_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_trending'; }
	public function get_title() { return esc_html__( '7-trending', 'test-theme' ); }
	public function get_icon() { return 'eicon-nerd-chucking'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );
		$this->add_control( 'items', [
			'label' => 'Trending Skills',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				[ 'name' => 'title', 'label' => 'Title', 'type' => 'text' ],
				[ 'name' => 'author', 'label' => 'Author', 'type' => 'text', 'default' => 'skills-hub' ],
				[ 'name' => 'desc', 'label' => 'Description', 'type' => 'textarea' ],
				[ 'name' => 'tag', 'label' => 'Tag', 'type' => 'text' ],
				[ 'name' => 'tag_color', 'label' => 'Tag Color (CSS Var)', 'type' => 'text', 'default' => 'var(--cat-review)' ],
				[ 'name' => 'ver', 'label' => 'Version', 'type' => 'text', 'default' => '1.0.0' ],
				[ 'name' => 'installs', 'label' => 'Installs', 'type' => 'text' ],
				[ 'name' => 'url', 'label' => 'URL', 'type' => 'url' ],
			],
			'default' => [
				[
					'title' => 'code-review',
					'desc' => 'Thorough code review — checks correctness, security, performance, readability, and test coverage.',
					'tag' => 'Review',
					'tag_color' => 'var(--cat-review)',
					'installs' => '66',
					'url' => [ 'url' => '/skills/code-review' ],
				],
				[
					'title' => 'ui-design-system',
					'desc' => 'UI design system toolkit for Senior UI Designer including design token generation...',
					'tag' => 'Build',
					'tag_color' => 'var(--cat-build)',
					'installs' => '33',
					'url' => [ 'url' => '/skills/alirezarezvani-ui-design-system' ],
				],
			],
			'title_field' => '{{{ title }}}',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="py-16 sm:py-20">
			<div class="mb-8 flex flex-wrap items-end justify-between gap-3">
				<h2 class="text-3xl font-bold sm:text-4xl lg:text-5xl" style="font-family:var(--font-display);letter-spacing:-0.02em">What developers are installing right now</h2>
				<a class="inline-flex min-h-[48px] items-center text-sm font-medium text-[var(--primary)] hover:underline" href="/browse?sort=most_installed">View all</a>
			</div>
			<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
				<?php foreach ( $settings['items'] as $item ) : ?>
					<div class="">
						<a class="card-engaging group relative block rounded-2xl border border-[var(--card-border)] bg-[var(--card)] p-6" style="--_card-tint:<?php echo esc_attr($item['tag_color']); ?>" href="<?php echo esc_url($item['url']['url']); ?>">
							<div class="mb-4">
								<h3 class="text-base font-bold transition-colors group-hover:text-[var(--primary)]"><?php echo esc_html($item['title']); ?></h3>
								<p class="mt-1 text-xs text-[var(--muted)]">by <?php echo esc_html($item['author']); ?></p>
							</div>
							<p class="mb-4 line-clamp-2 text-sm leading-relaxed text-[var(--muted)]"><?php echo esc_html($item['desc']); ?></p>
							<div class="flex items-center gap-3 text-xs text-[var(--muted)]">
								<span class="rounded-md px-2 py-0.5 font-medium" style="background-color:color-mix(in oklch, <?php echo esc_attr($item['tag_color']); ?> 12%, var(--card));color:<?php echo esc_attr($item['tag_color']); ?>"><?php echo esc_html($item['tag']); ?></span>
								<span>v<?php echo esc_html($item['ver']); ?></span>
								<span class="inline-flex items-center gap-1">
									<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"></path></svg><?php echo esc_html($item['installs']); ?>
								</span>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
