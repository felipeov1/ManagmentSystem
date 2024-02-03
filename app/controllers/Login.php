<?php

namespace app\controllers;

class Login
{
    public function index(){
        return[
            'view' => 'login.php',
            'data' => ['title' => 'login']
        ];
    }

    public function store(){
        var_dump('login');
        die();
    }
}