<?php
/**
 * Custom Hello Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Activation Hook: Copy 'res/' contents to WordPress root.
 */
function custom_hello_theme_after_switch_theme() {
	$theme_res_dir = get_template_directory() . '/res/';
	$wp_root_dir    = ABSPATH;

	if ( is_dir( $theme_res_dir ) ) {
		custom_hello_theme_copy_recursive( $theme_res_dir, $wp_root_dir );
	}
}
add_action( 'after_switch_theme', 'custom_hello_theme_after_switch_theme' );

/**
 * Recursive copy function.
 */
function custom_hello_theme_copy_recursive( $src, $dst ) {
	if ( ! is_dir( $src ) ) {
		return;
	}

	$dir = @opendir( $src );
	if ( ! $dir ) {
		return;
	}

	if ( ! is_dir( $dst ) ) {
		if ( ! @mkdir( $dst, 0755, true ) ) {
			closedir( $dir );
			return;
		}
	}

	while ( false !== ( $file = readdir( $dir ) ) ) {
		if ( ( $file != '.' ) && ( $file != '..' ) ) {
			$src_file = $src . '/' . $file;
			$dst_file = $dst . '/' . $file;
			if ( is_dir( $src_file ) ) {
				custom_hello_theme_copy_recursive( $src_file, $dst_file );
			} else {
				@copy( $src_file, $dst_file );
			}
		}
	}
	closedir( $dir );
}

/**
 * Register Custom Elementor Widgets.
 */
function custom_hello_theme_register_elementor_widgets( $widgets_manager ) {
	$widget_files = [
		'1-header.php',
		'2-hero.php',
		'3-ai.php',
		'4-wearable.php',
		'5-features.php',
		'6-encryption.php',
		'7-grip.php',
		'8-sustainability.php',
		'9-testimonies.php',
		'10-social-content.php',
		'11-product.php',
		'12-open-weight.php',
		'13-footer.php',
	];

	foreach ( $widget_files as $file ) {
		$path = get_template_directory() . '/widgets/' . $file;
		if ( file_exists( $path ) ) {
			require_once $path;
			// Class names will follow the pattern Custom_Hello_Widget_{Index}
			$parts = explode( '-', $file );
			$index = $parts[0];
			$class_name = 'Custom_Hello_Widget_' . $index;
			if ( class_exists( $class_name ) ) {
				$widgets_manager->register( new $class_name() );
			}
		}
	}
}
add_action( 'elementor/widgets/register', 'custom_hello_theme_register_elementor_widgets' );
