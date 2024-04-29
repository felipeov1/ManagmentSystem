<?php

namespace app\services;

use database\connect;
use PDO;
use PDOException;

class ProductService
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllProducts($table, $fields = '*')
    {
        try {
            $query = $this->connection->query("SELECT {$fields} FROM {$table}");
            return $query->fetchAll();
        } catch (PDOException $e) {

            error_log('Erro ao buscar registros do banco de dados: ' . $e->getMessage());
            return []; 
        }
    }

    
}