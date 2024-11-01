<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.terrytsang.com
 * @since      1.0.0
 *
 * @package    WP30_By_Who
 * @subpackage WP30_By_Who/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP30_By_Who
 * @subpackage WP30_By_Who/admin
 * @author     Terry Tsang <terry@terrytsang.com>
 */
class WP30_By_Who_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wp30_by_who    The ID of this plugin.
	 */
	private $wp30_by_who;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $wp30_by_who       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp30_by_who, $version ) {

		$this->wp30_by_who = $wp30_by_who;
		$this->version = $version;

		$this->load_dependencies();

	}

	/**
	 * Load the required dependencies for the Admin facing functionality.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WP30_By_Who_Admin_Settings. Registers the admin settings and page.
	 *
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/class-wp30-by-who-settings.php';

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP30_By_Who_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP30_By_Who_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wp30_by_who, plugin_dir_url( __FILE__ ) . 'css/wp30-by-who-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP30_By_Who_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP30_By_Who_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wp30_by_who, plugin_dir_url( __FILE__ ) . 'js/wp30-by-who-admin.js', array( 'jquery' ), $this->version, false );

	}

}
