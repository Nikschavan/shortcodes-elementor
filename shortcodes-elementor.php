<?php
/**
 * Plugin Name:     Shortcodes Elementor
 * Plugin URI:      Add Elemenntor layouts using shortcodes.
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     shortcodes-elementor
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Shortcodes_Elementor
 */

/**
 * Load the class loader.
 */
require_once 'class-shortcode-elementor.php';

define( 'SE_VER', '0.1.0' );
define( 'SE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SE_URL', plugins_url( '/', __FILE__ ) );
define( 'SE_PATH', plugin_basename( __FILE__ ) );

/**
 * Load the Plugin Class.
 */
function _se_init() {
	new Shortcodes_Elementor();
}

add_action( 'plugins_loaded', '_se_init' );