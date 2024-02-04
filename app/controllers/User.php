<?php

namespace app\controllers;

class User
{
    public function show($params){
        if(!isset($params['usuarios'])){
            return redirect('/');
        }

        $user = findBy('usuarios', 'id', $params['usuarios']);
        var_dump($user);
        die();
    }


    public function create(){
        return[
            'view' => 'createUser.php',
            'data' => ['title' => 'Create']
        ];
    }

    public function store(){
        $validate = validate([
            'nome' => 'required',
            'email' => 'email|unique',
            'password' => 'required|maxlen',
        ]);

        if(!$validate){
            return redirect('/user/create');
        }
    }
}