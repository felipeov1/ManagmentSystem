<?php

return [
    'POST' => [
        '/' => 'Login@store',
        '/user/store' => 'user@store',
        '/dashboard/changeStatus' => 'OrdersController@changeStatus',
        '/produtos/add' => 'ProductsController@addProducts',
        '/produtos/update' => 'ProductsController@updateProduct',
        '/produtos/delete' => 'ProductsController@deleteProduct',
        '/cliente/add' => 'ClientsController@addClient',
        '/cliente/update' => 'ClientsController@updateClient',
        '/cliente/delete' => 'ClientsController@deleteClient',
    ],
    'GET' => [
        '/' => 'Login@index',
        '/dashboard' => 'Dashboard@index',
        '/produtos' => 'PageProductsController@index',
        '/user/create' => 'User@create',
        '/user/[0-9]+' => 'User@show',
        '/logout' => 'Login@destroy',
        '/sistema' => 'SistemaController@index',
        '/clientes' => 'PageClientsController@index',
        '/pedidos' => 'PageOrdersController@index',
        '/produtos/search/[0-9]+' => 'ProductsController@searchProduct',
        '/cliente/search/[0-9]+' => 'ClientsController@searchClient',
    ]
];