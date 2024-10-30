<?php
/**
 * Author: Principe Orazio - http://www.ricevitoriaonline.it
 * Date: 25/08/2016
 * Time: 08:59
 *
 * Version: 1.0
 */
if (!defined("WPICS_PLUGIN_C")) {
    exit();
}
//Chiamata d'esempio per la cicerca cap di milano con cap esatto 20154 (corso como)
$citta = (string)trim($_POST['wpics_city']);
$indirizzo = (string)trim($_POST['wpics_address']);
$cap = (string)trim($_POST['wpics_cap']);
$prov = (string)trim($_POST['wpics_prov']);
$records = (int)trim($_POST['wpics_records']);

$list = Wp_Italian_Cap_Search::getCurlResults($citta, $indirizzo, $cap, $prov, $records);
if ($list) {
    //Verifico i risultati ottenuti
    ?>
    <div class="wrap">
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <td>
                        Cap
                    </td>
                    <th>
                        Comune
                    </th>
                    <th>Frazione / Indirizzo</th>
                    <th>
                        Provincia
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $res) {
                    $ver_citta = strtolower($res->comu_cap);
                    $ver_cap = strtolower($res->capi_cap);
                    ?>
                    <tr>
                        <td><?=$res->capi_cap?></td>
                        <td><?=$res->comu_cap?></td>
                        <td>
                            <?=$res->fraz_cap?>
                            <?=(!empty($res->addr_cap)) ? "<br>".$res->addr_cap : ""?>
                        </td>
                        <td class="no-break"><?=$res->prov_cap?></td>
                    </tr>
                    <?
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="manage-column column-cb check-column">
                        Cap
                    </td>
                    <th class="manage-column column-title column-primary sortable desc" scope="col">
                        Comune
                    </th>
                    <th class="manage-column column-author" scope="col">Frazione / Indirizzo</th>
                    <th class="manage-column column-comments num sortable desc" scope="col">
                        Provincia
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php
}
else {
    echo "Nessun risultato trovato";
}