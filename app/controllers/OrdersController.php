<?php

namespace app\controllers;

class OrdersController{

    public function getOrders(){
        
        $orders = getOrders('pedidos', 'data_entrega', 'numero_pedido');
        return $orders;
        


    }
}