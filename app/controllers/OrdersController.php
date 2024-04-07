<?php

namespace app\controllers;

class OrdersController{

    public function getOrders(){

        $orders = getOrders('pedidos', 'id', 'situacao');
        return $orders;
    }
}
