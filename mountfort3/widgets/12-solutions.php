<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Solutions_Widget extends Widget_Base {

	public function get_name() {
		return '12-solutions';
	}

	public function get_title() {
		return '12. Solutions';
	}

	public function get_icon() {
		return 'eicon-tabs';
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
			'index_num',
			array(
				'label'   => 'Index Number',
				'type'    => Controls_Manager::TEXT,
				'default' => '2',
			)
		);

		$this->add_control(
			'title_html',
			array(
				'label'   => 'Title HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div style="display: block; text-align: start; position: relative;">DELIVERING SUSTAINABLE ENERGY SOLUTIONS</div>',
			)
		);

		$this->add_control(
			'desc_html',
			array(
				'label'   => 'Description HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<p>We are dedicated to fostering a future where energy is both sustainable and accessible.</p>',
			)
		);

		// Environmental Tab
		$this->add_control( 'env_title', array( 'label' => 'Environmental Title', 'type' => Controls_Manager::TEXT, 'default' => 'Environmental', 'separator' => 'before' ) );
		$this->add_control( 'env_desc', array( 'label' => 'Environmental Description', 'type' => Controls_Manager::WYSIWYG ) );
		$env_repeater = new Repeater();
		$env_repeater->add_control( 'item_icon', array( 'label' => 'Item Icon SVG', 'type' => Controls_Manager::TEXTAREA ) );
		$env_repeater->add_control( 'item_label', array( 'label' => 'Item Label', 'type' => Controls_Manager::TEXT ) );
		$this->add_control( 'env_items', array( 'label' => 'Environmental Items', 'type' => Controls_Manager::REPEATER, 'fields' => $env_repeater->get_controls(), 'title_field' => '{{{ item_label }}}' ) );

		// Social Tab
		$this->add_control( 'soc_title', array( 'label' => 'Social Title', 'type' => Controls_Manager::TEXT, 'default' => 'Social', 'separator' => 'before' ) );
		$this->add_control( 'soc_desc', array( 'label' => 'Social Description', 'type' => Controls_Manager::WYSIWYG ) );
		$soc_repeater = new Repeater();
		$soc_repeater->add_control( 'item_icon', array( 'label' => 'Item Icon SVG', 'type' => Controls_Manager::TEXTAREA ) );
		$soc_repeater->add_control( 'item_label', array( 'label' => 'Item Label', 'type' => Controls_Manager::TEXT ) );
		$this->add_control( 'soc_items', array( 'label' => 'Social Items', 'type' => Controls_Manager::REPEATER, 'fields' => $soc_repeater->get_controls(), 'title_field' => '{{{ item_label }}}' ) );

		// Governance Tab
		$this->add_control( 'gov_title', array( 'label' => 'Governance Title', 'type' => Controls_Manager::TEXT, 'default' => 'Governance', 'separator' => 'before' ) );
		$this->add_control( 'gov_desc', array( 'label' => 'Governance Description', 'type' => Controls_Manager::WYSIWYG ) );
		$gov_repeater = new Repeater();
		$gov_repeater->add_control( 'item_icon', array( 'label' => 'Item Icon SVG', 'type' => Controls_Manager::TEXTAREA ) );
		$gov_repeater->add_control( 'item_label', array( 'label' => 'Item Label', 'type' => Controls_Manager::TEXT ) );
		$this->add_control( 'gov_items', array( 'label' => 'Governance Items', 'type' => Controls_Manager::REPEATER, 'fields' => $gov_repeater->get_controls(), 'title_field' => '{{{ item_label }}}' ) );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$tabs = array(
			array( 'title' => $settings['env_title'], 'desc' => $settings['env_desc'], 'items' => $settings['env_items'] ),
			array( 'title' => $settings['soc_title'], 'desc' => $settings['soc_desc'], 'items' => $settings['soc_items'] ),
			array( 'title' => $settings['gov_title'], 'desc' => $settings['gov_desc'], 'items' => $settings['gov_items'] ),
		);
		?>
		<section class="section-solutions" data-chapter="" data-astro-cid-odekpglu="" style="--overflow: 20px;">
			<div class="grid" data-astro-cid-odekpglu="">
				<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
					<?php echo esc_html( $settings['index_num'] ); ?>
				</div>
				<div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs=""></div>
				<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs="">
					<?php echo $settings['title_html']; ?>
				</h2>
			</div>
			<div class="grid-no-margin" data-astro-cid-odekpglu="">
				<div class="description fs-s1 white dk:col-start-4 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-astro-cid-odekpglu="">
					<div class="read-more expandable" data-animation="ReadMore" data-line-count="7" data-no-margin="true" data-astro-cid-mer3b7za="" style="--line-count: 7; translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
						<div class="content-wrapper" data-astro-cid-mer3b7za="" style="--line-count: 7;">
							<div data-astro-cid-mer3b7za="" style="--line-count: 7;">
								<div class="content" data-astro-cid-mer3b7za="">
									<div class="inner clamp fs-body white" data-astro-cid-mer3b7za="" style="--line-count: 7;">
										<?php echo $settings['desc_html']; ?>
									</div>
								</div>
								<button class="read-more-button grey" data-animation="FadeIn" aria-label="Expand text button" data-astro-cid-pgfm4fb2="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
									<div class="arrow" aria-hidden="true" data-astro-cid-pgfm4fb2=""></div>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="solutions-container dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-astro-cid-odekpglu="">
					<div class="navigation-container" data-astro-cid-odekpglu="">
						<?php foreach ( $tabs as $index => $tab ) : ?>
							<button class="navigation-item fs-label white <?php echo $index === 0 ? 'active' : ''; ?>" data-astro-cid-odekpglu=""><?php echo esc_html( $tab['title'] ); ?></button>
						<?php endforeach; ?>
					</div>
					<div class="content-container" id="solutions-content" data-astro-cid-odekpglu="" style="height: 1038px;">
						<?php foreach ( $tabs as $index => $tab ) : ?>
							<div class="content-item <?php echo $index === 0 ? 'active' : ''; ?>" data-astro-cid-odekpglu="" style="<?php echo $index === 0 ? 'opacity: 1; pointer-events: auto;' : 'opacity: 0; pointer-events: none;'; ?>">
								<p class="fs-body white" data-animation="SplitBlock" data-astro-cid-odekpglu="">
									<?php echo $tab['desc']; ?>
								</p>
								<div class="items-container" data-astro-cid-odekpglu="">
									<?php if ( ! empty( $tab['items'] ) ) : foreach ( $tab['items'] as $item ) : ?>
										<div class="item-container" data-animation="FadeIn" data-astro-cid-odekpglu="" style="opacity: 1;">
											<div class="image-container" data-astro-cid-odekpglu="">
												<?php echo $item['item_icon']; ?>
											</div>
											<p class="fs-body-s white" data-astro-cid-odekpglu=""><?php echo esc_html( $item['item_label'] ); ?></p>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
