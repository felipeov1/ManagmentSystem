<?php

namespace app\repository;

use PDO;

class ProductRepository implements ProductRepositoryInterface {
    private $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function getAllProducts() {
        try {
            $query = $this->connection->query("SELECT * FROM products");
            return $query->fetchAll();
        } catch (\PDOException $e) {
            
            // Em uma aplicação real, você pode querer lidar com exceções de forma apropriada,
            // como registrar o erro, notificar o usuário ou retornar uma mensagem de erro padrão.
            // Aqui, estamos apenas retornando um array vazio em caso de erro.

            return [];
        }
    }
}