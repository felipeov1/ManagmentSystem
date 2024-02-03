<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/recuperacao.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Recuperar Senha</title>
</head>

<body>
    <div class="wrapper">
        <form action="">
            <h3> Redefinição de senha</h3>
            <br>
            <h5> Para recuperar a sua senha, informe seu endereço de e-mail
                que nós enviaremos um link para a alteração de senha. </h5>
            <div class="input-box">
                <input type="email" placeholder="E-mail" id="email-field">
                <i class='bx bx-envelope'></i>
            </div>
            <button type="submit" class="btn" onclick="enviar(); return false"> Enviar </button>
            <div class="register-link">
            </div>
        </form>
    </div>


</body>

<script>
    var emailField = document.getElementById("email-field")
    function validation() {
        /// script está incompleto, falta inserir umas coisinhas
        /// função de validação de email para logo em seguida inserir "Foi enviado em seu e-mail as instruções para 
        /// seu email."
    }
</script>

</html>