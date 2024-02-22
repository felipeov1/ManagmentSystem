<?php

namespace app\controllers;

class Login
{
    public function index()
    {
        return [
            'view' => 'login.php',
            'data' => ['title' => 'Login']
        ];
    }

    public function store()
    {

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        if (empty($email) || empty($password)) {
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/');
        }

        $user = findBy('usuarios', 'email', $email);

        if (!$user) {
            return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/');
        }

        if (!password_verify($password, $user->$password)) {
            // return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/login');
        }       

        $_SESSION[LOGGED] = $user;
        return redirect('/home');


    }

    public function destroy(){
        unset($_SESSION[LOGGED]);

        return redirect('/');
    }

}