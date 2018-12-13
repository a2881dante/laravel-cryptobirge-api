<?php

namespace A2881dante\Cryptobirges;

/**
 * Created by PhpStorm.
 * User: a2881dante
 * Date: 05.09.2018
 * Time: 08:49
 */

class KrakenApi implements CryptobirgeApi {

    function getTicker($crypto, $fiat) {
        if ($crypto == CryptobirgeApi::BTC) {
            $crypto = "XBT";
        }
        if ($fiat != CryptobirgeApi::UAH) {
            $baseUrl = "https://api.kraken.com/0/public/Ticker";
            $currencyUri = "?pair=" . $crypto . $fiat;
            $fullUrl = $baseUrl . $currencyUri;

            $response = CurlSetting::file_get_contents_curl($fullUrl);
            $object = json_decode($response);
            $exchange = "X{$crypto}Z{$fiat}";

            return ($object!=null)?$object->result->$exchange->a[0]:0;
        }
    }

}