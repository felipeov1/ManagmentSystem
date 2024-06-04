<?php
namespace app\controllers;

use PDO;

class ClientsController
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=datas', 'root', '');
    }

    public function getAllClients()
    {
        $stmt = $this->db->query("SELECT * FROM clientes");
        $allClients = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $allClients;
    }

    public function addClient()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['txtNameClient']) && isset($_POST['txtAddress']) && isset($_POST['txtPhone1']) && isset($_POST['txtPhone2'])) {
                $clientName = $_POST['txtNameClient'];
                $clientAddress = $_POST['txtAddress'];
                $clientPhone1 = $_POST['txtPhone1'];
                $clientPhone2 = $_POST['txtPhone2'];
                $clientUpdateDate = date('Y-m-d H:i:s');

                $stmt = $this->db->prepare("INSERT INTO clientes (Nome, Endereço, Telefone1, Telefone2, DataAtualizacao, ativo) VALUES (:name, :address, :phone1, :phone2, :updateDate, 0)");
                $stmt->bindParam(':name', $clientName);
                $stmt->bindParam(':address', $clientAddress);
                $stmt->bindParam(':phone1', $clientPhone1);
                $stmt->bindParam(':phone2', $clientPhone2);
                $stmt->bindParam(':updateDate', $clientUpdateDate);
                $stmt->execute();

                echo "Cliente adicionado com sucesso.";
            } else {
                echo "Por favor, preencha todos os campos do formulário.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }

    public function searchClient()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $clientID = isset($_GET["id"]) ? intval($_GET["id"]) : null;

            if ($clientID) {
                $stmt = $this->db->prepare("SELECT * FROM clientes WHERE IDCliente = :id");
                $stmt->bindParam(':id', $clientID);
                $stmt->execute();
                $resultSelected = $stmt->fetch(PDO::FETCH_OBJ);
                header('Content-Type: application/json');
                echo json_encode($resultSelected);
            } else {
                header('Content-Type: application/json');
                echo json_encode(["error" => "ID do cliente inválido."]);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(["error" => "Método de requisição inválido."]);
        }
    }

    public function updateClient()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['clientID']) && isset($_POST['editTxtNameClient']) && isset($_POST['editTxtAddress']) && isset($_POST['editTxtPhone1']) && isset($_POST['editTxtPhone2'])) {
                $clientID = $_POST['clientID'];
                $clientName = $_POST['editTxtNameClient'];
                $clientAddress = $_POST['editTxtAddress'];
                $clientPhone1 = $_POST['editTxtPhone1'];
                $clientPhone2 = $_POST['editTxtPhone2'];
                $clientUpdateDate = date('Y-m-d H:i:s');

                $stmt = $this->db->prepare("UPDATE clientes SET Nome = :name, Endereço = :address, Telefone1 = :phone1, Telefone2 = :phone2, DataAtualizacao = :updateDate WHERE IDCliente = :id");
                $stmt->bindParam(':id', $clientID);
                $stmt->bindParam(':name', $clientName);
                $stmt->bindParam(':address', $clientAddress);
                $stmt->bindParam(':phone1', $clientPhone1);
                $stmt->bindParam(':phone2', $clientPhone2);
                $stmt->bindParam(':updateDate', $clientUpdateDate);
                $stmt->execute();

                header('Content-Type: application/json');
                echo json_encode(["success" => "Cliente atualizado com sucesso."]);
            } else {
                header('Content-Type: application/json');
                echo json_encode(["error" => "Por favor, preencha todos os campos do formulário."]);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(["error" => "Método de requisição inválido."]);
        }
    }

    public function deleteClient()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['clientID'])) {
                $clientID = $_POST['clientID'];

                $stmt = $this->db->prepare("UPDATE clientes SET ativo = 1 WHERE IDCliente = :id");
                $stmt->bindParam(':id', $clientID);
                if ($stmt->execute()) {
                    echo "Cliente inativado com sucesso.";
                } else {
                    echo "Erro ao inativar o cliente.";
                }
            } else {
                echo "Erro: ID do cliente não foi fornecido na solicitação.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }
}
