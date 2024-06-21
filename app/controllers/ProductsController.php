<?php
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

                $stmt = $this->db->prepare("INSERT INTO produtos (Nome, Quantidade, ValorQuantidade, ativo) VALUES (:name, :quantity, :price, 0)");
                $stmt->bindParam(':name', $productName);
                $stmt->bindParam(':quantity', $productQuantity);
                $stmt->bindParam(':price', $productPrice);
                $stmt->execute();

                echo "Produto adicionado com sucesso.";
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
            $productID = isset($_GET["id"]) ? intval($_GET["id"]) : null;
    
            if ($productID) {
                $stmt = $this->db->prepare("SELECT * FROM produtos WHERE IDProduto = :id");
                $stmt->bindParam(':id', $productID);
                $stmt->execute();
                $resultSelected = $stmt->fetch(PDO::FETCH_OBJ);
                if ($resultSelected) {
                    header('Content-Type: application/json');
                    echo json_encode($resultSelected);
                    exit;
                } else {
                    header('Content-Type: application/json');
                    echo json_encode(["error" => "Produto não encontrado."]);
                    exit;
                }
            } else {
                header('Content-Type: application/json');
                echo json_encode(["error" => "ID do produto inválido."]);
                exit;
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(["error" => "Método de requisição inválido."]);
            exit;
        }
    }

    public function updateProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['productID']) && isset($_POST['editTxtNameProduct']) && isset($_POST['editOptionsQuantity']) && isset($_POST['editTxtValuePerQuantity'])) {
                $productID = $_POST['productID'];
                $productName = $_POST['editTxtNameProduct'];
                $productQuantity = $_POST['editOptionsQuantity'];
                $productPrice = $_POST['editTxtValuePerQuantity'];

                $stmt = $this->db->prepare("UPDATE produtos SET Nome = :name, Quantidade = :quantity, ValorQuantidade = :price WHERE IDProduto = :id");
                $stmt->bindParam(':id', $productID);
                $stmt->bindParam(':name', $productName);
                $stmt->bindParam(':quantity', $productQuantity);
                $stmt->bindParam(':price', $productPrice);
                $stmt->execute();

                header('Content-Type: application/json');
                echo json_encode(["success" => "Produto atualizado com sucesso."]);
            } else {
                header('Content-Type: application/json');
                echo json_encode(["error" => "Por favor, preencha todos os campos do formulário."]);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(["error" => "Método de requisição inválido."]);
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
                    echo "Produto inativado com sucesso.";
                } else {
                    echo "Erro ao inativar o produto.";
                }
            } else {
                echo "Erro: ID do produto não foi fornecido na solicitação.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }
}
