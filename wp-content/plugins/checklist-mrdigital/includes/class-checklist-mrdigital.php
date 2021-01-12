<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://mr-digital.co.uk
 * @since      1.0.0
 *
 * @package    Checklist_Mrdigital
 * @subpackage Checklist_Mrdigital/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Checklist_Mrdigital
 * @subpackage Checklist_Mrdigital/includes
 * @author     Gopu <gopu@mrdigital.co.uk>
 */
class Checklist_Mrdigital {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Checklist_Mrdigital_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'CHECKLIST_MRDIGITAL_VERSION' ) ) {
			$this->version = CHECKLIST_MRDIGITAL_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'checklist-mrdigital';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		add_action( 'init', array( $this, 'mrdc_create_post_type' ) );
	}

	public function mrdc_create_post_type() {


			 register_post_type('mrd_checklist',
					 array(
							 'labels' => array(
									 'name'               => _x( 'Checklists', 'mrdcposttype' ),
									 'singular_name'      => _x( 'Checklist', 'mrdcposttype'),
									 'menu_name'          => _x( 'Checklists', 'admin menu' ),
									 'name_admin_bar'     => _x( 'Checklist', 'admin menu' ),
									 'add_new'            => _x( 'Add New', 'mrdcposttype' ),
									 'add_new_item'       => __( 'Add New'),
									 'new_item'           => __( 'New Checklist'),
									 'edit_item'          => __( 'Edit Checklist'),
									 'view_item'          => __( 'View Checklist'),
									 'all_items'          => __( 'All Checklists'),
									 'search_items'       => __( 'Search Checklist'),
									 'parent_item_colon'  => __( 'Parent : Checklist'),
									 'not_found'          => __( 'No Checklists found.'),
									 'not_found_in_trash' => __( 'No Checklists found in Trash.' )
							 ),
							 'supports' => array("title", "thumbnail"),
							 'public'             => true,
							 'has_archive'        => false,
							 'hierarchical'       => false,
							 'rewrite'            => array( 'slug' => 'mrd-checklists' ),
							 'menu_icon'          => 'dashicons-carrot'
					 )
			 );

			 /*register_post_type('mrd_questions',
					 array(
							 'labels' => array(
									 'name'               => _x( 'Questions', 'mrdcposttype' ),
									 'singular_name'      => _x( 'Questions', 'mrdcposttype'),
									 'menu_name'          => _x( 'Questions', 'admin menu' ),
									 'name_admin_bar'     => _x( 'Questions', 'admin menu' ),
									 'add_new'            => _x( 'Add New Questions', 'mrdcposttype' ),
									 'add_new_item'       => __( 'Add New Questions'),
									 'new_item'           => __( 'New Questions'),
									 'edit_item'          => __( 'Edit Questions'),
									 'view_item'          => __( 'View Questions'),
									 'all_items'          => __( 'Questions'),
									 'search_items'       => __( 'Search Questions'),
									 'parent_item_colon'  => __( 'Parent : Questions'),
									 'not_found'          => __( 'No Questions found.'),
									 'not_found_in_trash' => __( 'No Questions found in Trash.' )
							 ),
							 'supports' => array("title", "editor"),
							 'public'             => true,
							 'has_archive'        => false,
							 'hierarchical'       => false,
							 'rewrite'            => array( 'slug' => 'mrd-questions' ),
							 'show_in_menu' => 'edit.php?post_type=mrd_checklist',
							 'menu_icon'          => 'dashicons-carrot'
					 )
			 );*/

			 register_post_type('mrd_question_group',
					 array(
							 'labels' => array(
									 'name'               => _x( 'Question Gorup', 'mrdcposttype' ),
									 'singular_name'      => _x( 'Question Gorup', 'mrdcposttype'),
									 'menu_name'          => _x( 'Question Gorup', 'admin menu' ),
									 'name_admin_bar'     => _x( 'Question Gorup', 'admin menu' ),
									 'add_new'            => _x( 'Add New', 'mrdcposttype' ),
									 'add_new_item'       => __( 'Add New Question Gorup'),
									 'new_item'           => __( 'New Question Gorup'),
									 'edit_item'          => __( 'Edit Question Gorup'),
									 'view_item'          => __( 'View Question Gorup'),
									 'all_items'          => __( 'Question Gorup'),
									 'search_items'       => __( 'Search Question Gorup'),
									 'parent_item_colon'  => __( 'Parent : Question Gorup'),
									 'not_found'          => __( 'No Question Gorup found.'),
									 'not_found_in_trash' => __( 'No Question Gorup found in Trash.' )
							 ),
							 'supports' => array("title"),
							 'public'             => true,
							 'has_archive'        => false,
							 'hierarchical'       => false,
							 'rewrite'            => array( 'slug' => 'mrd-questions' ),
							 'show_in_menu' => 'edit.php?post_type=mrd_checklist',
							 'menu_icon'          => 'dashicons-carrot'
					 )
			 );

	 }



	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Checklist_Mrdigital_Loader. Orchestrates the hooks of the plugin.
	 * - Checklist_Mrdigital_i18n. Defines internationalization functionality.
	 * - Checklist_Mrdigital_Admin. Defines all hooks for the admin area.
	 * - Checklist_Mrdigital_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-checklist-mrdigital-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-checklist-mrdigital-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-checklist-mrdigital-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-checklist-mrdigital-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-checklist-mrdigital-public.php';

		$this->loader = new Checklist_Mrdigital_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Checklist_Mrdigital_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Checklist_Mrdigital_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Checklist_Mrdigital_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Checklist_Mrdigital_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Checklist_Mrdigital_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
