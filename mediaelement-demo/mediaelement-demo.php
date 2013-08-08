<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that also follow
 * WordPress coding standards and PHP best practices.
 *
 * @package   MediaElement_Demo
 * @author    Gabe Shackle <gabe@hereswhatidid.com>
 * @license   GPL-2.0+
 * @link      http://hereswhatidid.com
 * @copyright 2013 Gabe Shackle
 *
 * @wordpress-plugin
 * Plugin Name: MediaElement Demo
 * Plugin URI:  https://github.com/hereswhatidid/mediaelementjs-demo/
 * Description: Demonstration of the MediaElement.js core functionality
 * Version:     1.0.0
 * Author:      Gabe Shackle
 * Author URI:  http://hereswhatidid.com/
 * Text Domain: mediaelement-demo-locale
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// TODO: replace `class-mediaelement-demo.php` with the name of the actual plugin's class file
require_once( plugin_dir_path( __FILE__ ) . 'class-mediaelement-demo.php' );

// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
// TODO: replace MediaElement_Demo with the name of the plugin defined in `class-mediaelement-demo.php`
register_activation_hook( __FILE__, array( 'MediaElement_Demo', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'MediaElement_Demo', 'deactivate' ) );

// TODO: replace MediaElement_Demo with the name of the plugin defined in `class-mediaelement-demo.php`
MediaElement_Demo::get_instance();