<?php

namespace System;

class Request
{
    private string $controller;
    private string $action;
    private array $args = [];

    public function __construct()
    {
        $this->defineRequest();
    }

    private function defineRequest()
    {
        $request = $this->getRequestUri();
        $this->setController($request);
        $this->setAction($request);
        $this->setArgs($this->constructArgs($request) ?? []);
    }

    private function getRequestUri(): array
    {
        return explode('/', parse_url(substr($_SERVER['REQUEST_URI'], 1), PHP_URL_PATH));
    }

    private function constructArgs(array $request): array
    {
        if (count($request) >= 3) {
            return array_slice($request, 2);
        }
        return $request[2] ?? [];
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function setController(array $request): Request
    {
        $this->controller = !empty($request[0]) ? $request[0] : 'home';

        return $this;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(array $request): Request
    {
        $this->action = !empty($request[1]) ? $request[1] : 'main';

        return $this;
    }

    public function getArgs(): array
    {
        return $this->args;
    }

    public function setArgs($args): Request
    {
        $this->args = $args;

        return $this;
    }
}