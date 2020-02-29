<?php

namespace System;

class RequestAPI
{
    public function __construct()
    {
    }

    public static function sendRequest()
    {
        $ch = curl_init();
        $url = 'http://localhost:4040/categorias';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $resp;
    }
}
