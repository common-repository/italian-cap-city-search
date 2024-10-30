/**
* Author: Principe Orazio - http://www.ricevitoriaonline.it
* Date: 25/08/2016
* Time: 08:59
*
* Version: 1.0
*
* Minified Version
*/
var __WPICS_ENDPOINT__="http://www.ricevitoriaonline.it";(function($){function wpics_verifyCap(){var _cap=$("#"+__wpics__field_cap).val();var _city=$("#"+__wpics__field_city).val();var _prov=$("#"+__wpics__field_state).val();var _country=$("#"+__wpics__field_country).val();if(_cap==""||_city==""){return true}if(_country.toUpperCase()!="IT"){return true}$("#"+__wpics__field_cap).removeClass("wpics-bg-error");$("#"+__wpics__field_city).removeClass("wpics-bg-error");$("#"+__wpics__field_state).removeClass("wpics-bg-error");$.post(__WPICS_ENDPOINT__+"/cap/curl",{cap:_cap,citta:_city,prov:_prov,verify:true},function(data){if(data.err){$("#"+__wpics__field_cap).addClass("wpics-bg-error");$("#"+__wpics__field_city).addClass("wpics-bg-error");$("#"+__wpics__field_state).addClass("wpics-bg-error");return false}else{return true}},"json");return false}$("#"+__wpics__field_cap).blur(wpics_verifyCap);$("#"+__wpics__field_city).blur(wpics_verifyCap);$("#"+__wpics__field_state).blur(wpics_verifyCap)})(jQuery);