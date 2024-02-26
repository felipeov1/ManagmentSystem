<?php 

namespace app\controllers;

class Dashboard
{
    public function index($params){
        $users = all('usuarios');
        return[
            'view' => 'dashboard.php',
            'data' => ['title' => 'Dashboard','usuarios' => $users]
        ];
    }

} 