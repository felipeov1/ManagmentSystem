<?php 

namespace app\controllers;

class Products
{
    public function index()
    {
        return [
            'view' => 'products.php',
            'data' => ['title' => 'Produtos']
        ];
    }

} 