<?php
/**
 * valentine functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Copy files from theme's res directory to WordPress root on theme activation.
 */
function valentine_copy_res_to_root() {
	$theme_path = get_template_directory();
	$res_path   = $theme_path . '/res';
	$root_path  = ABSPATH;

	if ( is_dir( $res_path ) ) {
		valentine_recursive_copy( $res_path, $root_path );
	}
}
add_action( 'after_switch_theme', 'valentine_copy_res_to_root' );

/**
 * Theme Setup
 */
function valentine_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus( [
		'primary' => esc_html__( 'Primary Menu', 'valentine' ),
	] );
}
add_action( 'after_setup_theme', 'valentine_setup' );

/**
 * Recursive copy function
 */
function valentine_recursive_copy( $source, $destination ) {
	$dir = opendir( $source );
	@mkdir( $destination );
	while ( false !== ( $file = readdir( $dir ) ) ) {
		if ( ( $file != '.' ) && ( $file != '..' ) ) {
			if ( is_dir( $source . '/' . $file ) ) {
				valentine_recursive_copy( $source . '/' . $file, $destination . '/' . $file );
			} else {
				copy( $source . '/' . $file, $destination . '/' . $file );
			}
		}
	}
	closedir( $dir );
}

/**
 * Register Elementor Widgets
 */
function valentine_register_widgets( $widgets_manager ) {
	require_once( __DIR__ . '/widgets/blured-texts.php' );
	require_once( __DIR__ . '/widgets/preloader.php' );
	require_once( __DIR__ . '/widgets/header-widget.php' );
	require_once( __DIR__ . '/widgets/scene-container.php' );
	require_once( __DIR__ . '/widgets/heart-customise.php' );
	require_once( __DIR__ . '/widgets/home-share-heart.php' );
	require_once( __DIR__ . '/widgets/footer-widget.php' );

	$widgets_manager->register( new \Valentine_Blured_Texts_Widget() );
	$widgets_manager->register( new \Valentine_Preloader_Widget() );
	$widgets_manager->register( new \Valentine_Header_Widget() );
	$widgets_manager->register( new \Valentine_Scene_Container_Widget() );
	$widgets_manager->register( new \Valentine_Heart_Customise_Widget() );
	$widgets_manager->register( new \Valentine_Home_Share_Heart_Widget() );
	$widgets_manager->register( new \Valentine_Footer_Widget() );
}
add_action( 'elementor/widgets/register', 'valentine_register_widgets' );

/**
 * Add Widget Category
 */
function valentine_add_elementor_widget_categories( $elements_manager ) {
	$elements_manager->add_category(
		'valentine',
		[
			'title' => esc_html__( 'Valentine', 'valentine' ),
			'icon'  => 'fa fa-heart',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'valentine_add_elementor_widget_categories' );

/**
 * Enqueue scripts and styles.
 * (Note: Most are hardcoded in header/footer per requirements)
 */
function valentine_scripts() {
	wp_enqueue_style( 'valentine-style', get_stylesheet_uri(), [], '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'valentine_scripts' );
