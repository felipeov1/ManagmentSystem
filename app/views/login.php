<div class="container-login">
    <div class="img-box">
        <img src="/assets/images/5970189.jpg" alt="Imagem de login">
    </div>

    <div class="content-box">
        <div class="form-box">
            <div class="login-title">
                <h1>Seja bem-vindo!</h1>
                <p>Entre com sua conta para acessar.</p><br>
            </div><br>
            <form action="/" method="post">
                <?php echo getFlash('message'); ?>

                <div class="input-box">
                    <span>Usuário</span>
                    <input type="email" name="email" placeholder="seuemail@mail.com"><br><br>
                </div><br>

                <div class="input-box">
                    <span>Senha</span>
                    <input type="password" name="senha" placeholder="Senha"><br><br><br>
                </div>

                <div class="input-box">
                    <input type="submit" value="Entrar"><br><br>
                </div>
            </form>
        </div>
    </div>
</div>