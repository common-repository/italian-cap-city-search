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

$wpics_settings = wpics_load_widget_settings();
?>
<div class="wrap">
    <h1>Ricerca Cap, Città e indirizzi</h1>
    <form method="post" action="">
        <input type="hidden" name="wpics_search_form" id="wpics_search_form" value="1" />
        <table class="wp-list-table widefat striped">
            <tr>
                <th>Città:</th>
                <td>
                    <input type="text" name="wpics_city" id="wpics_city" value="<?=htmlspecialchars(@$_POST['wpics_city'])?>">
                </td>
                <th>Via:</th>
                <td>
                    <input type="text" name="wpics_address" id="wpics_address" value="<?=htmlspecialchars(@$_POST['wpics_address'])?>">
                </td>
                <th>Cap:</th>
                <td>
                    <input type="text" name="wpics_cap" id="wpics_cap" value="<?=htmlspecialchars(@$_POST['wpics_cap'])?>">
                </td>
                <th>Provincia (Indicare la sigla es: MI):</th>
                <td>
                    <input type="text" name="wpics_prov" id="wpics_prov" value="<?=htmlspecialchars(@$_POST['wpics_prov'])?>">
                </td>
                <th>Risultati:</th>
                <td>
                    <select name="wpics_records" id="wpics_records">
                        <option value="1" <?=((int) @$_POST["wpics_records"] === 1) ? " selected='selected' " : ""?>>1</option>
                        <option value="5" <?=((int) @$_POST["wpics_records"] === 5) ? " selected='selected' " : ""?>>5</option>
                        <option value="10" <?=((int) @$_POST["wpics_records"] === 10) ? " selected='selected' " : ""?>>10</option>
                        <option value="20" <?=((int) @$_POST["wpics_records"] === 20) ? " selected='selected' " : ""?>>20</option>
                        <option value="30" <?=((int) @$_POST["wpics_records"] === 30) ? " selected='selected' " : ""?>>30</option>
                        <option value="40" <?=((int) @$_POST["wpics_records"] === 40) ? " selected='selected' " : ""?>>40</option>
                        <option value="50" <?=((int) @$_POST["wpics_records"] === 50) ? " selected='selected' " : ""?>>50</option>
                    </select>
                </td>
            </tr>
        </table>

        <br><p><input type="submit" class="button-primary" name="wpics_cmdAction" value="Cerca"></p>
    </form>
</div>


<?php
if(!empty($_POST['wpics_search_form']) && (int) @$_POST['wpics_search_form'] === 1) {
    require_once( WPICS__PLUGIN_ADMIN_DIR."views/search_form_results.php");
}
?>