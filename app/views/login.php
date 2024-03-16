<div class="container loginForm">
    <div class="wrapper">
        <form action="/" method="post">
            <h1> Faça seu login </h1>

            <?php echo getFlash('message'); ?>

            <div class="input-box">
                <input type="text" name="email" placeholder="Email" value="ofelipe439@gmail.com">
                <i class='bx bxs-user' style='color:black'></i>
            </div>
            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" value="123">
                <i class='bx bxs-lock-alt' style='color:black'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Lembrar-se de mim </label>
            </div>

            <input type="submit" name="AddMsgCont" class="btn" value="Entrar">
            <div class="register-link">
            </div>

            <button class="button"><a id="recuperar" href="/recuperar">Esqueci minha senha</a></button>
            <div class="register-link">
            </div>
        </form>
    </div>
</div>