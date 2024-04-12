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

        $monthlySalesProgression = $salesController->monthlySalesProgression($allSalesMonth);

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
                'ordersNotifications' => $ordersNotifications
            ],
        ];
    }
}




