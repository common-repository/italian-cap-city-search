<?php
/*
 * Author: Principe Orazio - http://www.ricevitoriaonline.it
 * Date: 25/08/2016
 * Time: 08:59
 *
 * Version: 1.0
 */

$settings = wpics_load_widget_settings();
?>
<div class="wrap">
    <h1>Impostazioni widget</h1>
    <div class="card">
        <form method="post">
            <input type="hidden" name="wpics_option_form" id="wpics_option_form" value="1" />

            <h2>Selezionare i campi per cui si intende abilitare la ricerca all'interno del sito tramite il widget</h2>

            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="wpics_option_cap">Ricerca per cap</label>
                    </th>
                    <td>
                        <input type="checkbox" name="wpics_option_cap" id="wpics_option_cap"
                            <? if(@$settings->wpics_option_cap === true) echo ' checked="checked" ' ?>
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wpics_option_city">Ricerca per citt&agrave;</label>
                    </th>
                    <td>
                        <input type="checkbox" name="wpics_option_city" id="wpics_option_city"
                            <? if(@$settings->wpics_option_city === true) echo ' checked="checked" ' ?>
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wpics_option_address">Ricerca per indirizzo</label>
                    </th>
                    <td>
                        <input type="checkbox" name="wpics_option_address" id="wpics_option_address"
                            <? if(@$settings->wpics_option_address === true) echo ' checked="checked" ' ?>
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wpics_option_prov">Ricerca per provincia</label>
                    </th>
                    <td>
                        <input type="checkbox" name="wpics_option_prov" id="wpics_option_prov"
                            <? if(@$settings->wpics_option_prov === true) echo ' checked="checked" ' ?>
                        />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wpics_option_records">Numero di risultati</label>
                    </th>
                    <td>
                        <select name="wpics_option_records" id="wpics_option_records">
                            <option value="1" <?=((int) @$settings->wpics_option_records === 1) ? " selected='selected' " : ""?>>1</option>
                            <option value="5" <?=((int) @$settings->wpics_option_records === 5) ? " selected='selected' " : ""?>>5</option>
                            <option value="10" <?=((int) @$settings->wpics_option_records === 10) ? " selected='selected' " : ""?>>10</option>
                            <option value="20" <?=((int) @$settings->wpics_option_records === 20) ? " selected='selected' " : ""?>>20</option>
                            <option value="30" <?=((int) @$settings->wpics_option_records === 30) ? " selected='selected' " : ""?>>30</option>
                            <option value="40" <?=((int) @$settings->wpics_option_records === 40) ? " selected='selected' " : ""?>>40</option>
                            <option value="50" <?=((int) @$settings->wpics_option_records === 50) ? " selected='selected' " : ""?>>50</option>
                        </select>
                    </td>
                </tr>
            </table>

            <?=submit_button()?>
        </form>
    </div>
</div>
