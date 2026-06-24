<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_9_Aftercare extends \Elementor\Widget_Base {
	public function get_name() { return '9-aftercare'; }
	public function get_title() { return esc_html__( '9-Aftercare', 'kriss' ); }
	public function get_icon() { return 'eicon-heart'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Post-Operative Care']);
		$this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Kriss.ai understands the importance of exceptional post-operative care...']);
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
				['feature_title' => '24/7 Post Treatment Support', 'feature_desc' => 'Kriss is accessible 24/7 for aftercare inquiries...', 'icon_url' => '/media/R7_24-7 Post-Treatment-Support-1.png'],
				['feature_title' => 'Pain Management Advice', 'feature_desc' => 'Kriss.ai provides guidance for pain management...', 'icon_url' => '/media/R7_Personalized-Aftercare-Plans-1.png'],
				['feature_title' => 'Improved Treatment Outcomes', 'feature_desc' => 'Kriss.ai educates patients on aftercare importance...', 'icon_url' => '/media/R7_Improved-Treatment-Outcomes-1.png'],
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
		$data = ['title' => $settings['title'], 'description' => $settings['description'], 'productFeatures' => $features, 'globalType' => 'aftercare'];
		Kriss_Data_Collector::get_instance()->set_data('aftercare', $data);
		echo '<div style="display:none;">Aftercare Loaded</div>';
	}
}
