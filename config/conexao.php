<?php
//conexao com o banco de dados, (valores alteraveis)
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'login';

$conn = new mysqLi($dbHost, $dbUsername, $dbPassword, $dbName, 3306);

if (!$conn) {
  die("Falha na conexão ao banco de dados: " . mysqli_connect_error());
}
// Conexão com o segundo banco de dados (Clientes)
$dbHostClientes = 'localhost';
$dbUsernameClientes = 'root';
$dbPasswordClientes = '';
$dbNameClientes = 'clientes';

$connClientes = new mysqli($dbHostClientes, $dbUsernameClientes, $dbPasswordClientes, $dbNameClientes, 3306);

if ($connClientes->connect_error) {
  die("Falha na conexão ao banco de dados 'Clientes': " . $connClientes->connect_error);
}

