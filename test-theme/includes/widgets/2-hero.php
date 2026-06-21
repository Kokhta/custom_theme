<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_Hero_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_hero'; }
	public function get_title() { return esc_html__( '2-hero', 'test-theme' ); }
	public function get_icon() { return 'eicon-banner'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );
		$this->add_control( 'badge_text', [ 'label' => 'Badge', 'type' => 'text', 'default' => '5,550+ skills · 90+ sources' ] );
		$this->add_control( 'title', [ 'label' => 'Title', 'type' => 'wysiwyg', 'default' => 'Your AI team. <span class="text-[var(--primary)]">Already trained</span> for the job.' ] );
		$this->add_control( 'desc', [ 'label' => 'Description', 'type' => 'textarea', 'default' => '5,550+ ready-to-work specialists from Anthropic, Google, Microsoft, and 90+ sources — send a brief, approve each step, get the deliverables.' ] );
		$this->add_control( 'btn1_text', [ 'label' => 'Button 1 Text', 'type' => 'text', 'default' => 'Browse skills' ] );
		$this->add_control( 'btn1_url', [ 'label' => 'Button 1 URL', 'type' => 'url', 'default' => [ 'url' => '/browse' ] ] );
		$this->add_control( 'btn2_text', [ 'label' => 'Button 2 Text', 'type' => 'text', 'default' => 'One-command setup' ] );
		$this->add_control( 'btn2_url', [ 'label' => 'Button 2 URL', 'type' => 'url', 'default' => [ 'url' => '/docs/getting-started' ] ] );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section aria-labelledby="hero-heading" class="relative animate-fade-in-up -mt-6 py-20 text-center sm:-mt-8 sm:py-28 lg:-mt-10 lg:py-36">
			<div class="hero-dot-grid" aria-hidden="true"></div>
			<div class="hero-glow" aria-hidden="true"></div>
			<div class="relative">
				<p class="mb-6 inline-flex items-center gap-2 rounded-full border border-[var(--border)] bg-[var(--card)] px-4 py-2 text-sm font-medium text-[var(--muted)] shadow-sm">
					<span class="inline-block h-2 w-2 rounded-full bg-[var(--success)]" aria-hidden="true"></span>
					<?php echo esc_html($settings['badge_text']); ?>
				</p>
				<h1 id="hero-heading" class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-7xl" style="font-family:var(--font-display);line-height:1.05;letter-spacing:-0.03em"><?php echo $settings['title']; ?></h1>
				<p class="mx-auto mt-6 max-w-2xl text-base sm:text-lg text-[var(--muted)] leading-relaxed"><?php echo esc_html($settings['desc']); ?></p>
				<form class="mx-auto mt-8 max-w-xl">
					<div class="relative">
						<svg class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[var(--muted)]" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
						<input type="search" placeholder="What should your AI be better at?" class="search-focus-glow min-h-[48px] w-full rounded-xl border border-[var(--border)] bg-[var(--card)] py-3 pl-12 pr-24 sm:pr-28 text-sm card-elevated transition-[border-color,box-shadow] duration-300 focus:border-[var(--primary)] focus:outline-none">
						<button type="submit" class="absolute right-0 top-0 bottom-0 rounded-r-xl bg-[var(--primary)] px-5 text-sm font-medium text-[var(--primary-foreground)]">Search</button>
					</div>
				</form>
				<div class="mt-10 flex flex-wrap items-center justify-center gap-4">
					<a class="relative inline-flex items-center justify-center gap-2 bg-[var(--primary)] text-[var(--primary-foreground)] rounded-lg px-8 py-2.5 text-sm" href="<?php echo esc_url($settings['btn1_url']['url']); ?>"><?php echo esc_html($settings['btn1_text']); ?></a>
					<a class="relative inline-flex items-center justify-center gap-2 border border-[var(--border)] rounded-lg px-8 py-2.5 text-sm" href="<?php echo esc_url($settings['btn2_url']['url']); ?>"><?php echo esc_html($settings['btn2_text']); ?></a>
				</div>
			</div>
		</section>
		<?php
	}
}
