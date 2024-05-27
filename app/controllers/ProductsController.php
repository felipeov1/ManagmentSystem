<?php

// app/controllers/ProductsController.php

namespace app\controllers;

use PDO;

class ProductsController
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=datas', 'root', '');
    }

    public function getAllProducts()
    {
        $stmt = $this->db->query("SELECT * FROM produtos WHERE ativo = 0");
        $allProducts = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $allProducts;
    }

    public function addProducts()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['txtNameProduct']) && isset($_POST['optionsQuantity']) && isset($_POST['txtValuePerQuantity'])) {
                $productName = $_POST['txtNameProduct'];
                $productQuantity = $_POST['optionsQuantity'];
                $productPrice = $_POST['txtValuePerQuantity'];

                $stmt = $this->db->prepare("INSERT INTO produtos (Nome, Quantidade, ValorQuantidade) VALUES (:name, :quantity, :price)");
                $stmt->bindParam(':name', $productName);
                $stmt->bindParam(':quantity', $productQuantity);
                $stmt->bindParam(':price', $productPrice);
                $stmt->execute();

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
            $productID = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
            if ($productID) {
                $stmt = $this->db->prepare("SELECT * FROM produtos WHERE IDProduto = :id");
                $stmt->bindParam(':id', $productID);
                $stmt->execute();
                $resultSelected = $stmt->fetch(PDO::FETCH_OBJ);
                return $resultSelected;
            } else {
                echo "ID do produto inválido.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }

    public function updateProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['productID']) && isset($_POST['txtNameProduct']) && isset($_POST['optionsQuantity']) && isset($_POST['txtValuePerQuantity'])) {
                $productID = $_POST['productID'];
                $productName = $_POST['txtNameProduct'];
                $productQuantity = $_POST['optionsQuantity'];
                $productPrice = $_POST['txtValuePerQuantity'];

                $stmt = $this->db->prepare("UPDATE produtos SET Nome = :name, Quantidade = :quantity, ValorQuantidade = :price WHERE IDProduto = :id");
                $stmt->bindParam(':id', $productID);
                $stmt->bindParam(':name', $productName);
                $stmt->bindParam(':quantity', $productQuantity);
                $stmt->bindParam(':price', $productPrice);
                $stmt->execute();

                echo "Produto atualizado com sucesso: ID: $productID, Nome: $productName, Quantidade: $productQuantity, Preço: $productPrice";
            } else {
                echo "Por favor, preencha todos os campos do formulário.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }

    public function deleteProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['productID'])) {
                $productID = $_POST['productID'];
                
                $stmt = $this->db->prepare("UPDATE produtos SET ativo = 1 WHERE IDProduto = :id");
                $stmt->bindParam(':id', $productID);
                if ($stmt->execute()) {
                    echo "Produto inativado com sucesso. ID do Produto: $productID";
                } else {
                    echo "Erro ao inativar o produto. ID do Produto: $productID";
                }
            } else {
                echo "Erro: ID do produto não foi fornecido na solicitação.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }
}
