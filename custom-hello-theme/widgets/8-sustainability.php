<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Hello_Widget_8 extends \Elementor\Widget_Base {

	public function get_name() { return '8-sustainability'; }
	public function get_title() { return esc_html__( '8. Sustainability', 'custom-hello-theme' ); }
	public function get_icon() { return 'eicon-leaf'; }
	public function get_categories() { return [ 'general' ]; }

	protected function register_controls() {
		$this->start_controls_section( 'content_section', [ 'label' => esc_html__( 'Content', 'custom-hello-theme' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
		$this->add_control( 'tagline', [ 'label' => 'Tagline', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '100% Plant-based' ] );
		$this->add_control( 'pre_title', [ 'label' => 'Pre Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Vegan-friendly' ] );
		$this->add_control( 'title', [ 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'sustainability' ] );
		$this->add_control( 'desc', [ 'label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Pure cork sourced sustainably. Completely vegan - no cows were harmed, but it might be full of "bull"sh*t.' ] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'item_title', [ 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT ] );
		$repeater->add_control( 'item_desc', [ 'label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXTAREA ] );
		$repeater->add_control( 'item_num', [ 'label' => 'Number', 'type' => \Elementor\Controls_Manager::TEXT ] );

		$this->add_control( 'items', [ 'label' => esc_html__( 'Stats Items', 'custom-hello-theme' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'default' => [
			[ 'item_title' => 'Average age of first harvest', 'item_desc' => 'Cork oaks are typically first harvested at around 25 years.', 'item_num' => '25' ],
			[ 'item_title' => 'Harvesting interval', 'item_desc' => 'After each harvest, the bark takes about 9 years to regrow.', 'item_num' => '9' ],
		] ] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="sustainability" class="section" style="visibility: hidden; background-color: transparent; color: rgb(255, 237, 215);">
			<div class="section__inner o-container">
				<div id="sustainability-hero" style="visibility: hidden;">
					<div id="sustainability-hero-inner">
						<div id="sustainability-tagline" class="sub2"><?php echo esc_html($settings['tagline']); ?></div>
						<div id="sustainability-title">
							<h4 id="sustainability-title-pre"><?php echo esc_html($settings['pre_title']); ?></h4>
							<h2 id="sustainability-title-main"><?php echo esc_html($settings['title']); ?></h2>
						</div>
						<div id="sustainability-desc" class="body2" aria-label="<?php echo esc_attr($settings['desc']); ?>"><?php echo esc_html($settings['desc']); ?></div>
					</div>
				</div>
				<div id="sustainability-items" class="o-grid">
					<?php foreach($settings['items'] as $item): ?>
					<div class="sustainability-item">
						<h3 class="sustainability-item-title"><?php echo esc_html($item['item_title']); ?></h3>
						<div class="sustainability-item-desc body2"><?php echo esc_html($item['item_desc']); ?></div>
						<?php if(!empty($item['item_num'])): ?>
							<div class="sustainability-item-num"><?php echo esc_html($item['item_num']); ?></div>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
