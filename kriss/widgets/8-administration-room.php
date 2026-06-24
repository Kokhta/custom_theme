<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_8_Administration_Room extends \Elementor\Widget_Base {
	public function get_name() { return '8-administration-room'; }
	public function get_title() { return esc_html__( '8-Administration Room', 'kriss' ); }
	public function get_icon() { return 'eicon-form-horizontal'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Administration']);
		$this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Kriss.ai streamlines administrative tasks...']);
		$this->end_controls_section();

		$this->start_controls_section('section_features', ['label' => 'Product Features']);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('feature_title', ['label' => 'Feature Title', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('feature_desc', ['label' => 'Feature Description', 'type' => \Elementor\Controls_Manager::TEXTAREA]);
		$repeater->add_control('icon_url', ['label' => 'Icon URL', 'type' => \Elementor\Controls_Manager::TEXT]);
		$this->add_control('productFeatures', [
			'label' => 'Features',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				['feature_title' => 'Automated Reporting & Record Management', 'feature_desc' => 'Track patient interactions...', 'icon_url' => '/media/R6_Automated-Reporting-&-Record-Management-1.png'],
				['feature_title' => 'Accurate Insurance Processing', 'feature_desc' => 'Kriss.ai assists in obtaining accurate ADA codes...', 'icon_url' => '/media/R6_Accurate-Insurance-Processing-1.png'],
				['feature_title' => 'Staff Training and Education', 'feature_desc' => 'Enrich staff training with interactive learning modules...', 'icon_url' => '/media/R6_Staff-Training-and-Education-1.png'],
			],
			'title_field' => '{{{ feature_title }}}',
		]);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$features = [];
		foreach($settings['productFeatures'] as $f) {
			$features[] = ['title' => $f['feature_title'], 'description' => $f['feature_desc'], 'icon' => ['url' => $f['icon_url']], 'messages' => []];
		}
		$data = ['title' => $settings['title'], 'description' => $settings['description'], 'productFeatures' => $features, 'globalType' => 'administration-room'];
		Kriss_Data_Collector::get_instance()->set_data('administration-room', $data);
		echo '<div style="display:none;">Administration Room Loaded</div>';
	}
}
