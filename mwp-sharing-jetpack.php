<?php
/*
 * Plugin Name: ManageWP.org sharing for Jetpack
 * Plugin URI: http://wordpress.org/plugins/mwp-sharing-jetpack/
 * Description: Add a ManageWP.org button to the Jetpack Sharing module
 * Author: Jeremy Herve
 * Version: 1.2.3
 * Author URI: http://jeremyherve.com
 * License: GPL2+
 * Text Domain: mwpjp
 */

class Mwporg_Button {
	private static $instance;

	static function get_instance() {
		if ( ! self::$instance )
			self::$instance = new Mwporg_Button;

		return self::$instance;
	}

	private function __construct() {
		// Check if Jetpack and the sharing module is active
		if ( class_exists( 'Jetpack' ) && Jetpack::init()->is_module_active( 'sharedaddy' ) ) {
			add_action( 'plugins_loaded', array( $this, 'setup' ) );
		} else {
			add_action( 'admin_notices',  array( $this, 'install_jetpack' ) );
		}
	}

	public function setup() {
		add_filter( 'sharing_services',   array( $this, 'inject_service' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'icon_style' ) );
	}

	// Add the ManageWP.org Button to the list of services in Sharedaddy
	public function inject_service( $services ) {
		include_once 'class.mwp-sharing-jetpack.php';
		if ( class_exists( 'Share_Mwporg' ) ) {
			$services['mwp'] = 'Share_Mwporg';
		}
		return $services;
	}

	public function icon_style() {
		wp_register_style( 'mwpjp', plugins_url( 'style.css', __FILE__) );
		wp_enqueue_style( 'mwpjp' );
	}

	// Prompt to install Jetpack
	public function install_jetpack() {
		echo '<div class="error"><p>';
		printf(__( 'To use the ManageWP.org sharing plugin, you\'ll need to install and activate <a href="%1$s">Jetpack</a> first, and <a href="%2$s">activate the Sharing module</a>.'),
		'plugin-install.php?tab=search&s=jetpack&plugin-search-input=Search+Plugins',
		'admin.php?page=jetpack_modules',
		'mwpjp'
		);
		echo '</p></div>';
	}

}

// And boom.
Mwporg_Button::get_instance();
