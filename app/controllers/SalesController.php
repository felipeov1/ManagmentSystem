<?php

namespace app\controllers;

class SalesController
{
    public function allSalesMonth()
    {
        $salesMonth = findAllSalesMonth('vendas', 'DataEntrega', 'Valor');

        $totalSalesMonth = 0;

        foreach ($salesMonth as $sales) {
            /* $salesMonth = $sales->Valor; */
            $totalSalesMonth += $sales->Valor; /* += $salesMonth == antigo */
        }
        $valueTotalSalesMonth = number_format($totalSalesMonth, 2, ',', '.');

        return $valueTotalSalesMonth;
    }

    public function allSalesYear()
    {
        /* $salesMonth = findAllSalesYear('vendas', 'DataEntrega', 'Valor'); */
        $salesYear = findAllSalesYear('vendas', 'DataEntrega', 'Valor'); // adicionado

        $totalSalesYears = 0;

        /* foreach ($salesMonth as $sales) == antigo */
        foreach ($salesYear as $sales) {
            /* $salesMonth = $sales->Valor;
            $totalSalesYears += $salesMonth;
            $valueTotalSalesYear = number_format($totalSalesYears, 2, ',', '.'); */
            $totalSalesYears += $sales->Valor; // adicionado

        }
        $valueTotalSalesYear = number_format($totalSalesYears, 2, ',', '.'); // adicionado

        return $valueTotalSalesYear;
    }


    public function monthlySalesProgression($valueTotalSalesMonth)
    {


        $salesLastMonth = findLastSalesMonth('vendas', 'DataEntrega', 'Valor');

        $totalsalesLastMonth = 0;

        foreach ($salesLastMonth as $sales) {
            /* $salesLastMonth = $sales->Valor;
            $totalsalesLastMonth += $salesLastMonth;
            $valueTotalSalesLastMonth = number_format($totalsalesLastMonth, 2, ',', '.'); */
            $totalsalesLastMonth += $sales->Valor; // adicionado
        }

        $valueTotalSalesLastMonth = number_format($totalsalesLastMonth, 2, ',', '.'); // adicionado

        $valueTotalSalesLastMonthGraphic = $valueTotalSalesLastMonth;

        $valueTotalSalesLastMonth = preg_replace('/[^\d]/', '', $valueTotalSalesLastMonth);
        $valueTotalSalesLastMonth = floatval(str_replace(',', '.', $valueTotalSalesLastMonth));

        $valueTotalSalesMonth = preg_replace('/[^\d]/', '', $valueTotalSalesMonth);
        $valueTotalSalesMonth = floatval(str_replace(',', '.', $valueTotalSalesMonth));

        $compareProgression = $valueTotalSalesMonth - $valueTotalSalesLastMonth;

        $formatedCompareProgression = number_format($compareProgression / 100, 2, ',', '.');
        

        return array(
            'monthlyProgression' => $formatedCompareProgression,
            'lastMonthTotalSales' => $valueTotalSalesLastMonthGraphic
        );

    }

    public function graphicResult($valueTotalSalesLastMonthGraphic, $formatedCompareProgression)
    {

        $monthlySalesProgression = str_replace(',', '.', $formatedCompareProgression);
        $allSalesLastMonth = str_replace(',', '.', $valueTotalSalesLastMonthGraphic);

        // evitar divisão por 0 == adicionado
        if($monthlySalesProgression == 0) {
            return 0;
        } // fim

        $percentageIncrease = number_format(((floatval($allSalesLastMonth) / 100) / $monthlySalesProgression) * 100, 2, '.', '') * 100;
        
        return $percentageIncrease;
    }

}