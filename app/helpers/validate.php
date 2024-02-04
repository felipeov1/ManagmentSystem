<?php

function validate(array $validations){
    $result = [];
    foreach($validations as $field => $validate){
        if(!str_contains($validate, '|')){
            $result[$field] = $validate($field);
        }else{
        }
    }


    if(in_array(false, $result)){
        return false;
    }

    return $result;
}

function required($field){
    if($_POST[$field] === ''){
        setFlash($field, 'O campo é obrigatório');
        return false;
    }

    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
}