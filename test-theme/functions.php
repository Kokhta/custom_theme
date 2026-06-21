<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Copy resources to WordPress root on theme activation.
 */
function test_theme_copy_resources() {
	$src = get_template_directory() . '/res';
	$dst = ABSPATH;

	if ( ! is_dir( $src ) ) {
		return;
	}

	test_theme_recurse_copy( $src, $dst );
}
add_action( 'after_switch_theme', 'test_theme_copy_resources' );

/**
 * Recursive copy function with safety guards.
 */
function test_theme_recurse_copy( $src, $dst ) {
	$blocked_files = [ 'wp-config.php', '.htaccess', 'index.php', 'wp-load.php', 'wp-settings.php' ];
	$dir = opendir( $src );
	if ( ! is_dir( $dst ) ) {
		mkdir( $dst, 0755, true );
	}
	while ( false !== ( $file = readdir( $dir ) ) ) {
		if ( ( $file != '.' ) && ( $file != '..' ) ) {
			if ( is_dir( $src . '/' . $file ) ) {
				test_theme_recurse_copy( $src . '/' . $file, $dst . '/' . $file );
			} else {
				if ( ! in_array( $file, $blocked_files ) ) {
					copy( $src . '/' . $file, $dst . '/' . $file );
				}
			}
		}
	}
	closedir( $dir );
}

/**
 * Register custom Elementor widgets.
 */
function register_test_theme_widgets( $widgets_manager ) {
	$widgets = [
		'1-header', '2-hero', '3-terminal-demo', '4-how-it-works', '5-skill-stacks',
		'6-for-everyone', '7-trending', '8-combo', '9-categories', '10-faq', '11-cta', '12-footer-section'
	];

	foreach ( $widgets as $widget ) {
		require_once( __DIR__ . '/includes/widgets/' . $widget . '.php' );
	}

	$widgets_manager->register( new \Test_Theme_Header_Widget() );
	$widgets_manager->register( new \Test_Theme_Hero_Widget() );
	$widgets_manager->register( new \Test_Theme_Terminal_Demo_Widget() );
	$widgets_manager->register( new \Test_Theme_How_It_Works_Widget() );
	$widgets_manager->register( new \Test_Theme_Skill_Stacks_Widget() );
	$widgets_manager->register( new \Test_Theme_For_Everyone_Widget() );
	$widgets_manager->register( new \Test_Theme_Trending_Widget() );
	$widgets_manager->register( new \Test_Theme_Combo_Widget() );
	$widgets_manager->register( new \Test_Theme_Categories_Widget() );
	$widgets_manager->register( new \Test_Theme_FAQ_Widget() );
	$widgets_manager->register( new \Test_Theme_CTA_Widget() );
	$widgets_manager->register( new \Test_Theme_Footer_Widget() );
}
add_action( 'elementor/widgets/register', 'register_test_theme_widgets' );

/**
 * Theme Support.
 */
function test_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'test_theme_setup' );
