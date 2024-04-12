<?php

namespace app\controllers;

class User
{
    public function show($params){
        if(!isset($params['usuario'])){
            return redirect('/');
        }

        $user = findBy('usuario', 'id', $params['usuario']);
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
            'email' => 'email|unique:usuario',   // | -> it's a pipe ("usaurios" esta realacionado com a tabela do db)
            'senha' => 'required|maxlen:10',
        ]);

        if(!$validate){
            return redirect('/user/create');
        }
    }
}