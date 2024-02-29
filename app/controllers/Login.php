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

        // if (!password_verify($password, $user->$password)) {
        //     return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/login');
        // }   
        
        // if (password_verify($password, $user->$password)) {
        //     // Check if either the algorithm or the options have changed
        //     if (password_needs_rehash($user->$password, $algorithm, $options)) {
        //         // If so, create a new hash, and replace the old one
        //         $newHash = password_hash($password, $algorithm, $options);
        //     }
        //     return setMessageAndRedirect('message', 'Usuário ou senha inválidos', '/login');
        // }

        $_SESSION[LOGGED] = $user;
        return redirect('/dashboard');
    }

    public function destroy(){
        unset($_SESSION[LOGGED]);

        return redirect('/login');
    }

}