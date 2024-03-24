<?php

namespace app\controllers;

use app\controllers\VendasController;


class Dashboard
{
    public function index($params)
    {
        $vendasController = new VendasController();
        $totalSalesMonth = $vendasController->salesCalculator();

        return [
            'view' => 'dashboard.php',
            'data' => [
                'title' => 'Dashboard', 
                'totalSalesMonth' => $totalSalesMonth,
            ],
        ];
    }   
}




