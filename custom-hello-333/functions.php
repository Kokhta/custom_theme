<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Copy resources from theme's res directory to ABSPATH on theme activation.
 */
function custom_hello_333_activation() {
	$source = get_template_directory() . '/res/';
	$destination = ABSPATH;

	if ( is_dir( $source ) ) {
		custom_hello_333_copy_dir( $source, $destination );
	}
}
add_action( 'after_switch_theme', 'custom_hello_333_activation' );

/**
 * Helper function to recursively copy directories with safety guards.
 */
function custom_hello_333_copy_dir( $src, $dst ) {
	$blocked_files = [
		'wp-config.php',
		'wp-settings.php',
		'wp-load.php',
		'wp-blog-header.php',
		'wp-cron.php',
		'wp-links-opml.php',
		'wp-mail.php',
		'wp-signup.php',
		'wp-trackback.php',
		'xmlrpc.php',
		'.htaccess',
		'index.php',
	];

	if ( ! is_dir( $dst ) ) {
		@mkdir( $dst, 0755, true );
	}

	$dir = opendir( $src );
	while ( false !== ( $file = readdir( $dir ) ) ) {
		if ( ( $file != '.' ) && ( $file != '..' ) ) {
			if ( is_dir( $src . '/' . $file ) ) {
				custom_hello_333_copy_dir( $src . '/' . $file, $dst . '/' . $file );
			} else {
				if ( ! in_array( strtolower( $file ), $blocked_files ) ) {
					copy( $src . '/' . $file, $dst . '/' . $file );
				}
			}
		}
	}
	closedir( $dir );
}

/**
 * Register Elementor widgets.
 */
function custom_hello_333_register_widgets( $widgets_manager ) {
	$widget_files = [
		'1-header',
		'2-hero',
		'3-ai',
		'4-wearable',
		'5-features',
		'6-encryption',
		'7-grip',
		'8-sustainability',
		'9-testimonies',
		'10-social-content',
		'11-product',
		'12-open-weight',
		'13-footer',
	];

	foreach ( $widget_files as $widget_id ) {
		$file_path = get_template_directory() . '/inc/widgets/' . $widget_id . '.php';
		if ( file_exists( $file_path ) ) {
			require_once( $file_path );
			$class_name = 'Widget_' . str_replace( '-', '_', $widget_id );
			if ( class_exists( $class_name ) ) {
				$widgets_manager->register( new $class_name() );
			}
		}
	}
}
add_action( 'elementor/widgets/register', 'custom_hello_333_register_widgets' );
