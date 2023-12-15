<?php
include_once './config/conexao.php';
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

            <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (!empty($dados['AddMsgCont'])) {
                //var_dump($dados);
            
                //aqui ocorrerá a validação dos dados individualmente
                if (empty($dados['email'])) {
                    echo "<p style= 'color: #f00;'>Erro: É necessário preencher o campo e-mail.</p> ";
                } elseif (empty($dados['senha'])) {
                    echo "<p style= 'color: #f00;'>Erro: É necessário preencher o campo de senha.</p> ";
                } else {

                    $query_contato = "INSERT INTO users (user_email, user_password) VALUES (:email, :senha)";
                    $add_contato = $conn->prepare($query_contato);
                    $add_contato->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                    $add_contato->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
                    $add_contato->execute();

                    if ($add_contato->rowCount()) {
                        unset($dados);
                        echo "<p style = 'color: green;'> Em breve será redirecionado para a página inicial.</p>";
                    } else {
                        echo "Não foi possível acessar a página inicial.";
                    }
                }
            }
            ?>

            <div class="input-box">
                <input type="text" name="email" placeholder="Email">" id="Login">
                <i class='bx bxs-user' style='color:#ff7500'></i>
            </div>

            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha">" id="Senha">
                <i class='bx bxs-lock-alt' style='color:#ff7500'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Lembrar-se de mim </label>
            </div>

            <input type="submit" name="AddMsgCont" clas=btn value="Enviar">
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
