<?php

namespace A2881dante\Cryptobirges;

/**
 * Created by PhpStorm.
 * User: a2881dante
 * Date: 07.09.2018
 * Time: 11:08
 */
class Cryptobirge {

    function __construct() {
    }

    function avgTickerAllCurrencies($cryptoCurrencies, $fiatCurrencies) {
        $cApi = array(
            new BitstampApi(),
            new BitfinexApi(),
            new KrakenApi()
        );
        $pbApi = new PrivatBankApi();
        $result = array();

        foreach ($cryptoCurrencies as $crypto) {
            foreach ($fiatCurrencies as $fiat => $value) {
                $sum = 0;
                $count = 0;

                foreach ($cApi as $c) {
                    $response = $c->getTicker($crypto, $fiat);
                    $sum += $response;
                    if ($response > 0) $count++;
                }

                $result[$crypto][$fiat] = $sum / $count;
            }

            $result[$crypto][Cryptobirge::UAH] = $result[$crypto][Cryptobirge::USD]
                * $pbApi->exchange('USD');
        }

        return $result;
    }

}