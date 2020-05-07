<?php
/**
 * Reitler Law back compat functionality
 *
 * Prevents Reitler Law from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage Reitler_Law
 * @since Reitler Law 1.0
 */

/**
 * Prevent switching to Reitler Law on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Reitler Law 1.0
 */
function reitlerlaw_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'reitlerlaw_upgrade_notice' );
}
add_action( 'after_switch_theme', 'reitlerlaw_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Reitler Law on WordPress versions prior to 4.7.
 *
 * @since Reitler Law 1.0
 *
 * @global string $wp_version WordPress version.
 */
function reitlerlaw_upgrade_notice() {
	$message = sprintf( __( 'Reitler Law requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'reitlerlaw' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Reitler Law 1.0
 *
 * @global string $wp_version WordPress version.
 */
function reitlerlaw_customize() {
	wp_die(
		sprintf( __( 'Reitler Law requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'reitlerlaw' ), $GLOBALS['wp_version'] ),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'reitlerlaw_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Reitler Law 1.0
 *
 * @global string $wp_version WordPress version.
 */
function reitlerlaw_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Reitler Law requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'reitlerlaw' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'reitlerlaw_preview' );
