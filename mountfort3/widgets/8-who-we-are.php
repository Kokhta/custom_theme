<?php
namespace Mountfort3\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Who_We_Are_Widget extends Widget_Base {

	public function get_name() {
		return '8-who-we-are';
	}

	public function get_title() {
		return '8. Who We Are';
	}

	public function get_icon() {
		return 'eicon-info-circle';
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
			'title_html',
			array(
				'label'   => 'Title HTML (Splitted)',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<div style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;"><div style="position:relative;display:inline-block;"> <div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">M</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">o</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">n</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">t</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">f</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">o</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">r</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">t</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">i</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">s</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">a</div></div> </div><div style="display: block; text-align: start; position: relative; translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;"><div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">g</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">l</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">o</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">b</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">a</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">l</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">c</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">o</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">m</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">m</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">o</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">d</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">i</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">t</div><div style="position: relative; display: inline-block; color: rgb(129, 160, 187);">y</div></div> </div>',
			)
		);

		$this->add_control(
			'description_html',
			array(
				'label'   => 'Description HTML',
				'type'    => Controls_Manager::WYSIWYG,
				'default' => '<p><div style="display: block; text-align: start; position: relative;">We trade, refine, store, and transport energy and commodities. We also invest in related assets and provide innovative services with integrity and efficiency to create long-term value for our clients.</div></p>',
			)
		);

		$this->add_control(
			'link_text',
			array(
				'label'   => 'Link Text',
				'type'    => Controls_Manager::TEXT,
				'default' => 'Who we are',
			)
		);

		$this->add_control(
			'link_url',
			array(
				'label'   => 'Link URL',
				'type'    => Controls_Manager::URL,
				'default' => array( 'url' => '/who-we-are/' ),
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="astro-va4abrey" data-chapter="WhoWeAre" id="WhoWeAre" data-label="Who we are" data-astro-cid-va4abrey="">
			<div class="grid" data-astro-cid-va4abrey="">
				<h2 data-animation="Title" class="fs-h2 uppercase tb:col-end-4 dk:col-start-10 dk:col-end-23 lg:col-start-14" data-astro-cid-va4abrey="">
					<?php echo $settings['title_html']; ?>
				</h2>
				<div class="text-block dk:col-start-5 dk:col-end-13 lg:col-start-7" data-astro-cid-tbw6esjt="">
					<div class="content fs-s1 montfort-navy-blue" data-astro-cid-tbw6esjt="">
						<div class="content fs-s1 montfort-navy-blue" data-animation="TextBlock" data-astro-cid-tbw6esjt="">
							<?php echo $settings['description_html']; ?>
						</div>
					</div>
					<a href="<?php echo esc_url( $settings['link_url']['url'] ); ?>" class="link-block montfort-navy-blue" data-animation="FadeIn" data-astro-cid-chamlvsj="true" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px); opacity: 1;">
						<div class="arrow-wrapper left" data-astro-cid-chamlvsj="">
							<div class="arrow-container left" data-astro-cid-chamlvsj="">
								<svg data-astro-cid-chamlvsj="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true"><path fill="currentColor" d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path></svg>
							</div>
						</div>
						<span class="link-block-label" data-astro-cid-chamlvsj=""><?php echo esc_html( $settings['link_text'] ); ?></span>
						<div class="arrow-wrapper right" data-astro-cid-chamlvsj="">
							<div class="arrow-container right" data-astro-cid-chamlvsj="">
								<svg data-astro-cid-chamlvsj="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true"><path fill="currentColor" d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path></svg>
							</div>
						</div>
					</a>
				</div>
			</div>
		</section>
		<?php
	}
}
