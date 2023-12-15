<?php
// Certifique-se de que não há saídas aqui, como espaços em branco ou HTML
session_start();
include('index.php');

// Limpar todas as variáveis de sessão
session_unset();

// Destruir a sessão
session_destroy();


// Redirecionar para a página de login
header('Location: index.php');
exit();
?>
