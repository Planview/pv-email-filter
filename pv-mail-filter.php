<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   pv-mail-filter
 * @author    Stephen Crockett <crockett95@gmail.com>
 * @license   GPL-2.0+
 * @link      https://github.com/Planview/pv-email-filter
 * @copyright 2014 Planview, Inc.
 *
 * @wordpress-plugin
 * Plugin Name:       PV Mail Filter
 * Plugin URI:        https://github.com/Planview/pv-email-filter
 * Description:       Filter the mail sent by Wordpress
 * Version:           0.0.1
 * Author:            Stephen Crockett
 * Author URI:        https://github.com/crockett95
 * Text Domain:       pv-mail-filter
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/afragen/github-updater
 * GitHub Branch:	  develop
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-pv-mail-filter.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 */
register_activation_hook( __FILE__, array( 'PV_Mail_Filter', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'PV_Mail_Filter', 'deactivate' ) );

/*
 * Start me up!
 */
add_action( 'plugins_loaded', array( 'PV_Mail_Filter', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-pv-mail-filter-admin.php' );
	add_action( 'plugins_loaded', array( 'PV_Mail_Filter_Admin', 'get_instance' ) );

}
