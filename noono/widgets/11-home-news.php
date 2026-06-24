<?php
class Noono_Widget_11_Home_News extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-home-news';
    }

    public function get_title() {
        return '11. Home News (Insights)';
    }

    public function get_icon() {
        return 'eicon-post-list';
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
                'label' => 'Section Title',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Our Insights',
            ]
        );

        $this->add_control(
            'news_items',
            [
                'label' => 'News Items',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Designing Vogue Business...',
                    ],
                    [
                        'name' => 'tag',
                        'label' => 'Tag',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Editorial',
                    ],
                    [
                        'name' => 'date',
                        'label' => 'Date',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Jan 8, 2026',
                    ],
                    [
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => \Elementor\Controls_Manager::URL,
                        'default' => [ 'url' => '#' ],
                    ],
                    [
                        'name' => 'image',
                        'label' => 'Cover Image',
                        'type' => \Elementor\Controls_Manager::MEDIA,
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="home-news">
            <div class="wrapper">
                <div class="top">
                    <h4 class="font-machina-120" data-elementor-setting-key="title"><?php echo esc_html($settings['title']); ?></h4>
                    <a href="/insights" class="font-14-dark"><span>View All</span><img alt="news" src="/icons/allNews.svg"></a>
                    <div class="anim-line anim-line-bottom view-line"></div>
                </div>
                <div class="parent">
                    <?php foreach ( $settings['news_items'] as $item ) : ?>
                    <div>
                        <a href="<?php echo esc_url($item['link']['url']); ?>" class="item">
                            <div class="anim-line anim-line-bottom view-line"></div>
                            <div class="cover">
                                <img src="<?php echo esc_url($item['image']['url']); ?>" alt="image" loading="lazy" class="cover-image">
                                <div class="back"><img alt="icon" src="/icons/icon_eye.svg"><span>READ</span></div>
                            </div>
                            <div class="info">
                                <h3 class="font-neue-roman-28"><?php echo esc_html($item['title']); ?></h3>
                                <div class="bottom">
                                    <p class="tag font-neue-roman-16"><?php echo esc_html($item['tag']); ?></p>
                                    <p class="date font-neue-roman-16"><?php echo esc_html($item['date']); ?></p>
                                </div>
                            </div>
                            <div class="hover-icon"><img alt="icon" src="/icons/allNews.svg"></div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
}
