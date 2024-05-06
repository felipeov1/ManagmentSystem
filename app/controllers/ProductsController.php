<?php

namespace app\controllers;

class ProductsController
{

    public function getAllProducts()
    {

        $allProducts = all('produtos');

        return $allProducts;
    }
    public function addProducts()
    {

        $productName = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $productPrice = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $productQuantity = filter_input(INPUT_POST, 'senha');

        addProduct('produtos', $productName, $productPrice, $productQuantity);

    }

    public function addProductsEdit()
    {

        $productID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $resultSelected = findBy('produtos', 'IDProduto', $productID);

        return $resultSelected;

        //I NEED TO PUT A FORMS THAT WILL ENVOLVES EACH LINE OF PRODUCT WITH FIELD *ID* WHEN I CLICK ON EDIT THIS FORM WILL SEND TO THIS FUNCTION ADDPRODUCTEDIT THAT RETURNS ALL DATA 
        //fix branch
    }

    public function addProductsUpdate()
    {
        $productName = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $productPrice = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $productQuantity = filter_input(INPUT_POST, 'senha');

        updateProduc('produtos', $productName, $productPrice, $productQuantity);
    }

    public function addProductsDelete()
    {

    }
}