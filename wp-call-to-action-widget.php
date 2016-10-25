<?php

/**
 *
 * @link              http://club.wpeka.com
 * @since             1.0.0
 * @package           WPCTA
 *
 * Plugin Name: WP Call To Action Widget
 * Plugin URI: https://club.wpeka.com/product/wp-call-action-widget/
 * Description: A text widget with an image or icon and a call to action button.
 * Version: 1.1
 * Author: WPEka
 * Author URI: http://club.wpeka.com/
 * @author WPEka
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_wpcta() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpcta-activator.php';
	WPCTA_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_wpcta() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpcta-deactivator.php';
	WPCTA_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpcta' );
register_deactivation_hook( __FILE__, 'deactivate_wpcta' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpcta.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpcta() {

	$wpcta = new WPCTA();
	$wpcta->run();

}
run_wpcta();
