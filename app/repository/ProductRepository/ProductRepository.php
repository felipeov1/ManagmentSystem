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

            return [];
        }
    }
}