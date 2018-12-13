<?php

namespace A2881dante\Cryptobirges;

/**
 * Created by PhpStorm.
 * User: Danyl Chabanovskyi
 * Date: 04.09.2018
 * Time: 21:11
 */
interface CryptobirgeApi
{

    const ETH = "ETH";
    const BTC = "BTC";

    const USD = "USD";
    const EUR = "EUR";
    const UAH = "UAH";

    function getTicker($crypto, $fiat);

}