<?php
    return[
        'POST' =>[
            '/' => 'Login@store',
            '/user/store' => 'user@store'
        ],
        'GET' =>[
        '/dashboard' => 'Dashboard@index',
        '/produtos' => 'Produtos@index',
        '/user/create' => 'User@create',
        '/user/[0-9]+' => 'User@show',
        '/login' => 'Login@index',
        '/logout' => 'Login@destroy',
        ]
    ];
