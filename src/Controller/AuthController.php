<?php

namespace Financial\Controller;

use Financial\View\View;
use System\RequestAPI;

class AuthController
{
    public function __construct()
    {
    }

    private function validarDadosPost()
    {
        $dados = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $dados['password'] = sodium_crypto_pwhash_str(
            $dados['password'],
            SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
            SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
        );
        unset($dados['confirmPassword']);
        return $dados;
    }

    public function register()
    {
        $view = new View('auth/register.phtml', true);
        return $view->render();
    }

    public function authenticate()
    {
        $view = new View('auth/login.phtml', true);
        return $view->render();
    }

    public function saveRegisterData()
    {
        $param = $this->validarDadosPost();

        $postRequest = (new RequestAPI())->sendRequest('http://localhost:4000/usuario', $param);
        //$verify = sodium_crypto_pwhash_str_verify($password, '222222');
        echo '<pre>' . print_r($postRequest, 1) . '</pre>';
        exit();
    }
}
