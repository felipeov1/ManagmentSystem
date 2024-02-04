<h2>Create</h2>

<form action="/user/store" method="post">
    <input type="text" name="nome" placeholder="Seu nome">
    <?php echo getFlash('nome'); ?>
    <br>
    <input type="text" name="email" placeholder="Seu email">
    <?php echo getFlash('email'); ?>
    <br>
    <input type="password" name="senha" placeholder="Sua senha">
    <?php echo getFlash('senha'); ?>
    <br>
    <button>Create</button>
</form>