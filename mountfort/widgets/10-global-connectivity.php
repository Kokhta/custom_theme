<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MountFort_Widget_10_Global_Connectivity extends \Elementor\Widget_Base {

	public function get_name() {
		return 'mountfort_global_connectivity';
	}

	public function get_title() {
		return esc_html__( '10-Global Connectivity', 'mountfort' );
	}

	public function get_icon() {
		return 'eicon-globe';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'mountfort' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Established in the world’s major trade hubs and financial markets with over 15 global offices, we connect and serve both emerging and mature markets worldwide.',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'city', [ 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'longitude', [ 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'latitude', [ 'type' => \Elementor\Controls_Manager::TEXT ] );

		$this->add_control(
			'points',
			[
				'label' => esc_html__( 'Connection Points', 'mountfort' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'city' => 'Switzerland', 'longitude' => '4', 'latitude' => '46.818188' ],
					[ 'city' => 'Istanbul', 'longitude' => '24', 'latitude' => '41.00824' ],
					[ 'city' => 'United Arab Emirates', 'longitude' => '54.35495', 'latitude' => '24.48818' ],
					[ 'city' => 'Nairobi', 'longitude' => '36.828842', 'latitude' => '-1.3026148' ],
					[ 'city' => 'Dar es Salam', 'longitude' => '39.2803583', 'latitude' => '-6.8160837' ],
					[ 'city' => 'Cape Town', 'longitude' => '18.4172197', 'latitude' => '-33.9288301' ],
					[ 'city' => 'Mumbai', 'longitude' => '72.8281049', 'latitude' => '18.9733536' ],
					[ 'city' => 'Karachi', 'longitude' => '67.0207055', 'latitude' => '24.8546842' ],
					[ 'city' => 'Maputo', 'longitude' => '32.56745', 'latitude' => '-25.966213' ],
					[ 'city' => 'Luxembourg', 'longitude' => '6.1296751', 'latitude' => '49.8158683' ],
					[ 'city' => 'Xiamen', 'longitude' => '118.0853479', 'latitude' => '24.4801069' ],
					[ 'city' => 'Singapore', 'longitude' => '97', 'latitude' => '1.352083' ],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="astro-5vnrzpll" data-chapter="GlobalConnectivity" id="GlobalConnectivity" data-label="Global connectivity" data-theme-chapters="dark" data-cursor="draggable" data-cursor-down="dragging" data-animation="GlobalConnectivity" data-astro-cid-5vnrzpll="">
			<div class="grid" data-astro-cid-5vnrzpll="">
				<h2 class="fs-h2 uppercase montfort-navy-blue-2 tb:col-end-4 dk:col-start-7 dk:col-end-22 lg:col-start-10" data-label="Global connectivity" data-astro-cid-5vnrzpll="" style="color: rgb(255, 255, 255);">
					<?php echo esc_html($settings['title']); ?>
				</h2>
			</div>
			<?php foreach ( $settings['points'] as $point ) : ?>
				<p class="fs-cta-s uppercase" data-point="" data-longitude="<?php echo esc_attr($point['longitude']); ?>" data-latitude="<?php echo esc_attr($point['latitude']); ?>" data-astro-cid-u35nqrgz="" style="opacity: 0;">
					<span data-astro-cid-u35nqrgz=""><?php echo esc_html($point['city']); ?></span>
				</p>
			<?php endforeach; ?>
		</section>
		<?php
	}
}
