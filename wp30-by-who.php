<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.terrytsang.com
 * @since             1.0.0
 * @package           WP30_By_Who
 *
 * @wordpress-plugin
 * Plugin Name:       WP30 By Who
 * Plugin URI:        www.terrytsang.com/wp30/by-who
 * Description:       A footer option for text label with social media links
 * Version:           1.0.0
 * Author:            Terry Tsang
 * Author URI:        www.terrytsang.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp30-by-who
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WP30_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp30-by-who-activator.php
 */
function activate_wp30_by_who() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp30-by-who-activator.php';
	WP30_By_Who_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp30-by-who-deactivator.php
 */
function deactivate_wp30_by_who() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp30-by-who-deactivator.php';
	WP30_By_Who_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp30_by_who' );
register_deactivation_hook( __FILE__, 'deactivate_wp30_by_who' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp30-by-who.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp30_by_who() {

	$plugin = new WP30_By_Who();
	$plugin->run();

}
run_wp30_by_who();
