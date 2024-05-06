<?php 

namespace app\controllers;

class ProductsController
{
    public function index()
    {
        return [
            'view' => 'produtos.php',
            'data' => ['title' => 'Produtos']
        ];
    }

} 
