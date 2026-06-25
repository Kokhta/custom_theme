<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_11_Plans extends \Elementor\Widget_Base {
	public function get_name() { return '11-plans'; }
	public function get_title() { return '11-Plans'; }
	public function get_icon() { return 'eicon-price-table'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section('content', ['label' => 'Content']);
		$this->add_control('price', ['label' => 'Price', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '$199']);
		$this->add_control('smallPrint', ['label' => 'Small Print', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '$500 Setup Fee']);
		$this->end_controls_section();

        $this->start_controls_section('features_sec', ['label' => 'Features']);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control('name', ['label' => 'Feature Name', 'type' => \Elementor\Controls_Manager::TEXT]);
        $this->add_control('features', [
            'label' => 'Features',
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                ['name' => '24/7 Availability'],
                ['name' => 'Automated Documentation Generation'],
                ['name' => 'Patient Education'],
                ['name' => 'Expert Clinical Resources'],
                ['name' => 'Supplies and Equipment Support']
            ],
            'title_field' => '{{{ name }}}',
        ]);
        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$data = [
			'globalType' => 'plans',
			'introduction' => [['children' => [['text' => "Kriss.ai can elevate your operations..."]]]],
			'layout' => [
				[
					'price' => $settings['price'],
					'unit' => 'Month',
					'smallPrint' => $settings['smallPrint'],
					'features' => $settings['features'],
					'blockType' => 'pricing-section'
				]
			]
		];
		Kriss_Data_Collector::get_instance()->set_data('plans', $data);
	}
}
