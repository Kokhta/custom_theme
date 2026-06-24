<?php
/**
 * Custom Hello Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// 1. Theme Support
function custom_hello_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'custom_hello_theme_setup' );

// 2. Resource Enqueueing
function custom_hello_theme_scripts() {
    // Styles and scripts are hardcoded in header/footer to match requirements exactly
}
add_action( 'wp_enqueue_scripts', 'custom_hello_theme_scripts' );

// 3. Activation Hook - Copy res/ to WP Root with Safety
function custom_hello_theme_activation() {
	$res_dir = get_template_directory() . '/res/';
	$wp_root = ABSPATH;

	if ( is_dir( $res_dir ) ) {
		custom_hello_theme_copy_dir( $res_dir, $wp_root );
	}
}
add_action( 'after_switch_theme', 'custom_hello_theme_activation' );

function custom_hello_theme_copy_dir( $src, $dst ) {
    $blocked_files = [ 'wp-config.php', '.htaccess', 'index.php', 'wp-settings.php' ];
	$dir = opendir( $src );
	@mkdir( $dst );
	while ( false !== ( $file = readdir( $dir ) ) ) {
		if ( ( $file != '.' ) && ( $file != '..' ) ) {
            if ( in_array( $file, $blocked_files ) ) continue;
			if ( is_dir( $src . '/' . $file ) ) {
				custom_hello_theme_copy_dir( $src . '/' . $file, $dst . '/' . $file );
			} else {
				copy( $src . '/' . $file, $dst . '/' . $file );
			}
		}
	}
	closedir( $dir );
}

// 4. Register Elementor Widgets
function register_custom_widgets( $widgets_manager ) {
	$widget_files = glob( get_template_directory() . '/widgets/*.php' );
	foreach ( $widget_files as $file ) {
		require_once( $file );
		$base_name = basename( $file, '.php' );
        $class_name_part = str_replace( ' ', '_', ucwords( str_replace( '-', ' ', $base_name ) ) );
		$class_name = 'Elementor\Custom_Widget_' . $class_name_part;
		if ( class_exists( $class_name ) ) {
			$widgets_manager->register( new $class_name() );
		}
	}
}
add_action( 'elementor/widgets/register', 'register_custom_widgets' );

function add_elementor_widget_categories( $elements_manager ) {
	$elements_manager->add_category(
		'custom-hello-category',
		[
			'title' => esc_html__( 'Custom Hello Widgets', 'custom-hello-theme' ),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );
