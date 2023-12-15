
<?php
include_once './config/conexao.php';

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']== null)) {
         echo "<br> Campo vazio! Por favor preencha todos os campos. </br>";

    } else if(strlen($_POST['senha']== null)) {
        echo "<br> Campo vazio! Por favor preencha todos os campos. </br>";
    } else {

        //email de teste: felipão@gmail.com
        //senha de teste: 123456

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM contatos WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['email'] = $usuario['email'];

            header('Location: pages/dashboard.php');

        } else {
            echo "<br> Falha ao logar! E-mail ou senha incorretos. <br>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1tzjvRp9Uq/8yFAalTTG0zXxPqe5i" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>


    <div class="wrapper">
        <form action="" method="post">
            <h1> Faça seu login </h1>
           
           
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" >
                <i class='bx bxs-user' style='color:#ff7500'></i>
            </div>

            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha"  >
                <i class='bx bxs-lock-alt' style='color:#ff7500'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Lembrar-se de mim </label>
            </div>

            <input type="submit" name="AddMsgCont" class= "btn" value="Enviar">
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
