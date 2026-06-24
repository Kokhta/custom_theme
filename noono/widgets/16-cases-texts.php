<?php
class Noono_Widget_16_Cases_Texts extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-cases-texts';
    }

    public function get_title() {
        return '16. Cases Overlay Texts';
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => 'Content',
            ]
        );

        $this->add_control(
            'cases',
            [
                'label' => 'Cases',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'class',
                        'label' => 'Specific Class (e.g. orcad-text)',
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'year_tag',
                        'label' => 'Year/Category Tag',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Website',
                    ],
                    [
                        'name' => 'tags',
                        'label' => 'Tags (e.g. Immersive / 3D)',
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'name',
                        'label' => 'Project Name',
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                ],
                'default' => [
                    [
                        'class' => 'orcad-text',
                        'year_tag' => 'Website',
                        'tags' => 'Immersive / 3D / Interactive',
                        'name' => 'Noomo Labs',
                        'description' => "Immersive 3D web experience with customizable jellyfish showcasing transformation and motion. Real-time WebGL rendering, interactive storytelling, and experimental design pushing boundaries of what's possible on the web.",
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="cases-texts" style="pointer-events: auto;">
            <?php foreach ( $settings['cases'] as $item ) : ?>
            <div class="item <?php echo esc_attr($item['class']); ?>" style="pointer-events: none;">
                <div class="left">
                    <div class="tags">
                        <span class="year tag font-10-black stag-tag" style="opacity: 0;"><span><?php echo esc_html($item['year_tag']); ?></span></span>
                        <div><span class="tag font-10-black stag-tag" style="opacity: 0;"><?php echo esc_html($item['tags']); ?></span></div>
                    </div>
                </div>
                <div class="center stag-tag" style="opacity: 0;">
                    <div class="view-project-link">
                        <span class="">View project</span><img alt="arrow" class="arrow" src="/icons/smallArrow.svg">
                        <div class="hover-mask"><span class=""> View project </span><img alt="arrow" class="arrow" src="/icons/smallArrowBlack.svg"></div>
                    </div>
                </div>
                <div class="right">
                    <div>
                        <p class="name font-neue-roman-14-bold"><strong class="stag-tag" style="opacity: 0;"><?php echo esc_html($item['name']); ?></strong></p>
                        <p class="desc font-14-dark stag-tag" style="opacity: 0;"><?php echo esc_html($item['description']); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
