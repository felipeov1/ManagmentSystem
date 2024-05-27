<?php

namespace app\controllers;

use app\controllers\SalesController;
use app\controllers\OrdersController;

class Dashboard
{
    public function index($params)
    {
        
        $salesController = new SalesController();
        $allSalesMonth = $salesController->allSalesMonth();
        $allSalesYear = $salesController->allSalesYear();


        $monthlySalesProgressionData = $salesController->monthlySalesProgression($allSalesMonth);
        $monthlySalesProgression = $monthlySalesProgressionData['monthlyProgression'];
        $allSalesLastMonth = $monthlySalesProgressionData['lastMonthTotalSales'];

        $graphicData = $salesController->graphicResult($monthlySalesProgression, $allSalesLastMonth);

        $ordersController = new OrdersController();
        $orders = $ordersController->getOrders();
        $ordersNotifications = $ordersController->ordersNotification();

        return [
            'view' => 'dashboard.php',
            'data' => [
                'title' => 'Dashboard',
                'allSalesMonth' => $allSalesMonth,
                'allSalesYear' => $allSalesYear,
                'monthlySalesProgression' => $monthlySalesProgression,
                'orders' => $orders,
                'ordersNotifications' => $ordersNotifications,
                'graphicData' => $graphicData,
            ],
        ];
    }
}



