<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_10_Setup extends \Elementor\Widget_Base {
	public function get_name() { return '10-setup'; }
	public function get_title() { return esc_html__( '10-Setup', 'kriss' ); }
	public function get_icon() { return 'eicon-settings'; }
	public function get_categories() { return [ 'general' ]; }
	protected function register_controls() {
		$this->start_controls_section('section_content', ['label' => 'Content']);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('title', ['label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('subtitle', ['label' => 'Subtitle', 'type' => \Elementor\Controls_Manager::TEXT]);
		$repeater->add_control('text', ['label' => 'Text', 'type' => \Elementor\Controls_Manager::TEXTAREA]);
		$this->add_control('layout', [
			'label' => 'Setup Steps',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				['title' => 'Questionnaire', 'subtitle' => 'Our team will walk you through the form', 'text' => 'Our team will send a detailed questionnaire to gather information specific to your practice and essential for customization of the bot.'],
				['title' => 'Chatbot Training', 'subtitle' => 'We customize', 'text' => 'Our expert team uses the information provided in the questionnaire to further train the chatbot. This customization ensures that the chatbot is tailored specifically to your business requirements and customer interactions.'],
				['title' => 'Website integration', 'subtitle' => 'We Implement Seamlessly', 'text' => 'Our IT team then collaborates with your IT team to integrate the chatbot seamlessly into your website. This ensures that the chatbot functions smoothly and is easily accessible for visitors.'],
				['title' => 'Ongoing Maintenance', 'subtitle' => 'We constantly refine', 'text' => 'We offer technical support and ongoing maintenance through regular updates, input of the latest medical terminology and performance monitoring to ensure smooth operations. Most importantly we will customize and develop your bot based on ongoing feedback and learnings.'],
			],
			'title_field' => '{{{ title }}}',
		]);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$layout_data = [];
		foreach($settings['layout'] as $item) {
			$layout_data[] = [
				'title' => $item['title'],
				'subtitle' => $item['subtitle'],
				'text' => [['children' => [['text' => $item['text']]]]],
				'blockName' => $item['title'],
				'blockType' => 'setup-content-section'
			];
		}
		$data = [
			'layout' => $layout_data,
			'globalType' => 'setup',
			'introduction' => [['children' => [['text' => "Here’s how to seamlessly integrate Kriss.ai into your ecosystem."]]]]
		];
		Kriss_Data_Collector::get_instance()->set_data('setup', $data);
		echo '<div style="display:none;">Setup Data Loaded</div>';
	}
}
