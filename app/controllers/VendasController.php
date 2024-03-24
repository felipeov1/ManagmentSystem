<?php

namespace app\controllers;

class VendasController
{
    public function salesCalculator()
    {
        $vendas = all('vendas', 'valor');

        foreach ($vendas as $venda) {
            $totalSalesMonth = $venda->valor;
            $totalSalesMonth = $totalSalesMonth + $totalSalesMonth;
            $valueTotalSalesMonth = number_format($totalSalesMonth, 2, ',', '.');
        }

        return $valueTotalSalesMonth;


        // !!!!!!! CORRECTLY THIS !!!!!!!!

        // $vendas = findSalesLastMonth('vendas', 'data_venda', 'valor');

        // $totalSalesMonth = [];
        // foreach ($vendas as $date) {
        //     $totalSalesMonth[] = $date->valor;
        // }

        // var_dump($totalSalesMonth);
        // return $totalSalesMonth; //create a controller for this and make a operation to get the evolution of sales compare last monsth
    }
}