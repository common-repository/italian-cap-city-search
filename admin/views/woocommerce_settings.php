<?php
/*
 * Author: Principe Orazio - http://www.ricevitoriaonline.it
 * Date: 25/08/2016
 * Time: 08:59
 *
 * Version: 1.0
 */

$settings = wpics_load_woocommerce_settings();
?>
<div class="wrap">
    <h1>Impostazioni WooCommerce</h1>
    <form method="post">
        <div class="card">

            <input type="hidden" name="wpics_option_form" id="wpics_option_form" value="1" />

            <h2>Indicare i nomi dei campi che vengono utilizzati da WooCommerce per l'inserimento del cap e della citt&agrave;</h2>

            <h3>Impostazioni per i campi di fatturazione</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="wpics_field_cap_name">Nome campo cap</label>
                    </th>
                    <td>
                        <input type="text" name="wpics_field_cap_name" id="wpics_field_cap_name"
                               value="<?=(empty($settings->wpics_field_cap_name)) ? 'billing_postcode' : esc_html($settings->wpics_field_cap_name) ?>"
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wpics_field_city_name">Nome campo citt&agrave;</label>
                    </th>
                    <td>
                        <input type="text" name="wpics_field_city_name" id="wpics_field_city_name"
                               value="<?=(empty($settings->wpics_field_city_name)) ? 'billing_city' : esc_html($settings->wpics_field_city_name) ?>"
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wpics_field_prov_name">Nome campo provincia</label>
                    </th>
                    <td>
                        <input type="text" name="wpics_field_prov_name" id="wpics_field_prov_name"
                               value="<?=(empty($settings->wpics_field_prov_name)) ? 'billing_state' : esc_html($settings->wpics_field_prov_name) ?>"
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wpics_field_country_name">Nome campo nazione</label>
                    </th>
                    <td>
                        <input type="text" name="wpics_field_country_name" id="wpics_field_country_name"
                               value="<?=(empty($settings->wpics_field_country_name)) ? 'billing_country' : esc_html($settings->wpics_field_country_name) ?>"
                        />
                    </td>
                </tr>
            </table>

        </div>
        <div class="card">
            <h3>Impostazioni per i campi di spedizione</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="wpics_field_cap_name_shipping">Nome campo cap</label>
                    </th>
                    <td>
                        <input type="text" name="wpics_field_cap_name_shipping" id="wpics_field_cap_name_shipping"
                               value="<?=(empty($settings->wpics_field_cap_name_shipping)) ? 'shipping_postcode' : esc_html($settings->wpics_field_cap_name_shipping) ?>"
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wpics_field_city_name_shipping">Nome campo citt&agrave;</label>
                    </th>
                    <td>
                        <input type="text" name="wpics_field_city_name_shipping" id="wpics_field_city_name_shipping"
                               value="<?=(empty($settings->wpics_field_city_name_shipping)) ? 'shipping_city' : esc_html($settings->wpics_field_city_name_shipping) ?>"
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wpics_field_prov_name_shipping">Nome campo provincia</label>
                    </th>
                    <td>
                        <input type="text" name="wpics_field_prov_name_shipping" id="wpics_field_prov_name_shipping"
                               value="<?=(empty($settings->wpics_field_prov_name_shipping)) ? 'shipping_state' : esc_html($settings->wpics_field_prov_name_shipping) ?>"
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wpics_field_country_name_shipping">Nome campo nazione</label>
                    </th>
                    <td>
                        <input type="text" name="wpics_field_country_name_shipping" id="wpics_field_country_name_shipping"
                               value="<?=(empty($settings->wpics_field_country_name_shipping)) ? 'shipping_country' : esc_html($settings->wpics_field_country_name_shipping) ?>"
                        />
                    </td>
                </tr>
            </table>

            <?=submit_button()?>
        </div>
    </form>
</div>
