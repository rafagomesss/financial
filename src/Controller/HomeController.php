<?php

namespace Financial\Controller;

use Financial\View\View;
use System\RequestAPI;

class HomeController
{

    public function main()
    {
        $resp = RequestAPI::sendRequest();
        // echo '<pre>' . print_r($resp, 1) . '</pre>';exit;
        $view = new View('site/home.phtml', true);
        $view->categorias = $resp ?? [];
        return $view->render();
    }
}
