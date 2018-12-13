<?php

namespace A2881dante\Cryptobirges;

/**
 * Created by PhpStorm.
 * User: a2881dante
 * Date: 04.09.2018
 * Time: 21:37
 */

class BitfinexApi implements CryptobirgeApi {
    function getTicker($crypto, $fiat) {
        if ($fiat != CryptobirgeApi::UAH) {
            $baseUrl = "https://api.bitfinex.com/v1/pubticker/";
            $currencyUri = $crypto . $fiat;
            $fullUrl = $baseUrl . $currencyUri;

            $response = CurlSetting::file_get_contents_curl($fullUrl);
            $object = json_decode($response);

            return ($object!=null)?$object->last_price:0;
        } else {
            return null;
        }
    }
}