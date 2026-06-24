<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_3_Front_Desk extends \Elementor\Widget_Base {

	public function get_name() { return '3-front-desk'; }
	public function get_title() { return esc_html__( '3-Front Desk', 'kriss' ); }
	public function get_icon() { return 'eicon-person'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => esc_html__( 'Content', 'kriss' )]);
		$this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Front Desk']);
		$this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Kriss.ai employs advanced automation for routine questions, offering real-time patient support to enhance processes and satisfaction.']);
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
				[
					'feature_title' => '24/7 Personalized Assistance',
					'feature_desc' => 'Patients get round-the-clock answers, building trust, reducing anxiety and increasing case acceptance.',
					'icon_url' => '/media/R1_24-7-Personalised-Assistance-1.png'
				],
				[
					'feature_title' => 'Customer Scalability',
					'feature_desc' => 'Automated responses allow staff to focus on complex tasks, reduce workload and efficiently handle increased patient volumes.',
					'icon_url' => '/media/R1_Customer-Scalability-1.png'
				],
				[
					'feature_title' => 'Lead Qualification',
					'feature_desc' => 'Leverage Kriss.ai by automating the initial stages of lead assessment including budget, urgency, type of service needed and patient prioritization.',
					'icon_url' => '/media/R1_Lead-Qualification-1.png'
				]
			],
			'title_field' => '{{{ feature_title }}}',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$features = [];
		foreach($settings['productFeatures'] as $f) {
			$features[] = [
				'title' => $f['feature_title'],
				'description' => $f['feature_desc'],
				'icon' => [
                    'url' => $f['icon_url'],
                    'filename' => basename($f['icon_url']),
                    'mimeType' => 'image/png'
                ],
				'messages' => [
                    [
                        "role" => "user",
                        "name" => "Lucy Taylor",
                        "type" => "text",
                        "message" => [["children" => [["text" => "My doctor recommended a root canal treatment. What is the recovery process?"]]]],
                    ],
                    [
                        "role" => "krissai",
                        "name" => "Sally Smith",
                        "type" => "text",
                        "message" => [["children" => [["text" => "The recovery process after a root canal treatment typically involves several steps..."]]]],
                    ]
                ]
			];
		}
		$data = [
			'title' => $settings['title'],
			'description' => $settings['description'],
			'productFeatures' => $features,
			'globalType' => 'front-desk',
		];
		Kriss_Data_Collector::get_instance()->set_data('front-desk', $data);
		echo '<div style="display:none;">Front Desk Data Loaded</div>';
	}
}
