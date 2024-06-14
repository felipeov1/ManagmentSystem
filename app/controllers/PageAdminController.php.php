<?php

namespace app\controllers;
class SistemaController
{
    public function index()
    {
        return [
            'view' => 'usuarios.php',
            'data' => ['title' => 'Usuários']
        ];
    }

} 