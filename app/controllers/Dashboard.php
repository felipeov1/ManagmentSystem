<?php

namespace app\controllers;

use app\controllers\SalesController;


class Dashboard
{
    public function index($params)
    {
        $salesController = new SalesController();
        $allSalesMonth = $salesController->allSalesMonth();
        $allSalesYear = $salesController->allSalesYear();
        $monthlySalesProgression = $salesController->monthlySalesProgression($allSalesMonth);

        return [
            'view' => 'dashboard.php',
            'data' => [
                'title' => 'Dashboard', 
                'allSalesMonth' => $allSalesMonth,
                'allSalesYear' => $allSalesYear,
                'monthlySalesProgression' => $monthlySalesProgression,
            ],
        ];
    }   
}




