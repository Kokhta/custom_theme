<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_1_Experience extends \Elementor\Widget_Base {
	public function get_name() { return '1-experience'; }
	public function get_title() { return '1-Experience'; }
	public function get_icon() { return 'eicon-code'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_style', ['label' => 'Style Variables']);
		$this->add_control('h', ['label' => '--h', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 100]);
		$this->add_control('w', ['label' => '--w', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 300]);
		$this->add_control('vh', ['label' => '--vh', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '100px']);
		$this->add_control('vw', ['label' => '--vw', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '300px']);
		$this->add_control('aspect', ['label' => '--aspect', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 3]);
		$this->add_control('loading_pct', ['label' => 'Loading %', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '0%']);

        $this->add_control('container_class', ['label' => 'Container Class', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'webgl-container svelte-12ctfyc']);
        $this->add_control('pct_class', ['label' => 'Percentage Class', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'percentage D1 svelte-1w1dhb3']);

		$this->end_controls_section();
	}
	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<div style="--h: <?php echo esc_attr($s['h']); ?>; --w: <?php echo esc_attr($s['w']); ?>; --vh: <?php echo esc_attr($s['vh']); ?>; --vw: <?php echo esc_attr($s['vw']); ?>; --aspect: <?php echo esc_attr($s['aspect']); ?>; --text-color: var(--blue-text); --cta-color: var(--blue-cta); --cta-hover-color: var(--blue-cta-hover); --cta-text-color: var(--blue-cta-text);">
			<div class="<?php echo esc_attr($s['container_class']); ?>"></div>
			<div class="<?php echo esc_attr($s['pct_class']); ?>"><?php echo esc_html($s['loading_pct']); ?></div>
		</div>
		<?php
	}
}
