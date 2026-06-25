<?php
if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if accessed directly.
}

function kriss_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'kriss_setup' );

function kriss_copy_res_to_root() {
    $theme_res_dir = get_template_directory() . '/res/';
    $wp_root_dir = ABSPATH;

    if ( ! is_dir( $theme_res_dir ) ) {
        return;
    }

    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator( $theme_res_dir, RecursiveDirectoryIterator::SKIP_DOTS ),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ( $files as $file ) {
        $relative_path = str_replace( $theme_res_dir, '', $file->getRealPath() );
        $dest_path = $wp_root_dir . $relative_path;

        if ( $file->isDir() ) {
            if ( ! is_dir( $dest_path ) ) {
                @mkdir( $dest_path, 0755, true );
            }
        } else {
            $dest_dir = dirname( $dest_path );
            if ( ! is_dir( $dest_dir ) ) {
                @mkdir( $dest_dir, 0755, true );
            }
            @copy( $file->getRealPath(), $dest_path );
        }
    }
}
add_action( 'after_switch_theme', 'kriss_copy_res_to_root' );

class Kriss_Data_Collector {
    private static $instance = null;
    private $cms_data = [];

    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function set_data( $key, $data ) {
        $this->cms_data[$key] = $data;
    }

    public function get_all_data() {
        return $this->cms_data;
    }
}

// Elementor Widget Registration
function register_kriss_widgets( $widgets_manager ) {
    $widget_files = glob( get_template_directory() . '/widgets/*.php' );
    foreach ( $widget_files as $file ) {
        require_once( $file );
        $base_name = basename( $file, '.php' );
        // Convert '1-experience' to 'Widget_1_Experience'
        $class_name = 'Widget_' . str_replace( '-', '_', ucwords( $base_name, '-' ) );
        if ( class_exists( $class_name ) ) {
            $widgets_manager->register( new $class_name() );
        }
    }
}
add_action( 'elementor/widgets/register', 'register_kriss_widgets' );
