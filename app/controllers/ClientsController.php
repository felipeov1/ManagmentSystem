<?php
namespace app\controllers;

use PDOException;
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
        $stmt = $this->db->query("SELECT * FROM clientes WHERE ativo = 0");
        $allClients = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $allClients;
    }

    public function addClient()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['txtNameCliente']) && isset($_POST['txtEndCliente']) && isset($_POST['txtTelCel1']) && isset($_POST['txtTelCel2']) && isset($_POST['txtCPFCNPJ']) && isset($_POST['txtSenha']) && isset($_POST['txtConfirmSenha'])) {
                $clientName = $_POST['txtNameCliente'];
                $clientAddress = $_POST['txtEndCliente'];
                $clientPhone1 = $_POST['txtTelCel1'];
                $clientPhone2 = $_POST['txtTelCel2'];
                $cpf = $_POST['txtCPFCNPJ'];
                $senha = $_POST['txtSenha'];
                $confirmSenha = $_POST['txtConfirmSenha'];
    
                if ($senha !== $confirmSenha) {
                    echo "As senhas estão diferentes!";
                    return;
                }
    
                $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
    
                $stmt = $this->db->prepare("INSERT INTO clientes (Nome, Endereco, Telefone1, Telefone2, cpf, Senha, DataAtualizacao, ativo) VALUES (:name, :address, :phone1, :phone2, :cpf, :senha, '2024-06-05 14:39:15', 0)");
                $stmt->bindParam(':name', $clientName);
                $stmt->bindParam(':address', $clientAddress);
                $stmt->bindParam(':phone1', $clientPhone1);
                $stmt->bindParam(':phone2', $clientPhone2);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':senha', $senhaHash);
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
                $resultSelected = $stmt->fetch(PDO::FETCH_ASSOC); 

                if ($resultSelected) {
                    header('Content-Type: application/json');
                    echo json_encode($resultSelected); // Encode as JSON
                } else {
                    header('Content-Type: application/json');
                    echo json_encode(["error" => "Cliente não encontrado."]);
                }
            } else {
                header('Content-Type: application/json');
                echo json_encode(["error" => "ID do cliente inválido."]);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(["error" => "Método de requisição inválido."]);
        }
        exit;
    }

    public function updateClient()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['ClientID']) && isset($_POST['editTxtNameClient']) && isset($_POST['editTxtAddress']) && isset($_POST['editTxtPhone1']) && isset($_POST['editTxtPhone2']) && isset($_POST['editTxtCPFCNPJ'])) {
                $IDCliente = $_POST['ClientID'];
                $clientName = $_POST['editTxtNameClient'];
                $clientAddress = $_POST['editTxtAddress'];
                $clientPhone1 = $_POST['editTxtPhone1'];
                $clientPhone2 = $_POST['editTxtPhone2'];
                $cpf = $_POST['editTxtCPFCNPJ'];

                $stmt = $this->db->prepare("UPDATE clientes SET Nome = :name, Endereco = :address, Telefone1 = :phone1, Telefone2 = :phone2, cpf = :cpf WHERE IDCliente = :id");
                $stmt->bindParam(':id', $IDCliente);
                $stmt->bindParam(':name', $clientName);
                $stmt->bindParam(':address', $clientAddress);
                $stmt->bindParam(':phone1', $clientPhone1);
                $stmt->bindParam(':phone2', $clientPhone2);
                $stmt->bindParam(':cpf', $cpf);
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
            if (isset($_POST['IDCliente'])) {
                $clientID = $_POST['IDCliente'];

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
