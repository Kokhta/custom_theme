<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Vectr_Widget_6_faq extends \Elementor\Widget_Base {

	public function get_name() {
		return '6-faq';
	}

	public function get_title() {
		return esc_html__( '6-faq', 'vectr' );
	}

	public function get_icon() {
		return 'eicon-accordion';
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
				'default' => 'How we work and how we deliver industrial-grade staffing.',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'question',
			[
				'label' => esc_html__( 'Question', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Question?',
			]
		);

		$repeater->add_control(
			'answer',
			[
				'label' => esc_html__( 'Answer', 'vectr' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Answer.',
			]
		);

		$this->add_control(
			'faqs',
			[
				'label' => esc_html__( 'FAQs', 'vectr' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'question' => 'How fast can crews be mobilized?',
						'answer' => 'We move at the speed of your schedule. Our platform maintains a deep network of verified industrial craft, eliminating the weeks wasted in traditional hiring cycles. One call activates our mobilization engine to source and deploy precision-matched crews in hours, not days, ensuring your most critical paths remain fully manned.',
					],
					[
						'question' => 'How do you handle compliance & background checks?',
						'answer' => 'We use a Zero-Fail Compliance model. Before a worker is even cleared for dispatch, our system automates the verification of background checks, drug testing (FFD), and site-specific certifications including nuclear grade requirements. We block access to the gate for anyone who isn\'t 100% cleared, ensuring your badging office has zero headaches on Day 1.',
					],
					[
						'question' => 'What is the coverage during outages?',
						'answer' => 'We provide 24/7 active coordination to match the 24/7 nature of an outage. Our coverage spans the full range of outage craft: from general laborers and painters to specialized repairs and schedulers. More importantly, we manage the "last mile" of arrival, monitoring deployments in real-time to ensure your night and day shifts remain fully manned, even when field conditions shift.',
					],
					[
						'question' => 'How does Vectr differ from traditional staffing vendors?',
						'answer' => 'Traditional vendors are reactive; Vectr is an operational engine. While legacy agencies rely on manual resumes and \'available\' warm bodies, we use intelligent workflows and expert curation to deliver field-validated precision. We don\'t just find people who are looking for work; we deploy proven crews that are engineered for the high-tempo grind of a critical path environment.',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="faq">
			<div class="faq__container">
				<div class="faq__left">
					<h2 class="faq__title"><?php echo esc_html( $settings['section_title'] ); ?></h2>
				</div>
				<div class="faq_split_bar"></div>
				<div class="faq__right">
					<?php foreach ( $settings['faqs'] as $index => $item ) :
						$open_class = ( $index === 0 ) ? 'faq-item--open' : '';
						$expanded = ( $index === 0 ) ? 'true' : 'false';
						$style = ( $index === 0 ) ? 'style="max-height: 140px;"' : '';
						?>
						<div class="faq-item <?php echo $open_class; ?>">
							<button class="faq-item__header" type="button" aria-expanded="<?php echo $expanded; ?>">
								<span class="faq-item__question"><?php echo esc_html( $item['question'] ); ?></span>
								<span class="faq-item__icon"><img src="/icons/chevron-down.svg" alt="" loading="lazy" decoding="async"></span>
							</button>
							<div class="faq-item__content" <?php echo $style; ?>>
								<p class="faq-item__answer"><?php echo esc_html( $item['answer'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
