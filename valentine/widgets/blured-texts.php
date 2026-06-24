<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Valentine_Blured_Texts_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'valentine_blured_texts';
	}

	public function get_title() {
		return esc_html__( '2-Blured Texts', 'valentine' );
	}

	public function get_icon() {
		return 'eicon-text-area';
	}

	public function get_categories() {
		return [ 'valentine' ];
	}

	public function get_keywords() {
		return [ 'valentine', 'text', 'blured' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'valentine' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'text_lines',
			[
				'label' => esc_html__( 'Lines', 'valentine' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'line_text',
						'label' => esc_html__( 'Text', 'valentine' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Emperor Claudius II strongly believed single soldiers fought better, so marriage was outlawed in the Ancient Roman Empire', 'valentine' ),
					],
				],
				'default' => [
					[ 'line_text' => 'Emperor Claudius II strongly believed single soldiers fought better, so marriage was outlawed in the Ancient Roman Empire' ],
				],
			]
		);

		$this->add_control(
			'texts',
			[
				'label' => esc_html__( 'Blured Texts Blocks', 'valentine' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text_lines' => [
							[ 'line_text' => 'Emperor Claudius II strongly believed single soldiers fought' ],
							[ 'line_text' => 'better, so marriage was outlawed in the Ancient Roman Empire' ],
						],
					],
					[
						'text_lines' => [
							[ 'line_text' => 'Saint Valentine secretly married couples, in defiance of the' ],
							[ 'line_text' => "emperor's decree." ],
						],
					],
					[
						'text_lines' => [
							[ 'line_text' => 'For his actions he was eventually caught and imprisoned' ],
						],
					],
					[
						'text_lines' => [
							[ 'line_text' => 'While in prison, Valentine fell in love with the jailer’s blind' ],
							[ 'line_text' => 'daughter' ],
						],
					],
					[
						'text_lines' => [
							[ 'line_text' => 'On the eve of his execution he signed his final letter to her,' ],
							[ 'line_text' => '“Your Valentine.”' ],
						],
					],
					[
						'text_lines' => [
							[ 'line_text' => 'Don’t wait until the last moment to tell someone you love them' ],
						],
					],
				],
				'title_field' => 'Block',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="home-blured-texts">
			<div class="wrapper">
				<?php foreach ( $settings['texts'] as $index => $block ) :
					$block_index = $index + 1;
					?>
					<div class="text-<?php echo esc_attr( $block_index ); ?> text">
						<p class="font-fontspring-24-300-black">
							<?php foreach ( $block['text_lines'] as $line_index => $line ) : ?>
								<span style="display: block; text-align: center; position: relative; filter: blur(40px); opacity: 0;" class="line">
									<?php if ( $line_index === 0 ) : ?>
										<span class="top"><span class="left"></span><span class="center"><span class="center-red"></span></span><span class="right"></span></span>
									<?php endif; ?>

									<?php echo esc_html( $line['line_text'] ); ?>

									<?php if ( $line_index === count( $block['text_lines'] ) - 1 ) : ?>
										<span class="bottom"><span class="left"></span><span class="center"><span class="center-red"></span></span><span class="right"></span></span>
									<?php endif; ?>
								</span>
							<?php endforeach; ?>
						</p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}
}
