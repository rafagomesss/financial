<?php

namespace Financial\Controller;

use Financial\View\View;

class LoginController
{
    public function main()
    {
        $view = new View('auth/login.phtml', true);
        return $view->render();
    }
}