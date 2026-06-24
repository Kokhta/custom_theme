<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Widget_4_Sustainability extends Widget_Base {

	public function get_name() {
		return '4-sustainability';
	}

	public function get_title() {
		return esc_html__( '4-Sustainability Chapter', 'custom-hello-theme' );
	}

	public function get_icon() {
		return 'eicon-leaf';
	}

	public function get_categories() {
		return [ 'custom-hello-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'framework_section',
			[
				'label' => esc_html__( 'Ethics Framework', 'custom-hello-theme' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'intro_text', [ 'type' => Controls_Manager::TEXTAREA, 'label' => 'Intro Text', 'default' => 'We are committed to integrating our sustainability strategy with our pursuit of value — powering lives and respecting nature. We recognize the profound and lasting impact our decisions have on people, communities, and the environment.' ] );
        $this->add_control( 'framework_title', [ 'type' => Controls_Manager::TEXT, 'label' => 'Framework Title', 'default' => 'Our ethics and compliance framework' ] );
        $this->add_control( 'framework_desc', [ 'type' => Controls_Manager::TEXTAREA, 'label' => 'Description', 'default' => 'At Montfort, we operate under an integrated Sustainability Framework and adhere to strict corporate governance principles that allow us drive transformative social and environmental progress.' ] );

        $repeater = new Repeater();
        $repeater->add_control( 'paragraph', [ 'type' => Controls_Manager::TEXTAREA, 'label' => 'Paragraph' ] );
        $this->add_control( 'framework_paragraphs', [
            'label' => 'Paragraphs',
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [ 'paragraph' => 'We ensure compliance with all applicable laws and regulations across our global operations, including those of the UN, EU, Switzerland, UK, US, Singapore, and the UAE.' ],
                [ 'paragraph' => 'Prior to engaging with any counterparty, a thorough and rigorous external onboarding process is conducted for all our trade counterparties and vessels we employ.' ],
                [ 'paragraph' => 'Any products purchased, sold, or shipped by Montfort are in full compliance with all applicable laws and regulations, including those related to trade, sanctions, and anti-bribery & corruption (ABAC).' ],
                [ 'paragraph' => 'Using renowned global compliance platforms, we analyze the counterparty, their corporate structure, and their UBO.' ],
                [ 'paragraph' => 'Our processes are thoroughly in line with the leading standards and best practices of international companies.' ],
                [ 'paragraph' => 'We use our internally developed, digitized platform to onboard the counterparties. Our goal is to deliver products responsibly and reliably, upholding international standards and prioritizing health, safety, environmental, and social considerations in all our activities.' ],
            ],
            'title_field' => '{{{ paragraph }}}',
        ] );

		$this->end_controls_section();

        $this->start_controls_section(
			'solutions_section',
			[
				'label' => esc_html__( 'Solutions', 'custom-hello-theme' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control( 'solutions_title', [ 'type' => Controls_Manager::TEXT, 'label' => 'Title', 'default' => 'DELIVERING SUSTAINABLE ENERGY SOLUTIONS' ] );
        $this->add_control( 'solutions_desc', [ 'type' => Controls_Manager::TEXTAREA, 'label' => 'Description', 'default' => 'We are dedicated to fostering a future where energy is both sustainable and accessible. Our strategy includes innovative practices to reduce environmental impact and promote renewable energy sources. By connecting people, ingenuity, and resources with a shared vision of value and prosperity, we aim to create a resilient energy ecosystem. This includes optimizing supply chains, investing in clean energy projects, and adhering to high environmental standards. Through these efforts, we drive sustainable growth and positively impact the global energy landscape.' ] );
        $this->add_control( 'solutions_intro', [ 'type' => Controls_Manager::TEXTAREA, 'label' => 'Solutions Intro', 'default' => 'Reducing our impact on the environment is paramount to our business. Our environmental policies and culture focus on:' ] );

        $sol_repeater = new Repeater();
        $sol_repeater->add_control( 'text', [ 'type' => Controls_Manager::TEXT, 'label' => 'Item Text' ] );
        $sol_repeater->add_control( 'svg', [ 'type' => Controls_Manager::RAW_HTML, 'label' => 'SVG Code' ] );

        $this->add_control( 'solutions_items', [
            'label' => 'Solutions Items',
            'type' => Controls_Manager::REPEATER,
            'fields' => $sol_repeater->get_controls(),
            'default' => [
                [ 'text' => 'Clean Energy' ],
                [ 'text' => 'Reduced Resource Usage' ],
                [ 'text' => 'Climate Change' ],
                [ 'text' => 'Carbon Emissions' ],
                [ 'text' => 'Carbon Reduction/Offsets' ],
            ],
            'title_field' => '{{{ text }}}',
        ] );

        $this->end_controls_section();

        $this->start_controls_section(
			'equality_section',
			[
				'label' => esc_html__( 'Equality', 'custom-hello-theme' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control( 'equality_title', [ 'type' => Controls_Manager::TEXT, 'label' => 'Title', 'default' => 'OUR COMMITMENT TO EQUALITY' ] );
        $this->add_control( 'equality_desc1', [ 'type' => Controls_Manager::TEXTAREA, 'label' => 'Desc 1', 'default' => 'We strive to create an environment where everyone can thrive and contribute to our success.' ] );
        $this->add_control( 'equality_desc2', [ 'type' => Controls_Manager::TEXTAREA, 'label' => 'Desc 2', 'default' => 'We are proud that our staff come from almost 27 nationalities across five continents. We are committed to equality, with over 35% of our global team being female. We are proud to share that over 22% of our management team are women, reflecting our dedication to empowering women in leadership.' ] );

        $this->end_controls_section();

        $this->start_controls_section(
			'csr_section',
			[
				'label' => esc_html__( 'CSR', 'custom-hello-theme' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control( 'csr_title', [ 'type' => Controls_Manager::TEXT, 'label' => 'CSR Title', 'default' => 'OUR PLEDGE TO CORPORATE SOCIAL RESPONSIBILITY' ] );
        $this->add_control( 'csr_desc', [ 'type' => Controls_Manager::TEXTAREA, 'label' => 'CSR Description', 'default' => 'Giving back to our communities is an imperative part of the work we do. Montfort Group’s CSR efforts are centered around three pillars: supporting education, alleviating poverty, and empowering women.' ] );
        $this->add_control( 'slide_title', [ 'type' => Controls_Manager::TEXT, 'label' => 'Slide Title', 'default' => 'Alleviating Poverty' ] );
        $this->add_control( 'slide_body', [ 'type' => Controls_Manager::TEXTAREA, 'label' => 'Slide Body', 'default' => 'With the help of local NGOs, we support the communities where we invest. Montfort has successfully financed clean water projects, initiatives for orphaned children, earthquake relief, food distribution, and medical support for those in need.' ] );

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <div data-chapter="Sustainability" id="Sustainability" data-label="Sustainability" data-theme-chapters="dark">
            <!-- FRAMEWORK -->
            <section class="grid section-sustainability" data-astro-cid-arf6gcv7>
				<p class="fs-h5 white dk:col-start-3 dk:col-end-14 lg:col-start-7 lg:col-end-14" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-arf6gcv7 data-elementor-setting-key="intro_text">
					<?php echo esc_html( $settings['intro_text'] ); ?>
				</p>
                <div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs> 1 </div>
				<div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs></div>
				<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs data-elementor-setting-key="framework_title"> <?php echo esc_html($settings['framework_title']); ?> </h2>
                <p class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-animation="FadeIn" data-animation-color="#ffffff" data-astro-cid-arf6gcv7 data-elementor-setting-key="framework_desc"> <?php echo esc_html($settings['framework_desc']); ?> </p>
                <div class="paragraphs-container dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-astro-cid-arf6gcv7>
					<?php foreach ( $settings['framework_paragraphs'] as $index => $item ) :
                        $key = $this->get_repeater_setting_key( 'paragraph', 'framework_paragraphs', $index );
                    ?>
                        <p class="fs-body white" data-animation="FadeIn" data-animation-color="#ffffff" data-astro-cid-arf6gcv7 <?php echo $this->get_render_attribute_string($key); ?>>
                            <?php echo esc_html( $item['paragraph'] ); ?>
                        </p>
                    <?php endforeach; ?>
				</div>
            </section>

            <!-- SOLUTIONS -->
            <section class="section-solutions" data-chapter data-astro-cid-odekpglu>
                <div class="grid" data-astro-cid-odekpglu>
				    <div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs> 2 </div>
                    <div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs></div>
                    <h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs data-elementor-setting-key="solutions_title"> <?php echo esc_html($settings['solutions_title']); ?> </h2>
                </div>
                <div class="grid-no-margin" data-astro-cid-odekpglu>
                    <div class="description fs-s1 white dk:col-start-4 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-astro-cid-odekpglu>
                        <div class="read-more expandable" data-animation="ReadMore" data-line-count="7" data-no-margin="true" data-astro-cid-mer3b7za style="--line-count: 7;">
                            <div class="content-wrapper" data-astro-cid-mer3b7za style="--line-count: 7;">
                                <div data-astro-cid-mer3b7za style="--line-count: 7;">
                                    <div class="content" data-astro-cid-mer3b7za style="--line-count: 7;">
                                        <div class="inner clamp fs-body white" data-astro-cid-mer3b7za style="--line-count: 7;" data-elementor-setting-key="solutions_desc">
                                            <p data-astro-cid-odekpglu><?php echo esc_html($settings['solutions_desc']); ?></p>
                                        </div>
                                    </div>
                                    <button class="read-more-button grey" data-animation="FadeIn" aria-label="Expand text button" data-astro-cid-pgfm4fb2> <div class="arrow" aria-hidden="true" data-astro-cid-pgfm4fb2></div> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="solutions-container dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-astro-cid-odekpglu>
                        <div class="navigation-container" data-astro-cid-odekpglu>
                            <button class="navigation-item fs-label white" data-astro-cid-odekpglu>Environmental</button><button class="navigation-item fs-label white" data-astro-cid-odekpglu>Social</button><button class="navigation-item fs-label white" data-astro-cid-odekpglu>Governance</button>
                        </div>
                        <div class="content-container" id="solutions-content" data-astro-cid-odekpglu>
                            <div class="content-item active" data-astro-cid-odekpglu>
                                <p class="fs-body white" data-animation="SplitBlock" data-astro-cid-odekpglu data-elementor-setting-key="solutions_intro"> <?php echo esc_html($settings['solutions_intro']); ?> </p>
                                <div class="items-container" data-astro-cid-odekpglu>
                                    <?php foreach ( $settings['solutions_items'] as $index => $item ) :
                                        $key = $this->get_repeater_setting_key( 'text', 'solutions_items', $index );
                                    ?>
                                        <div class="item-container" data-animation="FadeIn" data-astro-cid-odekpglu>
                                            <div class="image-container" data-astro-cid-odekpglu>
                                                <?php if(!empty($item['svg'])) : echo $item['svg']; else: ?>
                                                <svg data-astro-cid-uvauvyym="true" xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="none" viewBox="0 0 80 80" focusable="false" aria-hidden="true"><g opacity=".8"><path stroke="#fff" d="M50.302 28.522h.002c.637.143.867.487.867.83 0 .553.07 1.071.141 1.606l.028.207c.081.615.16 1.297.16 2.18 0 1.803-.162 3.77-.485 5.568-.33 1.84-.652 3.62-1.288 5.229-.647 1.637-1.44 3.063-2.357 3.991-1.122 1.136-2.372 2.075-3.749 2.54-1.459.492-2.714.805-4.114.805-1.442 0-2.843-.162-4.233-.788-1.436-.645-2.688-1.441-3.617-2.377-.958-1.133-1.743-2.25-2.371-3.676-.477-1.29-.786-2.557-.786-3.972 0-1.421.312-2.854.786-4.137.636-1.445 1.424-2.719 2.686-3.996.928-.939 2.18-1.737 3.777-2.383 1.582-.64 3.332-.966 5.302-1.298 1.806-.166 3.585-.33 5.36-.33h3.891Z"/><path fill="#fff" d="M39.765 41.246a.5.5 0 1 0-.625-.78zm-7.236 7.972c-.001.006.026-.08.156-.295.115-.192.281-.439.494-.73a34 34 0 0 1 1.714-2.134c1.397-1.617 3.193-3.47 4.871-4.813l-.624-.78c-1.744 1.394-3.584 3.297-5.004 4.94a35 35 0 0 0-1.766 2.198 12 12 0 0 0-.542.803c-.122.202-.246.432-.282.627z"/></g></svg>
                                                <?php endif; ?>
                                            </div>
                                            <p class="fs-body-s white" data-astro-cid-odekpglu <?php echo $this->get_render_attribute_string($key); ?>><?php echo esc_html($item['text']); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- EQUALITY -->
            <section data-chapter="Equality" id="Equality" data-label="Equality" class="section-equality grid" data-astro-cid-rvf7guv4>
                <div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs> 3 </div>
                <div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs></div>
                <h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs data-elementor-setting-key="equality_title"> <?php echo esc_html($settings['equality_title']); ?> </h2>
                <div class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-rvf7guv4 data-elementor-setting-key="equality_desc1"> <?php echo esc_html($settings['equality_desc1']); ?> </div>
                <div class="second-description fs-body white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-rvf7guv4 data-elementor-setting-key="equality_desc2"> <?php echo esc_html($settings['equality_desc2']); ?> </div>
            </section>

            <!-- CSR -->
            <section class="section-social" data-astro-cid-232lwzcd>
				<div class="grid" data-astro-cid-232lwzcd>
					<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9" data-animation="FadeIn" data-astro-cid-x4brxzjs> 4 </div>
                    <div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line" data-astro-cid-x4brxzjs></div>
					<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title" data-animation-color="#ffffff" data-astro-cid-x4brxzjs data-elementor-setting-key="csr_title"><?php echo esc_html($settings['csr_title']); ?></h2>
                    <p class="description fs-s1 white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-232lwzcd data-elementor-setting-key="csr_desc"> <?php echo esc_html($settings['csr_desc']); ?> </p>
				</div>
                <div class="grid-no-margin dk:grid" data-astro-cid-232lwzcd>
                    <div class="images-container dk:col-start-7 dk:col-end-22 lg:col-start-9 lg:col-end-22" data-animation="ImagesContainer" data-astro-cid-232lwzcd>
                        <div class="slide" data-astro-cid-232lwzcd>
                            <div class="image-container" data-astro-cid-232lwzcd>
                                <img src="/_astro/m_Lob0Q.png" alt="Slide" width="682" height="392" loading="lazy">
                            </div>
                        </div>
                    </div>
                    <div class="content-social-dk dk:col-start-11 dk:col-end-22 lg:col-start-13 lg:col-end-22" id="content-social-dk" data-astro-cid-232lwzcd>
                        <div class="content-social-item active" data-astro-cid-232lwzcd>
                            <h3 class="label fs-label white" data-animation="FadeIn" data-astro-cid-232lwzcd data-elementor-setting-key="slide_title"> <?php echo esc_html($settings['slide_title']); ?> </h3>
                            <p class="body fs-body white" data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-232lwzcd data-elementor-setting-key="slide_body"> <?php echo esc_html($settings['slide_body']); ?> </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
		<?php
	}
}
