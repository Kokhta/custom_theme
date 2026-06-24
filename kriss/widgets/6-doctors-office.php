<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_6_Doctors_Office extends \Elementor\Widget_Base {
	public function get_name() { return '6-doctors-office'; }
	public function get_title() { return esc_html__( '6-Doctors Office', 'kriss' ); }
	public function get_icon() { return 'eicon-user-circle-o'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Doctors  Office']);
		$this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Kriss AI offers enhanced data collection...']);
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
				['feature_title' => 'Accurate Customer Insights', 'feature_desc' => 'Gain insights into common patient concerns...', 'icon_url' => '/media/R4_Accurate-Customer-Insights-1.png'],
				['feature_title' => 'Clinical Risk Management', 'feature_desc' => 'Kriss.ai improves dental practice risk management...', 'icon_url' => '/media/22_dental_practice_risk-1.png'],
				['feature_title' => 'Innovative Patient Care', 'feature_desc' => 'Position your practice as innovative...', 'icon_url' => '/media/R4_Innovative-Patient-Care-1.png'],
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
		$data = ['title' => $settings['title'], 'description' => $settings['description'], 'productFeatures' => $features, 'globalType' => 'doctors-office'];
		Kriss_Data_Collector::get_instance()->set_data('doctors-office', $data);
		echo '<div style="display:none;">Doctors Office Loaded</div>';
	}
}
