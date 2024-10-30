<?php

/*
Plugin Name: Wp Italian Cap/Cities Search
Plugin URI: http://www.ricevitoriaonline.it/wp-cap-search-updates
Description: This plugin let you search the correct postal code or city based on one of them
Version: 1.0
Author: Principe Orazio - http://www.ricevitoriaonline.it
Author URI: http://www.ricevitoriaonline.it/wp-cap-search
License: A "GPL2"
*/

define("WPICS_PLUGIN_PATH", plugin_dir_path(__FILE__));
define("WPICS_PLUGIN_URL", plugin_dir_url( __FILE__ ) );

//Verifica payloads
define("WPICS_PLUGIN_C", "1");

if( !defined( "WPICS_PLUGIN_C" ) ) {
    exit();
}

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

define( 'WPICS_VERSION', '3.1.11' );
define( 'WPICS__MINIMUM_WP_VERSION', '3.2' );
define( 'WPICS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPICS__PLUGIN_ADMIN_DIR', WPICS__PLUGIN_DIR."admin/" );
define( 'WPICS__PLUGIN_WIDGET_SETTINGS_FILE', WPICS__PLUGIN_DIR."widget-settings.php" );
define( 'WPICS__PLUGIN_WOOCOMMERCE_SETTINGS_FILE', WPICS__PLUGIN_DIR."woocommerce-settings.php" );

define( 'WPICS_DELETE_LIMIT', 100000 );


//Hooks to de/activate the plugin
register_activation_hook( __FILE__, array( 'Wp_Italian_Cap_Search', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Wp_Italian_Cap_Search', 'plugin_deactivation' ) );

require_once( WPICS__PLUGIN_DIR . 'class.wp-italian-cap-search.php' );
require_once( WPICS__PLUGIN_DIR . 'class.wp-italian-cap-search-widget.php' );
require_once( WPICS__PLUGIN_DIR . 'class.wp-italian-cap-results-widget.php' );
add_action( 'init', array( 'Wp_Italian_Cap_Search', 'init' ) );


if ( is_admin() ) {
    //require_once( WPICS__PLUGIN_DIR . 'class.wpItalianCapSearch-admin.php' );
    require_once( WPICS__PLUGIN_ADMIN_DIR . 'admin.php' );
}

//add wrapper class
require_once( WPICS__PLUGIN_DIR . 'wrapper.php' );
