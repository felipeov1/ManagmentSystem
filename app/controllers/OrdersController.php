<?php

namespace app\controllers;

class OrdersController{

    public function getOrders(){

        $nextOrders = getOrders('Vendas', 'IDVenda', 'DataEntrega', 'Situacao');
        return $nextOrders;
    }
}
