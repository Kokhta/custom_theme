<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_1_Experience extends \Elementor\Widget_Base {

	public function get_name() { return '1-experience'; }
	public function get_title() { return esc_html__( '1-Experience', 'kriss' ); }
	public function get_icon() { return 'eicon-code'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => esc_html__( 'Content', 'kriss' )]);

		$this->add_control('loading_text', ['label' => 'Loading Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '0%']);
		$this->add_control('h', ['label' => 'Height (--h)', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 100]);
		$this->add_control('w', ['label' => 'Width (--w)', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 300]);
		$this->add_control('vh', ['label' => 'Viewport Height (--vh)', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '100px']);
		$this->add_control('vw', ['label' => 'Viewport Width (--vw)', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '300px']);
		$this->add_control('aspect', ['label' => 'Aspect Ratio (--aspect)', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 3]);

		$this->add_control('text_color', ['label' => 'Text Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '']);
		$this->add_control('cta_color', ['label' => 'CTA Color', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '']);

		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<div style="--h: <?php echo esc_attr($s['h']); ?>;
    --w: <?php echo esc_attr($s['w']); ?>;
    --vh: <?php echo esc_attr($s['vh']); ?>;
    --vw: <?php echo esc_attr($s['vw']); ?>;
    --aspect: <?php echo esc_attr($s['aspect']); ?>;
	--text-color: <?php echo $s['text_color'] ? esc_attr($s['text_color']) : 'var(--blue-text)'; ?>;
	--cta-color: <?php echo $s['cta_color'] ? esc_attr($s['cta_color']) : 'var(--blue-cta)'; ?>;
	--cta-hover-color: var(--blue-cta-hover);
	--cta-text-color: var(--blue-cta-text);
	"><div class="webgl-container svelte-12ctfyc"></div> <!--[!--><div class="percentage D1 svelte-1w1dhb3"><?php echo esc_html( $s['loading_text'] ); ?></div><!--]--></div>
		<?php
	}
}
