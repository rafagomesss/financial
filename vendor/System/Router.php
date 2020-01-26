<?php

namespace System;

use System\Request;

class Router extends Request
{

    public function __construct()
    {
        parent::__construct();
    }

    private function checkControllerExists(): bool
    {
        $this->setController(['Financial\Controller\\' . ucfirst($this->getController()) . 'Controller']);
        return class_exists($this->getController());
    }

    private function checkMethodExists()
    {
        return method_exists($this->getController(), $this->getAction());
    }

    public function run()
    {
        if (!$this->checkControllerExists() || !$this->checkMethodExists()) {
            self::notFound();
        }

        /**
         * ? POR ALGUM MOTIVO O PHP NÃO DEIXA
         * ? INSERIR O MÉTODO DIRETAMENTE PARA CHAMAR O NEW
         * ? EX: new $this->getController()
         */
        $controller = $this->getController();

        print call_user_func_array(
            [
                new $controller(),
                $this->getAction()
            ],
            $this->getArgs()
        );

    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public static function notFound()
    {
        print(new \Financial\View\View('/404.phtml', true))->render();
        exit();
    }
}