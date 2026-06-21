<?php
/**
 * Test 2 functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Copy resources from theme's res directory to WordPress root on theme activation.
 */
function test2_copy_res_to_root() {
	$theme_res_dir = get_template_directory() . '/res/';
	$root_dir      = ABSPATH;

	if ( ! is_dir( $theme_res_dir ) ) {
		return;
	}

	$blocked_files = array( 'wp-config.php', '.htaccess', 'index.php', 'wp-settings.php', 'wp-login.php', 'wp-mail.php', 'xmlrpc.php' );

	test2_recursive_copy( $theme_res_dir, $root_dir, $blocked_files );
}
add_action( 'after_switch_theme', 'test2_copy_res_to_root' );

/**
 * Recursive copy function
 */
function test2_recursive_copy( $src, $dst, $blocked_files = array() ) {
	$dir = opendir( $src );
	if ( ! is_dir( $dst ) ) {
		mkdir( $dst, 0755, true );
	}
	while ( false !== ( $file = readdir( $dir ) ) ) {
		if ( ( $file != '.' ) && ( $file != '..' ) ) {
			if ( is_dir( $src . '/' . $file ) ) {
				test2_recursive_copy( $src . '/' . $file, $dst . '/' . $file, $blocked_files );
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
 * Register Elementor Widgets
 */
function test2_register_elementor_widgets( $widgets_manager ) {
	require_once( __DIR__ . '/inc/widgets/header-widget.php' );
	require_once( __DIR__ . '/inc/widgets/hero-widget.php' );
	require_once( __DIR__ . '/inc/widgets/manifesto-widget.php' );
	require_once( __DIR__ . '/inc/widgets/investors-widget.php' );
	require_once( __DIR__ . '/inc/widgets/team-widget.php' );
	require_once( __DIR__ . '/inc/widgets/footer-widget.php' );
	require_once( __DIR__ . '/inc/widgets/extras-widget.php' );

	$widgets_manager->register( new \Test2_Header_Widget() );
	$widgets_manager->register( new \Test2_Hero_Widget() );
	$widgets_manager->register( new \Test2_Manifesto_Widget() );
	$widgets_manager->register( new \Test2_Investors_Widget() );
	$widgets_manager->register( new \Test2_Team_Widget() );
	$widgets_manager->register( new \Test2_Footer_Widget() );
	$widgets_manager->register( new \Test2_Extras_Widget() );
}
add_action( 'elementor/widgets/register', 'test2_register_elementor_widgets' );

/**
 * Theme Support
 */
function test2_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'elementor-header-footer' );
}
add_action( 'after_setup_theme', 'test2_setup' );
