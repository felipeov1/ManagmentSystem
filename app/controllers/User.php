<?php

namespace app\controllers;

class User
{
    public function show($params){
        var_dump('show');
        die();
    }

    public function create($params){
        var_dump($params);
        die();
    }
}