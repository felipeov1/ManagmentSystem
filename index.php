<?php
//login  Criação da Branch 19/11/2023 as 01:53hrs

include('config/conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        "";
    } else if (strlen($_POST['senha']) == 0) {
        "";
    } else {
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do Código SQL:" . $conn->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION["id"] = $usuario['id'];
            $_SESSION["nome"] = $usuario['nome'];

            if (isset($_POST['manter_conectado'])) {
                // Defina um cookie para manter a sessão ativa por um período mais longo
                setcookie("usuario_id", $usuario['id'], time() + (30 * 24 * 60 * 60)); // Expira em 30 dias
            }

            header('Location: pages/dashboard.php');
        } else {
            echo "";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <div class="wrapper">
        <form action="index.php" method="post">
            <h1> Faça seu login </h1>

            <?php if (isset($_POST['email']) && strlen($_POST['email']) == 0 || isset($_POST['senha']) && strlen($_POST['senha']) == 0)
                echo  "<div class='alert alert-danger text-center' role='alert'>Preencha todos os campos!</div>";
            else{
                echo  "<div class='alert alert-danger text-center' role='alert'>Credenciais inválidas!</div>";
            }
            ?>
           
            <div class="input-box">
                <input type="email" name="email" placeholder="E-mail" id="email">
                <i class='bx bxs-user' style='color:#ff7500'></i>
            </div>

            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" id="Senha">
                <i class='bx bxs-lock-alt' style='color:#ff7500'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Lembrar-se de mim </label>
            </div>

            <button type="submit" class="btn"> Entrar </button>
            <div class="register-link">
            </div>

            <button type="submit" class="button" onclick="recuperar(); return false"> Esqueci minha senha </button>
            <div class="register-link">
            </div>
        </form>

    </div>

</body>

<script src="assets/js/validacaoLogin.js"></script>

</html>