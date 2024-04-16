<?php

namespace app\controllers;
class SistemaController
{
    public function index()
    {
        return [
            'view' => 'sistema.php',
            'data' => ['title' => 'Sistema']
        ];
    }

} 