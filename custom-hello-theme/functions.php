<?php
/**
 * Custom Hello Theme functions and definitions
 *
 * @package CustomHelloTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Elementor widgets.
 */
function custom_hello_theme_register_widgets( $widgets_manager ) {
	$widget_files = [
		'1-cursor.php',
		'2-header.php',
		'3-menu.php',
		'4-canvas.php',
		'5-sound.php',
		'6-transition.php',
		'7-top-chapters.php',
		'8-sustainability.php',
		'9-navigation.php',
		'10-footer.php',
	];

	foreach ( $widget_files as $file ) {
		$file_path = get_template_directory() . '/widgets/' . $file;
		if ( file_exists( $file_path ) ) {
			require_once $file_path;

			$base_name = basename( $file, '.php' );
			$parts = explode( '-', $base_name );
			$class_parts = array_map( 'ucfirst', $parts );
			$class_name = 'Elementor\Widget_' . implode( '_', $class_parts );

			if ( class_exists( $class_name ) ) {
				$widgets_manager->register( new $class_name() );
			}
		}
	}
}
add_action( 'elementor/widgets/register', 'custom_hello_theme_register_widgets' );

/**
 * Activation hook to copy assets to root.
 */
function custom_hello_theme_activation() {
	$res_dir = get_template_directory() . '/res/';
	$root_dir = ABSPATH;

	if ( is_dir( $res_dir ) ) {
		custom_hello_theme_copy_dir( $res_dir, $root_dir );
	}
}
add_action( 'after_switch_theme', 'custom_hello_theme_activation' );

function custom_hello_theme_copy_dir( $src, $dst ) {
	if ( ! is_dir( $src ) ) return;
	$dir = opendir( $src );
	if ( ! is_dir( $dst ) ) {
		@mkdir( $dst, 0755, true );
	}
	while ( false !== ( $file = readdir( $dir ) ) ) {
		if ( ( $file != '.' ) && ( $file != '..' ) ) {
			if ( is_dir( $src . '/' . $file ) ) {
				custom_hello_theme_copy_dir( $src . '/' . $file, $dst . '/' . $file );
			} else {
				copy( $src . '/' . $file, $dst . '/' . $file );
			}
		}
	}
	closedir( $dir );
}

function custom_hello_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'elementor-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'custom_hello_theme_setup' );
