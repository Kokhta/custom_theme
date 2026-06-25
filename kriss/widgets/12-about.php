<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_12_About extends \Elementor\Widget_Base {
	public function get_name() { return '12-about'; }
	public function get_title() { return '12-About'; }
	public function get_icon() { return 'eicon-info-circle'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section('content', ['label' => 'Content']);
		$this->add_control('intro', ['label' => 'Introduction', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Committed to shaping a healthier tomorrow.']);
		$this->end_controls_section();

        $this->start_controls_section('layout_sec', ['label' => 'Layout Sections']);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT]);
        $repeater->add_control('text', ['label' => 'Text', 'type' => \Elementor\Controls_Manager::TEXTAREA]);
        $this->add_control('layout', [
            'label' => 'Sections',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                ['title' => 'The Vision', 'text' => 'Kriss.ai envisions a future where healthcare is more accessible...'],
                ['title' => 'Ethics & Privacy', 'text' => 'At Kriss.ai, we prioritize the ethical use of AI...'],
            ],
            'title_field' => '{{{ title }}}',
        ]);
        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        $layout = [];
        foreach($settings['layout'] as $item) {
            $layout[] = [
                'title' => $item['title'],
                'blockType' => 'content-section',
                'text' => [['children' => [['text' => $item['text']]]]]
            ];
        }
		$data = [
			'globalType' => 'about',
			'introduction' => [['children' => [['text' => $settings['intro']]]]],
			'layout' => $layout
		];
		Kriss_Data_Collector::get_instance()->set_data('about', $data);
	}
}
