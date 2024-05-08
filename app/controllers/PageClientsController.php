<?php 

namespace app\controllers;

class PageClientsController
{
    public function index()
    {

        return [
            'view' => 'clients.php',
            'data' => [
                'title' => 'Clientes',
            ]
        ];
    }

} 
