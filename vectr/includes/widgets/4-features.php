<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Vectr_Widget_4_features extends \Elementor\Widget_Base {

	public function get_name() {
		return '4-features';
	}

	public function get_title() {
		return esc_html__( '4-features', 'vectr' );
	}

	public function get_icon() {
		return 'eicon-grid';
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

		$this->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Section Title', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => ' Designed for today\'s operations,<br class="pc"> beyond legacy staffing workflows. ',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'feature_icon',
			[
				'label' => esc_html__( 'Feature Icon URL', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '/icons/features/rapid-activation.svg',
			]
		);

		$repeater->add_control(
			'feature_title',
			[
				'label' => esc_html__( 'Feature Title', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Feature Title',
			]
		);

		$repeater->add_control(
			'feature_description',
			[
				'label' => esc_html__( 'Feature Description', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Feature Description',
			]
		);

		$this->add_control(
			'features',
			[
				'label' => esc_html__( 'Features', 'vectr' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'feature_icon' => '/icons/features/rapid-activation.svg',
						'feature_title' => 'Rapid Activation',
						'feature_description' => 'We believe speed is a skill. Our platform uses machine learning to turn staffing into instant logistics, deploying a precisely matched workforce the moment demand strikes.',
					],
					[
						'feature_icon' => '/icons/features/rigorous-selection.svg',
						'feature_title' => 'Rigorous Selection',
						'feature_description' => 'Geography is a core metric. Our engine uses AI to find and contact qualified talent within defined radii, securing top local contractors first, filtered for cost and skill.',
					],
					[
						'feature_icon' => '/icons/features/verified.svg',
						'feature_title' => '100% Verified Before Arrival',
						'feature_description' => 'We use a Zero-Trust verification model with secure API integrations to run automated background checks and drug testing, blocking dispatch access until fully cleared.',
					],
					[
						'feature_icon' => '/icons/features/controlled-outcomes.svg',
						'feature_title' => 'Controlled Outcomes',
						'feature_description' => 'We guarantee controlled outcomes by managing staffing\'s biggest variables—cost and compliance—prioritizing local mobilization and automating safety for every dispatch.',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="features">
			<div class="features__sticky">
				<h2 class="features__title"><?php echo $settings['section_title']; ?></h2>
				<div class="features__grid">
					<?php foreach ( $settings['features'] as $item ) : ?>
						<article class="feature-item">
							<div class="feature-item__content" style="translate: none; rotate: none; scale: none; transform: translate(0px); opacity: 1;">
								<div class="feature-item__icon">
									<img src="<?php echo esc_url( $item['feature_icon'] ); ?>" alt="<?php echo esc_attr( $item['feature_title'] ); ?> icon" loading="lazy" decoding="async" width="96" height="96">
								</div>
								<div class="feature-item__text">
									<h3 class="feature-item__title"><?php echo esc_html( $item['feature_title'] ); ?></h3>
									<p class="feature-item__description"><?php echo esc_html( $item['feature_description'] ); ?></p>
								</div>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
