<?php

namespace app\controllers;

class OrdersController
{

    public function getOrders(){

        $nextOrders = getOrders('Vendas', 'IDVenda', 'DataEntrega', 'HorarioEntrega', 'Situacao');
        return $nextOrders;
    }

    public function changeStatus(){
        $orderID = filter_input(INPUT_POST, 'IDVenda', FILTER_SANITIZE_EMAIL);

        echo "id" . $orderID;

        changeStatus('Vendas', 'Situacao', 'IDVenda', $orderID);


        redirect('/dashboard');
    }

    public function ordersNotification(){

        $notification = ordersNotification('Vendas', 'Situacao', 'DataEntrega', 'HorarioEntrega');

        return $notification;
    }

}
