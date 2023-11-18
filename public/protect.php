<?php
// esse código serve para proterger o sistema de entrar na aba de pós login sem estar logado
if(!isset($_SESSION)) {
  session_start();
}

if(!isset($_SESSION["id"])) {
  die("Você não pode acessar essa pagina! Efetue o Login para acessa-la.<p><a href=\"../index.php\">Entrar</a></p>");
}


?>