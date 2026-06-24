<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_4_Consultation_Room extends \Elementor\Widget_Base {
	public function get_name() { return '4-consultation-room'; }
	public function get_title() { return esc_html__( '4-Consultation Room', 'kriss' ); }
	public function get_icon() { return 'eicon-comments'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Patient Consultation']);
		$this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Kriss.ai empowers healthcare professionals with precise treatment guidance...']);
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
				['feature_title' => 'Enhanced patient education', 'feature_desc' => 'Kriss.ai offers detailed procedure explanations...', 'icon_url' => '/media/R2_Enhanced-Patient-Education-1.png'],
				['feature_title' => 'Personalized Treatment Plans', 'feature_desc' => 'Kriss.ai clarifies treatment options...', 'icon_url' => '/media/R2_Personalized-Treatment-Plans-1.png'],
				['feature_title' => 'Increased Treatment Conversion', 'feature_desc' => 'Kriss.ai provides 24/7 real-time support...', 'icon_url' => '/media/R2_Lead-Qualification-1.png'],
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
		$data = ['title' => $settings['title'], 'description' => $settings['description'], 'productFeatures' => $features, 'globalType' => 'consultation-room'];
		Kriss_Data_Collector::get_instance()->set_data('consultation-room', $data);
		echo '<div style="display:none;">Consultation Room Loaded</div>';
	}
}
