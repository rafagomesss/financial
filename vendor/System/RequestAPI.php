<?php

namespace System;

class RequestAPI
{
    public function __construct()
    {
    }

    public function sendRequest(string $url, array $params = [])
    {
        $sendPost = (bool) count($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $sendPost);
        if ($sendPost) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $resp;
    }
}
