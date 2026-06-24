<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Copy files from theme's res/ directory to WordPress root.
 */
function kriss_copy_res_to_root() {
    $theme_path = get_template_directory();
    $res_path = $theme_path . '/res';
    $root_path = ABSPATH;

    if ( ! is_dir( $res_path ) ) {
        return;
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator( $res_path, RecursiveDirectoryIterator::SKIP_DOTS ),
        RecursiveIteratorIterator::SELF_FIRST
    );

    $blocked_files = array( 'wp-config.php', '.htaccess', 'index.php', 'wp-settings.php', 'wp-login.php', 'wp-admin', 'wp-includes' );

    foreach ( $iterator as $item ) {
        $sub_path_name = $iterator->getSubPathName();

        // Skip blocked files/directories
        $first_part = explode( DIRECTORY_SEPARATOR, $sub_path_name )[0];
        if ( in_array( $sub_path_name, $blocked_files ) || in_array( $first_part, $blocked_files ) ) {
            continue;
        }

        $dest = $root_path . '/' . $sub_path_name;
        if ( $item->isDir() ) {
            if ( ! is_dir( $dest ) ) {
                mkdir( $dest, 0755, true );
            }
        } else {
            // Ensure parent directory exists
            $parent_dir = dirname( $dest );
            if ( ! is_dir( $parent_dir ) ) {
                mkdir( $parent_dir, 0755, true );
            }
            copy( $item->getRealPath(), $dest );
        }
    }
}
add_action( 'after_switch_theme', 'kriss_copy_res_to_root' );

/**
 * Register custom Elementor widgets.
 */
function kriss_register_elementor_widgets( $widgets_manager ) {
    require_once( __DIR__ . '/widgets/widget-1-header.php' );
    require_once( __DIR__ . '/widgets/widget-2-hero.php' );
    require_once( __DIR__ . '/widgets/widget-3-chat.php' );

    $widgets_manager->register( new \Kriss_Header_Widget() );
    $widgets_manager->register( new \Kriss_Hero_Widget() );
    $widgets_manager->register( new \Kriss_Chat_Widget() );
}
add_action( 'elementor/widgets/register', 'kriss_register_elementor_widgets' );
