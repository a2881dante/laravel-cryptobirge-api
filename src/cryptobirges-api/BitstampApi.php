<?php

namespace A2881dante\Cryptobirges;

/**
 * Created by PhpStorm.
 * User: a2881dante
 * Date: 04.09.2018
 * Time: 21:16
 */

class BitstampApi implements CryptobirgeApi {

    function getTicker($crypto, $fiat) {
        if ($fiat != CryptobirgeApi::UAH) {
            $baseUrl = "https://www.bitstamp.net/api/v2/ticker/";
            $currencyUri = $crypto . $fiat;
            $fullUrl = $baseUrl . $currencyUri;

            $response = CurlSetting::file_get_contents_curl($fullUrl);
            $object = json_decode($response);

            return $object->last;
        } else {
            return null;
        }
    }

}