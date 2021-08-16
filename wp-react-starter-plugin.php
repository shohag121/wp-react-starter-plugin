<?php
/**
 * WP React Starter Plugin
 *
 * @package           WPReactStarterPlugin
 * @author            Shazahanul Islam Shohag
 * @copyright         2020 Shazahanul Islam Shohag
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WP React Starter Plugin
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Demonstration of React.js usage in WP plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shazahanul Islam Shohag
 * Author URI:        https://wpdev.icu
 * Text Domain:       wprsp
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Main Plugin Class.
 *
 * @since 1.0.0
 * Class WPReactStarterPlugin
 */
final class WPReactStarterPlugin {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * Plugin Instance.
	 *
	 * @var WPReactStarterPlugin
	 */
	private static $instance;

	/**
	 * WPReactStarterPlugin constructor.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function __construct() {
		$this->define_constants();
		register_activation_hook( __FILE__, array( $this, 'activation' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivation' ) );
		add_action( 'plugin_loaded', array( $this, 'plugin_functionality' ) );
	}

	/**
	 * Initialize the plugin.
	 *
	 * @since 1.0.0
	 * @return WPReactStarterPlugin
	 */
	public static function init() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Plugin Activation logic.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function activation() {
		// Plugin Activation logic goes here.
	}

	/**
	 * Plugin Deactivation logic.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function deactivation() {
		// Plugin Deactivation logic goes here.
	}

	/**
	 * Defined all the required constants.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function define_constants() {
		define( 'WPRSP_VERSION', self::VERSION );
		define( 'WPRSP_FILE', __FILE__ );
		define( 'WPRSP_PATH', __DIR__ );
		define( 'WPRSP_ASSETS', plugins_url( '', WPRSP_FILE ) . '/assets' );
		define( 'WPRSP_ASSETS_REACT', plugins_url( '', WPRSP_FILE ) . '/build' );
	}

	/**
	 * All the plugin functionality
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function plugin_functionality() {
		add_action( 'init', array( $this, 'register_assets' ) );
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
	}

	/**
	 * Register all the plugin assets
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function register_assets() {
		$index_asset = require WPRSP_PATH . '/build/index.asset.php';
		wp_register_script(
			'wprsp-index',
			WPRSP_ASSETS_REACT . '/index.js',
			$index_asset['dependencies'],
			$index_asset['version'],
			false
		);

		wp_register_style(
			'wprsp-style-css',
			WPRSP_ASSETS_REACT . '/index.css',
			array(),
			$index_asset['version']
		);
	}

	/**
	 * Display option menu.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function add_menu() {
		add_options_page(
			__( 'WP React Starter Plugin', 'wprsp' ),
			__( 'WP React Starter', 'wprsp' ),
			'manage_options',
			'wprsp_react_demo',
			array(
				$this,
				'settings_page',
			)
		);
	}

	/**
	 * Settings Page.
	 *
	 * @return void
	 */
	public function settings_page() {
		wp_enqueue_script( 'wprsp-index' );
		wp_enqueue_style( 'wprsp-style-css' );
		echo '<div class="wrap"><div id="wprsp"></div></div>';
	}
}

/**
 * Main function for calling the class
 * from other plugins.
 *
 * @since 1.0.0
 * @return WPReactStarterPlugin
 */
function wprsp() {
	return WPReactStarterPlugin::init();
}

wprsp();
