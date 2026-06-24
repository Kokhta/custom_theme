<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_7_Server_Room extends \Elementor\Widget_Base {
	public function get_name() { return '7-server-room'; }
	public function get_title() { return esc_html__( '7-Server Room', 'kriss' ); }
	public function get_icon() { return 'eicon-database'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Data Driven Chatbot']);
		$this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Kriss.ai uses undisputed data sources...']);
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
				['feature_title' => 'Large Language Models ', 'feature_desc' => 'LLM-powered chatbots process large volumes of data...', 'icon_url' => '/media/R5_Natural-Language-Processing-(NLP)-1.png'],
				['feature_title' => 'Scalable Cloud Infrastructure', 'feature_desc' => 'Kriss.ai scales with practice growth...', 'icon_url' => '/media/R5_Scalable-Cloud-Infrastructure-1.png'],
				['feature_title' => 'Feedback & Continuous learning', 'feature_desc' => 'Kriss.ai utilizes advanced machine learning algorithms...', 'icon_url' => '/media/R5_Feedback-&-Continuous-learning-1.png'],
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
		$data = ['title' => $settings['title'], 'description' => $settings['description'], 'productFeatures' => $features, 'globalType' => 'server-room'];
		Kriss_Data_Collector::get_instance()->set_data('server-room', $data);
		echo '<div style="display:none;">Server Room Loaded</div>';
	}
}
