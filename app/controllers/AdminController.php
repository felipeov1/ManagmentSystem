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
        $stmt = $this->db->query("SELECT * FROM usuarios WHERE ativo = 0");
        $allAdmins = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $allAdmins;
    }

    public function addAdmin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['txtNameAdmin']) && isset($_POST['txtEmailAdmin']) && isset($_POST['txtCPF']) && isset($_POST['txtSenha']) && isset($_POST['txtAdmin'])) {
                $adminName = $_POST['txtNameAdmin'];
                $adminEmail = $_POST['txtEmailAdmin'];
                $adminCPF = $_POST['txtCPF'];
                $adminSenha = password_hash($_POST['txtSenha'], PASSWORD_BCRYPT);
                $adminAdmin = $_POST['txtAdmin'];

                $stmt = $this->db->prepare("INSERT INTO usuarios (Nome, Email, Senha, CPF, ativo, Admin) VALUES (:name, :email, :senha, :cpf, 0, :admin)");
                $stmt->bindParam(':name', $adminName);
                $stmt->bindParam(':email', $adminEmail);
                $stmt->bindParam(':cpf', $adminCPF);
                $stmt->bindParam(':senha', $adminSenha);
                $stmt->bindParam(':admin', $adminAdmin);
                $stmt->execute();

                echo "Administrador adicionado com sucesso.";
            } else {
                echo "Por favor, preencha todos os campos do formulário.";
            }
        } else {
            echo "Método de requisição inválido.";
        }
    }

    public function searchAdmin()
    {

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $adminID = isset($_GET["id"]) ? intval($_GET["id"]) : null;

            if ($adminID) {
                $stmt = $this->db->prepare("SELECT IDUsuario, Nome, Email, CPF, Admin FROM usuarios WHERE IDUsuario = :id AND Ativo = 0");
                $stmt->bindParam(':id', $adminID);
                $stmt->execute();
                $admin = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($admin) {
                    echo json_encode($admin);
                } else {
                    echo json_encode(["error" => "Administrador não encontrado."]);
                }
            } else {
                header('Content-Type: application/json');
                echo json_encode(["error" => "ID do administrador inválido."]);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(["error" => "Método de requisição inválido."]);
        }
        exit;
    }


    public function updateAdmin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $adminID = isset($_POST["editAdminID"]) ? intval($_POST["editAdminID"]) : null;
            $name = isset($_POST["editTxtNameAdmin"]) ? $_POST["editTxtNameAdmin"] : null;
            $email = isset($_POST["editTxtEmailAdmin"]) ? $_POST["editTxtEmailAdmin"] : null;
            $cpf = isset($_POST["editTxtCPF"]) ? $_POST["editTxtCPF"] : null;
            $admin = isset($_POST["editTxtAdmin"]) ? $_POST["editTxtAdmin"] : null;
            $password = isset($_POST["editTxtSenha"]) ? $_POST["editTxtSenha"] : null;
    
            if ($adminID) {
                $query = "UPDATE usuarios SET Nome = :name, Email = :email, CPF = :cpf, Admin = :admin";
    
                if ($password) {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $query .= ", Senha = :password";
                }
    
                $query .= " WHERE IDUsuario = :id";
    
                $stmt = $this->db->prepare($query);
    
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':admin', $admin);
                $stmt->bindParam(':id', $adminID);
    
                if ($password) {
                    $stmt->bindParam(':password', $hashedPassword);
                }
    
                $stmt->execute();
    
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["error" => "ID do administrador inválido."]);
            }
        } else {
            echo json_encode(["error" => "Método de requisição inválido."]);
        }
        exit;
    }

    public function deleteAdmin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['IDAdmin'])) {
                $adminID = $_POST['IDAdmin'];

                $stmt = $this->db->prepare("UPDATE usuarios SET ativo = 1 WHERE IDUsuario = :id");
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
