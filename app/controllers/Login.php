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
        $password = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($email) || empty($password)) {
            return setMessageAndRedirect('message', 'Usuário', '/');
        }

        $user = findBy('usuarios', 'email', $email);


        if (!$user || !isset($user->Senha)) {
            return setMessageAndRedirect('message', 'Usuário e senha inválidos', '/');
        }

        if (!password_verify($password, $user->Senha)) {
            return setMessageAndRedirect('message', 'senha inválidos', '/');
        }

        $_SESSION[LOGGED] = $user;
        return redirect('/dashboard');
    }

    public function destroy()
    {
        unset($_SESSION[LOGGED]);

        return redirect('/');
    }
}