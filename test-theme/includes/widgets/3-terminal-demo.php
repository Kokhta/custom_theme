<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_Terminal_Demo_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_terminal_demo'; }
	public function get_title() { return esc_html__( '3-terminal-demo', 'test-theme' ); }
	public function get_icon() { return 'eicon-code'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );
		$this->add_control( 'lines', [
			'label' => 'Terminal Lines',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				[ 'name' => 'text', 'label' => 'Content', 'type' => 'code', 'language' => 'html' ],
			],
			'default' => [
				[ 'text' => '<span style="color: oklch(0.627 0.208 293.28);">$ </span><span style="color: oklch(0.929 0.013 255.51);">skills-hub install-bundle full-stack-review</span>' ],
				[ 'text' => '<span style="color: oklch(0.657 0.183 148.26);">✓ </span><span style="color: oklch(0.554 0.022 257.42);">1/4: </span><span style="color: oklch(0.627 0.208 293.28);">review-code@1.2.0</span>' ],
			],
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section aria-label="Terminal demo" class="py-8">
			<div class="mx-auto max-w-3xl">
				<div class="overflow-hidden rounded-xl border border-[var(--card-border)]" style="background: oklch(0.16 0.01 285.82);">
					<div class="flex items-center gap-2 border-b border-[var(--card-border)] px-4 py-3"><span class="h-3 w-3 rounded-full bg-[#ff5f56]"></span><span class="h-3 w-3 rounded-full bg-[#ffbd2e]"></span><span class="h-3 w-3 rounded-full bg-[#27c93f]"></span><span class="ml-2 text-xs" style="color: oklch(0.554 0.022 257.42);">Terminal</span></div>
					<div class="px-5 py-4 font-mono text-sm leading-relaxed">
						<?php foreach ( $settings['lines'] as $line ) : ?>
							<div class="terminal-line whitespace-pre"><?php echo $line['text']; ?></div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
