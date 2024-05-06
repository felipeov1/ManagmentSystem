<?php

namespace app\controllers;

class ProductsController
{
    public function getAllProducts(){

        $allProducts = all('produtos');

        return $allProducts;
    }
}