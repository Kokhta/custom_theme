<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_6_Doctors_Office extends \Elementor\Widget_Base {
	public function get_name() { return '6-doctors-office'; }
	public function get_title() { return '6-Doctors Office'; }
	public function get_icon() { return 'eicon-user-circle-o'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section('content', ['label' => 'Content']);
		$this->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Doctors Office']);
		$this->add_control('description', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Kriss AI offers enhanced data collection...']);
		$this->end_controls_section();

		$this->start_controls_section('features', ['label' => 'Features']);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('f_title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('f_desc', ['label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA]);
		$repeater->add_control('f_icon', ['label' => 'Icon URL', 'type' => \Elementor\Controls_Manager::TEXT]);

        $msg_repeater = new \Elementor\Repeater();
        $msg_repeater->add_control('role', ['label' => 'Role', 'type' => \Elementor\Controls_Manager::SELECT, 'options' => ['user'=>'User', 'krissai'=>'KrissAI'], 'default' => 'user']);
        $msg_repeater->add_control('name', ['label' => 'Name', 'type' => \Elementor\Controls_Manager::TEXT]);
        $msg_repeater->add_control('text', ['label' => 'Message Text', 'type' => \Elementor\Controls_Manager::TEXTAREA]);

        $repeater->add_control('messages', [
            'label' => 'Messages',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $msg_repeater->get_controls(),
        ]);

		$this->add_control('productFeatures', [
			'label' => 'Features',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				[
                    'f_title' => 'Accurate Customer Insights',
                    'f_desc' => 'Gain insights into common patient concerns...',
                    'f_icon' => '/media/R4_Accurate-Customer-Insights-1.png',
                    'messages' => [
                        ['role'=>'user', 'name'=>'Esther Wilkins', 'text'=>'What are the most common patient concerns?'],
                        ['role'=>'krissai', 'name'=>'Sally Smith', 'text'=>'Patients often have a variety of concerns...']
                    ]
                ],
			],
			'title_field' => '{{{ f_title }}}',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$features = [];
		foreach($settings['productFeatures'] as $f) {
            $msgs = [];
            if (!empty($f['messages'])) {
                foreach($f['messages'] as $m) {
                    $msgs[] = [
                        'role' => $m['role'],
                        'name' => $m['name'],
                        'type' => 'text',
                        'message' => [['children' => [['text' => $m['text']]]]]
                    ];
                }
            }
			$features[] = [
				'title' => $f['f_title'],
				'description' => $f['f_desc'],
				'icon' => ['url' => $f['f_icon']],
				'messages' => $msgs
			];
		}
		$data = [
			'title' => $settings['title'],
			'description' => $settings['description'],
			'productFeatures' => $features,
			'globalType' => 'doctors-office'
		];
		Kriss_Data_Collector::get_instance()->set_data('doctors-office', $data);
	}
}
