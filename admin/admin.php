<?php
/**
 * Author: Principe Orazio - http://www.ricevitoriaonline.it
 * Date: 25/08/2016
 * Time: 08:59
 *
 * Version: 1.0
 *
 * Administration functions file
 */
if( !defined( "WPICS_PLUGIN_C" ) ) {
    exit();
}

add_action("admin_menu", "wpics_plugin_setup_menu");

/**
 * Function to create admin menu
 */
function wpics_plugin_setup_menu()
{
    //add_menu_page( 'Italian Cap Search', 'Cap/City Search', 'manage_options', 'wpics-plugin' );
    //add_submenu_page('manage_options','Opzioni Widget','Opzioni Widget', 'wpics-plugin', 'wpics-plugin-options', 'wpics_widget_settings');

    add_menu_page('Italian Cap Search', 'Cap/City Search', 'manage_options', 'wpics-settings');

    add_submenu_page( 'wpics-settings', 'Widget settings', 'Widget settings',
                      'manage_options', 'wpics-settings', 'wpics_widget_settings');

    add_submenu_page( 'wpics-settings', 'WooCommerce settings', 'WooCommerce settings',
                      'manage_options', 'wpics-woo-settings', 'wpics_woocommerce_settings');

    add_submenu_page( 'wpics-settings', 'Cap/City Search', 'Cap/City Search',
                      'manage_options', 'wpics-search', 'wpics_search_form');

}

/**
 * Function to create the search form on the admin area
 */
function wpics_search_form()
{
    require_once(WPICS__PLUGIN_ADMIN_DIR."views/search_form.php");
}


/********* WIDGET SETTINGS ****************/
/**
 * Check values when submit the form for the widget settings
 */
function wpics_settings_widget_handle_posts()
{
    if(isset($_POST['wpics_option_form']) && (int) @$_POST['wpics_option_form'] === 1) {
        $settings = [
            "wpics_option_cap" => (boolean) @$_POST["wpics_option_cap"],
            "wpics_option_city" => (boolean) @$_POST["wpics_option_city"],
            "wpics_option_address" => (boolean) @$_POST["wpics_option_address"],
            "wpics_option_records" => (int) @$_POST["wpics_option_records"],
        ];
        wpics_write_widget_settings($settings);
    }
}

/**
 * Write settings for the widget
 */
function wpics_write_widget_settings($settings)
{
    file_put_contents(WPICS__PLUGIN_WIDGET_SETTINGS_FILE, json_encode($settings));
}

/**
 * Show the settings page for the widget
 */
function wpics_widget_settings(){
    wpics_settings_widget_handle_posts();
    require_once(WPICS__PLUGIN_ADMIN_DIR."views/widget_settings.php");
}
/********* END WIDGET SETTINGS ****************/


/********* WOOCOMMERCE INTEGRATION ****************/
/**
 * Check values when submit the form for the woocommerce integration settings
 */
function wpics_settings_woocommerce_handle_posts()
{
    if(isset($_POST['wpics_option_form']) && (int) @$_POST['wpics_option_form'] === 1) {
        $settings = [
            "wpics_field_cap_name" => (string) esc_html($_POST["wpics_field_cap_name"]),
            "wpics_field_city_name" => (string) esc_html($_POST["wpics_field_city_name"]),
            "wpics_field_prov_name" => (string) esc_html($_POST["wpics_field_prov_name"]),
            "wpics_field_country_name" => (string) esc_html($_POST["wpics_field_country_name"]),

            "wpics_field_cap_name_shipping" => (string) esc_html($_POST["wpics_field_cap_name_shipping"]),
            "wpics_field_city_name_shipping" => (string) esc_html($_POST["wpics_field_city_name_shipping"]),
            "wpics_field_prov_name_shipping" => (string) esc_html($_POST["wpics_field_prov_name_shipping"]),
            "wpics_field_country_name_shipping" => (string) esc_html($_POST["wpics_field_country_name_shipping"])
        ];
        wpics_write_woocommerce_settings($settings);
    }
}

/**
 * Write settings for the woocommerce fields integration
 */
function wpics_write_woocommerce_settings($settings)
{
    file_put_contents(WPICS__PLUGIN_WOOCOMMERCE_SETTINGS_FILE, json_encode($settings));
}

/**
 * Show the settings page for the woocommerce
 */
function wpics_woocommerce_settings(){
    wpics_settings_woocommerce_handle_posts();
    require_once(WPICS__PLUGIN_ADMIN_DIR."views/woocommerce_settings.php");
}
/********* END WOOCOMMERCE INTEGRATION ****************/


