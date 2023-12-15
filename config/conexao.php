<?php

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';
$port = 3306;

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Erro: Conexão com banco de dados não realizada com sucesso. Erro gerado: " . $mysqli->error);
}


