<?php
    return[
        'POST' =>[
            '/' => 'Login@store',
            '/user/store' => 'user@store'
        ],
        'GET' =>[
        '/home' => 'Home@index',
        '/products' => 'Products@index',
        '/user/create' => 'User@create',
        '/user/[0-9]+' => 'User@show',
        '/' => 'Login@index',
        '/logout' => 'Login@destroy',
        ]
    ];
