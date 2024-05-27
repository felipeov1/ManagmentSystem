<?php 

namespace app\controllers;

class PageOrdersController
{
    public function index()
    {

        return [
            'view' => 'orders.php',
            'data' => [
                'title' => 'Pedidos',
            ]
        ];
    }

} 