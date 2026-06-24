<?php
class Noono_Widget_10_Home_Awards_List extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-home-awards-list';
    }

    public function get_title() {
        return '10. Home Awards List';
    }

    public function get_icon() {
        return 'eicon-bullet-list';
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
            'title',
            [
                'label' => 'Title',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Recognition for innovative work that pushes what's possible in digital design.",
            ]
        );

        $this->add_control(
            'award_categories',
            [
                'label' => 'Award Categories',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'cat_name',
                        'label' => 'Category Name',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'FWA',
                    ],
                    [
                        'name' => 'count',
                        'label' => 'Count (e.g. / 12)',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '/ 12',
                    ],
                    [
                        'name' => 'projects',
                        'label' => 'Projects',
                        'type' => \Elementor\Controls_Manager::REPEATER,
                        'fields' => [
                            [
                                'name' => 'name',
                                'label' => 'Project Name',
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => 'Vibrant Wellness',
                            ],
                            [
                                'name' => 'nomination',
                                'label' => 'Nomination',
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => 'FWA of the day',
                            ],
                            [
                                'name' => 'year',
                                'label' => 'Year',
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => '2026',
                            ],
                        ],
                    ],
                ],
                'default' => [
                    [
                        'cat_name' => 'FWA',
                        'count' => '/ 12',
                    ],
                ],
            ]
        );

        $this->add_control(
            'more_text',
            [
                'label' => 'More Awards Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+ 50 more awards',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="home-awards-list">
            <div class="wrapper">
                <h3 class="font-machina-60" data-elementor-setting-key="title"><?php echo esc_html($settings['title']); ?></h3>
                <div class="items-list">
                    <?php foreach ( $settings['award_categories'] as $cat ) : ?>
                    <div class="item home-a-item">
                        <div class="top-line view-line"></div>
                        <div class="bottom-line view-line"></div>
                        <p class="font-neue-roman-24 name"><?php echo esc_html($cat['cat_name']); ?></p>
                        <p class="count font-neue-roman-14-500"><?php echo esc_html($cat['count']); ?></p>
                        <img class="arrow" alt="arrow" src="/icons/linkArrow.svg">
                        <div class="aw-list">
                            <div class="list-item top-titles">
                                <p class="s-name">Project</p>
                                <p class="s-nomination">Nomination</p>
                                <p class="s-year">Year</p>
                            </div>
                            <?php foreach ( $cat['projects'] as $proj ) : ?>
                            <div class="list-item">
                                <p class="font-neue-roman-24 s-name"><?php echo esc_html($proj['name']); ?><span class="only-mobile"> - <?php echo esc_html($proj['nomination']); ?></span></p>
                                <p class="font-neue-roman-24 s-nomination"><?php echo esc_html($proj['nomination']); ?></p>
                                <p class="font-neue-roman-24 s-year"><?php echo esc_html($proj['year']); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="slide-wrapper">
                        <!-- Awards slides images would go here, maybe static if many -->
                        <?php for($i=1; $i<=19; $i++): ?>
                            <img alt="image" loading="lazy" src="/awardsslides/<?php echo $i; ?>s.png" style="opacity: 0;">
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="more">
                    <p class="" data-elementor-setting-key="more_text"><?php echo esc_html($settings['more_text']); ?></p>
                </div>
            </div>
        </div>
        <?php
    }
}
