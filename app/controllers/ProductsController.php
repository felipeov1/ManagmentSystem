<?php

namespace app\controllers;

class ProductsController
{

    public function getAllProducts()
    {

        $allProducts = allProducts('produtos');

        return $allProducts;
    }
    
    public function addProducts()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['txtNameProduct']) && isset($_POST['optionsQuantity']) && isset($_POST['txtValuePerQuantity'])) {
                
                $productName = $_POST['txtNameProduct'];
                $productQuantity = $_POST['optionsQuantity'];
                $productPrice = $_POST['txtValuePerQuantity'];

                addProduct('produtos', $productName, $productQuantity, $productPrice);

                echo "Produto adicionado com sucesso: $productName, Quantidade: $productQuantity, Preço: $productPrice";
            } else {

                echo "Por favor, preencha todos os campos do formulário.";
            }
        } else {

            echo "Método de requisição inválido.";
        }
    }

    public function searchProduct()
    {

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $productID = filter_input(INPUT_GET, "id");

            $resultSelected = findBy('produtos', 'IDProduto', $productID);

            return $resultSelected;
        }

    }

    // public function addProductsUpdate()
    // {
    //     $productName = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    //     $productPrice = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    //     $productQuantity = filter_input(INPUT_POST, 'senha');

    //     updateProduc('produtos', $productName, $productPrice, $productQuantity);
    // }

    public function deleteProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['productID'])) {
                
                $productID = $_POST['productID'];
                deleteProduct('produtos', $productID);

                echo "Produto excluído com sucesso. ID do Produto: $productID";
            } else {
                echo "Erro: ID do produto não foi fornecido na solicitação.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }
}