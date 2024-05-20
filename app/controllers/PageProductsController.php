<?php 

namespace app\controllers;

class PageProductsController
{
    public function index()
    {
        $products = new ProductsController();
        $allProduct = $products->getAllProducts();

        return [
            'view' => 'produtos.php',
            'data' => [
                'title' => 'Produtos',
                'allProducts' => $allProduct
            ]
        ];
    }

} 
