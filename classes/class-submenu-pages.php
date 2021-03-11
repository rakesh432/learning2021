<?php
/**
 * Creates the submenu page for the plugin.
 *
 * @package Custom_Admin_Settings
 */
 
/**
 * Creates the submenu page for the plugin.
 *
 * Provides the functionality necessary for rendering the page corresponding
 * to the submenu with which this page is associated.
 *
 * @package Custom_Admin_Settings
 */
class Submenu_Page {
 
        /**
     * This function renders the contents of the page associated with the Submenu
     * that invokes the render method. In the context of this plugin, this is the
     * Submenu class.
     */
    public function render() {
        include_once( plugin_dir_path( __FILE__ ) . '../pages/render.php' );
    }
	
	public function add_payment() {
        include_once( plugin_dir_path( __FILE__ ) . '../pages/add_payment.php' );
    }
	
	
	
}