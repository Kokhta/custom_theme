<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_Header_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_header'; }
	public function get_title() { return esc_html__( '1-header', 'test-theme' ); }
	public function get_icon() { return 'eicon-header'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );

		$this->add_control( 'logo_mark', [ 'label' => 'Logo Mark', 'type' => 'text', 'default' => '>_' ] );
		$this->add_control( 'logo_text', [ 'label' => 'Logo Text', 'type' => 'text', 'default' => 'skills-hub.ai' ] );

		$this->add_control( 'nav_links', [
			'label' => 'Desktop Navigation Links',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				[ 'name' => 'text', 'label' => 'Text', 'type' => 'text' ],
				[ 'name' => 'url', 'label' => 'URL', 'type' => 'url' ],
			],
			'default' => [
				[ 'text' => 'Browse', 'url' => [ 'url' => '/browse' ] ],
				[ 'text' => 'Claude Skills', 'url' => [ 'url' => '/claude-skills' ] ],
				[ 'text' => 'Compare', 'url' => [ 'url' => '/compare' ] ],
				[ 'text' => 'Docs', 'url' => [ 'url' => '/docs/getting-started' ] ],
				[ 'text' => 'Consulting', 'url' => [ 'url' => '/consulting' ] ],
			],
		]);

		$this->add_control( 'mobile_discover_links', [
			'label' => 'Mobile Discover Links',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				[ 'name' => 'text', 'label' => 'Text', 'type' => 'text' ],
				[ 'name' => 'url', 'label' => 'URL', 'type' => 'url' ],
			],
			'default' => [
				[ 'text' => 'Browse', 'url' => [ 'url' => '/browse' ] ],
				[ 'text' => 'Claude Skills', 'url' => [ 'url' => '/claude-skills' ] ],
				[ 'text' => 'Industries', 'url' => [ 'url' => '/industries' ] ],
				[ 'text' => 'Categories', 'url' => [ 'url' => '/categories' ] ],
				[ 'text' => 'Tags', 'url' => [ 'url' => '/tags' ] ],
				[ 'text' => 'Blog', 'url' => [ 'url' => '/blog' ] ],
			],
		]);

		$this->add_control( 'signin_text', [ 'label' => 'Sign In Text', 'type' => 'text', 'default' => 'Sign in' ] );
		$this->add_control( 'signin_url', [ 'label' => 'Sign In URL', 'type' => 'url', 'default' => [ 'url' => '/auth/login' ] ] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<header class="site-header">
			<div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
				<div class="flex items-center gap-7">
					<a class="site-logo shrink-0" aria-label="skills-hub.ai home" href="/">
						<span class="site-logo-mark" aria-hidden="true"><?php echo esc_html($settings['logo_mark']); ?></span>
						<span class="site-logo-text"><?php echo esc_html($settings['logo_text']); ?></span>
					</a>
					<nav aria-label="Main navigation" class="hidden items-center gap-0.5 lg:flex">
						<?php foreach ( $settings['nav_links'] as $item ) : ?>
							<a class="nav-link" href="<?php echo esc_url($item['url']['url']); ?>"><?php echo esc_html($item['text']); ?></a>
						<?php endforeach; ?>
					</nav>
				</div>
				<div class="flex items-center gap-2 sm:gap-3">
					<div class="header-tools">
						<button class="header-icon-btn min-h-[48px] min-w-[48px]" aria-label="Theme: system. Click to switch." title="Theme: system">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
						</button>
					</div>
					<div class="hidden items-center gap-3 lg:flex">
						<span class="header-divider" aria-hidden="true"></span>
						<a class="relative inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium cursor-pointer opacity-90 hover:opacity-100 transition-[transform,opacity,background-color,border-color,box-shadow,color] duration-150 ease-out focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[var(--primary)] focus-visible:ring-offset-2 disabled:opacity-60 disabled:cursor-not-allowed disabled:pointer-events-none active:scale-[0.97] bg-[var(--primary)] text-[var(--primary-foreground)] hover:bg-[var(--primary-hover)] btn-shimmer min-h-[48px] rounded-lg px-6 py-2 text-sm btn-signin" href="<?php echo esc_url($settings['signin_url']['url']); ?>"><?php echo esc_html($settings['signin_text']); ?></a>
					</div>
					<button class="header-icon-btn lg:!hidden" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-nav">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="transition-transform duration-200 "><path d="M4 6h16M4 12h16M4 18h16"></path></svg>
					</button>
				</div>
			</div>
			<div class="grid transition-[grid-template-rows] duration-200 lg:hidden grid-rows-[0fr]">
				<nav id="mobile-nav" aria-label="Mobile navigation" class="overflow-hidden ">
					<div class="flex max-h-[calc(100dvh-4rem)] flex-col overflow-y-auto overscroll-contain px-4 py-2">
						<p class="px-3 pb-0.5 pt-2 text-[10px] font-semibold uppercase tracking-wider text-[var(--muted)]">Discover</p>
						<?php foreach ( $settings['mobile_discover_links'] as $item ) : ?>
							<a class="mobile-nav-link" href="<?php echo esc_url($item['url']['url']); ?>"><?php echo esc_html($item['text']); ?></a>
						<?php endforeach; ?>
						<hr class="my-1 border-[var(--border)]">
						<p class="px-3 pb-0.5 pt-2 text-[10px] font-semibold uppercase tracking-wider text-[var(--muted)]">Learn</p>
						<a class="mobile-nav-link" href="/docs/getting-started">Docs</a>
						<a class="mobile-nav-link" href="/consulting">Consulting</a>
						<hr class="my-1 border-[var(--border)]">
						<div class="flex flex-col gap-2 py-2">
							<a class="flex min-h-[48px] items-center justify-center rounded-lg border border-[var(--border)] px-3 text-sm font-medium transition-colors hover:bg-[var(--accent)]" href="/auth/login">Sign in</a>
							<a class="flex min-h-[48px] items-center justify-center rounded-lg bg-[var(--primary)] px-3 text-sm font-medium text-[var(--primary-foreground)] transition-colors hover:bg-[var(--primary-hover)]" href="/auth/register">Create account</a>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<?php
	}
}
