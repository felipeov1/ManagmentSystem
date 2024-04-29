<?php


use app\repository\ProductRepository;



function exactMatchUriInArrayRoutes($uri, $routes)
{
    return (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
}

function regularExpressionMatchArrayRoutes($uri, $routes)
{
    return array_filter(
        $routes,
        function ($value) use ($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY
    );
}

function params($uri, $matchedUri)
{
    if (!empty($matchedUri)) {
        $matchedToGetParams = array_keys($matchedUri)[0];
        return array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }

    return [];
}

function paramsFormat($uri, $params)
{
    $paramsData = [];
    foreach ($params as $index => $param) {
        $paramsData[$uri[$index - 1]] = $param;

    }
    return $paramsData;
}


function router($matchedUri, $params)
{
    // Obtém o nome do controlador e o método da rota correspondente
    list($controllerName, $method) = explode('@', $matchedUri[0]);

    // Verifica se o controlador existe
    $controllerClassName = 'app\\controllers\\' . $controllerName;
    if (!class_exists($controllerClassName)) {
        throw new Exception("Controller $controllerClassName not found");
    }

    $connection = connect();

    // Cria uma instância do controlador e passa a conexão PDO para o construtor
    $controller = new $controllerClassName(new ProductRepository($connection));

    return $controller->$method($params);
}
