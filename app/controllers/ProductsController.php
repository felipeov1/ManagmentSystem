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
        // Aqui você pode chamar métodos do repositório para obter os produtos
        $products = $this->productRepository->getAllProducts();

        // Retornar os produtos para a view ou fazer qualquer outra ação necessária
        return [
            'view' => 'products/index.php',
            'data' => [
                'title' => 'Produtos',
                'products' => $products 
            ]
        ];
    }
}