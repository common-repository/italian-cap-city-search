<?php
/**
 * Author: Principe Orazio - http://www.ricevitoriaonline.it
 * Date: 25/08/2016
 * Time: 08:59
 *
 * Version: 1.0
 */
if( !defined( "WPICS_PLUGIN_C" ) ) {
    exit();
}

global $wpcom_api_key, $akismet_api_host, $akismet_api_port;

$wpcom_api_key    = defined( 'WPCOM_API_KEY' ) ? constant( 'WPCOM_API_KEY' ) : '';

/**
 * Load settings from file used by widget
 *
 * @return stdClass
 */
function wpics_load_widget_settings()
{
    $content = @file_get_contents(WPICS__PLUGIN_WIDGET_SETTINGS_FILE);
    if(empty($content)) {
        return false;
    }
    else return json_decode($content);
}

/********* WOOCOMMERCE INTEGRATION ****************/

/**
 * Load settings from file used when user interact with woocommerce forms
 *
 * @return stdClass
 */
function wpics_load_woocommerce_settings()
{
    $content = @file_get_contents(WPICS__PLUGIN_WOOCOMMERCE_SETTINGS_FILE);
    if(empty($content)) {

        //Configurazione vuota, imposto i valori di default
        $cls = new stdClass();
        $cls->field_cap = "billing_postcode";
        $cls->field_city = "billing_city";
        $cls->field_country = "billing_country";
        return $cls;
    }
    else return json_decode($content);
}

/**
 * This function add the javascript code used to verify address fields
 */
function wpics_woocommerce_add_verify_javascript()
{
    //Get page title
    $is_shipping_address = strpos($_SERVER['REQUEST_URI'], "/shipping/") !== false;

    //Load woosettings
    $settings = wpics_load_woocommerce_settings();
    ?>
    <script>
        var __wpics__field_cap      = "<?=($is_shipping_address) ? $settings->wpics_field_cap_name_shipping : $settings->wpics_field_cap_name?>";
        var __wpics__field_city     = "<?=($is_shipping_address) ? $settings->wpics_field_city_name_shipping : $settings->wpics_field_city_name?>";
        var __wpics__field_state    = "<?=($is_shipping_address) ? $settings->wpics_field_prov_name_shipping : $settings->wpics_field_prov_name?>";
        var __wpics__field_country  = "<?=($is_shipping_address) ? $settings->wpics_field_country_name_shipping : $settings->wpics_field_country_name?>";
    </script>
    <?

    wp_register_style('wpics-checkout-css', WPICS_PLUGIN_URL."css/wpics-woocommerce-checkout-min.css" );
    wp_enqueue_style('wpics-checkout-css');

    wp_register_script( 'wpics-checkout-script', WPICS_PLUGIN_URL."js/wpics-woocommerce-checkout-min.js" );
    wp_enqueue_script( 'wpics-checkout-script' );

}

add_action( 'woocommerce_after_checkout_form', 'wpics_woocommerce_add_verify_javascript');
add_action( 'woocommerce_after_edit_account_address_form', 'wpics_woocommerce_add_verify_javascript');
/********* END WOOCOMMERCE INTEGRATION ****************/