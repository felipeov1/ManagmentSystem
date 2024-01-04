<?php

    function routes(){
        return require 'routes.php';
    }


    function exactMatchUriInArrayRoutes($uri, $routes){
        if(array_key_exists($uri, $routes)){
            return [$uri => $routes[$uri]];
        }
        return[];
    }

    function regularExpressionMatchArrayRoutes($uri, $routes){
        return array_filter(
            $routes,
            function($value) use($uri){
                $regex = str_replace('/','\/', ltrim($value, '/'));
                return preg_match("/^$regex$/", ltrim($uri, '/'));
            },
            ARRAY_FILTER_USE_KEY
        );
    }


    function router(){
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        $routes = routes();

        $arr1 = [
            'user', '1', 'name', 'felipe'
        ];

        $arr2 = [
            'user', '[0-9]+', 'name', '[a-z]+'
        ];

        var_dump(array_diff($arr1, $arr2));
        die();


        $matchedUri = exactMatchUriInArrayRoutes($uri, $routes);

        if(empty($matchedUri)){
            $matchedUri  = regularExpressionMatchArrayRoutes($uri, $routes);
        }

        var_dump($matchedUri);
        die();

    }


?>