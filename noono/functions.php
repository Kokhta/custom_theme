<?php
/**
 * noono functions and definitions
 */

/**
 * Copy files from res/ to WordPress root upon theme activation.
 */
function noono_copy_res_to_root() {
    $src = get_template_directory() . '/res';
    $dst = ABSPATH;

    if ( ! is_dir( $src ) ) {
        return;
    }

    noono_recursive_copy( $src, $dst );
}
add_action( 'after_switch_theme', 'noono_copy_res_to_root' );

function noono_recursive_copy( $src, $dst ) {
    $dir = opendir( $src );
    @mkdir( $dst );

    // Safety guard
    $blocked_files = array( 'wp-config.php', '.htaccess', 'index.php', 'wp-settings.php', 'wp-login.php', 'wp-admin', 'wp-includes' );

    while ( false !== ( $file = readdir( $dir ) ) ) {
        if ( ( $file != '.' ) && ( $file != '..' ) ) {
            if ( in_array( $file, $blocked_files ) ) {
                continue;
            }
            if ( is_dir( $src . '/' . $file ) ) {
                noono_recursive_copy( $src . '/' . $file, $dst . '/' . $file );
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
function noono_register_elementor_widgets( $widgets_manager ) {
    $widget_files = glob( get_template_directory() . '/widgets/*.php' );
    foreach ( $widget_files as $file ) {
        require_once $file;
        $class_name = 'Noono_Widget_' . str_replace( '-', '_', basename( $file, '.php' ) );
        // Extract number prefix if any and fix class name
        $class_name = preg_replace('/^\d+_/', '', $class_name);

        // Actually, let's use a simpler class naming convention inside the files
        // We will define the class name explicitly in each file.
    }
}
// Widget registration will be handled by including files that call register_widget_type
// Actually the modern way is:
add_action( 'elementor/widgets/register', function( $widgets_manager ) {
    $widget_files = glob( get_template_directory() . '/widgets/*.php' );
    foreach ( $widget_files as $file ) {
        require_once $file;
        $basename = basename( $file, '.php' );
        // Convert 1-header to Noono_Widget_1_Header
        $class_suffix = str_replace(' ', '_', ucwords(str_replace('-', ' ', $basename)));
        $class_name = 'Noono_Widget_' . $class_suffix;
        if ( class_exists( $class_name ) ) {
            $widgets_manager->register( new $class_name() );
        }
    }
} );

function noono_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'noono_setup' );
