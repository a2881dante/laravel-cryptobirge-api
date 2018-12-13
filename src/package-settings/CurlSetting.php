<?php

namespace A2881dante\Cryptobirges;

/**
 * Created by PhpStorm.
 * User: a2881dante
 * Date: 05.09.2018
 * Time: 10:10
 */

class CurlSetting{
    public static function file_get_contents_curl($url) {

        $ch = curl_init();
        curl_setopt_array($ch, array(
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true)
        );
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;

    }
}