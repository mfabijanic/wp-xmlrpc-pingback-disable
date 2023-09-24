<?php

/**
 * Plugin Name:  WP XML-RPC Pingback Disable
 * Plugin URI:   https://github.com/mfabijanic/wp-xmlrpc-pingback-disable
 * Description:  Disable vulnerability "WordPress XML-RPC Pingback Abuse". Disable "pingback.ping" method from XML-RPC.
 * Version:      1.0.0
 * Author:       Matej Fabijanić
 * Author URI:   http://matej-fabijanic.from.hr/
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  wp-xmlrpc-pingback-disable
 * Domain Path:  /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_xmlrpc_pingback_disable() {
  add_action('xmlrpc_call', function($method) {
    if ( $method === 'pingback.ping' ) {
      wp_die( 'No pingbacks', 'Pingback is disabled', array( 'response' => 403 ) );
    }
  });
}

run_wp_xmlrpc_pingback_disable();

