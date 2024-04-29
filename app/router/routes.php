<?php
    return[
        'POST' =>[
            '/' => 'Login@store',
            '/user/store' => 'user@store',
            '/dashboard/changeStatus' => 'OrdersController@changeStatus'
        ],
        'GET' =>[
        '/dashboard' => 'Dashboard@index',
        '/produtos' => 'ProductsController@index',
        '/user/create' => 'User@create',
        '/user/[0-9]+' => 'User@show',
        '/' => 'Login@index',
        '/logout' => 'Login@destroy',
        '/recuperar' => 'Recuperar@index',
        ]
    ];
