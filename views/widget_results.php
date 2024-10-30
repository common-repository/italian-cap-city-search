<?php
/**
 * Created by PhpStorm.
 * User: oprincipe
 * Date: 25/08/16
 * Time: 17:18
 */
if( !defined( "WPICS_PLUGIN_C" ) ) {
    exit();
}

//Carico le impostazioni
$wpics_settings = wpics_load_widget_settings();

//Chiamata d'esempio per la cicerca cap di milano con cap esatto 20154 (corso como)
$cap     = (string)trim(esc_html(@$_POST['wpics_cap']));
$city    = (string)trim(esc_html(@$_POST['wpics_city']));
$address = (string)trim(esc_html(@$_POST['wpics_address']));
$prov    = (string)trim(esc_html(@$_POST['wpics_prov']));
$records = (int) @$wpics_settings->wpics_option_records;
if($records <= 0) {
    $records = 1;
}

$list = Wp_Italian_Cap_Search::getCurlResults($city, $address, $cap, $prov, $records);
if ($list) {
    //Verifico i risultati ottenuti
    ?>
    <table class="wp-list-table wpics-table-widget-results">
        <thead>
            <tr>
                <th class="wpics-widget-results-cap">Cap</th>
                <th class="wpics-widget-results-city">Comune (Provincia)</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($list as $res) {
            $ver_citta = strtolower($res->comu_cap);
            $ver_cap = strtolower($res->capi_cap);
            ?>
            <tr>
                <td class="wpics-widget-results-cap"><?=$res->capi_cap?></td>
                <td class="wpics-widget-results-city">
                    <span class="row-title">
                        <?=$res->comu_cap?> (<?=$res->prov_cap?>)
                    </span>
                    <?php
                    if(!empty($res->fraz_cap)) {
                        echo "<div class='small'>".$res->fraz_cap."</div>";
                    }
                    if(!empty($res->addr_cap)) {
                        echo "<div class='small'>".$res->addr_cap."</div>";
                    }
                    ?>
                </td>
            </tr>
            <?
        }
        ?>
        </tbody>
    </table>
    <?php
}