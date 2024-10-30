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

$wpics_settings = wpics_load_widget_settings();
?>
<form method="post" action="">
    <? if($wpics_settings->wpics_option_city === true) { ?>
    <div>Città: <input type="text" name="wpics_city" id="wpics_city" value="<?=esc_html(@$_POST['wpics_city'])?>"></div>
    <? } ?>

    <? if($wpics_settings->wpics_option_address === true) { ?>
    <div>Via: <input type="text" name="wpics_address" id="wpics_address" value="<?=esc_html(@$_POST['wpics_address'])?>"></div>
    <? } ?>

    <? if($wpics_settings->wpics_option_cap === true) { ?>
        <div>Cap: <input type="text" name="wpics_cap" id="wpics_cap" value="<?=esc_html(@$_POST['wpics_cap'])?>"></div>
    <? } ?>

    <? if($wpics_settings->wpics_option_prov === true) { ?>
        <div>Cap: <input type="text" name="wpics_prov" id="wpics_prov" value="<?=esc_html(@$_POST['wpics_prov'])?>"></div>
    <? } ?>

    <br><p><input type="submit" class="col-xs-12" name="wpics_cmdAction" value="Cerca"></p>
</form>
