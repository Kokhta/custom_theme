<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Kriss_Chat_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return '3-chat';
	}

	public function get_title() {
		return esc_html__( '3-Chat', 'kriss' );
	}

	public function get_icon() {
		return 'eicon-comments';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'kriss' ),
			]
		);

		$this->add_control(
			'chat_avatar',
			[
				'label' => esc_html__( 'Chat Avatar URL', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'https://app.customgpt.ai/storage/chat_bot_avatar/NzRmnPi1k22le9rYYBZlUB0EMlElTbkElUNbO01E.png',
			]
		);

		$this->add_control(
			'iframe_src',
			[
				'label' => esc_html__( 'Iframe Source', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'https://app.customgpt.ai/projects/12370/ask-me-anything/?rs=livechat&embed=1&shareable_slug=247397b42cb45bc0a736b0741a828fdc',
			]
		);

		$this->add_control(
			'primary_color',
			[
				'label' => esc_html__( 'Primary Color', 'kriss' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#41B3A5',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_attributes',
			[
				'label' => esc_html__( 'Attributes & Classes', 'kriss' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'chat_body_id',
			[
				'label' => esc_html__( 'Chat Body ID', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'cgptcb-body',
			]
		);

		$this->add_control(
			'chat_body_class',
			[
				'label' => esc_html__( 'Chat Body Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'cgptcb-body',
			]
		);

		$this->add_control(
			'chat_bubble_class',
			[
				'label' => esc_html__( 'Chat Bubble Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'cgptcb-chat-bubble visible',
			]
		);

		$this->add_control(
			'chat_circle_id',
			[
				'label' => esc_html__( 'Chat Circle ID', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'cgptcb-chat-circle',
			]
		);

		$this->add_control(
			'chat_circle_class',
			[
				'label' => esc_html__( 'Chat Circle Class', 'kriss' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'cgptcb-chat-circle cgptcb-icon-size-small',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="<?php echo esc_attr( $settings['chat_body_id'] ); ?>" class="<?php echo esc_attr( $settings['chat_body_class'] ); ?>" style="--cgptcb-chat-box-width: 100vw; --cgptcb-chat-box-height: 100vh; --chatbot-position-left: auto; --chatbot-position-right: 1rem; --cgptcb-chat-box-border-radius: 12px; --cgptcb-action-button-border-radius: 6px; --chatbot-bg-color: <?php echo esc_attr( $settings['primary_color'] ); ?>; --chatbot-color: #000; --chatbot-toolbar-color: <?php echo esc_attr( $settings['primary_color'] ); ?>; --chatbot-toolbar-button-color: #000000; --chatbot-loader-color: #000; --chatbot-primary-color-rgb: 65, 179, 165; --chatbot-secondary-color-rgb: 65, 179, 165;">
			<div class="<?php echo esc_attr($settings['chat_bubble_class']); ?>">
				<div class="<?php echo esc_attr($settings['chat_circle_class']); ?>" id="<?php echo esc_attr($settings['chat_circle_id']); ?>" style="background-color: transparent;">
					<img alt="Live Chat Button" class="cgptcb-chat-icon" id="chatBubbleImageId" src="<?php echo esc_url( $settings['chat_avatar'] ); ?>" data-elementor-setting-key="chat_avatar">
				</div>
			</div>
			<div class="cgptcb-chat-box-toggle " id="cgptcb-chat-box-toggle" style="display:none;">
				<svg width="24" height="24" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
			</div>
			<div class="cgptcb-chat-box-container" data-chatbottype-window="" id="cgptcb-chat-box-container">
				<div class="cgptcb-chat-box-header cgptcb-toolbar-buttons" id="cgptcb-chat-box-header">
					<button id="cgptcb-chat-box-clear" class="cgptcb-chat-box-action" data-tooltip="Start a new conversation" aria-label="Start a new conversation">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 11A8.1 8.1 0 0 0 4.5 9M4 5v4h4m-4 4a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
						</svg>
					</button>
					<button id="cgptcb-chat-box-close" class="cgptcb-chat-box-action" data-tooltip="Close chat" aria-label="Close chat">
						<svg width="24" height="24" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M18 6l-12 12"></path>
							<path d="M6 6l12 12"></path>
						</svg>
					</button>
				</div>
				<div class="cgptcb-chat-box-iframe">
					<div id="cgptcb-chat-box-iframe-load-indicator" class="cgptcb-chat-box-iframe-load-indicator">
						<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24">
							<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 11A8.1 8.1 0 0 0 4.5 9M4 5v4h4m-4 4a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
						</svg>
					</div>
					<iframe id="cgptcb-chat-box-iframe" height="100%" width="100%" frameborder="0" allow="clipboard-write;" data-src="<?php echo esc_url( $settings['iframe_src'] ); ?>" style="display: none;" aria-label="Livechat Chatbot Iframe" data-elementor-setting-key="iframe_src"></iframe>
				</div>
			</div>
			<div id="cgptcb-overlay" class="cgptcb-overlay"></div>
		</div>
		<?php
	}
}
