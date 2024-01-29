<?php

function connect(){
    return new PDO(
        "mysql:host=127.0.0.1;
        dbname=lusalgados",
        'root', '', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
}

