<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_How_It_Works_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_how_it_works'; }
	public function get_title() { return esc_html__( '4-how-it-works', 'test-theme' ); }
	public function get_icon() { return 'eicon-info-circle'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );
		$this->add_control( 'title', [ 'label' => 'Title', 'type' => 'text', 'default' => 'One command. Fully configured.' ] );
		$this->add_control( 'steps', [
			'label' => 'Steps',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				[ 'name' => 'num', 'label' => 'Number', 'type' => 'text', 'default' => '01' ],
				[ 'name' => 'heading', 'label' => 'Heading', 'type' => 'text', 'default' => 'Set up' ],
				[ 'name' => 'desc', 'label' => 'Description', 'type' => 'textarea', 'default' => 'Description here' ],
				[ 'name' => 'cmd', 'label' => 'Command', 'type' => 'text', 'default' => 'npx ...' ],
			],
			'default' => [
				[ 'num' => '01', 'heading' => 'Set up', 'desc' => 'One command sets up your entire machine...', 'cmd' => 'npx @skills-hub-ai/cli install quickstart' ],
			],
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="py-16 sm:py-24">
			<h2 class="mb-4 text-center text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl" style="font-family:var(--font-display)"><?php echo esc_html($settings['title']); ?></h2>
			<div class="grid gap-6 sm:grid-cols-3 sm:gap-10">
				<?php foreach ( $settings['steps'] as $step ) : ?>
					<div class="group relative flex flex-col text-left">
						<span class="block text-6xl font-extrabold text-[var(--primary)] opacity-15" style="font-family:var(--font-display);line-height:1"><?php echo esc_html($step['num']); ?></span>
						<h3 class="-mt-5 text-2xl font-bold tracking-tight" style="font-family:var(--font-display)"><?php echo esc_html($step['heading']); ?></h3>
						<p class="mt-3 text-sm text-[var(--muted)]"><?php echo esc_html($step['desc']); ?></p>
						<div class="mt-auto pt-4 rounded-xl border border-[var(--card-border)] overflow-hidden">
							<div class="bg-[var(--card)] px-4 py-2.5">
								<code class="whitespace-nowrap text-xs font-mono"><span class="text-[var(--muted)]">$</span> <?php echo esc_html($step['cmd']); ?></code>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
