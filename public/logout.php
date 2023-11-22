<?php
// essa aba te redireciona até a pagina de loguin
if(!isset($_SESSION)) {
  session_start();
}

session_destroy();

header('Location: index.php');
?>