<?php

namespace app\controllers;

use app\repository\ProductRepositoryInterface;

class ProductsController
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllProducts();

        return [
            'view' => 'produtos.php',
            'data' => [
                'title' => 'Produtos',
                'products' => $products 
            ]
        ];
    }
}