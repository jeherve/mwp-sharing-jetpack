<?php
/*
 * Plugin Name: ManageWP.org sharing for Jetpack
 * Plugin URI: http://wordpress.org/plugins/mwp-sharing-jetpack/
 * Description: Add a ManageWP.org button to the Jetpack Sharing module
 * Author: Jeremy Herve
 * Version: 1.0
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
		if ( class_exists( 'Jetpack' ) && Jetpack::init()->is_module_active( 'sharedaddy' ) )
			add_action( 'plugins_loaded', array( $this, 'setup' ) );
	}

	public function setup() {
		add_filter( 'sharing_services', 	array( 'Share_Mwporg', 'inject_service' ) );
		add_action( 'wp_enqueue_scripts', 	array( $this, 'icon_style' ) );
	}
	
	public function icon_style() {
		wp_register_style( 'mwpjp', plugins_url('style.css', __FILE__) );
		wp_enqueue_style( 'mwpjp' );
	}
}

// Include Jetpack's sharing class, Sharing_Source
$share_plugin = wp_get_active_and_valid_plugins();
if ( is_multisite() ) {
	$share_plugin = array_unique( array_merge($share_plugin, wp_get_active_network_plugins() ) );
}
$share_plugin = preg_grep( '/\/jetpack\.php$/i', $share_plugin );
if ( ! class_exists( 'Sharing_Source' ) )
	include_once( preg_replace( '/jetpack\.php$/i', 'modules/sharedaddy/sharing-sources.php', reset( $share_plugin ) ) );

// Build button
class Share_Mwporg extends Sharing_Source {
	var $shortname = 'mwp';	
	public function __construct( $id, array $settings ) {
		parent::__construct( $id, $settings );
		$this->smart = 'official' == $this->button_style;
		$this->button_style = 'icon-text';
	}

	public function get_name() {
		return __( 'ManageWP.org', 'mwpjp' );
	}


	public function get_display( $post ) {
		if ( $this->smart ) {
			return '<script src="http://managewp.org/share.js" data-type="small" data-title="" data-url="'. get_permalink( $post->ID ) .'"></script>';
		} else {
			return '<a target="_blank" rel="nofollow" class="share-mwp sd-button share-icon" href="http://managewp.org/share/form?url='. get_permalink( $post->ID ) .'"><span>ManageWP.org</span></a>';
		}
	}

	// Add the ManageWP.org Button to the list of services in Sharedaddy
	public function inject_service ( array $services ) {
		if ( ! array_key_exists( 'mwp', $services ) ) {
			$services['mwp'] = 'Share_Mwporg';
		}
		return $services;
	}
}

// And boom.
Mwporg_Button::get_instance();
