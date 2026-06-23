<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Global_Connectivity_Widget extends Widget_Base {

	public function get_name() {
		return '10-global-connectivity';
	}

	public function get_title() {
		return '10. Global Connectivity';
	}

	public function get_icon() {
		return 'eicon-map-pin';
	}

	public function get_categories() {
		return array( 'mountfort' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => 'Content',
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => 'Title',
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Established in the world’s major trade hubs and financial markets with over 15 global offices, we connect and serve both emerging and mature markets worldwide.',
			)
		);

		$repeater = new Repeater();
		$repeater->add_control( 'name', array( 'label' => 'Location Name', 'type' => Controls_Manager::TEXT ) );
		$repeater->add_control( 'longitude', array( 'label' => 'Longitude', 'type' => Controls_Manager::TEXT ) );
		$repeater->add_control( 'latitude', array( 'label' => 'Latitude', 'type' => Controls_Manager::TEXT ) );

		$this->add_control(
			'locations',
			array(
				'label'       => 'Map Locations',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array( 'name' => 'Switzerland', 'longitude' => '4', 'latitude' => '46.818188' ),
					array( 'name' => 'United Arab Emirates', 'longitude' => '54.35495', 'latitude' => '24.48818' ),
					array( 'name' => 'Singapore', 'longitude' => '97', 'latitude' => '1.352083' ),
				),
				'title_field' => '{{{ name }}}',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="astro-5vnrzpll" data-chapter="GlobalConnectivity" id="GlobalConnectivity" data-label="Global connectivity" data-theme-chapters="dark" data-cursor="draggable" data-cursor-down="dragging" data-animation="GlobalConnectivity" data-astro-cid-5vnrzpll="">
			<div class="grid" data-astro-cid-5vnrzpll="">
				<h2 class="fs-h2 uppercase montfort-navy-blue-2 tb:col-end-4 dk:col-start-7 dk:col-end-22 lg:col-start-10" data-label="Global connectivity" data-astro-cid-5vnrzpll="" style="color: rgb(255, 255, 255);">
					<?php echo esc_html( $settings['title'] ); ?>
				</h2>
			</div>
			<?php foreach ( $settings['locations'] as $location ) : ?>
				<p class="fs-cta-s uppercase visible" data-point="" data-longitude="<?php echo esc_attr( $location['longitude'] ); ?>" data-latitude="<?php echo esc_attr( $location['latitude'] ); ?>" data-astro-cid-u35nqrgz="" style="opacity: 0;">
					<span data-astro-cid-u35nqrgz=""><?php echo esc_html( $location['name'] ); ?></span>
				</p>
			<?php endforeach; ?>
		</section>
		<?php
	}
}
