<?php
/**
 * Creates the submenu item for the plugin.
 *
 * @package Custom_Admin_Settings
 */
 
/**
 * Creates the submenu item for the plugin.
 *
 * Registers a new menu item under 'Tools' and uses the dependency passed into
 * the constructor in order to display the page corresponding to this menu item.
 *
 * @package Custom_Admin_Settings
 */
class Submenu {
 
        /**
     * A reference the class responsible for rendering the submenu page.
     *
     * @var    Submenu_Page
     * @access private
     */
    private $submenu_page;
 
    /**
     * Initializes all of the partial classes.
     *
     * @param Submenu_Page $submenu_page A reference to the class that renders the
     *                                                                   page for the plugin.
     */
    public function __construct( $submenu_page ) {
        $this->submenu_page = $submenu_page;
    }
 
    /**
     * Adds a submenu for this plugin to the 'Tools' menu.
     */
    public function init() {
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
        add_action( 'admin_menu', array( $this, 'wp_enqueue_scripts' ) );
    }
 
    /**
     * Creates the submenu item and calls on the Submenu Page object to render
     * the actual contents of the page.
     */
    public function add_options_page() {
 
		add_menu_page( 'Book Now', 'Book Now', 'activate_plugins', 'book-now', array( $this->submenu_page, 'render' ) );
		
		add_submenu_page( 'book-data', 'Payment', 'Add Payment', 'activate_plugins', 'add-province', array($this->submenu_page, 'add_payment') );
		

    }
	
	public function wp_enqueue_scripts() {
		
		wp_enqueue_style('layout', plugins_url( '../css/bootstrap.min.css',__FILE__ ) );
		wp_enqueue_style('custom_data', plugins_url( '../css/custom_data.css',__FILE__ ) );
		wp_enqueue_script( 'the_js_bootstrap', plugins_url( '../js/bootstrap.min.js',__FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'winners_js', plugins_url( '../js/custom_data.js',__FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'jquery_dataTables', plugins_url( '../js/jquery.dataTables.min.js',__FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'dataTables_bootstrap', plugins_url( '../js/dataTables.bootstrap.min.js',__FILE__ ), array( 'jquery' ) );
	}
}






// themeforest-GZPidqVe-kalium-creative-theme-for-professionals-wordpress-theme