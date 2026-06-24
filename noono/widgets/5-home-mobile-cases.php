<?php
class Noono_Widget_5_Home_Mobile_Cases extends \Elementor\Widget_Base {

    public function get_name() {
        return 'noono-home-mobile-cases';
    }

    public function get_title() {
        return '5. Home Mobile Cases';
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
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
                        'name' => 'title_tag',
                        'label' => 'Title Tag',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'immersive',
                    ],
                    [
                        'name' => 'name',
                        'label' => 'Name',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Noomo Labs',
                    ],
                    [
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => 'The Noomo Labs website is an interactive 3D experience...',
                    ],
                    [
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => \Elementor\Controls_Manager::URL,
                        'default' => [
                            'url' => '#',
                        ],
                    ],
                    [
                        'name' => 'image',
                        'label' => 'Glass Image',
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => '/cases/glassT.png',
                        ],
                    ],
                ],
                'default' => [
                    [
                        'title_tag' => 'immersive',
                        'name' => 'Noomo Labs',
                        'description' => "The Noomo Labs website is an interactive 3D experience featuring a customizable jellyfish, showcasing Noomo Agency's innovative experiments in immersive storytelling and cutting-edge web technologies.",
                        'link' => [ 'url' => '/work/noomo-labs-the-jellyfish' ],
                    ],
                    [
                        'title_tag' => 'Interactive',
                        'name' => 'Coinbase and Golden State Warriors',
                        'description' => "An immersive microsite for the Golden State Warriors and Coinbase brought game-day excitement to life, allowing Bay Area fans to mint exclusive NFTs while celebrating the team’s legacy through a mobile-first, golden-themed digital experience.",
                        'link' => [ 'url' => '/work/microsite-golden-state-warriors-and-coinbase-collectible' ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div data-v-7abacc29="" class="home-mobile-cases">
            <div data-v-7abacc29="" class="wrapper">
                <?php foreach ( $settings['cases'] as $index => $item ) : ?>
                <div data-v-7abacc29="" class="case">
                    <div data-v-7abacc29="" class="image-block">
                        <p data-v-7abacc29="" class="title-<?php echo $index; ?> title"><?php echo esc_html($item['title_tag']); ?></p>
                        <img data-v-7abacc29="" class="glass-t glass-t-<?php echo $index; ?>" src="<?php echo esc_url($item['image']['url']); ?>" alt="image">
                    </div>
                    <p data-v-7abacc29="" class="name"><?php echo esc_html($item['name']); ?></p>
                    <p data-v-7abacc29="" class="desc"><?php echo esc_html($item['description']); ?></p>
                    <a data-v-7abacc29="" href="<?php echo esc_url($item['link']['url']); ?>" class="view-project-link">
                        <span class="">View project</span>
                        <img alt="arrow" class="arrow" src="/icons/smallArrow.svg">
                        <div class="hover-mask">
                            <span class=""> View project </span>
                            <img alt="arrow" class="arrow" src="/icons/smallArrowBlack.svg">
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
