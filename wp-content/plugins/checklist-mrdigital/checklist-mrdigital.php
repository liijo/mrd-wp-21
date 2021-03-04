<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mr-digital.co.uk
 * @since             1.0.0
 * @package           Checklist_Mrdigital
 *
 * @wordpress-plugin
 * Plugin Name:       Checklist by Mr.Digital
 * Plugin URI:        https://mr-digital.co.uk
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Gopu
 * Author URI:        https://mr-digital.co.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       checklist-mrdigital
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CHECKLIST_MRDIGITAL_VERSION', '1.0.0' );

define( 'WPMRDC_PLUGIN', __FILE__ );
define( 'WPMRDC_PLUGIN_DIR', untrailingslashit( dirname( WPMRDC_PLUGIN ) ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-checklist-mrdigital-activator.php
 */
function activate_checklist_mrdigital() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-checklist-mrdigital-activator.php';
	Checklist_Mrdigital_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-checklist-mrdigital-deactivator.php
 */
function deactivate_checklist_mrdigital() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-checklist-mrdigital-deactivator.php';
	Checklist_Mrdigital_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_checklist_mrdigital' );
register_deactivation_hook( __FILE__, 'deactivate_checklist_mrdigital' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-checklist-mrdigital.php';
require plugin_dir_path( __FILE__ ) . 'includes/mrd-check-list-question-meta.php';
require plugin_dir_path( __FILE__ ) . 'includes/mrd-check-list-question-group-meta-full.php';
require plugin_dir_path( __FILE__ ) . 'includes/mrd-check-list-checklist-meta.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-checklist-mrdigital-shortcodes.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-checklist-mrdigital-ajax.php';
require plugin_dir_path( __FILE__ ) . 'includes/calculator_functions.php';
require plugin_dir_path( __FILE__ ) . 'includes/packagemanager.php';
require plugin_dir_path( __FILE__ ) . 'includes/landingpage_functions.php';
require plugin_dir_path( __FILE__ ) . 'includes/thirdparty_apis.php';
require plugin_dir_path( __FILE__ ) . 'includes/partner_program_functions.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_checklist_mrdigital() {

	$plugin = new Checklist_Mrdigital();
	$plugin->run();

}
run_checklist_mrdigital();
