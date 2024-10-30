<?php

/**
 * This class is an utility to check and verify postal codes
 * in Italy, search cities by name, postal code and city fractions
 *
 * It's very useful to everyone who want to use it to verify
 * a shipping address for own web shop
 *
 * The class use the curl library to call webservices offered by
 * the site: www.ricevitoriaonline.it
 *
 * Author: Principe Orazio - http://www.ricevitoriaonline.it
 * Date: 25/08/2016
 * Time: 08:59
 *
 * Version: 1.0
 */
class Wp_Italian_Cap_Search
{
    /**
     * The curl library
     * @var Curl $this->ch
     */
    private $ch;

    /**
     * The endpoint to call for every needs
     * @var string
     */
    private $endPoint = "http://www.ricevitoriaonline.it/cap/curl";


    /**
     * Wordpress Init function
     */
    public static function init()
    {

    }

    /**
     * Activate the plugin
     */
    public static function plugin_activation()
    {

    }

    /**
     * Deactivate the plugin
     */
    public static function deactivate()
    {

    }




    /**
     * Wp_Italian_Cap_Search constructor.
     */
    public function __construct()
    {
        //Init the curl library
        $this->ch = curl_init();
    }

    /**
     * Destroy the curl object
     */
    public function __destruct()
    {
        @curl_close($this->ch);
    }


    /**
     * Check if at least one param is filled to perform search
     *
     * @param $params
     */
    public static function paramsFilled($params)
    {
       foreach($params as $p)
       {
           if(!empty($p)) {
               return true;
           }
       }
       return false;
    }


    /**
     * Execute the curl call
     *
     * @param array $post_params
     *
     * return string the json object
     */
    private function executeCall($post_params = null)
    {
        // Call the endpoint
        curl_setopt($this->ch, CURLOPT_URL, $this->endPoint);

        // Send parameters to post if presents
        if(!empty($post_params)) {
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post_params);
        }

        // Request the content as string
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);


        return curl_exec($this->ch);
    }


    /**
     * It returns the data relating to a search for one or more of the specified parameters
     *
     * Fields are here described:
     *
     *  - prov_cap = provice
     *  - comu_cap = city
     *  - com2_cap = city extension
     *  - fraz_cap = city fraction
     *  - fra2_cap = city fraction extension
     *  - topo_cap = address name
     *  - top2_cap = address name extension
     *  - dugt_cap = address type (VIA, CORSO, PIAZZA etc)
     *  - nciv_cap = address numeration
     *  - addr_cap = complete address
     *  - capi_cap = postal code
     *
     * @param string $city          City for which you want to search
     * @param string $address       Address or the city for which you are searching
     * @param string $postalCode    Cap that you intend to check or search
     * @param string $prov    Cap that you intend to check or search
     * @param int    $records       Records you want to retrieve (Min. 1, Max. 50)
     *
     * @return json-object
     */
    public static function getCurlResults($city = "", $address = "", $postalCode = "", $prov = "", $records = 10)
    {
        $wpics = new Wp_Italian_Cap_Search();

        // Set parameters to post
        $post_params["citta"]       = (string) esc_html($city);
        $post_params["indirizzo"]   = (string) esc_html($address);
        $post_params["cap"]         = (string) esc_html($postalCode);
        $post_params["prov"]         = (string) esc_html($prov);
        if(!self::paramsFilled($post_params)) {
            return false;
        }

        $post_params["records"]     = (int) $records;

        //Make the call
        $json = $wpics->executeCall($post_params);

        if($json == false) {
            return false;
        }
        else {
            $results = json_decode($json);
            if($results->err == true) {
                return false;
            } //Errors occurred during search

            return $results->data;
        }

    }

}