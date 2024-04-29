<?php 

namespace app\controllers;

class Recuperar
{
    public function index()
    {
        return [
            'view' => 'recuperar.php',
            'data' => ['title' => 'Recuperar Login']
        ];
    }

} 