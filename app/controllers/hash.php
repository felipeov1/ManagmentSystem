<?php
$password = '1234';

// Gerando o hash da senha
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

echo "Hashed password: " . $hashedPassword;
