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
};

function findBy($table, $field, $value, $fields = '*')
{
  try {
    $connect = connect();
    $prepare = $connect->prepare("select {$fields} from {$table} where {$field} = :{$field}");
    $prepare->execute([
      $field => $value
    ]);
    return $prepare->fetch();
  } catch (PDOException $e) {
    var_dump($e->getMessage());
  }
};

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
};
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
};

//////////// Orders

function getOrders($table, $idField, $statusField, $fields = '*')
{
  try{
    $connect = connect();
    $query = $connect->prepare("select {$fields} from {$table} where {$statusField} = 0  order by {$idField} asc");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
  } catch (PDOException $e) {
    var_dump($e->getMessage());
    return false;
  }
}