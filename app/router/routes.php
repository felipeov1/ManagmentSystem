<?php
use app\controllers\PageClientsController;
    return[
        'POST' =>[
            '/' => 'Login@store',
            '/user/store' => 'user@store',
            '/dashboard/changeStatus' => 'OrdersController@changeStatus',
            '/produtos/adicionar' => 'ProductsController@addProducts'
        ],
        'GET' =>[
        '/' => 'Login@index',
        '/dashboard' => 'Dashboard@index',
        '/produtos' => 'PageProductsController@index',
        '/user/create' => 'User@create',
        '/user/[0-9]+' => 'User@show',
        '/logout' => 'Login@destroy',
        '/recuperar' => 'Recuperar@index',
        '/clientes' => 'PageClientsController@index',
        ]
    ];
