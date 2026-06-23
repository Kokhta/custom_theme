<?php
/**
 * Plugin Name: mountfort3
 * Description: Registers custom Elementor widgets for the Montfort Group website.
 * Version: 1.0.0
 * Author: Jules
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'MOUNTFORT3_PATH', plugin_dir_path( __FILE__ ) );
define( 'MOUNTFORT3_URL', plugin_dir_url( __FILE__ ) );

/**
 * Activation hook to copy files from res/ to ABSPATH.
 */
function mountfort3_activate() {
	$src = MOUNTFORT3_PATH . 'res';
	$dst = ABSPATH;

	if ( ! is_dir( $src ) ) {
		return;
	}

	mountfort3_copy_recursive( $src, $dst );
}
register_activation_hook( __FILE__, 'mountfort3_activate' );

/**
 * Recursive copy function with safety guards.
 */
function mountfort3_copy_recursive( $src, $dst ) {
	$dir = @opendir( $src );
	if ( ! $dir ) {
		return;
	}

	if ( ! is_dir( $dst ) ) {
		@mkdir( $dst, 0755, true );
	}

	$blocked_files = array( 'wp-config.php', '.htaccess', 'index.php', 'wp-settings.php', 'wp-login.php', 'wp-load.php' );

	while ( false !== ( $file = readdir( $dir ) ) ) {
		if ( ( $file != '.' ) && ( $file != '..' ) ) {
			if ( is_dir( $src . '/' . $file ) ) {
				mountfort3_copy_recursive( $src . '/' . $file, $dst . '/' . $file );
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
 * Initialize the plugin.
 */
function mountfort3_init() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		return;
	}

	require_once MOUNTFORT3_PATH . 'includes/class-asset-manager.php';
	require_once MOUNTFORT3_PATH . 'includes/class-widget-manager.php';

	new \Mountfort3\Asset_Manager();
	new \Mountfort3\Widget_Manager();
}
add_action( 'plugins_loaded', 'mountfort3_init' );
