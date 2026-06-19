<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_12 extends \Elementor\Widget_Base {

	public function get_name() { return '12-open-weight'; }
	public function get_title() { return esc_html__( '12. Open Weight', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-document-file'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
		$this->add_control( 'tagline', [ 'label' => 'Tagline', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Our SOTA Open Weight model' ] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'cat', [ 'label' => 'Category', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'desc', [ 'label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA ] );

		$this->add_control( 'articles', [ 'label' => esc_html__( 'Articles', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[ 'cat' => 'Abstract', 'desc' => 'We present Oryzo-1, an open-weight 3D model of a cork coaster...' ],
			[ 'cat' => 'BibTeX', 'desc' => '@misc{oryzo2026, title = {Oryzo-1} }' ],
		] ] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="open-weight" class="section" style="visibility: hidden;">
			<div class="section__inner body2">
				<div id="open-weight-header">
					<h5 id="open-weight-tagline" class="sub2"><?php echo esc_html($settings['tagline']); ?></h5>
					<h2 id="open-weight-title"><svg viewBox="0 0 809 174"><use href="#logo-tmpl"></use></svg></h2>
				</div>
				<?php foreach($settings['articles'] as $article): ?>
				<div class="open-weight-article">
					<h5 class="open-weight-cat"><?php echo esc_html($article['cat']); ?></h5>
					<div class="open-weight-desc"><?php echo esc_html($article['desc']); ?></div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}
}
