<?php

namespace app\controllers;

class UserController
{
    public function show($params){
        if(!isset($params['usuarios'])){
            return redirect('/');
        }

        $user = findBy('usuarios', 'IDUsuario', $params['usuarios']);
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
            'email' => 'email|unique:usuarios',   // | -> it's a pipe ("usaurios" esta realacionado com a tabela do db)
            'senha' => 'required|maxlen:10',
        ]);

        if(!$validate){
            return redirect('/user/create');
        }
    }
}