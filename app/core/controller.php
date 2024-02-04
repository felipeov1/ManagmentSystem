<?php

function controller($matchedUri, $params){
    $controllerMethod = explode('@', array_values($matchedUri)[0]);
    $controller = $controllerMethod[0];
    $method = $controllerMethod[1];

    $controllerWithNamespace = CONTROLLER_PATH . $controller;

    if(!class_exists($controllerWithNamespace)){
        throw new Exception("Controller {$controller} doesn't exist");
    }

    $controllerInstance = new $controllerWithNamespace;

    if(!method_exists($controllerInstance, $method)){
        throw new Exception("The method {$method} doesn't exist in controller {$controller}");
    }

    $controller =  $controllerInstance->$method($params);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        die();
    }

    return $controller;
} 
