<?php
// include_once './config/conexao.php';

require '../vendor/autoload.php';
require 'bootstrap.php';

try{

}catch(Exception $e){
    var_dump($e->$getMessage);
}

router();
?>