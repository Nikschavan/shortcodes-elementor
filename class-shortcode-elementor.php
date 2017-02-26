<?php

defined( 'ABSPATH' ) or exit;

class Shortcodes_Elementor {

	private static $_instance = null;

	/**
	 * Instance of Elemenntor Frontend class.
	 *
	 * @var \Elementor\Frontend()
	 */
	private static $elementor_frontend;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			self::$elementor_frontend = new \Elementor\Frontend();

			add_shortcode( 'elementor_add_template', array( $this, 'elemenntor_add_template' ) );
		} else {
			add_action( 'admin_notices', array( $this, 'elementor_not_available' ) );
			add_action( 'network_admin_notices', array( $this, 'elementor_not_available' ) );
		}
	}

	public function elementor_not_available() {

		if ( file_exists(  WP_PLUGIN_DIR . '/elementor/elementor.php' ) ) {
			$url = network_admin_url() . 'plugins.php?s=elementor';
		} else {
			$url = network_admin_url() . 'plugin-install.php?s=elementor';
		}

		echo '<div class="notice notice-error">';
		echo '<p>' . sprintf( __( 'The <strong>Elementor Header Footer</strong> plugin requires <strong><a href="%s">Elementor</strong></a> plugin installed & activated.', 'header-footer-elementor' ) . '</p>', $url );
		echo '</div>';

	}

	public function elemenntor_add_template( $atts ) {
		$atts = shortcode_atts( array(
	        'id' => '',
	    ), $atts, 'elementor_add_template' );

	    if ( $atts['id'] !== '' ) {
	    	return self::$elementor_frontend->get_builder_content_for_display( $atts['id'] );
	    }
	}


}

Shortcodes_Elementor::instance();