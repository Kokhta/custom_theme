<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_CTA_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_cta'; }
	public function get_title() { return esc_html__( '11-cta', 'test-theme' ); }
	public function get_icon() { return 'eicon-call-to-action'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );
		$this->add_control( 'title', [ 'label' => 'Title', 'type' => 'text', 'default' => 'Your machine. Fully configured.' ] );
		$this->add_control( 'desc', [ 'label' => 'Description', 'type' => 'textarea', 'default' => 'One command sets up your machine, installs the right skills for your project, and connects everything. Or publish your own workflow and let other developers install it in one command.' ] );
		$this->add_control( 'cmd', [ 'label' => 'Command', 'type' => 'text', 'default' => 'npx @skills-hub-ai/cli install quickstart' ] );
		$this->add_control( 'btn1_text', [ 'label' => 'Button 1 Text', 'type' => 'text', 'default' => 'Browse skills' ] );
		$this->add_control( 'btn1_url', [ 'label' => 'Button 1 URL', 'type' => 'url', 'default' => ['url'=>'/browse'] ] );
		$this->add_control( 'btn2_text', [ 'label' => 'Button 2 Text', 'type' => 'text', 'default' => 'Publish your own' ] );
		$this->add_control( 'btn2_url', [ 'label' => 'Button 2 URL', 'type' => 'url', 'default' => ['url'=>'/publish'] ] );
		$this->add_control( 'btn3_text', [ 'label' => 'Button 3 Text', 'type' => 'text', 'default' => 'Read the getting started guide →' ] );
		$this->add_control( 'btn3_url', [ 'label' => 'Button 3 URL', 'type' => 'url', 'default' => ['url'=>'/docs/getting-started'] ] );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section aria-labelledby="cta-heading" class="py-20 sm:py-28">
			<div class="cta-section rounded-2xl p-8 text-center sm:p-14 lg:p-20" style="background:linear-gradient(135deg, color-mix(in oklch, var(--primary) 8%, var(--card)) 0%, var(--card) 50%, color-mix(in oklch, var(--accent-warm) 6%, var(--card)) 100%);border:1px solid var(--card-border)">
				<div class="relative">
					<h2 id="cta-heading" class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl" style="font-family:var(--font-display);letter-spacing:-0.03em;line-height:1.05"><?php echo esc_html($settings['title']); ?></h2>
					<p class="mx-auto mt-6 max-w-lg text-base sm:text-lg text-[var(--muted)] leading-relaxed"><?php echo esc_html($settings['desc']); ?></p>
					<div class="mx-auto mt-6 max-w-md overflow-hidden rounded-lg border border-[var(--card-border)] shadow-sm">
						<div class="flex items-center gap-1.5 border-b border-[var(--card-border)] bg-[var(--accent)] px-3 py-1.5">
							<span class="h-2.5 w-2.5 rounded-full bg-[var(--error)]" style="opacity:0.5"></span>
							<span class="h-2.5 w-2.5 rounded-full bg-[var(--warning)]" style="opacity:0.5"></span>
							<span class="h-2.5 w-2.5 rounded-full bg-[var(--success)]" style="opacity:0.5"></span>
						</div>
						<div class="bg-[var(--card)] px-4 py-3">
							<code class="text-sm"><span class="text-[var(--muted)]">$</span> <?php echo esc_html($settings['cmd']); ?></code>
						</div>
					</div>
					<div class="mt-12 flex flex-wrap items-center justify-center gap-4">
						<a class="relative inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium bg-[var(--primary)] text-[var(--primary-foreground)] rounded-lg px-8 py-2.5 text-sm" href="<?php echo esc_url($settings['btn1_url']['url']); ?>"><?php echo esc_html($settings['btn1_text']); ?></a>
						<a class="relative inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium border border-[var(--border)] rounded-lg px-8 py-2.5 text-sm" href="<?php echo esc_url($settings['btn2_url']['url']); ?>"><?php echo esc_html($settings['btn2_text']); ?></a>
						<a class="relative inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium text-[var(--primary)] text-sm" href="<?php echo esc_url($settings['btn3_url']['url']); ?>"><?php echo esc_html($settings['btn3_text']); ?></a>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
