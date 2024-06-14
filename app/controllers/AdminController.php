<?php
namespace app\controllers;

use PDOException;
use PDO;

class AdminController
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=datas', 'root', '');
    }

    public function getAllAdmins()
    {
        $stmt = $this->db->query("SELECT * FROM administradores WHERE ativo = 0");
        $allAdmins = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $allAdmins;
    }

    public function addAdmin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['txtNameAdmin']) && isset($_POST['txtEmailAdmin']) && isset($_POST['txtCPF']) && isset($_POST['txtSetor']) && isset($_POST['txtSenha'])) {
                $adminName = $_POST['txtNameAdmin'];
                $adminEmail = $_POST['txtEmailAdmin'];
                $adminCPF = $_POST['txtCPF'];
                $adminSetor = $_POST['txtSetor'];
                $adminSenha = password_hash($_POST['txtSenha'], PASSWORD_BCRYPT);

                $stmt = $this->db->prepare("INSERT INTO administradores (Nome, Email, CPF, Setor, Senha, DataAtualizacao, ativo) VALUES (:name, :email, :cpf, :setor, :senha, NOW(), 0)");
                $stmt->bindParam(':name', $adminName);
                $stmt->bindParam(':email', $adminEmail);
                $stmt->bindParam(':cpf', $adminCPF);
                $stmt->bindParam(':setor', $adminSetor);
                $stmt->bindParam(':senha', $adminSenha);
                $stmt->execute();

                echo "Administrador adicionado com sucesso.";
            } else {
                echo "Por favor, preencha todos os campos do formulário.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }

    public function searchAdmin($id)
    {
        $adminID = intval($id);

        if ($adminID) {
            $stmt = $this->db->prepare("SELECT * FROM administradores WHERE IDAdmin = :id AND ativo = 0");
            $stmt->bindParam(':id', $adminID);
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_OBJ);

            header('Content-Type: application/json');
            if ($admin) {
                echo json_encode($admin);
            } else {
                echo json_encode(["error" => "Administrador não encontrado."]);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(["error" => "ID do administrador inválido."]);
        }
    }

    public function updateAdmin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['adminID']) && isset($_POST['editTxtNameAdmin']) && isset($_POST['editTxtEmailAdmin']) && isset($_POST['editTxtCPF']) && isset($_POST['editTxtSetor']) && isset($_POST['editTxtSenha'])) {
                $adminID = $_POST['adminID'];
                $adminName = $_POST['editTxtNameAdmin'];
                $adminEmail = $_POST['editTxtEmailAdmin'];
                $adminCPF = $_POST['editTxtCPF'];
                $adminSetor = $_POST['editTxtSetor'];
                $adminSenha = password_hash($_POST['editTxtSenha'], PASSWORD_BCRYPT);

                $stmt = $this->db->prepare("UPDATE administradores SET Nome = :name, Email = :email, CPF = :cpf, Setor = :setor, Senha = :senha WHERE IDAdmin = :id AND ativo = 0");
                $stmt->bindParam(':id', $adminID);
                $stmt->bindParam(':name', $adminName);
                $stmt->bindParam(':email', $adminEmail);
                $stmt->bindParam(':cpf', $adminCPF);
                $stmt->bindParam(':setor', $adminSetor);
                $stmt->bindParam(':senha', $adminSenha);
                $stmt->execute();

                header('Content-Type: application/json');
                echo json_encode(["success" => "Administrador atualizado com sucesso."]);
            } else {
                header('Content-Type: application/json');
                echo json_encode(["error" => "Por favor, preencha todos os campos do formulário."]);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(["error" => "Método de requisição inválido."]);
        }
    }

    public function deleteAdmin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['IDAdmin'])) {
                $adminID = $_POST['IDAdmin'];

                $stmt = $this->db->prepare("UPDATE administradores SET ativo = 1 WHERE IDAdmin = :id");
                $stmt->bindParam(':id', $adminID);
                if ($stmt->execute()) {
                    echo "Administrador inativado com sucesso.";
                } else {
                    echo "Erro ao inativar o administrador.";
                }
            } else {
                echo "Erro: ID do administrador não foi fornecido na solicitação.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }
}
