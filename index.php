<?php //login  Criação da Branch 19/11/2023 as 01:53hrs 
include('config/conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        echo 'Preencha seu e-mail';
    } else if (strlen($_POST['senha']) == 0) {
        echo 'Preencha sua senha';
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
            echo "Falha no login! Email ou Senha incorretos";
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
    <link rel="stylesheet" href="assets/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <div class="wrapper">
        <form action="index.php" method="post">
            <h1> Faça seu login </h1>
            <div class="input-box">
                <input type="email" name="email" onchange="validateFields()" placeholder="E-mail" id="email">
                <i class='bx bxs-user' style='color:#ff7500'></i>
            </div>
            <div class= "error" id="email-required-error"> E-mail não informado. Por favor, preencha o corretamente! </div>
            <div class= "error"> E-mail inválido. Por favor preencha-o corretamente! </div>

            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" id="Senha">
                <i class='bx bxs-lock-alt' style='color:#ff7500'></i>
            </div>
            <div class= "error"> Senha não informada. Por favor, preencha o campo! </div>

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