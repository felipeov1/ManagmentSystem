<?php

function controller($matchedUri, $params){
    [$controller,$method] = explode('@', array_values($matchedUri)[0]);
    $controllerweithNamespace = CONTROLLER_PATH.$controller;

    if(!class_exists($controllerweithNamespace)){
        throw new Exception("Controller {$controller} doesn't exist");
    }

    $controllerInstance = new $controllerweithNamespace;

    if(!method_exists($controllerInstance, $method)){
        throw new Exception("The method  {$method} doesn't exist in controller {$controller}");
    }

    $controllerInstance->$method($params);

}