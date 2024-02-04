<h2>Users</h2>

<ul>
    <?php foreach($usuarios as $user): ?>
        <li><?php echo $user->nome; ?> | <a href="/user/<?php echo $user->id; ?>">detalhes</a></li>
    <?php endforeach; ?>
</ul>