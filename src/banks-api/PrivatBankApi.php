<?php

namespace A2881dante\Cryptobirges;

/**
 * Created by PhpStorm.
 * User: a2881dante
 * Date: 06.09.2018
 * Time: 20:16
 */

class PrivatBankApi {

    const USD = "USD";
    const EUR = "EUR";
    const RUR = "UAH";

    function exchange($fiat) {
        $url = "https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11";
        $response = CurlSetting::file_get_contents_curl($url);
        $object = json_decode($response);

        for ($i = 0; $i < 4; $i++) {
            if ($object[$i]->ccy == $fiat) {
                return $object[$i]->sale;
            }
        }
    }

}