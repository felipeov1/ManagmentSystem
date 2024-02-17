<ul id="menu_list">
    <li><a href="/">Home</a></li>
    <li><a href="/login">Login</a></li>
    <li><a href="/user/create">Create</a></li>
    <li><a href="/products">Produtos</a></li>

    <div id="status_login">
        Bem vindo,
        <?php if(logged()): ?>
            <?php echo user()->nome; ?> | <a href="/logout">Logout</a>
        <?php else: ?>
            visitante
        <?php endif; ?>
    </div>
</ul>