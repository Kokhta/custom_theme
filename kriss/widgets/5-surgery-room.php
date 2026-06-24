<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_5_Surgery_Room extends \Elementor\Widget_Base {
	public function get_name() { return '5-surgery-room'; }
	public function get_title() { return esc_html__( '5-Surgery Room', 'kriss' ); }
	public function get_icon() { return 'eicon-handle-bar'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Treatment and Surgery']);
		$this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Kriss.ai supports health professionals to accurately document medical procedures...']);
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
				['feature_title' => 'Accurate Clinical notes', 'feature_desc' => 'Draft real time clinical notes...', 'icon_url' => '/media/R3_Accurate-clinical-notes-1.png'],
				['feature_title' => 'Real-time procedural guidance', 'feature_desc' => 'Collect feedback via post-visit surveys...', 'icon_url' => '/media/R3_Real-time-procedural-guidance-1.png'],
				['feature_title' => 'Patient Advocacy & Informed Consent', 'feature_desc' => 'Generate informed consent documents...', 'icon_url' => '/media/R3_Patient-Advocacy-&-Informed-Consent-1.png'],
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
		$data = ['title' => $settings['title'], 'description' => $settings['description'], 'productFeatures' => $features, 'globalType' => 'surgery-room'];
		Kriss_Data_Collector::get_instance()->set_data('surgery-room', $data);
		echo '<div style="display:none;">Surgery Room Loaded</div>';
	}
}
