<?php

namespace Financial\Controller;

use Financial\View\View;

class HomeController
{

    public function main()
    {
        $ch = curl_init();
        $url = 'http://localhost:4040/categorias';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = json_decode(curl_exec($ch), true);
        curl_close($ch);
        // echo '<pre>' . print_r($resp, 1) . '</pre>';exit;
        $view = new View('site/home.phtml', true);
        $view->categorias = $resp ?? [];
        return $view->render();
    }
}