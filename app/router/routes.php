<?php
    return[
        'POST' =>[
            '/' => 'Login@store',
            '/user/store' => 'user@store',
            '/dashboard/changeStatus' => 'OrdersController@changeStatus',
            '/produtos/add' => 'ProductsController@addProducts',
            '/produtos/delete' => 'ProductsController@deleteProduct'
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
        '/produtos/search' => 'ProductsController@searchProduct',
        ]
    ];
