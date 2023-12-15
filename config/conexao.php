<?php

$usuario = 'root';
$senha = '';
$database = 'empilhadeiras';
$host = 'localhost';
$port = 3306;

$conn = new mysqli($host, $usuario, $senha, $database);

if($conn->error) {
    die("Erro: Conexão com banco de dados não realizada com sucesso. Erro gerado: " . $conn->error);
}


