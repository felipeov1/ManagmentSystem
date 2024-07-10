<?php

namespace app\controllers;
class PageAdminController
{
    public function index()
    {
        $admins = new AdminController();
        $allAdmins = $admins->getAllAdmins();


        return [
            'view' => 'usuarios.php',
            'data' => [
                'title' => 'Usuários',
                'allAdmins' => $allAdmins,
            ]
        ];
    }

} 