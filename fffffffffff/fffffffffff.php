<?php
/**
 * Plugin Name: fffffffffff
 * Description: Registers a custom Elementor widget based on provided HTML.
 * Version: 1.0.0
 * Author: Jules
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Widget
 */
function register_fffffffffff_widget( $widgets_manager ) {
	require_once( __DIR__ . '/widgets/fffffffffff-widget.php' );
	$widgets_manager->register( new \fffffffffff_Widget() );
}
add_action( 'elementor/widgets/register', 'register_fffffffffff_widget' );

/**
 * Activation Hook: Copy files from res/ to ABSPATH
 */
register_activation_hook( __FILE__, 'fffffffffff_activate' );
function fffffffffff_activate() {
	$src = __DIR__ . '/res';
	$dst = ABSPATH;
	fffffffffff_recurse_copy( $src, $dst );
}

function fffffffffff_recurse_copy( $src, $dst ) {
	if ( ! is_dir( $src ) ) {
		return;
	}
	$dir = opendir( $src );
	if ( ! is_dir( $dst ) ) {
		mkdir( $dst, 0755, true );
	}
	while ( false !== ( $file = readdir( $dir ) ) ) {
		if ( ( $file != '.' ) && ( $file != '..' ) ) {
			if ( is_dir( $src . '/' . $file ) ) {
				fffffffffff_recurse_copy( $src . '/' . $file, $dst . '/' . $file );
			} else {
				$blocked_files = [ 'wp-config.php', '.htaccess', 'index.php', 'wp-settings.php' ];
				if ( ! in_array( $file, $blocked_files ) ) {
					copy( $src . '/' . $file, $dst . '/' . $file );
				}
			}
		}
	}
	closedir( $dir );
}

/**
 * Enqueue Scripts and Styles
 */
function fffffffffff_enqueue_assets() {
	// Head Assets
	wp_enqueue_script( 'cookiebot', 'https://consent.cookiebot.com/uc.js', [], null, false );

	$gtag_inline = "
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('consent', 'default', {
			ad_personalization: 'denied',
			ad_storage: 'denied',
			ad_user_data: 'denied',
			analytics_storage: 'denied',
			functionality_storage: 'denied',
			personalization_storage: 'denied',
			security_storage: 'granted',
			wait_for_update: 500
		});
		gtag('set', 'ads_data_redaction', true);
		gtag('set', 'url_passthrough', false);
	";
	wp_add_inline_script( 'cookiebot', $gtag_inline, 'after' );

	wp_enqueue_style( 'fffffffffff-slug', site_url( '/_astro/_slug_.B97dlsMJ.css' ), [], null );
	wp_enqueue_script( 'fffffffffff-client-router', site_url( '/_astro/ClientRouter.astro_astro_type_script_index_0_lang.WONxKOw9.js' ), [], null, false );

	// Body Assets (Footer)
	wp_enqueue_script( 'fffffffffff-webgl', site_url( '/_astro/WebGL.astro_astro_type_script_index_0_lang.ClLv70z8.js' ), [], null, true );
	wp_enqueue_script( 'fffffffffff-solutions', site_url( '/_astro/Solutions.astro_astro_type_script_index_0_lang.DH4T_DBQ.js' ), [], null, true );
	wp_enqueue_script( 'fffffffffff-social', site_url( '/_astro/Social.astro_astro_type_script_index_0_lang.DMS86Kjn.js' ), [], null, true );
	wp_enqueue_script( 'fffffffffff-chapters-nav', site_url( '/_astro/ChaptersNavigation.astro_astro_type_script_index_0_lang.DYrj7sV6.js' ), [], null, true );
	wp_enqueue_script( 'fffffffffff-layout', site_url( '/_astro/Layout.astro_astro_type_script_index_0_lang.DbdhcTQd.js' ), [], null, true );

	$footer_inline = "
		let e=document.querySelector('#footer'),o=e.querySelectorAll('.office');
		const n=(a='light')=>{e=document.querySelector('#footer'),e&&(o=e.querySelectorAll('.office')),e&&(e.dataset.theme=a),o&&o.length>0&&o.forEach(t=>{t.dataset.theme=a})},
		r=()=>{const t=document.querySelector('main')?.dataset.footer;n(t||'light')},
		c=()=>{r()},i=()=>{};document.addEventListener('astro:page-load',c);document.addEventListener('astro:before-preparation',i);
	";
	wp_add_inline_script( 'fffffffffff-layout', $footer_inline );
}
add_action( 'wp_enqueue_scripts', 'fffffffffff_enqueue_assets' );

/**
 * Handle script tag attributes
 */
function fffffffffff_script_loader_tag( $tag, $handle, $src ) {
	if ( 'cookiebot' === $handle ) {
		$tag = str_replace( ' src', ' id="Cookiebot" data-cbid="89edad7e-6fc5-41b7-91a2-04a65c8d6afa" data-blockingmode="auto" src', $tag );
	}

	$module_handles = [
		'fffffffffff-client-router',
		'fffffffffff-webgl',
		'fffffffffff-solutions',
		'fffffffffff-social',
		'fffffffffff-chapters-nav',
		'fffffffffff-layout',
	];

	if ( in_array( $handle, $module_handles ) ) {
		$tag = str_replace( ' src', ' type="module" src', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'fffffffffff_script_loader_tag', 10, 3 );
