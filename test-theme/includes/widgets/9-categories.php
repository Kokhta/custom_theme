<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Test_Theme_Categories_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'test_theme_categories'; }
	public function get_title() { return esc_html__( '9-categories', 'test-theme' ); }
	public function get_icon() { return 'eicon-grid'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'section_content', [ 'label' => 'Content' ] );
		$this->add_control( 'categories', [
			'label' => 'Categories',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				[ 'name' => 'title', 'label' => 'Title', 'type' => 'text' ],
				[ 'name' => 'desc', 'label' => 'Description', 'type' => 'text' ],
				[ 'name' => 'url', 'label' => 'URL', 'type' => 'url' ],
				[ 'name' => 'color', 'label' => 'Color (CSS Var)', 'type' => 'text', 'default' => 'var(--cat-build)' ],
				[ 'name' => 'icon_svg', 'label' => 'Icon SVG', 'type' => 'code', 'language' => 'html' ],
			],
			'default' => [
				[ 'title' => 'Build', 'desc' => 'Project scaffolding and full build pipelines', 'url' => ['url'=>'/browse?category=build'], 'color' => 'var(--cat-build)', 'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085"></path></svg>' ],
			],
			'title_field' => '{{{ title }}}',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="py-16 sm:py-20">
			<h2 class="mb-3 text-3xl font-bold sm:text-4xl lg:text-5xl" style="font-family:var(--font-display);letter-spacing:-0.02em">Skills for every domain</h2>
			<p class="mb-10 text-base text-[var(--muted)] sm:text-lg">23 categories spanning engineering, marketing, healthcare, research, and more.</p>
			<div class="grid grid-cols-1 gap-3 min-[400px]:grid-cols-2 sm:grid-cols-3 lg:grid-cols-4">
				<?php foreach ( $settings['categories'] as $cat ) : ?>
					<a class="category-card-bold group flex items-start gap-3 rounded-2xl border border-[var(--card-border)] bg-[var(--card)] p-5 shadow-sm transition-all duration-200 hover:shadow-md hover:-translate-y-0.5" style="--_cat-color:<?php echo esc_attr($cat['color']); ?>" href="<?php echo esc_url($cat['url']['url']); ?>">
						<div class="mt-0.5 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl transition-all duration-200 group-hover:scale-110" style="background-color:color-mix(in oklch, <?php echo esc_attr($cat['color']); ?> 15%, var(--card));border:1px solid color-mix(in oklch, <?php echo esc_attr($cat['color']); ?> 20%, transparent)">
							<div class="category-card-icon" style="color:<?php echo esc_attr($cat['color']); ?>"><?php echo $cat['icon_svg']; ?></div>
						</div>
						<div>
							<h3 class="font-semibold transition-colors group-hover:text-[var(--primary)]"><?php echo esc_html($cat['title']); ?></h3>
							<p class="mt-1 text-xs leading-relaxed text-[var(--muted)]"><?php echo esc_html($cat['desc']); ?></p>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
