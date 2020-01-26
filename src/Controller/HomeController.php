<?php

namespace Financial\Controller;

use Financial\View\View;

class HomeController
{

    public function main()
    {
        $view = new View('site/home.phtml', true);
        return $view->render();
    }
}