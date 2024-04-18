<?php

function all($table, $fields = '*')
{
  try {
    $connect = connect();
    $query = $connect->query("select {$fields} from {$table}");
    return $query->fetchAll();
  } catch (PDOException $e) {
    var_dump($e->getMessage());
  }
}
;

function findBy($table, $field, $value, $fields = '*')
{
  try {
    $connect = connect();
    $prepare = $connect->prepare("select {$fields} from {$table} where {$field} = :{$field}");
    var_dump($prepare);
    $prepare->execute([
      $field => $value
    ]);
    return $prepare->fetch();
  } catch (PDOException $e) {
    var_dump($e->getMessage());
  }
}
;

//////////// Sales
function findAllSalesMonth($table, $dateField, $valueField, $fields = '*')
{
  try {
    $connect = connect();
    $query = $connect->prepare("SELECT {$fields} FROM {$table} WHERE YEAR({$dateField}) = YEAR(CURDATE()) AND MONTH({$dateField}) = MONTH(CURDATE())");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
  } catch (PDOException $e) {
    var_dump($e->getMessage());
    return false;
  }
}
;
function findLastSalesMonth($table, $dateField, $valueField, $fields = '*')
{
  try {
    $firstDayOfLastMonth = date('Y-m-01', strtotime('last month'));
    $lastDayOfLastMonth = date('Y-m-t', strtotime('last month'));

    $connect = connect();
    $query = $connect->prepare("select {$fields} from {$table} where {$dateField} >= :firstDay and {$dateField} <= :lastDay");
    $query->execute([
      'firstDay' => $firstDayOfLastMonth,
      'lastDay' => $lastDayOfLastMonth
    ]);
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
  } catch (PDOException $e) {
    var_dump($e->getMessage());
    return false;
  }
}


function findAllSalesYear($table, $field, $fields = '*')
{
  try {
    $connect = connect();
    $query = $connect->prepare("select {$fields} from {$table} where YEAR({$field}) = YEAR(CURDATE())");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
  } catch (PDOException $e) {
    var_dump($e->getMessage());
    return false;
  }
}
;


//////////// Orders


function getOrders($table, $idField, $statusField, $deliveryDateField, $deliveryTimeField, $fields = '*')
{
  try {
    $connect = connect();
    $query = $connect->prepare("
      SELECT *, C.Nome AS NomeCliente, P.Nome AS NomeProduto
      FROM Vendas AS V
      JOIN Clientes AS C ON V.IDCliente = C.IDCliente
      JOIN Produtos AS P ON V.IDProduto = P.IDProduto
      WHERE V.Situacao = 0
      ORDER BY V.DataEntrega ASC, V.HorarioEntrega ASC
      ");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
  } catch (PDOException $e) {
    var_dump($e->getMessage());
    return false;
  }
}

function changeStatus($table, $situationFiled, $field, $value)
{
  try {
    $connect = connect();
    $prepare = $connect->prepare("UPDATE {$table} SET {$situationFiled} = 1 WHERE {$field} = :{$field}");
    $prepare->execute([
      $field => $value
    ]);
    return $prepare->fetch();
  } catch (PDOException $e) {
    var_dump($e->getMessage());
  }
}

function ordersNotification($table, $situationField, $deliveryDateField, $deliveryTimeField)
{
    try {
        $connect = connect();
        $query = $connect->prepare("
            SELECT v.*, c.Nome AS NomeCliente 
            FROM {$table} v 
            JOIN clientes c ON v.IDCliente = c.IDCliente 
            WHERE {$situationField} = 0 
            AND TIMESTAMP({$deliveryDateField}, {$deliveryTimeField}) > NOW()
            AND TIMESTAMP({$deliveryDateField}, {$deliveryTimeField}) <= NOW() + INTERVAL 2 HOUR
        ");

        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    } catch (PDOException $e) {
        var_dump($e->getMessage());
        return false;
    }
}


