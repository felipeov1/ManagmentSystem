<?php


require 'bootstrap.php';

try {
    $data = router();

    if(!isset($data['data'])){
        throw new Exception('There isnt the data indice');
    }
    if(!isset($data['data']['title'])){
        throw new Exception('There isnt the title indice');
    }

    
    if(!isset($data['view'])){
        throw new Exception('There isnt indice "view"');
    }
    
    if(!file_exists(VIEWS.$data['view'])){
        throw new Exception("This view {$data['view']} doesn't exist");
    }
    
    extract($data['data']);
    
    $view = $data['view'];
    
    require VIEWS.'master.php';
} catch (Exception $e) {
    var_dump($e->getMessage());
}

