<?php 

namespace app\controllers;

class PageClientsController
{
    public function index()
    {

        $clients = new ClientsController();
        $allClients = $clients->getAllClients();

        return [
            'view' => 'clients.php',
            'data' => [
                'title' => 'Clientes',
                'allClients' => $allClients,
            ]
        ];
    }

} 
