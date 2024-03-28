<?php

namespace app\controllers;

class SalesController
{
    public function allSalesMonth()
    {
        $salesMonth = findAllSalesMonth('vendas', 'data', 'valor');

        $totalSalesMonth = 0;

        foreach ($salesMonth as $sales) {
            $salesMonth = $sales->valor;
            $totalSalesMonth += $salesMonth;
            $valueTotalSalesMonth = number_format($totalSalesMonth, 2, ',', '.');

        }
        return $valueTotalSalesMonth;
    }

    public  function allSalesYear()
    {
        $salesMonth = findAllSalesYear('vendas', 'data', 'valor');

        $totalSalesYears = 0;

        foreach ($salesMonth as $sales) {
            $salesMonth = $sales->valor;
            $totalSalesYears += $salesMonth;
            $valueTotalSalesYear = number_format($totalSalesYears, 2, ',', '.');

        }
        return $valueTotalSalesYear;
    }


    public function monthlySalesProgression($valueTotalSalesMonth)
    {
        $salesLastMonth = findLastSalesMonth('vendas', 'data', 'valor');

        $totalsalesLastMonth = 0;

        foreach ($salesLastMonth as $sales) {
            $salesLastMonth = $sales->valor;
            $totalsalesLastMonth += $salesLastMonth;
            $valueTotalSalesLastMonth = number_format($totalsalesLastMonth, 2, ',', '.');
        }
        
        $valueTotalSalesLastMonth = preg_replace('/[^\d]/', '', $valueTotalSalesLastMonth);
        $valueTotalSalesLastMonth = floatval(str_replace(',', '.', $valueTotalSalesLastMonth));
        
        $valueTotalSalesMonth = preg_replace('/[^\d]/', '', $valueTotalSalesMonth);
        $valueTotalSalesMonth = floatval(str_replace(',', '.', $valueTotalSalesMonth));
        
        $compareProgression = $valueTotalSalesMonth - $valueTotalSalesLastMonth;
        $formatedCompareProgression = number_format($compareProgression / 100, 2, ',', '.');


        return $formatedCompareProgression;
        

    }

}