<?php
namespace Mindsize\WP_Plugin_Base;

/**
 * Plugin Name:       DEBUG: Test WC Emails
 * Description:       This is a CLI only tool. Use <code>wc test-emails</code> to use it.
 * Author:            Mindsize
 * Author URI:        http://mindsize.me
 * Version:           1.0.0
 * Requires at least: 4.4
 * Tested up to:      4.8
 */

define( 'TEST_WC_EMAILS_VERSION', '1.0.0' );
define( 'TEST_WC_EMAILS_SLUG', 'wc-test-emails' );
define( 'TEST_WC_EMAILS_FILE', __FILE__ );
define( 'TEST_WC_EMAILS_DIR', plugin_dir_path( TEST_WC_EMAILS_FILE ) );
define( 'TEST_WC_EMAILS_URL', plugin_dir_url( TEST_WC_EMAILS_FILE ) );

if ( file_exists( TEST_WC_EMAILS_DIR . 'vendor/autoload.php' ) ) {
	require_once TEST_WC_EMAILS_DIR . 'vendor/autoload.php';
}

function test_wc_emails() {
	if ( ! class_exists( __NAMESPACE__ . '\\WP_Plugin_Factory' ) ) {
		throw new \Exception( __NAMESPACE__ . '\\WP_Plugin_Factory class cannot be found.' );
	}

	return WP_Plugin_Factory::create();
}

function load_plugin() {
	$instance = test_wc_emails();
	$instance->init();
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\load_plugin' );
