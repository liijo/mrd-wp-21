<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://mr-digital.co.uk
 * @since      1.0.0
 *
 * @package    Checklist_Mrdigital
 * @subpackage Checklist_Mrdigital/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Checklist_Mrdigital
 * @subpackage Checklist_Mrdigital/public
 * @author     Gopu <gopu@mrdigital.co.uk>
 */
class Checklist_Mrdigital_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Checklist_Mrdigital_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Checklist_Mrdigital_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/checklist-mrdigital-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Checklist_Mrdigital_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Checklist_Mrdigital_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'google-chart', 'https://www.gstatic.com/charts/loader.js', '', $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/checklist-mrdigital-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'checklist_ajax', plugin_dir_url( __FILE__ ) . 'js/checklist-mrdigital-ajax.js', array( 'jquery' ), $this->version, false );
		wp_localize_script('checklist_ajax', 'ajaxcalls_vars', 
            array(
                    'admin_url'             =>  get_admin_url(),
                )
     		);

	}

}
