<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Vectr_Widget_3_flow extends \Elementor\Widget_Base {

	public function get_name() {
		return '3-flow';
	}

	public function get_title() {
		return esc_html__( '3-flow', 'vectr' );
	}

	public function get_icon() {
		return 'eicon-navigator';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'vectr' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'step_number',
			[
				'label' => esc_html__( 'Step Number', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '01',
			]
		);

		$repeater->add_control(
			'step_title',
			[
				'label' => esc_html__( 'Step Title', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Step Title',
			]
		);

		$repeater->add_control(
			'step_description',
			[
				'label' => esc_html__( 'Step Description', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Step Description',
			]
		);

		$this->add_control(
			'steps',
			[
				'label' => esc_html__( 'Steps', 'vectr' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'step_number' => '01',
						'step_title' => 'Activation, simplified',
						'step_description' => 'One call triggers mobilization.<br> Your requirements: craft, count, and start date route directly to our verified crews. No hand-offs. No escalations. Just boots on the ground in minutes.',
					],
					[
						'step_number' => '02',
						'step_title' => 'Cleared to count',
						'step_description' => 'Our team handles all screening and verification before dispatch. Compliance, background, certifications, and fitness-for-duty — we enforce a zero-fail model to guarantee every worker clears the gate on Day 1.',
					],
					[
						'step_number' => '03',
						'step_title' => 'Proven field match',
						'step_description' => "We don't just provide available workers. We deploy proven crews. By filtering for past performance, role fit, and reliability, we deliver teams engineered for endurance — ensuring your project stays fully manned from first break to completion.",
					],
					[
						'step_number' => '04',
						'step_title' => 'Seamless arrival',
						'step_description' => 'We manage the "last mile" of mobilization. Every crew arrives site-ready with finalized reporting details. With real-time arrival monitoring and active coordination, we ensure your shift starts on time, even when field conditions shift.',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="flow">
			<div class="flow__wrapper">
				<div class="flow__steps">
					<?php
					$count = 1;
					foreach ( $settings['steps'] as $index => $item ) :
						$active_class = ( $index === 0 ) ? 'flow__step--active' : '';
						$visited_class = 'flow__step--visited';
						?>
						<div class="flow__step <?php echo $visited_class; ?> <?php echo $active_class; ?>" data-step="<?php echo esc_attr( $count ); ?>">
							<div class="flow__header">
								<div class="flow__number"><span><?php echo esc_html( $item['step_number'] ); ?></span></div>
								<h3 class="flow__title"><?php echo esc_html( $item['step_title'] ); ?></h3>
							</div>
							<div class="flow__body">
								<div class="flow__body-inner">
									<div class="flow__track">
										<div class="flow__track-bar">
											<div class="flow__track-fill" style="transform: scaleY(1);"></div>
										</div>
									</div>
									<p class="flow__description"><?php echo $item['step_description']; ?></p>
								</div>
							</div>
						</div>
					<?php
						$count++;
					endforeach;
					?>
				</div>
			</div>
		</section>
		<?php
	}
}
