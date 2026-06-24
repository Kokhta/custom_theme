<?php
/**
 * MountFort theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme Setup
 */
function mountfort_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'mountfort_setup' );

/**
 * Activation Hook: Copy assets from res/ to WP root
 */
function mountfort_activate_theme() {
	$res_dir = get_template_directory() . '/res';
	$dest_dir = ABSPATH;

	if ( is_dir( $res_dir ) ) {
		mountfort_recursive_copy( $res_dir, $dest_dir );
	}
}
add_action( 'after_switch_theme', 'mountfort_activate_theme' );

/**
 * Recursive Copy Function
 */
function mountfort_recursive_copy( $src, $dst ) {
	if ( ! is_dir( $src ) ) return;
	$dir = opendir( $src );

	// List of critical files to NOT overwrite
	$blocked_files = ['wp-config.php', '.htaccess', 'index.php', 'wp-load.php', 'wp-settings.php'];

	if ( ! is_dir( $dst ) ) {
		mkdir( $dst, 0755, true );
	}
	while ( false !== ( $file = readdir( $dir ) ) ) {
		if ( ( $file != '.' ) && ( $file != '..' ) ) {
			if ( in_array($file, $blocked_files) ) continue;

			if ( is_dir( $src . '/' . $file ) ) {
				mountfort_recursive_copy( $src . '/' . $file, $dst . '/' . $file );
			} else {
				copy( $src . '/' . $file, $dst . '/' . $file );
			}
		}
	}
	closedir( $dir );
}

/**
 * Register Elementor Widgets
 */
function mountfort_register_elementor_widgets( $widgets_manager ) {
	$widget_files = glob( get_template_directory() . '/widgets/*.php' );
	foreach ( $widget_files as $file ) {
		require_once $file;
		$base_name = basename( $file, '.php' );

		$parts = explode( '-', $base_name );
		$prefix = $parts[0];
		array_shift($parts);
		$suffix = str_replace( ' ', '_', ucwords( str_replace( array('_', '-'), ' ', implode('_', $parts) ) ) );
		$class_name = 'MountFort_Widget_' . $prefix . '_' . $suffix;

		if ( class_exists( $class_name ) ) {
			$widgets_manager->register( new $class_name() );
		}
	}
}
add_action( 'elementor/widgets/register', 'mountfort_register_elementor_widgets' );

/**
 * Enqueue scripts and styles
 */
function mountfort_scripts() {
	// The user requested to copy EXACT script tags with all attributes.
	// Standard WordPress enqueuing makes it hard to preserve data-astro-exec etc.
	// So we handle most in header.php/footer.php as requested.
}
add_action( 'wp_enqueue_scripts', 'mountfort_scripts' );
