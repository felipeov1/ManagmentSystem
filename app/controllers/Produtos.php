<?php 

namespace app\controllers;

class Produtos
{
    public function index()
    {
        return [
            'view' => 'produtos.php',
            'data' => ['title' => 'Produtos']
        ];
    }

} 