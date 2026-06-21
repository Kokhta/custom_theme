<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_Combo_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_combo'; }
	public function get_title() { return esc_html__( '8-combo', 'test-theme' ); }
	public function get_icon() { return 'eicon-sync'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );
		$this->add_control( 'title', [ 'label' => 'Title', 'type' => 'wysiwyg', 'default' => 'Build once. <span class="text-[var(--primary)]">Run forever.</span>' ] );
		$this->add_control( 'desc', [ 'label' => 'Description', 'type' => 'wysiwyg', 'default' => 'Compose skills into pipelines.' ] );
		$this->add_control( 'terminal', [ 'label' => 'Terminal Content', 'type' => 'code', 'language' => 'html', 'default' => '<p>$ skills-hub install security-audit</p>' ] );
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="py-12">
			<div class="card-engaging rounded-xl border border-[var(--card-border)] bg-[var(--card)] p-8 sm:p-10">
				<div class="grid items-center gap-8 lg:grid-cols-2">
					<div>
						<h2 class="text-2xl font-bold tracking-tight sm:text-3xl lg:text-4xl" style="font-family:var(--font-display)"><?php echo $settings['title']; ?></h2>
						<div class="mt-3 text-[var(--muted)]"><?php echo $settings['desc']; ?></div>
					</div>
					<div class="overflow-x-auto rounded-lg border border-[var(--card-border)] bg-[var(--background)] p-5 font-mono text-sm">
						<?php echo $settings['terminal']; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
