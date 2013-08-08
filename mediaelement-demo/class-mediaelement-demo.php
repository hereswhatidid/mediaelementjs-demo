<?php
/**
 * Plugin Name.
 *
 * @package   MediaElement_Demo
 * @author    Gabe Shackle <gabe@hereswhatidid.com>
 * @license   GPL-2.0+
 * @link      http://hereswhatidid.com
 * @copyright 2013 Gabe Shackle
 */

/**
 * Plugin class.
 *
 * TODO: Rename this class to a proper name for your plugin.
 *
 * @package MediaElement_Demo
 * @author  Gabe Shackle <gabe@hereswhatidid.com>
 */
class MediaElement_Demo {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	protected $version = '1.0.0';

	/**
	 * Unique identifier for your plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'mediaelement-demo';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Add the options page and menu item.
		 add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		// Load admin style sheet and JavaScript.
		// add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		// add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

		$logevents= get_option( $this->plugin_slug . '_logevents' );

		if ( $logevents == 1 ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_log_scripts' ) );
		}
		add_action('admin_init', array( $this, 'initialize_plugin_options') );

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Fired when the plugin is activated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public static function activate( $network_wide ) {
		if ( false === get_option( $this->plugin_slug . '_logevents' ) ) {
			add_option( $this->plugin_slug . '_logevents', '' );
		}
		if ( false === get_option( $this->plugin_slug . '_playerstyle' ) ) {
			add_option( $this->plugin_slug . '_playerstyle', 'default' );
		}
	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses "Network Deactivate" action, false if WPMU is disabled or plugin is deactivated on an individual blog.
	 */
	public static function deactivate( $network_wide ) {
		if ( false !== get_option( $this->plugin_slug . '_logevents' ) ) {
			delete_option( $this->plugin_slug . '_logevents' );
		}
		if ( false !== get_option( $this->plugin_slug . '_playerstyle' ) ) {
			delete_option( $this->plugin_slug . '_playerstyle' );
		}
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	}

	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_styles() {

		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $screen->id == $this->plugin_screen_hook_suffix ) {
			wp_enqueue_style( $this->plugin_slug .'-admin-styles', plugins_url( 'css/admin.css', __FILE__ ), array(), $this->version );
		}

	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_scripts() {

		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $screen->id == $this->plugin_screen_hook_suffix ) {
			wp_enqueue_script( $this->plugin_slug . '-admin-script', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery' ), $this->version );
		}

	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		$playerStyle = get_option( $this->plugin_slug . '_playerstyle' );

		switch( $playerStyle ) {
			case 'oogly':
				wp_enqueue_style( 'custom-mediaelement', plugins_url( 'playerskins/oogly/mediaelementplayer.css', __FILE__ ), array( 'wp-mediaelement' ), $this->version );
				break;
			case 'yellow':
				wp_deregister_style( 'mediaelement' );
				wp_register_style( 'mediaelement', plugins_url( 'playerskins/yellow/mediaelementplayer.css', __FILE__ ), array( ), $this->version );
				break;
		}
		
	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_log_scripts() {
		wp_enqueue_script( $this->plugin_slug . '-plugin-script', plugins_url( 'js/public.js', __FILE__ ), array( 'jquery', 'wp-mediaelement' ), $this->version );
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'MediaElement Demo Options', $this->plugin_slug ),
			__( 'MediaElement Demo', $this->plugin_slug ),
			'read',
			$this->plugin_slug . '_settings',
			array( $this, 'display_plugin_admin_page' )
		);


	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {
		include_once( 'views/admin.php' );
	}

	/**
	 * Initialize the plugin options
	 *
	 * @since    1.0.0
	 */

	public function initialize_plugin_options() {

		if ( false === get_option( $this->plugin_slug . '_logevents' ) ) {
			add_option( $this->plugin_slug . '_logevents' );
		}
		if ( false === get_option( $this->plugin_slug . '_playerstyle' ) ) {
			add_option( $this->plugin_slug . '_playerstyle' );
		}

		add_settings_section(
			$this->plugin_slug . '_settings_section',
			__( 'MediaElement Demo Settings', $this->plugin_slug ),
			array( $this, 'settings_callback' ),
			$this->plugin_screen_hook_suffix
		);

		add_settings_field(
			$this->plugin_slug . '_logevents',
			__( 'Log player events', $this->plugin_slug ),
			array( $this, 'settings_logevents_callback' ),
			$this->plugin_screen_hook_suffix,
			$this->plugin_slug . '_settings_section',
			array(
				__( 'The player events will be logged to your browser\'s console.', $this->plugin_slug )
			)
		);

		add_settings_field(
			$this->plugin_slug . '_playerstyle',
			__( 'Player style', $this->plugin_slug ),
			array( $this, 'settings_playerstyle_callback' ),
			$this->plugin_screen_hook_suffix,
			$this->plugin_slug . '_settings_section',
			array(
				array(
					'default' => 'Default',
					'oogly' => 'Oogly',
					'yellow' => 'Yellow'
				)
			)
		);

		register_setting(
			$this->plugin_screen_hook_suffix,
			$this->plugin_slug . '_logevents'
		);
		register_setting(
			$this->plugin_screen_hook_suffix,
			$this->plugin_slug . '_playerstyle'
		);
	}

	public function settings_callback() {
		
	}

	public function settings_logevents_callback($args) {

		$value = get_option( $this->plugin_slug . '_logevents' );
		$fieldname = $this->plugin_slug . '_logevents';

		$html = '<label><input type="checkbox" name="' . $fieldname . '" id="' . $fieldname . '" value="1" ' . checked( $value, 1, false ) . ' /> ';
		$html .= $args[0] . '</label>';

		echo $html;

	}

	public function settings_playerstyle_callback($args) {

		$value = get_option( $this->plugin_slug . '_playerstyle' );
		$fieldname = $this->plugin_slug . '_playerstyle';

		$html = '<select name="' . $fieldname . '" id="' . $fieldname . '" style="width: 30%">';
		foreach( $args[0] as $index => $option ) {
			$html .= '<option value="' . $index . '" ' . selected( $value, $index, false ) . '>' . $option . '</option>';
		}
		$html .= '</select>';

		echo $html;

	}

}