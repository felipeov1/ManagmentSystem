<?php

function all($table, $fields = '*'){
    try{
      $connect = connect();
      $query = $connect->query("select {$fields} from {$table}");
      return $query->fetchAll();  
    }catch(PDOException $e){
        var_dump($e->getMessage());
    }
}

function findBy($table, $field, $value, $fields = '*'){
  try{
    $connect = connect();
    $prepare = $connect->prepare("select {$fields} from {$table} where {$field} = :{$field}");
    $prepare->execute([
      $field => $value
    ]);
     return $prepare->fetch();
  }catch(PDOException $e){
    var_dump($e->getMessage());
  }
}

function findSalesLastMonth($table, $field, $fields = '*'){
  try{
    $connect = connect();
   $query = $connect->prepare("select {$fields} from {$table} where MONTH({$field}) = MONTH(CURRENT_DATE) - 1 AND YEAR({$field}) = YEAR(CURRENT_DATE)");
   var_dump($query) ;  
   $query ->execute();
    return $query->fetchAll();
  }catch(PDOException $e){
    var_dump($e->getMessage());
  }
}